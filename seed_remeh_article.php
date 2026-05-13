<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';

use App\Models\Article;
use Illuminate\Support\Str;

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$content = <<<'EOD'
Jam 11 malam. Grup WhatsApp keluarga ramai.

*"Eh si Andi kena pinjol, katanya sampai diteror DC. Kasihan ya, tapi ya dia juga sih, ceroboh banget."*

*"Iya, padahal cuma 3 juta. Aku dulu pernah pinjem 10 juta biasa aja. Kenapa dia sampai depresi gitu? Lemah mental."*

*"Harusnya dia lebih kuat. Jangan manja lah, masalah segitu doang dibawa mati."*

Komentar-komentar itu mengalir lancar. Mudah. Tanpa beban. Tapi di kamar sebelah, Andi sedang duduk di lantai kamar mandi, menatap botol obat yang baru saja diresepkan psikiater. Tangannya gemetar. Napasnya sesak. Di kepalanya, satu pikiran berputar tanpa henti: *"Aku gagal. Aku beban. Aku nggak berguna."*

---

### 🎭 Ilusi "Saya Pasti Kuat"

Kita mudah berkata, *"Kalau aku di posisi dia, pasti aku tenang aja."* Kita berkata begitu karena **kita sedang tidak berada di posisinya.** Kita melihat dari luar, di mana angka "5 juta" hanyalah angka. Tapi bagi si B, 5 juta itu mungkin uang obat ibunya yang sakit kronis atau tabungan 3 tahun yang habis dalam 3 hari. **Konteks mengubah segalanya.**

### 🧠 Kenapa Reaksi Orang Berbeda-Beda?

1.  **Latar Belakang Trauma**: Bagi mereka yang tumbuh di keluarga yang sulit finansial, utang adalah ancaman eksistensial.
2.  **Sistem Pendukung**: Seseorang dengan utang 10 juta tapi didukung keluarga akan jauh lebih kuat dibanding yang utang 3 juta tapi dikucilkan.
3.  **Kondisi Biologis**: Stres memicu kortisol. Pada orang dengan riwayat anxiety, respons fisik terhadap teror DC jauh lebih hebat. Ini bukan soal lemah, ini soal **biologi**.

### 💔 Luka yang Diperparah oleh Penghakiman

Korban pinjol sudah menghakimi dirinya sendiri jauh lebih keras daripada siapapun. Ketika kita menambahkan komentar seperti *"Harusnya jangan manja,"* kita bukan memberi pelajaran—kita **menendang orang yang sudah terjatuh**. Penghakiman mendorong mereka untuk semakin menyembunyikan masalah, yang berarti semakin menjauh dari solusi.

### 🌍 Suatu Saat, Giliranmu Akan Tiba

Hidup itu berputar. PHK mendadak, sakit keras, atau bencana alam bisa menimpa siapa saja. Saat itu tiba, kamu akan berada di posisi yang sama: **butuh empati, bukan penghakiman.** Bayangkan jika saat itu orang-orang berkata hal yang sama padamu. Bagaimana rasanya?

---

### 🤝 Apa yang Bisa Kita Lakukan?

**LAKUKAN:**
*   Dengarkan tanpa menghakimi.
*   Validasi perasaannya: *"Pasti berat banget ya."*
*   Tawarkan bantuan konkret: *"Apa yang bisa aku bantu?"*
*   Arahkan ke bantuan profesional (LBH atau Psikolog).

**JANGAN:**
*   Menyimpulkan tanpa tahu cerita lengkapnya.
*   Membandingkan masalahnya dengan "yang lebih parah".
*   Menyebarkan gosip tentang masalah keuangan orang lain.

---

**Empati tidak melunasi utang. Tapi ia bisa menyelamatkan nyawa.** Jangan remehkan perasaan orang lain, karena suatu saat, kita akan membutuhkan orang lain untuk tidak meremehkan perasaan kita.

💙
EOD;

Article::updateOrCreate(
    ['slug' => 'jangan-remehkan-beban-orang-lain'],
    [
        'title' => '"Kamu Lemah Banget, Cuma Gara-gara Utang": Berhenti Meremehkan Batas Orang Lain',
        'category' => 'Edukasi Psikologi',
        'summary' => 'Sebuah refleksi tentang mengapa kita tidak boleh menghakimi korban pinjol. Nominal utang mungkin kecil bagi Anda, tapi beban mentalnya bisa mematikan bagi orang lain.',
        'content' => $content,
        'image_url' => '/images/articles/remeh.png',
        'author' => 'Tim PinjolWatch',
        'status' => 'published',
        'published_at' => now(),
    ]
);

echo "Article 'Jangan Remehkan' created successfully!\n";
