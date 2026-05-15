<x-mobile-layout>
    <div class="mobile-container pb-28 text-slate-100 h-screen flex flex-col">
        {{-- Floating Header --}}
        <div class="absolute top-6 left-6 right-6 z-50 flex items-center justify-between">
            <a href="{{ url('/') }}" class="w-12 h-12 rounded-2xl glass-panel flex items-center justify-center text-white shadow-2xl border-white/20">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
            </a>
            <div class="glass-panel px-6 py-3 rounded-2xl shadow-2xl border-white/20">
                <h1 class="text-sm font-black text-white tracking-widest uppercase">Peta <span class="text-teal-400">Sebaran</span></h1>
            </div>
            <div class="w-12 h-12 rounded-2xl glass-panel flex items-center justify-center text-teal-400 shadow-2xl border-white/20">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" /></svg>
            </div>
        </div>

        {{-- Map View (Full screen) --}}
        <div class="flex-1 relative">
            <livewire:public-map />
        </div>

        {{-- Bottom Info Card --}}
        <div class="px-6 pb-6 relative z-10 -mt-20 pointer-events-none">
            <div class="glass-card rounded-[32px] p-6 shadow-2xl pointer-events-auto border-teal-500/20">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-2 h-2 rounded-full bg-red-500 animate-ping"></div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Pembaruan Terkini</p>
                </div>
                <h3 class="text-base font-bold text-white mb-2 leading-tight">Pantau Keamanan Wilayah</h3>
                <p class="text-[11px] text-slate-400 leading-relaxed mb-4">Warna merah menunjukkan intensitas laporan teror debt collector yang lebih tinggi. Klik wilayah untuk detail.</p>
                <div class="flex gap-2">
                    <div class="flex-1 h-1.5 rounded-full bg-slate-800 overflow-hidden">
                        <div class="h-full bg-teal-500 w-3/4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-mobile-layout>
