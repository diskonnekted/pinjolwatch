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
                'cumulative_disbursement' => '978',
                'outstanding_history' => [
                    ['month' => 'Des 2025', 'value' => 94.85],
                    ['month' => 'Jan 2026', 'value' => 98.54],
                    ['month' => 'Feb 2026', 'value' => 100.69],
                    ['month' => 'Mar 2026', 'value' => 101.03],
                ],
                'composition' => [
                    ['label' => 'Konsumtif', 'value' => 65.69],
                    ['label' => 'Produktif (UMKM)', 'value' => 34.31],
                ],
                'lender_origin' => [
                    ['label' => 'Dalam Negeri', 'value' => 86],
                    ['label' => 'Luar Negeri', 'value' => 14],
                ],
                'geography' => [
                    ['label' => 'Jawa', 'value' => 70],
                    ['label' => 'Sumatera', 'value' => 15],
                    ['label' => 'Kalimantan & Sulawesi', 'value' => 10],
                    ['label' => 'Lainnya', 'value' => 5],
                ]
            ],
            'challenges' => [
                ['risk' => 'Kualitas Kredit Memburuk', 'impact' => 'Kerugian lender, bunga naik', 'mitigation' => 'Penilaian lebih ketat'],
                ['risk' => 'Pinjol Ilegal Marak', 'impact' => 'Kerugian konsumen masif', 'mitigation' => 'Satgas PASTI & Edukasi'],
                ['risk' => 'Over-indebtedness', 'impact' => 'Gagal bayar sistemik', 'mitigation' => 'Batas pinjaman income-based'],
                ['risk' => 'Perlindungan Data', 'impact' => 'Kebocoran & Doxing', 'mitigation' => 'Kepatuhan UU PDP'],
            ],
            // Human Impact Data (from efek.md & statistik.md)
            'humanImpact' => [
                'suicideTrend' => [
                    ['year' => '2018', 'cases' => '1 Kasus', 'trend' => '-'],
                    ['year' => '2019', 'cases' => 'Meningkat', 'trend' => '↗️'],
                    ['year' => '2020', 'cases' => 'Meningkat', 'trend' => '↗️'],
                    ['year' => '2021', 'cases' => '13 Kasus', 'trend' => '↗️'],
                    ['year' => '2022', 'cases' => 'Meningkat', 'trend' => '↗️'],
                    ['year' => '2023 (9 Bln)', 'cases' => '28 Kasus', 'trend' => '↗️ Drastis'],
                ],
                'suicideChartData' => [1, 3, 7, 13, 20, 28], 
                'suicideDetails' => [
                    'meninggal' => 49,
                    'selamat' => 23,
                    'male' => 43,
                    'female' => 29,
                ],
                'mentalHealth' => [
                    ['label' => 'Total Gangguan Mental', 'value' => 30, 'note' => '84 Juta Jiwa'],
                    ['label' => 'Ansietas/Kecemasan', 'value' => 14.7, 'note' => 'Gejala Klinis'],
                    ['label' => 'Masalah Mental Remaja', 'value' => 34.9, 'note' => '1 dari 3 Remaja'],
                    ['label' => 'Depresi Populasi', 'value' => 2, 'note' => 'Indikasi Klinis'],
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
                    ['year' => '2024', 'cases' => '1.450 Kasus', 'growth' => '+75%'],
                ],
                'keyFindings' => [
                    ['title' => 'Lonjakan Bunuh Diri', 'stat' => '2.700%', 'desc' => 'Kenaikan drastis kasus terverifikasi dari 2018 ke 2023.'],
                    ['title' => 'Krisis Kesehatan Mental', 'stat' => '30%', 'desc' => '84 Juta Jiwa mengalami gangguan mental akibat tekanan ekonomi.'],
                    ['title' => 'Underreporting Masif', 'stat' => '20,28%', 'desc' => 'Hanya 1 dari 5 kejahatan pinjol yang berani dilaporkan.'],
                    ['title' => 'Dampak Lintas Generasi', 'stat' => '188 Juta', 'desc' => '70% populasi terdampak psikologis melalui efek domino keluarga.'],
                ]
            ],
            'sources' => [
                'Otoritas Jasa Keuangan (OJK)',
                'Asosiasi Fintech (AFPI)',
                'Satgas PASTI',
                'Kepolisian RI (Polri)',
                'Kementerian Kesehatan RI',
                'WHO & Riset PMC'
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
