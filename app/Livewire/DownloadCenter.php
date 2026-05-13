<?php

namespace App\Livewire;

use Livewire\Component;

class DownloadCenter extends Component
{
    public $materials = [
        [
            'id' => 'infographic-family',
            'title' => 'Infografis: Dampak Psikologis Keluarga',
            'description' => 'Visualisasi data dampak 188 juta jiwa yang terdampak pinjol di Indonesia.',
            'category' => 'Infografis',
            'type' => 'PDF / JPG',
            'icon' => '📊',
            'color' => 'teal'
        ],
        [
            'id' => 'advocacy-template',
            'title' => 'Template Advokasi OJK & DPR',
            'description' => 'Draft surat resmi dan lampiran data agregat untuk mendesak perubahan regulasi.',
            'category' => 'Advokasi',
            'type' => 'DOCX / PDF',
            'icon' => '🏛️',
            'color' => 'indigo'
        ],
        [
            'id' => 'education-module',
            'title' => 'Modul Edukasi Komunitas',
            'description' => 'Panduan lengkap literasi keuangan berbasis fakta untuk workshop RT/RW.',
            'category' => 'Edukasi',
            'type' => 'PPTX / PDF',
            'icon' => '📚',
            'color' => 'amber'
        ],
        [
            'id' => 'security-handbook',
            'title' => 'Buku Saku Keamanan Digital',
            'description' => 'Langkah praktis melindungi data pribadi dari teror aplikasi ilegal.',
            'category' => 'Keamanan',
            'type' => 'PDF',
            'icon' => '🛡️',
            'color' => 'rose'
        ]
    ];

    public function download($id)
    {
        // For now, we simulate a download or show a message
        session()->flash('message', 'Materi sedang disiapkan untuk pengunduhan otomatis...');
    }

    public function render()
    {
        return view('livewire.download-center');
    }
}
