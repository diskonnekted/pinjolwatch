<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PinjolNews;
use Livewire\WithPagination;

class AdminNewsManager extends Component
{
    use WithPagination;

    public $title, $url, $source, $image_url, $description, $published_at;
    public $editingId = null;
    public $search = '';

    protected $rules = [
        'title' => 'required|string|max:255',
        'url' => 'required|url|max:255',
        'source' => 'nullable|string|max:100',
        'image_url' => 'nullable|url|max:255',
        'description' => 'nullable|string|max:1000',
        'published_at' => 'nullable|date',
    ];

    public function mount()
    {
        $this->published_at = now()->format('Y-m-d\TH:i');
    }

    public function save()
    {
        $data = $this->validate();

        if ($this->editingId) {
            PinjolNews::find($this->editingId)->update($data);
        } else {
            PinjolNews::create($data);
        }

        $this->resetInput();
        session()->flash('message', 'Berita berhasil disimpan.');
    }

    public function edit($id)
    {
        $news = PinjolNews::findOrFail($id);
        $this->editingId = $id;
        $this->title = $news->title;
        $this->url = $news->url;
        $this->source = $news->source;
        $this->image_url = $news->image_url;
        $this->description = $news->description;
        $this->published_at = $news->published_at ? $news->published_at->format('Y-m-d\TH:i') : null;
    }

    public function delete($id)
    {
        PinjolNews::find($id)->delete();
        session()->flash('message', 'Berita berhasil dihapus.');
    }

    public function resetInput()
    {
        $this->reset(['title', 'url', 'source', 'image_url', 'description', 'editingId']);
        $this->published_at = now()->format('Y-m-d\TH:i');
    }

    public function render()
    {
        $news = PinjolNews::where('title', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate(10);

        return view('livewire.admin-news-manager', [
            'newsList' => $news
        ]);
    }
}
