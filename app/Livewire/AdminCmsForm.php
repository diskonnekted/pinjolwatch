<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use App\Models\Article;
use App\Models\AuditLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminCmsForm extends Component
{
    use WithFileUploads;

    #[Layout('components.admin-layout')]

    public ?Article $article = null;
    
    public $title = '';
    public $content = '';
    public $author_name = 'Anonim';
    public $type = 'article';
    public $status = 'pending';
    public $image; // Uploaded file
    public $existing_image_path = null;

    public $isEditMode = false;

    public function mount(Article $article)
    {
        if ($article->exists) {
            $this->isEditMode = true;
            $this->article = $article;
            $this->title = $article->title;
            $this->content = $article->content;
            $this->author_name = $article->author_name;
            $this->type = $article->type;
            $this->status = $article->status;
            $this->existing_image_path = $article->image_path;
        } else {
            $this->author_name = Auth::user()->name;
        }
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author_name' => 'required|string|max:100',
            'type' => 'required|in:news,experience,article',
            'status' => 'required|in:pending,published,archived',
            'image' => 'nullable|image|max:2048', // Max 2MB
        ]);

        $imagePath = $this->existing_image_path;
        
        if ($this->image) {
            // Delete old image if exists
            if ($this->existing_image_path) {
                Storage::disk('public')->delete($this->existing_image_path);
            }
            $imagePath = $this->image->store('cms/images', 'public');
        }

        $data = [
            'title' => $this->title,
            'content' => $this->content,
            'author_name' => $this->author_name,
            'type' => $this->type,
            'status' => $this->status,
            'image_path' => $imagePath,
        ];

        if ($this->isEditMode) {
            $this->article->update($data);
            $actionStr = 'Updated Article';
        } else {
            $data['slug'] = Str::slug($this->title) . '-' . Str::random(5);
            $this->article = Article::create($data);
            $actionStr = 'Created Article';
        }

        // Audit Log
        AuditLog::create([
            'user_id' => Auth::id(),
            'route_name' => 'admin.cms.save',
            'http_method' => $this->isEditMode ? 'PUT' : 'POST',
            'url' => request()->fullUrl(),
            'ip_masked' => $this->maskIP(request()->ip()),
            'payload_summary' => json_encode([
                'article_id' => $this->article->id,
                'title' => $this->title,
                'action' => $actionStr
            ]),
        ]);

        session()->flash('message', 'Artikel berhasil ' . ($this->isEditMode ? 'diperbarui!' : 'disimpan!'));
        
        return $this->redirect(route('admin.cms.index'), navigate: true);
    }

    private function maskIP(?string $ip): string
    {
        if (!$ip) return 'unknown';
        return preg_replace('/(\.\d+){2}$/', '.xxx.xxx', $ip);
    }

    public function render()
    {
        return view('livewire.admin-cms-form');
    }
}
