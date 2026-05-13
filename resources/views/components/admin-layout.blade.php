<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Dashboard | PinjolWatch</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>
        [x-cloak] { display: none !important; }
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 10px; }
    </style>
</head>
<body class="font-sans antialiased bg-[#020617] text-slate-100" x-data="{ sidebarOpen: false }">
    
    <div class="min-h-screen flex w-full">
        
        {{-- Mobile Sidebar Backdrop --}}
        <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 z-20 bg-black/60 lg:hidden backdrop-blur-sm" @click="sidebarOpen = false" x-cloak></div>

        {{-- Sidebar --}}
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-30 w-64 bg-slate-950 text-white transition-transform duration-300 lg:translate-x-0 lg:static lg:inset-0 flex flex-col border-r border-white/5 shadow-2xl">
            {{-- Logo Area --}}
            <div class="flex items-center justify-center h-16 bg-slate-900/50 border-b border-white/5 shrink-0 px-4 gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-teal-500">
                    <path fill-rule="evenodd" d="M11.484 2.17a.75.75 0 0 1 1.032 0 11.209 11.209 0 0 0 7.877 3.08.75.75 0 0 1 .722.515 12.74 12.74 0 0 1 .436 4.464c-.389 4.298-2.607 7.973-5.918 10.378a1.75 1.75 0 0 1-1.905 0C10.155 18.2 7.747 14.526 7.41 10.23a12.744 12.744 0 0 1 .436-4.463.75.75 0 0 1 .721-.516 11.21 11.21 0 0 0 7.878-3.08ZM12 11.25a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z" clip-rule="evenodd" />
                </svg>
                <span class="text-xl font-black tracking-tight uppercase">Admin<span class="text-teal-500">Watch</span></span>
            </div>

            {{-- Scrollable Nav --}}
            <div class="overflow-y-auto overflow-x-hidden flex-1 py-8 px-4 space-y-1 custom-scrollbar bg-slate-950/20">
                
                {{-- 1. Dashboard Utama --}}
                <a href="{{ route('admin.overview') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.overview') ? 'bg-teal-500/10 text-teal-400 font-bold border border-teal-500/20' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="{{ request()->routeIs('admin.overview') ? '2' : '1.5' }}" stroke="currentColor" class="w-5 h-5 {{ request()->routeIs('admin.overview') ? '' : 'opacity-70' }}"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" /></svg>
                    <span class="text-xs tracking-widest uppercase {{ request()->routeIs('admin.overview') ? '' : 'font-medium' }}">Dashboard Utama</span>
                </a>

                {{-- 2. Manajemen Laporan --}}
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-teal-500/10 text-teal-400 font-bold border border-teal-500/20' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="{{ request()->routeIs('admin.dashboard') ? '2' : '1.5' }}" stroke="currentColor" class="w-5 h-5 {{ request()->routeIs('admin.dashboard') ? '' : 'opacity-70' }}"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375c0 .621-.504 1.125-1.125 1.125H6.375C5.754 20.25 5.25 19.746 5.25 19.125V9.375c0-.621.504-1.125 1.125-1.125Z" /></svg>
                    <span class="text-xs tracking-widest uppercase {{ request()->routeIs('admin.dashboard') ? '' : 'font-medium' }}">Manajemen Laporan</span>
                </a>

                {{-- 2.5 Pesan Konsultasi --}}
                <a href="{{ route('admin.messages') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.messages') ? 'bg-teal-500/10 text-teal-400 font-bold border border-teal-500/20' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="{{ request()->routeIs('admin.messages') ? '2' : '1.5' }}" stroke="currentColor" class="w-5 h-5 {{ request()->routeIs('admin.messages') ? '' : 'opacity-70' }}"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" /></svg>
                    <span class="text-xs tracking-widest uppercase {{ request()->routeIs('admin.messages') ? '' : 'font-medium' }}">Pesan Konsultasi</span>
                </a>

                {{-- 2.5.1 Antrean Chat --}}
                <a href="{{ route('admin.chat-queue') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.chat-queue') ? 'bg-teal-500/10 text-teal-400 font-bold border border-teal-500/20' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="{{ request()->routeIs('admin.chat-queue') ? '2' : '1.5' }}" stroke="currentColor" class="w-5 h-5 {{ request()->routeIs('admin.chat-queue') ? '' : 'opacity-70' }}"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.303.025-.607.047-.912.066a48.623 48.623 0 0 1-1.055.039c-1.247.039-2.502.059-3.813.059-1.242 0-2.503-.02-3.813-.059a48.69 48.69 0 0 1-1.055-.04 48.446 48.446 0 0 1-.912-.066C1.847 17.027 1 16.033 1 14.894v-4.286c0-.969.616-1.813 1.5-2.097m17.75 0a48.536 48.536 0 0 0-1.75-.171m0 0a48.453 48.453 0 0 1-1.75-.133m1.75.304c.03-.03.05-.09.05-.126V6.03c0-1.136-.847-2.1-1.98-2.193a48.642 48.642 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25" /></svg>
                    <span class="text-xs tracking-widest uppercase {{ request()->routeIs('admin.chat-queue') ? '' : 'font-medium' }}">Antrean Chat</span>
                </a>

                {{-- 2.6 Broadcast Pesan --}}
                <a href="{{ route('admin.broadcast') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.broadcast') ? 'bg-teal-500/10 text-teal-400 font-bold border border-teal-500/20' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="{{ request()->routeIs('admin.broadcast') ? '2' : '1.5' }}" stroke="currentColor" class="w-5 h-5 {{ request()->routeIs('admin.broadcast') ? '' : 'opacity-70' }}"><path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.062.51.114.769.157m0-9.494c-.259.043-.516.095-.769.157m0 9.18c-1.228.303-2.41.688-3.538 1.144-1.128.456-2.17 1.022-3.126 1.697L3.75 18l.15-2.251c.027-.405.045-.81.054-1.215m0-9.18c1.228-.303 2.41-.688 3.538-1.144 1.128-.456 2.17-1.022 3.126-1.697L10.25 6l-.15 2.251c-.027.405-.045.81-.054 1.215m0 2.25a22.506 22.506 0 0 1 1.05-3.606 22.506 22.506 0 0 1 1.05 3.606m-1.05 0a22.506 22.506 0 0 0 1.05 3.606m-1.05-3.606H13.5m-3.606 1.05a22.506 22.506 0 0 1 3.606-1.05m-3.606 1.05a22.506 22.506 0 0 0 3.606 1.05" /></svg>
                    <span class="text-xs tracking-widest uppercase {{ request()->routeIs('admin.broadcast') ? '' : 'font-medium' }}">Broadcast Pesan</span>
                </a>

                {{-- 2.7 Manajemen Relawan --}}
                <a href="{{ route('admin.volunteers') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.volunteers') ? 'bg-teal-500/10 text-teal-400 font-bold border border-teal-500/20' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="{{ request()->routeIs('admin.volunteers') ? '2' : '1.5' }}" stroke="currentColor" class="w-5 h-5 {{ request()->routeIs('admin.volunteers') ? '' : 'opacity-70' }}"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" /></svg>
                    <span class="text-xs tracking-widest uppercase {{ request()->routeIs('admin.volunteers') ? '' : 'font-medium' }}">Calon Relawan</span>
                </a>

                {{-- 3. Pemetaan Wilayah --}}
                <a href="{{ route('admin.map') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.map') ? 'bg-teal-500/10 text-teal-400 font-bold border border-teal-500/20' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="{{ request()->routeIs('admin.map') ? '2' : '1.5' }}" stroke="currentColor" class="w-5 h-5 {{ request()->routeIs('admin.map') ? '' : 'opacity-70' }}"><path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" /></svg>
                    <span class="text-xs tracking-widest uppercase {{ request()->routeIs('admin.map') ? '' : 'font-medium' }}">Pemetaan Wilayah</span>
                </a>

                {{-- 4. Manajemen Konten --}}
                <a href="{{ route('admin.cms.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.cms.*') ? 'bg-teal-500/10 text-teal-400 font-bold border border-teal-500/20' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="{{ request()->routeIs('admin.cms.*') ? '2' : '1.5' }}" stroke="currentColor" class="w-5 h-5 {{ request()->routeIs('admin.cms.*') ? '' : 'opacity-70' }}"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" /></svg>
                    <span class="text-xs tracking-widest uppercase {{ request()->routeIs('admin.cms.*') ? '' : 'font-medium' }}">Manajemen Konten</span>
                </a>

                {{-- 4.1 Kelola Berita Pinjol --}}
                <a href="{{ route('admin.news') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.news') ? 'bg-teal-500/10 text-teal-400 font-bold border border-teal-500/20' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="{{ request()->routeIs('admin.news') ? '2' : '1.5' }}" stroke="currentColor" class="w-5 h-5 {{ request()->routeIs('admin.news') ? '' : 'opacity-70' }}"><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" /></svg>
                    <span class="text-xs tracking-widest uppercase {{ request()->routeIs('admin.news') ? '' : 'font-medium' }}">Kelola Berita</span>
                </a>

                {{-- 4.5 Moderasi Komentar --}}
                <a href="{{ route('admin.comments.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.comments.*') ? 'bg-teal-500/10 text-teal-400 font-bold border border-teal-500/20' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="{{ request()->routeIs('admin.comments.*') ? '2' : '1.5' }}" stroke="currentColor" class="w-5 h-5 {{ request()->routeIs('admin.comments.*') ? '' : 'opacity-70' }}"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3h9m-9 3h3m-6.75 4.125 3.375-3.375h9.75a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-13.5A2.25 2.25 0 0 0 2.25 6v9a2.25 2.25 0 0 0 2.25 2.25z" /></svg>
                    <span class="text-xs tracking-widest uppercase {{ request()->routeIs('admin.comments.*') ? '' : 'font-medium' }}">Moderasi Komentar</span>
                </a>

                <div class="pt-6 pb-3">
                    <div class="px-4 text-[10px] font-black text-slate-600 uppercase tracking-[0.2em]">Administrator</div>
                </div>

                {{-- 5. Manajemen Pengguna --}}
                @role('super-admin')
                <a href="{{ route('admin.users') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.users') ? 'bg-teal-500/10 text-teal-400 font-bold border border-teal-500/20' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="{{ request()->routeIs('admin.users') ? '2' : '1.5' }}" stroke="currentColor" class="w-5 h-5 {{ request()->routeIs('admin.users') ? '' : 'opacity-70' }}"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" /></svg>
                    <span class="text-xs tracking-widest uppercase {{ request()->routeIs('admin.users') ? '' : 'font-medium' }}">Pengguna & Akses</span>
                </a>
                @endrole

                {{-- 6. Pengaturan --}}
                <a href="{{ route('admin.settings') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.settings') ? 'bg-teal-500/10 text-teal-400 font-bold border border-teal-500/20' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="{{ request()->routeIs('admin.settings') ? '2' : '1.5' }}" stroke="currentColor" class="w-5 h-5 {{ request()->routeIs('admin.settings') ? '' : 'opacity-70' }}"><path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /></svg>
                    <span class="text-xs tracking-widest uppercase {{ request()->routeIs('admin.settings') ? '' : 'font-medium' }}">Pengaturan Sistem</span>
                </a>

                {{-- 7. Audit Log --}}
                <a href="{{ route('admin.audit-log') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.audit-log') ? 'bg-teal-500/10 text-teal-400 font-bold border border-teal-500/20' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="{{ request()->routeIs('admin.audit-log') ? '2' : '1.5' }}" stroke="currentColor" class="w-5 h-5 {{ request()->routeIs('admin.audit-log') ? '' : 'opacity-70' }}"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375c0 .621-.504 1.125-1.125 1.125H6.375C5.754 20.25 5.25 19.746 5.25 19.125V9.375c0-.621.504-1.125 1.125-1.125Z" /></svg>
                    <span class="text-xs tracking-widest uppercase {{ request()->routeIs('admin.audit-log') ? '' : 'font-medium' }}">Audit Log</span>
                </a>
            </div>

            {{-- User Bottom Area --}}
            <div class="p-4 border-t border-white/5 bg-slate-900/50">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-3 px-4 py-3 rounded-xl bg-white/5 text-slate-400 hover:text-white hover:bg-rose-500/20 hover:text-rose-400 transition-all border border-white/5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" /></svg>
                        <span class="text-xs font-black uppercase tracking-widest">Keluar Sesi</span>
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main Content Area --}}
        <div class="flex-1 flex flex-col min-w-0 bg-[#020617] relative">
            {{-- Top Navbar --}}
            <header class="h-16 bg-slate-950/50 border-b border-white/5 flex items-center justify-between px-6 lg:px-10 shrink-0 sticky top-0 z-10 backdrop-blur-xl">
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = true" class="lg:hidden p-2 -ml-2 rounded-xl text-slate-400 hover:bg-white/5 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg>
                    </button>
                    <div class="flex items-center gap-3">
                        <span class="w-2 h-2 rounded-full bg-teal-500 animate-pulse shadow-[0_0_10px_rgba(20,184,166,0.5)]"></span>
                        <h1 class="font-black text-white uppercase tracking-tighter text-xs hidden sm:block">Panel Kendali <span class="text-slate-600 font-bold ml-1">V2.0</span></h1>
                    </div>
                </div>

                <div class="flex items-center gap-8">
                    <a href="{{ url('/') }}" class="group flex items-center gap-2 text-[10px] font-black text-slate-500 hover:text-teal-400 transition-all uppercase tracking-[0.2em]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-3 h-3 group-hover:-translate-x-1 transition-transform"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" /></svg>
                        Kembali ke Web Publik
                    </a>
                    
                    <div class="w-px h-6 bg-white/5 hidden sm:block"></div>

                    <livewire:admin-notification-center />
                    
                    <div class="flex items-center gap-4">
                        <div class="text-right hidden sm:block">
                            <div class="text-[11px] font-black text-white leading-none uppercase tracking-widest mb-1">{{ Auth::user()->name }}</div>
                            <div class="text-[9px] font-black text-teal-500 uppercase tracking-[0.2em]">
                                {{ Auth::user()->roles->pluck('name')->first() ?? 'Staff' }}
                            </div>
                        </div>
                        <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-teal-500 to-indigo-600 border border-white/10 shadow-xl flex items-center justify-center text-white font-black text-sm uppercase overflow-hidden group">
                            @if(Auth::user()->avatar_url)
                                <img src="{{ Auth::user()->avatar_url }}" alt="{{ Auth::user()->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform">
                            @else
                                {{ substr(Auth::user()->name, 0, 1) }}
                            @endif
                        </div>
                    </div>
                </div>
            </header>

            {{-- Main Scrollable Content --}}
            <main class="flex-1 overflow-x-hidden overflow-y-auto">
                {{ $slot }}
            </main>
        </div>
    </div>
    
    @livewireScripts
    @stack('scripts')
</body>
</html>
