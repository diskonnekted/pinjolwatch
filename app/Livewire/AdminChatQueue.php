<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ChatSession;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

class AdminChatQueue extends Component
{
    #[Layout('components.admin-layout')]

    public $activeSessionId = null;
    public $replyMessage = '';

    public function selectSession($sessionId)
    {
        $session = ChatSession::findOrFail($sessionId);
        
        // If session is waiting, admin joins it
        if ($session->status === 'waiting') {
            $session->update([
                'responder_id' => Auth::id(),
                'status' => 'active'
            ]);
        }

        $this->activeSessionId = $sessionId;
    }

    public function sendMessage()
    {
        $this->validate(['replyMessage' => 'required|string|max:1000']);

        Message::create([
            'chat_session_id' => $this->activeSessionId,
            'sender_id' => Auth::id(),
            'content' => $this->replyMessage,
        ]);

        $this->replyMessage = '';
    }

    public function closeSession()
    {
        $session = ChatSession::findOrFail($this->activeSessionId);
        $session->update(['status' => 'completed']);
        $this->activeSessionId = null;
    }

    public function render()
    {
        $waitingSessions = ChatSession::where('status', 'waiting')->with('requester')->get();
        $myActiveSessions = ChatSession::where('responder_id', Auth::id())
            ->where('status', 'active')
            ->with('requester')
            ->get();

        $conversation = [];
        $selectedSession = null;
        if ($this->activeSessionId) {
            $selectedSession = ChatSession::with(['requester', 'messages.sender'])->find($this->activeSessionId);
            $conversation = $selectedSession->messages;
        }

        return view('livewire.admin-chat-queue', [
            'waitingSessions' => $waitingSessions,
            'myActiveSessions' => $myActiveSessions,
            'conversation' => $conversation,
            'selectedSession' => $selectedSession,
        ]);
    }
}
