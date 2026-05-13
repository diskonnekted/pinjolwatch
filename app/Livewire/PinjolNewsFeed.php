<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PinjolNews;
use Livewire\WithPagination;

class PinjolNewsFeed extends Component
{
    use WithPagination;

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
        $news = PinjolNews::where(function($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('source', 'like', '%' . $this->search . '%');
            })
            ->latest('published_at')
            ->latest()
            ->paginate(12);

        return view('livewire.pinjol-news-feed', [
            'news' => $news
        ]);
    }
}
