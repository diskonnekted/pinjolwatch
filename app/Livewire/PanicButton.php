<?php

namespace App\Livewire;

use Livewire\Component;

class PanicButton extends Component
{
    public function panic()
    {
        // Clear session and logout if authenticated
        if (auth()->check()) {
            auth()->logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
        }

        // Trigger JS to clear storage
        $this->dispatch('panic-triggered');

        // Redirect to a neutral site
        return redirect()->away('https://www.google.com/search?q=cuaca+hari+ini');
    }

    public function render()
    {
        return view('livewire.panic-button');
    }
}
