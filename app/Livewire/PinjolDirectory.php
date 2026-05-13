<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LegalPinjol;

class PinjolDirectory extends Component
{
    public $pinjolId;
    public $selectedPinjol;
    public $isScanning = false;
    public $lastScanned = null;

    public function updatedPinjolId($value)
    {
        if ($value) {
            $this->selectedPinjol = LegalPinjol::find($value);
            $this->lastScanned = null; // Reset on change
        } else {
            $this->selectedPinjol = null;
        }
    }

    public function scanNews()
    {
        if (!$this->pinjolId) return;
        
        $this->isScanning = true;
        
        // Simulate background scanning process
        sleep(2); 
        
        // Re-fetch from DB to get latest data
        $this->selectedPinjol = LegalPinjol::find($this->pinjolId);
        $this->lastScanned = now()->format('H:i:s');
        $this->isScanning = false;
    }

    public function render()
    {
        $pinjols = LegalPinjol::orderBy('app_name')->get();
        return view('livewire.pinjol-directory', compact('pinjols'));
    }
}
