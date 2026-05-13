<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';

use App\Models\Article;
use Illuminate\Support\Str;

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$title = "Bukan Manusia, Tapi Mesin: Mengupas Sistem Teror DC Otomatis yang Menggerogoti Mental Bangsa";
$content = '
<p class="text-xl text-slate-300 leading-relaxed mb-8">Pukul 02.14. Ponselmu bergetar. <br><code>"KAMI AKAN DATANG KE RUMAH ANDA DALAM 24 JAM. SIAPKAN DANA ATAU KAMI SEBAR DATA KE TETANGGA DAN KANTOR."</code></p>

<p class="mb-6">Jantung berdebar. Napas sesak. Pikiran langsung berlari: <em>"Mereka benar-benar datang. Malu banget. Gimana kalau ketahuan bos? Gimana kalau anak-anak dengar?"</em></p>

<p class="mb-6">Kamu balas dengan gemetar. Kamu bayar sebagian. Kamu berjanji. Lalu besoknya, pesan yang sama datang lagi. Dari nomor berbeda. Dengan kalimat yang hampir identik.</p>

<div class="bg-emerald-500/10 border-l-4 border-emerald-500 p-6 rounded-r-2xl mb-12">
    <p class="text-lg font-bold text-emerald-400">Di sinilah kenyataannya terungkap: <br>Yang menerormu bukan manusia. Itu mesin. Dan mesin itu tidak punya emosi. Ia hanya punya target konversi.</p>
</div>

<h2 class="text-3xl font-black text-white mb-6 uppercase tracking-tighter">📡 Bagian 1: Di Balik Layar: Bukan DC "Jahat", Tapi Algoritma Terprogram</h2>
<p class="mb-8 text-slate-400">Industri pinjol ilegal tidak mengandalkan tenaga manusia untuk meneror ribuan nasabah sehari. Itu tidak efisien. Yang mereka gunakan adalah <strong>sistem penagihan terotomasi (Automated Debt Collection System)</strong> yang bekerja seperti pabrik:</p>

<div class="overflow-x-auto mb-12">
    <table class="w-full text-left border-collapse glass rounded-2xl overflow-hidden">
        <thead>
            <tr class="bg-white/5 border-b border-white/10">
                <th class="p-4 text-emerald-400 font-black uppercase text-xs">Komponen</th>
                <th class="p-4 text-slate-400 font-black uppercase text-xs">Cara Kerja</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
            <tr>
                <td class="p-4 font-bold text-white">📞 Auto-Dialer & Voice Bot</td>
                <td class="p-4 text-slate-400 text-sm">Mesin menelepon ratusan nomor sekaligus. Suara "DC" sering kali adalah rekaman AI atau text-to-speech.</td>
            </tr>
            <tr>
                <td class="p-4 font-bold text-white">📱 Bulk SMS/WhatsApp API</td>
                <td class="p-4 text-slate-400 text-sm">Pesan dikirim massal ke database nomor. Tidak ada yang mengetik manual.</td>
            </tr>
            <tr>
                <td class="p-4 font-bold text-white">🧠 AI Text Generator</td>
                <td class="p-4 text-slate-400 text-sm">Kalimat ancaman disusun algoritma untuk memicu panik, rasa malu, dan urgensi.</td>
            </tr>
            <tr>
                <td class="p-4 font-bold text-white">📊 Scoring & Routing</td>
                <td class="p-4 text-slate-400 text-sm">Sistem memberi "skor ketakutan". Jika responsif, kamu masuk antrian template lebih agresif.</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="bg-slate-800/50 p-6 rounded-2xl border border-white/5 mb-12">
    <p class="text-sm italic text-slate-400"><strong>Fakta Keras:</strong> Kamu bukan target personal. Kamu adalah baris data dalam campaign spam. Tidak ada yang spesifik mengincarmu. Hanya konversi berbasis ketakutan.</p>
</div>

<h2 class="text-3xl font-black text-white mb-6 uppercase tracking-tighter">📜 Bagian 2: Anatomi Template Teror: Cara Mesin "Mematikan" Mental</h2>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
    <div class="glass p-6 rounded-2xl border-l-4 border-rose-500">
        <h4 class="font-bold text-white mb-2">Social Shame</h4>
        <p class="text-sm text-slate-400">"Sebut KTP/foto ke grup WA keluarga". Tujuannya memaksa bayar demi menjaga harga diri.</p>
    </div>
    <div class="glass p-6 rounded-2xl border-l-4 border-blue-500">
        <h4 class="font-bold text-white mb-2">Otoritas Palsu</h4>
        <p class="text-sm text-slate-400">"Pasal 378 KUHP & Pidana". Menciptakan ilusi kepastian hukum yang sebenarnya tidak ada.</p>
    </div>
    <div class="glass p-6 rounded-2xl border-l-4 border-amber-500">
        <h4 class="font-bold text-white mb-2">Invasi Ruang Aman</h4>
        <p class="text-sm text-slate-400">"Datang ke kantor/rumah besok". Memicu panic attack & rasa tidak aman di rumah sendiri.</p>
    </div>
    <div class="glass p-6 rounded-2xl border-l-4 border-emerald-500">
        <h4 class="font-bold text-white mb-2">False Scarcity</h4>
        <p class="text-sm text-slate-400">"Bunga naik 2x lipat hari ini". Mencegah korban berpikir jernih atau mencari bantuan.</p>
    </div>
</div>

<h2 class="text-3xl font-black text-white mb-6 uppercase tracking-tighter">🛡️ Bagian 4: Langkah Melawan Mesin</h2>

<div class="space-y-6 mb-12">
    <div class="flex gap-4">
        <div class="w-10 h-10 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center font-black shrink-0">1</div>
        <div>
            <h4 class="font-bold text-white">Sadar Ini Bukan Personal</h4>
            <p class="text-slate-400 text-sm">Afirmasi: "Saya bukan target. Saya hanya masuk database spam. Pesan ini tidak punya bobot hukum."</p>
        </div>
    </div>
    <div class="flex gap-4">
        <div class="w-10 h-10 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center font-black shrink-0">2</div>
        <div>
            <h4 class="font-bold text-white">Jangan Engage Emosional</h4>
            <p class="text-slate-400 text-sm">Jangan balas ancaman. Blokir & mute. Semakin kamu balas, semakin kamu masuk kategori "aktif".</p>
        </div>
    </div>
    <div class="flex gap-4">
        <div class="w-10 h-10 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center font-black shrink-0">3</div>
        <div>
            <h4 class="font-bold text-white">Verifikasi Fakta</h4>
            <p class="text-slate-400 text-sm">Cek legalitas OJK. DC ilegal tidak punya hak datang tanpa surat perintah resmi.</p>
        </div>
    </div>
    <div class="flex gap-4">
        <div class="w-10 h-10 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center font-black shrink-0">4</div>
        <div>
            <h4 class="font-bold text-white">Laporkan!</h4>
            <p class="text-slate-400 text-sm">Screenshot bukti. Laporkan ke OJK 157, Kominfo 159, dan PinjolWatch.</p>
        </div>
    </div>
</div>

<p class="text-lg leading-relaxed text-slate-300 mb-12">Matikan suara mesin itu. Bukan dengan melawan teriakan, tapi dengan <strong>tidak memberinya panggung</strong>. Dokumentasi. Blokir. Laporkan. Pulihkan diri. Karena mesin tidak bisa memenjarakanmu. Hanya ketakutan yang bisa.</p>

<div class="flex flex-wrap gap-4 mb-12">
    <a href="#" class="btn-primary py-3 px-6 text-xs uppercase tracking-widest font-black">Unduh Panduan Netralisir</a>
    <a href="#" class="btn-ghost py-3 px-6 text-xs uppercase tracking-widest font-black border-emerald-500/30 text-emerald-400">Lapor Nomor Spam</a>
</div>

<hr class="border-white/5 mb-12">
<p class="text-xs text-slate-500 italic">Catatan Hukum: Artikel ini mengedukasi tentang praktik penagihan otomatis oleh entitas fintech ilegal. Lembaga penagih resmi wajib mematuhi POJK No. 6/2022.</p>
';

// Path for the generated image
$imagePath = 'C:\Users\diskonekted\.gemini\antigravity\brain\f4939f63-d368-4ef3-b4f9-e87868e58feb\automated_dc_terror_system_illustration_1778599523403.png';
// Copy to storage/app/public/articles if possible, or just use the local path for now
$storagePath = 'articles/' . basename($imagePath);
if (!file_exists(storage_path('app/public/articles'))) {
    mkdir(storage_path('app/public/articles'), 0755, true);
}
copy($imagePath, storage_path('app/public/' . $storagePath));

Article::create([
    'user_id' => 1,
    'title' => $title,
    'slug' => Str::slug($title),
    'content' => $content,
    'image_path' => $storagePath,
    'author_name' => 'Satgas PinjolWatch',
    'type' => 'article',
    'status' => 'published',
]);

echo "Article created successfully: " . $title . "\n";
