<div class="h-[calc(100-4rem)] flex overflow-hidden bg-white">
    {{-- Sidebar: User List --}}
    <div class="w-80 border-r border-slate-100 flex flex-col bg-slate-50/50">
        <div class="p-6 border-b border-slate-100 bg-white">
            <h2 class="text-lg font-black text-slate-900 tracking-tighter uppercase">Pesan <span class="text-primary-600">User</span></h2>
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">Konsultasi & Bantuan</p>
        </div>
        
        <div class="flex-1 overflow-y-auto">
            @forelse($users as $user)
                <button wire:click="selectUser({{ $user->id }})" 
                        class="w-full p-4 flex items-center gap-3 hover:bg-white transition-all border-b border-slate-100/50 relative {{ $selectedUserId == $user->id ? 'bg-white border-l-4 border-l-primary-500' : '' }}">
                    @if($user->avatar_url)
                        <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}" class="w-10 h-10 rounded-xl object-cover shrink-0">
                    @else
                        <div class="w-10 h-10 rounded-xl bg-slate-200 flex items-center justify-center font-black text-slate-500 shrink-0">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                    @endif
                    <div class="flex-1 text-left min-w-0">
                        <p class="text-xs font-black text-slate-900 truncate">{{ $user->name }}</p>
                        <p class="text-[10px] font-bold text-slate-400 truncate">{{ $user->email }}</p>
                    </div>
                    @if($user->unread_count > 0)
                        <span class="px-1.5 py-0.5 bg-rose-500 text-white text-[9px] font-black rounded-full">{{ $user->unread_count }}</span>
                    @endif
                </button>
            @empty
                <div class="p-10 text-center opacity-30">
                    <p class="text-[10px] font-black uppercase tracking-widest">Belum ada pesan</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- Main: Chat Window --}}
    <div class="flex-1 flex flex-col bg-white">
        @if($selectedUser)
            <div class="p-4 border-b border-slate-100 flex items-center justify-between bg-white sticky top-0 z-10">
                <div class="flex items-center gap-3">
                    @if($selectedUser->avatar_url)
                        <img src="{{ $selectedUser->avatar_url }}" alt="{{ $selectedUser->name }}" class="w-10 h-10 rounded-xl object-cover shrink-0">
                    @else
                        <div class="w-10 h-10 rounded-xl bg-primary-100 text-primary-600 flex items-center justify-center font-black shrink-0">
                            {{ substr($selectedUser->name, 0, 1) }}
                        </div>
                    @endif
                    <div>
                        <h3 class="text-sm font-black text-slate-900">{{ $selectedUser->name }}</h3>
                        <p class="text-[10px] font-bold text-emerald-500 uppercase tracking-widest">Active Chat</p>
                    </div>
                </div>
            </div>

            <div class="flex-1 overflow-y-auto p-6 space-y-4 bg-slate-50/30 custom-scrollbar" id="chat-container">
                @foreach($conversation as $msg)
                    <div class="flex {{ $msg->sender_id == auth()->id() ? 'justify-end' : 'justify-start' }}">
                        <div class="max-w-[70%] {{ $msg->sender_id == auth()->id() ? 'bg-slate-900 text-white rounded-2xl rounded-tr-none' : 'bg-white border border-slate-100 text-slate-900 rounded-2xl rounded-tl-none shadow-sm' }} p-4">
                            <p class="text-sm leading-relaxed">{{ $msg->content }}</p>
                            <p class="text-[9px] mt-2 opacity-50 font-bold uppercase tracking-widest text-right">
                                {{ $msg->created_at->format('H:i') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="p-6 border-t border-slate-100 bg-white">
                {{-- Templates Bar --}}
                <div class="mb-4">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 px-1">Templat Jawaban (FAQ)</p>
                    <div class="flex gap-2 overflow-x-auto pb-2 custom-scrollbar">
                        @foreach($templates as $template)
                            <button wire:click="useTemplate({{ $template['id'] }})" 
                                    class="whitespace-nowrap px-3 py-1.5 bg-slate-100 hover:bg-slate-900 hover:text-white text-slate-600 rounded-lg text-[10px] font-black uppercase tracking-tighter transition-all border border-slate-200">
                                {{ $template['title'] }}
                            </button>
                        @endforeach
                    </div>
                </div>

                <form wire:submit.prevent="sendReply" class="flex gap-4">
                    <input wire:model="replyMessage" type="text" placeholder="Tulis balasan..." 
                           class="flex-1 bg-slate-50 border-slate-200 rounded-2xl px-6 py-3 text-sm font-medium focus:ring-primary-500 focus:border-primary-500">
                    <button type="submit" class="px-6 py-3 bg-primary-600 hover:bg-primary-500 text-white rounded-2xl font-black text-xs uppercase tracking-widest transition-all shadow-lg shadow-primary-500/30">
                        Kirim
                    </button>
                </form>
            </div>
        @else
            <div class="flex-1 flex flex-col items-center justify-center text-center p-10 opacity-40">
                <div class="w-20 h-20 rounded-3xl bg-slate-100 flex items-center justify-center text-slate-400 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" /></svg>
                </div>
                <h3 class="text-sm font-black text-slate-900 uppercase tracking-tighter">Pilih percakapan</h3>
                <p class="text-xs font-medium text-slate-500 mt-1 max-w-xs">Silakan pilih pengguna dari sidebar untuk mulai membalas pesan konsultasi.</p>
            </div>
        @endif
    </div>
</div>
