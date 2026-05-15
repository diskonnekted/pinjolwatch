<?php

namespace App\Livewire;

use Livewire\Component;

class GltlCalculator extends Component
{
    public int $initialDebt = 1000000;
    public array $cycles = [];
    public float $interestRate = 3.0; // Fixed 3%
    public array $tenorOptions = [7, 14, 21, 30, 60];
    
    public array $dummyPinjols = [
        'EasyCash', 'AdaKami', 'Kredit Pintar', 'Akulaku', 'Kredivo', 
        'Indodana', 'Singa', 'UangMe', 'Rupiah Cepat', 'Julo', 
        'PinjamDuit', 'DanaRupiah', 'KreditBuddy', 'PinjamYuk'
    ];

    public array $amountOptions = [];

    public function mount(): void
    {
        for ($i = 1; $i <= 50; $i++) {
            $this->amountOptions[] = $i * 1000000;
        }
        $this->resetSimulation();
    }

    public function updatedInitialDebt(): void
    {
        $this->calculateAll();
        $this->dispatch('cycles-updated', data: $this->getChartData());
    }

    public function updatedCycles(): void
    {
        $this->calculateAll();
        $this->dispatch('cycles-updated', data: $this->getChartData());
    }

    public function calculateAll(): void
    {
        $rate = $this->interestRate / 100;
        
        foreach ($this->cycles as $i => &$cycle) {
            $need = (float) $cycle['need'];
            $plafond = $need > 0 ? ceil($need / (1 - $rate)) : 0;
            $cycle['plafond'] = $plafond;
            $cycle['interest'] = $plafond - $need;
        }
    }

    public function addCycle(): void
    {
        $rate = $this->interestRate / 100;
        $lastPlafond = end($this->cycles)['plafond'] ?? (float)$this->initialDebt;
        
        // Suggest an amount that covers the previous plafond, rounded up to nearest million
        $suggestedNeed = ceil($lastPlafond / 1000000) * 1000000;
        if ($suggestedNeed < 1000000) $suggestedNeed = 1000000;

        $plafond = ceil($suggestedNeed / (1 - $rate));
        
        $this->cycles[] = [
            'label'    => 'Pinjaman ke-' . (count($this->cycles) + 1),
            'provider' => $this->dummyPinjols[array_rand($this->dummyPinjols)],
            'need'     => $suggestedNeed,
            'plafond'  => $plafond,
            'interest' => $plafond - $suggestedNeed,
            'tenor'    => 14,
        ];
        
        $this->dispatch('cycles-updated', data: $this->getChartData());
    }

    public function removeCycle(): void
    {
        if (count($this->cycles) > 0) {
            array_pop($this->cycles);
            $this->dispatch('cycles-updated', data: $this->getChartData());
        }
    }

    public function updateTenor(int $index, int $tenor): void
    {
        if (isset($this->cycles[$index])) {
            $this->cycles[$index]['tenor'] = $tenor;
        }
    }

    public function resetSimulation(): void
    {
        $this->cycles = [];
        $this->initialDebt = 1000000;
        $this->addCycle();
    }

    public function getChartData(): array
    {
        $labels = ['Awal'];
        $data = [(float)$this->initialDebt];
        
        $cumulativeDebt = (float)$this->initialDebt;
        foreach ($this->cycles as $i => $cycle) {
            $labels[] = 'Ke-' . ($i + 1);
            // In GLTL, the debt isn't necessarily cumulative in the sense of adding them all up,
            // but rather the NEW debt you have to pay.
            // But to show "increase", we should show the total obligation.
            $data[] = (float)$cycle['plafond'];
        }
        
        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Total Hutang (Rp)',
                    'data' => $data,
                    'borderColor' => '#f43f5e',
                    'backgroundColor' => 'rgba(244, 63, 94, 0.1)',
                    'fill' => true,
                    'tension' => 0.4
                ]
            ]
        ];
    }

    public function render()
    {
        $totalCycles = count($this->cycles);
        $initial = (float) $this->initialDebt;
        $finalDebt = $totalCycles > 0 ? (float)$this->cycles[$totalCycles - 1]['plafond'] : $initial;
        $totalInterest = array_sum(array_column($this->cycles, 'interest'));
        $multiplier = $initial > 0 ? round($finalDebt / $initial, 2) : 1;
        
        // Calculate the "gap" or "surplus" after each cycle
        // Cycle 0 covers initialDebt.
        // Cycle 1 covers Cycle 0 plafond, etc.
        $analysis = [];
        $prevPlafond = $initial;
        foreach ($this->cycles as $cycle) {
            $diff = (float)$cycle['need'] - $prevPlafond;
            $status = '';
            if ($diff > 0) {
                $status = 'Ada Sisa Dana';
            } elseif ($diff == 0) {
                $status = 'Pas-pasan (Hanya Tutup Hutang)';
            } else {
                $status = 'Masih Kurang';
            }
            
            $analysis[] = [
                'diff' => $diff,
                'status' => $status
            ];
            $prevPlafond = (float)$cycle['plafond'];
        }

        return view('livewire.gltl-calculator', [
            'totalCycles'    => $totalCycles,
            'initial'        => $initial,
            'finalDebt'      => $finalDebt,
            'totalInterest'  => $totalInterest,
            'multiplier'     => $multiplier,
            'analysis'       => $analysis,
        ]);
    }
}
