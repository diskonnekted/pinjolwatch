<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ChatSession;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class UserChatSession extends Component
{
    public $sessionId;
    public $newMessage = '';

    public function mount($sessionId)
    {
        $this->sessionId = $sessionId;
    }

    public function sendMessage()
    {
        $session = ChatSession::findOrFail($this->sessionId);

        if ($session->status === 'completed' || $session->status === 'expired') {
            session()->flash('error', 'Sesi ini telah berakhir.');
            return;
        }

        $this->validate(['newMessage' => 'required|string|max:1000']);

        Message::create([
            'chat_session_id' => $this->sessionId,
            'sender_id' => Auth::id(),
            'content' => $this->newMessage,
        ]);

        $this->newMessage = '';
        $this->dispatch('message-sent');
    }

    public function endSession()
    {
        $session = ChatSession::findOrFail($this->sessionId);
        $session->update(['status' => 'completed']);
        $this->dispatch('session-ended');
    }

    public function render()
    {
        $session = ChatSession::with(['messages.sender', 'responder'])->findOrFail($this->sessionId);
        
        return view('livewire.user-chat-session', [
            'session' => $session,
            'messages' => $session->messages()->orderBy('created_at', 'asc')->get()
        ]);
    }
}
