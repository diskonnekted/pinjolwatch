<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class AdminSettings extends Component
{
    #[Layout('components.admin-layout')]

    public $site_name = 'PinjolWatch';
    public $maintenance_mode = false;
    public $registration_enabled = true;
    public $max_file_size = 2048;

    public function save()
    {
        // Placeholder for saving settings
        session()->flash('message', 'Pengaturan sistem berhasil disimpan.');
    }

    public function render()
    {
        return view('livewire.admin-settings');
    }
}
