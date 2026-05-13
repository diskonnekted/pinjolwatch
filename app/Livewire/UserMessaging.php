<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Message;
use App\Models\User;
use App\Notifications\AdminAlert;
use Illuminate\Support\Facades\Auth;

class UserMessaging extends Component
{
    public $newMessage;

    public function sendMessage()
    {
        $this->validate(['newMessage' => 'required|string|max:1000']);

        Message::create([
            'user_id' => 6, // To Fiona (Admin Responder)
            'sender_id' => Auth::id(),
            'content' => $this->newMessage,
        ]);

        $this->newMessage = '';

        // Notify Admins
        $admins = User::role(['super-admin', 'admin'])->get();
        foreach ($admins as $admin) {
            $admin->notify(new AdminAlert(
                "Pesan Konsultasi Baru",
                Auth::user()->name . " mengirimkan pesan bantuan baru.",
                'message'
            ));
        }
    }

    public function render()
    {
        return view('livewire.user-messaging', [
            'messages' => Message::where('user_id', Auth::id())
                                ->with('sender')
                                ->latest()
                                ->get()
        ]);
    }
}
