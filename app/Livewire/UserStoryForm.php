<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class UserStoryForm extends Component
{
    use WithFileUploads;

    public $title;
    public $content;
    public $image;
    public $author_name;
    public $type = 'experience';

    protected $rules = [
        'title' => 'required|min:10|max:255',
        'content' => 'required|min:100',
        'author_name' => 'required|min:3',
        'image' => 'nullable|image|max:2048', // 2MB Max
    ];

    public function mount()
    {
        $this->author_name = auth()->user()->nickname ?: auth()->user()->name;
    }

    public function submit()
    {
        $this->validate();

        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('articles/user', 'public');
        }

        Article::create([
            'user_id' => auth()->id(),
            'title' => $this->title,
            'slug' => Str::slug($this->title) . '-' . Str::random(5),
            'content' => $this->content,
            'image_path' => $imagePath,
            'author_name' => $this->author_name,
            'type' => $this->type,
            'status' => 'pending',
        ]);

        session()->flash('message', 'Cerita Anda berhasil dikirim! Tim kami akan meninjau dan melakukan kurasi sebelum diterbitkan.');

        return redirect()->route('dashboard', ['tab' => 'reports']); // Or redirect to a "My Stories" page if implemented
    }

    public function render()
    {
        return view('livewire.user-story-form');
    }
}
