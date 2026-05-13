<?php

use App\Models\Kabupaten;
use Illuminate\Support\Facades\DB;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$coords = [
    'KABUPATEN ACEH SINGKIL' => [2.4333, 97.9167],
    'KABUPATEN ACEH TIMUR' => [4.6333, 97.6333],
    'KABUPATEN ACEH SELATAN' => [3.3333, 97.2000],
    'KABUPATEN ACEH TENGGARA' => [3.3667, 97.8333],
    'KABUPATEN ACEH TENGAH' => [4.5333, 96.8500],
    'KABUPATEN ACEH BARAT' => [4.4500, 96.1500],
    'KABUPATEN ACEH BESAR' => [5.3833, 95.5333],
    'KABUPATEN PIDIE' => [5.0833, 96.0000],
    'KABUPATEN BIREUEN' => [5.0333, 96.5000],
    'KABUPATEN ACEH UTARA' => [4.9167, 97.1333],
    'KABUPATEN ACEH BARAT DAYA' => [3.7833, 96.9167],
    'KABUPATEN GAYO LUES' => [3.9667, 97.3833],
    'KABUPATEN ACEH TAMIANG' => [4.2500, 97.9667],
    'KABUPATEN NAGAN RAYA' => [4.1667, 96.4167],
    'KABUPATEN ACEH JAYA' => [4.7500, 95.6333],
    'KABUPATEN BENER MERIAH' => [4.7500, 96.8667],
    'KABUPATEN PIDIE JAYA' => [5.1167, 96.2167],
    'KOTA BANDA ACEH' => [5.5500, 95.3167],
    'KOTA SABANG' => [5.8917, 95.3194],
    'KOTA LHOKSEUMAWE' => [5.1800, 97.1500],
    'KOTA LANGSA' => [4.4667, 97.9667],
    'KOTA SUBULUSSALAM' => [2.6167, 98.0000],
];

foreach ($coords as $name => $c) {
    Kabupaten::where('nama', $name)->update([
        'latitude' => $c[0],
        'longitude' => $c[1]
    ]);
}

echo "Coordinates updated for " . count($coords) . " Aceh regions.\n";
