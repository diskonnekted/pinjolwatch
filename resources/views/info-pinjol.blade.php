<x-frontend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-100 leading-tight">
            {{ __('Info & Direktori Pinjol') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="max-w-4xl mx-auto">
                 <x-bi-interest-comparison />
             </div>
             <livewire:pinjol-directory />
        </div>
    </div>
</x-frontend-layout>
