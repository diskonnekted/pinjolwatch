<?php

namespace App\Livewire;

use Livewire\Component;

class GltlCalculator extends Component
{
    public $loans = [];
    public $existingDebt = 0;

    public function mount()
    {
        $this->addLoan();
    }

    public function addLoan()
    {
        $this->loans[] = [
            'name' => 'Pinjol #' . (count($this->loans) + 1),
            'plafond' => 0,
            'dana_cair' => 0,
            'dana_tutup' => 0,
        ];
    }

    public function removeLoan($index)
    {
        unset($this->loans[$index]);
        $this->loans = array_values($this->loans);
    }

    public function render()
    {
        $totalPlafond = 0;
        $totalDanaCair = 0;
        $totalDanaTutup = 0;

        foreach ($this->loans as $loan) {
            $totalPlafond += (float) ($loan['plafond'] ?? 0);
            $totalDanaCair += (float) ($loan['dana_cair'] ?? 0);
            $totalDanaTutup += (float) ($loan['dana_tutup'] ?? 0);
        }

        $netCash = $totalDanaCair - $totalDanaTutup;
        $finalBalance = $netCash - (float)$this->existingDebt;
        $debtAccumulation = $totalPlafond + (float)$this->existingDebt;

        return view('livewire.gltl-calculator', [
            'totalPlafond' => $totalPlafond,
            'totalDanaCair' => $totalDanaCair,
            'totalDanaTutup' => $totalDanaTutup,
            'netCash' => $netCash,
            'finalBalance' => $finalBalance,
            'debtAccumulation' => $debtAccumulation,
        ]);
    }
}
