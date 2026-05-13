<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Comment;
use Livewire\Attributes\Layout;

class AdminCommentModeration extends Component
{
    use WithPagination;

    #[Layout('components.admin-layout')]

    public $statusFilter = 'pending';
    public $search = '';

    public function approve($id)
    {
        Comment::findOrFail($id)->update(['status' => 'approved']);
        session()->flash('message', 'Komentar telah disetujui.');
    }

    public function reject($id)
    {
        Comment::findOrFail($id)->update(['status' => 'rejected']);
        session()->flash('message', 'Komentar telah ditolak.');
    }

    public function delete($id)
    {
        Comment::findOrFail($id)->delete();
        session()->flash('message', 'Komentar telah dihapus permanen.');
    }

    public function render()
    {
        $query = Comment::query()
            ->with(['user', 'article'])
            ->when($this->statusFilter, fn($q) => $q->where('status', $this->statusFilter))
            ->when($this->search, function($q) {
                $q->where('content', 'like', '%' . $this->search . '%')
                  ->orWhereHas('user', fn($qu) => $qu->where('name', 'like', '%' . $this->search . '%'))
                  ->orWhereHas('article', fn($qa) => $qa->where('title', 'like', '%' . $this->search . '%'));
            });

        return view('livewire.admin-comment-moderation', [
            'comments' => $query->latest()->paginate(10),
        ]);
    }
}
