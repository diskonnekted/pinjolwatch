<div class="py-12 bg-[#020617] min-h-screen text-slate-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- TOP HEADER BAR --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
            <div>
                <h1 class="text-4xl font-black text-white tracking-tighter uppercase italic">
                    <span class="text-teal-500">Pusat</span> Kontrol
                </h1>
                <p class="text-slate-500 font-bold text-xs uppercase tracking-[0.3em] mt-1">Dashboard Penyintas & Pemulihan</p>
            </div>
            
            <div class="flex items-center gap-3 bg-slate-900/40 border border-slate-800/50 p-2 rounded-2xl backdrop-blur-md">
                <div class="px-4 py-2 bg-teal-500/10 border border-teal-500/20 rounded-xl">
                    <div class="text-[10px] text-slate-500 font-black uppercase tracking-widest leading-none mb-1">Status Akun</div>
                    <div class="text-xs font-black text-teal-400 uppercase italic">Terverifikasi</div>
                </div>
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-slate-800 to-slate-950 border border-slate-800 flex items-center justify-center text-xl shadow-2xl">
                    {{ substr($nickname ?: $name, 0, 1) }}
                </div>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            
            {{-- SIDEBAR NAVIGATION --}}
            <aside class="lg:w-64 shrink-0">
                <nav class="space-y-2 sticky top-24">
                    <button wire:click="setTab('overview')" 
                        class="w-full flex items-center justify-between px-5 py-4 rounded-2xl font-black text-xs uppercase tracking-widest transition-all duration-300 group {{ $activeTab === 'overview' ? 'bg-teal-600 text-white shadow-[0_0_20px_rgba(13,148,136,0.3)]' : 'text-slate-500 hover:bg-slate-900/50 hover:text-slate-300' }}">
                        <span class="flex items-center gap-3">
                            <span class="text-lg opacity-70 group-hover:scale-110 transition-transform">🏠</span> Ringkasan
                        </span>
                        @if($activeTab === 'overview') <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span> @endif
                    </button>

                    <button wire:click="setTab('reports')" 
                        class="w-full flex items-center justify-between px-5 py-4 rounded-2xl font-black text-xs uppercase tracking-widest transition-all duration-300 group {{ $activeTab === 'reports' ? 'bg-teal-600 text-white shadow-[0_0_20px_rgba(13,148,136,0.3)]' : 'text-slate-500 hover:bg-slate-900/50 hover:text-slate-300' }}">
                        <span class="flex items-center gap-3">
                            <span class="text-lg opacity-70 group-hover:scale-110 transition-transform">📄</span> Laporan
                        </span>
                        @if($activeTab === 'reports') <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span> @endif
                    </button>

                    <button wire:click="setTab('security')" 
                        class="w-full flex items-center justify-between px-5 py-4 rounded-2xl font-black text-xs uppercase tracking-widest transition-all duration-300 group {{ $activeTab === 'security' ? 'bg-teal-600 text-white shadow-[0_0_20px_rgba(13,148,136,0.3)]' : 'text-slate-500 hover:bg-slate-900/50 hover:text-slate-300' }}">
                        <span class="flex items-center gap-3">
                            <span class="text-lg opacity-70 group-hover:scale-110 transition-transform">🛡️</span> Keamanan
                        </span>
                        @if($activeTab === 'security') <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span> @endif
                    </button>

                    <button wire:click="setTab('finance')" 
                        class="w-full flex items-center justify-between px-5 py-4 rounded-2xl font-black text-xs uppercase tracking-widest transition-all duration-300 group {{ $activeTab === 'finance' ? 'bg-teal-600 text-white shadow-[0_0_20px_rgba(13,148,136,0.3)]' : 'text-slate-500 hover:bg-slate-900/50 hover:text-slate-300' }}">
                        <span class="flex items-center gap-3">
                            <span class="text-lg opacity-70 group-hover:scale-110 transition-transform">💰</span> Ekonomi
                        </span>
                        @if($activeTab === 'finance') <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span> @endif
                    </button>

                    <button wire:click="setTab('mental')" 
                        class="w-full flex items-center justify-between px-5 py-4 rounded-2xl font-black text-xs uppercase tracking-widest transition-all duration-300 group {{ $activeTab === 'mental' ? 'bg-teal-600 text-white shadow-[0_0_20px_rgba(13,148,136,0.3)]' : 'text-slate-500 hover:bg-slate-900/50 hover:text-slate-300' }}">
                        <span class="flex items-center gap-3">
                            <span class="text-lg opacity-70 group-hover:scale-110 transition-transform">🧠</span> Mental
                        </span>
                        @if($activeTab === 'mental') <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span> @endif
                    </button>

                    <button wire:click="setTab('messages')" 
                        class="w-full flex items-center justify-between px-5 py-4 rounded-2xl font-black text-xs uppercase tracking-widest transition-all duration-300 group {{ $activeTab === 'messages' ? 'bg-teal-600 text-white shadow-[0_0_20px_rgba(13,148,136,0.3)]' : 'text-slate-500 hover:bg-slate-900/50 hover:text-slate-300' }}">
                        <span class="flex items-center gap-3">
                            <span class="text-lg opacity-70 group-hover:scale-110 transition-transform">✉️</span> Pesan
                        </span>
                        @if($activeTab === 'messages') <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span> @endif
                    </button>

                    <div class="h-px bg-slate-800/50 my-6 mx-4"></div>

                    <button wire:click="setTab('settings')" 
                        class="w-full flex items-center gap-3 px-5 py-4 rounded-2xl font-black text-xs uppercase tracking-widest transition-all duration-300 group {{ $activeTab === 'settings' ? 'bg-slate-800 text-white' : 'text-slate-600 hover:text-slate-400' }}">
                        <span class="text-lg opacity-70 group-hover:rotate-45 transition-transform">⚙️</span> Pengaturan
                    </button>

                    <div class="mt-8">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full px-5 py-4 bg-red-500/5 border border-red-500/10 text-red-500/60 font-black text-[10px] uppercase tracking-[0.2em] rounded-2xl hover:bg-red-500 hover:text-white transition-all">
                                Keluar Sistem
                            </button>
                        </form>
                    </div>
                </nav>
            </aside>

            {{-- MAIN CONTENT AREA --}}
            <main class="flex-grow min-w-0">
                
                {{-- TAB: OVERVIEW --}}
                @if($activeTab === 'overview')
                <div class="space-y-6 animate-in fade-in slide-in-from-bottom-4 duration-700">
                    
                    {{-- Hero Welcome --}}
                    <div class="group relative bg-slate-900 border border-slate-800 rounded-[2.5rem] p-10 overflow-hidden shadow-2xl">
                        <div class="absolute -right-20 -top-20 w-80 h-80 bg-teal-500/10 rounded-full blur-[100px] group-hover:bg-teal-500/20 transition-colors duration-700"></div>
                        <div class="relative z-10">
                            <div class="inline-flex items-center gap-2 px-3 py-1 bg-teal-500/10 border border-teal-500/20 rounded-full mb-6">
                                <span class="w-2 h-2 rounded-full bg-teal-500 animate-pulse"></span>
                                <span class="text-[10px] font-black text-teal-400 uppercase tracking-widest">Sesi Aktif: Aman</span>
                            </div>
                            <h2 class="text-5xl font-black text-white italic uppercase tracking-tighter leading-tight mb-4">
                                Selamat Datang,<br/>
                                <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-emerald-500">{{ $nickname ?: $name }}</span>
                            </h2>
                            <p class="text-slate-400 text-lg font-medium max-w-xl leading-relaxed">
                                Keamanan data Anda adalah prioritas kami. Gunakan alat di bawah ini untuk memulai langkah pemulihan Anda hari ini.
                            </p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        {{-- Stats Cards --}}
                        <div class="md:col-span-2 grid grid-cols-2 gap-6">
                            <div class="bg-slate-900/50 border border-slate-800/50 rounded-[2rem] p-8 hover:border-teal-500/30 transition-all duration-300 group">
                                <div class="text-[10px] text-slate-500 font-black uppercase tracking-widest mb-2 group-hover:text-teal-400 transition-colors">Total Laporan</div>
                                <div class="text-4xl font-black text-white italic tracking-tighter">{{ count($reports) }}</div>
                                <div class="mt-4 h-1 bg-slate-800 rounded-full overflow-hidden">
                                    <div class="h-full bg-teal-500 w-1/3"></div>
                                </div>
                            </div>
                            <div class="bg-slate-900/50 border border-slate-800/50 rounded-[2rem] p-8 hover:border-blue-500/30 transition-all duration-300 group">
                                <div class="text-[10px] text-slate-500 font-black uppercase tracking-widest mb-2 group-hover:text-blue-400 transition-colors">Alat Keamanan</div>
                                <div class="text-4xl font-black text-white italic tracking-tighter">12</div>
                                <div class="mt-4 h-1 bg-slate-800 rounded-full overflow-hidden">
                                    <div class="h-full bg-blue-500 w-2/3"></div>
                                </div>
                            </div>
                            
                            {{-- Recovery Priority --}}
                            <div class="col-span-2 bg-slate-900 border border-slate-800 rounded-[2rem] p-8 shadow-xl">
                                <h4 class="text-xs font-black text-white uppercase tracking-[0.2em] mb-8 flex items-center gap-3">
                                    <span class="w-8 h-px bg-teal-500"></span>
                                    Indikator Pemulihan
                                </h4>
                                <div class="space-y-8">
                                    <div>
                                        <div class="flex justify-between text-[10px] font-black mb-3 tracking-widest">
                                            <span class="text-slate-500 uppercase italic">Kesehatan Mental</span>
                                            <span class="text-teal-400">85% OPTIMAL</span>
                                        </div>
                                        <div class="h-1.5 bg-slate-800/50 rounded-full overflow-hidden">
                                            <div class="h-full bg-gradient-to-r from-teal-600 to-teal-400 rounded-full" style="width: 85%"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex justify-between text-[10px] font-black mb-3 tracking-widest">
                                            <span class="text-slate-500 uppercase italic">Stabilitas Ekonomi</span>
                                            <span class="text-blue-400">35% BERTAHAN</span>
                                        </div>
                                        <div class="h-1.5 bg-slate-800/50 rounded-full overflow-hidden">
                                            <div class="h-full bg-gradient-to-r from-blue-600 to-blue-400 rounded-full" style="width: 35%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- SOS Action --}}
                        <div class="bg-gradient-to-br from-red-600 to-rose-700 rounded-[2.5rem] p-10 flex flex-col justify-between shadow-[0_20px_50px_rgba(225,29,72,0.3)] relative overflow-hidden group">
                            <div class="absolute -right-4 -bottom-4 text-white/10 text-9xl font-black italic select-none group-hover:scale-110 transition-transform duration-700">SOS</div>
                            <div class="relative z-10">
                                <h4 class="text-white font-black uppercase text-xs tracking-widest mb-2 opacity-80">Eskalasi Teror?</h4>
                                <p class="text-white/80 text-sm font-bold leading-relaxed mb-8">
                                    Tekan tombol di bawah untuk instruksi darurat dan menghubungi kontak tepercaya secara otomatis.
                                </p>
                            </div>
                            <button class="relative z-10 w-full py-5 bg-white text-red-600 font-black rounded-2xl shadow-2xl hover:bg-slate-100 hover:-translate-y-1 transition-all active:scale-95 uppercase tracking-widest text-xs">
                                Aktifkan Mode SOS
                            </button>
                        </div>
                    </div>
                </div>
                @endif

                {{-- TAB: REPORTS --}}
                @if($activeTab === 'reports')
                <div class="space-y-8 animate-in fade-in slide-in-from-right-4 duration-700">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div>
                            <h3 class="text-3xl font-black text-white italic uppercase tracking-tighter">Riwayat Tiket</h3>
                            <p class="text-slate-500 font-bold text-[10px] uppercase tracking-widest mt-1">Laporan Anda yang sedang dalam proses</p>
                        </div>
                        <a href="{{ route('report') }}" class="inline-flex items-center justify-center px-8 py-4 bg-teal-600 text-white text-xs font-black rounded-2xl hover:bg-teal-500 transition-all tracking-widest shadow-[0_10px_30px_rgba(13,148,136,0.3)] group">
                            BUAT LAPORAN BARU
                            <span class="ml-2 group-hover:translate-x-1 transition-transform">→</span>
                        </a>
                    </div>
                    
                    <div class="grid grid-cols-1 gap-4">
                        @forelse($reports as $report)
                        <div class="group bg-slate-900 border border-slate-800 rounded-[2rem] p-6 hover:border-teal-500/50 transition-all duration-500 shadow-xl">
                            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                                <div class="flex items-center gap-6">
                                    <div class="w-16 h-16 rounded-2xl bg-slate-800 border border-slate-700 flex flex-col items-center justify-center group-hover:bg-teal-500/10 group-hover:border-teal-500/20 transition-colors">
                                        <div class="text-[10px] text-slate-500 font-black uppercase leading-none mb-1 group-hover:text-teal-400">{{ $report->created_at->format('M') }}</div>
                                        <div class="text-xl font-black text-white italic leading-none group-hover:text-teal-400">{{ $report->created_at->format('d') }}</div>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-3 mb-1">
                                            <span class="font-mono text-teal-400 font-black">#{{ substr($report->ticket_id, 0, 8) }}</span>
                                            @php
                                                $statusColors = [
                                                    'received'  => 'bg-amber-500/10 text-amber-400 border-amber-500/20',
                                                    'verified'  => 'bg-blue-500/10 text-blue-400 border-blue-500/20',
                                                    'forwarded' => 'bg-purple-500/10 text-purple-400 border-purple-500/20',
                                                    'resolved'  => 'bg-teal-500/10 text-teal-400 border-teal-500/20',
                                                ];
                                                $statusLabels = [
                                                    'received'  => 'Diterima',
                                                    'verified'  => 'Terverifikasi',
                                                    'forwarded' => 'Diteruskan',
                                                    'resolved'  => 'Selesai',
                                                ];
                                                $sc = $statusColors[$report->status] ?? 'bg-slate-500/10 text-slate-400 border-slate-500/20';
                                                $sl = $statusLabels[$report->status] ?? $report->status;
                                            @endphp
                                            <span class="px-3 py-0.5 rounded-full text-[9px] font-black uppercase tracking-wider border {{ $sc }}">
                                                {{ $sl }}
                                            </span>
                                        </div>
                                        <h4 class="text-white font-black uppercase text-sm group-hover:text-teal-400 transition-colors">{{ $report->app_name ?: 'Pinjol Tidak Teridentifikasi' }}</h4>
                                    </div>
                                </div>
                                
                                <div class="flex items-center gap-4">
                                    <a href="{{ route('report.show', $report->ticket_id) }}" class="px-6 py-3 bg-slate-800 text-slate-400 font-black text-[10px] rounded-xl uppercase tracking-widest hover:bg-teal-600 hover:text-white transition-all">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="bg-slate-900 border border-slate-800 rounded-[2.5rem] p-20 text-center">
                            <div class="text-6xl mb-6 grayscale opacity-30">📄</div>
                            <h4 class="text-slate-400 font-black uppercase tracking-widest">Belum ada laporan</h4>
                            <p class="text-slate-600 text-sm mt-2">Semua laporan Anda akan muncul secara anonim di sini.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
                @endif

                {{-- TAB: SECURITY --}}
                @if($activeTab === 'security')
                <div class="space-y-8 animate-in fade-in slide-in-from-right-4 duration-700">
                    <div>
                        <h3 class="text-3xl font-black text-white italic uppercase tracking-tighter">Perisai Digital</h3>
                        <p class="text-slate-500 font-bold text-[10px] uppercase tracking-widest mt-1">Alat perlindungan privasi proaktif</p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-slate-900 border border-slate-800 rounded-[2.5rem] p-8 shadow-xl">
                            <h4 class="font-black text-white mb-8 uppercase text-xs tracking-widest flex items-center gap-4">
                                <span class="w-10 h-10 bg-indigo-500/10 text-indigo-400 rounded-xl flex items-center justify-center text-xl">💬</span>
                                Template Respon Taktis & Hukum
                            </h4>
                            <div class="space-y-4">
                                @php
                                    $templates = [
                                        'Ancaman Sebar Data' => [
                                            'text' => "Selamat (pagi/siang). Saya [Nama Anda], penerima pinjaman. Saya memahami kewajiban saya. Namun, tindakan Anda yang mengancam akan menyebarkan data pribadi saya ke seluruh kontak saya adalah pelanggaran hukum serius. Tindakan tersebut melanggar Pasal 27 ayat (4) dan Pasal 29 UU No. 19 Tahun 2016 tentang Informasi dan Transaksi Elektronik (ITE) mengenai pemerasan dan pengancaman, serta UU No. 27 Tahun 2022 tentang Pelindungan Data Pribadi (PDP). Jika Anda melanjutkan, saya tidak akan segan melaporkan Anda ke pihak Kepolisian dengan bukti rekaman/screenshot ini, yang dapat berakibat pidana penjara hingga 6 tahun dan denda hingga Rp 1 Miliar. Saya meminta komunikasi selanjutnya dilakukan secara profesional melalui email resmi.",
                                            'tags' => ['UU ITE', 'UU PDP', 'Sebar Data']
                                        ],
                                        'Ancaman Kunjungan DC' => [
                                            'text' => "Terima kasih atas informasinya. Perlu saya sampaikan bahwa kunjungan penagihan lapangan harus mematuhi aturan OJK dan AFPI, termasuk membawa surat tugas resmi, kartu identitas, dan sertifikasi penagihan. Jika Anda datang dengan cara intimidatif, memaksa masuk, atau mempermalukan saya di lingkungan sosial/kerja, tindakan tersebut dapat dikategorikan sebagai perbuatan tidak menyenangkan (Pasal 335 KUHP). Saya bersedia kooperatif jika prosesnya sesuai hukum.",
                                            'tags' => ['KUHP', 'Aturan OJK', 'Intimidasi']
                                        ],
                                        'Ancaman Edit Foto Asusila' => [
                                            'text' => "Tindakan Anda yang mengancam akan mengedit dan menyebarkan foto saya menjadi konten asusila adalah tindak pidana berat. Ini melanggar Pasal 27 ayat (1) UU ITE tentang muatan kesusilaan dan UU No. 12 Tahun 2022 tentang Tindak Pidana Kekerasan Seksual (TPKS). Bukti ini sudah saya simpan. Jika ancaman ini dilanjutkan, saya akan segera membuat Laporan Polisi. Pelaku dapat dijerat hukuman penjara hingga 12 tahun. Hentikan segera.",
                                            'tags' => ['UU ITE', 'UU TPKS', 'Pelecehan']
                                        ],
                                        'Ancaman Kekerasan/Pembunuhan' => [
                                            'text' => "Ancaman kekerasan fisik atau pembunuhan yang Anda sampaikan adalah pelanggaran pidana yang sangat serius berdasarkan Pasal 336 KUHP dan/atau Pasal 368 KUHP tentang pengancaman dan pemerasan dengan kekerasan. Seluruh bukti digital (rekaman suara, chat) ini akan saya serahkan langsung ke pihak Kepolisian hari ini juga. Saya tidak akan berkomunikasi lebih lanjut dan menyerahkan proses ini sepenuhnya kepada aparat penegak hukum.",
                                            'tags' => ['Sangat Serius', 'KUHP', 'Lapor Polisi']
                                        ],
                                        'Telepon di Luar Jam Wajar' => [
                                            'text' => "Sesuai dengan pedoman dari OJK dan AFPI, proses penagihan hanya boleh dilakukan pada hari kerja antara pukul 08.00 hingga 20.00 waktu setempat. Anda menghubungi saya di luar jam tersebut. Ini adalah pelanggaran prosedur. Harap hubungi kembali pada jam kerja yang telah ditentukan.",
                                            'tags' => ['Aturan OJK', 'Prosedural']
                                        ],
                                        'Minta Bayar ke Rekening Pribadi' => [
                                            'text' => "Saya tidak akan melakukan transfer pembayaran ke rekening atas nama pribadi. Sesuai prosedur, semua pembayaran harus ditujukan ke Virtual Account (VA) resmi perusahaan yang tertera di aplikasi. Permintaan transfer ke rekening pribadi merupakan indikasi penipuan atau penggelapan dan akan saya laporkan. Mohon berikan instruksi pembayaran yang sah.",
                                            'tags' => ['Penipuan', 'Prosedural']
                                        ]
                                    ];
                                @endphp

                                @foreach($templates as $title => $data)
                                <div x-data="{ open: false }" class="bg-slate-950 border border-slate-800/50 rounded-2xl overflow-hidden group">
                                    <button @click="open = !open" class="w-full px-6 py-4 flex justify-between items-center hover:bg-slate-800 transition-all text-left">
                                        <div class="flex-col">
                                             <span class="font-black text-xs text-slate-400 uppercase tracking-widest group-hover:text-white">{{ $title }}</span>
                                             <div class="flex items-center gap-1.5 mt-2">
                                                @foreach($data['tags'] as $tag)
                                                    @php
                                                        $tagColor = 'bg-slate-700/50 text-slate-400';
                                                        if (str_contains($tag, 'UU') || str_contains($tag, 'KUHP')) $tagColor = 'bg-indigo-500/10 text-indigo-400';
                                                        if (str_contains($tag, 'Serius')) $tagColor = 'bg-red-500/10 text-red-400';
                                                    @endphp
                                                    <span class="px-2 py-0.5 rounded-full text-[8px] font-bold uppercase tracking-wider {{ $tagColor }}">{{$tag}}</span>
                                                @endforeach
                                             </div>
                                        </div>
                                        <span x-text="open ? '−' : '+'" class="text-2xl text-slate-600 font-bold self-start mt-1"></span>
                                    </button>
                                    <div x-show="open" x-collapse class="p-6 border-t border-slate-800 bg-slate-900/50">
                                        <p class="text-xs text-slate-300 font-semibold italic mb-6 leading-relaxed whitespace-pre-line">"{{ $data['text'] }}"</p>
                                        <button 
                                            x-data="{ copied: false }" 
                                            @click="navigator.clipboard.writeText('{{ addslashes($data['text']) }}'); copied = true; setTimeout(() => copied = false, 2000);"
                                            class="w-full py-3 bg-teal-600/10 text-teal-400 font-black text-[10px] uppercase tracking-widest rounded-xl hover:bg-teal-600 hover:text-white transition-all"
                                            :class="{ 'bg-teal-500 text-white': copied }">
                                            <span x-show="!copied">Salin Teks</span>
                                            <span x-show="copied">✅ Tersalin!</span>
                                        </button>
                                    </div>
                                </div>
                                @endforeach

                                <div class="pt-4 mt-6 border-t border-slate-800/50">
                                     <h5 class="font-black text-white mb-4 uppercase text-xs tracking-widest flex items-center gap-4">
                                        <span class="w-10 h-10 bg-rose-500/10 text-rose-400 rounded-xl flex items-center justify-center text-xl">🔥</span>
                                        Template Bantahan Argumen DC
                                    </h5>
                                </div>

                                @php
                                    $counterTemplates = [
                                        'Bantahan: "Anda Sudah Setuju Akses Data"' => [
                                            'text' => "Persetujuan yang saya berikan adalah untuk proses verifikasi pinjaman, BUKAN untuk tindakan penagihan yang melanggar hukum seperti penyebaran data atau teror ke seluruh kontak saya. Menurut UU No. 27 Tahun 2022 tentang Pelindungan Data Pribadi (UU PDP), pemrosesan data harus sesuai dengan tujuan awal data itu diberikan. Menggunakan data saya untuk meneror pihak ketiga yang tidak terkait dengan perjanjian utang adalah penyalahgunaan data dan tindak pidana.",
                                            'tags' => ['UU PDP', 'Tujuan Pemrosesan']
                                        ],
                                        'Bantahan: "Aplikasi Anda ILEGAL"' => [
                                            'text' => "Menurut Peraturan OJK (POJK No. 10/POJK.05/2022), penyelenggara fintech lending yang legal hanya diizinkan mengakses 'Camilan' (Camera, Microphone, Location). Tindakan aplikasi Anda yang mengakses seluruh daftar kontak saya adalah ciri-ciri pinjol ILEGAL. Persetujuan terhadap tindakan ilegal secara otomatis tidak sah. Semua tindakan Anda yang bersumber dari akses ilegal ini akan menjadi bukti utama dalam laporan saya ke Satgas Waspada Investasi (SWI) dan Kepolisian.",
                                            'tags' => ['OJK', 'Ilegal', 'Akses Kontak']
                                        ],
                                        'Bantahan: "Kontrak Tidak Melegalkan Pidana"' => [
                                            'text' => "Sekalipun ada persetujuan dalam syarat dan ketentuan, tidak ada satu pun perjanjian perdata yang bisa melegalkan tindak pidana. Ancaman, pemerasan, dan pencemaran nama baik yang Anda lakukan adalah kejahatan yang diatur dalam KUHP dan UU ITE. Persetujuan saya tidak memberikan Anda hak untuk melakukan kejahatan. Fokus pada utang saya, bukan pada tindakan kriminal.",
                                            'tags' => ['Perdata vs Pidana', 'UU ITE']
                                        ],
                                        'Bantahan: "Persetujuan Terpaksa"' => [
                                            'text' => "Persetujuan yang diberikan pada aplikasi pinjol seringkali bersifat 'take it or leave it' dalam kondisi mendesak. Menurut hukum, persetujuan yang diberikan di bawah tekanan atau tanpa pilihan yang seimbang dapat dianggap tidak sah. Yang terpenting sekarang adalah cara penagihan Anda yang melanggar hukum, bukan persetujuan yang problematis tersebut.",
                                            'tags' => ['Duress', 'Tidak Sah']
                                        ],
                                    ];
                                @endphp

                                @foreach($counterTemplates as $title => $data)
                                <div x-data="{ open: false }" class="bg-slate-950 border border-slate-800/50 rounded-2xl overflow-hidden group">
                                    <button @click="open = !open" class="w-full px-6 py-4 flex justify-between items-center hover:bg-slate-800 transition-all text-left">
                                        <div class="flex-col">
                                             <span class="font-black text-xs text-rose-400 uppercase tracking-widest group-hover:text-white">{{ $title }}</span>
                                             <div class="flex items-center gap-1.5 mt-2">
                                                @foreach($data['tags'] as $tag)
                                                    <span class="px-2 py-0.5 rounded-full text-[8px] font-bold uppercase tracking-wider bg-rose-500/10 text-rose-400">{{$tag}}</span>
                                                @endforeach
                                             </div>
                                        </div>
                                        <span x-text="open ? '−' : '+'" class="text-2xl text-slate-600 font-bold self-start mt-1"></span>
                                    </button>
                                    <div x-show="open" x-collapse class="p-6 border-t border-slate-800 bg-slate-900/50">
                                        <p class="text-xs text-slate-300 font-semibold italic mb-6 leading-relaxed whitespace-pre-line">"{{ $data['text'] }}"</p>
                                        <button 
                                            x-data="{ copied: false }" 
                                            @click="navigator.clipboard.writeText('{{ addslashes($data['text']) }}'); copied = true; setTimeout(() => copied = false, 2000);"
                                            class="w-full py-3 bg-rose-600/10 text-rose-400 font-black text-[10px] uppercase tracking-widest rounded-xl hover:bg-rose-600 hover:text-white transition-all"
                                            :class="{ 'bg-rose-500 text-white': copied }">
                                            <span x-show="!copied">Salin Teks Bantahan</span>
                                            <span x-show="copied">✅ Tersalin!</span>
                                        </button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="bg-slate-900 border border-slate-800 rounded-[2.5rem] p-8 shadow-xl flex flex-col">
                            <h4 class="font-black text-white mb-8 uppercase text-xs tracking-widest flex items-center gap-4">
                                <span class="w-10 h-10 bg-amber-500/10 text-amber-400 rounded-xl flex items-center justify-center text-xl">📓</span>
                                Log Insiden Terenkripsi
                            </h4>
                            <textarea class="flex-grow bg-slate-950 border-slate-800 rounded-2xl text-sm text-slate-300 p-6 focus:ring-teal-500 focus:border-teal-500 mb-6 placeholder:text-slate-700 font-bold" rows="6" placeholder="Tulis rincian ancaman baru di sini..."></textarea>
                            <button class="w-full py-4 bg-slate-800 text-slate-200 font-black rounded-2xl text-xs uppercase tracking-[0.2em] hover:bg-slate-700 transition-all shadow-xl">
                                Simpan ke Jurnal Privat
                            </button>
                        </div>
                    </div>
                </div>
                @endif

                {{-- TAB: FINANCE --}}
                @if($activeTab === 'finance')
                <div class="space-y-8 animate-in fade-in slide-in-from-bottom-4 duration-700">
                    <div>
                        <h3 class="text-3xl font-black text-white italic uppercase tracking-tighter">Peta Jalan Pemulihan Ekonomi</h3>
                        <p class="text-slate-500 font-bold text-[10px] uppercase tracking-widest mt-1">Langkah-langkah strategis untuk kembali stabil</p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        {{-- Main Content --}}
                        <div class="lg:col-span-2 space-y-6">
                            <div class="bg-slate-900 border border-slate-800 rounded-[2.5rem] p-8 shadow-xl">
                                <h4 class="font-black text-white mb-6 uppercase text-xs tracking-widest flex items-center gap-4">
                                    <span class="w-10 h-10 bg-green-500/10 text-green-400 rounded-xl flex items-center justify-center text-xl">🏥</span>
                                    Pertolongan Pertama Keuangan
                                </h4>
                                <ol class="list-decimal list-inside space-y-4 text-slate-300 font-semibold text-sm">
                                    <li><strong class="text-white">STOP Pembayaran ke Pinjol ILEGAL.</strong> Sesuai anjuran resmi Pemerintah (Menkominfo & OJK), utang pada pinjol ilegal tidak perlu dibayar. Fokuskan dana Anda untuk kebutuhan pokok dan utang legal.</li>
                                    <li><strong class="text-white">Buat Anggaran Darurat.</strong> Tulis semua pemasukan dan pengeluaran wajib (makan, sewa, listrik, sekolah anak). Lihat berapa sisa dana yang riil Anda miliki.</li>
                                    <li><strong class="text-white">Identifikasi & Prioritaskan Utang LEGAL.</strong> Buat daftar utang legal Anda (bank, pinjol legal, cicilan lain). Urutkan dari yang bunganya paling tinggi atau nominalnya paling kecil.</li>
                                    <li><strong class="text-white">Hubungi Kreditor Legal.</strong> Jangan menghindar. Jelaskan kondisi Anda dengan jujur dan minta opsi restrukturisasi atau keringanan. Gunakan template negosiasi yang kami sediakan.</li>
                                </ol>
                            </div>
                            
                            <div class="bg-slate-900 border border-slate-800 rounded-[2.5rem] p-8 shadow-xl">
                                 <h4 class="font-black text-white mb-6 uppercase text-xs tracking-widest flex items-center gap-4">
                                    <span class="w-10 h-10 bg-blue-500/10 text-blue-400 rounded-xl flex items-center justify-center text-xl">⚖️</span>
                                    Strategi Pelunasan Utang Legal
                                </h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                    <div>
                                        <h5 class="font-bold text-blue-400 mb-2">Metode Bola Salju (Snowball)</h5>
                                        <p class="text-xs text-slate-400 leading-relaxed">Fokus melunasi utang dengan nominal terkecil lebih dulu. Kemenangan kecil ini akan memberikan motivasi psikologis untuk terus lanjut melunasi utang-utang berikutnya yang lebih besar.</p>
                                    </div>
                                     <div>
                                        <h5 class="font-bold text-purple-400 mb-2">Metode Longsoran (Avalanche)</h5>
                                        <p class="text-xs text-slate-400 leading-relaxed">Fokus melunasi utang dengan bunga tertinggi lebih dulu. Secara matematis, metode ini lebih efisien dan menghemat lebih banyak uang dalam jangka panjang, meskipun butuh disiplin lebih tinggi.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Sidebar --}}
                        <div class="space-y-6">
                            <div class="bg-slate-900 border border-slate-800 rounded-[2.5rem] p-8 shadow-xl">
                                <h4 class="font-black text-white mb-6 uppercase text-xs tracking-widest">Alat & Sumber Daya</h4>
                                <div class="space-y-3">
                                    <a href="{{ route('panduan.negosiasi-utang') }}" class="flex items-center gap-3 p-4 bg-slate-800/50 rounded-xl hover:bg-slate-800 transition-colors">
                                        <span class="text-lg">📄</span>
                                        <span class="text-xs font-bold text-slate-300">Template Negosiasi Utang</span>
                                    </a>
                                    <a href="{{ route('panduan.cek-slik') }}" class="flex items-center gap-3 p-4 bg-slate-800/50 rounded-xl hover:bg-slate-800 transition-colors">
                                        <span class="text-lg">📊</span>
                                        <span class="text-xs font-bold text-slate-300">Cara Cek Skor Kredit (SLIK)</span>
                                    </a>
                                     <a href="{{ route('panduan.perencanaan-keuangan') }}" class="flex items-center gap-3 p-4 bg-slate-800/50 rounded-xl hover:bg-slate-800 transition-colors">
                                        <span class="text-lg">💡</span>
                                        <span class="text-xs font-bold text-slate-300">Panduan Perencanaan Keuangan</span>
                                    </a>
                                </div>
                            </div>
                            <div class="bg-gradient-to-br from-green-600 to-emerald-700 rounded-[2.5rem] p-8 text-center shadow-[0_20px_50px_rgba(16,185,129,0.2)]">
                                <div class="text-4xl mb-4">💡</div>
                                <h4 class="text-white font-black text-lg mb-2">Mulai Bangun Dana Darurat</h4>
                                <p class="text-white/70 text-xs mb-6">Mulai dari Rp 10.000 per hari. Konsistensi lebih penting daripada jumlah. Ini adalah benteng Anda di masa depan.</p>
                                <a href="{{ route('panduan.dana-darurat') }}" class="w-full block py-3 bg-white text-green-700 font-black rounded-xl text-xs uppercase tracking-widest hover:bg-slate-100 transition-all">Pelajari Caranya</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                {{-- TAB: MENTAL --}}
                @if($activeTab === 'mental')
                <div class="space-y-8 animate-in fade-in slide-in-from-bottom-4 duration-700">
                     <div>
                        <h3 class="text-3xl font-black text-white italic uppercase tracking-tighter">Ruang Tenang & Pemulihan Jiwa</h3>
                        <p class="text-slate-500 font-bold text-[10px] uppercase tracking-widest mt-1">Alat bantu untuk mengelola stres dan kecemasan</p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        {{-- Main Content --}}
                        <div class="lg:col-span-2 space-y-6">
                            <div class="bg-slate-900 border border-slate-800 rounded-[2.5rem] p-8 shadow-xl">
                                <h4 class="font-black text-white mb-6 uppercase text-xs tracking-widest flex items-center gap-4">
                                    <span class="w-10 h-10 bg-cyan-500/10 text-cyan-400 rounded-xl flex items-center justify-center text-xl">🧘</span>
                                    Pertolongan Pertama Mental
                                </h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="bg-slate-800/50 p-6 rounded-2xl">
                                        <h5 class="font-bold text-cyan-400 mb-2">Teknik Grounding 5-4-3-2-1</h5>
                                        <p class="text-xs text-slate-400 leading-relaxed">Saat panik menyerang, paksa pikiran kembali ke saat ini. Sebutkan dalam hati: <br>• <strong>5</strong> benda yang Anda lihat <br>• <strong>4</strong> suara yang Anda dengar <br>• <strong>3</strong> benda yang bisa Anda sentuh <br>• <strong>2</strong> bau yang bisa Anda cium <br>• <strong>1</strong> hal yang bisa Anda rasakan.</p>
                                    </div>
                                    <div class="bg-slate-800/50 p-6 rounded-2xl">
                                        <h5 class="font-bold text-cyan-400 mb-2">Pernapasan Kotak (Box Breathing)</h5>
                                        <p class="text-xs text-slate-400 leading-relaxed">Untuk meredakan detak jantung dan menenangkan sistem saraf: <br>• Tarik napas perlahan selama <strong>4</strong> detik <br>• Tahan napas selama <strong>4</strong> detik <br>• Hembuskan napas perlahan selama <strong>4</strong> detik <br>• Tahan lagi selama <strong>4</strong> detik. Ulangi.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-slate-900 border border-slate-800 rounded-[2.5rem] p-8 shadow-xl">
                                 <h4 class="font-black text-white mb-6 uppercase text-xs tracking-widest flex items-center gap-4">
                                    <span class="w-10 h-10 bg-violet-500/10 text-violet-400 rounded-xl flex items-center justify-center text-xl">✨</span>
                                    Mengubah Pola Pikir (Cognitive Reframing)
                                </h4>
                                 <div class="space-y-4">
                                    <div class="p-4 bg-slate-800/50 rounded-lg">
                                        <p class="text-sm font-bold text-slate-300">Ganti pikiran: <span class="text-red-400">"Saya aib keluarga."</span></p>
                                        <p class="text-sm font-semibold text-slate-300">Menjadi: <span class="text-green-400">"Saya adalah korban kejahatan finansial, dan saya sedang berjuang untuk bangkit."</span></p>
                                    </div>
                                    <div class="p-4 bg-slate-800/50 rounded-lg">
                                        <p class="text-sm font-bold text-slate-300">Ganti pikiran: <span class="text-red-400">"Hidup saya sudah hancur."</span></p>
                                        <p class="text-sm font-semibold text-slate-300">Menjadi: <span class="text-green-400">"Saya sedang berada di titik terendah, tapi ini adalah kesempatan untuk membangun kembali hidup yang lebih kuat."</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Sidebar --}}
                        <div class="space-y-6">
                             <div class="bg-gradient-to-br from-cyan-600 to-blue-700 rounded-[2.5rem] p-8 text-center shadow-[0_20px_50px_rgba(16,185,129,0.2)]">
                                <div class="text-4xl mb-4">❤️‍🩹</div>
                                <h4 class="text-white font-black text-lg mb-2">Anda Tidak Sendiri</h4>
                                <p class="text-white/70 text-xs mb-6">Merasa cemas atau putus asa adalah hal wajar. Lakukan tes singkat untuk memahami kondisi Anda, atau temukan bantuan profesional sekarang.</p>
                                <a href="{{ route('quiz') }}" class="w-full block py-3 bg-white text-cyan-700 font-black rounded-xl text-xs uppercase tracking-widest hover:bg-slate-100 transition-all mb-3">Cek Kesehatan Mental</a>
                                <a href="{{ route('mental-health-directory') }}" class="w-full block py-3 bg-white/10 text-white font-black rounded-xl text-xs uppercase tracking-widest hover:bg-white/20 transition-all">Direktori Bantuan</a>
                            </div>
                            <div class="bg-slate-900 border border-slate-800 rounded-[2.5rem] p-8 shadow-xl">
                                <h4 class="font-black text-white mb-6 uppercase text-xs tracking-widest">Checklist Perawatan Diri</h4>
                                <div class="space-y-3">
                                    <label class="flex items-center gap-3 p-3 bg-slate-800/50 rounded-xl has-[:checked]:bg-green-500/10">
                                        <input type="checkbox" class="w-4 h-4 text-green-600 bg-slate-700 border-slate-600 rounded focus:ring-green-500">
                                        <span class="text-xs font-bold text-slate-300">Jalan kaki 15 menit tanpa gadget</span>
                                    </label>
                                     <label class="flex items-center gap-3 p-3 bg-slate-800/50 rounded-xl has-[:checked]:bg-green-500/10">
                                        <input type="checkbox" class="w-4 h-4 text-green-600 bg-slate-700 border-slate-600 rounded focus:ring-green-500">
                                        <span class="text-xs font-bold text-slate-300">Dengarkan 3 lagu favorit</span>
                                    </label>
                                     <label class="flex items-center gap-3 p-3 bg-slate-800/50 rounded-xl has-[:checked]:bg-green-500/10">
                                        <input type="checkbox" class="w-4 h-4 text-green-600 bg-slate-700 border-slate-600 rounded focus:ring-green-500">
                                        <span class="text-xs font-bold text-slate-300">Tulis 1 hal yang Anda syukuri hari ini</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                {{-- TAB: MESSAGES --}}
                @if($activeTab === 'messages')
                    <livewire:user-messaging />
                @endif

                {{-- TAB: SETTINGS --}}
                @if($activeTab === 'settings')
                <div class="space-y-8 animate-in fade-in slide-in-from-right-4 duration-700">
                    <div>
                        <h3 class="text-3xl font-black text-white italic uppercase tracking-tighter">Konfigurasi Identitas</h3>
                        <p class="text-slate-500 font-bold text-[10px] uppercase tracking-widest mt-1">Kelola bagaimana sistem melihat Anda</p>
                    </div>
                    
                    <div class="bg-slate-900 border border-slate-800 rounded-[2.5rem] p-10 shadow-2xl relative overflow-hidden">
                         @if (session('status'))
                            <div class="mb-8 p-4 bg-teal-500/10 border border-teal-500/20 text-teal-400 text-xs font-black uppercase tracking-widest rounded-2xl animate-in fade-in slide-in-from-top-2">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form wire:submit.prevent="updateProfile" class="space-y-10 relative z-10">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Nama Lengkap (Privat)</label>
                                    <input type="text" wire:model="name" class="w-full bg-slate-950 border-slate-800 text-white rounded-2xl px-6 py-4 focus:ring-teal-500 focus:border-teal-500 font-black text-sm" placeholder="Nama asli Anda">
                                    @error('name') <p class="text-red-500 text-[10px] mt-2 font-black uppercase">{{ $message }}</p> @enderror
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-black text-teal-500 uppercase tracking-[0.2em]">Nama Samaran (Online)</label>
                                    <input type="text" wire:model="nickname" class="w-full bg-slate-950 border-teal-500/20 text-white rounded-2xl px-6 py-4 focus:ring-teal-500 focus:border-teal-500 font-black text-sm" placeholder="Contoh: Survivor_X">
                                    @error('nickname') <p class="text-red-500 text-[10px] mt-2 font-black uppercase">{{ $message }}</p> @enderror
                                    <p class="text-[9px] text-slate-600 font-bold italic mt-3">*Nickname ini digunakan untuk menjaga anonimitas Anda di fitur komunitas.</p>
                                </div>
                            </div>

                            <div class="pt-10 border-t border-slate-800/50 flex justify-end">
                                <button type="submit" class="px-12 py-5 bg-teal-600 text-white font-black text-xs rounded-2xl uppercase tracking-widest hover:bg-teal-500 hover:-translate-y-1 transition-all shadow-[0_10px_30px_rgba(13,148,136,0.3)]">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="bg-red-500/5 border border-red-500/10 rounded-[2.5rem] p-10 group hover:bg-red-500/10 transition-colors duration-500">
                        <div class="flex items-center gap-4 mb-6">
                            <span class="w-12 h-12 bg-red-500/20 text-red-500 rounded-2xl flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">⚠️</span>
                            <div>
                                <h4 class="text-red-500 font-black uppercase text-sm tracking-tighter italic">Zona Penghapusan Data (UU PDP)</h4>
                                <p class="text-[10px] text-slate-600 font-bold uppercase tracking-widest">Tindakan ini tidak dapat dibatalkan</p>
                            </div>
                        </div>
                        <p class="text-xs text-slate-500 font-bold mb-8 leading-relaxed max-w-2xl">
                            Sesuai dengan hak Anda dalam UU Pelindungan Data Pribadi (UU PDP), Anda dapat meminta penghapusan permanen seluruh data Anda dari server kami. Proses ini memakan waktu maksimal 14 hari kerja.
                        </p>
                        <button class="px-8 py-4 bg-red-600/10 text-red-500 border border-red-500/30 font-black text-xs rounded-2xl hover:bg-red-600 hover:text-white transition-all uppercase tracking-widest">
                            Hapus Seluruh Data Saya
                        </button>
                    </div>
                </div>
                @endif

            </main>
        </div>
    </div>
</div>