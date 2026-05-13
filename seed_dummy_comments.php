<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';

use App\Models\Comment;
use App\Models\User;
use App\Models\Article;

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$comments = [
    [
        'user_id' => 2, // budi
        'article_id' => 1,
        'content' => "Sangat membantu informasinya, kebetulan saya sedang diteror juga. Terima kasih tipsnya!",
        'status' => 'approved',
    ],
    [
        'user_id' => 4, // User Uji Coba
        'article_id' => 2,
        'content' => "Tips yang sangat berguna, terutama bagian mengamankan kontak darurat. Terima kasih PinjolWatch!",
        'status' => 'approved',
    ],
    [
        'user_id' => 5, // samsul
        'article_id' => 3,
        'content' => "Relate banget sama ceritanya, saya juga pernah merasakan hal yang sama. Rasanya sesak sekali kalau HP bunyi terus.",
        'status' => 'pending',
    ],
    [
        'user_id' => 4, // User Uji Coba
        'article_id' => 1,
        'content' => "Apakah DC benar-benar akan datang ke rumah ya? Soalnya saya diancam terus mau didatangi kalau tidak bayar sore ini.",
        'status' => 'pending',
    ],
    [
        'user_id' => 2, // budi
        'article_id' => 2,
        'content' => "Komentar ini hanya untuk testing sistem moderasi admin. Semoga sistemnya lancar jaya!",
        'status' => 'pending',
    ],
    [
        'user_id' => 5, // samsul
        'article_id' => 2,
        'content' => "Iklan pinjol gacor langsung cair cek link ini: bit.ly/pinjol-abal-abal",
        'status' => 'rejected',
    ],
];

foreach ($comments as $data) {
    Comment::create($data);
}

echo "Dummy comments created successfully!\n";
