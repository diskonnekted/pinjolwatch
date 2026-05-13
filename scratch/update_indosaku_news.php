<?php

use App\Models\LegalPinjol;

$p = LegalPinjol::where('app_name', 'like', '%Indosaku%')->first();
if ($p) {
    $p->news_links = [
        [
            'title' => 'OJK Sanksi Indosaku Akibat Pelanggaran Penagihan',
            'url' => 'https://ojk.go.id/id/berita-dan-kegiatan/siaran-pers/Pages/OJK-Sanksi-Indosaku.aspx',
            'source' => 'OJK.GO.ID',
            'date' => '2024-05-11'
        ],
        [
            'title' => 'Indosaku Buka Suara Buntut Kasus Penagihan Debt Collectornya',
            'url' => 'https://www.cnbcindonesia.com/market/20260511095941-17-733925/indosaku-buka-suara-buntut-kasus-penagihan-debt-collectornya',
            'source' => 'CNBC Indonesia',
            'date' => '2024-05-11'
        ],
        [
            'title' => 'Pinjol Indosaku Didenda OJK Rp 875 Juta Akibat Prank Damkar',
            'url' => 'https://regional.kompas.com/read/2026/05/11/151709978/pinjol-indosaku-didenda-ojk-rp-875-juta-akibat-prank-panggilan-palsu-damkar',
            'source' => 'Kompas.com',
            'date' => '2024-05-11'
        ]
    ];
    $p->save();
    echo "Indosaku updated successfully\n";
} else {
    echo "Indosaku not found\n";
}
