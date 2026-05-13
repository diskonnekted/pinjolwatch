<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';

use App\Models\Message;
use App\Models\User;

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$adminId = 1;
$userIds = [2, 4, 5];

$messages = [
    [
        'user_id' => $adminId,
        'sender_id' => 2, // budi
        'content' => "Halo admin, saya mau tanya cara lapor pinjol yang sebar data gimana ya? Saya sudah stres banget.",
        'created_at' => now()->subHours(2),
    ],
    [
        'user_id' => $adminId,
        'sender_id' => 4, // User Uji Coba
        'content' => "Selamat sore admin PinjolWatch. Apakah ada layanan bantuan hukum gratis atau LBH yang bisa mendampingi kasus saya?",
        'created_at' => now()->subMinutes(45),
    ],
    [
        'user_id' => $adminId,
        'sender_id' => 5, // samsul
        'content' => "TOLONG ADMIN! DC sudah mulai telepon ke kantor saya dan atasan saya marah besar. Saya bingung harus gimana lagi.",
        'created_at' => now()->subMinutes(10),
    ],
    [
        'user_id' => 2,
        'sender_id' => $adminId,
        'content' => "Halo Pak Budi, tetap tenang ya. Kami sarankan segera kumpulkan bukti screenshot sebar datanya untuk dilaporkan ke OJK dan Polisi.",
        'created_at' => now()->subHour(),
        'read_at' => now()->subMinutes(30),
    ],
];

foreach ($messages as $data) {
    Message::create($data);
}

echo "Dummy messages created successfully!\n";
