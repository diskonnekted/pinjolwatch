<?php

/**
 * Image Optimizer for PinjolWatch
 * Converts large PNG/JPG to WebP for performance.
 */

require dirname(__DIR__) . '/vendor/autoload.php';
$app = require_once dirname(__DIR__) . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

$publicPath = dirname(__DIR__) . '/public';
$articlePath = $publicPath . '/images/articles';

// List of specific large assets in public/
$largeAssets = [
    'Kekuatan Komunitas.png',
    'Ketenangan & Pemulihan Mental.png',
    'Pelaporan Aman & Terlindungi.png',
    'Pembebasan dari Beban.png',
    'Perlindungan & Keamanan.png',
    'anda tidak sendiri.png',
    'literasi_keuangan.png', // although this is in articles too sometimes
];

function convertToWebp($filePath, $quality = 75) {
    if (!file_exists($filePath)) {
        echo "File not found: {$filePath}\n";
        return false;
    }

    $info = getimagesize($filePath);
    $mime = $info['mime'];

    switch ($mime) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($filePath);
            break;
        case 'image/png':
            $image = imagecreatefrompng($filePath);
            imagepalettetotruecolor($image);
            imagealphablending($image, true);
            imagesavealpha($image, true);
            break;
        default:
            echo "Unsupported format: {$mime} for {$filePath}\n";
            return false;
    }

    $webpPath = preg_replace('/\.(png|jpg|jpeg)$/i', '.webp', $filePath);
    
    if (imagewebp($image, $webpPath, $quality)) {
        imagedestroy($image);
        echo "Successfully converted: " . basename($filePath) . " -> " . basename($webpPath) . " (" . round(filesize($webpPath)/1024, 2) . " KB)\n";
        return $webpPath;
    }

    imagedestroy($image);
    return false;
}

echo "--- Optimizing Public Assets ---\n";
foreach ($largeAssets as $assetName) {
    $fullPath = $publicPath . '/' . $assetName;
    convertToWebp($fullPath);
}

echo "\n--- Optimizing Article Images ---\n";
if (is_dir($articlePath)) {
    $files = scandir($articlePath);
    foreach ($files as $file) {
        if (preg_match('/\.(png|jpg|jpeg)$/i', $file)) {
            convertToWebp($articlePath . '/' . $file);
        }
    }
}

echo "\n--- Updating Database References ---\n";
$articles = DB::table('articles')->get();
foreach ($articles as $article) {
    if (Str::endsWith($article->image_path, ['.png', '.jpg', '.jpeg'])) {
        $newPath = preg_replace('/\.(png|jpg|jpeg)$/i', '.webp', $article->image_path);
        DB::table('articles')->where('id', $article->id)->update(['image_path' => $newPath]);
        echo "Updated DB ID {$article->id}: {$newPath}\n";
    }
}

echo "\nOptimization Complete.\n";
