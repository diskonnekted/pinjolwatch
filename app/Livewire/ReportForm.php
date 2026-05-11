<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Report;
use App\Models\Province;
use App\Models\Kabupaten;
use App\Models\ThreatType;
use App\Models\ConsentLog;
use App\Models\LegalPinjol;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ReportForm extends Component
{
    use WithFileUploads;

    public $step = 1;
    public $province_id;
    public $kabupaten_id;
    public $threat_type_id;
    public $legal_pinjol_id;
    public $app_name = '';
    public $app_legal_status = null;
    public $chronology = '';
    public $contact_phone_number = '';
    public $identity_disclosure = '';
    public $communication_tone = '';
    public $dc_actions = [];
    public $whatsapp_consent = false;
    public $reporter_whatsapp = '';
    public $evidence = []; // array of uploaded files
    public $consent_scope;
    public $is_anonymous = true;
    public $ticket_id = null;
    public $success = false;

    public function nextStep()
    {
        $this->validateStep();
        $this->step++;
    }

    public function prevStep()
    {
        $this->step--;
    }

    private function validateStep()
    {
        if ($this->step == 1) {
            $this->validate([
                'province_id' => 'required|exists:provinces,id',
                'kabupaten_id' => 'required|exists:kabupaten,id',
                'threat_type_id' => 'required|exists:threat_types,id',
                'legal_pinjol_id' => 'nullable|exists:legal_pinjols,id',
                'app_name' => 'nullable|string|max:100',
            ]);
        } elseif ($this->step == 2) {
            $this->validate([
                'chronology' => 'required|string|min:20|max:2000',
                'contact_phone_number' => 'nullable|string|max:20',
                'identity_disclosure' => 'nullable|in:menyebutkan_aplikasi,tidak_menyebutkan',
                'communication_tone' => 'nullable|in:santun_resmi,kasar_ancaman',
                'dc_actions' => 'nullable|array',
                'dc_actions.*' => 'string',
                'whatsapp_consent' => 'boolean',
                'reporter_whatsapp' => 'nullable|required_if:whatsapp_consent,true|string|max:20',
            ]);
        } elseif ($this->step == 3) {
            $this->validate([
                'evidence.*' => 'nullable|file|mimes:jpeg,png,pdf,mp3,mp4|max:10240',
            ]);
        }
    }

    public function updatedProvinceId()
    {
        $this->reset('kabupaten_id');
    }

    public function updatedAppName($value)
    {
        if (!$value) {
            $this->app_legal_status = null;
            return;
        }

        $ojkService = app(\App\Services\OjkFintechSyncService::class);
        $match = $ojkService->isPlatformLegal($value);

        if ($match) {
            $this->app_legal_status = $match->status;
        } else {
            $this->app_legal_status = 'tidak_ditemukan';
        }
    }

    public function render()
    {
        $provinces = Province::orderBy('name')->get();
        $kabupatens = $this->province_id 
            ? Kabupaten::where('province_id', $this->province_id)->orderBy('nama')->get()
            : [];

        $threatTypes = ThreatType::all();
        $legalPinjols = LegalPinjol::orderBy('app_name')->get();

        return view('livewire.report-form', compact('provinces', 'kabupatens', 'threatTypes', 'legalPinjols'));
    }

    public function submit()
    {
        if (RateLimiter::tooManyAttempts('reports-'.$this->maskIP(request()->ip()), 3)) {
            $seconds = RateLimiter::availableIn('reports-'.$this->maskIP(request()->ip()));
            $this->addError('consent_scope', 'Terlalu banyak pengiriman. Silakan coba lagi dalam '.$seconds.' detik.');
            return;
        }

        $this->validate([
            'consent_scope' => ['required', Rule::in(['internal_only', 'share_to_authorities', 'public_anonymized'])],
        ]);

        $report = Report::create([
            'ticket_id' => $this->generateTicket(),
            'kabupaten_id' => $this->kabupaten_id,
            'threat_type_id' => $this->threat_type_id,
            'legal_pinjol_id' => $this->legal_pinjol_id ?: null,
            'app_name' => $this->app_name,
            'chronology' => $this->chronology,
            'contact_phone_number' => $this->contact_phone_number,
            'identity_disclosure' => $this->identity_disclosure ?: null,
            'communication_tone' => $this->communication_tone ?: null,
            'dc_actions' => $this->dc_actions ?: null,
            'reporter_whatsapp' => $this->whatsapp_consent ? $this->reporter_whatsapp : null,
            'whatsapp_consent' => $this->whatsapp_consent,
            'is_anonymous' => $this->is_anonymous,
            'consent_scope' => $this->consent_scope,
            'ip_hash' => Hash::make(request()->ip()),
        ]);

        if ($this->evidence) {
            foreach ($this->evidence as $file) {
                $fileName = Str::uuid().'.'.$file->getClientOriginalExtension().'.enc';
                $path = 'private/evidence/'.$fileName;

                // Stream the file and encrypt in chunks
                $source = fopen($file->getRealPath(), 'rb');
                $destination = Storage::disk('local')->path($path);

                // Manually open a file handle and write encrypted chunks
                $destHandle = fopen($destination, 'wb');
                while (!feof($source)) {
                    $chunk = fread($source, 1024 * 1024); // 1MB chunks
                    $encryptedChunk = Crypt::encrypt($chunk);
                    fwrite($destHandle, $encryptedChunk . PHP_EOL); // Add delimiter
                }
                fclose($source);
                fclose($destHandle);

                $report->evidence()->create([
                    'original_name' => $file->getClientOriginalName(),
                    'encrypted_path' => $path,
                    'mime_type' => $file->getMimeType(),
                    'file_size' => $file->getSize(),
                ]);
            }
        }

        ConsentLog::create([
            'ticket_id' => $report->ticket_id,
            'scope' => $this->consent_scope,
            'granted_at' => now(),
            'ip_masked' => $this->maskIP(request()->ip()),
        ]);

        RateLimiter::hit('reports-'.$this->maskIP(request()->ip()), 3600);

        Session::flash('consent_receipt', [
            'ticket' => $report->ticket_id,
            'scope' => $this->consent_scope,
            'timestamp' => now()->format('d/m/Y H:i'),
        ]);

        $this->ticket_id = $report->ticket_id;
        $this->success = true;
        $this->resetForm();
    }

    protected function resetForm()
    {
        $this->reset(['province_id', 'kabupaten_id', 'threat_type_id', 'legal_pinjol_id', 'app_name', 'app_legal_status', 'chronology', 'contact_phone_number', 'identity_disclosure', 'communication_tone', 'dc_actions', 'whatsapp_consent', 'reporter_whatsapp', 'evidence', 'consent_scope', 'step']);
    }

    protected function generateTicket(): string
    {
        return strtoupper('PW-' . Str::random(6) . '-' . date('Ymd'));
    }

    private function maskIP(?string $ip): string
    {
        if (!$ip) return 'unknown';
        return preg_replace('/(\.\d+){2}$/', '.xxx.xxx', $ip);
    }
}
