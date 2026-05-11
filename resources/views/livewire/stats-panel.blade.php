<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    {{-- Summary Cards --}}
    <div class="bg-slate-900 p-6 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.3)] border border-slate-800">
        <p class="text-sm font-medium text-slate-400 uppercase">Total Laporan</p>
        <p class="text-3xl font-bold text-slate-100 mt-2">{{ number_format($total) }}</p>
        <p class="text-xs text-primary-400 mt-1">Laporan masuk dari masyarakat</p>
    </div>
    <div class="bg-slate-900 p-6 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.3)] border border-slate-800">
        <p class="text-sm font-medium text-slate-400 uppercase">Terverifikasi</p>
        <p class="text-3xl font-bold text-blue-400 mt-2">{{ number_format($verified) }}</p>
        <p class="text-xs text-blue-400 mt-1">Data valid untuk pemetaan</p>
    </div>
    <div class="bg-slate-900 p-6 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.3)] border border-slate-800">
        <p class="text-sm font-medium text-slate-400 uppercase">Selesai</p>
        <p class="text-3xl font-bold text-green-400 mt-2">{{ number_format($resolved) }}</p>
        <p class="text-xs text-green-400 mt-1">Kasus telah ditindaklanjuti</p>
    </div>

    {{-- Threat Type Distribution --}}
    <div class="md:col-span-2 bg-slate-900 p-6 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.3)] border border-slate-800">
        <h4 class="text-lg font-bold text-slate-100 mb-6">Distribusi Jenis Ancaman</h4>
        <div class="space-y-4">
            @foreach($threatStats as $stat)
                @php $percent = $total > 0 ? ($stat->total / $total) * 100 : 0; @endphp
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="font-medium text-slate-300">{{ $stat->label }}</span>
                        <span class="text-slate-400">{{ $stat->total }} laporan ({{ round($percent, 1) }}%)</span>
                    </div>
                    <div class="w-full bg-slate-800 rounded-full h-2">
                        <div class="bg-primary-500 h-2 rounded-full" style="width: {{ $percent }}%"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Monthly Trend --}}
    <div class="bg-slate-900 p-6 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.3)] border border-slate-800">
        <h4 class="text-lg font-bold text-slate-100 mb-6">Tren Laporan Bulanan</h4>
        <div class="space-y-4">
            @foreach($monthlyStats as $stat)
                <div class="flex items-center justify-between">
                    <span class="text-sm text-slate-400">{{ $stat->month }}</span>
                    <span class="text-sm font-bold text-slate-100">{{ $stat->total }}</span>
                </div>
                <div class="w-full bg-slate-800/50 h-1 rounded-full overflow-hidden">
                    <div class="bg-slate-600 h-full" style="width: {{ ($stat->total / ($monthlyStats->max('total') ?: 1)) * 100 }}%"></div>
                </div>
            @endforeach
        </div>
    </div>
</div>
