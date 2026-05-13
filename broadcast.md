Berikut adalah **Template Pesan Broadcast** yang dirancang khusus untuk pengguna PinjolWatch. Pesan ini disusun dengan pendekatan **trauma-informed**: hangat, transparan, memberdayakan, dan tidak membebani.

Saya sediakan dalam **3 format** agar Anda bisa memilih sesuai saluran distribusi (Email, In-App Notification, atau WhatsApp).

---
## 📧 OPSI 1: FORMAT EMAIL (Lengkap & Personal)

**Subject:** Kabar Baik dari PinjolWatch: Kami Tumbuh Bersama Anda 💙

**Preheader:** Kami hadir lebih dekat dengan relawan, LBH, dan konsultan untuk Anda.

---

**Halo, Sobat PinjolWatch 👋**

Terima kasih sudah menjadi bagian dari perjalanan kami. Setiap laporan, setiap cerita, dan setiap kepercayaan yang Anda berikan adalah alasan mengapa PinjolWatch terus berkembang.

Hari ini, kami ingin berbagi kabar baik:

### 🌱 PinjolWatch Akan Semakin Kuat untuk Anda

Kami sedang mempersiapkan pengembangan besar-besaran agar dukungan untuk Anda semakin lengkap:

✅ **Jaringan Relawan Terlatih**  
Relawan dari berbagai latar belakang akan siap mendampingi Anda via chat anonim, dengan pelatihan khusus tentang pendekatan trauma-informed & literasi keuangan.

✅ **Konsultasi Hukum Gratis (via Mitra LBH)**  
Kami bekerja sama dengan Lembaga Bantuan Hukum terpercaya untuk menyediakan sesi konsultasi hukum gratis bagi korban pinjol ilegal. Anda bisa bertanya tentang hak Anda, cara melapor, atau langkah hukum yang aman.

✅ **Dukungan Psikologis Terjangkau**  
Kolaborasi dengan psikolog klinis & konselor bersertifikat untuk menyediakan sesi konseling dengan skema "bayar sesuai kemampuan" atau gratis untuk kondisi krisis.

✅ **Fitur Tanya Jawab Langsung**  
Soon: Anda bisa kirim pertanyaan umum (tanpa menyebut identitas) dan tim ahli kami akan menjawabnya di halaman FAQ publik.

> 🕊️ **Prinsip Kami Tetap Sama:**  
> - Anonimitas Anda adalah prioritas  
> - Tidak ada penghakiman, hanya pendampingan  
> - Data Anda dilindungi sesuai UU PDP

---

### 💬 Kami Butuh Suara Anda

Pengembangan ini kami lakukan **bersama Anda**. Karena itu, kami ingin mendengar:

**"Fitur atau dukungan apa yang paling Anda butuhkan dari PinjolWatch ke depannya?"**

🔹 [Klik di sini untuk mengisi survei singkat (2 menit)](https://pinjolwatch.id/feedback)  
🔹 Atau balas email ini dengan cerita/kritik/saran Anda

Setiap masukan Anda akan kami baca langsung. Tidak ada jawaban yang "salah". Yang ada hanya peluang untuk membuat PinjolWatch lebih bermanfaat bagi Anda.

---

### 🙏 Terima Kasih Sudah Percaya

Kami tahu, mempercayakan cerita Anda pada platform digital bukan hal mudah. Terima kasih sudah memilih PinjolWatch sebagai teman dalam perjalanan ini.

Jika hari ini Anda sedang berat, ingatlah:  
**Anda tidak sendirian. Kami di sini. Dan kami akan terus berjuang agar Anda punya tempat yang aman untuk pulih.**

Salam hangat,  
**Tim PinjolWatch**  
💙 [pinjolwatch.id](https://pinjolwatch.id)

---
> 📌 *Catatan: Layanan konsultasi hukum & psikologis akan diluncurkan bertahap mulai Q3 2026. Informasi lebih lanjut akan kami sampaikan via email & notifikasi aplikasi. Untuk kebutuhan darurat, silakan hubungi: OJK 157 | Healing 119 ext. 8 | Polisi 110.*

---
## 🔔 OPSI 2: FORMAT IN-APP NOTIFICATION (Singkat & Action-Oriented)

**Title:** 🎉 PinjolWatch Makin Lengkap untuk Anda!

**Body:**  
Kami hadirkan relawan, LBH, & konsultan psikologis untuk dampingi Anda.  
Fitur baru segera hadir! 🚀

**Butuh masukan Anda:**  
Fitur apa yang paling Anda butuhkan selanjutnya?  
👉 [Berikan Masukan](https://pinjolwatch.id/feedback)

*Anonim • Aman • Tanpa Penghakiman*

---
## 💬 OPSI 3: FORMAT WHATSAPP BROADCAST (Personal & Conversational)

```
Halo, Sobat PinjolWatch 💙

Ada kabar baik nih dari kami!

🌱 PinjolWatch akan segera menghadirkan:
✅ Relawan terlatih untuk dampingi Anda via chat anonim
✅ Konsultasi hukum GRATIS bersama LBH mitra
✅ Dukungan psikologis dengan skema terjangkau
✅ Fitur Tanya Jawab langsung dengan tim ahli

Semua ini kami lakukan agar Anda punya tempat yang lebih aman untuk pulih.

💬 Kami butuh suara Anda:
"Fitur atau dukungan apa yang paling kamu butuhkan dari PinjolWatch ke depannya?"

👉 Klik untuk isi survei 2 menit:
https://pinjolwatch.id/feedback

Atau balas chat ini dengan cerita/kritik/saranmu.
Kami baca satu per satu. 🙏

Terima kasih sudah percaya pada PinjolWatch.
Kamu tidak sendirian. Kami di sini. 💙

- Tim PinjolWatch
🔒 Anonim • Aman • Tanpa Penghakiman

*Catatan: Layanan baru akan diluncurkan bertahap. Untuk darurat: OJK 157 | Healing 119 ext. 8 | Polisi 110*
```

---
## 🛠️ IMPLEMENTASI TEKNIS (Laravel)

### 1. Database Migration untuk Feedback
```bash
php artisan make:migration create_user_feedback_table
```

```php
// database/migrations/xxxx_xx_xx_create_user_feedback_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_feedback', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->text('feedback'); // Masukan user
            $table->json('feature_votes')->nullable(); // Fitur yang dipilih (jika pakai pilihan ganda)
            $table->string('source')->default('broadcast'); // email, in-app, whatsapp
            $table->boolean('is_anonymous')->default(true);
            $table->timestamp('read_at')->nullable(); // Kapan admin membaca
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_feedback');
    }
};
```

### 2. Controller untuk Menangani Feedback
```php
// app/Http/Controllers/FeedbackController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserFeedback;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'feedback' => 'required|string|max:2000',
            'feature_votes' => 'nullable|array',
            'is_anonymous' => 'boolean',
        ]);

        UserFeedback::create([
            'user_id' => $validated['is_anonymous'] ? null : Auth::id(),
            'feedback' => $validated['feedback'],
            'feature_votes' => $validated['feature_votes'] ?? null,
            'source' => $request->header('X-Feedback-Source', 'web'),
            'is_anonymous' => $validated['is_anonymous'] ?? true,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Terima kasih! Masukan Anda sudah kami terima.'
        ]);
    }
}
```

### 3. Route & Middleware
```php
// routes/web.php
Route::middleware(['throttle:3,1'])->post('/feedback', [App\Http\Controllers\FeedbackController::class, 'store'])
    ->name('feedback.store');
```

### 4. Simple Feedback Form (Blade + Alpine.js)
```blade
<!-- resources/views/components/feedback-modal.blade.php -->
<div x-data="{ open: false }" class="relative">
  <!-- Trigger: bisa dari button atau auto-show setelah broadcast dibaca -->
  <button @click="open = true" class="text-blue-600 hover:underline">Berikan Masukan</button>

  <!-- Modal -->
  <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" style="display: none;">
    <div class="bg-white rounded-2xl p-6 max-w-lg w-full mx-4">
      <h3 class="text-lg font-bold mb-4">💬 Apa yang Kamu Butuhkan Selanjutnya?</h3>
      
      <form wire:submit.prevent="submitFeedback" class="space-y-4">
        <div>
          <label class="block text-sm font-medium mb-1">Pilih fitur yang paling kamu butuhkan (boleh lebih dari satu):</label>
          <div class="space-y-2">
            <label class="flex items-center gap-2">
              <input type="checkbox" name="features[]" value="chat_relawan" class="accent-blue-600">
              <span class="text-sm">Chat dengan relawan terlatih</span>
            </label>
            <label class="flex items-center gap-2">
              <input type="checkbox" name="features[]" value="konsultasi_hukum" class="accent-blue-600">
              <span class="text-sm">Konsultasi hukum gratis via LBH</span>
            </label>
            <label class="flex items-center gap-2">
              <input type="checkbox" name="features[]" value="konseling_psikologis" class="accent-blue-600">
              <span class="text-sm">Konseling psikologis terjangkau</span>
            </label>
            <label class="flex items-center gap-2">
              <input type="checkbox" name="features[]" value="forum_komunitas" class="accent-blue-600">
              <span class="text-sm">Forum komunitas anonim</span>
            </label>
            <label class="flex items-center gap-2">
              <input type="checkbox" name="features[]" value="lainnya" class="accent-blue-600">
              <span class="text-sm">Lainnya (sebutkan di bawah)</span>
            </label>
          </div>
        </div>

        <div>
          <label class="block text-sm font-medium mb-1">Ceritakan lebih detail (opsional):</label>
          <textarea name="feedback" rows="3" class="w-full border rounded-lg p-2" placeholder="Contoh: Saya butuh panduan cara negosiasi dengan DC..."></textarea>
        </div>

        <div class="flex items-center gap-2">
          <input type="checkbox" name="is_anonymous" checked class="accent-blue-600">
          <span class="text-sm text-slate-600">Kirim secara anonim (tidak menyertakan identitas)</span>
        </div>

        <div class="flex gap-3 pt-2">
          <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg">Kirim Masukan</button>
          <button type="button" @click="open = false" class="flex-1 bg-slate-200 hover:bg-slate-300 py-2 rounded-lg">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>
```

---
## 📊 ANALISIS FEEDBACK (Admin Dashboard)

### Simple Aggregation Query
```php
// app/Http/Controllers/Admin/FeedbackController.php
public function index()
{
    $featureVotes = UserFeedback::query()
        ->whereNotNull('feature_votes')
        ->get()
        ->pluck('feature_votes')
        ->flatten()
        ->countBy()
        ->sortDesc();

    $recentFeedback = UserFeedback::with('user:id,name')
        ->latest()
        ->paginate(20);

    return view('admin.feedback.index', compact('featureVotes', 'recentFeedback'));
}
```

### Visualisasi di Blade Admin
```blade
<!-- resources/views/admin/feedback/index.blade.php -->
<div class="grid md:grid-cols-2 gap-6">
  <!-- Chart: Fitur Paling Diminati -->
  <div class="bg-white p-6 rounded-xl shadow">
    <h3 class="font-bold mb-4">📊 Fitur Paling Diminati</h3>
    <canvas id="featureChart"></canvas>
  </div>

  <!-- List: Masukan Terbaru -->
  <div class="bg-white p-6 rounded-xl shadow">
    <h3 class="font-bold mb-4">💬 Masukan Terbaru</h3>
    <div class="space-y-4 max-h-96 overflow-y-auto">
      @foreach($recentFeedback as $item)
        <div class="p-3 bg-slate-50 rounded-lg">
          <p class="text-sm">{{ Str::limit($item->feedback, 100) }}</p>
          <p class="text-xs text-slate-500 mt-1">
            {{ $item->is_anonymous ? 'Anonim' : $item->user->name }} • {{ $item->created_at->diffForHumans() }}
          </p>
        </div>
      @endforeach
    </div>
  </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('featureChart');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: @json($featureVotes->keys()),
      datasets: [{
        label: 'Jumlah Vote',
        data: @json($featureVotes->values()),
        backgroundColor: 'rgba(37, 99, 235, 0.7)',
        borderRadius: 4
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { display: false } },
      scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } }
    }
  });
</script>
@endpush
```

---
## 🎯 TIPS PENGIRIMAN BROADCAST

| Aspek | Rekomendasi |
|-------|-------------|
| **Timing** | Kirim di jam "tenang": Selasa-Kamis, 10.00-11.00 atau 19.00-20.00. Hindari Senin pagi & Jumat malam. |
| **Segmentasi** | Jika memungkinkan, segmentasi berdasarkan: user aktif 30 hari terakhir, atau yang pernah lapor. Hindari spam ke user yang sudah unsub. |
| **Personalization** | Gunakan `{{ $user->pseudonym ?? 'Sobat PinjolWatch' }}` agar terasa personal tapi tetap anonim. |
| **Unsubscribe** | Selalu sertakan link `{{ route('unsubscribe', ['token' => $user->unsubscribe_token]) }}` di footer email/WhatsApp. |
| **Follow-up** | 3-5 hari setelah broadcast, kirim reminder singkat ke user yang belum klik feedback: *"Masih ada waktu untuk sampaikan kebutuhanmu 💙"* |

---
## 📈 METRIK KEBERHASILAN BROADCAST

Pantau metrik berikut di dashboard admin:
```php
// app/Models/BroadcastCampaign.php
class BroadcastCampaign extends Model
{
    public function getMetricsAttribute()
    {
        return [
            'sent' => $this->recipients()->count(),
            'opened' => $this->recipients()->whereNotNull('opened_at')->count(),
            'clicked' => $this->recipients()->whereNotNull('clicked_at')->count(),
            'feedback_submitted' => UserFeedback::where('source', 'broadcast_' . $this->id)->count(),
            'open_rate' => round(($this->opened / $this->sent) * 100, 1),
            'ctr' => round(($this->clicked / $this->sent) * 100, 1),
        ];
    }
}
```

**Target Minimal:**
- Open rate: >40% (email), >70% (in-app)
- Click-to-feedback rate: >15%
- Sentimen feedback: >80% positif/netral

---
