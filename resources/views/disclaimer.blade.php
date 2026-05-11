<x-frontend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-100 leading-tight">
            {{ __('Disclaimer & Batasan Tanggung Jawab') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            {{-- HERO SECTION --}}
            <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_30px_rgba(0,0,0,0.4)] rounded-[2.5rem] overflow-hidden relative">
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-900/20 via-slate-900 to-slate-900 z-0"></div>
                <div class="relative z-10 p-10 md:p-16">
                    <div class="max-w-3xl">
                        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 text-xs font-bold tracking-widest uppercase mb-8">
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
                            </span>
                            Informasi Hukum Penting
                        </div>
                        <h1 class="text-4xl md:text-6xl font-black text-white leading-[1.1] mb-6">
                            Transparansi Adalah <br><span class="text-indigo-400">Prioritas Kami.</span>
                        </h1>
                        <p class="text-lg text-slate-400 leading-relaxed mb-10">
                            Halaman ini menjelaskan batasan peran PinjolWatch. Kami berkomitmen menyediakan platform yang aman, namun penting bagi Anda untuk memahami tanggung jawab masing-masing pihak dalam ekosistem ini.
                        </p>
                        <div class="flex flex-wrap items-center gap-6">
                            <div class="flex items-center gap-3 px-5 py-3 bg-slate-800/50 border border-slate-700 rounded-2xl">
                                <div class="w-10 h-10 rounded-xl bg-indigo-500/10 flex items-center justify-center text-indigo-400 text-lg">📅</div>
                                <div>
                                    <div class="text-[10px] uppercase tracking-wider text-slate-500 font-bold">Terakhir Diperbarui</div>
                                    <div class="text-sm font-bold text-slate-200">{{ now()->format('d F Y') }}</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 px-5 py-3 bg-slate-800/50 border border-slate-700 rounded-2xl">
                                <div class="w-10 h-10 rounded-xl bg-indigo-500/10 flex items-center justify-center text-indigo-400 text-lg">⚖️</div>
                                <div>
                                    <div class="text-[10px] uppercase tracking-wider text-slate-500 font-bold">Yurisdiksi</div>
                                    <div class="text-sm font-bold text-slate-200">Republik Indonesia</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                
                {{-- LEFT COLUMN: CORE POLICIES --}}
                <div class="lg:col-span-8 space-y-8">
                    
                    {{-- 1. IDENTITAS & PERAN --}}
                    <div class="bg-slate-900 border border-slate-800 shadow-xl rounded-[2rem] p-8 md:p-10 relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-500/5 rounded-full blur-3xl group-hover:bg-indigo-500/10 transition-colors"></div>
                        <div class="relative z-10">
                            <div class="flex items-center gap-4 mb-8">
                                <div class="w-12 h-12 rounded-2xl bg-indigo-500/10 border border-indigo-500/20 flex items-center justify-center text-indigo-400 font-black text-xl shadow-inner">1</div>
                                <h2 class="text-2xl font-black text-white">Sifat Platform & Peran</h2>
                            </div>
                            <p class="text-slate-400 leading-relaxed mb-6">PinjolWatch adalah <strong>penyelenggara sistem elektronik independen</strong>. Kami menyediakan wadah teknis untuk pengaduan dan edukasi, namun kami dengan tegas menyatakan bahwa kami <span class="text-white font-bold underline decoration-indigo-500 underline-offset-4">BUKAN</span>:</p>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                                <div class="p-4 bg-slate-950/50 border border-slate-800 rounded-2xl flex items-start gap-3">
                                    <span class="text-red-500 mt-1">✕</span>
                                    <span class="text-sm text-slate-300">Lembaga Penegak Hukum (Polisi/Kejaksaan)</span>
                                </div>
                                <div class="p-4 bg-slate-950/50 border border-slate-800 rounded-2xl flex items-start gap-3">
                                    <span class="text-red-500 mt-1">✕</span>
                                    <span class="text-sm text-slate-300">Otoritas Jasa Keuangan (OJK)</span>
                                </div>
                                <div class="p-4 bg-slate-950/50 border border-slate-800 rounded-2xl flex items-start gap-3">
                                    <span class="text-red-500 mt-1">✕</span>
                                    <span class="text-sm text-slate-300">Kantor Konsultan Hukum Berizin</span>
                                </div>
                                <div class="p-4 bg-slate-950/50 border border-slate-800 rounded-2xl flex items-start gap-3">
                                    <span class="text-red-500 mt-1">✕</span>
                                    <span class="text-sm text-slate-300">Pemberi Pinjaman (Fintech/Bank)</span>
                                </div>
                            </div>
                            <div class="p-6 bg-indigo-500/5 border border-indigo-500/10 rounded-2xl text-sm text-indigo-300/80 italic leading-relaxed">
                                Kami bertindak sebagai perantara (intermediary) sesuai regulasi yang berlaku, memfasilitasi suara masyarakat secara anonim dan aman.
                            </div>
                        </div>
                    </div>

                    {{-- 2. TANGGUNG JAWAB KONTEN --}}
                    <div class="bg-slate-900 border border-slate-800 shadow-xl rounded-[2rem] p-8 md:p-10">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-12 h-12 rounded-2xl bg-indigo-500/10 border border-indigo-500/20 flex items-center justify-center text-indigo-400 font-black text-xl">2</div>
                            <h2 class="text-2xl font-black text-white">Konten Buatan Pengguna</h2>
                        </div>
                        <p class="text-slate-400 leading-relaxed mb-8">Seluruh laporan, testimoni, atau unggahan bukti adalah <strong>tanggung jawab penuh pengunggah</strong>. Kami menerapkan prinsip moderasi yang ketat:</p>
                        
                        <div class="space-y-4">
                            <div class="flex gap-4 p-5 bg-slate-800/30 border border-slate-700 rounded-2xl">
                                <div class="w-10 h-10 rounded-xl bg-teal-500/10 flex items-center justify-center text-teal-400 shrink-0">🛡️</div>
                                <div>
                                    <h4 class="text-slate-100 font-bold mb-1 text-sm uppercase tracking-wide">Notice & Takedown</h4>
                                    <p class="text-sm text-slate-400 leading-relaxed">Kami berhak menghapus konten yang terbukti mengandung fitnah, doxing, atau ujaran kebencian tanpa pemberitahuan sebelumnya.</p>
                                </div>
                            </div>
                            <div class="flex gap-4 p-5 bg-slate-800/30 border border-slate-700 rounded-2xl">
                                <div class="w-10 h-10 rounded-xl bg-teal-500/10 flex items-center justify-center text-teal-400 shrink-0">🔍</div>
                                <div>
                                    <h4 class="text-slate-100 font-bold mb-1 text-sm uppercase tracking-wide">Bukan Validasi Mutlak</h4>
                                    <p class="text-sm text-slate-400 leading-relaxed">Tersedianya laporan di platform ini tidak otomatis memvalidasi kebenaran hukum dari klaim pelapor terhadap pihak ketiga.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- 3. BATASAN PROFESIONAL --}}
                    <div class="bg-slate-900 border border-slate-800 shadow-xl rounded-[2rem] p-8 md:p-10 relative">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-12 h-12 rounded-2xl bg-indigo-500/10 border border-indigo-500/20 flex items-center justify-center text-indigo-400 font-black text-xl">3</div>
                            <h2 class="text-2xl font-black text-white">Bukan Nasihat Profesional</h2>
                        </div>
                        <div class="prose prose-invert prose-sm max-w-none text-slate-400">
                            <p class="mb-4">Seluruh informasi, artikel edukasi, dan kalkulator simulasi yang tersedia di situs ini disediakan <strong>hanya untuk tujuan informasi umum</strong>.</p>
                            <div class="p-6 bg-red-500/5 border border-red-500/10 rounded-2xl border-l-4 border-l-red-500 mb-6">
                                <p class="text-red-200/80 m-0">Informasi ini <strong>tidak boleh dianggap sebagai nasihat hukum, keuangan, atau medis</strong> yang menggantikan konsultasi dengan profesional berlisensi.</p>
                            </div>
                            <p>Keputusan yang Anda ambil berdasarkan konten di situs ini adalah risiko pribadi Anda. Kami sangat menyarankan Anda menghubungi pengacara atau konsultan keuangan resmi untuk masalah spesifik Anda.</p>
                        </div>
                    </div>
                </div>

                {{-- RIGHT COLUMN: ADDITIONAL TERMS --}}
                <div class="lg:col-span-4 space-y-8">
                    
                    {{-- LIMITATION OF LIABILITY --}}
                    <div class="bg-slate-900 border border-indigo-500/30 shadow-[0_0_40px_rgba(79,70,229,0.1)] rounded-[2rem] p-8 overflow-hidden relative group">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-indigo-500/10 rounded-full blur-2xl group-hover:bg-indigo-500/20 transition-colors"></div>
                        <h3 class="text-xl font-black text-white mb-6 flex items-center gap-3">
                            <span class="text-indigo-400">⚠️</span>
                            Batasan Tanggung Jawab
                        </h3>
                        <p class="text-sm text-slate-400 leading-relaxed mb-6">Sepanjang diizinkan hukum, Pengelola tidak bertanggung jawab atas:</p>
                        <ul class="space-y-4">
                            <li class="flex items-start gap-3 text-xs text-slate-300">
                                <div class="mt-1 w-1.5 h-1.5 rounded-full bg-indigo-500 shrink-0"></div>
                                Kerugian langsung atau tidak langsung dari penggunaan platform.
                            </li>
                            <li class="flex items-start gap-3 text-xs text-slate-300">
                                <div class="mt-1 w-1.5 h-1.5 rounded-full bg-indigo-500 shrink-0"></div>
                                Gangguan teknis, malware, atau akses tidak sah oleh pihak ketiga.
                            </li>
                            <li class="flex items-start gap-3 text-xs text-slate-300">
                                <div class="mt-1 w-1.5 h-1.5 rounded-full bg-indigo-500 shrink-0"></div>
                                Akurasi data dari tautan eksternal (OJK, BI, LBH, dll).
                            </li>
                        </ul>
                    </div>

                    {{-- QUICK LINKS / CARDS --}}
                    <div class="bg-slate-900 border border-slate-800 shadow-xl rounded-[2rem] p-8">
                        <h3 class="text-lg font-bold text-white mb-6 uppercase tracking-wider text-sm flex items-center gap-2">
                            <span class="w-1.5 h-6 bg-indigo-500 rounded-full"></span>
                            Ketentuan Lain
                        </h3>
                        <div class="space-y-6">
                            <div>
                                <h4 class="text-slate-200 font-bold text-sm mb-2">Kepatuhan Hukum</h4>
                                <p class="text-xs text-slate-400 leading-relaxed">Kami bekerja sama dengan otoritas jika ada perintah pengadilan resmi yang sah.</p>
                            </div>
                            <div class="pt-6 border-t border-slate-800">
                                <h4 class="text-slate-200 font-bold text-sm mb-2">Perubahan Ketentuan</h4>
                                <p class="text-xs text-slate-400 leading-relaxed">Kami berhak mengubah Disclaimer ini kapan saja. Perubahan berlaku efektif segera setelah diunggah.</p>
                            </div>
                            <div class="pt-6 border-t border-slate-800">
                                <h4 class="text-slate-200 font-bold text-sm mb-2">Kontak Legal</h4>
                                <a href="mailto:legal@pinjolwatch.id" class="text-xs text-indigo-400 hover:text-indigo-300 font-bold flex items-center gap-2">
                                    <span>📧</span> legal@pinjolwatch.id
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- CTA --}}
                    <div class="p-8 bg-gradient-to-br from-indigo-600 to-indigo-800 rounded-[2rem] shadow-2xl shadow-indigo-500/20 text-center relative overflow-hidden group">
                        <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-white/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                        <h4 class="text-white font-black mb-4">Butuh Privasi Lebih?</h4>
                        <p class="text-indigo-100/70 text-sm mb-6">Pelajari bagaimana kami menjaga dan mengamankan data Anda di sistem kami.</p>
                        <a href="{{ route('privacy.policy') }}" class="inline-flex items-center justify-center w-full py-3 bg-white text-indigo-700 font-bold rounded-xl shadow-lg hover:bg-indigo-50 hover:-translate-y-0.5 transition-all">
                            Kebijakan Privasi
                        </a>
                    </div>
                </div>
            </div>

            {{-- FOOTER NOTE --}}
            <div class="bg-slate-950 border border-slate-800 shadow-2xl rounded-[2.5rem] p-10 md:p-14 text-center">
                <div class="max-w-3xl mx-auto">
                    <p class="text-slate-400 leading-relaxed italic text-lg mb-8">
                        "Disclaimer ini adalah bentuk transparansi kami agar PinjolWatch dapat terus melayani sebagai suara rakyat tanpa mengorbankan integritas operasional dan keamanan komunitas."
                    </p>
                    <div class="w-16 h-1 bg-slate-800 mx-auto rounded-full mb-8"></div>
                    <p class="text-xs text-slate-500 uppercase tracking-widest font-bold">
                        Tim Legal PinjolWatch &copy; 2026
                    </p>
                </div>
            </div>

        </div>
    </div>
</x-frontend-layout>
