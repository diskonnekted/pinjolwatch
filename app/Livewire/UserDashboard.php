<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class UserDashboard extends Component
{
    public $activeTab = 'overview';
    public $nickname;
    public $name;
    public $email;

    protected $queryString = ['activeTab' => ['as' => 'tab']];

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->nickname = $user->nickname;
        $this->email = $user->email;

        // If tab is set in query, use it
        $requestedTab = request()->query('tab');
        if (in_array($requestedTab, ['overview', 'reports', 'security', 'finance', 'mental', 'community', 'settings'])) {
            $this->activeTab = $requestedTab;
        }
    }

    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function updateProfile()
    {
        $this->validate([
            'nickname' => 'nullable|string|max:50',
            'name' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $user->update([
            'name' => $this->name,
            'nickname' => $this->nickname,
        ]);

        session()->flash('status', 'Profil berhasil diperbarui.');
    }

    public function render()
    {
        $reports = Report::where('user_id', Auth::id())
                        ->with(['threatType', 'kabupaten', 'legalPinjol'])
                        ->latest()
                        ->take(10)
                        ->get();

        // In a real app, we would link Report to User via user_id. 
        // For this MVP, we might use email or just show all for demo if needed.
        // Let's assume we'll filter by some identifier if possible.

        return view('livewire.user-dashboard', [
            'reports' => $reports
        ]);
    }
}
