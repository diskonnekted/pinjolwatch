<?php

use App\Models\LegalPinjol;

// AdaKami
$adakami = LegalPinjol::find(17);
if ($adakami) {
    $adakami->news_links = [
        [
            'title' => 'KPPU Hukum AdaKami Denda Rp 102,3 Miliar Terkait Suku Bunga',
            'url' => 'https://inilah.com/kppu-hukum-97-pinjol-denda-rp-755-miliar',
            'source' => 'Inilah.com',
            'date' => '2026-03-20'
        ],
        [
            'title' => 'AdaKami Digugat Nasabah Terkait Teror Debt Collector',
            'url' => 'https://stabilitas.id/nasabah-gugat-adakami-atas-dugaan-intimidasi-dc/',
            'source' => 'Stabilitas.id',
            'date' => '2025-08-15'
        ]
    ];
    $adakami->save();
}

// Kredit Pintar
$kp = LegalPinjol::find(8);
if ($kp) {
    $kp->news_links = [
        [
            'title' => 'Kredit Pintar Terkena Denda KPPU Rp 93,6 Miliar',
            'url' => 'https://beritamanado.com/kppu-sanksi-fintech-lending-kartel-bunga/',
            'source' => 'BeritaManado',
            'date' => '2026-03-21'
        ],
        [
            'title' => 'OJK Perketat Aturan Jam Operasional Penagihan Pinjol',
            'url' => 'https://www.cnbcindonesia.com/market/20260511120000-ojk-atur-penagihan-maksimal-jam-8-malam',
            'source' => 'CNBC Indonesia',
            'date' => '2026-05-11'
        ]
    ];
    $kp->save();
}

echo "Adakami & Kredit Pintar updated\n";
