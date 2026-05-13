<x-frontend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-100 leading-tight">
            {{ __('Transparansi Data Geospasial') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-12">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary-500/10 text-primary-400 text-[10px] font-black tracking-widest uppercase mb-4 border border-primary-500/20">
                    <span class="w-2 h-2 rounded-full bg-primary-500 animate-pulse"></span>
                    Real-time Monitoring
                </div>
                <h1 class="text-4xl font-black text-white tracking-tighter uppercase mb-4">
                    Peta Krisis <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-400 to-rose-400">Pinjaman Online</span>
                </h1>
                <p class="text-slate-400 font-medium max-w-2xl text-sm leading-relaxed">
                    Visualisasi sebaran dampak pinjaman online ilegal dan statistik industri nasional untuk mendorong transparansi dan kebijakan perlindungan konsumen yang lebih baik.
                </p>
            </div>

            <livewire:public-map />
            
        </div>
    </div>
</x-frontend-layout>
