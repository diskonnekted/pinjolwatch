<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class FixDcStorySeeder extends Seeder
{
    public function run()
    {
        $slug = 'cara-saya-menghadapi-teror-dc-lapangan-sebuah-catatan-perjuangan';
        
        $content = <<<MARKDOWN
Bagi sebagian orang, suara motor yang berhenti di depan pagar adalah hal biasa. Tapi bagi saya, beberapa bulan lalu, itu adalah suara yang membuat jantung seolah berhenti berdetak.

Saya tahu siapa mereka. Debt Collector (DC) lapangan.

Selama berminggu-minggu saya hidup dalam persembunyian di rumah sendiri. Mematikan lampu, berbisik saat bicara, dan gemetar setiap kali ada ketukan di pintu. Saya merasa seperti kriminal, padahal saya hanya seorang ayah yang sedang terjepit ekonomi.

Namun, suatu pagi, saya memutuskan untuk berhenti bersembunyi. Saya menyadari satu hal: **Ketakutan saya adalah bahan bakar mereka.** Jika saya terus lari, mereka akan terus mengejar.

Hari itu, saya menghadapi mereka. Dan inilah catatan bagaimana saya merebut kembali harga diri saya.

---

### 🛡️ Langkah 1: Ketenangan Adalah Kunci

Saat pintu diketuk dengan keras, saya tidak langsung membuka. Saya mengambil napas dalam-dalam, menyiapkan ponsel untuk merekam, dan melangkah keluar dengan kepala tegak.

Saya tidak berteriak. Saya tidak memaki. Saya menyapa mereka dengan profesional, layaknya tamu biasa.

*"Selamat siang. Ada yang bisa saya bantu?"*

Ketenangan saya tampaknya membuat mereka bingung. DC biasanya terbiasa menghadapi orang yang panik atau marah. Saat kita tenang, kendali situasi ada di tangan kita.

---

### ⚖️ Langkah 2: Verifikasi Hak Hukum

Saya tahu hak-hak saya karena saya belajar di PinjolWatch. Sebelum mereka bicara soal utang, saya meminta empat dokumen wajib yang harus dibawa DC sesuai aturan OJK:

1.  **Kartu Identitas Resmi** dari perusahaan.
2.  **Sertifikat Profesi Penagihan (SPPI)**.
3.  **Surat Tugas Penagihan** asli.
4.  **Bukti Dokumen Wanprestasi** yang menunjukkan detail utang.

Saat salah satu dari mereka mencoba mengintimidasi dengan suara keras, saya memotongnya dengan tenang:

*"Maaf, Pak. Tanpa dokumen-dokumen resmi ini, Anda tidak memiliki legalitas untuk menagih di rumah saya. Jika Anda tetap memaksa, saya terpaksa menghubungi pihak berwajib atas tuduhan intimidasi dan masuk tanpa izin."*

---

### 📹 Langkah 3: Dokumentasi Sebagai Perisai

Sejak awal, saya memegang ponsel dan merekam seluruh interaksi. Saya mengatakannya dengan jelas:

*"Saya merekam percakapan ini untuk dokumentasi hukum saya. Silakan lanjutkan jika Anda membawa dokumen yang sah."*

Melihat kamera ponsel seringkali membuat DC ilegal mengurungkan niat untuk bertindak kasar. Mereka tahu bahwa bukti digital tidak bisa didebat di kantor polisi.

---

### 🌱 Hasilnya: Mereka Pergi Dengan Sopan

Akhirnya, karena mereka tidak bisa menunjukkan surat tugas yang lengkap untuk hari itu, saya meminta mereka meninggalkan lokasi.

*"Saya menghargai pekerjaan Anda, tapi mari kita lakukan sesuai aturan. Silakan datang kembali saat dokumen Anda lengkap, atau hubungi saya melalui jalur resmi kantor. Untuk sekarang, silakan tinggalkan area rumah saya."*

Dan mereka pergi. Tanpa keributan. Tanpa penyitaan barang.

---

### 💡 Apa yang Saya Pelajari?

Menghadapi DC lapangan bukan soal siapa yang lebih kuat fisiknya, tapi siapa yang lebih paham hukum dan lebih tenang mentalnya.

1.  **Jangan Pernah Bersembunyi:** Itu hanya akan membuat mereka merasa menang.
2.  **Pahami Aturan OJK:** DC dilarang melakukan intimidasi, kekerasan, atau datang di luar jam wajar (08.00 - 20.00).
3.  **Jangan Janjikan Sesuatu yang Mustahil:** Jika belum bisa bayar, katakan sejujurnya dan ajukan restrukturisasi melalui aplikasi resmi, bukan melalui DC di lapangan.

Utang saya belum lunas hari itu, tapi **ketakutan saya sudah lunas.** Saya kembali bisa tidur nyenyak, tahu bahwa saya punya hak dan saya tahu cara melindunginya.

Jika Anda sedang dalam posisi yang sama, ingatlah: **Anda tidak sendirian. Jangan biarkan mereka mengambil nyawa Anda hanya karena masalah angka.**

---

> 🛡️ **Butuh Panduan Lebih Lengkap?**
> Kunjungi halaman [Panduan Menghadapi DC](/panduan-menghadapi-dc) untuk mempelajari teknis hukum dan cara melapor ke pihak berwajib.
MARKDOWN;

        Article::updateOrCreate(
            ['slug' => $slug],
            [
                'content' => $content,
                'author_name' => 'Pejuang Ketenangan',
                'image_path' => 'articles/dc_perjuangan.png',
                'status' => 'published',
                'type' => 'experience'
            ]
        );
    }
}
