<?php

namespace App\Livewire\Community;

use Livewire\Component;
use App\Models\CommunityThread;

class ThreadItem extends Component
{
    public CommunityThread $thread;
    public $isLiked;

    public function mount(CommunityThread $thread)
    {
        $this->thread = $thread;
        // In a real app, you might want to eager load this or pass it in
        $this->isLiked = auth()->check() ? $thread->likes()->where('user_id', auth()->id())->exists() : false;
    }

    public function toggleLike()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if ($this->isLiked) {
            $this->thread->likes()->where('user_id', auth()->id())->delete();
            $this->thread->decrement('likes_count');
            $this->isLiked = false;
        } else {
            $this->thread->likes()->create(['user_id' => auth()->id()]);
            $this->thread->increment('likes_count');
            $this->isLiked = true;
        }
    }

    public function render()
    {
        return view('livewire.community.thread-item');
    }
}
