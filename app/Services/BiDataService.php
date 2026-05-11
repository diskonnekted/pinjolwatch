<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Exception;

class BiDataService
{
    protected $baseUrl = 'https://api.bi.go.id/v1';

    /**
     * Mengambil Suku Bunga Acuan (BI Rate)
     */
    public function getSukuBunga()
    {
        // Cache selama 24 jam
        return Cache::remember('bi_suku_bunga', 60 * 60 * 24, function () {
            try {
                $response = Http::timeout(5)
                    ->withHeaders(['User-Agent' => 'PinjolWatch-Education/1.0'])
                    ->get("{$this->baseUrl}/suku_bunga");

                if ($response->successful()) {
                    return $response->json();
                }
                return null;
            } catch (Exception $e) {
                \Log::warning('Gagal fetch data BI Suku Bunga: ' . $e->getMessage());
                return null; 
            }
        });
    }

    /**
     * Mengambil Kurs Harian
     */
    public function getKurs()
    {
        return Cache::remember('bi_kurs', 60 * 60 * 24, function () {
            try {
                $response = Http::timeout(5)
                    ->withHeaders(['User-Agent' => 'PinjolWatch-Education/1.0'])
                    ->get("{$this->baseUrl}/kurs");

                return $response->successful() ? $response->json() : null;
            } catch (Exception $e) {
                \Log::warning('Gagal fetch data BI Kurs: ' . $e->getMessage());
                return null;
            }
        });
    }
}
