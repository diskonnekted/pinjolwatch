<?php

namespace App\Livewire;

use App\Models\Report;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\AuditLog;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReportDetail extends Component
{
    #[Layout('components.admin-layout')]
    public Report $report;
    public array $revealedEvidence = [];
    public array $verification_checklist = [];
    public bool $showOjkPreview = false;

    public function mount($ticket)
    {
        $this->report = Report::where('ticket_id', $ticket)->firstOrFail();
        $this->verification_checklist = $this->report->verification_checklist ?? [];
    }

    public function updatedVerificationChecklist()
    {
        $this->report->update(['verification_checklist' => $this->verification_checklist]);
        
        // Log minimal info to avoid cluttering, but tracking the change
        AuditLog::create([
            'user_id' => Auth::id(),
            'route_name' => 'admin.reports.checklist_update',
            'http_method' => 'PATCH',
            'url' => request()->fullUrl(),
            'ip_masked' => $this->maskIP(request()->ip()),
            'payload_summary' => json_encode([
                'ticket_id' => $this->report->ticket_id,
                'action' => 'Updated Verification Checklist'
            ]),
        ]);
    }

    public function render()
    {
        return view('livewire.report-detail');
    }

    public function revealEvidence($evidenceId)
    {
        $evidence = $this->report->evidence()->findOrFail($evidenceId);
        
        // Mark as revealed in state
        if (!in_array($evidenceId, $this->revealedEvidence)) {
            $this->revealedEvidence[] = $evidenceId;
            
            // Log to AuditLog
            AuditLog::create([
                'user_id' => Auth::id(),
                'route_name' => 'admin.reports.reveal',
                'http_method' => 'POST',
                'url' => request()->fullUrl(),
                'ip_masked' => $this->maskIP(request()->ip()),
                'payload_summary' => json_encode([
                    'ticket_id' => $this->report->ticket_id,
                    'evidence_id' => $evidenceId,
                    'action' => 'Revealed Anonymized Evidence'
                ]),
            ]);
        }
    }

    public function updateStatus($status)
    {
        $oldStatus = $this->report->status;
        $this->report->update(['status' => $status]);
        
        AuditLog::create([
            'user_id' => Auth::id(),
            'route_name' => 'admin.reports.status',
            'http_method' => 'PATCH',
            'url' => request()->fullUrl(),
            'ip_masked' => $this->maskIP(request()->ip()),
            'payload_summary' => json_encode([
                'ticket_id' => $this->report->ticket_id,
                'old_status' => $oldStatus,
                'new_status' => $status
            ]),
        ]);

        session()->flash('message', "Status laporan diperbarui ke " . ucfirst($status));
    }

    public function toggleOjkPreview()
    {
        $this->showOjkPreview = !$this->showOjkPreview;
    }

    public function sendToOjk()
    {
        // 1. Update Status and Timestamp
        $this->report->update([
            'status' => 'forwarded',
            'ojk_submitted_at' => now(),
        ]);

        // 2. Log Action
        AuditLog::create([
            'user_id' => Auth::id(),
            'route_name' => 'admin.reports.send_ojk',
            'http_method' => 'POST',
            'url' => request()->fullUrl(),
            'ip_masked' => $this->maskIP(request()->ip()),
            'payload_summary' => json_encode([
                'ticket_id' => $this->report->ticket_id,
                'action' => 'Sent Document to OJK/Satgas PASTI'
            ]),
        ]);

        // 3. Close Preview & Flash
        $this->showOjkPreview = false;
        session()->flash('message', "Dokumen berhasil dikirim ke Satgas PASTI/OJK!");
    }

    private function maskIP(?string $ip): string
    {
        if (!$ip) return 'unknown';
        return preg_replace('/(\.\d+){2}$/', '.xxx.xxx', $ip);
    }

    public function viewEvidence($evidenceId)
    {
        $evidence = $this->report->evidence()->findOrFail($evidenceId);

        if (!auth()->user()->hasAnyRole(['super-admin', 'moderator'])) {
            abort(403);
        }

        // Log the download
        AuditLog::create([
            'user_id' => Auth::id(),
            'route_name' => 'admin.reports.download_evidence',
            'http_method' => 'GET',
            'url' => request()->fullUrl(),
            'ip_masked' => $this->maskIP(request()->ip()),
            'payload_summary' => json_encode([
                'ticket_id' => $this->report->ticket_id,
                'evidence_id' => $evidenceId,
                'action' => 'Downloaded Original Evidence'
            ]),
        ]);

        return response()->streamDownload(function () use ($evidence) {
            $source = fopen(Storage::disk('local')->path($evidence->encrypted_path), 'rb');
            while (!feof($source)) {
                $line = fgets($source);
                if (trim($line) !== '') {
                    echo Crypt::decrypt($line);
                }
            }
            fclose($source);
        }, $evidence->original_name, ['Content-Type' => $evidence->mime_type]);
    }
}
