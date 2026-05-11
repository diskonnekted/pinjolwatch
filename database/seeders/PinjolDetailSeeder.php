<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LegalPinjol;

class PinjolDetailSeeder extends Seeder
{
    public function run(): void
    {
        $details = [
            'Akulaku' => [
                'collection_patterns' => 'DC Lapangan aktif (>30 hari), penagihan kontak darurat intensif, pelaporan SLIK OJK sangat disiplin.',
                'notable_cases' => 'Banyak keluhan terkait bunga tinggi dan penagihan ke kontak darurat yang tidak terdaftar.'
            ],
            'Kredit Pintar' => [
                'collection_patterns' => 'DC Lapangan sangat aktif di Jabodetabek, frekuensi pengingat digital sangat tinggi.',
                'notable_cases' => 'Pernah menjadi sorotan karena intensitas penagihan digital yang dianggap mengganggu kenyamanan.'
            ],
            'AdaKami' => [
                'collection_patterns' => 'Dominasi Desk Collection (telepon/pesan), DC Lapangan melalui pihak ketiga (kurang masif).',
                'notable_cases' => 'Kasus viral terkait dugaan penagihan tidak etis yang berujung pada pengawasan ketat OJK.'
            ]
        ];

        foreach ($details as $name => $info) {
            LegalPinjol::where('app_name', $name)->update($info);
        }
        
        // General info for others
        LegalPinjol::whereNull('collection_patterns')->update([
            'collection_patterns' => 'Secara umum mengikuti aturan OJK (pukul 08.00-20.00), pengingat via WhatsApp/telepon.',
            'notable_cases' => 'Tidak ada kasus besar yang viral secara nasional, namun tetap wajib waspada terhadap oknum penagih.'
        ]);
    }
}
