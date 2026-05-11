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
                        <h3 class="text-2xl font-black text-gray-900 uppercase tracking-tight italic">Halo, {{ Auth::user()->name }}</h3>
                        <p class="text-gray-500 text-sm mt-1">Terima kasih telah bergabung di ekosistem PinjolWatch.</p>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100">
                <div class="p-8">
                    <h4 class="text-xl font-bold text-gray-900 mb-4">Mulai Perjalanan Pemulihan Anda</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <a href="{{ route('report') }}" class="block p-6 bg-teal-50 rounded-xl border border-teal-100 hover:bg-teal-100 transition-colors">
                            <h5 class="font-bold text-teal-800 text-lg mb-2">Buat Laporan Baru</h5>
                            <p class="text-teal-600 text-sm">Laporkan teror yang Anda alami secara anonim.</p>
                        </a>
                        <a href="{{ route('track') }}" class="block p-6 bg-blue-50 rounded-xl border border-blue-100 hover:bg-blue-100 transition-colors">
                            <h5 class="font-bold text-blue-800 text-lg mb-2">Lacak Tiket Laporan</h5>
                            <p class="text-blue-600 text-sm">Pantau status laporan yang telah Anda buat.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
