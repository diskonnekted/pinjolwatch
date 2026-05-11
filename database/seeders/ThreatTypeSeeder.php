<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThreatTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['code' => 'VERBAL', 'label' => 'Ancaman Verbal/Intimidasi', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'DATA_LEAK', 'label' => 'Penyebaran Data Pribadi (Doxing)', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'PHYSICAL', 'label' => 'Kunjungan/Intimidasi Fisik', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'DEBT_HARASSMENT', 'label' => 'Penagihan ke Keluarga/Rekan Kerja', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'FAKE_LEGAL', 'label' => 'Pemalsuan Dokumen Hukum/Polisi', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('threat_types')->insert($types);
    }
}
