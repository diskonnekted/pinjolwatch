<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Article;
use Illuminate\Support\Str;

$title = "Test Article " . time();
$slug = Str::slug($title);

$data = [
    'user_id' => 1,
    'title' => $title,
    'slug' => $slug,
    'content' => "Test content",
    'type' => 'education',
    'status' => 'published',
    'author_name' => 'Test Author',
];

Article::create($data);
echo "Test article created successfully.\n";
unlink(__FILE__);
