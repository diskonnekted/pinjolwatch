<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class UserMessaging extends Component
{
    public $messages;
    public $newMessage;

    public function mount()
    {
        $this->loadMessages();
    }

    public function loadMessages()
    {
        $this->messages = Message::where('user_id', Auth::id())
                                ->with('sender')
                                ->latest()
                                ->get();
    }

    public function sendMessage()
    {
        $this->validate(['newMessage' => 'required|string|max:1000']);

        Message::create([
            'user_id' => Auth::id(),
            'sender_id' => Auth::id(),
            'content' => $this->newMessage,
        ]);

        $this->newMessage = '';
        $this->loadMessages();
    }

    public function render()
    {
        return view('livewire.user-messaging');
    }
}
