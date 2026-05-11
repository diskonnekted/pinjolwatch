<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Province;
use App\Models\Kabupaten;
use Illuminate\Support\Facades\File;

class WilayahIndonesiaSeeder extends Seeder
{
    public function run(): void
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        Province::truncate();
        Kabupaten::truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        $provincesJson = File::get(storage_path('app/json_data/provinces.json'));
        $regenciesJson = File::get(storage_path('app/json_data/regencies.json'));

        $provincesData = json_decode($provincesJson, true);
        $regenciesData = json_decode($regenciesJson, true);

        $this->command->info('Seeding Provinces...');
        $provinceMap = []; // Maps JSON ID to DB ID

        foreach ($provincesData as $p) {
            $province = Province::create([
                'name' => $p['name'],
            ]);
            $provinceMap[$p['id']] = $province->id;
        }

        $this->command->info('Seeding Regencies...');
        foreach ($regenciesData as $r) {
            if (isset($provinceMap[$r['province_id']])) {
                Kabupaten::create([
                    'province_id' => $provinceMap[$r['province_id']],
                    'kode_bps' => $r['id'],
                    'nama' => $r['name'],
                    'provinsi' => $provincesData[array_search($r['province_id'], array_column($provincesData, 'id'))]['name'],
                ]);
            }
        }
        
        $this->command->info('Wilayah Indonesia seeding complete!');
    }
}
