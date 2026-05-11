<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ReportSeeder extends Seeder
{
    public function run(): void
    {
        $kabIds = DB::table('kabupaten')->pluck('id');
        $threatIds = DB::table('threat_types')->pluck('id');
        $statuses = ['received', 'verified', 'forwarded', 'resolved'];
        $consents = ['internal_only', 'share_to_authorities'];

        if ($kabIds->isEmpty() || $threatIds->isEmpty()) {
            $this->command->warn('Kabupaten or ThreatType seeders must be run first. Skipping ReportSeeder.');
            return;
        }

        for ($i = 0; $i < 50; $i++) {
            DB::table('reports')->insert([
                'ticket_id' => 'PW-' . strtoupper(Str::random(6)) . '-' . date('Ymd'),
                'kabupaten_id' => $kabIds->random(),
                'threat_type_id' => $threatIds->random(),
                'app_name' => 'Pinjol_' . strtoupper(Str::random(4)),
                'chronology' => 'Laporan dummy: Debt collector menghubungi via WhatsApp dan mengancam akan menyebarkan foto KTP ke kontak darurat.',
                'is_anonymous' => rand(0, 1) ? true : false,
                'consent_scope' => $consents[array_rand($consents)],
                'status' => $statuses[array_rand($statuses)],
                'ip_hash' => bcrypt('127.0.0.' . rand(1, 255)),
                'created_at' => Carbon::now()->subDays(rand(1, 400)),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
