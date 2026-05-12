<?php

namespace App\Livewire;

use App\Models\Report;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserReportDetail extends Component
{
    public Report $report;

    public function mount($ticket)
    {
        // Load report by ticket_id and ensure it belongs to the authenticated user
        $this->report = Report::where('ticket_id', $ticket)
            ->where('user_id', Auth::id())
            ->firstOrFail();
    }

    public function render()
    {
        return view('livewire.user-report-detail');
    }
}
