<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class SplitJudolStoriesSeeder extends Seeder
{
    public function run()
    {
        // Delete the old combined stories
        Article::where('slug', 'like', 'judi-online-pinjol-tiga-generasi-%')->delete();

        // 1. Raka's Story
        Article::create([
            'user_id' => 1,
            'title' => 'Mimpi yang Tergadai: Ketika Satu Klik Iseng Mengubah Hidup Raka',
            'slug' => 'kisah-raka-jebakan-judol-remaja',
            'content' => "Jam menunjukkan pukul 02.47 pagi. Raka, yang seharusnya bermimpi tentang masa depan atau setidaknya tidur pulas setelah lelah belajar, justru meringkuk di sudut sofa ruang tamu yang gelap. Hanya cahaya biru dari ponselnya yang menyinari wajahnya yang pucat.

Ponsel itu tidak lagi menjadi jendela dunia bagi Raka. Ia telah menjadi penjara. Setiap beberapa menit, layar itu menyala, menampilkan pesan dari nomor-nomor tak dikenal. *\"Raka, kami tahu kamu sekolah di mana. Bayar hari ini atau foto KTP-mu jadi wallpaper grup warga!\"*

Semuanya bermula dari satu klik iseng. Iklan 'bonus deposit 100%' yang muncul saat ia sedang mencari hiburan di sela-sela tugas sekolah. Awalnya ia hanya memakai uang jajan sepuluh ribu rupiah. Menang seratus ribu membuat jantungnya berdebar kencang—rasa 'uang mudah' itu ternyata adalah racun yang sangat manis.

Namun, algoritma tidak pernah tidur. Kemenangan awal itu hanyalah umpan. Dalam seminggu, tabungan Raka ludes. Ia panik. Ia butuh 'modal' untuk memutar balik nasibnya. Di situlah ia menemukan aplikasi pinjol. *\"Cair 5 menit, tanpa agunan,\"* janjinya. Raka percaya. Ia meminjam satu juta untuk judi lagi. Kalah. Pinjam lagi di aplikasi lain untuk menutup utang pertama. Kalah lagi.

Kini, di usianya yang baru tujuh belas tahun, Raka memikul beban delapan juta rupiah di empat aplikasi pinjol. Nilai sekolahnya anjlok karena ia tidak bisa lagi fokus. Ia menjauh dari teman-temannya karena takut rahasianya terbongkar. 

Malam itu, Raka menatap botol obat di meja, berpikir bahwa mungkin itulah satu-satunya cara untuk membungkam teror di ponselnya. Namun, isak tangisnya yang pecah justru menjadi awal dari keselamatannya. Pengakuannya malam itu menghancurkan kebohongan, tapi juga membangun jembatan untuk kembali pulang.

---

### 🛡️ Pesan untuk Remaja:
Jangan pernah tergoda oleh janji 'uang mudah' di internet. Judi online dirancang agar Anda pasti kalah. Jika Anda sudah terjerat, bicaralah pada orang dewasa yang Anda percaya sekarang juga. Anda tidak perlu memikul beban ini sendirian.",
            'image_path' => 'articles/raka_story.png',
            'author_name' => 'Satgas PinjolWatch',
            'type' => 'experience',
            'status' => 'published',
        ]);

        // 2. Pak Hadi's Story
        Article::create([
            'user_id' => 1,
            'title' => 'Pertaruhan Terakhir Sang Ayah: Dilema Pak Hadi Antara Tanggung Jawab dan Meja Judi',
            'slug' => 'kisah-pak-hadi-ayah-terjerat-poker',
            'content' => "Pak Hadi menatap tangannya yang kasar, tangan yang selama dua puluh tahun telah bekerja keras di pabrik demi keluarga. Namun hari ini, tangan itu justru menangkup wajahnya yang basah oleh air mata penyesalan.

Di depannya, tumpukan catatan utang berserakan. Tujuh aplikasi pinjol, total tiga puluh delapan juta rupiah. Semuanya habis di meja poker online.

Sebagai kepala keluarga, Pak Hadi merasa gagal. Beban cicilan rumah dan biaya sekolah anak-anak yang menumpuk membuatnya mencari jalan pintas. Ia tergiur oleh iklan 'Jackpot 10 Juta' yang seolah-olah menjadi jawaban atas doanya. Awalnya ia menang, dan kemenangan itu memberinya harapan palsu. Namun, seperti yang selalu terjadi, meja judi akhirnya mengambil kembali semuanya—dan lebih banyak lagi.

Saat uang belanja mulai terpakai dan tabungan istri menipis, Pak Hadi berpaling ke pinjol. Ia meminjam bukan untuk konsumsi, tapi untuk 'bertaruh satu kali lagi' demi melunasi kekalahan sebelumnya. Siklus itu terus berulang sampai ia tidak lagi sanggup mematikan notifikasi ponselnya yang berdering 24 jam dengan ancaman debt collector.

Kehilangan fokus membuatnya di-PHK dari pabrik. Rumah tangga yang ia bina selama belasan tahun berada di ambang kehancuran. Pak Hadi merasa seperti hantu di rumah sendiri, menanggung rahasia yang membuatnya sesak napas setiap hari.

Namun, di titik nadir itu, saat ia melihat putranya juga menangis karena hal yang sama, Pak Hadi sadar. Kehancuran ini harus dihentikan sekarang. Pengakuannya di depan istri dan ibunya adalah hal terberat yang pernah ia lakukan, tapi itu juga yang menyelamatkan nyawanya.

---

### 💼 Pelajaran untuk Para Ayah:
Tanggung jawab keluarga tidak bisa dituntaskan melalui meja judi. Judi bukan soal uang, tapi soal pelarian yang menipu. Jika Anda terjepit, carilah bantuan restrukturisasi utang secara legal, bukan melalui taruhan baru.",
            'image_path' => 'articles/hadi_story.png',
            'author_name' => 'Satgas PinjolWatch',
            'type' => 'experience',
            'status' => 'published',
        ]);

        // 3. Mbah Sarti's Story
        Article::create([
            'user_id' => 1,
            'title' => 'Senja yang Terancam: Kisah Mbah Sarti dan Jebakan Slot di Masa Tua',
            'slug' => 'kisah-mbah-sarti-lansia-korban-slot',
            'content' => "Mbah Sarti terduduk lemas di kursi goyangnya. Di sampingnya, botol obat hipertensi telah kosong selama tiga hari. Bukannya ia lupa membeli, tapi uang untuk obat itu sudah tidak ada lagi.

Di usianya yang sudah enam puluh delapan tahun, Mbah Sarti seharusnya menikmati masa senja dengan tenang. Namun, rasa penasaran yang dipicu oleh 'permainan seru' yang diajarkan cucunya di ponsel pensiunan mengubah segalanya. Ia tidak tahu bahwa lingkaran warna-warni dan suara riuh dari layar itu adalah mesin penghisap uang bernama 'slot gacor'.

Lansia itu terjebak dalam rasa ketagihan yang tidak ia pahami. Saat uang pensiun dan simpanan obatnya habis, ia diajari untuk meminjam melalui aplikasi pinjaman instan yang hanya membutuhkan foto KTP. Mbah Sarti menurut saja, mengira itu adalah bantuan pemerintah. 

Kini, ia memiliki utang delapan setengah juta rupiah. Baginya, angka itu seperti gunung yang siap menimbun rumahnya. Teror dari suara kasar di telepon membuatnya sering pingsan karena tekanan darah yang naik drastis. Ia merasa menjadi beban bagi anak dan cucunya, merasa tidak berguna karena telah menghabiskan harta di masa tua untuk hal yang tidak ia mengerti sepenuhnya.

Malam itu, di ruang tamu yang temaram, Mbah Sarti hanya bisa merangkul anak dan cucunya, menangis bersama dalam kesadaran yang pahit. Namun, pelukan itu justru menjadi obat yang lebih mujarab daripada obat hipertensinya. Mereka memutuskan untuk berhenti, menghapus aplikasi itu selamanya, dan menghadapi badai ini sebagai satu kesatuan.

---

### 👵 Pesan untuk Keluarga & Lansia:
Jangan biarkan orang tua kita sendirian dengan teknologi yang tidak mereka pahami sepenuhnya. Predatory lending dan judi online seringkali mengincar kerentanan emosional lansia. Lindungi mereka dengan pendampingan dan keterbukaan.",
            'image_path' => 'articles/sarti_story.png',
            'author_name' => 'Satgas PinjolWatch',
            'type' => 'experience',
            'status' => 'published',
        ]);
    }
}
