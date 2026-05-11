Berikut adalah analisis dan implementasi API dari **Bank Indonesia (BI)** yang dapat dimanfaatkan untuk `PinjolWatch`.

### ⚠️ PENTING: Peran BI vs OJK
*   **OJK** adalah regulator fintech/pinjol. (Gunakan OJK untuk cek legalitas pinjol).
*   **BI** adalah regulator moneter & sistem pembayaran.
*   **Relevansi untuk PinjolWatch:** API BI **tidak** berisi daftar pinjol legal/ilegal. Namun, API BI sangat berguna untuk **Bagian Edukasi & Literasi Keuangan** Anda, khususnya untuk membandingkan **Suku Bunga Bank Resmi vs Suku Bunga Pinjol** agar pengguna paham betapa mahalnya pinjol ilegal.

---

### 🔍 API Publik Bank Indonesia (Data Umum)

Bank Indonesia memiliki portal API Developer (`api.bi.go.id`). Berikut adalah endpoint yang **paling relevan** dan stabil untuk fitur edukasi aplikasi Anda:

#### 1. Suku Bunga Acuan (BI Rate) & Bunga Bank
Untuk menunjukkan kepada pengguna bahwa bunga bank itu jauh lebih murah daripada pinjol.
*   **Endpoint:** `https://api.bi.go.id/v1/suku_bunga`
*   **Data:** BI 7-Day Reverse Repo Rate, Suku Bunga Deposito, dll.

#### 2. Kurs Transaksi Bank Indonesia
Untuk konteks ekonomi umum (opsional, kurang relevan untuk pinjol lokal, tapi bagus untuk *dashboard* ekonomi).
*   **Endpoint:** `https://api.bi.go.id/v1/kurs`

#### 3. Inflasi (IHK)
Untuk literasi keuangan mengenai daya beli.
*   **Endpoint:** `https://api.bi.go.id/v1/inflasi` (Data agregat).

---

###  Implementasi di Laravel: "EduKursus & Bunga"

Kita akan membuat layanan yang mengambil data **Suku Bunga** dan **Kurs**, lalu menyimpannya di *Cache* agar tidak membebani server BI setiap kali halaman dibuka.

#### 1. Migration (Opsional: Jika ingin simpan histori)
Biasanya cukup pakai *Cache*, tapi jika ingin arsip:
```bash
php artisan make:migration create_bi_rates_table
```

#### 2. Service: `App\Services/BiDataService.php`
Buat file ini untuk menangani logika API dan Cache.

```php
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
     * Berguna untuk membandingkan dengan bunga pinjol di halaman literasi
     */
    public function getSukuBunga()
    {
        // Cache selama 24 jam (Data BI tidak berubah tiap jam)
        return Cache::remember('bi_suku_bunga', 60 * 60 * 24, function () {
            try {
                $response = Http::timeout(5)
                    ->withHeaders(['User-Agent' => 'PinjolWatch-Education/1.0'])
                    ->get("{$this->baseUrl}/suku_bunga");

                if ($response->successful()) {
                    // Struktur response BI biasanya JSON
                    return $response->json();
                }
                return null;
            } catch (Exception $e) {
                \Log::warning('Gagal fetch data BI Suku Bunga: ' . $e->getMessage());
                return null; // Fallback data statis jika API down
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
```

#### 3. Controller & View (Contoh: Halaman Perbandingan Bunga)

Gunakan data ini untuk membuat **Tabel Perbandingan** yang "menohok" agar korban sadar betapa mahalnya pinjol.

**`resources/views/literasi/perbandingan-bunga.blade.php`**

```blade
@php
    $biService = app(\App\Services\BiDataService::class);
    $biData = $biService->getSukuBunga();
    
    // Asumsi BI memberikan array data, kita ambil yang terbaru
    // Sesuaikan dengan struktur JSON asli dari api.bi.go.id
    $currentBiRate = isset($biData['data'][0]['value']) ? $biData['data'][0]['value'] : '6.00'; 
@endphp

<div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
    <h3 class="text-xl font-bold mb-4 text-slate-800">Perbandingan Bunga: Legal vs Ilegal</h3>
    
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-slate-600">
            <thead class="text-xs text-slate-700 uppercase bg-slate-50">
                <tr>
                    <th class="px-4 py-3">Lembaga</th>
                    <th class="px-4 py-3">Suku Bunga (Per Tahun)</th>
                    <th class="px-4 py-3">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-emerald-50 border-b border-emerald-100">
                    <td class="px-4 py-3 font-medium text-emerald-800">
                        🏦 Bank Umum / Lembaga Resmi
                        <br><span class="text-xs text-slate-500">(Sumber: BI Rate Terkini)</span>
                    </td>
                    <td class="px-4 py-3 font-bold text-emerald-700">{{ $currentBiRate }}%</td>
                    <td class="px-4 py-3"><span class="bg-emerald-100 text-emerald-800 text-xs px-2 py-1 rounded">Aman & Diawasi</span></td>
                </tr>
                <tr class="bg-red-50 border-b border-red-100">
                    <td class="px-4 py-3 font-medium text-red-800">
                        🔴 Pinjol Ilegal / Fiktif
                    </td>
                    <td class="px-4 py-3 font-bold text-red-700">Bisa mencapai 1.000%+</td>
                    <td class="px-4 py-3"><span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded">Bahaya & Ilegal</span></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mt-4 bg-amber-50 p-4 rounded-lg border border-amber-200 text-sm">
        <p class="font-semibold text-amber-800">💡 Tahukah Anda?</p>
        <p class="text-amber-700 mt-1">
            Suku bunga Bank Indonesia saat ini sekitar <strong>{{ $currentBiRate }}% per tahun</strong>. 
            Jika Pinjol membebankan 0.8% per hari, maka dalam setahun itu setara dengan <strong>~292% per tahun</strong> (tanpa bunga berbunga). 
            Itu jauh di atas kewajaran dan merupakan jebakan utang.
        </p>
    </div>
    
    <p class="text-xs text-slate-400 mt-2 text-right">
        Sumber Data Suku Bunga: <a href="https://api.bi.go.id/v1/suku_bunga" target="_blank" class="underline">Bank Indonesia API</a>
    </p>
</div>
```

---

### 🚀 Strategi Integrasi Terbaik

1.  **Jangan Real-time saat User Load:**
    Jangan panggil API BI saat user membuka halaman (akan lambat dan bisa kena *rate limit* BI). Panggil API tersebut via **Laravel Scheduler** (misal: `daily`) atau gunakan **Lazy Loading** dengan cache 24 jam seperti contoh di atas.

2.  **Fallback Data (Penting):**
    API pemerintah kadang *down* atau *maintenance*. Selalu siapkan *fallback* (data statis hardcoded) jika response gagal, agar tampilan halaman literasi Anda tidak rusak.
    ```php
    if (!$biData) {
        $biData = ['data' => [['value' => '6.00']]]; // Data default
    }
    ```

3.  **Fokus Edukasi:**
    Gunakan data ini di halaman `/literasi-keuangan` untuk argumen:
    > *"Bunga Pinjol Ilegal itu 50x lipat lebih mahal dari Bunga Bank. Jika Anda butuh uang, bunga Bank jauh lebih masuk akal untuk dilunasi."*

### ✅ Kesimpulan: Mana yang harus dipakai?
*   Untuk **Cek Legalitas Pinjol**: Gunakan data **OJK** (daftar fintech), bukan BI.
*   Untuk **Edukasi/Perbandingan Bunga**: Gunakan API **BI** (`suku_bunga`).
*   Untuk **Data Ekonomi Makro**: Gunakan API **BI** (`inflasi`, `perekonomian`).
