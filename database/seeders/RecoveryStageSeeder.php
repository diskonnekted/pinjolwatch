<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecoveryStageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stages = [
            [
                'name' => 'Fase Kesadaran & Keamanan',
                'slug' => 'awareness-safety',
                'description' => 'Langkah pertama untuk berhenti meminjam dan mengamankan diri dari teror.',
                'order' => 1,
                'icon' => 'shield-check',
                'tasks' => [
                    'Ganti nomor HP atau matikan izin aplikasi',
                    'Beritahu kontak darurat/keluarga tentang situasi sebenarnya',
                    'Hapus semua aplikasi pinjol ilegal dari ponsel',
                    'Buat laporan pertama di PinjolWatch'
                ]
            ],
            [
                'name' => 'Fase Inventarisasi & Pembersihan',
                'slug' => 'cleanup-inventory',
                'description' => 'Mendata semua utang dan memilah mana yang legal dan ilegal.',
                'order' => 2,
                'icon' => 'clipboard-list',
                'tasks' => [
                    'List semua aplikasi, nominal pokok, dan bunga',
                    'Identifikasi mana yang terdaftar OJK dan mana yang tidak',
                    'Cek skor SLIK OJK (khusus pinjol legal)',
                    'Siapkan draf negosiasi untuk pinjol legal'
                ]
            ],
            [
                'name' => 'Fase Stabilitas Mental',
                'slug' => 'mental-stability',
                'description' => 'Fokus pada kesehatan mental dan tidak lagi merasa bersalah/malu.',
                'order' => 3,
                'icon' => 'heart-pulse',
                'tasks' => [
                    'Konsultasi dengan psikolog atau teman terpercaya',
                    'Mulai rutin berolahraga/meditasi untuk kurangi kecemasan',
                    'Berhenti mengecek media sosial penagih/forum pinjol yang toxic',
                    'Ikuti komunitas penyintas untuk saling menguatkan'
                ]
            ],
            [
                'name' => 'Fase Pemberdayaan Ekonomi',
                'slug' => 'economic-empowerment',
                'description' => 'Membangun kembali keuangan dan masa depan tanpa utang.',
                'order' => 4,
                'icon' => 'trending-up',
                'tasks' => [
                    'Mulai menabung dana darurat minimal 500rb',
                    'Cari penghasilan tambahan (side hustle)',
                    'Edukasi diri tentang literasi keuangan dasar',
                    'Menjadi mentor/berbagi cerita untuk membantu korban lain'
                ]
            ]
        ];

        foreach ($stages as $stage) {
            \App\Models\RecoveryStage::updateOrCreate(
                ['slug' => $stage['slug']],
                [
                    'name' => $stage['name'],
                    'description' => $stage['description'],
                    'order' => $stage['order'],
                    'icon' => $stage['icon'],
                    'tasks' => $stage['tasks']
                ]
            );
        }
    }
}
