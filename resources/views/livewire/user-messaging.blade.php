<div class="bg-slate-900 border border-slate-800 rounded-[2.5rem] shadow-2xl h-[85vh] flex flex-col overflow-hidden relative group">
    {{-- Decorative Background Glow --}}
    <div class="absolute -top-24 -right-24 w-64 h-64 bg-purple-600/10 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-teal-600/10 rounded-full blur-[100px] pointer-events-none"></div>

    {{-- Chat Header --}}
    <div class="p-6 border-b border-slate-800 bg-slate-900/50 backdrop-blur-md flex items-center justify-between sticky top-0 z-10">
        <div class="flex items-center gap-4">
            <div class="relative">
                <img src="/avatars/fiona.png" alt="Fiona" class="w-12 h-12 rounded-2xl object-cover border-2 border-purple-500/30">
                <span class="absolute -bottom-1 -right-1 w-4 h-4 bg-emerald-500 border-4 border-slate-900 rounded-full"></span>
            </div>
            <div>
                <h4 class="font-black text-white text-sm uppercase tracking-tighter italic">Fiona <span class="text-purple-400">Admin</span></h4>
                <div class="flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse"></span>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Siap Membantu</span>
                </div>
            </div>
        </div>
        <div class="flex gap-2">
            <div class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center text-slate-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" /></svg>
            </div>
        </div>
    </div>
    
    {{-- Message Display Area --}}
    <div class="flex-grow space-y-6 overflow-y-auto p-6 bg-slate-950/20 custom-scrollbar" id="message-container">
        @forelse($messages->reverse() as $message)
            @if($message->sender_id === Auth::id())
                {{-- User's Message (Right) --}}
                <div class="flex justify-end animate-in slide-in-from-right-4 duration-300">
                    <div class="max-w-[80%] flex flex-col items-end">
                        <div class="bg-gradient-to-br from-purple-600 to-indigo-700 text-white p-4 rounded-3xl rounded-tr-none shadow-lg shadow-purple-900/20">
                            <p class="text-sm leading-relaxed font-medium">{{ $message->content }}</p>
                        </div>
                        <div class="text-[9px] font-black text-slate-500 mt-2 uppercase tracking-widest flex items-center gap-2">
                            {{ $message->created_at->format('H:i') }}
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3 h-3 text-purple-400">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4.026-5.542z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
            @else
                {{-- Admin's Message (Left) --}}
                <div class="flex justify-start items-end gap-3 animate-in slide-in-from-left-4 duration-300">
                    <img src="{{ $message->sender->avatar_url ?? '/avatars/fiona.png' }}" class="w-8 h-8 rounded-full object-cover border border-slate-700 shadow-lg">
                    <div class="max-w-[80%]">
                        <div class="bg-slate-800 border border-slate-700 text-slate-200 p-4 rounded-3xl rounded-bl-none shadow-sm backdrop-blur-sm">
                            <p class="text-xs font-black text-purple-400 uppercase tracking-tighter mb-1">{{ $message->sender->name ?? 'Fiona' }}</p>
                            <p class="text-sm leading-relaxed">{{ $message->content }}</p>
                        </div>
                        <div class="text-[9px] font-black text-slate-500 mt-2 uppercase tracking-widest">{{ $message->created_at->format('H:i') }}</div>
                    </div>
                </div>
            @endif
        @empty
            <div class="h-full flex flex-col items-center justify-center text-center p-10 opacity-50">
                <div class="w-24 h-24 bg-slate-800 rounded-[2rem] flex items-center justify-center text-5xl mb-6 border border-slate-700 animate-bounce">
                    💬
                </div>
                <h3 class="text-xl font-black text-white uppercase italic">Belum Ada Percakapan</h3>
                <p class="text-slate-500 text-sm mt-2 max-w-xs">Tim responder kami siap mendengarkan cerita Anda. Jangan ragu untuk memulai.</p>
            </div>
        @endforelse
    </div>

    {{-- Message Input Form --}}
    <div class="p-6 bg-slate-900/80 backdrop-blur-xl border-t border-slate-800">
        <form wire:submit.prevent="sendMessage" class="relative">
            <textarea 
                wire:model="newMessage"
                rows="1" 
                class="w-full bg-slate-950 border-2 border-slate-800 text-white rounded-3xl pl-6 pr-16 py-5 focus:ring-4 focus:ring-purple-500/20 focus:border-purple-500/50 placeholder:text-slate-600 text-sm font-medium transition-all resize-none overflow-hidden"
                placeholder="Ketik keluhan atau pertanyaan Anda..."
                oninput="this.style.height = ''; this.style.height = this.scrollHeight + 'px'"
            ></textarea>
            <button type="submit" class="absolute right-3 top-3 h-11 w-11 bg-gradient-to-tr from-purple-600 to-indigo-600 text-white rounded-2xl hover:scale-105 active:scale-95 transition-all shadow-lg shadow-purple-900/40 flex items-center justify-center group/btn">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 group-hover/btn:translate-x-1 group-hover/btn:-translate-y-1 transition-transform">
                  <path d="M3.105 2.289a.75.75 0 00-.826.95l1.414 4.949a.75.75 0 00.95.53l4.285-1.285a.75.75 0 01.95.95l-1.285 4.285a.75.75 0 00.53.95l4.95 1.414a.75.75 0 00.95-.826l-2.289-7.995a.75.75 0 00-1.07-.478L3.105 2.29z" />
                </svg>
            </button>
        </form>
        <p class="text-[9px] text-slate-500 font-bold uppercase tracking-[0.2em] text-center mt-4 italic">Pesan Anda dienkripsi dan dijaga kerahasiaannya oleh Tim PinjolWatch</p>
    </div>
</div>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #334155;
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #475569;
    }
</style>

