Berikut adalah **panduan lengkap pemanfaatan data & API resmi OJK** untuk `PinjolWatch`. Penting untuk diketahui: **OJK tidak menyediakan REST API publik terbuka** seperti platform teknologi modern. Namun, OJK menyediakan **Portal Data Terbuka (Open Data)** dengan dataset resmi yang dapat diakses secara programatik dalam format JSON/CSV, serta beberapa layanan terintegrasi yang aman secara hukum.

---
### 📊 1. SUMBER DATA RESMI OJK YANG DAPAT DIINTEGRASIKAN

| Layanan | URL Resmi | Format | Keterangan |
|---------|-----------|--------|------------|
| **🔍 Daftar Fintech Lending Terdaftar & Berizin** | `https://data.ojk.go.id/dataset/daftar-fintech-lending-terdaftar-dan-berizin` | CSV / JSON | Update berkala (bulanan). Berisi nama platform, nomor izin, status, alamat, kontak resmi. |
| **📈 Statistik Industri Fintech Lending** | `https://data.ojk.go.id/dataset/statistik-fintech-lending` | CSV / JSON | Data agregat penyaluran, NPL, jumlah peminjam (tanpa identitas pribadi). |
| **️ Portal Konsumen OJK** | `https://konsumen.ojk.go.id/` | Web Form | Tidak ada API publik. Digunakan untuk pelaporan resmi oleh masyarakat. |
| **📜 SLIK OJK (Sistem Informasi Debitur)** | `https://slik.ojk.go.id/` | API Terotorisasi | Hanya dapat diakses oleh lembaga keuangan berizin atau individu pemilik data (memerlukan registrasi & autentikasi). |
| **📞 WhatsApp Verifikasi Legalitas** | `081-157-157-157` | Bot WhatsApp | Bukan API, tapi bisa diintegrasikan sebagai fallback UX untuk verifikasi cepat oleh pengguna. |

---
### ⚠️ 2. REALITA TEKNIS & BATASAN HUKUM
- ✅ **Diperbolehkan**: Mengunduh dataset resmi dari `data.ojk.go.id`, menyimpannya di server Anda, memperbarui secara berkala, dan menampilkannya dengan atribusi `"Sumber: OJK"`.
- ❌ **Dilarang**: Web scraping tanpa izin, bypass captcha, mengakses endpoint internal, atau mengklaim kemitraan resmi dengan OJK.
- 🔄 **Frekuensi Update**: Dataset fintech lending diperbarui ±1x/bulan. Tidak real-time.
- 📜 **Kepatuhan**: Wajib mencantumkan sumber, tidak mengubah data mentah, dan menyertakan disclaimer `"Data bersumber dari OJK. Verifikasi akhir dapat dilakukan melalui https://ojk.go.id"`.

---
### 🛠️ 3. IMPLEMENTASI LARAVEL: SINKRONISASI DATASET OJK

Karena tidak ada REST API publik, pendekatan terbaik adalah **sinkronisasi dataset periodik** ke database lokal Anda. Ini lebih stabil, aman, dan sesuai ketentuan OJK.

#### A. Buat Service untuk Fetch & Parse Dataset
```bash
php artisan make:service OjkFintechSyncService
```

**`app/Services/OjkFintechSyncService.php`**
```php
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
                // Kosongkan tabel sementara (atau gunakan soft delete untuk audit)
                DB::table('ojk_fintech_licensed')->truncate();

                foreach ($records as $row) {
                    DB::table('ojk_fintech_licensed')->insert([
                        'nama_platform' => $row['Nama Platform'] ?? null,
                        'izin_nomor' => $row['Nomor Izin'] ?? null,
                        'status' => $row['Status'] ?? null, // Terdaftar / Berizin / Dicabut
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

    public function isPlatformLegal(string $appName): ?array
    {
        // Cari di tabel lokal yang sudah disinkronisasi
        return DB::table('ojk_fintech_licensed')
            ->where('nama_platform', 'LIKE', "%{$appName}%")
            ->first();
    }
}
```

#### B. Buat Migration untuk Tabel Lokal
```bash
php artisan make:migration create_ojk_fintech_licensed_table
```
```php
Schema::create('ojk_fintech_licensed', function (Blueprint $table) {
    $table->id();
    $table->string('nama_platform');
    $table->string('izin_nomor')->nullable();
    $table->string('status'); // Terdaftar, Berizin, Dicabut, dll
    $table->text('alamat')->nullable();
    $table->string('website')->nullable();
    $table->string('email')->nullable();
    $table->string('telepon')->nullable();
    $table->timestamp('tanggal_update');
    $table->timestamps();
    $table->index('nama_platform');
});
```

#### C. Jadwalkan Sinkronisasi Otomatis
**`routes/console.php`**
```php
use Illuminate\Support\Facades\Schedule;
use App\Services\OjkFintechSyncService;

Schedule::call(function () {
    $service = app(OjkFintechSyncService::class);
    $result = $service->sync();
    \Log::info('OJK Fintech Sync: ' . json_encode($result));
})->weekly()->mondays()->at('03:00');
```

#### D. Gunakan di Form Pelaporan (Livewire)
```php
// app/Livewire/ReportForm.php
public function validateAppName($value)
{
    if (!$value) return;

    $ojkService = app(OjkFintechSyncService::class);
    $match = $ojkService->isPlatformLegal($value);

    if ($match) {
        $this->app_legal_status = $match->status; // Tampilkan badge di UI
    } else {
        $this->app_legal_status = 'tidak_ditemukan'; // Kemungkinan ilegal atau typo
    }
}
```

---
### 🌐 4. ALTERNATIF & FALLBACK STRATEGI

| Kebutuhan | Solusi Resmi OJK | Implementasi di PinjolWatch |
|-----------|------------------|-----------------------------|
| Verifikasi cepat oleh pengguna | WhatsApp Bot `081-157-157-157` | Tambahkan tombol `"Cek Legalitas via WA OJK"` yang membuka `https://wa.me/6281157157157?text=Cek%20legalitas%20pinjol%3A%20[NAMA_APP]` |
| Pelaporan resmi | Portal `konsumen.ojk.go.id` | Redirect tombol `"Lapor ke OJK"` ke form resmi. Jangan buat proxy/form tiruan. |
| Riwayat kredit individu | SLIK OJK (`slik.ojk.go.id`) | Tidak bisa diintegrasikan publik. Arahkan pengguna ke `https://slik.ojk.go.id/id/` untuk cek mandiri. |
| Data real-time | Tidak tersedia | Gunakan cache lokal + update mingguan. Tampilkan `"Data terakhir diperbarui: {{ $last_sync }}"` |

---
### ⚖️ 5. BEST PRACTICE KEPUHUHAN & KEAMANAN

1. **Attribution Wajib**: Tampilkan `"Sumber data: Otoritas Jasa Keuangan (OJK) - data.ojk.go.id"` di footer tabel/peta.
2. **Rate Limiting**: Jangan fetch dataset lebih dari 1x/hari. OJK membatasi akses otomatis jika terdeteksi spam.
3. **Validasi Input**: Jangan langsung trust data OJK. Lakukan fuzzy matching (`similar_text()` atau `levenshtein`) karena nama aplikasi sering typo.
4. **Disclaimer Hukum**: 
   ```html
   <p class="text-xs text-gray-500">
     Data ini bersumber dari portal terbuka OJK. Status "Terdaftar/Berizin" tidak menjamin praktik penagihan yang legal. 
     Untuk verifikasi akhir, kunjungi <a href="https://ojk.go.id" class="underline">ojk.go.id</a>.
   </p>
   ```
5. **Audit Trail**: Simpan log setiap kali sync berjalan (`ojk_sync_logs` table) untuk transparansi & debugging.

---
### 📦 6. STRUKTUR DATABASE TAMBAHAN (Opsional)
```php
// migration: create_ojk_sync_logs_table
Schema::create('ojk_sync_logs', function (Blueprint $table) {
    $table->id();
    $table->timestamp('synced_at');
    $table->integer('records_count')->nullable();
    $table->string('status'); // success, failed, partial
    $table->text('error_message')->nullable();
    $table->timestamps();
});
```

---
### ✅ CHECKLIST INTEGRASI OJK
- [x] Gunakan `data.ojk.go.id` sebagai sumber resmi
- [x] Sinkronisasi ke database lokal (jangan fetch real-time per request)
- [x] Jadwal update mingguan via Laravel Scheduler
- [x] Tampilkan atribusi & disclaimer hukum
- [x] Fallback ke WhatsApp OJK untuk verifikasi user
- [x] Tidak melakukan scraping, bypass, atau klaim kemitraan
- [x] Log semua sync untuk audit kepatuhan

