<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KabupatenSeeder extends Seeder
{
    public function run(): void
    {
        $kabupatens = [
            ['kode_bps' => '3273', 'nama' => 'Kota Bandung', 'provinsi' => 'Jawa Barat', 'created_at' => now(), 'updated_at' => now()],
            ['kode_bps' => '3201', 'nama' => 'Kabupaten Bogor', 'provinsi' => 'Jawa Barat', 'created_at' => now(), 'updated_at' => now()],
            ['kode_bps' => '3374', 'nama' => 'Kota Semarang', 'provinsi' => 'Jawa Tengah', 'created_at' => now(), 'updated_at' => now()],
            ['kode_bps' => '3601', 'nama' => 'Kabupaten Pandeglang', 'provinsi' => 'Banten', 'created_at' => now(), 'updated_at' => now()],
            ['kode_bps' => '3171', 'nama' => 'Kota Jakarta Pusat', 'provinsi' => 'DKI Jakarta', 'created_at' => now(), 'updated_at' => now()],
            ['kode_bps' => '3324', 'nama' => 'Kabupaten Pekalongan', 'provinsi' => 'Jawa Tengah', 'created_at' => now(), 'updated_at' => now()],
            ['kode_bps' => '3571', 'nama' => 'Kota Kediri', 'provinsi' => 'Jawa Timur', 'created_at' => now(), 'updated_at' => now()],
            ['kode_bps' => '5171', 'nama' => 'Kota Denpasar', 'provinsi' => 'Bali', 'created_at' => now(), 'updated_at' => now()],
            ['kode_bps' => '1275', 'nama' => 'Kota Medan', 'provinsi' => 'Sumatera Utara', 'created_at' => now(), 'updated_at' => now()],
            ['kode_bps' => '7371', 'nama' => 'Kota Makassar', 'provinsi' => 'Sulawesi Selatan', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('kabupaten')->insert($kabupatens);
    }
}
