<div class="relative" x-data="{ open: false }">
    <button @click="open = !open" class="relative p-2 rounded-xl text-slate-500 hover:bg-slate-100 transition-colors group">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 group-hover:text-primary-600 transition-colors">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
        </svg>
        
        @if($unreadCount > 0)
            <span class="absolute top-2 right-2 w-4 h-4 bg-rose-500 text-white text-[10px] font-black rounded-full flex items-center justify-center border-2 border-white animate-bounce">
                {{ $unreadCount }}
            </span>
        @endif
    </button>

    <div x-show="open" 
         @click.away="open = false"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95 translate-y-2"
         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         class="absolute right-0 mt-3 w-80 bg-white rounded-3xl shadow-2xl border border-slate-100 overflow-hidden z-50">
        
        <div class="p-5 border-b border-slate-50 flex items-center justify-between">
            <h3 class="text-sm font-black text-slate-900 uppercase tracking-tight">Notifikasi Baru</h3>
            @if($unreadCount > 0)
                <button wire:click="markAllAsRead" class="text-[10px] font-bold text-primary-600 hover:text-primary-700 uppercase tracking-widest">Tandai Semua Dibaca</button>
            @endif
        </div>

        <div class="max-h-[400px] overflow-y-auto custom-scrollbar">
            @forelse($notifications as $notification)
                <div class="p-4 border-b border-slate-50 last:border-0 hover:bg-slate-50 transition-colors cursor-pointer {{ $notification->read_at ? 'opacity-60' : '' }}" 
                     wire:click="markAsRead('{{ $notification->id }}')">
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 {{ $notification->data['type'] == 'report' ? 'bg-rose-100 text-rose-600' : ($notification->data['type'] == 'message' ? 'bg-blue-100 text-blue-600' : 'bg-emerald-100 text-emerald-600') }}">
                            @if($notification->data['type'] == 'report')
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" /></svg>
                            @elseif($notification->data['type'] == 'message')
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" /></svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3h9m-9 3h3m-6.75 4.125 3.375-3.375h9.75a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-13.5A2.25 2.25 0 0 0 2.25 6v9a2.25 2.25 0 0 0 2.25 2.25z" /></svg>
                            @endif
                        </div>
                        <div>
                            <p class="text-xs font-black text-slate-900 tracking-tight leading-tight">{{ $notification->data['title'] }}</p>
                            <p class="text-[10px] text-slate-500 mt-1 line-clamp-2 leading-relaxed">{{ $notification->data['message'] }}</p>
                            <p class="text-[9px] font-bold text-slate-400 mt-2 uppercase tracking-widest">{{ $notification->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-12 text-center">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Tidak ada notifikasi baru.</p>
                </div>
            @endforelse
        </div>

        <div class="p-4 bg-slate-50 text-center">
            <a href="#" class="text-[10px] font-black text-slate-500 hover:text-primary-600 uppercase tracking-widest">Lihat Semua Peristiwa</a>
        </div>
    </div>
</div>
