<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

class AdminBroadcast extends Component
{
    #[Layout('components.admin-layout')]

    public $messageContent = '';
    public $targetType = 'all'; // all, specific
    public $selectedUsers = [];
    public $selectedTemplate = '';

    public $templates = [
        [
            'id' => 'security_alert',
            'name' => '🚨 Peringatan Keamanan',
            'content' => "Halo [Name], kami mendeteksi adanya aktivitas mencurigakan terkait pinjol ilegal baru di wilayah Anda. Mohon untuk tetap waspada dan tidak memberikan data KTP kepada pihak yang tidak dikenal."
        ],
        [
            'id' => 'maintenance',
            'name' => '🛠️ Pemeliharaan Sistem',
            'content' => "Halo [Name], sistem PinjolWatch akan melakukan pemeliharaan rutin pada pukul 00:00 WIB nanti. Layanan pelaporan mungkin akan terganggu selama 30 menit."
        ],
        [
            'id' => 'educational_tip',
            'name' => '💡 Tip Literasi Finansial',
            'content' => "Halo [Name], tahukah Anda bahwa pinjol legal terdaftar OJK tidak pernah meminta akses ke daftar kontak HP? Selalu cek legalitas aplikasi sebelum meminjam."
        ],
        [
            'id' => 'welcome_back',
            'name' => '👋 Sapaan Pengguna',
            'content' => "Halo [Name], sudah lama tidak melihat Anda di dashboard. Kami telah menambahkan fitur baru untuk membantu Anda memantau status laporan lebih detail."
        ],
    ];

    public function applyTemplate()
    {
        if ($this->selectedTemplate) {
            $template = collect($this->templates)->firstWhere('id', $this->selectedTemplate);
            if ($template) {
                $this->messageContent = $template['content'];
            }
        }
    }

    public function sendBroadcast()
    {
        $this->validate([
            'messageContent' => 'required|string|max:2000',
            'targetType' => 'required|in:all,specific',
            'selectedUsers' => 'required_if:targetType,specific|array'
        ]);

        $users = [];
        if ($this->targetType === 'all') {
            $users = User::where('id', '!=', Auth::id())->get();
        } else {
            $users = User::whereIn('id', $this->selectedUsers)->get();
        }

        $count = 0;
        foreach ($users as $user) {
            // Replace [Name] placeholder
            $personalizedContent = str_replace('[Name]', $user->name, $this->messageContent);

            Message::create([
                'user_id' => $user->id,
                'sender_id' => Auth::id(),
                'content' => $personalizedContent,
            ]);
            $count++;
        }

        session()->flash('message', "Broadcast berhasil dikirim ke {$count} pengguna.");
        $this->reset(['messageContent', 'selectedTemplate', 'selectedUsers']);
    }

    public function render()
    {
        return view('livewire.admin-broadcast', [
            'allUsers' => User::where('id', '!=', Auth::id())->get()
        ]);
    }
}
