<div class="relative h-[calc(100vh-4rem)] bg-[#020617] text-slate-100 font-inter overflow-hidden flex">
    {{-- Decorative Background Elements --}}
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-teal-500/10 rounded-full blur-[120px] animate-pulse"></div>
        <div class="absolute bottom-1/4 -right-24 w-80 h-80 bg-indigo-500/10 rounded-full blur-[100px] animate-bounce-slow"></div>
    </div>

    {{-- Sidebar: User List --}}
    <div class="w-80 border-r border-white/5 flex flex-col glass relative z-20">
        <div class="p-8 border-b border-white/5 bg-slate-900/40">
            <div class="flex items-center gap-2 mb-2">
                <span class="w-1.5 h-1.5 rounded-full bg-teal-500 animate-pulse"></span>
                <span class="text-[10px] font-black text-teal-400 uppercase tracking-[0.2em]">Live Channels</span>
            </div>
            <h2 class="text-xl font-black text-white tracking-tighter uppercase">Pesan <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-indigo-500">Konsultasi</span></h2>
        </div>
        
        <div class="flex-1 overflow-y-auto custom-scrollbar p-3 space-y-1">
            @forelse($users as $user)
                <button wire:click="selectUser({{ $user->id }})" 
                        class="w-full p-4 flex items-center gap-3 rounded-2xl transition-all relative group {{ $selectedUserId == $user->id ? 'bg-teal-500/10 border border-teal-500/20' : 'hover:bg-white/5 border border-transparent' }}">
                    <div class="relative shrink-0">
                        @if($user->avatar_url)
                            <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}" class="w-11 h-11 rounded-xl object-cover">
                        @else
                            <div class="w-11 h-11 rounded-xl bg-slate-800 border border-white/5 flex items-center justify-center font-black text-teal-500 group-hover:scale-110 transition-transform">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                        @endif
                        @if($user->unread_count > 0)
                            <span class="absolute -top-1 -right-1 w-4 h-4 bg-rose-500 text-white text-[9px] font-black rounded-full flex items-center justify-center border-2 border-[#020617] animate-bounce">
                                {{ $user->unread_count }}
                            </span>
                        @endif
                    </div>
                    <div class="flex-1 text-left min-w-0">
                        <p class="text-xs font-black text-white truncate leading-none mb-1">{{ $user->name }}</p>
                        <p class="text-[9px] font-bold text-slate-500 uppercase tracking-widest truncate">{{ $user->email }}</p>
                    </div>
                </button>
            @empty
                <div class="py-20 text-center opacity-20">
                    <p class="text-[10px] font-black uppercase tracking-widest">Tidak ada pesan</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- Main: Chat Window --}}
    <div class="flex-1 flex flex-col relative z-10">
        @if($selectedUser)
            <div class="p-6 border-b border-white/5 flex items-center justify-between glass sticky top-0 z-10">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-slate-800 border border-white/5 flex items-center justify-center font-black text-teal-500 shadow-xl overflow-hidden">
                        @if($selectedUser->avatar_url)
                            <img src="{{ $selectedUser->avatar_url }}" alt="{{ $selectedUser->name }}" class="w-full h-full object-cover">
                        @else
                            {{ substr($selectedUser->name, 0, 1) }}
                        @endif
                    </div>
                    <div>
                        <h3 class="text-base font-black text-white leading-none mb-1">{{ $selectedUser->name }}</h3>
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-teal-500 animate-pulse"></span>
                            <span class="text-[10px] font-black text-teal-500 uppercase tracking-[0.2em]">Sesi Aktif</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex-1 overflow-y-auto p-8 space-y-6 custom-scrollbar" id="chat-container">
                @foreach($conversation as $msg)
                    <div class="flex {{ $msg->sender_id == auth()->id() ? 'justify-end' : 'justify-start' }}">
                        <div class="max-w-[70%] group">
                            <div class="relative p-5 rounded-[2rem] shadow-2xl transition-all {{ $msg->sender_id == auth()->id() ? 'bg-gradient-to-br from-teal-500 to-indigo-600 text-white rounded-tr-none shadow-teal-500/10' : 'glass border-white/10 text-slate-200 rounded-tl-none' }}">
                                <p class="text-sm leading-relaxed font-medium">{{ $msg->content }}</p>
                                <p class="text-[9px] mt-3 opacity-40 font-black uppercase tracking-[0.1em] text-right">
                                    {{ $msg->created_at->format('H:i') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="p-8 glass border-t border-white/5 mt-auto">
                {{-- Templates Bar --}}
                <div class="mb-6">
                    <div class="flex items-center gap-2 mb-3 ml-1">
                        <svg class="w-3 h-3 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Templat Respons FAQ</p>
                    </div>
                    <div class="flex gap-2 overflow-x-auto pb-2 custom-scrollbar">
                        @foreach($templates as $template)
                            <button wire:click="useTemplate({{ $template['id'] }})" 
                                    class="whitespace-nowrap px-4 py-2 bg-slate-900/60 hover:bg-teal-500/20 hover:text-teal-400 text-slate-400 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all border border-white/5 hover:border-teal-500/30">
                                {{ $template['title'] }}
                            </button>
                        @endforeach
                    </div>
                </div>

                <form wire:submit.prevent="sendReply" class="flex gap-4 relative">
                    <div class="flex-1 relative group">
                        <input wire:model="replyMessage" type="text" placeholder="Tulis instruksi atau balasan..." 
                               class="w-full bg-slate-900/60 border-white/10 rounded-[1.5rem] px-8 py-5 text-sm font-medium text-white focus:ring-2 focus:ring-teal-500/50 focus:border-teal-500 transition-all backdrop-blur-md">
                    </div>
                    <button type="submit" class="px-10 py-5 bg-gradient-to-br from-teal-500 to-indigo-600 hover:from-teal-400 hover:to-indigo-500 text-white rounded-[1.5rem] font-black text-xs uppercase tracking-[0.2em] transition-all shadow-lg shadow-teal-500/20 active:scale-95 flex items-center gap-3">
                        Kirim
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>
                </form>
            </div>
        @else
            <div class="flex-1 flex flex-col items-center justify-center text-center p-20 relative">
                <div class="w-24 h-24 rounded-[2rem] bg-slate-900 border border-white/5 flex items-center justify-center text-slate-700 mb-8 relative group">
                    <div class="absolute inset-0 bg-teal-500/10 rounded-[2rem] blur-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 relative z-10"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" /></svg>
                </div>
                <h3 class="text-2xl font-black text-white uppercase tracking-tighter ">Pusat Komunikasi</h3>
                <p class="text-sm font-bold text-slate-500 mt-4 max-w-xs uppercase tracking-widest leading-relaxed">Pilih salah satu kanal di sebelah kiri untuk berinteraksi dengan pengguna.</p>
            </div>
        @endif
    </div>

    <style>
        .animate-bounce-slow { animation: bounce 6s infinite; }
        @keyframes bounce {
            0%, 100% { transform: translateY(-5%); animation-timing-function: cubic-bezier(0.8,0,1,1); }
            50% { transform: none; animation-timing-function: cubic-bezier(0,0,0.2,1); }
        }
    </style>
</div>
