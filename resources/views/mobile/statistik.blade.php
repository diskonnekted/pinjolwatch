<x-mobile-layout>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <div class="mobile-container pb-28 text-slate-100">
        {{-- Ambient Orbs --}}
        <div class="absolute top-[-5%] left-[-10%] w-[250px] h-[250px] rounded-full bg-teal-600/20 blur-[80px] pointer-events-none"></div>
        
        <div class="px-6 pt-16 pb-6 relative z-10 flex items-center gap-4">
            <a href="{{ url('/') }}" class="w-10 h-10 rounded-full glass-panel flex items-center justify-center text-slate-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
            </a>
            <h1 class="text-3xl font-black text-white">Statistik <span class="text-teal-400">Nasional</span></h1>
        </div>

        <div class="relative z-10">
            <livewire:public-stats />
        </div>

        </div>
    </div>
</x-mobile-layout>
