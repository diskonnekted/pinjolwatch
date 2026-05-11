<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>PinjolWatch | Ruang Aman Lapor Teror Pinjol Ilegal & Pemulihan Mental</title>
        <meta name="description" content="Laporkan ancaman debt collector pinjol ilegal secara 100% anonim. Data terenkripsi, sesuai UU PDP. Prioritaskan kesehatan mentalmu, kami yang mengawal prosesnya.">
        <meta name="keywords" content="pinjol ilegal, teror debt collector, laporan anonim, kesehatan mental, UU PDP, OJK, Kominfo, pendampingan hukum">


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased" style="background:#020617;color:#f1f5f9;font-family:'Inter',sans-serif;">
        @include('layouts.frontend-navigation')

        <div class="min-h-screen">
            {{ $slot }}
        </div>

        @include('layouts.dark-footer')
    </body>
</html>
