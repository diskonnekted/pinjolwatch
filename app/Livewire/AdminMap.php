<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Report;
use Illuminate\Support\Facades\DB;

class AdminMap extends Component
{
    #[Layout('components.admin-layout')]

    public $activeDataSource = 'internal';

    public function switchDataSource($source)
    {
        $this->activeDataSource = $source;
    }

    public function render()
    {
        // Fetch report counts by region (kabupaten)
        $internalStats = DB::table('reports')
            ->join('kabupaten', 'reports.kabupaten_id', '=', 'kabupaten.id')
            ->select('kabupaten.nama', 'kabupaten.latitude', 'kabupaten.longitude', 'kabupaten.provinsi', DB::raw('count(*) as total'))
            ->whereNotNull('kabupaten.latitude')
            ->groupBy('kabupaten.nama', 'kabupaten.latitude', 'kabupaten.longitude', 'kabupaten.provinsi')
            ->orderByDesc('total')
            ->take(19)
            ->get();

        // National OJK Stats (Approximated 2024 Data)
        $nationalStats = [
            ['nama' => 'DKI Jakarta', 'total' => 11.58, 'latitude' => -6.2088, 'longitude' => 106.8456, 'provinsi' => 'DKI Jakarta', 'unit' => 'Triliun'],
            ['nama' => 'Jawa Barat', 'total' => 16.55, 'latitude' => -6.9175, 'longitude' => 107.6191, 'provinsi' => 'Jawa Barat', 'unit' => 'Triliun'],
            ['nama' => 'Jawa Tengah', 'total' => 4.88, 'latitude' => -7.0051, 'longitude' => 110.4381, 'provinsi' => 'Jawa Tengah', 'unit' => 'Jawa Tengah', 'unit' => 'Triliun'],
            ['nama' => 'Jawa Timur', 'total' => 7.12, 'latitude' => -7.2575, 'longitude' => 112.7521, 'provinsi' => 'Jawa Timur', 'unit' => 'Triliun'],
            ['nama' => 'Banten', 'total' => 5.05, 'latitude' => -6.1104, 'longitude' => 106.1608, 'provinsi' => 'Banten', 'unit' => 'Triliun'],
            ['nama' => 'Sumatera Utara', 'total' => 1.78, 'latitude' => 3.5952, 'longitude' => 98.6722, 'provinsi' => 'Sumatera Utara', 'unit' => 'Triliun'],
            ['nama' => 'Sulawesi Selatan', 'total' => 1.35, 'latitude' => -5.1476, 'longitude' => 119.4327, 'provinsi' => 'Sulawesi Selatan', 'unit' => 'Triliun'],
            ['nama' => 'Sumatera Selatan', 'total' => 1.12, 'latitude' => -2.9761, 'longitude' => 104.7754, 'provinsi' => 'Sumatera Selatan', 'unit' => 'Triliun'],
            ['nama' => 'Bali', 'total' => 0.85, 'latitude' => -8.4095, 'longitude' => 115.1889, 'provinsi' => 'Bali', 'unit' => 'Triliun'],
            ['nama' => 'Riau', 'total' => 1.05, 'latitude' => 0.5071, 'longitude' => 101.4478, 'provinsi' => 'Riau', 'unit' => 'Triliun'],
        ];

        return view('livewire.admin-map', [
            'regionalStats' => $this->activeDataSource === 'internal' ? $internalStats : collect($nationalStats)
        ]);
    }
}
