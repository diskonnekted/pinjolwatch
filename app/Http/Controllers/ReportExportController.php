<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportExportController extends Controller
{
    public function exportPdf(Request $request)
    {
        $query = Report::with(['kabupaten', 'threatType'])
            ->where('status', '!=', 'archived')
            ->when($request->start, fn($q) => $q->whereDate('created_at', '>=', $request->start))
            ->when($request->end, fn($q) => $q->whereDate('created_at', '<=', $request->end))
            ->when($request->status, fn($q) => $q->where('status', $request->status));

        $reports = $query->latest()->get();

        $pdf = Pdf::loadView('reports.official', [
            'reports' => $reports,
            'start' => $request->start,
            'end' => $request->end,
            'status' => $request->status,
            'consent_label' => 'Sesuai persetujuan pelapor'
        ])->setPaper('a4', 'portrait');

        return $pdf->download('PinjolWatch_Export_' . now()->format('Y-m-d') . '.pdf');
    }
}
