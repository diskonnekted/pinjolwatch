<div class="flex flex-col h-[600px] bg-slate-900 border border-slate-800 rounded-[2.5rem] overflow-hidden shadow-2xl">
    {{-- Session Header --}}
    <div class="bg-slate-950/50 p-6 border-b border-slate-800/50 flex justify-between items-center backdrop-blur-md">
        <div class="flex items-center gap-4">
            <div class="relative">
                <div class="w-12 h-12 rounded-2xl bg-teal-500/10 border border-teal-500/20 flex items-center justify-center text-xl">
                    🛡️
                </div>
                @if($session->status === 'active')
                    <span class="absolute -top-1 -right-1 w-4 h-4 bg-emerald-500 border-2 border-slate-950 rounded-full animate-pulse"></span>
                @endif
            </div>
            <div>
                <h4 class="text-sm font-black text-white uppercase tracking-tight">
                    @if($session->status === 'waiting') Menunggu Relawan... @else Sesi Aktif @endif
                </h4>
                <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">
                    ID Sesi: #{{ substr($session->id, 0, 8) }}
                </p>
            </div>
        </div>
        
        @if($session->status === 'active' || $session->status === 'waiting')
            <button wire:click="endSession" wire:confirm="Anda yakin ingin mengakhiri sesi ini? Seluruh riwayat akan diarsipkan." class="px-6 py-3 bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white border border-red-500/20 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all">
                Selesaikan Sesi
            </button>
        @endif
    </div>

    {{-- Messages Area --}}
    <div class="flex-1 overflow-y-auto p-8 space-y-6 custom-scrollbar bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] bg-fixed" id="chat-window">
        @if($session->status === 'waiting')
            <div class="flex flex-col items-center justify-center h-full text-center space-y-4">
                <div class="w-20 h-20 bg-teal-500/5 rounded-full flex items-center justify-center animate-pulse">
                    <div class="w-10 h-10 bg-teal-500/20 rounded-full flex items-center justify-center">
                        <div class="w-4 h-4 bg-teal-500 rounded-full"></div>
                    </div>
                </div>
                <p class="text-xs font-black text-slate-500 uppercase tracking-widest">Relawan kami sedang bersiap...</p>
                <p class="text-[10px] text-slate-600 max-w-xs font-medium">Mohon tunggu sebentar. Privasi Anda terlindungi sepenuhnya dalam ruang ini.</p>
            </div>
        @endif

        @foreach($messages as $message)
            @php $isMe = $message->sender_id === Auth::id(); @endphp
            <div class="flex {{ $isMe ? 'justify-end' : 'justify-start' }} animate-in fade-in slide-in-from-bottom-2">
                <div class="max-w-[80%] flex flex-col {{ $isMe ? 'items-end' : 'items-start' }} gap-2">
                    <div class="px-6 py-4 rounded-[2rem] text-sm font-medium leading-relaxed shadow-lg
                        {{ $isMe ? 'bg-primary-600 text-white rounded-tr-none' : 'bg-slate-800 text-slate-200 rounded-tl-none border border-slate-700' }}">
                        {{ $message->content }}
                    </div>
                    <span class="text-[9px] text-slate-600 font-black uppercase tracking-widest px-2">
                        {{ $message->created_at->format('H:i') }}
                    </span>
                </div>
            </div>
        @endforeach

        @if($session->status === 'completed')
            <div class="bg-emerald-500/10 border border-emerald-500/20 rounded-2xl p-6 text-center">
                <p class="text-xs font-black text-emerald-400 uppercase tracking-widest mb-1">Sesi Berakhir</p>
                <p class="text-[10px] text-slate-500 font-bold">Terima kasih telah berbagi. Anda kuat, Anda berharga.</p>
            </div>
        @endif
    </div>

    {{-- Input Area --}}
    @if($session->status === 'active' || $session->status === 'waiting')
        <div class="p-6 bg-slate-950/30 border-t border-slate-800/50">
            <form wire:submit.prevent="sendMessage" class="relative group">
                <textarea 
                    wire:model="newMessage"
                    placeholder="Tulis pesan Anda secara anonim di sini..."
                    class="w-full bg-slate-900 border-slate-800 rounded-3xl pl-6 pr-24 py-4 text-sm text-slate-200 focus:ring-teal-500 focus:border-teal-500 custom-scrollbar font-medium placeholder:text-slate-700"
                    rows="1"
                    @keydown.enter.prevent="$wire.sendMessage()"></textarea>
                
                <div class="absolute right-3 top-1/2 -translate-y-1/2 flex items-center gap-2">
                    <button type="submit" class="w-12 h-12 bg-teal-600 hover:bg-teal-500 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-teal-900/20 transition-all active:scale-90">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0 1 21.485 12 59.77 59.77 0 0 1 3.27 20.876L5.999 12zm0 0h7.5" />
                        </svg>
                    </button>
                </div>
            </form>
            <div class="mt-4 flex justify-between items-center px-4">
                <p class="text-[9px] text-slate-700 font-black uppercase tracking-widest">Chat terenkripsi secara otomatis</p>
                <div class="flex gap-4">
                    <span class="text-[9px] text-slate-700 font-black uppercase tracking-widest hover:text-teal-500 cursor-pointer transition-colors">Kirim File</span>
                    <span class="text-[9px] text-slate-700 font-black uppercase tracking-widest hover:text-teal-500 cursor-pointer transition-colors">Bantuan</span>
                </div>
            </div>
        </div>
    @endif
</div>

<script>
    document.addEventListener('livewire:initialized', () => {
        const scrollChat = () => {
            const win = document.getElementById('chat-window');
            if (win) win.scrollTop = win.scrollHeight;
        };
        
        scrollChat();
        Livewire.on('message-sent', () => setTimeout(scrollChat, 100));
    });
</script>
