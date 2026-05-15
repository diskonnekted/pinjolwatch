<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>PinjolWatch | Ruang Aman Lapor Teror Pinjol Ilegal & Pemulihan Mental</title>
        <meta name="description" content="Laporkan ancaman debt collector pinjol ilegal secara 100% anonim. Data terenkripsi, sesuai UU PDP. Prioritaskan kesehatan mentalmu, kami yang mengawal prosesnya.">
        <meta name="keywords" content="pinjol ilegal, teror debt collector, laporan anonim, kesehatan mental, UU PDP, OJK, Kominfo, pendampingan hukum">

        <link rel="icon" type="image/png" href="/pw-logo.png">


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @stack('styles')

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            @if(!$is_mobile)
            <footer class="bg-white mt-12">
                <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 border-t">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div>
                            <h5 class="font-bold text-gray-900">PinjolWatch</h5>
                            <p class="mt-2 text-sm text-gray-600">Platform pengaduan masyarakat independen. Fokus pada perlindungan data, transparansi, dan pemulihan mental korban teror pinjol ilegal.</p>
                        </div>
                        <div>
                            <h5 class="font-bold text-gray-900">Tautan</h5>
                            <ul class="mt-2 space-y-1 text-sm">
                                <li><a href="{{ route('privacy.policy') }}" class="text-gray-600 hover:text-gray-900">Kebijakan Privasi</a></li>
                                <li><a href="#" class="text-gray-600 hover:text-gray-900">Syarat & Ketentuan</a></li>
                                <li><a href="#" class="text-gray-600 hover:text-gray-900">Panduan UU PDP</a></li>
                                <li><a href="#" class="text-gray-600 hover:text-gray-900">Kontak Tim</a></li>
                            </ul>
                        </div>
                        <div>
                            <h5 class="font-bold text-gray-900">Darurat</h5>
                            <p class="mt-2 text-sm text-gray-600">Jika Anda mengalami krisis psikologis atau ancaman fisik segera:<br>
                            📞 119 ext. 8 (Psikologis) | 📞 110 (Polri)</p>
                        </div>
                    </div>
                    <div class="mt-12 border-t pt-8">
                        <p class="text-sm text-gray-500 text-center">© 2026 PinjolWatch. Semua hak dilindungi.</p>
                        <p class="mt-4 text-xs text-gray-500 text-center">Disclaimer: PinjolWatch bukan lembaga penegak hukum. Data laporan digunakan untuk verifikasi, pemetaan, dan pendampingan sesuai persetujuan pelapor. Kami tidak menjamin hasil penyidikan, namun berkomitmen pada transparansi & kepatuhan UU PDP.</p>
                    </div>
                </div>
            </footer>
            @endif
        </div>
        @stack('scripts')
        <livewire:panic-button />
        @livewireScripts
    </body>
</html>
