<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\User;
use App\Notifications\AdminAlert;
use Illuminate\Support\Facades\Auth;

class ArticleComments extends Component
{
    public $articleId;
    public $content = '';
    
    protected $rules = [
        'content' => 'required|min:10|max:2000',
    ];

    public function mount($articleId)
    {
        $this->articleId = $articleId;
    }

    public function submitComment()
    {
        if (!Auth::check()) {
            return;
        }

        $this->validate();

        Comment::create([
            'user_id' => Auth::id(),
            'article_id' => $this->articleId,
            'content' => $this->content,
            'status' => 'pending',
        ]);

        $this->content = '';

        // Notify Admins
        $admins = User::role(['super-admin', 'admin'])->get();
        foreach ($admins as $admin) {
            $admin->notify(new AdminAlert(
                "Komentar Baru Menunggu Moderasi",
                Auth::user()->name . " baru saja mengirimkan komentar pada sebuah artikel.",
                'comment'
            ));
        }

        session()->flash('message', 'Komentar Anda telah dikirim dan sedang menunggu moderasi.');
    }

    public function render()
    {
        return view('livewire.article-comments', [
            'comments' => Comment::where('article_id', $this->articleId)
                ->where('status', 'approved')
                ->with('user')
                ->latest()
                ->get(),
        ]);
    }
}
