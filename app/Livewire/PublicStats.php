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
            // Human Impact Data (from efek.md, statistik.md, & statistikplus.md)
            'humanImpact' => [
                'suicideTrend' => [
                    ['year' => '2018', 'cases' => '1 Kasus', 'trend' => '-'],
                    ['year' => '2019', 'cases' => 'Meningkat', 'trend' => '↗️'],
                    ['year' => '2020', 'cases' => 'Meningkat', 'trend' => '↗️'],
                    ['year' => '2021', 'cases' => '13 Kasus', 'trend' => '↗️'],
                    ['year' => '2022', 'cases' => 'Meningkat', 'trend' => '↗️'],
                    ['year' => '2023 (9 Bln)', 'cases' => '28 Kasus', 'trend' => '↗️ Drastis'],
                    ['year' => 'Des 2023', 'cases' => '25 Kasus', 'trend' => 'Puncak'],
                ],
                'suicideChartData' => [1, 3, 7, 13, 20, 28, 25], 
                'suicideDetails' => [
                    'meninggal' => 49,
                    'selamat' => 23,
                    'male' => 60, // Percentage
                    'female' => 40, // Percentage
                ],
                'mentalHealth' => [
                    ['label' => 'Pengguna Pinjol', 'value' => 59.7, 'note' => 'Risiko Tertinggi'],
                    ['label' => 'Kredit Leasing', 'value' => 30.3, 'note' => 'Risiko Sedang'],
                    ['label' => 'Kredit KUR', 'value' => 25.2, 'note' => 'Risiko Rendah'],
                    ['label' => 'Bank Umum', 'value' => 20.2, 'note' => 'Risiko Terendah'],
                ],
                'symptoms' => [
                    ['label' => 'Stres/Anxiety', 'value' => 70],
                    ['label' => 'Malu/Stigma', 'value' => 65],
                    ['label' => 'Insomnia', 'value' => 55],
                    ['label' => 'Ggn Fokus', 'value' => 50],
                    ['label' => 'Depresi', 'value' => 40],
                ],
                'demographics' => [
                    'age' => [
                        ['label' => '19-34 th (Gen Z/Y)', 'value' => 60],
                        ['label' => '35-54 th (Dewasa)', 'value' => 30],
                        ['label' => '55+ th (Lansia)', 'value' => 10],
                    ],
                    'economy' => [
                        ['label' => 'Kelas Menengah', 'value' => 45.2],
                        ['label' => 'Kelas Bawah', 'value' => 32.7],
                        ['label' => 'Kelas Atas', 'value' => 22.1],
                    ]
                ],
                'womenSpecific' => [
                    ['label' => 'Terjerat Ilegal', 'value' => 30],
                    ['label' => 'Tak Cek Legalitas', 'value' => 22],
                    ['label' => 'Dampak Psikis', 'value' => 85],
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
                    ['title' => 'Pinjol vs Mental', 'stat' => '59,7%', 'desc' => 'Hampir 3x lipat risiko gangguan mental dibanding kredit bank umum.'],
                    ['title' => 'Target Gen Z/Y', 'stat' => '60%', 'desc' => 'Mayoritas pengguna adalah usia produktif yang rentan tekanan sosial.'],
                    ['title' => 'Krisis Des 2023', 'stat' => '25 Kasus', 'desc' => 'Angka bunuh diri tertinggi dalam satu bulan di 5 tahun terakhir.'],
                    ['title' => 'Edukasi Perempuan', 'stat' => '30%', 'desc' => 'Tingginya keterjeratan perempuan pada pinjol ilegal akibat gap literasi.'],
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
