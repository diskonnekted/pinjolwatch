<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>PinjolWatch | Ruang Aman Lapor Teror Pinjol Ilegal & Pemulihan Mental</title>
        <meta name="description" content="Laporkan ancaman debt collector pinjol ilegal secara 100% anonim. Data terenkripsi, sesuai UU PDP. Prioritaskan kesehatan mentalmu, kami yang mengawal prosesnya.">
        <meta name="keywords" content="pinjol ilegal, teror debt collector, laporan anonim, kesehatan mental, UU PDP, OJK, Kominfo, pendampingan hukum">

        <link rel="icon" type="image/png" href="/pw-logo.webp">


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">
        @livewireStyles
        @stack('styles')

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased" style="background:#020617;color:#f1f5f9;font-family:'Inter',sans-serif;">
        <div class="min-h-screen pt-20">
            @include('layouts.frontend-navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-slate-900 border-b border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)]">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            @include('layouts.dark-footer')
        </div>
        @livewireScripts
        @stack('scripts')
    </body>
</html>
