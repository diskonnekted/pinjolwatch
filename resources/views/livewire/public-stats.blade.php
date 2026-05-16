<div x-data="{ 
        activeTab: 'humanity',
        init() {
            this.$watch('activeTab', () => { this.startChartEngine(); });
            this.startChartEngine();
        },
        startChartEngine() {
            let attempts = 0;
            const timer = setInterval(() => {
                attempts++;
                const isIndustry = this.activeTab === 'industry' && document.getElementById('blockingHistoryChart');
                const isHumanity = this.activeTab === 'humanity' && document.getElementById('suicideTrendChart');
                
                if (isIndustry || isHumanity) {
                    clearInterval(timer);
                    initCharts(this.activeTab);
                }
                if (attempts > 50) clearInterval(timer);
            }, 100);
        }
    }" class="max-w-7xl mx-auto px-4 md:px-8 pb-32">
    
    <style>
        [x-cloak] { display: none !important; }
        .stat-card { background: rgba(15,23,42,0.4); border: 1px solid rgba(255,255,255,0.05); border-radius: 24px; padding: 2.5rem; transition: all 0.3s ease; width: 100%; box-sizing: border-box; position: relative; overflow: hidden; }
        .stat-card:hover { border-color: rgba(45,212,191,0.2); background: rgba(15,23,42,0.6); }
        .flex-balanced { display: flex; flex-wrap: wrap; gap: 32px; width: 100%; }
        .flex-item-50 { flex: 1 1 calc(50% - 16px); min-width: 300px; }
        .flex-item-100 { flex: 1 1 100%; }
        .chart-container { height: 500px; width: 100%; }
        @media (max-width: 1024px) { .flex-item-50 { flex: 1 1 100%; } .chart-container { height: 350px; } }
        .badge-rose { background: rgba(225, 29, 72, 0.1); color: #fb7185; border: 1px solid rgba(225, 29, 72, 0.2); }
        .badge-teal { background: rgba(20, 184, 166, 0.1); color: #2dd4bf; border: 1px solid rgba(20, 184, 166, 0.2); }
        .divider-slate { height: 1px; background: rgba(255,255,255,0.05); margin: 32px 0; }
    </style>

    {{-- Sticky Tab Navigation --}}
    <div class="sticky top-24 z-50 py-6 mb-16">
        <div class="flex items-center justify-center p-2 bg-slate-900/90 backdrop-blur-2xl border border-slate-800 rounded-3xl max-w-2xl mx-auto shadow-2xl">
            <button @click="activeTab = 'industry'" :class="activeTab === 'industry' ? 'bg-teal-600 text-white shadow-lg' : 'text-slate-400 hover:text-slate-200'" class="flex-1 px-6 py-4 rounded-2xl text-[10px] md:text-xs font-black uppercase tracking-widest transition-all duration-300">Industri</button>
            <button @click="activeTab = 'humanity'" :class="activeTab === 'humanity' ? 'bg-rose-600 text-white shadow-lg' : 'text-slate-400 hover:text-slate-200'" class="flex-1 px-6 py-4 rounded-2xl text-[10px] md:text-xs font-black uppercase tracking-widest transition-all duration-300">Kemanusiaan</button>
            <button @click="activeTab = 'impact'" :class="activeTab === 'impact' ? 'bg-amber-600 text-white shadow-lg' : 'text-slate-400 hover:text-slate-200'" class="flex-1 px-6 py-4 rounded-2xl text-[10px] md:text-xs font-black uppercase tracking-widest transition-all duration-300">Dampak</button>
            <button @click="activeTab = 'findings'" :class="activeTab === 'findings' ? 'bg-indigo-600 text-white shadow-lg' : 'text-slate-400 hover:text-slate-200'" class="flex-1 px-6 py-4 rounded-2xl text-[10px] md:text-xs font-black uppercase tracking-widest transition-all duration-300">Temuan</button>
        </div>
    </div>

    {{-- TAB 1: INDUSTRI --}}
    <div x-show="activeTab === 'industry'" x-cloak x-transition class="w-full">
        <div class="space-y-12">
            <div class="flex-balanced">
                <div class="flex-item-50">
                    <div class="stat-card border-amber-500/10 h-full">
                        <div class="text-[10px] font-black text-amber-500 uppercase tracking-widest mb-6 italic">Data Maret 2026</div>
                        <div class="text-[11px] font-black text-slate-500 uppercase tracking-widest mb-4">Total Pinjaman Berjalan (Outstanding)</div>
                        <div class="text-4xl md:text-7xl font-black text-white leading-none">Rp101,03<span class="text-xl text-amber-500/40 ml-2 italic">Triliun</span></div>
                        <div class="mt-10 flex gap-8 border-t border-slate-800 pt-8">
                            <div class="flex-1">
                                <div class="text-[8px] font-black text-slate-500 uppercase mb-2">Penyaluran Kumulatif</div>
                                <div class="text-2xl font-black text-white">Rp978 <span class="text-sm text-slate-600">TR</span></div>
                            </div>
                            <div class="flex-1 border-l border-slate-800 pl-8">
                                <div class="text-[8px] font-black text-slate-500 uppercase mb-2">Pertumbuhan YoY</div>
                                <div class="text-2xl font-black text-teal-500">+26,25%</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-item-50">
                    <div class="stat-card border-rose-500/10 h-full">
                        <div class="text-[10px] font-black text-rose-500 uppercase tracking-widest mb-6 italic">Satgas PASTI</div>
                        <div class="text-[11px] font-black text-slate-500 uppercase tracking-widest mb-4">Total Entitas Ilegal Diblokir</div>
                        <div class="text-4xl md:text-7xl font-black text-white leading-none">9.081<span class="text-xl text-rose-500/40 ml-2 italic">Aplikasi</span></div>
                        <div class="mt-10 flex gap-8 border-t border-slate-800 pt-8">
                            <div class="flex-1 text-center">
                                <div class="text-2xl font-black text-white">146,5 JT</div>
                                <div class="text-[8px] font-black text-slate-600 uppercase mt-2">Akun Terdaftar</div>
                            </div>
                            <div class="flex-1 text-center border-l border-slate-800">
                                <div class="text-2xl font-black text-rose-500">4,54%</div>
                                <div class="text-[8px] font-black text-slate-600 uppercase mt-2">Tingkat TWP90</div>
                            </div>
                            <div class="flex-1 text-center border-l border-slate-800">
                                <div class="text-2xl font-black text-teal-500">95</div>
                                <div class="text-[8px] font-black text-slate-600 uppercase mt-2">Pinjol Legal</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="stat-card bg-slate-900/20 w-full" wire:ignore>
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px;">
                    <h3 class="text-sm font-black text-white uppercase tracking-[0.2em]">Visualisasi Tren Pemblokiran Ilegal (2021-2025)</h3>
                    <div class="px-5 py-2 bg-slate-800 rounded-2xl text-[10px] font-black text-slate-400 uppercase tracking-widest border border-slate-700">Skala Masif Penindakan</div>
                </div>
                <div class="chart-container"><canvas id="blockingHistoryChart"></canvas></div>
            </div>

            <div class="flex-balanced">
                <div class="flex-item-50">
                    <div class="stat-card">
                        <h3 class="text-xs font-black text-slate-500 uppercase tracking-[0.3em] mb-12 text-center">Komposisi & Sumber Pendanaan</h3>
                        <div class="flex gap-16">
                            <div class="flex-1 space-y-8">
                                <h4 class="text-[9px] font-black text-teal-500 uppercase tracking-widest">Tujuan Penyaluran</h4>
                                @foreach($stats['official']['composition'] as $item)
                                <div>
                                    <div class="flex justify-between text-[10px] font-bold text-slate-300 uppercase mb-3"><span>{{ $item['label'] }}</span><span>{{ $item['value'] }}%</span></div>
                                    <div class="h-2 w-full bg-slate-950 rounded-full overflow-hidden"><div class="h-full bg-teal-600 transition-all duration-1000" style="width: {{ $item['value'] }}%"></div></div>
                                </div>
                                @endforeach
                            </div>
                            <div class="flex-1 space-y-8 border-l border-slate-800 pl-16">
                                <h4 class="text-[9px] font-black text-amber-500 uppercase tracking-widest">Asal Lender (Pemodal)</h4>
                                @foreach($stats['official']['lender_origin'] as $item)
                                <div>
                                    <div class="flex justify-between text-[10px] font-bold text-slate-300 uppercase mb-3"><span>{{ $item['label'] }}</span><span>{{ $item['value'] }}%</span></div>
                                    <div class="h-2 w-full bg-slate-950 rounded-full overflow-hidden"><div class="h-full bg-amber-600 transition-all duration-1000" style="width: {{ $item['value'] }}%"></div></div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-item-50">
                    <div class="stat-card h-full">
                        <h3 class="text-xs font-black text-slate-500 uppercase tracking-[0.3em] mb-12 text-center">Distribusi Geografis (Estimasi)</h3>
                        <div class="space-y-8 px-6">
                            @foreach($stats['official']['geography'] as $geo)
                            <div class="group">
                                <div class="flex justify-between items-end mb-3">
                                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest group-hover:text-teal-400 transition-colors">{{ $geo['label'] }}</span>
                                    <span class="text-2xl font-black text-white">{{ $geo['value'] }}%</span>
                                </div>
                                <div class="h-2 w-full bg-slate-950 rounded-full overflow-hidden"><div class="h-full bg-teal-600 transition-all duration-1000 delay-300" style="width: {{ $geo['value'] }}%"></div></div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="stat-card border-slate-800 bg-slate-950/20 w-full p-12 md:p-20">
                <h3 class="text-2xl font-black text-white uppercase tracking-[0.2em] mb-16 text-center">Matriks Tantangan & Mitigasi Risiko</h3>
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="border-bottom: 1px solid #1e293b; text-align: left;">
                                <th style="padding: 0 0 32px 0; font-size: 11px; text-transform: uppercase; color: #64748b; letter-spacing: 2px;">Risiko Industri</th>
                                <th style="padding: 0 0 32px 0; font-size: 11px; text-transform: uppercase; color: #64748b; letter-spacing: 2px;">Dampak Terhadap Publik</th>
                                <th style="padding: 0 0 32px 0; font-size: 11px; text-transform: uppercase; color: #64748b; letter-spacing: 2px; text-align: right;">Mitigasi OJK / Satgas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stats['challenges'] as $c)
                            <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                                <td style="padding: 32px 0; font-size: 14px; font-weight: 800; color: #f1f5f9;">{{ $c['risk'] }}</td>
                                <td style="padding: 32px 0; font-size: 14px; font-weight: 600; color: #94a3b8; max-width: 400px;">{{ $c['impact'] }}</td>
                                <td style="padding: 32px 0; font-size: 14px; font-weight: 800; color: #14b8a6; text-align: right;">{{ $c['mitigation'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- TAB 2: KEMANUSIAAN --}}
    <div x-show="activeTab === 'humanity'" x-cloak x-transition class="w-full">
        <div class="space-y-12">
            {{-- Tragedi Headline --}}
            <div class="stat-card border-rose-500/20 bg-gradient-to-br from-rose-950/20 to-slate-900/40 relative overflow-hidden">
                <div class="flex-balanced items-center">
                    <div class="flex-item-50 space-y-8">
                        <div class="badge-rose px-5 py-2 rounded-full text-[10px] font-black uppercase tracking-widest w-fit">Darurat Kemanusiaan</div>
                        <h2 class="text-5xl md:text-8xl font-black text-white uppercase tracking-tighter leading-[0.85]">Tragedi <br><span class="text-rose-600 italic">Bunuh Diri.</span></h2>
                        <p class="text-slate-300 text-lg leading-relaxed max-w-xl">Lonjakan kasus drastis mencapai <span class="text-white font-black underline decoration-rose-600 decoration-4 underline-offset-8">2.700%</span> sejak 2018. Puncaknya pada Des 2023 dengan 25 nyawa hilang dalam 1 bulan.</p>
                        <div style="display: flex; gap: 24px;">
                            <div class="px-8 py-6 bg-rose-500/10 border border-rose-500/20 rounded-[2rem] text-center flex-1">
                                <div class="text-5xl font-black text-rose-500">72</div>
                                <div class="text-[9px] font-black text-slate-500 uppercase tracking-widest mt-3">Total Korban Jiwa</div>
                            </div>
                            <div class="px-8 py-6 bg-slate-800/50 border border-slate-700/50 rounded-[2rem] text-center flex-1">
                                <div class="text-5xl font-black text-white">25</div>
                                <div class="text-[9px] font-black text-slate-500 uppercase tracking-widest mt-3">Puncak Des '23</div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-item-50" wire:ignore>
                        <div class="chart-container"><canvas id="suicideTrendChart"></canvas></div>
                    </div>
                </div>
            </div>

            {{-- Comparison: Pinjol vs Other Credit --}}
            <div class="stat-card border-teal-500/10">
                <div style="text-align: center; margin-bottom: 64px;">
                    <h3 class="text-2xl font-black text-white uppercase tracking-[0.2em]">Risiko Gangguan Mental per Jenis Kredit</h3>
                    <p class="text-[11px] text-slate-500 font-bold uppercase mt-2">Sumber: Data Mikro Susenas BPS (Maret 2022)</p>
                </div>
                <div class="space-y-8 max-w-4xl mx-auto">
                    @foreach($stats['humanImpact']['mentalHealth'] as $mh)
                    <div class="group">
                        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 12px;">
                            <div class="flex items-center gap-4">
                                <span class="text-xl">{{ $loop->first ? '📱' : '🏦' }}</span>
                                <span class="text-xs font-black text-slate-300 uppercase tracking-widest">{{ $mh['label'] }}</span>
                            </div>
                            <span class="text-2xl font-black {{ $loop->first ? 'text-rose-500' : 'text-white' }}">{{ $mh['value'] }}%</span>
                        </div>
                        <div class="h-3 w-full bg-slate-950 rounded-full overflow-hidden">
                            <div class="h-full {{ $loop->first ? 'bg-rose-600' : 'bg-teal-600' }} transition-all duration-1000" style="width: {{ $mh['value'] }}%"></div>
                        </div>
                        <p class="text-[9px] text-slate-500 mt-3 font-bold uppercase">{{ $mh['note'] }}</p>
                    </div>
                    @endforeach
                </div>
                <div class="mt-12 p-6 bg-rose-950/20 border border-rose-900/20 rounded-2xl text-center">
                    <p class="text-xs text-rose-400 font-bold uppercase tracking-widest">⚠️ Pengguna Pinjol berisiko 3X Lipat lebih tinggi dibanding Bank Umum</p>
                </div>
            </div>

            <div class="flex-balanced">
                {{-- Demographics --}}
                <div class="flex-item-50">
                    <div class="stat-card h-full">
                        <h3 class="text-xs font-black text-slate-500 uppercase tracking-[0.3em] mb-12 text-center">Profil Demografi Rentan</h3>
                        <div class="space-y-12">
                            <div>
                                <h4 class="text-[9px] font-black text-teal-500 uppercase tracking-widest mb-6">Berdasarkan Usia (OJK)</h4>
                                <div class="space-y-6">
                                    @foreach($stats['humanImpact']['demographics']['age'] as $age)
                                    <div>
                                        <div class="flex justify-between text-[10px] font-bold text-slate-400 uppercase mb-2"><span>{{ $age['label'] }}</span><span>{{ $age['value'] }}%</span></div>
                                        <div class="h-1.5 w-full bg-slate-950 rounded-full overflow-hidden"><div class="h-full bg-teal-600" style="width: {{ $age['value'] }}%"></div></div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="divider-slate"></div>
                            <div>
                                <h4 class="text-[9px] font-black text-amber-500 uppercase tracking-widest mb-6">Berdasarkan Kelas Ekonomi (BPS)</h4>
                                <div class="space-y-6">
                                    @foreach($stats['humanImpact']['demographics']['economy'] as $eco)
                                    <div>
                                        <div class="flex justify-between text-[10px] font-bold text-slate-400 uppercase mb-2"><span>{{ $eco['label'] }}</span><span>{{ $eco['value'] }}%</span></div>
                                        <div class="h-1.5 w-full bg-slate-950 rounded-full overflow-hidden"><div class="h-full bg-amber-600" style="width: {{ $eco['value'] }}%"></div></div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Women Specific & Symptoms --}}
                <div class="flex-item-50 space-y-8">
                    <div class="stat-card bg-indigo-950/10 border-indigo-500/20">
                        <h3 class="text-xs font-black text-indigo-400 uppercase tracking-[0.3em] mb-10 text-center">Statistik Krisis: Perempuan</h3>
                        <div class="grid grid-cols-3 gap-6">
                            @foreach($stats['humanImpact']['womenSpecific'] as $ws)
                            <div class="text-center p-6 bg-slate-950 rounded-3xl border border-slate-900">
                                <div class="text-3xl font-black text-indigo-500">{{ $ws['value'] }}%</div>
                                <div class="text-[8px] font-black text-slate-600 uppercase mt-2">{{ $ws['label'] }}</div>
                            </div>
                            @endforeach
                        </div>
                        <p class="text-[9px] text-slate-500 mt-8 italic text-center uppercase tracking-widest">Sumber: Riset PARAPUAN (Februari 2023)</p>
                    </div>
                    <div class="stat-card">
                        <h3 class="text-xs font-black text-slate-500 uppercase tracking-[0.3em] mb-10 text-center">Gejala Psikologis Dominan</h3>
                        <div class="grid grid-cols-1 gap-6">
                            @foreach($stats['humanImpact']['symptoms'] as $sym)
                            <div>
                                <div class="flex justify-between text-[10px] font-bold text-slate-400 uppercase mb-2"><span>{{ $sym['label'] }}</span><span>{{ $sym['value'] }}%</span></div>
                                <div class="h-2 w-full bg-slate-950 rounded-full overflow-hidden"><div class="h-full bg-rose-600" style="width: {{ $sym['value'] }}%"></div></div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- National Table --}}
            <div class="stat-card border-slate-800 bg-slate-900/20 w-full p-12 md:p-20">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 64px;">
                    <div>
                        <h3 class="text-3xl font-black text-white uppercase tracking-[0.1em]">Konteks Data Bunuh Diri Nasional</h3>
                        <p class="text-[12px] text-slate-500 font-bold uppercase mt-3">Sumber Resmi: POLRI & Kementerian Kesehatan RI</p>
                    </div>
                    <div class="px-10 py-4 badge-rose rounded-3xl text-[12px] font-black uppercase shadow-2xl">Underreporting Masif (Fakta Lapangan)</div>
                </div>
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="border-bottom: 2px solid #1e293b; text-align: left;">
                                <th style="padding-bottom: 32px; font-size: 12px; text-transform: uppercase; color: #64748b; letter-spacing: 3px;">Tahun Laporan</th>
                                <th style="padding-bottom: 32px; font-size: 12px; text-transform: uppercase; color: #64748b; text-align: center; letter-spacing: 3px;">Jumlah Kasus Resmi</th>
                                <th style="padding-bottom: 32px; font-size: 12px; text-transform: uppercase; color: #64748b; text-align: right; letter-spacing: 3px;">Laju Pertumbuhan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stats['humanImpact']['nationalSuicide'] as $item)
                            <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                                <td style="padding: 32px 0; font-size: 16px; font-weight: 800; color: #94a3b8;">{{ $item['year'] }}</td>
                                <td style="padding: 32px 0; font-size: 36px; font-weight: 900; color: #fff; text-align: center;">{{ $item['cases'] }}</td>
                                <td style="padding: 32px 0; font-size: 16px; font-weight: 900; color: #e11d48; text-align: right;">{{ $item['growth'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- TAB 3: DAMPAK --}}
    <div x-show="activeTab === 'impact'" x-cloak x-transition class="w-full">
        <div class="flex-balanced">
            <div class="stat-card text-center border-teal-500/10" style="flex: 1;">
                <div class="text-7xl font-black text-white leading-none mb-6">188,2<span class="text-2xl text-slate-600 ml-3 italic">Juta</span></div>
                <div class="text-[12px] font-black text-teal-500 uppercase tracking-[0.4em]">Jiwa Terdampak Secara Sistemik</div>
                <p class="text-[11px] text-slate-500 mt-8 max-w-sm mx-auto leading-relaxed">Proyeksi populasi yang mengalami tekanan ekonomi & sosial akibat efek domino pinjol.</p>
            </div>
            <div class="stat-card text-center border-rose-500/10" style="flex: 1;">
                <div class="text-7xl font-black text-rose-600 leading-none mb-6">1.054<span class="text-2xl text-slate-600 ml-3 italic">Triliun</span></div>
                <div class="text-[12px] font-black text-slate-500 uppercase tracking-[0.4em]">Estimasi Kerugian Ekonomi Nasional</div>
                <p class="text-[11px] text-slate-500 mt-8 max-w-sm mx-auto leading-relaxed">Kehilangan potensi daya beli & produktivitas akibat jeratan hutang konsumtif.</p>
            </div>
        </div>
    </div>

    {{-- TAB 4: FINDINGS --}}
    <div x-show="activeTab === 'findings'" x-cloak x-transition class="w-full">
        <div class="flex-balanced">
            @foreach($stats['humanImpact']['keyFindings'] as $finding)
            <div class="stat-card flex-item-50">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 32px;">
                    <h4 class="text-[12px] font-black text-slate-400 uppercase tracking-[0.2em]">{{ $finding['title'] }}</h4>
                    <span class="text-5xl font-black text-indigo-500 group-hover:scale-110 transition-transform">{{ $finding['stat'] }}</span>
                </div>
                <p class="text-lg text-slate-300 leading-relaxed font-medium">{{ $finding['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Sources Footer --}}
    <div class="pt-32 border-t border-slate-900 opacity-60">
        <div class="text-center mb-16">
            <h4 class="text-[10px] font-black text-slate-700 uppercase tracking-[0.5em] mb-4">Konsolidasi Data Dari Otoritas Resmi</h4>
            <div class="h-1 w-24 bg-slate-800 mx-auto rounded-full"></div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
            @foreach([['BPS', '📊'], ['Kemenkes', '🏥'], ['Polri', '👮'], ['OJK', '🏛️'], ['Jangkara', '📡'], ['WHO', '🌐']] as $s)
            <div class="p-8 rounded-[2rem] bg-slate-900/40 border border-slate-800 text-center group hover:bg-slate-800/60 transition-all">
                <div class="text-4xl mb-4 opacity-50 group-hover:opacity-100 transition-opacity">{{ $s[1] }}</div>
                <div class="text-[11px] font-black text-slate-500 uppercase tracking-widest group-hover:text-teal-500 transition-colors">{{ $s[0] }}</div>
            </div>
            @endforeach
        </div>
    </div>

    <script>
        function initCharts(tab) {
            const chartDefaults = {
                responsive: true, maintainAspectRatio: false,
                plugins: { 
                    legend: { display: false },
                    tooltip: { backgroundColor: '#0f172a', padding: 16, titleFont: { size: 14, weight: 'bold' }, bodyFont: { size: 14 } }
                },
                scales: {
                    y: { grid: { color: 'rgba(255,255,255,0.03)' }, ticks: { color: '#64748b', font: { size: 11, weight: 'bold' } } },
                    x: { grid: { display: false }, ticks: { color: '#64748b', font: { size: 11, weight: 'bold' } } }
                }
            };

            if (tab === 'industry' || !tab) {
                const bhCanvas = document.getElementById('blockingHistoryChart');
                if(bhCanvas) {
                    const existing = Chart.getChart(bhCanvas); if(existing) existing.destroy();
                    new Chart(bhCanvas.getContext('2d'), {
                        type: 'bar',
                        data: {
                            labels: @json($stats['humanImpact']['blockingHistory']).map(d => d.year),
                            datasets: [{ 
                                label: 'Entitas Diblokir',
                                data: @json($stats['humanImpact']['blockingHistory']).map(d => d.count), 
                                backgroundColor: '#0d9488', borderRadius: 12, barThickness: 40 
                            }]
                        },
                        options: chartDefaults
                    });
                }
            }

            if (tab === 'humanity' || !tab) {
                const stCanvas = document.getElementById('suicideTrendChart');
                if(stCanvas) {
                    const existing = Chart.getChart(stCanvas); if(existing) existing.destroy();
                    new Chart(stCanvas.getContext('2d'), {
                        type: 'line',
                        data: {
                            labels: @json($stats['humanImpact']['suicideTrend']).map(d => d.year),
                            datasets: [{
                                label: 'Kasus Terverifikasi',
                                data: @json($stats['humanImpact']['suicideChartData']),
                                borderColor: '#e11d48', backgroundColor: 'rgba(225, 29, 72, 0.1)', 
                                borderWidth: 8, fill: true, tension: 0.4, pointRadius: 8, pointBackgroundColor: '#e11d48'
                            }]
                        },
                        options: chartDefaults
                    });
                }
            }
        }
    </script>
</div>
