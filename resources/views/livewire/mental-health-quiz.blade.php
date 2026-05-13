<div class="max-w-3xl mx-auto py-12 px-4">
    <div class="bg-slate-900 rounded-3xl shadow-[0_4px_20px_rgba(0,0,0,0.3)] border border-slate-800 overflow-hidden">
        @if($step == 0)
            <div class="p-10 text-center">
                <div class="w-20 h-20 bg-primary-900/30 rounded-2xl flex items-center justify-center text-primary-400 mx-auto mb-6 border border-primary-800/50">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-black text-slate-100 uppercase">Cek Kesehatan Jiwa</h2>
                <p class="mt-4 text-slate-400 leading-relaxed max-w-lg mx-auto">Kuis ini diadaptasi dari standar skala distres psikologis (K10) untuk membantu Anda memahami dampak teror pinjol terhadap kesehatan mental Anda.</p>
                <div class="mt-10">
                    <button wire:click="startQuiz" class="px-10 py-4 bg-primary-600 text-white font-black uppercase tracking-widest rounded-2xl hover:bg-primary-500 shadow-lg shadow-primary-900/20 transition-all active:scale-95">
                        Mulai Tes Sekarang
                    </button>
                </div>
                <p class="mt-6 text-[10px] text-slate-500 uppercase tracking-widest font-bold">Waktu pengerjaan: ± 2 Menit</p>
            </div>

        @elseif($step <= 10)
            <div class="p-10">
                <div class="flex justify-between items-center mb-8">
                    <span class="text-xs font-black uppercase tracking-widest text-primary-400">Pertanyaan {{ $step }} / 10</span>
                    <div class="w-32 bg-slate-800 h-2 rounded-full overflow-hidden">
                        <div class="bg-primary-500 h-full transition-all duration-500" style="width: {{ ($step/10)*100 }}%"></div>
                    </div>
                </div>
                
                <h3 class="text-2xl font-bold text-slate-100 leading-tight mb-10">{{ $currentQuestion }}</h3>
                
                <div class="grid grid-cols-1 gap-3">
                    @foreach([
                        1 => 'Tidak Pernah',
                        2 => 'Jarang',
                        3 => 'Kadang-kadang',
                        4 => 'Sering',
                        5 => 'Setiap Saat'
                    ] as $score => $label)
                        <button wire:click="answer({{ $score }})" class="group flex items-center justify-between p-5 border-2 border-slate-800 rounded-2xl hover:border-primary-500 hover:bg-primary-900/20 transition-all text-left">
                            <span class="font-bold text-slate-300 group-hover:text-primary-300">{{ $label }}</span>
                            <div class="w-6 h-6 rounded-full border-2 border-slate-700 group-hover:border-primary-500 flex items-center justify-center">
                                <div class="w-2.5 h-2.5 bg-primary-500 rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            </div>
                        </button>
                    @endforeach
                </div>
            </div>

        @elseif($step == 11)
            <div class="p-10 text-center animate-in fade-in zoom-in duration-700">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-emerald-950/30 border border-emerald-900/50 rounded-full text-[9px] font-black text-emerald-400 uppercase tracking-widest mb-6">
                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse"></span>
                    Statistik Tersimpan untuk Analisis
                </div>

                <p class="text-xs font-black uppercase tracking-widest text-slate-500 mb-2">Hasil Analisis Anda:</p>
                <h2 class="text-4xl font-black text-slate-100 mb-6">{{ $resultLevel }}</h2>
                
                <div class="p-8 bg-slate-800/50 rounded-3xl border border-slate-700 mb-8">
                    <p class="text-slate-300 leading-relaxed">"{{ $resultAdvice }}"</p>
                </div>

                @guest
                    <div class="mb-10 p-8 rounded-[2rem] bg-gradient-to-br from-indigo-900/20 to-primary-900/20 border border-indigo-500/20 relative overflow-hidden group">
                        <div class="absolute -top-12 -right-12 w-32 h-32 bg-indigo-500/10 rounded-full blur-3xl group-hover:bg-indigo-500/20 transition-all"></div>
                        <h4 class="text-lg font-black text-white uppercase mb-3">Butuh Analisis Lebih Valid?</h4>
                        <p class="text-sm text-slate-400 mb-6">Daftarkan akun PinjolWatch untuk mendapatkan akses ke <strong>Tes Kesehatan Jiwa Premium</strong> dan konsultasi langsung dengan responder kami secara gratis.</p>
                        <a href="{{ route('register') }}" class="inline-block px-8 py-3 bg-indigo-600 text-white font-black uppercase tracking-widest rounded-xl hover:bg-indigo-500 transition-all shadow-lg shadow-indigo-900/20">
                            Daftar Sekarang
                        </a>
                    </div>
                @endguest

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('report') }}" class="px-8 py-4 bg-primary-600 text-white font-black uppercase tracking-widest rounded-2xl hover:bg-primary-500 shadow-lg shadow-primary-900/20 transition-all">
                        Lapor Teror Pinjol
                    </a>
                    <button wire:click="startQuiz" class="px-8 py-4 bg-slate-800 border-2 border-slate-700 text-slate-300 font-black uppercase tracking-widest rounded-2xl hover:bg-slate-700 transition-all">
                        Ulangi Tes
                    </button>
                </div>
                
                <p class="mt-8 text-[10px] text-slate-500 leading-relaxed max-w-md mx-auto">
                    <strong>Disclaimer:</strong> Hasil tes ini bukan diagnosis klinis. Data Anda dianonimkan untuk kepentingan riset dampak pinjol nasional.
                </p>
            </div>
        @endif
    </div>
</div>
