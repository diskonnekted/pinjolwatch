<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ChatSession;
use App\Models\Message;
use App\Models\User;
use App\Notifications\AdminAlert;
use Illuminate\Support\Facades\Auth;

class UserMessaging extends Component
{
    public $activeSessionId = null;

    protected $listeners = ['session-selected' => 'selectSession'];

    public function selectSession($sessionId)
    {
        $this->activeSessionId = $sessionId;
    }

    public function createSession()
    {
        // Check if there's already a waiting or active session
        $existing = ChatSession::where('requester_id', Auth::id())
            ->whereIn('status', ['waiting', 'active'])
            ->first();

        if ($existing) {
            $this->activeSessionId = $existing->id;
            return;
        }

        $session = ChatSession::create([
            'requester_id' => Auth::id(),
            'status' => 'waiting',
            'expires_at' => now()->addHours(1),
        ]);

        // Notify Admins
        $admins = User::role(['super-admin', 'moderator'])->get();
        foreach ($admins as $admin) {
            $admin->notify(new AdminAlert(
                "Permintaan Sesi Obrolan Baru",
                Auth::user()->nickname ?: Auth::user()->name . " sedang menunggu bantuan di ruang obrolan.",
                'chat'
            ));
        }

        $this->activeSessionId = $session->id;
    }

    public function render()
    {
        return view('livewire.user-messaging', [
            'sessions' => ChatSession::where('requester_id', Auth::id())
                ->orderBy('created_at', 'desc')
                ->get()
        ]);
    }
}
