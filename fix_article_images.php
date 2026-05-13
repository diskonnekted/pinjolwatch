<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';

use App\Models\Article;
use Illuminate\Support\Str;

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Fix RSJ Article
Article::where('slug', 'pintu-rsj-yang-terbuka')->update([
    'image_path' => '/images/articles/rsj.webp',
    'author_name' => 'Tim PinjolWatch',
    'type' => 'experience'
]);

// Fix Remeh Article
Article::where('slug', 'jangan-remehkan-beban-orang-lain')->update([
    'image_path' => '/images/articles/remeh.webp',
    'author_name' => 'Tim PinjolWatch',
    'type' => 'article'
]);

echo "Fixed image_path for RSJ and Remeh articles!\n";
