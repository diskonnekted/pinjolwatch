<div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
    {{-- Header Section --}}
    <div class="mb-8">
        <h2 class="text-3xl font-black text-slate-900 tracking-tight">Overview <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-cyan-600">Statistik</span></h2>
        <p class="text-slate-500 mt-1 text-sm">Pemantauan data operasional harian PinjolWatch secara waktu nyata.</p>
    </div>

    {{-- 4 Stat Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        {{-- Card 1: Hari Ini --}}
        <div class="bg-white rounded-3xl p-6 shadow-xl shadow-slate-200/50 border border-slate-100 flex flex-col relative overflow-hidden group">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-primary-500/10 rounded-full blur-2xl group-hover:bg-primary-500/20 transition-all"></div>
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 rounded-2xl bg-primary-50 border border-primary-100 flex items-center justify-center text-primary-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                </div>
            </div>
            <h3 class="text-slate-500 text-xs font-bold uppercase tracking-widest mb-1">Masuk Hari Ini</h3>
            <p class="text-4xl font-black text-slate-900">{{ number_format($stats['total_today']) }}</p>
        </div>

        {{-- Card 2: Bulan Ini --}}
        <div class="bg-white rounded-3xl p-6 shadow-xl shadow-slate-200/50 border border-slate-100 flex flex-col relative overflow-hidden group">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-blue-500/10 rounded-full blur-2xl group-hover:bg-blue-500/20 transition-all"></div>
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 rounded-2xl bg-blue-50 border border-blue-100 flex items-center justify-center text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" /></svg>
                </div>
            </div>
            <h3 class="text-slate-500 text-xs font-bold uppercase tracking-widest mb-1">Masuk Bulan Ini</h3>
            <p class="text-4xl font-black text-slate-900">{{ number_format($stats['total_month']) }}</p>
        </div>

        {{-- Card 3: Pending --}}
        <div class="bg-white rounded-3xl p-6 shadow-xl shadow-slate-200/50 border border-slate-100 flex flex-col relative overflow-hidden group">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-amber-500/10 rounded-full blur-2xl group-hover:bg-amber-500/20 transition-all"></div>
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 rounded-2xl bg-amber-50 border border-amber-100 flex items-center justify-center text-amber-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2.25m0 0v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" /></svg>
                </div>
            </div>
            <h3 class="text-slate-500 text-xs font-bold uppercase tracking-widest mb-1">Menunggu Verifikasi</h3>
            <p class="text-4xl font-black text-slate-900">{{ number_format($stats['pending_verification']) }}</p>
        </div>

        {{-- Card 4: Forwarded --}}
        <div class="bg-white rounded-3xl p-6 shadow-xl shadow-slate-200/50 border border-slate-100 flex flex-col relative overflow-hidden group">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-purple-500/10 rounded-full blur-2xl group-hover:bg-purple-500/20 transition-all"></div>
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 rounded-2xl bg-purple-50 border border-purple-100 flex items-center justify-center text-purple-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" /></svg>
                </div>
            </div>
            <h3 class="text-slate-500 text-xs font-bold uppercase tracking-widest mb-1">Diteruskan OJK</h3>
            <p class="text-4xl font-black text-slate-900">{{ number_format($stats['forwarded_ojk']) }}</p>
        </div>
    </div>

    {{-- Main Content Grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        {{-- Chart Section --}}
        <div class="lg:col-span-2 bg-white rounded-3xl p-6 shadow-xl shadow-slate-200/50 border border-slate-100">
            <h3 class="text-lg font-bold text-slate-900 mb-6 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-primary-500"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" /></svg>
                Tren Laporan (7 Hari Terakhir)
            </h3>
            <div class="relative h-72 w-full">
                <canvas id="reportsChart"></canvas>
            </div>
        </div>

        {{-- Right Column (System Status & Logs) --}}
        <div class="flex flex-col gap-6">
            
            {{-- System Status --}}
            <div class="bg-slate-900 rounded-3xl p-6 shadow-xl border border-slate-800 text-white relative overflow-hidden">
                <div class="absolute right-0 bottom-0 opacity-10">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-32 h-32"><path d="M4.5 3.75a3 3 0 0 0-3 3v.75h21v-.75a3 3 0 0 0-3-3h-15Z" /><path fill-rule="evenodd" d="M22.5 9.75h-21v7.5a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3v-7.5Zm-18 3.75a.75.75 0 0 1 .75-.75h6a.75.75 0 0 1 0 1.5h-6a.75.75 0 0 1-.75-.75Zm10.5 0a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" /></svg>
                </div>
                <div class="relative z-10">
                    <h3 class="text-lg font-bold text-slate-100 mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                        Status Sistem
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">
                                <span>Storage Server</span>
                                <span>24%</span>
                            </div>
                            <div class="w-full h-2 bg-slate-800 rounded-full overflow-hidden">
                                <div class="w-[24%] h-full bg-primary-400 rounded-full"></div>
                            </div>
                        </div>
                        <div class="flex justify-between items-center bg-slate-800/50 rounded-xl p-3 border border-slate-700">
                            <span class="text-xs text-slate-400 font-medium">Uptime Server</span>
                            <span class="text-sm font-mono text-emerald-400 font-bold">99.9%</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Activity Logs --}}
            <div class="bg-white rounded-3xl p-6 shadow-xl shadow-slate-200/50 border border-slate-100 flex-1">
                <h3 class="text-base font-bold text-slate-900 mb-4 flex items-center justify-between">
                    <span>Aktivitas Terkini</span>
                    <a href="#" class="text-xs text-primary-600 hover:text-primary-700 font-medium">Lihat Semua</a>
                </h3>
                
                <div class="space-y-4">
                    @forelse($recentLogs as $log)
                        <div class="flex gap-3 items-start">
                            <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 font-bold text-xs uppercase shrink-0">
                                {{ substr($log->user->name ?? '?', 0, 1) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-slate-900 truncate">
                                    <span class="font-bold">{{ $log->user->name ?? 'Unknown' }}</span> 
                                    @if(str_contains($log->route_name, 'update'))
                                        memperbarui status
                                    @elseif(str_contains($log->route_name, 'delete'))
                                        menghapus laporan
                                    @else
                                        mengakses sistem
                                    @endif
                                </p>
                                <p class="text-[10px] font-medium text-slate-500 uppercase tracking-widest mt-0.5">{{ $log->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="text-sm text-slate-500 text-center py-4">Belum ada aktivitas admin.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('livewire:initialized', () => {
                const ctx = document.getElementById('reportsChart').getContext('2d');
                
                const gradient = ctx.createLinearGradient(0, 0, 0, 400);
                gradient.addColorStop(0, 'rgba(20, 184, 166, 0.5)'); // Teal 500
                gradient.addColorStop(1, 'rgba(20, 184, 166, 0.0)');

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: {!! json_encode($chartLabels) !!},
                        datasets: [{
                            label: 'Laporan Masuk',
                            data: {!! json_encode($chartData) !!},
                            borderColor: '#0d9488', // Teal 600
                            backgroundColor: gradient,
                            borderWidth: 3,
                            pointBackgroundColor: '#fff',
                            pointBorderColor: '#0d9488',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            fill: true,
                            tension: 0.4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                backgroundColor: '#0f172a',
                                titleFont: { size: 13, family: "'Figtree', sans-serif" },
                                bodyFont: { size: 14, family: "'Figtree', sans-serif", weight: 'bold' },
                                padding: 12,
                                displayColors: false,
                                callbacks: {
                                    label: function(context) {
                                        return context.parsed.y + ' Laporan';
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                border: { display: false },
                                grid: {
                                    color: '#f1f5f9',
                                    drawTicks: false,
                                },
                                ticks: {
                                    font: { family: "'Figtree', sans-serif" },
                                    color: '#94a3b8',
                                    padding: 10,
                                    stepSize: 1
                                }
                            },
                            x: {
                                border: { display: false },
                                grid: { display: false },
                                ticks: {
                                    font: { family: "'Figtree', sans-serif", weight: 'bold' },
                                    color: '#64748b',
                                    padding: 10
                                }
                            }
                        },
                        interaction: {
                            intersect: false,
                            mode: 'index',
                        },
                    }
                });
            });
        </script>
    @endpush
</div>
