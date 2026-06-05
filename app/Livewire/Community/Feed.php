<?php

namespace App\Livewire\Community;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CommunityThread;

class Feed extends Component
{
    use WithPagination;

    protected $listeners = ['threadCreated' => '$refresh'];

    public function render()
    {
        $threads = CommunityThread::with(['user'])
            ->withExists(['likes as is_liked_by_user' => function ($query) {
                if (auth()->check()) {
                    $query->where('user_id', auth()->id());
                } else {
                    $query->whereRaw('1 = 0');
                }
            }])
            ->latest()
            ->paginate(10);

        return view('livewire.community.feed', [
            'threads' => $threads
        ])->layout('layouts.guest');
    }
}
