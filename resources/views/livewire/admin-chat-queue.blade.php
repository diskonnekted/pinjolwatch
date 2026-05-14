<div class="h-[calc(100vh-120px)] flex gap-6 p-6">
    {{-- Sidebar: Queue --}}
    <div class="w-80 flex flex-col gap-6">
        {{-- Waiting Queue --}}
        <div class="flex-1 bg-slate-900 border border-slate-800 rounded-3xl overflow-hidden flex flex-col shadow-xl">
            <div class="p-5 border-b border-slate-800 flex justify-between items-center bg-slate-950/50">
                <h3 class="text-xs font-black text-white uppercase tracking-widest flex items-center gap-2">
                    <span class="w-2 h-2 bg-amber-500 rounded-full animate-pulse"></span>
                    Antrean Menunggu
                </h3>
                <span class="bg-slate-800 text-slate-400 text-[10px] font-black px-2 py-0.5 rounded-full">{{ $waitingSessions->count() }}</span>
            </div>
            <div class="flex-1 overflow-y-auto p-4 space-y-3 custom-scrollbar">
                @forelse($waitingSessions as $session)
                    <button wire:click="selectSession('{{ $session->id }}')" class="w-full p-4 bg-slate-800/50 border border-slate-700/50 rounded-2xl text-left hover:border-amber-500/50 transition-all group">
                        <p class="text-xs font-black text-white uppercase tracking-tight mb-1">{{ $session->requester->nickname ?: $session->requester->name }}</p>
                        <p class="text-[10px] text-slate-500 font-medium ">Menunggu {{ $session->created_at->diffForHumans() }}</p>
                    </button>
                @empty
                    <div class="h-full flex flex-col items-center justify-center text-center p-6 opacity-20">
                        <span class="text-4xl mb-2">☕</span>
                        <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Antrean Kosong</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- My Active Sessions --}}
        <div class="h-1/2 bg-slate-900 border border-slate-800 rounded-3xl overflow-hidden flex flex-col shadow-xl">
            <div class="p-5 border-b border-slate-800 flex justify-between items-center bg-slate-950/50">
                <h3 class="text-xs font-black text-white uppercase tracking-widest flex items-center gap-2">
                    <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
                    Sesi Saya
                </h3>
                <span class="bg-slate-800 text-slate-400 text-[10px] font-black px-2 py-0.5 rounded-full">{{ $myActiveSessions->count() }}</span>
            </div>
            <div class="flex-1 overflow-y-auto p-4 space-y-3 custom-scrollbar">
                @foreach($myActiveSessions as $session)
                    <button wire:click="selectSession('{{ $session->id }}')" class="w-full p-4 {{ $activeSessionId === $session->id ? 'bg-primary-600 border-primary-500' : 'bg-slate-800/50 border-slate-700/50' }} border rounded-2xl text-left hover:border-primary-500 transition-all group">
                        <p class="text-xs font-black {{ $activeSessionId === $session->id ? 'text-white' : 'text-slate-200' }} uppercase tracking-tight mb-1">{{ $session->requester->nickname ?: $session->requester->name }}</p>
                        <p class="text-[10px] {{ $activeSessionId === $session->id ? 'text-primary-200' : 'text-slate-500' }} font-medium ">Aktif {{ $session->updated_at->diffForHumans() }}</p>
                    </button>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Chat Area --}}
    <div class="flex-1 bg-slate-900 border border-slate-800 rounded-[2.5rem] overflow-hidden flex flex-col shadow-2xl shadow-black/50 relative">
        @if($selectedSession)
            {{-- Chat Header --}}
            <div class="p-6 border-b border-slate-800 bg-slate-950/50 flex justify-between items-center backdrop-blur-md">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-primary-500/10 border border-primary-500/20 flex items-center justify-center text-xl shadow-lg shadow-primary-500/5">
                        👤
                    </div>
                    <div>
                        <h4 class="text-sm font-black text-white uppercase tracking-tight">{{ $selectedSession->requester->nickname ?: $selectedSession->requester->name }}</h4>
                        <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">
                            Sesi Dimulai: {{ $selectedSession->created_at->format('H:i') }}
                        </p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <button wire:click="closeSession" wire:confirm="Selesaikan sesi ini?" class="px-6 py-2.5 bg-slate-800 hover:bg-red-600 text-slate-300 hover:text-white rounded-xl text-[10px] font-black uppercase tracking-widest border border-slate-700 transition-all">
                        Selesaikan Sesi
                    </button>
                </div>
            </div>

            {{-- Chat Messages --}}
            <div class="flex-1 overflow-y-auto p-8 space-y-6 custom-scrollbar bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] bg-fixed" id="admin-chat-window">
                @foreach($conversation as $message)
                    @php $isMe = $message->sender_id === Auth::id(); @endphp
                    <div class="flex {{ $isMe ? 'justify-end' : 'justify-start' }} animate-in fade-in slide-in-from-bottom-2">
                        <div class="max-w-[70%] flex flex-col {{ $isMe ? 'items-end' : 'items-start' }} gap-2">
                            <div class="px-6 py-4 rounded-[2rem] text-sm font-medium leading-relaxed shadow-lg
                                {{ $isMe ? 'bg-slate-700 text-white rounded-tr-none' : 'bg-primary-600 text-white rounded-tl-none' }}">
                                {{ $message->content }}
                            </div>
                            <span class="text-[9px] text-slate-600 font-black uppercase tracking-widest px-2">
                                {{ $isMe ? 'Admin' : 'Penyintas' }} &bull; {{ $message->created_at->format('H:i') }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Input --}}
            <div class="p-6 border-t border-slate-800 bg-slate-950/30">
                <form wire:submit.prevent="sendMessage" class="relative">
                    <textarea 
                        wire:model="replyMessage"
                        placeholder="Tulis balasan Anda..."
                        class="w-full bg-slate-800 border-slate-700 rounded-3xl pl-6 pr-24 py-4 text-sm text-slate-200 focus:ring-primary-500 focus:border-primary-500 custom-scrollbar font-medium"
                        rows="1"
                        @keydown.enter.prevent="$wire.sendMessage()"></textarea>
                    
                    <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 w-12 h-12 bg-primary-600 hover:bg-primary-500 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-primary-900/20 transition-all active:scale-90">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0 1 21.485 12 59.77 59.77 0 0 1 3.27 20.876L5.999 12zm0 0h7.5" />
                        </svg>
                    </button>
                </form>
            </div>
        @else
            <div class="flex-1 flex flex-col items-center justify-center text-center p-20">
                <div class="w-32 h-32 bg-slate-800 rounded-[2.5rem] flex items-center justify-center text-5xl mb-8 shadow-2xl animate-bounce duration-[3000ms]">
                    📩
                </div>
                <h3 class="text-2xl font-black text-white uppercase  tracking-tighter mb-4">Pilih Sesi Obrolan</h3>
                <p class="text-slate-500 text-sm max-w-sm font-medium leading-relaxed">
                    Klik pada antrean menunggu atau sesi aktif Anda untuk mulai memberikan dukungan kepada penyintas.
                </p>
            </div>
        @endif
    </div>
</div>

<script>
    document.addEventListener('livewire:initialized', () => {
        const scrollAdminChat = () => {
            const win = document.getElementById('admin-chat-window');
            if (win) win.scrollTop = win.scrollHeight;
        };
        scrollAdminChat();
        Livewire.on('message-sent', () => setTimeout(scrollAdminChat, 100));
    });
</script>
