<?php

use Illuminate\Support\Facades\DB;

require dirname(__DIR__) . '/vendor/autoload.php';
$app = require_once dirname(__DIR__) . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$articles = DB::table('articles')->get();

foreach ($articles as $article) {
    $oldPath = $article->image_path;
    $filename = basename($oldPath);
    
    // Set all to point to the public images directory
    $newPath = '/images/articles/' . $filename;
    
    DB::table('articles')->where('id', $article->id)->update([
        'image_path' => $newPath
    ]);
    
    echo "Updated ID {$article->id}: {$oldPath} -> {$newPath}\n";
}
