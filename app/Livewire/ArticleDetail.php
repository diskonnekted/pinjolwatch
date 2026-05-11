<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class ArticleDetail extends Component
{
    public $article;

    public function mount($slug)
    {
        $this->article = Article::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.article-detail');
    }
}
