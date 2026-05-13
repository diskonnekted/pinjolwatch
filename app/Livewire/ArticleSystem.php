<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleSystem extends Component
{
    use \Livewire\WithPagination;

    public $search = '';

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $articles = Article::where('status', 'published')
            ->when($this->search, function($query) {
                $query->where(function($q) {
                    $q->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('content', 'like', '%' . $this->search . '%')
                      ->orWhere('author_name', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->paginate(9);

        return view('livewire.article-system', compact('articles'));
    }
}
