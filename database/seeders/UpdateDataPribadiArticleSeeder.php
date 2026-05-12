<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Support\Str;

class UpdateDataPribadiArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slug = 'pentingnya-menjaga-data-pribadi-ShFIv';
        $article = Article::where('slug', $slug)->first();

        if (!$article) {
            $this->command->error("Article with slug '{$slug}' not found.");
            return;
        }

        // The title is already handled by the main blade template, so we only need the body content.
        // The styling is handled by the Tailwind Typography prose classes in the parent blade view.
        $newContent = <<<HTML
<p>Di era digital ini, data pribadi kita lebih berharga dari emas. Foto KTP, nomor telepon, alamat rumah, hingga nama ibu kandung—semua itu adalah kunci brankas kehidupan kita. Sayangnya, banyak dari kita yang menyerahkan kunci tersebut dengan mudah, terutama saat panik dan terdesak oleh kebutuhan finansial.</p>
<p>Pinjaman online (pinjol) ilegal menjadikan data pribadi sebagai komoditas utama mereka. Mereka tidak hanya menggunakannya untuk menagih, tapi juga untuk meneror, mempermalukan, dan bahkan melakukan penipuan. Mari kita bedah bersama mengapa menjaga data pribadi adalah sebuah perjuangan yang wajib kita menangkan.</p>

<h2>Apa Itu Data Pribadi yang Diincar Pinjol?</h2>
<p>Saat Anda mengunduh aplikasi pinjol ilegal, mereka meminta izin akses yang tidak masuk akal. Ini bukan hanya tentang nama dan nomor KTP, tapi juga:</p>
<ul>
    <li><strong>Kontak Telepon:</strong> Senjata utama mereka untuk meneror seluruh orang yang Anda kenal.</li>
    <li><strong>Galeri Foto & Video:</strong> Bahan untuk memfitnah dan mengancam akan menyebar foto-foto pribadi Anda.</li>
    <li><strong>Informasi Perangkat:</strong> IMEI, lokasi, dan data lainnya digunakan untuk melacak Anda.</li>
    <li><strong>Akses Mikrofon & Kamera:</strong> Potensi untuk merekam aktivitas Anda tanpa izin.</li>
</ul>
<p>Semua ini mereka kumpulkan bukan untuk "verifikasi", tapi untuk dijadikan amunisi jika Anda gagal bayar.</p>

<h2>Kengerian Penyalahgunaan Data oleh Pinjol Ilegal</h2>
<blockquote>"Mereka tahu nama anak saya dan sekolahnya. Mereka mengancam akan datang ke sana. Saya merasa gagal sebagai orang tua." - Curhatan seorang korban.</blockquote>
<p>Data yang Anda serahkan bisa menjadi awal dari mimpi buruk:</p>
<ol>
    <li><strong>Teror ke Seluruh Kontak:</strong> DC akan membuat grup WhatsApp dengan teman, keluarga, dan atasan Anda, menyebarkan fitnah bahwa Anda adalah penipu.</li>
    <li><strong>Pelecehan Seksual & Doxing:</strong> Foto Anda diedit menjadi konten asusila dan disebarkan. Informasi pribadi Anda (doxing) dipublikasikan di media sosial.</li>
    <li><strong>Penipuan Mengatasnamakan Anda:</strong> Data Anda digunakan untuk membuat akun pinjol lain atau melakukan penipuan, membuat Anda terjerat lebih dalam.</li>
    <li><strong>Penjualan Data:</strong> Data Anda dijual di pasar gelap (dark web) ke pihak ketiga, seperti jaringan penipuan atau bahkan bandar judi online.</li>
</ol>

<h2>Langkah Praktis Melindungi Benteng Pertahanan Anda</h2>
<div class="not-prose bg-slate-800 border border-slate-700 p-6 rounded-2xl my-8">
    <h3 class="font-bold text-lg mb-4 text-teal-400">Checklist Keamanan Data Pribadi:</h3>
    <ul class="list-disc pl-5 space-y-3 text-slate-300">
        <li><strong class="text-slate-100">STOP Memberikan Akses Tidak Perlu:</strong> Sebelum meng-klik "Izinkan", baca baik-baik. Apakah aplikasi kalkulator perlu akses ke kontak Anda? Tentu tidak.</li>
        <li><strong class="text-slate-100">Gunakan Nomor Kedua:</strong> Jika terpaksa berurusan dengan platform yang kurang terpercaya, gunakan nomor HP dan email cadangan yang tidak terhubung dengan data utama Anda.</li>
        <li><strong class="text-slate-100">Waspada Phishing:</strong> Jangan pernah meng-klik link dari SMS atau email tidak dikenal yang menjanjikan "dana cair" atau "hadiah". Itu adalah pancingan untuk mencuri data Anda.</li>
        <li><strong class="text-slate-100">Sensor Dokumen Penting:</strong> Jika harus mengirim foto KTP, berikan watermark (tanda air) berisi tanggal dan tujuan pengiriman. Contoh: "Verifikasi PinjolWatch, 12 Mei 2026". Ini mempersulit penyalahgunaan.</li>
        <li><strong class="text-slate-100">Periksa Jejak Digital Anda:</strong> Google nama Anda sendiri. Lihat informasi apa saja yang tersedia secara publik dan hapus yang tidak perlu.</li>
    </ul>
</div>

<h2>Sudah Terlanjur? Ini yang Harus Dilakukan!</h2>
<p>Jika data Anda sudah terlanjur disalahgunakan, jangan panik. Lakukan langkah-langkah mitigasi ini:</p>
<ul>
    <li><strong>Informasikan Orang Terdekat:</strong> Beri tahu keluarga dan teman bahwa data Anda telah dicuri dan kemungkinan akan ada pihak yang menghubungi mereka. Minta mereka untuk mengabaikan dan memblokir nomor tersebut.</li>
    <li><strong>Laporkan Segera:</strong> Kumpulkan semua bukti penyalahgunaan (screenshot, rekaman) dan laporkan ke beberapa jalur:
        <ul>
            <li><strong>Polisi:</strong> Untuk tindak pidana pemerasan dan ancaman.</li>
            <li><strong>OJK (Otoritas Jasa Keuangan):</strong> Jika pinjol tersebut legal namun melanggar aturan.</li>
            <li><strong>Kominfo:</strong> Untuk pemblokiran aplikasi dan penanganan konten negatif.</li>
            <li><strong>PinjolWatch:</strong> Untuk pendampingan dan pemetaan kasus.</li>
        </ul>
    </li>
    <li><strong>Ganti Semua Password:</strong> Segera ganti kata sandi email, media sosial, dan aplikasi perbankan Anda.</li>
</ul>

<p>Menjaga data pribadi bukanlah pilihan, melainkan keharusan. Ini adalah bentuk pertahanan diri paling mendasar di zaman sekarang. Jangan biarkan kepanikan sesaat meruntuhkan benteng yang telah Anda bangun. Anda lebih kuat dari yang mereka kira, dan data Anda adalah milik Anda seutuhnya.</p>
HTML;

        $article->title = 'Data Pribadi adalah Benteng Terakhirmu: Jangan Serahkan Kuncinya pada Pinjol Ilegal';
        $article->content = $newContent;
        $article->author_name = 'Tim PinjolWatch';
        $article->save();

        $this->command->info("Article '{$article->title}' has been updated successfully with corrected formatting.");
    }
}
