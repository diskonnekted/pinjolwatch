<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'PinjolWatch | Lapor Teror Pinjol Ilegal & Pemulihan Mental')</title>
        <meta name="description" content="@yield('meta_description', 'Platform pengaduan anonim #1 untuk korban pinjol ilegal. Dapatkan bantuan hukum, dukungan psikologis, dan lapor teror DC secara aman & terenkripsi.')">
        <meta name="keywords" content="lapor pinjol ilegal, pinjolwatch, teror debt collector, kesehatan mental pinjol, bantuan hukum gratis, solusi utang, pengaduan ojk, satgas pasti">
        <meta name="author" content="PinjolWatch Indonesia">
        <link rel="canonical" href="{{ url()->current() }}">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="@yield('title', 'PinjolWatch | Lapor Teror Pinjol Ilegal & Pemulihan Mental')">
        <meta property="og:description" content="@yield('meta_description', 'Platform pengaduan anonim #1 untuk korban pinjol ilegal. Dapatkan bantuan hukum, dukungan psikologis, dan lapor teror DC secara aman & terenkripsi.')">
        <meta property="og:image" content="@yield('og_image', asset('pw-logo.png'))">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ url()->current() }}">
        <meta property="twitter:title" content="@yield('title', 'PinjolWatch | Lapor Teror Pinjol Ilegal & Pemulihan Mental')">
        <meta property="twitter:description" content="@yield('meta_description', 'Platform pengaduan anonim #1 untuk korban pinjol ilegal. Dapatkan bantuan hukum, dukungan psikologis, dan lapor teror DC secara aman & terenkripsi.')">
        <meta property="twitter:image" content="@yield('og_image', asset('pw-logo.png'))">

        <link rel="icon" type="image/png" href="/pw-logo.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="theme-color" content="#0d9488">


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased" style="background:#020617;color:#f1f5f9;font-family:'Inter',sans-serif;">
        @include('layouts.frontend-navigation')

        <div class="min-h-screen">
            {{ $slot }}
        </div>

        <livewire:panic-button />

        @include('layouts.dark-footer')
        @livewireScripts

        <script>
            if ('serviceWorker' in navigator) {
                window.addEventListener('load', () => {
                    navigator.serviceWorker.register('/sw.js')
                        .then(reg => console.log('Service Worker registered'))
                        .catch(err => console.log('Service Worker registration failed: ', err));
                });
            }
        </script>
    </body>
</html>
