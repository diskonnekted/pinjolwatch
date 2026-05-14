<div class="space-y-6">
    @if(!$activeSessionId)
        <div class="bg-slate-900 border border-slate-800 rounded-[2.5rem] p-10 text-center shadow-2xl relative overflow-hidden">
            <div class="absolute -right-20 -top-20 w-80 h-80 bg-teal-500/10 rounded-full blur-[100px]"></div>
            
            <div class="relative z-10">
                <div class="w-20 h-20 bg-teal-500/10 rounded-3xl flex items-center justify-center text-4xl mx-auto mb-6 border border-teal-500/20">
                    💬
                </div>
                <h3 class="text-3xl font-black text-white  uppercase tracking-tighter mb-4">Butuh Teman Bicara?</h3>
                <p class="text-slate-400 text-lg max-w-xl mx-auto leading-relaxed mb-10">
                    Mulai sesi obrolan anonim dengan relawan kami. Semua percakapan dienkripsi dan akan dihapus secara otomatis demi privasi Anda.
                </p>
                
                <button wire:click="createSession" class="px-12 py-5 bg-teal-600 text-white font-black text-xs rounded-2xl uppercase tracking-widest hover:bg-teal-500 hover:-translate-y-1 transition-all shadow-[0_10px_30px_rgba(13,148,136,0.3)] group">
                    MULAI OBROLAN AMAN
                    <span class="ml-2 group-hover:translate-x-1 transition-transform">→</span>
                </button>
            </div>
        </div>

        @if($sessions->count() > 0)
            <div class="mt-12">
                <h4 class="text-xs font-black text-slate-500 uppercase tracking-[0.2em] mb-6 flex items-center gap-3">
                    <span class="w-8 h-px bg-slate-800"></span>
                    Riwayat Sesi
                </h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($sessions as $session)
                        <button wire:click="$set('activeSessionId', '{{ $session->id }}')" class="flex items-center justify-between p-6 bg-slate-900/50 border border-slate-800 rounded-3xl hover:border-teal-500/50 transition-all group text-left">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-slate-800 flex items-center justify-center text-xl group-hover:scale-110 transition-transform">
                                    @if($session->status === 'waiting') ⏳ @elseif($session->status === 'active') 🟢 @else 📁 @endif
                                </div>
                                <div>
                                    <p class="text-xs font-black text-white uppercase tracking-wider">
                                        Sesi {{ $session->created_at->format('d M Y') }}
                                    </p>
                                    <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest mt-1">
                                        Status: {{ strtoupper($session->status) }}
                                    </p>
                                </div>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-5 h-5 text-slate-700 group-hover:text-teal-500 transition-colors">
                              <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </button>
                    @endforeach
                </div>
            </div>
        @endif
    @else
        <div class="animate-in fade-in slide-in-from-right-4 duration-500">
            <div class="mb-6">
                <button wire:click="$set('activeSessionId', null)" class="flex items-center gap-2 text-slate-500 hover:text-teal-400 font-black text-[10px] uppercase tracking-widest transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
                    Kembali ke Lobi
                </button>
            </div>
            <livewire:user-chat-session :sessionId="$activeSessionId" :key="$activeSessionId" />
        </div>
    @endif
</div>
