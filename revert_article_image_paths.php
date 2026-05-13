<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;

DB::table('articles')
    ->where('image_path', 'not like', 'images/articles/%')
    ->where('image_path', 'not like', '/images/articles/%')
    ->update(['image_path' => DB::raw("CONCAT('images/articles/', image_path)")]);

echo "Updated article image paths.
";
