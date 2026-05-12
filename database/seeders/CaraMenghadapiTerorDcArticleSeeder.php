<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CaraMenghadapiTerorDcArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = 'Cara Saya Menghadapi Teror DC Lapangan: Sebuah Catatan Perjuangan';
        $slug = Str::slug($title);

        // Check if the article already exists
        if (Article::where('slug', $slug)->exists()) {
            $this->command->info('Article "Cara Saya Menghadapi Teror DC Lapangan" already exists.');
            return;
        }

        $content = File::get(resource_path('views/articles/cara-menghadapi-teror-dc.blade.php'));

        Article::create([
            'title' => $title,
            'slug' => $slug,
            'content' => $content,
            'author_name' => 'Seorang Pejuang',
            'type' => 'experience',
            'status' => 'published',
            'image_path' => 'pelaporan-aman-terlindungi.png', // Example image
        ]);

        $this->command->info('Article "Cara Saya Menghadapi Teror DC Lapangan" has been created.');
    }
}
