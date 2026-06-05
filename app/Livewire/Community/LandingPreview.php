<?php

namespace App\Livewire\Community;

use Livewire\Component;
use App\Models\CommunityThread;

class LandingPreview extends Component
{
    public function render()
    {
        $threads = CommunityThread::with('user')
            ->latest()
            ->take(3)
            ->get();

        return view('livewire.community.landing-preview', [
            'threads' => $threads
        ]);
    }
}
