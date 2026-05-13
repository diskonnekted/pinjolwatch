<div x-data="{ activeTab: 'industry' }" class="max-w-7xl mx-auto px-6 space-y-16 pb-32">
    {{-- Main Header --}}
    <div class="text-center space-y-6 mb-24">
        <div class="badge">Laporan Dampak Nasional v2.2</div>
        <h1 class="text-7xl font-black text-white italic uppercase tracking-tighter grad leading-none">Public Impact<br>Dashboard.</h1>
        <p class="text-slate-500 text-lg font-bold uppercase tracking-[0.2em] max-w-2xl mx-auto">
            Analisis data interaktif berdasarkan laporan masyarakat dan statistik resmi otoritas.
        </p>
    </div>

    {{-- Tab Navigation --}}
    <div class="flex justify-center mb-24 sticky top-0 z-50 py-4 bg-slate-950/50 backdrop-blur-md border-b border-slate-900">
        <div class="glass p-1.5 rounded-2xl flex gap-1 border-slate-800 shadow-2xl">
            <button @click="activeTab = 'industry'" 
                :class="activeTab === 'industry' ? 'bg-teal-600 text-white shadow-lg' : 'text-slate-400 hover:text-slate-200'"
                class="px-10 py-3 rounded-xl text-xs font-black uppercase tracking-widest transition-all duration-300">
                Data Industri
            </button>
            <button @click="activeTab = 'humanity'" 
                :class="activeTab === 'humanity' ? 'bg-rose-600 text-white shadow-lg' : 'text-slate-400 hover:text-slate-200'"
                class="px-10 py-3 rounded-xl text-xs font-black uppercase tracking-widest transition-all duration-300">
                Krisis Kemanusiaan
            </button>
            <button @click="activeTab = 'impact'" 
                :class="activeTab === 'impact' ? 'bg-amber-600 text-white shadow-lg' : 'text-slate-400 hover:text-slate-200'"
                class="px-10 py-3 rounded-xl text-xs font-black uppercase tracking-widest transition-all duration-300">
                Analisis Dampak
            </button>
            <button @click="activeTab = 'findings'" 
                :class="activeTab === 'findings' ? 'bg-indigo-600 text-white shadow-lg' : 'text-slate-400 hover:text-slate-200'"
                class="px-10 py-3 rounded-xl text-xs font-black uppercase tracking-widest transition-all duration-300">
                Temuan & Solusi
            </button>
        </div>
    </div>


    {{-- TAB 4: TEMUAN KUNCI --}}
    <div x-show="activeTab === 'findings'" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
        <div class="max-w-5xl mx-auto space-y-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-black text-white italic uppercase tracking-tighter mb-4 grad">🎯 Temuan Kritis & Rekomendasi</h2>
                <p class="text-slate-500 text-sm font-bold uppercase tracking-widest">Ringkasan eksekutif laporan dampak PinjolWatch</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($stats['humanImpact']['keyFindings'] as $finding)
                <div class="glass p-8 group hover:bg-white/5 border-slate-800 transition-all">
                    <div class="flex justify-between items-start mb-4">
                        <h4 class="text-xs font-black text-slate-500 uppercase tracking-widest">{{ $finding['title'] }}</h4>
                        <span class="text-2xl font-black text-indigo-500">{{ $finding['stat'] }}</span>
                    </div>
                    <p class="text-sm text-slate-300 leading-relaxed">{{ $finding['desc'] }}</p>
                </div>
                @endforeach
            </div>

            <div class="divider pt-10"></div>

            <div class="glass p-12 bg-indigo-500/5 border-indigo-500/20">
                <h3 class="text-2xl font-black text-white uppercase italic tracking-tight mb-8">Rekomendasi Kebijakan</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="space-y-4">
                        <div class="text-2xl">⚖️</div>
                        <h5 class="text-xs font-black text-white uppercase tracking-widest">Regulasi Ketat</h5>
                        <p class="text-[11px] text-slate-400 leading-relaxed">Pembatasan bunga harian maksimal 0.1% dan moratorium izin pinjol baru hingga audit menyeluruh dilakukan.</p>
                    </div>
                    <div class="space-y-4">
                        <div class="text-2xl">🧠</div>
                        <h5 class="text-xs font-black text-white uppercase tracking-widest">Layanan Krisis</h5>
                        <p class="text-[11px] text-slate-400 leading-relaxed">Penyediaan layanan konseling kesehatan jiwa gratis bagi korban jeratan utang dan perlindungan saksi/korban.</p>
                    </div>
                    <div class="space-y-4">
                        <div class="text-2xl">🚫</div>
                        <h5 class="text-xs font-black text-white uppercase tracking-widest">Sanksi Pidana DC</h5>
                        <p class="text-[11px] text-slate-400 leading-relaxed">Penegakan hukum pidana bagi debt collector yang melakukan teror psikis, penyebaran data, dan kekerasan verbal.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- TAB 1: DATA INDUSTRI --}}
    <div x-show="activeTab === 'industry'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
        {{-- OJK Macro Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
            <div class="glass p-10 group border-amber-500/10 hover:bg-amber-500/5 transition-all">
                <div class="text-[10px] font-black text-amber-500 uppercase tracking-widest mb-4">Jumlah Pinjaman / 2026</div>
                <div class="text-4xl font-black text-white leading-tight">Rp101,03<br><span class="text-xl grad">Trilyun</span></div>
            </div>
            <div class="glass p-10 group border-blue-500/10 hover:bg-blue-500/5 transition-all">
                <div class="text-[10px] font-black text-blue-500 uppercase tracking-widest mb-4">Peminjam / Jml Penduduk</div>
                <div class="text-4xl font-black text-white leading-tight">146,5<br><span class="text-xl grad">Juta Akun</span></div>
            </div>
            <div class="glass p-10 group border-rose-500/10 hover:bg-rose-500/5 transition-all">
                <div class="text-[10px] font-black text-rose-500 uppercase tracking-widest mb-4">Pinjol Ilegal Diblokir</div>
                <div class="text-4xl font-black text-white leading-tight">9.081<br><span class="text-xl grad">Entitas</span></div>
            </div>
            <div class="glass p-10 group border-teal-500/10 hover:bg-teal-500/5 transition-all relative overflow-hidden">
                <div class="text-[10px] font-black text-teal-500 uppercase tracking-widest mb-4">Tingkat Wanprestasi</div>
                <div class="text-4xl font-black text-white leading-tight">4,54%<br><span class="text-xl grad">TWP90</span></div>
                <div class="mt-4 h-1.5 w-full bg-slate-800 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-teal-500 to-rose-500" style="width: 90.8%"></div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-8 mb-16">
            {{-- Blocking History Chart --}}
            <div class="glass col-span-12 md:col-span-8 p-10" wire:ignore>
                <div class="flex justify-between items-center mb-10">
                    <h3 class="text-xl font-black text-white uppercase italic tracking-tight">Tren Pemblokiran Pinjol Ilegal</h3>
                    <div class="px-4 py-2 bg-slate-900 border border-slate-800 rounded-xl text-[10px] font-black text-slate-500 uppercase tracking-widest">Total: 8.243+ (2021-2025)</div>
                </div>
                <div class="h-[350px]"><canvas id="blockingHistoryChart"></canvas></div>
            </div>
            
            {{-- Extra Industry Stats --}}
            <div class="glass col-span-12 md:col-span-4 p-10 space-y-8">
                <h3 class="text-xl font-black text-white uppercase italic tracking-tight">Statistik Tambahan</h3>
                <div class="p-6 bg-slate-950 rounded-2xl border border-slate-800">
                    <div class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Pinjol + Paylater (Feb 2026)</div>
                    <div class="text-3xl font-black text-amber-500">Rp157 <span class="text-sm">Trilyun</span></div>
                </div>
                <div class="p-6 bg-slate-950 rounded-2xl border border-slate-800">
                    <div class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Pengaduan Pinjol Ilegal (2025)</div>
                    <div class="text-3xl font-black text-rose-500">79,6% <span class="text-xs text-slate-600">dari Total Laporan</span></div>
                </div>
                <div class="p-6 bg-slate-950 rounded-2xl border border-slate-800">
                    <div class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Aplikasi Legal Berizin</div>
                    <div class="text-3xl font-black text-teal-500">95 <span class="text-xs text-slate-600">Perusahaan</span></div>
                </div>
            </div>
        </div>

        {{-- Internal Trend --}}
        <div class="grid grid-cols-12 gap-8">
            <div class="glass col-span-12 md:col-span-7 p-10" wire:ignore>
                <h3 class="text-xl font-black text-white uppercase italic tracking-tight mb-10">Laporan Masuk PinjolWatch</h3>
                <div class="h-[350px]"><canvas id="dynamicTrendChart"></canvas></div>
            </div>
            <div class="glass col-span-12 md:col-span-5 p-10" wire:ignore>
                <h3 class="text-xl font-black text-white uppercase italic tracking-tight mb-10">Kategori Teror Dominan</h3>
                <div class="h-[350px]"><canvas id="dynamicThreatChart"></canvas></div>
            </div>
        </div>
    </div>

    {{-- TAB 2: KRISIS KEMANUSIAAN --}}
    <div x-show="activeTab === 'humanity'" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
        <div class="grid grid-cols-12 gap-8 mb-16">
            {{-- Suicide Trend --}}
            <div class="glass col-span-12 md:col-span-7 p-10 flex flex-col">
                <div class="mb-10">
                    <h3 class="text-3xl font-black text-rose-500 uppercase italic tracking-tight mb-2">Tragedi Bunuh Diri</h3>
                    <p class="text-slate-500 text-[10px] font-black uppercase tracking-[0.3em]">Kenaikan 2.700% Kasus Terverifikasi (2018-2023)</p>
                </div>
                <div class="h-[250px] mb-10" wire:ignore><canvas id="suicideTrendChart"></canvas></div>
                
                {{-- Suicide Table --}}
                <div class="mt-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b border-slate-800 text-slate-500">
                                <th class="py-3 text-[10px] font-black uppercase tracking-widest">Tahun</th>
                                <th class="py-3 text-[10px] font-black uppercase tracking-widest text-center">Kasus</th>
                                <th class="py-3 text-[10px] font-black uppercase tracking-widest text-right">Tren</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800/50">
                            @foreach($stats['humanImpact']['suicideTrend'] as $item)
                            <tr class="hover:bg-white/5 transition-all">
                                <td class="py-3 text-xs font-bold text-slate-400 uppercase tracking-widest">{{ $item['year'] }}</td>
                                <td class="py-3 text-sm font-black text-slate-200 text-center">{{ $item['cases'] }}</td>
                                <td class="py-3 text-xs text-right font-black {{ $item['trend'] !== '-' ? 'text-rose-500' : 'text-slate-600' }}">{{ $item['trend'] }}</td>
                            </tr>
                            @endforeach
                            <tr class="bg-rose-500/5">
                                <td class="py-4 text-xs font-black text-rose-500 uppercase tracking-[0.2em]">TOTAL 2018-2023</td>
                                <td class="py-4 text-lg font-black text-white text-center">72 Kasus</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Suicide Details Table --}}
            <div class="glass col-span-12 md:col-span-5 p-10 flex flex-col justify-between">
                <div>
                    <h3 class="text-xl font-black text-white uppercase italic tracking-tight mb-10">Profil Korban Terpadu</h3>
                    <div class="space-y-6">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="p-5 bg-rose-500/10 border border-rose-500/20 rounded-2xl">
                                <div class="text-2xl font-black text-rose-500">{{ $stats['humanImpact']['suicideDetails']['meninggal'] }}</div>
                                <div class="text-[9px] font-black text-slate-500 uppercase tracking-widest mt-1">Meninggal Dunia</div>
                            </div>
                            <div class="p-5 bg-teal-500/10 border border-teal-500/20 rounded-2xl">
                                <div class="text-2xl font-black text-teal-500">{{ $stats['humanImpact']['suicideDetails']['selamat'] }}</div>
                                <div class="text-[9px] font-black text-slate-500 uppercase tracking-widest mt-1">Berhasil Selamat</div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 text-center">
                            <div class="p-6 bg-slate-900/50 rounded-2xl border border-slate-800">
                                <div class="text-2xl font-bold text-slate-300">43</div>
                                <div class="text-[9px] font-black text-slate-600 uppercase tracking-widest mt-2">Laki-laki</div>
                            </div>
                            <div class="p-6 bg-slate-900/50 rounded-2xl border border-slate-800">
                                <div class="text-2xl font-bold text-slate-300">29</div>
                                <div class="text-[9px] font-black text-slate-600 uppercase tracking-widest mt-2">Perempuan</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 space-y-6">
                    <div class="p-6 bg-slate-900/80 rounded-3xl border border-slate-800 relative overflow-hidden">
                        <div class="absolute -right-4 -top-4 text-4xl opacity-[0.05]">⚠️</div>
                        <h4 class="text-[10px] font-black text-rose-500 uppercase tracking-[0.3em] mb-4">Faktor Pendorong Utama</h4>
                        <ul class="space-y-2">
                            <li class="flex items-start gap-2 text-[11px] text-slate-400">
                                <span class="text-rose-500 mt-0.5">•</span>
                                <span>Beban utang + bunga tidak masuk akal</span>
                            </li>
                            <li class="flex items-start gap-2 text-[11px] text-slate-400">
                                <span class="text-rose-500 mt-0.5">•</span>
                                <span>Teror debt collector yang intensif (tiap 3 menit)</span>
                            </li>
                            <li class="flex items-start gap-2 text-[11px] text-slate-400">
                                <span class="text-rose-500 mt-0.5">•</span>
                                <span>Ancaman penyebaran data pribadi</span>
                            </li>
                            <li class="flex items-start gap-2 text-[11px] text-slate-400">
                                <span class="text-rose-500 mt-0.5">•</span>
                                <span>Pemaluan ke tempat kerja/teman</span>
                            </li>
                            <li class="flex items-start gap-2 text-[11px] text-slate-400">
                                <span class="text-rose-500 mt-0.5">•</span>
                                <span>Kekerasan verbal & seksual dari DC <sup class="text-[8px] text-slate-600">[12]</sup></span>
                            </li>
                        </ul>
                    </div>

                    <div class="p-6 bg-rose-500/5 rounded-3xl border border-rose-500/10 relative overflow-hidden group">
                        <div class="absolute -right-6 -bottom-6 text-6xl opacity-[0.05] group-hover:scale-110 transition-transform">📌</div>
                        <h4 class="text-[10px] font-black text-white uppercase tracking-[0.3em] mb-3">Kasus Nyata</h4>
                        <p class="text-[11px] text-slate-400 leading-relaxed italic relative z-10">
                            "Seorang karyawan honorer di Baturaja, Sumatera Selatan, diberhentikan dari pekerjaannya setelah debt collector menghubungi rekan kerjanya. Kehilangan pekerjaan membuatnya semakin sulit bayar utang, dan akhirnya bunuh diri." <sup class="text-[8px] text-slate-600">[12]</sup>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-8 mb-16">
            {{-- National Suicide Table --}}
            <div class="glass col-span-12 md:col-span-8 p-10">
                <h3 class="text-xl font-black text-white uppercase italic tracking-tight mb-4">Data Bunuh Diri Nasional (Umum)</h3>
                <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest mb-10">Sumber: Kementerian Kesehatan & POLRI</p>
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-slate-800 text-slate-500">
                            <th class="py-3 text-[10px] font-black uppercase tracking-widest">Tahun</th>
                            <th class="py-3 text-[10px] font-black uppercase tracking-widest text-center">Kasus (Polri)</th>
                            <th class="py-3 text-[10px] font-black uppercase tracking-widest text-right">Pertumbuhan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/50">
                        @foreach($stats['humanImpact']['nationalSuicide'] as $item)
                        <tr class="hover:bg-white/5 transition-all">
                            <td class="py-4 text-sm font-bold text-slate-400">{{ $item['year'] }}</td>
                            <td class="py-4 text-lg font-black text-slate-200 text-center">{{ $item['cases'] }}</td>
                            <td class="py-4 text-sm text-right font-black text-rose-500">{{ $item['growth'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- National Notes --}}
            <div class="glass col-span-12 md:col-span-4 p-10 flex flex-col justify-center bg-slate-950/30">
                <h4 class="text-[10px] font-black text-rose-500 uppercase tracking-[0.3em] mb-6">Catatan Penting</h4>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <span class="w-1.5 h-1.5 bg-rose-500 rounded-full mt-1.5 shrink-0"></span>
                        <p class="text-[11px] text-slate-400 leading-relaxed">Angka ini **hanya kasus yang dilaporkan**. Banyak kasus tidak tercatat secara resmi.</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="w-1.5 h-1.5 bg-rose-500 rounded-full mt-1.5 shrink-0"></span>
                        <p class="text-[11px] text-slate-400 leading-relaxed">Sekitar **1.800 orang** bunuh diri per tahun (Estimasi Konferensi Kesehatan Jiwa) <sup class="text-[8px] text-slate-600">[20]</sup></p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="w-1.5 h-1.5 bg-rose-500 rounded-full mt-1.5 shrink-0"></span>
                        <p class="text-[11px] text-slate-400 leading-relaxed">Faktor Utama: **Depresi, Kebangkrutan, Kehilangan Pekerjaan, dan Utang** <sup class="text-[8px] text-slate-600">[21]</sup></p>
                    </li>
                </ul>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-8 mb-16">
            {{-- Mental Health Indicators --}}
            <div class="glass col-span-12 md:col-span-8 p-10">
                <h3 class="text-xl font-black text-white uppercase italic tracking-tight mb-8">Prevalensi Nasional (Mental Health)</h3>
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-slate-800 text-slate-500">
                            <th class="py-3 text-[10px] font-black uppercase tracking-widest">Indikator</th>
                            <th class="py-3 text-[10px] font-black uppercase tracking-widest text-center">Angka</th>
                            <th class="py-3 text-[10px] font-black uppercase tracking-widest text-right">Sumber</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/50 text-[11px]">
                        @foreach($stats['humanImpact']['mentalHealth'] as $item)
                        <tr class="hover:bg-white/5 transition-all">
                            <td class="py-4 font-black text-slate-200 uppercase tracking-tight">{{ $item['label'] }}</td>
                            <td class="py-4 font-black text-teal-500 text-center">{{ $item['value'] }}%</td>
                            <td class="py-4 text-slate-500 text-right">{{ $item['note'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Undiagnosed Table --}}
            <div class="glass col-span-12 md:col-span-4 p-10 bg-rose-500/5 border-rose-500/10">
                <h3 class="text-xl font-black text-white uppercase italic tracking-tight mb-8">Tidak Terdiagnosis</h3>
                <table class="w-full text-left text-[11px]">
                    <tbody class="divide-y divide-slate-800/50">
                        @foreach($stats['humanImpact']['undiagnosed'] as $item)
                        <tr>
                            <td class="py-4">
                                <div class="font-black text-slate-200 uppercase tracking-tight">{{ $item['issue'] }}</div>
                                <div class="text-[9px] text-slate-600 mt-1">Ref: {{ $item['ref'] }}</div>
                            </td>
                            <td class="py-4 text-right font-black text-rose-500">{{ $item['value'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Vulnerable Groups & Correlation --}}
        <div class="grid grid-cols-12 gap-8 mb-16">
            <div class="glass col-span-12 md:col-span-5 p-10">
                <h3 class="text-xl font-black text-white uppercase italic tracking-tight mb-8">Kelompok Paling Rentan</h3>
                <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest mb-8">Menurut BPS (2025):</p>
                <div class="grid grid-cols-1 gap-3">
                    @foreach(['Perempuan', 'Pendidikan Rendah', 'Ekonomi Lemah', 'Pekerja Sektor Informal', 'Tinggal di Perdesaan'] as $v)
                    <div class="flex items-center gap-3 p-3 bg-slate-900/50 rounded-xl border border-slate-800">
                        <span class="text-teal-500 font-black">✓</span>
                        <span class="text-[11px] font-bold text-slate-300 uppercase tracking-widest">{{ $v }}</span>
                    </div>
                    @endforeach
                </div>
                <p class="text-[9px] text-slate-600 italic mt-6">*Dipicu ketimpangan fasilitas kesehatan jiwa [23]</p>
            </div>

            <div class="glass col-span-12 md:col-span-7 p-10 bg-amber-500/5 border-amber-500/10">
                <h3 class="text-xl font-black text-white uppercase italic tracking-tight mb-8">🔗 Korelasi Utang & Mental</h3>
                <div class="space-y-6">
                    <div>
                        <h4 class="text-[10px] font-black text-amber-500 uppercase tracking-[0.2em] mb-4">Faktor Penyebab Depresi (Kemenkes)</h4>
                        <ul class="grid grid-cols-1 gap-2">
                            <li class="text-[11px] text-slate-400 flex items-start gap-2">
                                <span class="text-amber-500">•</span>
                                <span>Peristiwa traumatis (kekerasan, kebangkrutan, kehilangan pekerjaan)</span>
                            </li>
                            <li class="text-[11px] text-slate-400 flex items-start gap-2">
                                <span class="text-amber-500">•</span>
                                <span class="font-black text-slate-200 uppercase tracking-tighter">Terlilit utang dan terlalu keras menilai diri sendiri [21]</span>
                            </li>
                        </ul>
                    </div>
                    <div class="divider opacity-20"></div>
                    <div>
                        <h4 class="text-[10px] font-black text-teal-500 uppercase tracking-[0.2em] mb-4">Bukti Riset Internasional (PMC)</h4>
                        <blockquote class="text-sm text-slate-300 italic border-l-4 border-teal-500 pl-6 leading-relaxed">
                            "The findings of the studies show that there is evidence to support that being in debt is related to Asian participants experiencing depression, anxiety, stress." [47]
                        </blockquote>
                        <p class="text-[10px] font-black text-white uppercase tracking-widest mt-4">
                            Konklusi: Bukti ilmiah kuat korelasi Utang dengan Krisis Mental di Asia.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- TAB 3: ANALISIS DAMPAK --}}
    <div x-show="activeTab === 'impact'" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <div class="glass p-12 text-center group hover:border-teal-500/30 transition-all">
                <div class="text-6xl font-black text-white mb-2">188,25 <span class="text-xs grad uppercase tracking-widest">Juta Jiwa</span></div>
                <div class="text-[10px] font-black text-teal-500 uppercase tracking-widest">Terdampak Sistemik</div>
            </div>
            <div class="glass p-12 text-center group hover:border-rose-500/30 transition-all">
                <div class="text-6xl font-black text-rose-500 mb-2">Rp1.054 <span class="text-xs grad uppercase tracking-widest">Trilyun</span></div>
                <div class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Kerugian Ekonomi / Thn</div>
            </div>
            <div class="glass p-12 text-center group hover:border-amber-500/30 transition-all">
                <div class="text-6xl font-black text-amber-500 mb-2">Rp116,6 <span class="text-xs grad uppercase tracking-widest">Trilyun</span></div>
                <div class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Beban Kesehatan / Thn</div>
            </div>
        </div>

        <div class="glass p-12 rounded-[3rem] border-slate-800">
            <h3 class="text-2xl font-black text-white uppercase italic tracking-tight mb-12 text-center">Breakdown Proyeksi Sosial</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-24 gap-y-10">
                <div class="space-y-8">
                    <div class="group">
                        <div class="flex justify-between items-end mb-3">
                            <span class="text-xs font-black text-slate-500 uppercase tracking-widest group-hover:text-teal-400 transition-colors">Stres & Ansietas (68%)</span>
                            <span class="text-xl font-black text-white">128 Juta <span class="text-[10px] text-slate-600">Jiwa</span></span>
                        </div>
                        <div class="h-1 w-full bg-slate-900 rounded-full overflow-hidden"><div class="h-full bg-teal-600" style="width: 68%"></div></div>
                    </div>
                    <div class="group">
                        <div class="flex justify-between items-end mb-3">
                            <span class="text-xs font-black text-slate-500 uppercase tracking-widest group-hover:text-teal-400 transition-colors">Gangguan Tidur (54%)</span>
                            <span class="text-xl font-black text-white">102 Juta <span class="text-[10px] text-slate-600">Jiwa</span></span>
                        </div>
                        <div class="h-1 w-full bg-slate-900 rounded-full overflow-hidden"><div class="h-full bg-teal-600" style="width: 54%"></div></div>
                    </div>
                </div>
                <div class="space-y-8">
                    <div class="group">
                        <div class="flex justify-between items-end mb-3">
                            <span class="text-xs font-black text-slate-500 uppercase tracking-widest group-hover:text-amber-400 transition-colors">Konflik Keluarga (43%)</span>
                            <span class="text-xl font-black text-white">81 Juta <span class="text-[10px] text-slate-600">Jiwa</span></span>
                        </div>
                        <div class="h-1 w-full bg-slate-900 rounded-full overflow-hidden"><div class="h-full bg-amber-600" style="width: 43%"></div></div>
                    </div>
                    <div class="group">
                        <div class="flex justify-between items-end mb-3">
                            <span class="text-xs font-black text-slate-500 uppercase tracking-widest group-hover:text-rose-400 transition-colors">Penurunan Produktivitas (61%)</span>
                            <span class="text-xl font-black text-white">115 Juta <span class="text-[10px] text-slate-600">Jiwa</span></span>
                        </div>
                        <div class="h-1 w-full bg-slate-900 rounded-full overflow-hidden"><div class="h-full bg-rose-600" style="width: 61%"></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Subtle Sources Section --}}
    <div class="pt-24 border-t border-slate-900">
        <div class="text-center mb-10">
            <h4 class="text-[9px] font-black text-slate-700 uppercase tracking-[0.4em] mb-2">Otoritas & Sumber Data Resmi</h4>
            <div class="h-px w-16 bg-slate-800 mx-auto"></div>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @php
                $sourceDetails = [
                    ['name' => 'BPS', 'desc' => 'Kriminalitas', 'icon' => '📊', 'link' => 'https://bps.go.id'],
                    ['name' => 'Kemenkes', 'desc' => 'Riskesdas', 'icon' => '🏥', 'link' => 'https://kemkes.go.id'],
                    ['name' => 'Polri', 'desc' => 'Crime Data', 'icon' => '👮', 'link' => 'https://polri.go.id'],
                    ['name' => 'OJK', 'desc' => 'Fintech', 'icon' => '🏛️', 'link' => 'https://ojk.go.id'],
                    ['name' => 'Jangkara', 'desc' => 'Big Data', 'icon' => '📡', 'link' => '#'],
                    ['name' => 'WHO', 'desc' => 'Mental Health', 'icon' => '🌐', 'link' => 'https://who.int'],
                ];
            @endphp

            @foreach($sourceDetails as $source)
                <a href="{{ $source['link'] }}" target="_blank" class="glass p-4 group hover:bg-white/5 border-slate-900 transition-all duration-300 flex items-center gap-3">
                    <div class="w-8 h-8 bg-slate-900 rounded-lg flex items-center justify-center text-sm opacity-60 group-hover:opacity-100 transition-opacity">
                        {{ $source['icon'] }}
                    </div>
                    <div>
                        <div class="text-[9px] font-black text-slate-400 uppercase tracking-widest group-hover:text-teal-500 transition-colors">{{ $source['name'] }}</div>
                        <div class="text-[8px] text-slate-600 font-bold uppercase truncate">{{ $source['desc'] }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    {{-- JS for Charts --}}
    <script>
        document.addEventListener('livewire:initialized', () => {
            const chartDefaults = {
                responsive: true, maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { grid: { color: 'rgba(255,255,255,0.03)' }, ticks: { color: '#475569', font: { size: 9, weight: '900' } } },
                    x: { grid: { display: false }, ticks: { color: '#475569', font: { size: 9, weight: '900' } } }
                }
            };

            new Chart(document.getElementById('blockingHistoryChart').getContext('2d'), {
                type: 'bar',
                data: {
                    labels: @json($stats['humanImpact']['blockingHistory']).map(d => d.year),
                    datasets: [{ data: @json($stats['humanImpact']['blockingHistory']).map(d => d.count), backgroundColor: '#0d9488', borderRadius: 10 }]
                },
                options: chartDefaults
            });

            new Chart(document.getElementById('suicideTrendChart').getContext('2d'), {
                type: 'line',
                data: {
                    labels: @json($stats['humanImpact']['suicideTrend']).map(d => d.year),
                    datasets: [{
                        data: @json($stats['humanImpact']['suicideChartData']),
                        borderColor: '#f43f5e', backgroundColor: 'rgba(244, 63, 94, 0.05)', borderWidth: 6, fill: true, tension: 0.3, pointRadius: 5, pointBackgroundColor: '#f43f5e'
                    }]
                },
                options: chartDefaults
            });

            new Chart(document.getElementById('dynamicTrendChart').getContext('2d'), {
                type: 'line',
                data: {
                    labels: @json($stats['monthlyTrend']).map(d => d.month),
                    datasets: [{
                        data: @json($stats['monthlyTrend']).map(d => d.count),
                        borderColor: '#2dd4bf', backgroundColor: 'rgba(45, 212, 191, 0.1)', borderWidth: 4, fill: true, tension: 0.4
                    }]
                },
                options: chartDefaults
            });

            new Chart(document.getElementById('dynamicThreatChart').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: @json($stats['threatDistribution']).map(d => d.label),
                    datasets: [{
                        data: @json($stats['threatDistribution']).map(d => d.count),
                        backgroundColor: ['#0d9488', '#3b82f6', '#fbbf24', '#e11d48', '#8b5cf6'], borderColor: 'transparent', hoverOffset: 15
                    }]
                },
                options: { 
                    responsive: true, 
                    maintainAspectRatio: false,
                    cutout: '70%', 
                    plugins: { 
                        legend: { 
                            display: true, 
                            position: 'bottom', 
                            labels: { 
                                color: '#94a3b8', 
                                font: { size: 9, weight: 'bold' }, 
                                padding: 15 
                            } 
                        } 
                    } 
                }
            });

            new Chart(document.getElementById('mentalHealthRadar').getContext('2d'), {
                type: 'radar',
                data: {
                    labels: @json($stats['humanImpact']['mentalHealth']).map(d => d.label),
                    datasets: [{
                        data: @json($stats['humanImpact']['mentalHealth']).map(d => d.value),
                        backgroundColor: 'rgba(45, 212, 191, 0.2)', borderColor: '#2dd4bf', borderWidth: 3, pointBackgroundColor: '#2dd4bf'
                    }]
                },
                options: { 
                    responsive: true, maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: { r: { angleLines: { color: 'rgba(255,255,255,0.05)' }, grid: { color: 'rgba(255,255,255,0.05)' }, pointLabels: { color: '#475569', font: { size: 8, weight: '900' } }, ticks: { display: false } } }
                }
            });
        });
    </script>
</div>
