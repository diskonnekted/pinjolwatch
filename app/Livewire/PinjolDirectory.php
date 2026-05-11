<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LegalPinjol;

class PinjolDirectory extends Component
{
    public $pinjolId;
    public $selectedPinjol;

    public function updatedPinjolId($value)
    {
        if ($value) {
            $this->selectedPinjol = LegalPinjol::find($value);
        } else {
            $this->selectedPinjol = null;
        }
    }

    public function render()
    {
        $pinjols = LegalPinjol::orderBy('app_name')->get();
        return view('livewire.pinjol-directory', compact('pinjols'));
    }
}
