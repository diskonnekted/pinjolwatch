<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Report;

class TicketTracker extends Component
{
    public $ticket_id = '';
    public $report = null;
    public $searched = false;

    public function track()
    {
        $this->validate([
            'ticket_id' => 'required|string|min:10',
        ]);

        $this->report = Report::where('ticket_id', $this->ticket_id)->first();
        $this->searched = true;
    }

    public function render()
    {
        return view('livewire.ticket-tracker');
    }
}
