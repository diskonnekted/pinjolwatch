<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Report;
use App\Models\ThreatType;
use Illuminate\Support\Facades\DB;

class PublicStats extends Component
{
    public function getStatsData()
    {
        // 1. Basic Counts
        $totalReports = Report::count();
        $ojkSubmitted = Report::whereNotNull('ojk_submitted_at')->count();
        $totalPinjolInvolved = Report::sum('pinjol_count');

        // 2. Threat Type Distribution
        $threatDistribution = Report::select('threat_type_id', DB::raw('count(*) as count'))
            ->groupBy('threat_type_id')
            ->with('threatType')
            ->get()
            ->map(function($item) {
                return [
                    'label' => $item->threatType->label ?? 'Lainnya',
                    'count' => $item->count
                ];
            });

        // 3. Monthly Trend (Last 6 Months)
        $monthlyTrend = Report::select(
                DB::raw('DATE_FORMAT(created_at, "%b %Y") as month'),
                DB::raw('count(*) as count')
            )
            ->groupBy('month')
            ->orderBy('created_at', 'asc')
            ->take(6)
            ->get();

        // 4. Regional Distribution (Top 5 Provinces)
        $regionalStats = Report::join('kabupaten', 'reports.kabupaten_id', '=', 'kabupaten.id')
            ->join('provinces', 'kabupaten.province_id', '=', 'provinces.id')
            ->select('provinces.name as province', DB::raw('count(*) as count'))
            ->groupBy('provinces.name')
            ->orderBy('count', 'desc')
            ->take(5)
            ->get();

        return [
            'totalReports' => $totalReports,
            'ojkSubmitted' => $ojkSubmitted,
            'totalPinjolInvolved' => $totalPinjolInvolved,
            'threatDistribution' => $threatDistribution,
            'monthlyTrend' => $monthlyTrend,
            'regionalStats' => $regionalStats,
            // Official OJK Data (March 2026)
            'official' => [
                'outstanding' => '101.03',
                'accounts' => '146.5',
                'blocked' => '9,081',
                'legal_apps' => '95',
                'twp90' => '4.54',
                'outstanding_history' => [
                    ['month' => 'Des 2025', 'value' => 94.85],
                    ['month' => 'Jan 2026', 'value' => 98.54],
                    ['month' => 'Feb 2026', 'value' => 100.69],
                    ['month' => 'Mar 2026', 'value' => 101.03],
                ],
                'composition' => [
                    ['label' => 'Konsumtif', 'value' => 65.69],
                    ['label' => 'Produktif (UMKM)', 'value' => 34.31],
                ]
            ],
            // Human Impact Data (from efek.md)
            'humanImpact' => [
                'suicideTrend' => [
                    ['year' => '2018', 'cases' => '1 Kasus', 'trend' => '-'],
                    ['year' => '2019', 'cases' => 'Meningkat', 'trend' => '↗️'],
                    ['year' => '2020', 'cases' => 'Meningkat', 'trend' => '↗️'],
                    ['year' => '2021', 'cases' => '13 Kasus (Puncak Pandemi)', 'trend' => '↗️'],
                    ['year' => '2022', 'cases' => 'Meningkat', 'trend' => '↗️'],
                    ['year' => '2023 (9 Bln)', 'cases' => '28 Kasus', 'trend' => '↗️ Drastis'],
                ],
                'suicideChartData' => [1, 3, 7, 13, 20, 28], // Estimated numeric values for chart line
                'suicideDetails' => [
                    'meninggal' => 49,
                    'selamat' => 23,
                    'male' => 43,
                    'female' => 29,
                ],
                'mentalHealth' => [
                    ['label' => 'Total Gangguan Mental', 'value' => 30, 'note' => '84 Juta Jiwa [21]'],
                    ['label' => 'Terindikasi Depresi', 'value' => 2, 'note' => 'Populasi (2023) [21]'],
                    ['label' => 'Gangguan Mental Emosional', 'value' => 9.8, 'note' => 'Naik dari 6% [24][51]'],
                    ['label' => 'Ansietas/Kecemasan', 'value' => 14.7, 'note' => 'Gejala Klinis [53][55]'],
                    ['label' => 'Remaja (10-17 th)', 'value' => 5.5, 'note' => '2.45 Juta Anak [21]'],
                    ['label' => 'Remaja (Masalah Mental)', 'value' => 34.9, 'note' => '1 dari 3 [48][49]'],
                ],
                'undiagnosed' => [
                    ['issue' => 'Tidak Terdiagnosis Formal', 'value' => '>60%', 'ref' => '[53]'],
                    ['issue' => 'Tidak Akses Layanan', 'value' => '13%', 'ref' => '[21]'],
                    ['issue' => 'Skizofrenia Dipasung', 'value' => 'Masih Umum', 'ref' => '[21]'],
                ],
                'crimeData' => [
                    'total_crimes' => '561.993',
                    'crime_clock' => '56 Detik',
                    'reporting_rate' => '20.28%',
                ],
                'blockingHistory' => [
                    ['year' => '2021', 'count' => 811],
                    ['year' => '2022', 'count' => 698],
                    ['year' => '2023', 'count' => 2248],
                    ['year' => '2024', 'count' => 2930],
                    ['year' => '2025', 'count' => 1556],
                ],
                'nationalSuicide' => [
                    ['year' => '2022', 'cases' => '826 Kasus', 'growth' => '-'],
                    ['year' => '2023', 'cases' => '1.350 Kasus', 'growth' => '+63%'],
                    ['year' => '2024', 'cases' => '1.450 Kasus', 'growth' => '+75% (dari 2022)'],
                ],
                'socialImpact' => [
                    'affected_lives' => '188.25', // Juta Jiwa
                    'economic_loss' => '1,054', // Triliun/Tahun
                    'health_burden' => '116.64', // Triliun/Tahun
                ]
            ],
            'sources' => [
                'BPS (Badan Pusat Statistik)',
                'Kementerian Kesehatan RI (Riskesdas)',
                'Kepolisian RI (Polri)',
                'Jangkara Data Lab / Newstensity',
                'Otoritas Jasa Keuangan (OJK)',
                'WHO & Riset Internasional (PMC)'
            ]
        ];
    }

    public function render()
    {
        return view('livewire.public-stats', [
            'stats' => $this->getStatsData()
        ]);
    }
}
