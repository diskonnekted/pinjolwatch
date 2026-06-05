<?php

namespace App\Livewire\Community;

use Livewire\Component;
use App\Models\CommunityThread;
use App\Models\CommunityThreadReply;

class ThreadReplies extends Component
{
    public CommunityThread $thread;
    public $content = '';
    public $isAnonymous = true;

    protected $rules = [
        'content' => 'required|string|max:500',
        'isAnonymous' => 'boolean',
    ];

    public function mount(CommunityThread $thread)
    {
        $this->thread = $thread;
    }

    public function addReply()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $this->validate();

        $this->thread->replies()->create([
            'user_id' => auth()->id(),
            'content' => $this->content,
            'is_anonymous' => $this->isAnonymous,
        ]);

        $this->thread->increment('replies_count');

        $this->reset('content');
        $this->isAnonymous = true;

        session()->flash('message', 'Balasan berhasil dikirim.');
    }

    public function render()
    {
        $replies = $this->thread->replies()->with('user')->latest()->get();

        return view('livewire.community.thread-replies', [
            'replies' => $replies
        ]);
    }
}
