<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Report;
use App\Models\AuditLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminOverview extends Component
{
    #[Layout('components.admin-layout')]

    public function render()
    {
        $today = Carbon::today();
        $thisMonth = Carbon::now()->startOfMonth();

        // 1. Calculate Top Widgets
        $stats = [
            'total_today' => Report::whereDate('created_at', $today)->count(),
            'total_month' => Report::whereMonth('created_at', Carbon::now()->month)
                                    ->whereYear('created_at', Carbon::now()->year)
                                    ->count(),
            'pending_verification' => Report::where('status', 'received')->count(),
            'forwarded_ojk' => Report::where('status', 'forwarded')->count(),
        ];

        // 2. Fetch Recent Audit Logs
        $recentLogs = AuditLog::with('user')
            ->latest()
            ->take(6)
            ->get();

        // 3. Prepare Chart Data (Last 7 Days)
        $chartData = [];
        $chartLabels = [];
        
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $chartLabels[] = $date->format('d M');
            $chartData[] = Report::whereDate('created_at', $date)->count();
        }

        return view('livewire.admin-overview', [
            'stats' => $stats,
            'recentLogs' => $recentLogs,
            'chartLabels' => $chartLabels,
            'chartData' => $chartData,
        ]);
    }
}
