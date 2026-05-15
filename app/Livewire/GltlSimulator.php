<?php

namespace App\Livewire;

use Livewire\Component;

class GltlSimulator extends Component
{
    public $initialDebt = 1000000;
    public $cycles = [];
    public $interestRate = 3.0;
    
    public $dummyPinjols = [
        'EasyCash', 'AdaKami', 'Kredit Pintar', 'Akulaku', 'Kredivo', 
        'Indodana', 'Singa', 'UangMe', 'Rupiah Cepat', 'Julo'
    ];

    public $amountOptions = [];

    public function mount()
    {
        for ($i = 1; $i <= 30; $i++) {
            $this->amountOptions[] = $i * 1000000;
        }
        $this->resetSim();
    }

    public function resetSim()
    {
        $this->cycles = [];
        $this->addCycle();
    }

    public function addCycle()
    {
        $lastPlafond = count($this->cycles) > 0 ? end($this->cycles)['plafond'] : (float)$this->initialDebt;
        
        // Suggest amount to cover last debt
        $suggested = ceil($lastPlafond / 1000000) * 1000000;
        if ($suggested < 1000000) $suggested = 1000000;

        $rate = $this->interestRate / 100;
        $plafond = ceil($suggested / (1 - $rate));

        $this->cycles[] = [
            'id' => uniqid(),
            'provider' => $this->dummyPinjols[array_rand($this->dummyPinjols)],
            'need' => (int)$suggested,
            'plafond' => (int)$plafond,
            'interest' => (int)($plafond - $suggested)
        ];

        $this->updateChart();
    }

    public function removeLast()
    {
        if (count($this->cycles) > 1) {
            array_pop($this->cycles);
            $this->updateChart();
        }
    }

    public function updated($property)
    {
        if ($property === 'initialDebt' || str_contains($property, 'cycles')) {
            $this->recalculate();
            $this->updateChart();
        }
    }

    public function recalculate()
    {
        $rate = $this->interestRate / 100;
        foreach ($this->cycles as $i => &$cycle) {
            $cycle['plafond'] = ceil($cycle['need'] / (1 - $rate));
            $cycle['interest'] = $cycle['plafond'] - $cycle['need'];
        }
    }

    public function updateChart()
    {
        $labels = ['Awal'];
        $data = [(float)$this->initialDebt];
        
        foreach ($this->cycles as $i => $cycle) {
            $labels[] = 'Pinjol ' . ($i + 1);
            $data[] = (float)$cycle['plafond'];
        }

        $this->dispatch('update-chart', [
            'labels' => $labels,
            'data' => $data
        ]);
    }

    public function render()
    {
        $initial = (float)$this->initialDebt;
        $final = count($this->cycles) > 0 ? end($this->cycles)['plafond'] : $initial;
        
        $analysis = [];
        $prev = $initial;
        foreach ($this->cycles as $c) {
            $diff = $c['need'] - $prev;
            $analysis[] = [
                'diff' => $diff,
                'status' => $diff > 0 ? 'Sisa' : ($diff == 0 ? 'Pas' : 'Kurang')
            ];
            $prev = $c['plafond'];
        }

        return view('livewire.gltl-simulator', [
            'initial' => $initial,
            'final' => $final,
            'multiplier' => $initial > 0 ? round($final / $initial, 2) : 1,
            'totalInterest' => array_sum(array_column($this->cycles, 'interest')),
            'analysis' => $analysis
        ]);
    }
}
