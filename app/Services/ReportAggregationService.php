<?php
namespace App\Services;

use App\Models\Report;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ReportAggregationService
{
    public function getKabupatenStats(string $startDate = null, string $endDate = null, string $status = null): array
    {
        $cacheKey = "map_stats_{$startDate}_{$endDate}_{$status}";

        return Cache::remember($cacheKey, now()->addHours(2), function () use ($startDate, $endDate, $status) {
            $query = DB::table('reports')
                ->join('kabupaten', 'reports.kabupaten_id', '=', 'kabupaten.id')
                ->selectRaw('kabupaten_id, kabupaten.nama as kabupaten_name, COUNT(*) as total, 
                            SUM(CASE WHEN status = "verified" THEN 1 ELSE 0 END) as verified')
                ->where('reports.status', '!=', 'archived');

            if ($startDate) $query->whereDate('reports.created_at', '>=', $startDate);
            if ($endDate) $query->whereDate('reports.created_at', '<=', $endDate);
            if ($status) $query->where('reports.status', $status);

            return $query->groupBy('kabupaten_id', 'kabupaten.nama')
                ->get()
                ->map(fn($row) => [
                    'kabupaten_id' => $row->kabupaten_id,
                    'kabupaten_name' => $row->kabupaten_name,
                    'count' => $row->total,
                    'intensity' => $this->calculateIntensity($row->total)
                ])
                ->values()
                ->toArray();
        });
    }

    private function calculateIntensity(int $count): int
    {
        if ($count < 5) return 1; // rendah
        if ($count < 20) return 2; // sedang
        return 3; // tinggi
    }
}
