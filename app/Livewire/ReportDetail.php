<?php

namespace App\Livewire;

use App\Models\Report;
use Livewire\Component;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReportDetail extends Component
{
    public Report $report;

    public function mount($ticket)
    {
        $this->report = Report::where('ticket_id', $ticket)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.report-detail');
    }

    public function viewEvidence($evidenceId)
    {
        $evidence = $this->report->evidence()->findOrFail($evidenceId);

        // Basic authorization - can be expanded
        if (!auth()->user()->hasAnyRole(['super-admin', 'moderator'])) {
            abort(403);
        }

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
