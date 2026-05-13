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
        $threatIds = DB::table('threat_types')->pluck('id');
        $statuses = ['received', 'verified', 'forwarded', 'resolved'];
        $consents = ['internal_only', 'share_to_authorities'];

        if ($threatIds->isEmpty()) {
            $this->command->warn('ThreatType seeder must be run first. Skipping ReportSeeder.');
            return;
        }

        // Fetch Kabupaten IDs grouped by Province
        $provinces = DB::table('kabupaten')
            ->select('provinsi', DB::raw('id'))
            ->get()
            ->groupBy('provinsi')
            ->map(function($items) {
                return $items->pluck('id')->toArray();
            })
            ->toArray();

        // OJK-style weighted probability distribution
        $weights = [
            'JAWA BARAT' => 28,
            'DKI JAKARTA' => 26,
            'JAWA TIMUR' => 14,
            'BANTEN' => 9,
            'JAWA TENGAH' => 8,
            'SUMATERA UTARA' => 4,
        ];

        // Fill remaining weight for other provinces
        $otherProvinces = array_diff(array_keys($provinces), array_keys($weights));
        $otherWeight = 11;
        $weightPerOther = count($otherProvinces) > 0 ? $otherWeight / count($otherProvinces) : 0;
        
        foreach ($otherProvinces as $op) {
            $weights[$op] = $weightPerOther;
        }

        for ($i = 0; $i < 200; $i++) {
            // Weighted random selection of province
            $rand = mt_rand(1, 10000) / 100;
            $currentWeight = 0;
            $selectedProvince = 'DKI JAKARTA'; // Default

            foreach ($weights as $prov => $w) {
                $currentWeight += $w;
                if ($rand <= $currentWeight) {
                    $selectedProvince = $prov;
                    break;
                }
            }

            $kabupatenId = $provinces[$selectedProvince][array_rand($provinces[$selectedProvince])];

            DB::table('reports')->insert([
                'ticket_id' => 'PW-' . strtoupper(Str::random(6)) . '-' . date('Ymd'),
                'kabupaten_id' => $kabupatenId,
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
