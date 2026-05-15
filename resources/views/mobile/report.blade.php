<x-mobile-layout>
    <div class="mobile-container pb-28 text-slate-100">
        {{-- Header --}}
        <div class="relative h-64 overflow-hidden">
            <img src="/Pelaporan Aman & Terlindungi.webp" class="absolute inset-0 w-full h-full object-cover opacity-50">
            <div class="absolute inset-0 bg-gradient-to-t from-[#020617] via-[#020617]/40 to-transparent"></div>
            
            <div class="absolute top-16 left-6 right-6">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-teal-400 text-xs font-bold uppercase tracking-widest mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
                    Kembali
                </a>
                <h1 class="text-3xl font-black text-white leading-tight">Buat Laporan<br><span class="text-teal-400">Pengaduan</span></h1>
            </div>
        </div>

        {{-- Form Area --}}
        <div class="px-6 -mt-4 relative z-10">
            <div class="glass-panel rounded-[32px] p-6 shadow-2xl">
                <div class="flex items-center gap-3 mb-6 p-4 bg-teal-500/10 rounded-2xl border border-teal-500/20">
                    <span class="text-xl">🔒</span>
                    <p class="text-[11px] font-bold text-teal-100/80 leading-tight tracking-wide uppercase">
                        Koneksi Terenkripsi AES-256. Data Identitas Tidak Disimpan.
                    </p>
                </div>

                <livewire:report-form />
            </div>

            {{-- Support Info --}}
            <div class="mt-8 space-y-4">
                <div class="flex gap-4 items-start p-4 rounded-2xl bg-slate-900/40">
                    <span class="text-2xl">🛡️</span>
                    <div>
                        <h4 class="text-sm font-bold text-white">100% Anonim</h4>
                        <p class="text-xs text-slate-400">Kami tidak menanyakan NIK, KTP, atau nama asli Anda.</p>
                    </div>
                </div>
                <div class="flex gap-4 items-start p-4 rounded-2xl bg-slate-900/40">
                    <span class="text-2xl">🧠</span>
                    <div>
                        <h4 class="text-sm font-bold text-white">Prioritas Mental</h4>
                        <p class="text-xs text-slate-400">Laporan Anda membantu mengurangi beban psikologis akibat teror.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-mobile-layout>
