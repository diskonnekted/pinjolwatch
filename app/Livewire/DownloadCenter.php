<?php

namespace App\Livewire;

use Livewire\Component;

class DownloadCenter extends Component
{
    public $materials = [
        // High Priority Resources
        [
            'id' => 'infographic-188-million',
            'title' => 'Infografis: Dampak 188 Juta Jiwa',
            'description' => 'Visualisasi data agregat dampak psikologis pinjol terhadap keluarga di Indonesia.',
            'category' => 'Infografis',
            'type' => 'PDF',
            'icon' => '📊',
            'color' => 'teal'
        ],
        [
            'id' => 'advocacy-template-ojk',
            'title' => 'Template Advokasi OJK & DPR',
            'description' => 'Draft surat resmi dan lampiran data untuk mendesak perubahan regulasi.',
            'category' => 'Advokasi',
            'type' => 'PDF',
            'icon' => '🏛️',
            'color' => 'indigo'
        ],

        // UU ITE Category
        [
            'id' => 'uu-11-2008',
            'title' => 'UU Nomor 11 Tahun 2008',
            'description' => 'Undang-Undang Informasi & Transaksi Elektronik (Versi Asli).',
            'category' => 'UU ITE',
            'type' => 'PDF',
            'icon' => '⚖️',
            'color' => 'rose',
            'url' => 'https://peraturan.bpk.go.id/Download/26683/UU%20Nomor%2011%20Tahun%202008.pdf'
        ],
        [
            'id' => 'uu-19-2016',
            'title' => 'UU Nomor 19 Tahun 2016',
            'description' => 'Perubahan Pertama UU ITE - Penyesuaian aturan siber.',
            'category' => 'UU ITE',
            'type' => 'PDF',
            'icon' => '⚖️',
            'color' => 'rose',
            'url' => 'https://peraturan.bpk.go.id/Details/37582/uu-no-19-tahun-2016'
        ],
        [
            'id' => 'uu-1-2024',
            'title' => 'UU Nomor 1 Tahun 2024',
            'description' => 'Perubahan Kedua UU ITE (Terbaru) - Fondasi hukum transaksi elektronik.',
            'category' => 'UU ITE',
            'type' => 'PDF',
            'icon' => '⚖️',
            'color' => 'rose',
            'url' => 'https://jdih.komdigi.go.id/produk_hukum/view/id/884/t/undangundang+nomor+1+tahun+2024'
        ],

        // UU PDP Category
        [
            'id' => 'uu-27-2022',
            'title' => 'UU Nomor 27 Tahun 2022',
            'description' => 'Undang-Undang Pelindungan Data Pribadi (UU PDP).',
            'category' => 'UU PDP',
            'type' => 'PDF',
            'icon' => '🛡️',
            'color' => 'teal',
            'url' => 'https://peraturan.bpk.go.id/Download/224884/UU%20Nomor%2027%20Tahun%202022.pdf'
        ],

        // KUHP Category
        [
            'id' => 'kuhp-lama',
            'title' => 'KUHP Lama (WvS)',
            'description' => 'Kitab Undang-Undang Hukum Pidana peninggalan Belanda yang masih berlaku.',
            'category' => 'KUHP',
            'type' => 'PDF',
            'icon' => '📖',
            'color' => 'indigo',
            'url' => 'https://perpustakaan.elsam.or.id/repository/KUHP.pdf'
        ],
        [
            'id' => 'uu-1-2023',
            'title' => 'UU Nomor 1 Tahun 2023',
            'description' => 'KUHP Baru - Standar hukum pidana nasional (Berlaku 2026).',
            'category' => 'KUHP',
            'type' => 'PDF',
            'icon' => '📖',
            'color' => 'indigo',
            'url' => 'https://peraturan.bpk.go.id/Download/287456/UU%20Nomor%201%20Tahun%202023.pdf'
        ],

        // OJK Category
        [
            'id' => 'pojk-77-2016',
            'title' => 'POJK 77/POJK.01/2016',
            'description' => 'Peraturan dasar layanan pinjam meminjam uang berbasis TI.',
            'category' => 'Regulasi OJK',
            'type' => 'INFO',
            'icon' => '🏛️',
            'color' => 'amber'
        ],
        [
            'id' => 'pojk-10-2022',
            'title' => 'POJK 10/POJK.05/2022',
            'description' => 'Layanan Pendanaan Bersama Berbasis TI (Fintech Lending).',
            'category' => 'Regulasi OJK',
            'type' => 'PDF',
            'icon' => '🏛️',
            'color' => 'amber',
            'url' => 'https://ojk.go.id/id/regulasi/Documents/Pages/Layanan-Pendanaan-Bersama-Berbasis-Teknologi-Informasi/POJK%2010%20-%2005%20-%202022.pdf'
        ],
        [
            'id' => 'pojk-16-2023',
            'title' => 'POJK 16/POJK.06/2023',
            'description' => 'Perubahan atas POJK 10/2022 terkait perlindungan konsumen.',
            'category' => 'Regulasi OJK',
            'type' => 'PDF',
            'icon' => '🏛️',
            'color' => 'amber',
            'url' => 'https://peraturan.bpk.go.id/Download/331260/Salinan%20POJK%2016%20Tahun%202023.pdf'
        ],
        [
            'id' => 'seojk-19-2023',
            'title' => 'SEOJK 19/SEOJK.06/2023',
            'description' => 'Pedoman Teknis Penyelenggaraan Pinjol.',
            'category' => 'Regulasi OJK',
            'type' => 'INFO',
            'icon' => '📜',
            'color' => 'amber'
        ],

        // KOMINFO Category
        [
            'id' => 'permen-kominfo-19-2014',
            'title' => 'Permenkominfo 19/2014',
            'description' => 'Penanganan Situs Internet Bermuatan Negatif (Blokir Pinjol).',
            'category' => 'Kominfo',
            'type' => 'PDF',
            'icon' => '🌐',
            'color' => 'teal',
            'url' => 'https://jdih.komdigi.go.id/produk_hukum/view/id/215/t/peraturan+menteri+komunikasi+dan+informatika+nomor+19+tahun+2014'
        ],
        [
            'id' => 'permen-kominfo-5-2020',
            'title' => 'Permenkominfo 5/2020',
            'description' => 'Penyelenggara Sistem Elektronik (PSE) Privat.',
            'category' => 'Kominfo',
            'type' => 'PDF',
            'icon' => '🌐',
            'color' => 'teal',
            'url' => 'https://jdih.komdigi.go.id/produk_hukum/view/id/759/t/peraturan+menteri+komunikasi+dan+informatika+nomor+5+tahun+2020'
        ],

        // LAINNYA Category
        [
            'id' => 'pks-pinjol-ilegal',
            'title' => 'PKS Pemberantasan Pinjol',
            'description' => 'Perjanjian Kerja Sama lintas lembaga pemberantasan pinjol ilegal.',
            'category' => 'Lainnya',
            'type' => 'PDF',
            'icon' => '🤝',
            'color' => 'indigo',
            'url' => 'https://www.ojk.go.id/id/berita-dan-kegiatan/info-terkini/Documents/Pages/Satgas-Waspada-Investasi-Kembali-Temukan-7-Entitas-Investasi-Tanpa-Izin-dan-100-Pinjaman-Online-Ilegal/LAMPIRAN%20PINJOL%20ILEGAL%20APRIL%202022.pdf'
        ],
        [
            'id' => 'uu-8-1999',
            'title' => 'UU 8/1999 (UPK)',
            'description' => 'Undang-Undang Perlindungan Konsumen Indonesia.',
            'category' => 'Lainnya',
            'type' => 'INFO',
            'icon' => '🛒',
            'color' => 'indigo'
        ],
        [
            'id' => 'uu-8-2010',
            'title' => 'UU 8/2010 (TPPU)',
            'description' => 'Pencegahan & Pemberantasan Tindak Pidana Pencucian Uang.',
            'category' => 'Lainnya',
            'type' => 'INFO',
            'icon' => '💰',
            'color' => 'indigo'
        ],
        [
            'id' => 'security-handbook',
            'title' => 'Buku Saku Keamanan Digital',
            'description' => 'Langkah praktis melindungi data pribadi dari teror.',
            'category' => 'Keamanan',
            'type' => 'PDF',
            'icon' => '🛡️',
            'color' => 'rose'
        ]
    ];

    public function download($id)
    {
        $material = collect($this->materials)->firstWhere('id', $id);
        if (!$material) return;

        // If it has an external URL, redirect to it
        if (isset($material['url'])) {
            return redirect()->away($material['url']);
        }

        $content = $this->getMaterialContent($id);
        
        // Convert Markdown-like content to HTML for better PDF rendering
        $htmlContent = \Illuminate\Support\Str::markdown($content);

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.material', [
            'title' => $material['title'],
            'category' => $material['category'],
            'content' => $htmlContent
        ]);

        $filename = \Illuminate\Support\Str::slug($material['title']) . '.pdf';

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, $filename);
    }

    private function getMaterialContent($id)
    {
        $fileMap = [
            'infographic-188-million' => 'infografis-dampak-psikologis.md',
            'advocacy-template-ojk' => 'template-advokasi-ojk.md',
            'education-module-community' => 'modul-edukasi-komunitas.md',
            'security-handbook' => 'modul-edukasi-komunitas.md'
        ];

        $filename = $fileMap[$id] ?? null;
        if ($filename && file_exists(public_path('downloads/' . $filename))) {
            return file_get_contents(public_path('downloads/' . $filename));
        }

        // Fallback hardcoded versions
        $contents = [
            'infographic-188-million' => "### Satu Peminjam = Tiga Generasi yang Terdampak\n\n**ESTIMASI DAMPAK (2026):**\n- Total Peminjam: 125.51 Juta Akun\n- Total Jiwa Terdampak: 188.25 Juta Jiwa",
            'advocacy-template-ojk' => "### KEPADA YTH. KETUA OJK & KETUA KOMISI XI DPR RI\n\n**PERIHAL:** Laporan Agregat Dampak Psikologis & Sosial Pinjol Ilegal",
            'education-module-community' => "### MODUL EDUKASI: MEMBACA DATA PINJOL TANPA PANIK",
            'legal-regulations-compilation' => "### DAFTAR PERATURAN HUKUM TERKAIT PINJOL & UU ITE\n\n**1. UNDANG-UNDANG ITE**\n- **UU No. 11/2008**: Versi Asli ITE\n- **UU No. 19/2016**: Perubahan Pertama\n- **UU No. 1/2024**: Perubahan Kedua (Terbaru)\n*Pasal Penting: 27A (Pencemaran), 29 (Ancaman), 32 (Akses Ilegal), 35 (Data Pribadi)*\n\n**2. UNDANG-UNDANG PDP**\n- **UU No. 27/2022**: Pelindungan Data Pribadi\n*Pasal Penting: 20 (Hak Subjek), 57-71 (Sanksi), 67 (Penyebaran Data Tanpa Izin)*\n\n**3. KITAB UNDANG-UNDANG HUKUM PIDANA (KUHP)**\n- **KUHP Lama** (Wetboek van Strafrecht)\n- **UU No. 1/2023**: KUHP Baru (Berlaku 2026)\n*Pasal Penting: 310-321 (Penghinaan), 368 (Pemerasan), 378 (Penipuan)*\n\n**4. PERATURAN OJK (POJK)**\n- **POJK No. 10/2022**: Layanan Pendanaan Bersama Berbasis TI\n- **POJK No. 16/2023**: Perubahan atas POJK 10/2022\n- **SEOJK No. 19/2023**: Pedoman Teknis Pinjol\n\n**5. CARA MELAPOR**\n- **OJK**: 157 / WA 081-157-157-157\n- **Kominfo**: 159 / aduankonten.id\n- **Polisi**: patrolisiber.id",
            'security-handbook' => "### BUKU SAKU KEAMANAN DIGITAL"
        ];

        return $contents[$id] ?? "Konten belum tersedia.";
    }

    public function render()
    {
        return view('livewire.download-center');
    }
}
