<x-frontend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-100 leading-tight">
            {{ __('Buat Laporan Pengaduan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] sm:rounded-2xl">
                <div class="p-6 text-slate-100">
                    <livewire:report-form />
                </div>
            </div>
        </div>
    </div>
</x-frontend-layout>
