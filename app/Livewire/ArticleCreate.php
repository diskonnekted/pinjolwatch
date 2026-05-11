<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class ArticleCreate extends Component
{
    use WithFileUploads;

    public $title;
    public $content;
    public $image;
    public $author_name = 'Anonim';
    public $type = 'experience';

    public function save()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:10240', // 10MB Max
        ]);

        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('public/articles');
        }

        Article::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title) . '-' . Str::random(5),
            'content' => $this->content,
            'image_path' => $imagePath,
            'author_name' => $this->author_name,
            'type' => $this->type,
            'status' => 'published', // Automatically publish for this dummy version
        ]);

        session()->flash('message', 'Artikel berhasil dibuat.');

        $this->reset(['title', 'content', 'image', 'author_name', 'type']);
    }

    public function render()
    {
        return view('livewire.article-create');
    }
}
