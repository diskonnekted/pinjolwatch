<div class="py-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-slate-50 min-h-screen font-sans">
    {{-- TOP HEADER SECTION --}}
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10 animate-in fade-in slide-in-from-top-4 duration-700">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary-50 text-primary-700 text-[10px] font-black tracking-widest uppercase mb-3 border border-primary-100">
                <span class="w-2 h-2 rounded-full bg-primary-500 animate-pulse"></span>
                System Analytics
            </div>
            <h1 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tighter uppercase">
                Dashboard <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-cyan-600">Overview</span>
            </h1>
            <p class="text-slate-500 font-bold text-sm mt-1">Pantau performa dan statistik operasional harian PinjolWatch.</p>
        </div>

        <div class="flex items-center gap-4">
             <div class="hidden lg:flex flex-col items-end mr-4">
                <div id="digitalClock" class="text-2xl font-black text-slate-900 tracking-tighter tabular-nums leading-none">00:00:00</div>
                <div class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">{{ now()->format('l, d F Y') }}</div>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('admin.cms.create') }}" class="p-4 bg-primary-600 hover:bg-primary-500 text-white rounded-2xl transition-all hover:-translate-y-1 shadow-[0_10px_20px_rgba(13,148,136,0.2)] group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 group-hover:rotate-90 transition-transform">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    {{-- BENTO GRID STATS --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        {{-- Stat: Today --}}
        <div class="bg-white rounded-[2rem] p-8 shadow-xl shadow-slate-200/50 border border-slate-100 relative overflow-hidden group hover:bg-primary-50/50 transition-all duration-500">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-12 h-12 rounded-2xl bg-primary-50 border border-primary-100 flex items-center justify-center text-primary-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                </div>
                <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Laporan<br>Hari Ini</div>
            </div>
            <div class="text-5xl font-black text-slate-900 tracking-tighter">{{ number_format($stats['total_today']) }}</div>
        </div>

        {{-- Stat: Total Reports --}}
        <div class="bg-white rounded-[2rem] p-8 shadow-xl shadow-slate-200/50 border border-slate-100 relative overflow-hidden group hover:bg-cyan-50/50 transition-all duration-500">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-12 h-12 rounded-2xl bg-cyan-50 border border-cyan-100 flex items-center justify-center text-cyan-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" /></svg>
                </div>
                <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Total<br>Laporan</div>
            </div>
            <div class="text-5xl font-black text-slate-900 tracking-tighter">{{ number_format($stats['total_reports']) }}</div>
        </div>

        {{-- Stat: Articles --}}
        <div class="bg-white rounded-[2rem] p-8 shadow-xl shadow-slate-200/50 border border-slate-100 relative overflow-hidden group hover:bg-emerald-50/50 transition-all duration-500">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-12 h-12 rounded-2xl bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" /></svg>
                </div>
                <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Konten<br>Edukasi</div>
            </div>
            <div class="text-5xl font-black text-slate-900 tracking-tighter">{{ number_format($stats['total_articles']) }}</div>
        </div>

        {{-- Stat: Victims --}}
        <div class="bg-white rounded-[2rem] p-8 shadow-xl shadow-slate-200/50 border border-slate-100 relative overflow-hidden group hover:bg-rose-50/50 transition-all duration-500">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-12 h-12 rounded-2xl bg-rose-50 border border-rose-100 flex items-center justify-center text-rose-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a5.97 5.97 0 0 0-.94 3.197M12 10.5a3 3 0 1 1 0-6 3 3 0 0 1 0 6Zm-7 4.5a3 3 0 1 1 0-6 3 3 0 0 1 0 6Zm14 0a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" /></svg>
                </div>
                <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest">User<br>Penyintas</div>
            </div>
            <div class="text-5xl font-black text-slate-900 tracking-tighter">{{ number_format($stats['total_victims']) }}</div>
        </div>
    </div>

    {{-- MAIN GRID: CHARTS --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        {{-- Chart 1: Reports --}}
        <div class="bg-white rounded-[2.5rem] p-10 shadow-xl shadow-slate-200/50 border border-slate-100 relative group">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h3 class="text-lg font-black text-slate-900 uppercase tracking-tighter">Grafik Tren Laporan</h3>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">Laporan harian (Real + Dummy)</p>
                </div>
                <div class="px-3 py-1 bg-teal-50 text-teal-600 text-[10px] font-black rounded-lg border border-teal-100">REPORTS</div>
            </div>
            <div class="relative h-[250px] w-full">
                <canvas id="reportsChart"></canvas>
            </div>
        </div>

        {{-- Chart 2: Visitors --}}
        <div class="bg-white rounded-[2.5rem] p-10 shadow-xl shadow-slate-200/50 border border-slate-100 relative group">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h3 class="text-lg font-black text-slate-900 uppercase tracking-tighter">Pengakses Website</h3>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">Traffic harian (Estimasi)</p>
                </div>
                <div class="px-3 py-1 bg-blue-50 text-blue-600 text-[10px] font-black rounded-lg border border-blue-100">VISITORS</div>
            </div>
            <div class="relative h-[250px] w-full">
                <canvas id="visitorsChart"></canvas>
            </div>
        </div>
    </div>

    {{-- SECONDARY GRID: STATUS & LOGS --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Distribution --}}
        <div class="bg-white rounded-[2rem] p-8 shadow-xl shadow-slate-200/50 border border-slate-100">
            <h3 class="text-xs font-black text-slate-900 uppercase tracking-widest mb-6">Status Moderasi</h3>
            <div class="space-y-5">
                <div>
                    <div class="flex justify-between text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">
                        <span>Menunggu Verifikasi</span>
                        <span class="text-slate-900">{{ $stats['pending_verification'] }}</span>
                    </div>
                    <div class="h-1.5 w-full bg-slate-100 rounded-full overflow-hidden">
                        @php $p_perc = $stats['total_reports'] > 0 ? ($stats['pending_verification'] / $stats['total_reports']) * 100 : 0; @endphp
                        <div class="h-full bg-amber-400 rounded-full" style="width: {{ $p_perc }}%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">
                        <span>Sedang Investigasi</span>
                        <span class="text-slate-900">{{ $stats['investigating'] }}</span>
                    </div>
                    <div class="h-1.5 w-full bg-slate-100 rounded-full overflow-hidden">
                        @php $i_perc = $stats['total_reports'] > 0 ? ($stats['investigating'] / $stats['total_reports']) * 100 : 0; @endphp
                        <div class="h-full bg-blue-500 rounded-full" style="width: {{ $i_perc }}%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">
                        <span>Artikel Menunggu</span>
                        <span class="text-slate-900">{{ $stats['pending_articles'] }}</span>
                    </div>
                    <div class="h-1.5 w-full bg-slate-100 rounded-full overflow-hidden">
                        @php $pa_perc = $stats['total_articles'] > 0 ? ($stats['pending_articles'] / $stats['total_articles']) * 100 : 0; @endphp
                        <div class="h-full bg-indigo-500 rounded-full" style="width: {{ $pa_perc }}%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">
                        <span>Berhasil Diselesaikan</span>
                        <span class="text-slate-900">{{ $stats['resolved'] }}</span>
                    </div>
                    <div class="h-1.5 w-full bg-slate-100 rounded-full overflow-hidden">
                        @php $r_perc = $stats['total_reports'] > 0 ? ($stats['resolved'] / $stats['total_reports']) * 100 : 0; @endphp
                        <div class="h-full bg-emerald-500 rounded-full" style="width: {{ $r_perc }}%"></div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Audit Logs --}}
        <div class="lg:col-span-2 bg-white rounded-[2rem] p-8 shadow-xl shadow-slate-200/50 border border-slate-100 flex flex-col min-h-[300px]">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xs font-black text-slate-900 uppercase tracking-widest">Log Aktivitas Terbaru</h3>
                <a href="{{ route('admin.audit-log') }}" class="text-[10px] font-black text-primary-600 hover:text-primary-700 uppercase tracking-widest">Lihat Semua</a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 flex-1">
                @forelse($recentLogs as $log)
                    <div class="flex gap-3 items-center p-3 rounded-2xl hover:bg-slate-50 transition-all group border border-transparent hover:border-slate-100">
                        <div class="w-9 h-9 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center font-black text-[10px] text-slate-500 shrink-0 group-hover:bg-primary-50 group-hover:text-primary-600 transition-all overflow-hidden border border-slate-200">
                            @if($log->user && $log->user->avatar_url)
                                <img src="{{ $log->user->avatar_url }}" alt="{{ $log->user->name }}" class="w-full h-full object-cover">
                            @else
                                {{ substr($log->user->name ?? '?', 0, 1) }}
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs text-slate-900 font-bold truncate">
                                {{ $log->user->name ?? 'System' }}
                            </p>
                            <p class="text-[9px] font-bold text-slate-500 uppercase tracking-tighter truncate">
                                {{ $log->route_name }}
                            </p>
                        </div>
                        <div class="text-[9px] font-bold text-slate-400 uppercase">{{ $log->created_at->diffForHumans(null, true) }}</div>
                    </div>
                @empty
                    <div class="col-span-2 flex flex-col items-center justify-center opacity-30">
                        <p class="text-[10px] font-black uppercase tracking-widest">No activity</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            function updateClock() {
                const clock = document.getElementById('digitalClock');
                if(clock) clock.innerText = new Date().toLocaleTimeString('en-GB', { hour12: false });
            }
            setInterval(updateClock, 1000);
            updateClock();

            document.addEventListener('livewire:initialized', () => {
                // Common options
                const commonOptions = {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#1e293b',
                            titleFont: { size: 12, weight: 'bold' },
                            bodyFont: { size: 12, weight: 'bold' },
                            padding: 12,
                            cornerRadius: 12,
                            displayColors: false,
                        }
                    },
                    scales: {
                        y: {
                            grid: { color: '#f1f5f9', drawTicks: false },
                            border: { display: false },
                            ticks: { color: '#94a3b8', font: { size: 10, weight: 'bold' }, padding: 10 }
                        },
                        x: {
                            grid: { display: false },
                            border: { display: false },
                            ticks: { color: '#64748b', font: { size: 10, weight: 'bold' }, padding: 10 }
                        }
                    },
                    interaction: { intersect: false, mode: 'index' }
                };

                // Chart 1: Reports
                const ctx1 = document.getElementById('reportsChart').getContext('2d');
                const g1 = ctx1.createLinearGradient(0, 0, 0, 250);
                g1.addColorStop(0, 'rgba(13, 148, 136, 0.1)');
                g1.addColorStop(1, 'rgba(13, 148, 136, 0)');

                new Chart(ctx1, {
                    type: 'line',
                    data: {
                        labels: {!! json_encode($chartLabels) !!},
                        datasets: [{
                            label: 'Laporan',
                            data: {!! json_encode($reportsData) !!},
                            borderColor: '#0d9488',
                            backgroundColor: g1,
                            borderWidth: 3,
                            pointBackgroundColor: '#fff',
                            pointBorderColor: '#0d9488',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            fill: true,
                            tension: 0.4,
                        }]
                    },
                    options: commonOptions
                });

                // Chart 2: Visitors
                const ctx2 = document.getElementById('visitorsChart').getContext('2d');
                const g2 = ctx2.createLinearGradient(0, 0, 0, 250);
                g2.addColorStop(0, 'rgba(37, 99, 235, 0.1)');
                g2.addColorStop(1, 'rgba(37, 99, 235, 0)');

                new Chart(ctx2, {
                    type: 'bar',
                    data: {
                        labels: {!! json_encode($chartLabels) !!},
                        datasets: [{
                            label: 'Pengakses',
                            data: {!! json_encode($visitorsData) !!},
                            backgroundColor: '#3b82f6',
                            borderRadius: 6,
                            borderSkipped: false,
                        }]
                    },
                    options: {
                        ...commonOptions,
                        scales: {
                            ...commonOptions.scales,
                            y: { ...commonOptions.scales.y, stepSize: 100 }
                        }
                    }
                });
            });
        </script>
    @endpush
</div>
