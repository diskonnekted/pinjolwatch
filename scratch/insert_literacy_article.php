<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

require dirname(__DIR__) . '/vendor/autoload.php';
$app = require_once dirname(__DIR__) . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$title = 'Literasi Keuangan Bukan Soal Jadi Kaya Raya, Tapi Soal Tidur Nyenyak';
$slug = Str::slug($title);
$content = file_get_contents(dirname(__DIR__) . '/docs/literasi-sederhana.md');

// Remove frontmatter-like introduction if any
$content = preg_replace('/^Berikut adalah draf artikel.*---/s', '', $content);
$content = trim($content);

DB::table('articles')->updateOrInsert(
    ['slug' => $slug],
    [
        'title' => $title,
        'content' => $content,
        'image_path' => 'images/articles/literasi_keuangan.png',
        'author_name' => 'PinjolWatch Team',
        'type' => 'article',
        'status' => 'published',
        'user_id' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ]
);

echo "Article '{$title}' created successfully.\n";
