<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OjkFintechSyncService
{
    protected $datasetUrl = 'https://data.ojk.go.id/dataset/daftar-fintech-lending-terdaftar-dan-berizin?format=json';
    protected $cacheKey = 'ojk_fintech_last_sync';

    public function sync(): array
    {
        try {
            $response = Http::timeout(30)
                ->withHeaders(['User-Agent' => 'PinjolWatch/1.0 (+https://pinjolwatch.id)'])
                ->get($this->datasetUrl);

            if (!$response->successful()) {
                throw new \Exception('Gagal mengambil dataset OJK: ' . $response->status());
            }

            $data = $response->json();
            $records = $data['records'] ?? [];

            DB::transaction(function () use ($records) {
                // Kosongkan tabel sementara
                DB::table('ojk_fintech_licensed')->truncate();

                foreach ($records as $row) {
                    DB::table('ojk_fintech_licensed')->insert([
                        'nama_platform' => $row['Nama Platform'] ?? null,
                        'izin_nomor' => $row['Nomor Izin'] ?? null,
                        'status' => $row['Status'] ?? null,
                        'alamat' => $row['Alamat'] ?? null,
                        'website' => $row['Website'] ?? null,
                        'email' => $row['Email'] ?? null,
                        'telepon' => $row['Telepon'] ?? null,
                        'tanggal_update' => Carbon::now(),
                    ]);
                }
            });

            cache()->put($this->cacheKey, now(), now()->addDays(7)); // Cache 7 hari

            return ['success' => true, 'count' => count($records)];
        } catch (\Exception $e) {
            \Log::error('OJK Sync Failed: ' . $e->getMessage());
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function isPlatformLegal(string $appName)
    {
        // Cari di tabel lokal yang sudah disinkronisasi
        return DB::table('ojk_fintech_licensed')
            ->where('nama_platform', 'LIKE', "%{$appName}%")
            ->first();
    }
}
