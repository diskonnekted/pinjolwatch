@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush

<script>
    function gltlChart() {
        return {
            chart: null,
            initChart(data) {
                // Wait for Chart.js to be available (max 5 seconds)
                let attempts = 0;
                const checkChart = setInterval(() => {
                    attempts++;
                    if (typeof Chart !== 'undefined') {
                        clearInterval(checkChart);
                        this.renderChart(data);
                    } else if (attempts > 50) {
                        clearInterval(checkChart);
                        console.error('Chart.js failed to load after 5 seconds');
                    }
                }, 100);
            },
            renderChart(data) {
                const ctx = document.getElementById('debtChart').getContext('2d');
                if (this.chart) {
                    this.chart.destroy();
                }
                this.chart = new Chart(ctx, {
                    type: 'line',
                    data: data,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: { color: 'rgba(255, 255, 255, 0.05)' },
                                ticks: {
                                    color: '#64748b',
                                    font: { family: 'Inter', weight: 'bold' },
                                    callback: function(value) {
                                        return 'Rp ' + value.toLocaleString('id-ID');
                                    }
                                }
                            },
                            x: {
                                grid: { display: false },
                                ticks: {
                                    color: '#64748b',
                                    font: { family: 'Inter', weight: 'bold' }
                                }
                            }
                        },
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                backgroundColor: '#0f172a',
                                titleFont: { weight: 'bold' },
                                padding: 12,
                                borderColor: '#1e293b',
                                borderWidth: 1,
                                callbacks: {
                                    label: function(context) {
                                        return ' ' + context.dataset.label + ': Rp ' + context.raw.toLocaleString('id-ID');
                                    }
                                }
                            }
                        }
                    }
                });

                window.addEventListener('cycles-updated', event => {
                    if (this.chart) {
                        // Livewire 3 dispatches event detail directly or as an array
                        const newData = Array.isArray(event.detail) ? event.detail[0] : (event.detail.data || event.detail);
                        this.chart.data = newData;
                        this.chart.update();
                    }
                });
            }
        }
    }
</script>

<div class="min-h-screen bg-[#060a14] pb-20" x-data="gltlChart()" x-init="initChart(@js($this->getChartData()))">

    {{-- Hero Section --}}
    <div class="relative overflow-hidden border-b border-slate-900">
        {{-- Background grid --}}
        <div class="absolute inset-0 opacity-[0.03]"
            style="background-image: linear-gradient(#fff 1px, transparent 1px), linear-gradient(90deg, #fff 1px, transparent 1px); background-size: 40px 40px;">
        </div>
        <div class="absolute inset-0 bg-gradient-to-br from-rose-900/20 via-transparent to-transparent"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-8 py-16 md:py-20">
            <div class="max-w-3xl">
                <span class="inline-flex items-center gap-2 text-[10px] font-black uppercase tracking-[0.35em] text-rose-400 mb-6">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-rose-500"></span>
                    </span>
                    Simulasi Visual · Gali Lobang Tutup Lobang
                </span>
                <h1 class="text-5xl md:text-7xl font-black uppercase tracking-tighter text-white leading-[0.9] mb-6">
                    Gali Lobang<br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-rose-500 to-orange-500">Tutup Lobang.</span>
                </h1>
                <p class="text-slate-400 text-base md:text-xl max-w-2xl leading-relaxed">
                    Seringkali kita merasa aman karena "berhasil" membayar hutang lama dengan hutang baru. 
                    Gunakan simulasi ini untuk melihat bagaimana <strong class="text-rose-400">bunga & biaya</strong> 
                    perlahan memakan uang Anda hingga tak tersisa.
                </p>
            </div>
        </div>
    </div>

    {{-- ============================================================ --}}
    {{-- MAIN CONTENT                                                  --}}
    {{-- ============================================================ --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-8 py-8 md:py-12">
        
        {{-- Visual Graph Card --}}
        <div class="mb-12 rounded-3xl border border-slate-800 bg-slate-900/50 p-6 md:p-10">
            <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
                <div>
                    <h2 class="text-2xl font-black text-white uppercase tracking-tight">Grafik Peningkatan Hutang</h2>
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-500 mt-1">Melihat bengkaknya kewajiban Anda</p>
                </div>
                <div class="flex gap-4">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-rose-500"></div>
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Total Hutang (Plafond)</span>
                    </div>
                </div>
            </div>
            
            <div class="relative h-[300px] md:h-[400px]" wire:ignore>
                <canvas id="debtChart"></canvas>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-12 gap-8 items-start">

            {{-- ====================================================== --}}
            {{-- LEFT: CONTROL PANEL                                    --}}
            {{-- ====================================================== --}}
            <div class="xl:col-span-4 space-y-6 xl:sticky xl:top-6">

                {{-- Initial Debt Input --}}
                <div class="rounded-3xl border border-slate-800 bg-slate-900 p-6 md:p-8 shadow-2xl">
                    <p class="text-[9px] font-black uppercase tracking-[0.3em] text-slate-500 mb-6">Langkah 1 — Hutang Awal</p>

                    <label class="block text-[10px] font-black uppercase tracking-widest text-slate-500 mb-3">Berapa hutang Anda saat ini?</label>
                    <div class="flex items-center gap-3">
                        <span class="text-xl font-black text-teal-500 shrink-0 select-none">Rp</span>
                        <input
                            wire:model.live="initialDebt"
                            type="number"
                            class="w-full bg-slate-950 rounded-xl border border-slate-800 px-5 py-4 text-2xl font-black text-white focus:outline-none focus:border-teal-500 transition-colors"
                        >
                    </div>

                    <div class="mt-6 flex items-center justify-between">
                        <span class="text-[10px] font-black uppercase tracking-widest text-slate-600">Estimasi Biaya per Siklus</span>
                        <span class="text-sm font-black text-rose-500">{{ $interestRate }}%</span>
                    </div>
                    <div class="mt-2 h-1.5 bg-slate-800 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-rose-600 to-orange-500 rounded-full" style="width: {{ $interestRate * 10 }}%"></div>
                    </div>
                    <p class="text-[9px] text-slate-600 mt-2 italic">*Rata-rata bunga & biaya admin pinjol legal/ilegal</p>
                </div>

                {{-- Summary Stats --}}
                <div class="rounded-3xl border border-slate-800 bg-slate-900 p-6 md:p-8">
                    <p class="text-[9px] font-black uppercase tracking-[0.3em] text-slate-500 mb-6">Ringkasan Tragis</p>

                    <div class="space-y-4">
                        <div class="flex justify-between items-start">
                            <span class="text-[10px] font-black text-slate-500 uppercase tracking-wider">Hutang Awal</span>
                            <span class="text-sm font-black text-white">Rp {{ number_format($initial, 0, ',', '.') }}</span>
                        </div>
                        <div class="h-px bg-slate-800"></div>
                        <div class="flex justify-between items-start">
                            <span class="text-[10px] font-black text-slate-500 uppercase tracking-wider">Jumlah Aplikasi</span>
                            <span class="text-sm font-black text-white">{{ $totalCycles }} Aplikasi</span>
                        </div>
                        <div class="flex justify-between items-start">
                            <span class="text-[10px] font-black text-slate-500 uppercase tracking-wider">Total Uang Terbuang</span>
                            <span class="text-sm font-black text-rose-400">Rp {{ number_format($totalInterest, 0, ',', '.') }}</span>
                        </div>
                        <div class="h-px bg-slate-800"></div>
                        <div class="flex justify-between items-start">
                            <span class="text-[10px] font-black text-slate-500 uppercase tracking-wider">Hutang Harus Dibayar</span>
                            <span class="text-xl font-black text-white">Rp {{ number_format($finalDebt, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    {{-- Multiplier Badge --}}
                    <div class="mt-6 p-5 rounded-2xl bg-gradient-to-br from-rose-900/40 to-slate-900 border border-rose-800/30 text-center">
                        <div class="text-[9px] font-black uppercase tracking-[0.3em] text-rose-400 mb-2">Hutang Anda Menjadi</div>
                        <div class="text-5xl font-black text-white">{{ $multiplier }}<span class="text-2xl text-rose-500">×</span></div>
                        <div class="text-[9px] text-slate-500 mt-1">Lipat Ganda</div>
                    </div>
                </div>

                <button wire:click="resetSimulation" class="w-full py-4 rounded-2xl text-[10px] font-black uppercase tracking-widest text-slate-600 hover:text-slate-400 transition-colors border border-slate-800 hover:border-slate-700">
                    Reset & Ulangi Simulasi
                </button>
            </div>

            {{-- ====================================================== --}}
            {{-- RIGHT: SPIRAL TIMELINE                                  --}}
            {{-- ====================================================== --}}
            <div class="xl:col-span-8">
                <p class="text-[9px] font-black uppercase tracking-[0.3em] text-slate-500 mb-6">Langkah 2 — Simulasi Gali-Tutup</p>

                <div class="space-y-6">
                    @foreach($cycles as $i => $cycle)
                    <div class="relative group" wire:key="cycle-{{ $i }}-{{ $cycle['label'] }}">
                        {{-- Connection line --}}
                        @if(!$loop->last)
                        <div class="absolute left-10 top-20 bottom-0 w-1 bg-gradient-to-b from-rose-500 to-transparent z-0"></div>
                        @endif

                        <div class="relative z-10 flex gap-6 items-start">
                            {{-- Icon/Number --}}
                            <div class="shrink-0">
                                <div class="w-20 h-20 rounded-2xl border-2 border-rose-500 bg-rose-500/10 flex flex-col items-center justify-center transition-transform group-hover:scale-105">
                                    <span class="text-xs font-black text-rose-500 uppercase">App</span>
                                    <span class="text-3xl font-black text-white leading-none">{{ $i + 1 }}</span>
                                </div>
                            </div>

                            {{-- Card --}}
                            <div class="flex-1 rounded-3xl border border-slate-800 bg-slate-900 p-6 md:p-8 shadow-xl">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                                    {{-- Provider Selector --}}
                                    <div>
                                        <label class="block text-[10px] font-black uppercase tracking-widest text-slate-500 mb-2">Pilih Nama Pinjol</label>
                                        <select wire:model.live="cycles.{{ $i }}.provider"
                                            class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-sm font-black text-white focus:outline-none focus:border-rose-500 transition-colors">
                                            @foreach($dummyPinjols as $name)
                                                <option value="{{ $name }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- Amount Selector --}}
                                    <div>
                                        <label class="block text-[10px] font-black uppercase tracking-widest text-slate-500 mb-2">Pinjam Berapa?</label>
                                        <select wire:model.live="cycles.{{ $i }}.need"
                                            class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-sm font-black text-white focus:outline-none focus:border-rose-500 transition-colors">
                                            @foreach($amountOptions as $amt)
                                                <option value="{{ $amt }}">Rp {{ number_format($amt, 0, ',', '.') }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- Analysis Info --}}
                                <div class="flex items-center gap-4 mb-8 p-4 rounded-2xl {{ $analysis[$i]['diff'] >= 0 ? 'bg-teal-900/20 border border-teal-800/30' : 'bg-rose-900/20 border border-rose-800/30' }}">
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center shrink-0 {{ $analysis[$i]['diff'] >= 0 ? 'bg-teal-500' : 'bg-rose-500' }}">
                                        @if($analysis[$i]['diff'] >= 0)
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="white" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="white" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                            </svg>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-black uppercase tracking-widest {{ $analysis[$i]['diff'] >= 0 ? 'text-teal-400' : 'text-rose-400' }}">
                                            Status: {{ $analysis[$i]['status'] }}
                                        </p>
                                        <p class="text-sm font-bold text-white">
                                            @if($analysis[$i]['diff'] > 0)
                                                Berhasil menutup hutang sebelumnya dengan sisa Rp {{ number_format($analysis[$i]['diff'], 0, ',', '.') }}
                                            @elseif($analysis[$i]['diff'] == 0)
                                                Pas-pasan untuk menutup hutang sebelumnya (Sisa Rp 0)
                                            @else
                                                Kurang Rp {{ number_format(abs($analysis[$i]['diff']), 0, ',', '.') }} untuk menutup hutang sebelumnya.
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                {{-- Details Grid --}}
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                    <div class="p-4 rounded-2xl bg-slate-950/50 border border-slate-800">
                                        <p class="text-[8px] font-black uppercase tracking-widest text-slate-500 mb-1">Diterima Bersih</p>
                                        <p class="text-lg font-black text-white">Rp {{ number_format($cycle['need'], 0, ',', '.') }}</p>
                                    </div>
                                    <div class="p-4 rounded-2xl bg-slate-950/50 border border-slate-800">
                                        <p class="text-[8px] font-black uppercase tracking-widest text-rose-500 mb-1">Bunga + Biaya</p>
                                        <p class="text-lg font-black text-rose-400">Rp {{ number_format($cycle['interest'], 0, ',', '.') }}</p>
                                    </div>
                                    <div class="p-4 rounded-2xl bg-slate-950 border border-white/5 md:col-span-1 col-span-2">
                                        <p class="text-[8px] font-black uppercase tracking-widest text-slate-500 mb-1">Total Hutang Baru</p>
                                        <p class="text-lg font-black text-white">Rp {{ number_format($cycle['plafond'], 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    {{-- Actions --}}
                    <div class="flex flex-col sm:flex-row gap-4 pt-6" wire:key="action-buttons">
                        <button wire:click="addCycle"
                            class="flex-1 py-6 rounded-3xl bg-rose-600 hover:bg-rose-500 text-white text-xs font-black uppercase tracking-[0.2em] transition-all flex items-center justify-center gap-3 shadow-xl shadow-rose-900/20 active:scale-95">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Gali Lobang Lagi (Pinjam Baru)
                        </button>
                        <button wire:click="removeCycle"
                            @if(count($cycles) <= 1) disabled @endif
                            class="px-8 py-6 rounded-3xl border border-slate-800 text-slate-500 hover:text-white hover:border-slate-600 disabled:opacity-30 disabled:cursor-not-allowed transition-all">
                            Hapus Terakhir
                        </button>
                    </div>
                </div>

                {{-- Warning Footer --}}
                <div class="mt-16 rounded-3xl border border-rose-900/30 bg-gradient-to-br from-rose-950/30 to-slate-900 p-8 md:p-12 text-center">
                    <div class="text-4xl mb-6">🛑</div>
                    <h3 class="text-2xl md:text-3xl font-black text-white uppercase tracking-tighter mb-4">
                        Berhenti Sebelum Terlambat.
                    </h3>
                    <p class="text-slate-400 text-base leading-relaxed max-w-xl mx-auto mb-10">
                        Visualisasi di atas menunjukkan bagaimana hutang Anda membengkak hanya untuk "menutup" hutang lama. 
                        Ini adalah <strong class="text-rose-400">jebakan matematis</strong> yang tidak akan pernah selesai jika tidak dihentikan sekarang.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('report') }}"
                            class="inline-flex items-center justify-center gap-3 px-10 py-5 rounded-2xl bg-white text-slate-950 font-black text-xs uppercase tracking-widest hover:bg-rose-50 transition-all shadow-2xl">
                            Saya Butuh Bantuan Sekarang
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@if(false)
    {{-- This is a placeholder to help the tool find the end of the file --}}
@endif
