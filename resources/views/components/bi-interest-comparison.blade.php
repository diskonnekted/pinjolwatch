@php
    $biService = app(\App\Services\BiDataService::class);
    $biData = $biService->getSukuBunga();
    
    // Fallback if API fails
    $currentBiRate = '6.25';
    
    if ($biData && isset($biData['data']) && is_array($biData['data'])) {
        foreach ($biData['data'] as $rate) {
            // Usually we look for BI 7-Day Reverse Repo Rate
            if (isset($rate['value'])) {
                $currentBiRate = number_format((float)$rate['value'], 2);
                break;
            }
        }
    }
@endphp

<div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 relative overflow-hidden my-8">
    <div class="absolute top-0 right-0 w-32 h-32 bg-amber-900/10 rounded-full blur-3xl"></div>
    <h3 class="text-xl font-bold mb-6 text-slate-100 flex items-center gap-2">
        <span class="w-8 h-8 rounded-lg bg-amber-900/50 text-amber-400 flex items-center justify-center text-sm border border-amber-800">⚖️</span>
        Perbandingan Bunga: Resmi vs Ilegal
    </h3>
    
    <div class="overflow-x-auto mb-6">
        <table class="w-full text-sm text-left border-collapse">
            <thead>
                <tr class="border-b border-slate-700">
                    <th class="py-3 px-4 text-slate-400 font-medium">Kategori</th>
                    <th class="py-3 px-4 text-slate-400 font-medium">Suku Bunga (Per Tahun)</th>
                    <th class="py-3 px-4 text-slate-400 font-medium">Status & Pengawasan</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-slate-800">
                    <td class="py-4 px-4 text-slate-200 font-medium">
                        <div class="flex items-center gap-2">
                            <span class="text-emerald-400">🏦</span> Bank Umum / Resmi
                        </div>
                        <span class="text-xs text-slate-500 mt-1 block">Suku Bunga Acuan (BI Rate)</span>
                    </td>
                    <td class="py-4 px-4">
                        <span class="text-emerald-400 font-bold text-lg">{{ $currentBiRate }}%</span>
                    </td>
                    <td class="py-4 px-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-emerald-900/30 text-emerald-400 text-xs font-semibold border border-emerald-800/50">
                            Aman & Diawasi
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="py-4 px-4 text-slate-200 font-medium">
                        <div class="flex items-center gap-2">
                            <span class="text-red-400">🔴</span> Pinjol Ilegal
                        </div>
                        <span class="text-xs text-slate-500 mt-1 block">Praktik di lapangan (0.8% - 3%/hari)</span>
                    </td>
                    <td class="py-4 px-4">
                        <span class="text-red-400 font-bold text-lg">292% - 1.095%</span>
                    </td>
                    <td class="py-4 px-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-red-900/30 text-red-400 text-xs font-semibold border border-red-800/50">
                            Berbahaya & Eksploitatif
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="bg-amber-900/20 border border-amber-800/50 p-5 rounded-2xl">
        <p class="font-bold text-amber-400 flex items-center gap-2 mb-2">
            💡 Fakta Literasi Keuangan
        </p>
        <p class="text-sm text-slate-300 leading-relaxed">
            Suku bunga Bank Indonesia saat ini berada di kisaran <strong>{{ $currentBiRate }}% per tahun</strong>. Sementara pinjol ilegal sering membebankan denda keterlambatan hingga <strong>0.8% per hari</strong>. Dalam setahun (tanpa bunga majemuk), itu setara dengan minimum <strong>292% per tahun</strong>. Ini bukan solusi finansial, melainkan jebakan utang ekstrem.
        </p>
    </div>
    
    <p class="text-xs text-slate-500 mt-4 text-right">
        Data Suku Bunga Resmi ditarik dari <a href="https://api.bi.go.id/v1/suku_bunga" target="_blank" class="text-slate-400 hover:text-slate-300 underline transition-colors">Open API Bank Indonesia</a>.
    </p>
</div>
