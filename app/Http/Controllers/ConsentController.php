<?php

namespace App\Http\Controllers;

use App\Models\ConsentLog;
use App\Models\Report;
use Illuminate\Http\Request;

class ConsentController extends Controller
{
    public function show($ticket)
    {
        $log = ConsentLog::where('ticket_id', $ticket)->where('is_active', true)->firstOrFail();
        // In a real app, you'd have a view here to confirm the withdrawal
        return view('consent.withdraw', ['log' => $log]);
    }

    public function process($ticket)
    {
        $log = ConsentLog::where('ticket_id', $ticket)->where('is_active', true)->firstOrFail();
        $log->update(['is_active' => false, 'withdrawn_at' => now()]);
        
        // Trigger soft-delete if scope was internal_only
        if ($log->scope === 'internal_only') {
            Report::where('ticket_id', $ticket)->delete();
        }

        return redirect('/')->with('status', 'Persetujuan Anda telah berhasil ditarik. Terima kasih.');
    }
}
