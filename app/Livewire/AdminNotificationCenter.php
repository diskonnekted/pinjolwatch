<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminNotificationCenter extends Component
{
    public function markAsRead($notificationId)
    {
        $notification = Auth::user()->notifications()->find($notificationId);
        if ($notification) {
            $notification->markAsRead();
        }
    }

    public function markAllAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
    }

    public function render()
    {
        return view('livewire.admin-notification-center', [
            'notifications' => Auth::user()->notifications()->take(5)->get(),
            'unreadCount' => Auth::user()->unreadNotifications->count(),
        ]);
    }
}
