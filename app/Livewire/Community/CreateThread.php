<?php

namespace App\Livewire\Community;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\CommunityThread;

class CreateThread extends Component
{
    use WithFileUploads;

    public $content = '';
    public $isAnonymous = true;
    public $media;

    protected $rules = [
        'content' => 'required|string|max:1000',
        'isAnonymous' => 'boolean',
        'media' => 'nullable|file|mimes:jpeg,png,jpg,gif,webp,mp4,mov,avi,webm|max:10240', // Max 10MB
    ];

    public function createThread()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $this->validate();

        $mediaPath = null;
        $mediaType = null;

        if ($this->media) {
            $mediaPath = $this->media->store('community_media', 'public');
            
            // Determine media type based on extension
            $extension = $this->media->getClientOriginalExtension();
            if (in_array(strtolower($extension), ['mp4', 'mov', 'avi', 'webm'])) {
                $mediaType = 'video';
            } else {
                $mediaType = 'image';
            }
        }

        CommunityThread::create([
            'user_id' => auth()->id(),
            'content' => $this->content,
            'is_anonymous' => $this->isAnonymous,
            'media_path' => $mediaPath,
            'media_type' => $mediaType,
        ]);

        $this->reset(['content', 'media']);
        $this->isAnonymous = true; // Reset back to default anonymous

        $this->dispatch('threadCreated');
        session()->flash('message', 'Pengalaman Anda berhasil dibagikan.');
    }

    public function render()
    {
        return view('livewire.community.create-thread');
    }
}
