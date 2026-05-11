<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tarik Persetujuan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
                <h3 class="text-lg font-medium">Konfirmasi Penarikan Persetujuan</h3>
                <p class="mt-2 text-sm text-gray-600">
                    Anda akan menarik persetujuan untuk tiket laporan <strong>{{ $log->ticket_id }}</strong>.
                    Ini akan menghentikan pemrosesan data Anda lebih lanjut oleh PinjolWatch.
                </p>
                <form method="POST" action="{{ route('consent.process', $log->ticket_id) }}" class="mt-6">
                    @csrf
                    <x-danger-button type="submit">
                        {{ __('Ya, Tarik Persetujuan Saya') }}
                    </x-danger-button>
                    <a href="{{ url()->previous() }}" class="ml-4 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                        Batal
                    </a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
