<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="theme-color" content="#0d9488">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PinjolWatch Mobile') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            color: #0f172a;
            /* Hide scrollbar for a more app-like feel on mobile */
            -ms-overflow-style: none;  
            scrollbar-width: none;  
        }
        body::-webkit-scrollbar {
            display: none;
        }
        /* Prevents pull-to-refresh on mobile if desired */
        .overscroll-none {
            overscroll-behavior: none;
        }
    </style>
</head>
<body class="antialiased overscroll-none pb-24">

    {{-- Main Content Area --}}
    <main class="w-full max-w-md mx-auto min-h-screen relative shadow-2xl bg-white overflow-hidden">
        {{ $slot }}
    </main>

    {{-- Bottom Navigation --}}
    <div class="fixed bottom-0 left-0 right-0 z-50 flex justify-center pointer-events-none">
        <div class="w-full max-w-md pointer-events-auto">
            @include('layouts.frontend-navigation')
        </div>
    </div>

    @livewireScripts
</body>
</html>
