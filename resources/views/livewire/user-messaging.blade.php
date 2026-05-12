
<div class="bg-slate-900 border border-slate-800 rounded-[2.5rem] p-8 shadow-xl h-[80vh] flex flex-col">
    <h4 class="font-black text-white mb-6 uppercase text-xs tracking-widest flex items-center gap-4">
        <span class="w-10 h-10 bg-purple-500/10 text-purple-400 rounded-xl flex items-center justify-center text-xl">✉️</span>
        Pusat Pesan Bantuan
    </h4>
    
    {{-- Message Display Area --}}
    <div class="flex-grow space-y-6 overflow-y-auto p-4 bg-slate-950/50 rounded-2xl mb-6">
        @forelse($messages->reverse() as $message)
            @if($message->sender_id === Auth::id())
                {{-- User's Message (Right) --}}
                <div class="flex justify-end">
                    <div class="bg-teal-600 text-white p-4 rounded-2xl rounded-br-none max-w-sm">
                        <p class="text-sm">{{ $message->content }}</p>
                        <div class="text-xs text-teal-100/70 mt-2 text-right">{{ $message->created_at->format('H:i') }}</div>
                    </div>
                </div>
            @else
                {{-- Admin's Message (Left) --}}
                <div class="flex justify-start">
                    <div class="bg-slate-800 text-slate-300 p-4 rounded-2xl rounded-bl-none max-w-sm">
                        <p class="text-sm font-bold mb-1">{{ $message->sender->name ?? 'Admin' }}</p>
                        <p class="text-sm">{{ $message->content }}</p>
                        <div class="text-xs text-slate-500 mt-2">{{ $message->created_at->format('H:i') }}</div>
                    </div>
                </div>
            @endif
        @empty
            <div class="text-center py-20">
                <div class="text-5xl mb-4">💬</div>
                <p class="text-slate-500 font-bold">Belum ada percakapan.</p>
                <p class="text-slate-600 text-sm">Mulai percakapan dengan tim kami di bawah ini.</p>
            </div>
        @endforelse
    </div>

    {{-- Message Input Form --}}
    <div>
        <form wire:submit.prevent="sendMessage" class="flex items-center gap-4">
            <textarea 
                wire:model="newMessage"
                rows="1" 
                class="flex-grow bg-slate-800 border-slate-700 text-white rounded-2xl px-6 py-4 focus:ring-purple-500 focus:border-purple-500 placeholder:text-slate-600"
                placeholder="Ketik pesan Anda untuk admin..."
            ></textarea>
            <button type="submit" class="h-14 w-14 shrink-0 bg-purple-600 text-white rounded-full hover:bg-purple-500 transition-all shadow-lg flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                  <path d="M3.105 2.289a.75.75 0 00-.826.95l1.414 4.949a.75.75 0 00.95.53l4.285-1.285a.75.75 0 01.95.95l-1.285 4.285a.75.75 0 00.53.95l4.95 1.414a.75.75 0 00.95-.826l-2.289-7.995a.75.75 0 00-1.07-.478L3.105 2.29z" />
                </svg>
            </button>
        </form>
    </div>
</div>
