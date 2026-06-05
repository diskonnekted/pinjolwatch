<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class UserReportPdfController extends Controller
{
    public function download(Request $request, $ticket)
    {
        $report = Report::with(['kabupaten.province', 'threatType', 'legalPinjol'])
            ->where('ticket_id', $ticket)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $pdf = Pdf::loadView('reports.user-pdf', [
            'report' => $report,
        ])->setPaper('a4', 'portrait');

        return $pdf->download('Laporan_PinjolWatch_' . $report->ticket_id . '.pdf');
    }
}
