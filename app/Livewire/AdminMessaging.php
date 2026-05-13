<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

class AdminMessaging extends Component
{
    #[Layout('components.admin-layout')]

    public $selectedUserId = null;
    public $replyMessage = '';

    public $templates = [
        [
            'id' => 1,
            'title' => 'Cara Lapor Pinjol Ilegal',
            'content' => "Halo, untuk melaporkan pinjol ilegal, Anda bisa menghubungi Satgas PASTI OJK melalui:\n1. WhatsApp: 081-157-157-157\n2. Email: konsumen@ojk.go.id\n3. Telepon: 157\nPastikan Anda sudah menyiapkan bukti berupa screenshot aplikasi dan ancaman yang diterima."
        ],
        [
            'id' => 2,
            'title' => 'Menghadapi Teror DC',
            'content' => "Jika Anda mendapatkan ancaman/teror dari DC lapangan:\n1. Tetap tenang dan jangan panik.\n2. Rekam seluruh interaksi (chat/telepon/video).\n3. Minta bukti identitas, sertifikat SPPI, dan surat tugas.\n4. Jika ada kekerasan fisik/ancaman nyawa, segera lapor polisi (110).\nAnda bisa membaca panduan lengkapnya di menu 'Cerita Kita' pada portal kami."
        ],
        [
            'id' => 3,
            'title' => 'Cek Legalitas Pinjol',
            'content' => "Untuk mengecek apakah sebuah aplikasi pinjol legal atau ilegal, silakan ketik nama aplikasi tersebut dan kirimkan melalui WhatsApp resmi OJK di nomor 081-157-157-157. Anda juga bisa mengecek daftar terbaru di situs resmi ojk.go.id."
        ],
        [
            'id' => 4,
            'title' => 'Dukungan Psikologis',
            'content' => "Kami memahami situasi ini sangat berat bagi kesehatan mental Anda. Jika Anda merasa sangat tertekan, silakan hubungi layanan bantuan psikologis darurat di:\n- Healing 119 (Ext. 8)\n- Atau kunjungi komunitas pemulihan kami di menu 'Healing' untuk berbagi dengan sesama penyintas."
        ],
    ];

    public function useTemplate($templateId)
    {
        foreach ($this->templates as $template) {
            if ($template['id'] == $templateId) {
                $this->replyMessage = $template['content'];
                break;
            }
        }
    }

    public function selectUser($userId)
    {
        $this->selectedUserId = $userId;
        // Mark messages as read if needed
        Message::where('user_id', Auth::id()) // In this context, user_id is the recipient
               ->where('sender_id', $userId)
               ->whereNull('read_at')
               ->update(['read_at' => now()]);
    }

    public function sendReply()
    {
        $this->validate(['replyMessage' => 'required|string|max:1000']);

        Message::create([
            'user_id' => $this->selectedUserId, // The target user
            'sender_id' => Auth::id(),        // Admin as sender
            'content' => $this->replyMessage,
        ]);

        $this->replyMessage = '';
    }

    public function render()
    {
        // Get list of users who have conversation with system
        $users = User::whereHas('messages')
            ->orWhereHas('sentMessages')
            ->where('id', '!=', Auth::id())
            ->withCount(['messages as unread_count' => function($query) {
                $query->whereNull('read_at')->where('user_id', Auth::id());
            }])
            ->get();

        $conversation = [];
        if ($this->selectedUserId) {
            $conversation = Message::where(function($q) {
                    $q->where('user_id', $this->selectedUserId)->where('sender_id', Auth::id());
                })
                ->orWhere(function($q) {
                    $q->where('user_id', Auth::id())->where('sender_id', $this->selectedUserId);
                })
                ->orderBy('created_at', 'asc')
                ->get();
        }

        return view('livewire.admin-messaging', [
            'users' => $users,
            'conversation' => $conversation,
            'selectedUser' => $this->selectedUserId ? User::find($this->selectedUserId) : null,
        ]);
    }
}
