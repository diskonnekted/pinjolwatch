<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';

use App\Models\Article;
use Illuminate\Support\Str;

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$content = <<<'EOD'
Arya tidak pernah bilang dia kesakitan. Dia bilang cuma *"lelah kerja"*. Dia bilang cuma *"kurang tidur"*. Dia bilang *"nggak apa-apa, Ma. Bapak cuma butuh istirahat."*

Tapi di balik pintu kamar yang selalu terkunci, Arya sedang berperang sendiri. Notifikasi pinjol masuk 17 kali sehari. Chat ancaman berganti nomor, tapi nadanya sama: *"BAYAR ATAU MALU SATU KELUARGA."* Tidur? Hanya 2 jam semalam, itu pun terbangun karena jantung berdebar tak karuan. Makan? Hanya sesuap, lalu mual. Tawa? Sudah lama hilang.

Arya bukan pecundang. Dia ayah dua anak. Suami yang berusaha keras. Anak yang ingin membahagiakan orang tua. Tapi sistem pinjol ilegal tidak peduli pada niat baik. Ia hanya peduli pada **ketakutan**. Dan ketakutan Arya sudah mencapai batas maksimum.

Suatu pagi, Arya tidak bangun. Napasnya sesak. Tangannya gemetar tak terkendali. Matanya kosong menatap langit-langit. Istrinya, Rina, panik. Orang tua Arya langsung datang. Mereka bawa ke IGD. Dokter berkata: *"Ini bukan sakit jantung. Ini panic attack berat yang sudah berkembang menjadi depresi klinis. Beliau perlu penanganan psikiatri."*

Arya akhirnya masuk RSJ. Bukan karena gila. Tapi karena beban yang dipikul sendirian sudah terlalu berat untuk ditahan oleh satu manusia.

---

### 🚪 Kejutan di Depan Pintu: Ketika Rahasia Pecah

Tiga hari Arya di RSJ. Rina dan orang tuanya masih bingung. *"Kenapa bisa sampai segini? Kerjaan memang lagi berat, tapi…"*

Belum selesai kalimat itu, pintu rumah mereka diketuk keras. Dua orang pria berdiri di teras. Bukan berseragam resmi. Hanya kaos polos, tatapan tajam, dan map berisi kertas.

*"Kami dari 'DanaCepat'. Suami Ibu punya tunggakan 18 juta. Sudah 4 bulan tidak bayar. Kami kasih waktu 24 jam. Kalau tidak, kami datang ke kantor istri, ke sekolah anak, dan sebar data ke grup warga."*

Rina terpaku. Orang tua Arya saling pandang. *"Pinjol? Arya nggak pernah bilang apa-apa…"* bisik Ibu Arya, suaranya pecah.

Mereka tidak marah. Mereka hanya **terhantam kenyataan**. Selama ini, Arya tersenyum di meja makan sambil menahan panic attack di balik dada. Selama ini, dia menjawab chat ancaman dengan tangan gemetar, lalu pura-pura tidur agar tidak dicurigai. Selama ini, dia menanggung teror sendirian, karena malu. Karena takut dihakimi. Karena mengira *"ini masalahku, harus kuselesaikan sendiri."*

Rina langsung ambil kunci motor. Orang tua Arya ikut. Mereka tidak tanya *"kenapa"*. Mereka hanya tanya: *"RSJ mana? Kita jemput dia pulang."*

---

### 🛡️ Pertemuan di Ruang Isolasi: Bukan Vonis, Tapi Pelukan

Kamar RSJ sunyi. Hanya suara AC dan langkah perawat yang pelan. Arya duduk di tepi tempat tidur. Matanya sayu. Tubuhnya kurus. Tangannya masih gemetar ringan.

Saat pintu terbuka, dia menunduk. Dia siap mendengar kalimat yang paling dia takuti: *"Kenapa sih ceroboh banget?"*, *"Malu nggak sama keluarga?"*, *"Gimana ini mau ditutupin?"*

Tapi yang datang malah Rina. Dia tidak bertanya. Tidak menghakimi. Dia hanya duduk di sebelah Arya, menggenggam tangannya yang dingin, dan berkata pelan:

*"Kamu nggak perlu sembunyi lagi, Mas. Kami tahu sekarang. Dan kami nggak akan lepasin kamu sendirian. Utang itu angka. Kamu itu nyawa. Angka bisa kita urus bareng. Tapi kamu harus tetap di sini, sama kami."*

Air mata Arya jatuh. Bukan tangisan takut. Tapi tangisan **lega**. Tangisan orang yang sudah berbulan-bulan menahan napas, dan akhirnya diperbolehkan bernapas lagi.

---

### 🌱 Proses Pulang: Keluarga Sebagai Tim Pemulihan

Pulang dari RSJ bukan berarti masalah selesai. Bunga masih berputar. DC masih menelepon. Tapi sesuatu yang fundamental telah berubah: **Arya tidak sendirian lagi.**

Keluarga Rina dan orang tua Arya tidak langsung bayar lunas. Mereka melakukan langkah nyata:

1.  **Mengamankan Mental Arya**: Jadwalkan terapi rutin dan konsumsi obat teratur sesuai anjuran psikiater.
2.  **Memutus Siklus Teror**: Rina mengambil alih HP Arya, memblokir DC, dan ayah Arya yang menghadapi penagih.
3.  **Dokumentasi & Jalur Hukum**: Melaporkan praktik ilegal ke OJK 157 dan Kominfo 159.
4.  **Strategi Pelunasan Terukur**: Negosiasi hanya untuk pokok utang dan membuat anggaran ketat tanpa gali lubang baru.

6 bulan kemudian, Arya belum lunas 100%. Tapi matanya sudah tidak kosong. Tidurnya sudah nyenyak. Tawanya sudah kembali. Dan yang paling penting: **dia sudah tidak malu lagi.**

---

### 💌 Surat untuk Keluarga

Jangan tunggu sampai pintu RSJ yang terbuka. Jangan tunggu sampai orang asing yang mengetuk rumahmu. **Duduklah. Tanyalah pelan. Dengarkan tanpa menghakimi.** Katakan: *"Apa pun yang terjadi, kita keluarga. Kita bereskan ini bersama."*

Sering kali, yang menyelamatkan seseorang bukan pelunasan utang, tapi kalimat: *"Kamu nggak perlu kuat sendirian lagi. Aku di sini."*
EOD;

Article::updateOrCreate(
    ['slug' => 'pintu-rsj-yang-terbuka'],
    [
        'title' => 'Pintu RSJ yang Terbuka, dan Keluarga yang Akhirnya Tahu',
        'category' => 'Cerita Nyata',
        'summary' => 'Sebuah narasi trauma-informed tentang titik nadir Arya yang harus masuk RSJ akibat teror pinjol, dan bagaimana kejujuran di depan keluarga menjadi awal pemulihannya.',
        'content' => $content,
        'image_url' => '/images/articles/rsj.webp',
        'author' => 'Tim PinjolWatch',
        'status' => 'published',
        'published_at' => now(),
    ]
);

echo "Article 'Pintu RSJ yang Terbuka' created successfully!\n";
