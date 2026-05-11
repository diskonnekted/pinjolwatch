<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use App\Models\Article;
use App\Models\AuditLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminCmsList extends Component
{
    use WithPagination;

    #[Layout('components.admin-layout')]
    
    public $search = '';
    public $filterType = '';
    public $filterStatus = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'filterType' => ['except' => ''],
        'filterStatus' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterType()
    {
        $this->resetPage();
    }

    public function updatingFilterStatus()
    {
        $this->resetPage();
    }

    public function toggleStatus($id)
    {
        $article = Article::findOrFail($id);
        $oldStatus = $article->status;
        $newStatus = ($article->status === 'published') ? 'pending' : 'published';
        
        $article->update(['status' => $newStatus]);

        AuditLog::create([
            'user_id' => Auth::id(),
            'route_name' => 'admin.cms.toggle-status',
            'http_method' => 'PATCH',
            'url' => request()->fullUrl(),
            'ip_masked' => $this->maskIP(request()->ip()),
            'payload_summary' => json_encode([
                'article_id' => $id,
                'title' => $article->title,
                'old_status' => $oldStatus,
                'new_status' => $newStatus,
                'action' => 'Toggled Article Status'
            ]),
        ]);

        session()->flash('message', 'Status artikel "' . $article->title . '" diubah menjadi ' . ($newStatus === 'published' ? 'Diterbitkan' : 'Draft') . '.');
    }

    public function deleteArticle($id)
    {
        $article = Article::findOrFail($id);
        
        // Delete image if exists
        if ($article->image_path) {
            Storage::disk('public')->delete($article->image_path);
        }

        AuditLog::create([
            'user_id' => Auth::id(),
            'route_name' => 'admin.cms.delete',
            'http_method' => 'DELETE',
            'url' => request()->fullUrl(),
            'ip_masked' => $this->maskIP(request()->ip()),
            'payload_summary' => json_encode([
                'article_id' => $id,
                'title' => $article->title,
                'action' => 'Deleted Article'
            ]),
        ]);

        $article->delete();
        session()->flash('message', 'Artikel berhasil dihapus.');
    }

    private function maskIP(?string $ip): string
    {
        if (!$ip) return 'unknown';
        return preg_replace('/(\.\d+){2}$/', '.xxx.xxx', $ip);
    }

    public function render()
    {
        $query = Article::query();

        if ($this->search) {
            $query->where(function($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('author_name', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->filterType) {
            $query->where('type', $this->filterType);
        }

        if ($this->filterStatus) {
            $query->where('status', $this->filterStatus);
        }

        $articles = $query->latest()->paginate(10);

        return view('livewire.admin-cms-list', [
            'articles' => $articles
        ]);
    }
}
