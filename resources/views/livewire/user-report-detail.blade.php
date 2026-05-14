<div class="py-12 bg-[#020617] min-h-screen text-slate-300">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- BACK BUTTON & HEADER --}}
        <div class="mb-10">
            <a href="{{ route('dashboard', ['tab' => 'reports']) }}"
               class="inline-flex items-center gap-2 text-slate-500 hover:text-teal-400 transition-colors font-black text-xs uppercase tracking-widest mb-6 group">
                <span class="group-hover:-translate-x-1 transition-transform">←</span>
                Kembali ke Dasbor
            </a>

            <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-6">
                <div>
                    <p class="text-[10px] font-black text-teal-400 uppercase tracking-[0.3em] mb-2">Detail Laporan</p>
                    <h1 class="text-4xl font-black text-white  uppercase tracking-tighter leading-tight">
                        Tiket <span class="text-teal-500 font-mono">#{{ substr($report->ticket_id, 0, 8) }}</span>
                    </h1>
                    <p class="text-slate-500 text-sm mt-2">
                        Dikirim pada {{ $report->created_at->format('d F Y') }} &bull; {{ $report->created_at->diffForHumans() }}
                    </p>
                </div>

                {{-- STATUS BADGE --}}
                @php
                    $statusMap = [
                        'received'  => ['label' => 'Diterima',         'color' => 'text-amber-400',  'bg' => 'bg-amber-500/10',  'border' => 'border-amber-500/20',  'dot' => 'bg-amber-400'],
                        'verified'  => ['label' => 'Terverifikasi',    'color' => 'text-blue-400',   'bg' => 'bg-blue-500/10',   'border' => 'border-blue-500/20',   'dot' => 'bg-blue-400'],
                        'forwarded' => ['label' => 'Diteruskan',       'color' => 'text-purple-400', 'bg' => 'bg-purple-500/10', 'border' => 'border-purple-500/20', 'dot' => 'bg-purple-400'],
                        'resolved'  => ['label' => 'Selesai',          'color' => 'text-teal-400',   'bg' => 'bg-teal-500/10',   'border' => 'border-teal-500/20',   'dot' => 'bg-teal-400'],
                    ];
                    $sc = $statusMap[$report->status] ?? $statusMap['received'];
                @endphp
                <div class="inline-flex items-center gap-2.5 px-5 py-3 rounded-2xl border {{ $sc['bg'] }} {{ $sc['border'] }} shrink-0">
                    <span class="w-2 h-2 rounded-full {{ $sc['dot'] }} animate-pulse"></span>
                    <span class="font-black text-xs uppercase tracking-widest {{ $sc['color'] }}">{{ $sc['label'] }}</span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">

            {{-- LEFT: STATUS TIMELINE + DETAILS --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- STATUS TIMELINE --}}
                <div class="bg-slate-900 border border-slate-800 rounded-[2.5rem] p-8 shadow-2xl">
                    <h3 class="text-xs font-black text-slate-400 uppercase tracking-widest mb-8 flex items-center gap-3">
                        <span class="w-8 h-px bg-teal-500"></span>
                        Perjalanan Laporan Anda
                    </h3>

                    @php
                        $steps = [
                            ['key' => 'received',  'label' => 'Laporan Diterima',     'desc' => 'Sistem telah menerima laporan Anda dan mengantrekan untuk verifikasi.'],
                            ['key' => 'verified',  'label' => 'Terverifikasi',         'desc' => 'Tim moderasi telah memverifikasi keabsahan laporan Anda.'],
                            ['key' => 'forwarded', 'label' => 'Diteruskan ke Otoritas','desc' => 'Laporan Anda telah diteruskan ke OJK / pihak berwenang terkait.'],
                            ['key' => 'resolved',  'label' => 'Kasus Selesai',         'desc' => 'Kasus telah diselesaikan dan diarsipkan secara permanen.'],
                        ];
                        $statusOrder = ['received' => 0, 'verified' => 1, 'forwarded' => 2, 'resolved' => 3];
                        $currentStep = $statusOrder[$report->status] ?? 0;
                    @endphp

                    <div class="space-y-0">
                        @foreach($steps as $i => $step)
                            @php
                                $isDone   = $i < $currentStep;
                                $isCurrent = $i === $currentStep;
                                $isPending = $i > $currentStep;
                            @endphp
                            <div class="flex gap-5 {{ !$loop->last ? 'pb-8' : '' }} relative">
                                {{-- Connector line --}}
                                @if(!$loop->last)
                                    <div class="absolute left-[19px] top-10 bottom-0 w-px {{ $isDone ? 'bg-teal-500' : 'bg-slate-800' }}"></div>
                                @endif

                                {{-- Step dot --}}
                                <div class="shrink-0 relative z-10">
                                    @if($isCurrent)
                                        <div class="w-10 h-10 rounded-2xl bg-teal-500 flex items-center justify-center shadow-[0_0_20px_rgba(20,184,166,0.4)]">
                                            <span class="w-3 h-3 rounded-full bg-white animate-pulse"></span>
                                        </div>
                                    @elseif($isDone)
                                        <div class="w-10 h-10 rounded-2xl bg-teal-500/20 border border-teal-500/40 flex items-center justify-center">
                                            <svg class="w-4 h-4 text-teal-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    @else
                                        <div class="w-10 h-10 rounded-2xl bg-slate-800 border border-slate-700 flex items-center justify-center">
                                            <span class="w-2 h-2 rounded-full bg-slate-600"></span>
                                        </div>
                                    @endif
                                </div>

                                {{-- Step info --}}
                                <div class="pt-1.5">
                                    <div class="font-black text-sm uppercase tracking-wider {{ $isCurrent ? 'text-teal-400' : ($isDone ? 'text-slate-300' : 'text-slate-600') }}">
                                        {{ $step['label'] }}
                                        @if($isCurrent)
                                            <span class="ml-2 text-[9px] text-teal-500 bg-teal-500/10 border border-teal-500/20 px-2 py-0.5 rounded-full uppercase">Sekarang</span>
                                        @endif
                                    </div>
                                    <p class="text-xs mt-1 {{ $isPending ? 'text-slate-700' : 'text-slate-500' }} leading-relaxed">
                                        {{ $step['desc'] }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- DETAIL LAPORAN --}}
                <div class="bg-slate-900 border border-slate-800 rounded-[2.5rem] p-8 shadow-2xl">
                    <h3 class="text-xs font-black text-slate-400 uppercase tracking-widest mb-6 flex items-center gap-3">
                        <span class="w-8 h-px bg-teal-500"></span>
                        Ringkasan Laporan
                    </h3>

                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-slate-950/50 border border-slate-800/50 rounded-2xl p-5">
                            <div class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1">Aplikasi Pinjol</div>
                            <div class="text-sm font-black text-white">
                                {{ $report->app_name ?: ($report->legalPinjol?->app_name ?? 'Tidak Disebutkan') }}
                            </div>
                            @if($report->legalPinjol)
                                <span class="inline-block mt-1.5 px-2 py-0.5 rounded bg-emerald-500/10 text-emerald-400 text-[9px] font-black uppercase tracking-widest border border-emerald-500/20">
                                    OJK Terdaftar
                                </span>
                            @else
                                <span class="inline-block mt-1.5 px-2 py-0.5 rounded bg-rose-500/10 text-rose-400 text-[9px] font-black uppercase tracking-widest border border-rose-500/20">
                                    Ilegal / Bodong
                                </span>
                            @endif
                        </div>

                        <div class="bg-slate-950/50 border border-slate-800/50 rounded-2xl p-5">
                            <div class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1">Jenis Ancaman</div>
                            <div class="text-sm font-black text-white">
                                {{ $report->threatType?->label ?? '-' }}
                            </div>
                        </div>

                        <div class="bg-slate-950/50 border border-slate-800/50 rounded-2xl p-5">
                            <div class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1">Kabupaten / Kota</div>
                            <div class="text-sm font-black text-white">
                                {{ $report->kabupaten?->nama ?? '-' }}
                            </div>
                        </div>

                        <div class="bg-slate-950/50 border border-slate-800/50 rounded-2xl p-5">
                            <div class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1">Tanggal Laporan</div>
                            <div class="text-sm font-black text-white">
                                {{ $report->created_at->format('d M Y') }}
                            </div>
                        </div>
                    </div>

                    {{-- Taktik Intimidasi --}}
                    @if(is_array($report->dc_actions) && count($report->dc_actions) > 0)
                    <div class="border-t border-slate-800/50 pt-6">
                        <div class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3">Taktik Intimidasi Dilaporkan</div>
                        <div class="flex flex-wrap gap-2">
                            @foreach($report->dc_actions as $action)
                                <span class="px-3 py-1.5 rounded-xl bg-rose-500/10 border border-rose-500/20 text-xs font-black text-rose-400 uppercase">{{ $action }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- Kronologi --}}
                    @if($report->chronology)
                    <div class="border-t border-slate-800/50 pt-6 mt-6">
                        <div class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3">Kronologi Kejadian</div>
                        <div class="bg-slate-950/50 border border-slate-800/50 rounded-2xl p-5 text-sm text-slate-400 leading-relaxed whitespace-pre-wrap font-medium">
{{ $report->chronology }}
                        </div>
                    </div>
                    @endif
                </div>

            </div>

            {{-- RIGHT: INFO CARD --}}
            <div class="space-y-6">

                {{-- TICKET ID CARD --}}
                <div class="bg-slate-900 border border-slate-800 rounded-[2.5rem] p-8 shadow-2xl">
                    <h3 class="text-xs font-black text-slate-500 uppercase tracking-widest mb-5">Kode Tiket Anda</h3>
                    <div class="bg-slate-950 border border-slate-800 rounded-2xl p-4 text-center">
                        <p class="font-mono text-teal-400 font-black text-base break-all">{{ $report->ticket_id }}</p>
                    </div>
                    <p class="text-[9px] text-slate-600 font-bold mt-3 text-center uppercase tracking-wider">
                        Simpan kode ini untuk memantau status laporan
                    </p>
                </div>

                {{-- STATUS INFO CARD --}}
                <div class="bg-slate-900 border border-slate-800 rounded-[2.5rem] p-8 shadow-2xl">
                    <h3 class="text-xs font-black text-slate-500 uppercase tracking-widest mb-5">Informasi Status</h3>

                    <div class="p-5 rounded-2xl {{ $sc['bg'] }} border {{ $sc['border'] }} mb-5">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="w-2 h-2 rounded-full {{ $sc['dot'] }} animate-pulse"></span>
                            <span class="font-black text-xs uppercase tracking-widest {{ $sc['color'] }}">{{ $sc['label'] }}</span>
                        </div>
                        <p class="text-xs text-slate-400 leading-relaxed">
                            @if($report->status === 'received')
                                Laporan Anda telah kami terima dan sedang menunggu verifikasi oleh tim moderasi kami.
                            @elseif($report->status === 'verified')
                                Tim moderasi telah memverifikasi laporan Anda. Data Anda dimasukkan ke pemetaan statistik nasional.
                            @elseif($report->status === 'forwarded')
                                Laporan Anda telah diteruskan ke OJK atau otoritas hukum terkait sesuai persetujuan Anda.
                            @elseif($report->status === 'resolved')
                                Kasus ini telah selesai dan diarsipkan. Terima kasih atas keberanian Anda melapor.
                            @endif
                        </p>
                    </div>

                    <div class="space-y-3">
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-slate-500 font-bold uppercase tracking-wider">ID Laporan</span>
                            <span class="font-mono text-slate-300 font-black text-[11px]">#{{ substr($report->ticket_id, 0, 8) }}</span>
                        </div>
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-slate-500 font-bold uppercase tracking-wider">Anonimitas</span>
                            <span class="font-black {{ $report->is_anonymous ? 'text-teal-400' : 'text-slate-400' }}">
                                {{ $report->is_anonymous ? '✓ Anonim' : 'Tidak Anonim' }}
                            </span>
                        </div>
                        @if($report->whatsapp_consent)
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-slate-500 font-bold uppercase tracking-wider">Persetujuan WA</span>
                            <span class="font-black text-teal-400">✓ Bersedia</span>
                        </div>
                        @endif
                    </div>
                </div>

                {{-- NEED HELP --}}
                <div class="bg-gradient-to-br from-teal-600/20 to-emerald-600/10 border border-teal-500/20 rounded-[2.5rem] p-8 shadow-2xl">
                    <h3 class="text-xs font-black text-teal-400 uppercase tracking-widest mb-3">Butuh Bantuan?</h3>
                    <p class="text-xs text-slate-400 leading-relaxed mb-5">
                        Tim PinjolWatch siap membantu. Lacak status tiket Anda kapan saja melalui fitur pelacak publik.
                    </p>
                    <a href="{{ route('track') }}"
                       class="block w-full text-center py-3 bg-teal-600 text-white font-black text-[10px] uppercase tracking-widest rounded-2xl hover:bg-teal-500 transition-all">
                        Lacak Tiket Publik
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
