<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleSystem extends Component
{
    public function render()
    {
        $articles = Article::where('status', 'published')
            ->latest()
            ->paginate(6);

        return view('livewire.article-system', compact('articles'));
    }
}
