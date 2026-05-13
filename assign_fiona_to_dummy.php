<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';

use App\Models\Comment;
use App\Models\Message;
use App\Models\User;

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$fiona = User::where('name', 'Fiona')->first();

if (!$fiona) {
    die("Fiona not found!");
}

// Update some comments to be from Fiona (as approved admin responses)
// In this case, I'll just create a new comment from Fiona on article 1
Comment::create([
    'user_id' => $fiona->id,
    'article_id' => 1,
    'content' => "Halo Bapak Budi, saya Fiona dari tim PinjolWatch. Tetap tenang ya Pak. Kami siap mendampingi proses pelaporan Bapak agar teror DC ini segera berakhir. Pastikan simpan semua bukti chatnya.",
    'status' => 'approved',
]);

// Update dummy messages to be from Fiona
Message::where('sender_id', 1)->update(['sender_id' => $fiona->id]);
Message::where('user_id', 1)->update(['user_id' => $fiona->id]);

echo "Fiona has been assigned to dummy data!\n";
