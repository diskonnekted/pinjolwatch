<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleBimaSeeder extends Seeder
{
    public function run(): void
    {
        $title = '🛑 Klik yang Dibatalkan: Ketika Kritis Menyelamatkan Dompet & Mental';
        $slug = Str::slug($title) . '-' . Str::random(5);
        
        $content = <<<'HTML'
<p>Jam 22.14. Layar laptop Bima masih menyala, menampilkan spreadsheet pengeluaran bulan ini. Selisihnya merah: <strong>minus Rp 4,2 juta</strong>.</p>

<p>Motor kesayangannya yang jadi tulang punggung pekerjaan freelance-nya mogok total. Bengkel bilang butuh ganti dinamo dan rantai, estimasi Rp 3,8 juta. Sementara tagihan listrik dan kontrakan sudah jatuh tempo besok. Istri sudah tidur, anak kecil masih nempel di gendongan. Napasnya berat.</p>

<p>Di pojok kanan atas browser, notifikasi muncul:  
<em>“DanaCepat: Cair 5 menit! Limit Rp 5 juta. Cicilan mulai Rp 150rb/hari. Tanpa jaminan. Klik di sini!”</em></p>

<p>Jantungnya berdegup kencang. Ini solusi instan. Tanpa ribet, tanpa tanya-tanya. Jari telunjuknya sudah melayang di atas touchpad. Satu klik, dan besok pagi motor bisa diperbaiki. Tagihan lunas. Napas lega.</p>

<p>Tapi Bima berhenti.</p>

<p>Bukan karena takut. Tapi karena otaknya yang terlatih mencium janggal.  
<em>“Cicilan 150rb per hari? Untuk 5 juta? Berapa hari tenornya? Bunga aslinya berapa?”</em> gumamnya pelan.</p>

<p>Dia tidak langsung klik “Terima”.  
Dia buka tab baru. Mencari “Syarat & Ketentuan”. Mengunduh dokumen PDF yang biasanya orang skip. Membuka kalkulator. Menarik napas. Dan mulai menghitung.</p>

<hr>
<h2 class="text-xl font-bold text-white mb-4">🧮 Bedah Hitungan Bima (Yang Sering Terlewat)</h2>

<div class="overflow-x-auto mb-6">
    <table class="w-full text-sm text-left text-slate-300 border-collapse border border-slate-800">
        <thead class="bg-slate-800 text-white">
            <tr>
                <th class="p-3 border border-slate-700">Komponen</th>
                <th class="p-3 border border-slate-700">Klaim Iklan</th>
                <th class="p-3 border border-slate-700">Fakta di Dokumen</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="p-3 border border-slate-700">Pokok Pinjaman</td>
                <td class="p-3 border border-slate-700">Rp 5.000.000</td>
                <td class="p-3 border border-slate-700 text-emerald-400">✅ Benar</td>
            </tr>
            <tr>
                <td class="p-3 border border-slate-700">Bunga</td>
                <td class="p-3 border border-slate-700">“0,1%/hari”</td>
                <td class="p-3 border border-slate-700 text-amber-400">✅ Benar, tapi…</td>
            </tr>
            <tr>
                <td class="p-3 border border-slate-700">Tenor</td>
                <td class="p-3 border border-slate-700">Tidak disebut jelas</td>
                <td class="p-3 border border-slate-700">30 hari (Pasal 4.2)</td>
            </tr>
            <tr>
                <td class="p-3 border border-slate-700">Biaya Admin</td>
                <td class="p-3 border border-slate-700">“Gratis!”</td>
                <td class="p-3 border border-slate-700 text-rose-400">Rp 250.000 (potong awal)</td>
            </tr>
            <tr>
                <td class="p-3 border border-slate-700">Asuransi Wajib</td>
                <td class="p-3 border border-slate-700">Tidak disebut</td>
                <td class="p-3 border border-slate-700 text-rose-400">Rp 175.000 (wajib)</td>
            </tr>
            <tr>
                <td class="p-3 border border-slate-700">Denda Telat</td>
                <td class="p-3 border border-slate-700">Tidak disebut</td>
                <td class="p-3 border border-slate-700 text-rose-400">0,2%/hari</td>
            </tr>
            <tr class="bg-slate-800/50">
                <td class="p-3 border border-slate-700 font-bold">Dana Cair</td>
                <td class="p-3 border border-slate-700">Rp 5.000.000</td>
                <td class="p-3 border border-slate-700 font-bold text-rose-400">Hanya Rp 4.575.000</td>
            </tr>
        </tbody>
    </table>
</div>

<p>Bima hitung total pengembalian jika tepat waktu:
<ul class="list-disc ml-6 space-y-2 mb-6">
    <li>Bunga 30 hari: <code>5.000.000 × 0,1% × 30 = Rp 1.500.000</code></li>
    <li>Total yang harus dikembalikan: <code>4.575.000 + 1.500.000 = Rp 6.075.000</code></li>
    <li><strong>Biaya riil dalam 30 hari: Rp 1.500.000</strong> (hampir 33% dari dana cair)</li>
</ul>
</p>

<p>Lalu dia hitung <strong>Bunga Efektif Tahunan (EAR)</strong>:  
<code class="bg-slate-800 px-2 py-1 rounded"> (1 + 0,001)^365 - 1 = 44,02% per tahun</code></p>

<p>Belum termasuk denda jika telat 1 hari saja. Belum termasuk stres, tidur tidak nyenyak, atau ancaman debt collector jika cashflow tersendat.</p>

<p>Bima menatap angka itu. Napasnya pelan tapi stabil.  
<em>“Ini bukan pinjaman. Ini mesin pencetak utang,”</em> bisiknya.</p>

<p>Jari yang tadi melayang di touchpad, kini bergerak ke tombol <strong>“Batalkan Aplikasi”</strong>.</p>

<hr class="my-8 border-slate-800">
<h2 class="text-xl font-bold text-white mb-4">🌱 Langkah Selanjutnya: Tidak Pasrah, Tapi Cari Jalan Lain</h2>

<p>Bima tidak menyerah pada masalah. Dia hanya menolak jebakan.</p>

<p>Malam itu juga, dia buat rencana darurat:
<ol class="list-decimal ml-6 space-y-2 mb-6 text-slate-300">
    <li><strong>Negosiasi dengan pemilik kontrakan</strong>: minta perpanjangan 2 minggu, tawarkan bayar 50% dulu. Disetujui.</li>
    <li><strong>Jual aset tidak produktif</strong>: sparepart motor lama & kamera bekas laku Rp 1,8 juta di marketplace.</li>
    <li><strong>Ambil job desain dengan deposit 50%</strong>: dapat Rp 1,5 juta di muka, sisa dibayar setelah serah terima.</li>
    <li><strong>Hubungi koperasi simpan pinjam di kampung</strong>: bunga 1,5%/bulan, tenor 3 bulan, tanpa teror.</li>
</ol>
</p>

<p>Dalam 6 hari, terkumpul Rp 3,3 juta. Sisanya Rp 500.000 dicicil ke koperasi.  
<strong>Total bunga yang dibayar: Rp 22.500.</strong>  
Tidak ada chat ancaman. Tidak ada malapetaka mental. Tidur tetap nyenyak.</p>

<hr class="my-8 border-slate-800">
<h2 class="text-xl font-bold text-white mb-4">💬 Epilog: Kritis Bukan Berarti Sinis</h2>

<p>Keesokan harinya, Bima buka grup komunitas freelancer. Dia screenshot hitung-hitungannya, tulis caption singkat:</p>

<blockquote class="border-l-4 border-indigo-500 bg-slate-800/50 p-6 italic text-slate-300 mb-6">
    “Teman-teman, kalau lagi kepepet dan liat iklan ‘cair 5 menit’, coba hitung dulu EAR-nya. 0,1%/hari itu 44%/tahun. Belum admin, asuransi, denda. Gue hampir klik tadi. Untung ngerem. Kalau butuh temen hitung atau cari alternatif, DM aja. Kita saling jaga.”
</blockquote>

<p>Dalam 2 jam, 14 orang reply. 3 orang bilang <em>“Makasih, gue batalin aplikasi tadi.”</em> 1 orang cerita pengalaman terjebak pinjol 2 tahun. 2 orang minta template hitungan.</p>

<p>Bima tersenyum.  
Kadang, literasi keuangan bukan soal jadi kaya raya.  
Tapi soal tahu kapan harus bilang <strong>“tidak”</strong> pada jebakan yang berkedok pertolongan.  
Dan soal berani percaya bahwa <strong>jalan keluar selalu ada, asal kita tidak panik sampai buta.</strong></p>

<div class="mt-8 p-6 bg-indigo-900/20 border border-indigo-500/30 rounded-2xl">
    <p class="text-xs text-indigo-300 italic">
        🕊️ Catatan: Cerita ini terinspirasi dari pengalaman nyata pengguna yang menerapkan literasi keuangan dasar sebelum memutuskan meminjam. Tidak semua yang menawarkan “uang cepat” bermaksud jahat, tapi hampir semua yang mengaburkan biaya riil berbahaya. Selalu hitung, verifikasi, dan pilih jalan yang tidak mengorbankan masa depanmu demi kelegaan sesaat.
    </p>
</div>
HTML;

        Article::updateOrCreate(
            ['title' => $title],
            [
                'slug' => $slug,
                'content' => $content,
                'author_name' => 'Bima (Kontributor)',
                'type' => 'experience',
                'status' => 'published',
                'image_path' => '/images/articles/abstract_financial_literacy.png', // Standard name for server
                'user_id' => 1
            ]
        );
    }
}
