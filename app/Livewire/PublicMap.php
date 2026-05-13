<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Report;
use Illuminate\Support\Facades\DB;

class PublicMap extends Component
{
    public $activeDataSource = 'internal';
    public $regionalStats = [];

    public function switchDataSource($source)
    {
        $this->activeDataSource = $source;
    }

    public function render()
    {
        // Fetch report counts by Province
        if ($this->activeDataSource === 'internal') {
            $this->regionalStats = DB::table('reports')
                ->join('kabupaten', 'reports.kabupaten_id', '=', 'kabupaten.id')
                ->select('kabupaten.provinsi as nama', DB::raw('count(*) as total'))
                ->groupBy('kabupaten.provinsi')
                ->orderByDesc('total')
                ->get()
                ->map(function($item) {
                    return [
                        'nama' => $item->nama,
                        'total' => $item->total,
                        'provinsi' => $item->nama
                    ];
                })
                ->toArray();
        } else {
            // National OJK Stats
            $this->regionalStats = [
                ['nama' => 'DKI JAKARTA', 'total' => 11.58, 'provinsi' => 'DKI JAKARTA'],
                ['nama' => 'JAWA BARAT', 'total' => 16.55, 'provinsi' => 'JAWA BARAT'],
                ['nama' => 'JAWA TENGAH', 'total' => 4.88, 'provinsi' => 'JAWA TENGAH'],
                ['nama' => 'JAWA TIMUR', 'total' => 7.12, 'provinsi' => 'JAWA TIMUR'],
                ['nama' => 'BANTEN', 'total' => 5.05, 'provinsi' => 'BANTEN'],
                ['nama' => 'SUMATERA UTARA', 'total' => 1.78, 'provinsi' => 'SUMATERA UTARA'],
                ['nama' => 'SULAWESI SELATAN', 'total' => 1.35, 'provinsi' => 'SULAWESI SELATAN'],
                ['nama' => 'SUMATERA SELATAN', 'total' => 1.12, 'provinsi' => 'SUMATERA SELATAN'],
                ['nama' => 'BALI', 'total' => 0.85, 'provinsi' => 'BALI'],
                ['nama' => 'RIAU', 'total' => 1.05, 'provinsi' => 'RIAU'],
            ];
        }

        return view('livewire.public-map');
    }
}
