<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Report;
use App\Models\ThreatType;
use Illuminate\Support\Facades\DB;

class StatsPanel extends Component
{
    public function render()
    {
        $totalReports = Report::count();
        $verifiedReports = Report::where('status', 'verified')->count();
        $resolvedReports = Report::where('status', 'resolved')->count();

        $threatStats = DB::table('reports')
            ->join('threat_types', 'reports.threat_type_id', '=', 'threat_types.id')
            ->select('threat_types.label', DB::raw('count(*) as total'))
            ->groupBy('threat_types.label')
            ->orderBy('total', 'desc')
            ->get();

        $monthlyStats = Report::select(
            DB::raw('count(*) as total'),
            DB::raw("DATE_FORMAT(created_at, '%M %Y') as month"),
            DB::raw('max(created_at) as latest')
        )
        ->groupBy('month')
        ->orderBy('latest', 'desc')
        ->limit(6)
        ->get();

        return view('livewire.stats-panel', [
            'total' => $totalReports,
            'verified' => $verifiedReports,
            'resolved' => $resolvedReports,
            'threatStats' => $threatStats,
            'monthlyStats' => $monthlyStats,
        ]);
    }
}
