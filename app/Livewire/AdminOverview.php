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

        // 1. Calculate Top Widgets
        $stats = [
            'total_today' => Report::whereDate('created_at', $today)->count(),
            'total_reports' => Report::count(),
            'total_articles' => \App\Models\Article::count(),
            'total_victims' => \App\Models\User::role('user')->count(),
            'pending_verification' => Report::where('status', 'received')->count(),
            'pending_articles' => \App\Models\Article::where('status', 'pending')->count(),
            'investigating' => Report::where('status', 'investigating')->count(),
            'resolved' => Report::where('status', 'resolved')->count(),
        ];

        // 2. Fetch Recent Audit Logs
        $recentLogs = AuditLog::with('user')
            ->latest()
            ->take(8)
            ->get();

        // 3. Prepare Dummy Chart Data (Last 10 Days)
        $chartLabels = [];
        $reportsData = [];
        $visitorsData = [];
        
        for ($i = 9; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $chartLabels[] = $date->format('d/m');
            
            // Dummy logic: Real data + random variation for "active" look
            $realReports = Report::whereDate('created_at', $date)->count();
            $reportsData[] = $realReports + rand(2, 8); 
            
            // Dummy visitors data
            $visitorsData[] = rand(150, 450);
        }

        return view('livewire.admin-overview', [
            'stats' => $stats,
            'recentLogs' => $recentLogs,
            'chartLabels' => $chartLabels,
            'reportsData' => $reportsData,
            'visitorsData' => $visitorsData,
        ]);
    }
}
