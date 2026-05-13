<div class="relative min-h-screen bg-[#020617] text-slate-100 font-inter overflow-hidden pb-12">
    {{-- Decorative Background Elements --}}
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-teal-500/10 rounded-full blur-[120px] animate-pulse"></div>
        <div class="absolute top-1/2 -right-24 w-80 h-80 bg-indigo-500/10 rounded-full blur-[100px] animate-bounce-slow"></div>
        <div class="absolute bottom-0 left-1/4 w-64 h-64 bg-cyan-500/10 rounded-full blur-[80px]"></div>
    </div>

    <div class="relative z-10 p-8 lg:p-12">
        {{-- TOP HEADER SECTION --}}
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-12 animate-in fade-in slide-in-from-top-4 duration-700">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <span class="px-3 py-1 bg-teal-500/10 text-teal-400 text-[10px] font-black uppercase tracking-[0.2em] rounded-full border border-teal-500/20">
                        System Analytics v2.4
                    </span>
                </div>
                <h1 class="text-4xl md:text-5xl font-black text-white uppercase italic tracking-tighter leading-none">
                    Dashboard <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-indigo-500">Overview</span>
                </h1>
                <p class="text-slate-400 font-medium text-sm mt-4">Pantau performa dan statistik operasional harian PinjolWatch dalam waktu nyata.</p>
            </div>

            <div class="flex items-center gap-6">
                <div class="hidden lg:flex flex-col items-end">
                    <div id="digitalClock" class="text-3xl font-black text-white tracking-tighter tabular-nums leading-none italic">00:00:00</div>
                    <div class="text-[10px] text-teal-500 font-black uppercase tracking-widest mt-2 flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-teal-500 animate-pulse"></span>
                        {{ now()->format('l, d F Y') }}
                    </div>
                </div>
                <div class="w-px h-12 bg-white/10 hidden lg:block"></div>
                <a href="{{ route('admin.cms.create') }}" class="flex items-center gap-3 px-6 py-4 bg-gradient-to-br from-teal-500 to-indigo-600 hover:from-teal-400 hover:to-indigo-500 text-white rounded-2xl transition-all hover:-translate-y-1 shadow-lg shadow-teal-500/20 group font-black text-xs uppercase tracking-widest">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4 group-hover:rotate-90 transition-transform">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Buat Konten
                </a>
            </div>
        </div>

        {{-- BENTO GRID STATS --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            {{-- Stat Cards --}}
            @php
                $statItems = [
                    ['key' => 'total_today', 'label' => 'Laporan Hari Ini', 'icon' => 'clock', 'color' => 'teal', 'val' => $stats['total_today']],
                    ['key' => 'total_reports', 'label' => 'Total Laporan', 'icon' => 'file', 'color' => 'indigo', 'val' => $stats['total_reports']],
                    ['key' => 'total_articles', 'label' => 'Konten Edukasi', 'icon' => 'book', 'color' => 'rose', 'val' => $stats['total_articles']],
                    ['key' => 'total_victims', 'label' => 'User Penyintas', 'icon' => 'users', 'color' => 'amber', 'val' => $stats['total_victims']],
                ];
            @endphp

            @foreach($statItems as $item)
                <div class="relative group">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-{{ $item['color'] }}-500 to-indigo-500 rounded-3xl blur opacity-0 group-hover:opacity-20 transition duration-500"></div>
                    <div class="relative glass p-8 rounded-3xl border-white/5 transition-all duration-500 group-hover:bg-slate-900/40">
                        <div class="flex items-center justify-between mb-6">
                            <div class="w-12 h-12 rounded-2xl bg-{{ $item['color'] }}-500/10 border border-{{ $item['color'] }}-500/20 flex items-center justify-center text-{{ $item['color'] }}-400">
                                @if($item['icon'] == 'clock') <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> @endif
                                @if($item['icon'] == 'file') <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg> @endif
                                @if($item['icon'] == 'book') <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.754 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg> @endif
                                @if($item['icon'] == 'users') <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg> @endif
                            </div>
                            <div class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">{{ $item['label'] }}</div>
                        </div>
                        <div class="text-5xl font-black text-white tracking-tighter italic">{{ number_format($item['val']) }}</div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- MAIN GRID: CHARTS --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
            {{-- Chart Containers --}}
            @foreach(['reportsChart' => ['label' => 'Grafik Tren Laporan', 'sub' => 'Laporan harian (Real + Dummy)', 'tag' => 'REPORTS'], 'visitorsChart' => ['label' => 'Pengakses Website', 'sub' => 'Traffic harian (Estimasi)', 'tag' => 'TRAFFIC']] as $id => $info)
                <div class="relative glass rounded-[2.5rem] p-10 border-white/5 transition-all duration-500 hover:bg-slate-900/40">
                    <div class="flex items-center justify-between mb-10">
                        <div>
                            <h3 class="text-xl font-black text-white uppercase italic tracking-tighter">{{ $info['label'] }}</h3>
                            <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mt-2">{{ $info['sub'] }}</p>
                        </div>
                        <div class="px-3 py-1 bg-white/5 text-teal-400 text-[10px] font-black rounded-lg border border-white/10 uppercase tracking-widest">{{ $info['tag'] }}</div>
                    </div>
                    <div class="relative h-[300px] w-full">
                        <canvas id="{{ $id }}"></canvas>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- SECONDARY GRID: STATUS & LOGS --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Distribution --}}
            <div class="glass rounded-[2.5rem] p-10 border-white/5">
                <h3 class="text-sm font-black text-white uppercase italic tracking-widest mb-8">Status Moderasi</h3>
                <div class="space-y-8">
                    @php
                        $statusRows = [
                            ['label' => 'Menunggu Verifikasi', 'val' => $stats['pending_verification'], 'color' => 'amber', 'total' => $stats['total_reports']],
                            ['label' => 'Sedang Investigasi', 'val' => $stats['investigating'], 'color' => 'indigo', 'total' => $stats['total_reports']],
                            ['label' => 'Artikel Menunggu', 'val' => $stats['pending_articles'], 'color' => 'rose', 'total' => $stats['total_articles']],
                            ['label' => 'Berhasil Diselesaikan', 'val' => $stats['resolved'], 'color' => 'teal', 'total' => $stats['total_reports']],
                        ];
                    @endphp
                    @foreach($statusRows as $row)
                        <div>
                            <div class="flex justify-between text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">
                                <span>{{ $row['label'] }}</span>
                                <span class="text-white">{{ $row['val'] }}</span>
                            </div>
                            <div class="h-2 w-full bg-white/5 rounded-full overflow-hidden">
                                @php $perc = $row['total'] > 0 ? ($row['val'] / $row['total']) * 100 : 0; @endphp
                                <div class="h-full bg-{{ $row['color'] }}-500 rounded-full shadow-[0_0_10px_rgba(20,184,166,0.3)]" style="width: {{ $perc }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Audit Logs --}}
            <div class="lg:col-span-2 glass rounded-[2.5rem] p-10 border-white/5 flex flex-col">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-sm font-black text-white uppercase italic tracking-widest">Aktivitas Sistem</h3>
                    <a href="{{ route('admin.audit-log') }}" class="group flex items-center gap-2 text-[10px] font-black text-teal-400 hover:text-teal-300 uppercase tracking-widest transition-all">
                        Lihat Log Lengkap
                        <svg class="w-3 h-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </a>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 flex-1">
                    @forelse($recentLogs as $log)
                        <div class="flex gap-4 items-center p-4 rounded-2xl hover:bg-white/5 transition-all group border border-transparent hover:border-white/5">
                            <div class="w-11 h-11 rounded-xl bg-slate-800/50 border border-white/5 flex items-center justify-center font-black text-xs text-teal-500 shrink-0 group-hover:scale-110 transition-transform overflow-hidden">
                                @if($log->user && $log->user->avatar_url)
                                    <img src="{{ $log->user->avatar_url }}" alt="{{ $log->user->name }}" class="w-full h-full object-cover">
                                @else
                                    {{ substr($log->user->name ?? '?', 0, 1) }}
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-white font-black italic truncate leading-none mb-1">
                                    {{ $log->user->name ?? 'System Process' }}
                                </p>
                                <p class="text-[9px] font-bold text-slate-500 uppercase tracking-widest truncate">
                                    {{ $log->route_name }}
                                </p>
                            </div>
                            <div class="text-[9px] font-black text-slate-600 uppercase">{{ $log->created_at->diffForHumans(null, true) }}</div>
                        </div>
                    @empty
                        <div class="col-span-2 flex flex-col items-center justify-center py-10 opacity-20">
                            <svg class="w-12 h-12 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <p class="text-[10px] font-black uppercase tracking-widest">No Recent Activity</p>
                        </div>
                    @endforelse
                </div>
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
                const commonOptions = {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#0f172a',
                            titleFont: { size: 12, weight: '900', family: 'Inter' },
                            bodyFont: { size: 12, weight: 'bold', family: 'Inter' },
                            padding: 16,
                            cornerRadius: 16,
                            displayColors: false,
                            borderColor: 'rgba(255,255,255,0.1)',
                            borderWidth: 1
                        }
                    },
                    scales: {
                        y: {
                            grid: { color: 'rgba(255,255,255,0.03)', drawTicks: false },
                            border: { display: false },
                            ticks: { color: '#475569', font: { size: 10, weight: '900' }, padding: 10 }
                        },
                        x: {
                            grid: { display: false },
                            border: { display: false },
                            ticks: { color: '#475569', font: { size: 10, weight: '900' }, padding: 10 }
                        }
                    },
                    interaction: { intersect: false, mode: 'index' }
                };

                // Chart 1: Reports
                const ctx1 = document.getElementById('reportsChart').getContext('2d');
                const g1 = ctx1.createLinearGradient(0, 0, 0, 300);
                g1.addColorStop(0, 'rgba(20, 184, 166, 0.2)');
                g1.addColorStop(1, 'rgba(20, 184, 166, 0)');

                new Chart(ctx1, {
                    type: 'line',
                    data: {
                        labels: {!! json_encode($chartLabels) !!},
                        datasets: [{
                            label: 'Laporan',
                            data: {!! json_encode($reportsData) !!},
                            borderColor: '#14b8a6',
                            backgroundColor: g1,
                            borderWidth: 4,
                            pointBackgroundColor: '#14b8a6',
                            pointBorderColor: 'rgba(255,255,255,0.2)',
                            pointBorderWidth: 4,
                            pointRadius: 0,
                            pointHoverRadius: 8,
                            fill: true,
                            tension: 0.45,
                        }]
                    },
                    options: commonOptions
                });

                // Chart 2: Visitors
                const ctx2 = document.getElementById('visitorsChart').getContext('2d');
                const g2 = ctx2.createLinearGradient(0, 0, 0, 300);
                g2.addColorStop(0, '#6366f1');
                g2.addColorStop(1, '#a855f7');

                new Chart(ctx2, {
                    type: 'bar',
                    data: {
                        labels: {!! json_encode($chartLabels) !!},
                        datasets: [{
                            label: 'Pengakses',
                            data: {!! json_encode($visitorsData) !!},
                            backgroundColor: g2,
                            borderRadius: 12,
                            borderSkipped: false,
                            maxBarThickness: 15
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

    <style>
        .animate-bounce-slow {
            animation: bounce 6s infinite;
        }
        @keyframes bounce {
            0%, 100% { transform: translateY(-5%); animation-timing-function: cubic-bezier(0.8,0,1,1); }
            50% { transform: none; animation-timing-function: cubic-bezier(0,0,0.2,1); }
        }
    </style>
</div>
