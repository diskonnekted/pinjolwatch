<div class="fixed bottom-6 right-6 z-[9999]" x-data="{ open: false }">
    {{-- Main Panic Button --}}
    <button 
        wire:click="panic"
        @mouseenter="open = true"
        @mouseleave="open = false"
        class="group relative flex items-center justify-center w-14 h-14 bg-red-600 hover:bg-red-500 text-white rounded-full shadow-[0_0_20px_rgba(220,38,38,0.5)] transition-all duration-300 hover:scale-110 active:scale-95"
        title="Panic Button: Keluar Instan"
    >
        {{-- Pulse Effect --}}
        <span class="absolute inset-0 rounded-full bg-red-600 animate-ping opacity-20"></span>
        
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-7 h-7 relative z-10">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>

        {{-- Tooltip Label --}}
        <div 
            x-show="open" 
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 translate-x-4"
            x-transition:enter-end="opacity-100 translate-x-0"
            class="absolute right-full mr-4 px-4 py-2 bg-slate-900 border border-slate-800 text-white text-xs font-black uppercase tracking-widest rounded-xl whitespace-nowrap shadow-2xl pointer-events-none"
        >
            🚨 Keluar Instan (Panic)
        </div>
    </button>

    {{-- Keyboard Shortcut Tip (Hidden on Mobile) --}}
    <p class="hidden md:block text-[9px] text-slate-500 font-bold uppercase tracking-tighter mt-2 text-center opacity-50">
        Klik untuk Darurat
    </p>

    <script>
        // Optional: Trigger panic on double 'Escape' key
        let lastEsc = 0;
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                const now = Date.now();
                if (now - lastEsc < 500) {
                    @this.panic();
                }
                lastEsc = now;
            }
        });

        // Clear localStorage on panic trigger
        window.addEventListener('panic-triggered', () => {
            localStorage.clear();
            sessionStorage.clear();
        });
    </script>
</div>
