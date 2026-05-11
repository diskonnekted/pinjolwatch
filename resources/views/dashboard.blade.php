<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 mb-8">
                <div class="p-8 flex items-center gap-6">
                    <img src="/pw-logo.png" class="h-20 w-auto" alt="PinjolWatch Logo Small">
                    <div>
                        <h3 class="text-2xl font-black text-gray-900 uppercase tracking-tight italic">Panel Moderasi PinjolWatch</h3>
                        <p class="text-gray-500 text-sm mt-1">Selamat datang kembali. Silakan tinjau dan verifikasi laporan masyarakat hari ini.</p>
                    </div>
                </div>
            </div>

            <livewire:admin-moderation-queue />
        </div>
    </div>
</x-app-layout>
