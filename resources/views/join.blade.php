<x-guest-layout>
    <div class="relative overflow-hidden bg-slate-950 pt-20">
        {{-- Background Elements --}}
        <div class="absolute top-0 left-0 w-full h-full pointer-events-none overflow-hidden">
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-teal-500/10 rounded-full blur-[100px]"></div>
            <div class="absolute top-1/2 -right-24 w-80 h-80 bg-blue-500/5 rounded-full blur-[100px]"></div>
        </div>

        <div class="relative z-10">
            <livewire:volunteer-registration />
        </div>
    </div>
</x-guest-layout>
