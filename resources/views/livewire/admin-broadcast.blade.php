<div class="py-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 bg-slate-50 min-h-screen">
    {{-- Header --}}
    <div class="mb-10">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-50 text-indigo-700 text-[10px] font-black tracking-widest uppercase mb-3 border border-indigo-100">
            <span class="w-2 h-2 rounded-full bg-indigo-500 animate-pulse"></span>
            Communication Hub
        </div>
        <h1 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tighter uppercase">
            Broadcast <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">Messages</span>
        </h1>
        <p class="text-slate-500 font-bold text-sm mt-1">Kirim pesan massal secara instan ke seluruh ekosistem PinjolWatch.</p>
    </div>

    @if (session()->has('message'))
        <div class="mb-8 px-6 py-4 bg-emerald-500 text-white rounded-[2rem] shadow-xl shadow-emerald-500/20 flex items-center justify-between animate-in fade-in zoom-in duration-500">
            <div class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                <span class="text-sm font-black uppercase tracking-tight">{{ session('message') }}</span>
            </div>
            <button @click="$el.parentElement.remove()" class="opacity-50 hover:opacity-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Form Side --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-[2.5rem] p-8 md:p-10 shadow-xl shadow-slate-200/50 border border-slate-100">
                <div class="mb-8">
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-4">Pilih Template Pesan</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @foreach($templates as $template)
                            <button wire:click="$set('selectedTemplate', '{{ $template['id'] }}'); applyTemplate()" 
                                    class="p-4 rounded-2xl border-2 text-left transition-all {{ $selectedTemplate === $template['id'] ? 'border-indigo-500 bg-indigo-50 ring-4 ring-indigo-500/10' : 'border-slate-50 bg-slate-50 hover:border-indigo-200 hover:bg-white' }}">
                                <p class="text-xs font-black text-slate-900 leading-tight mb-1">{{ $template['name'] }}</p>
                                <p class="text-[10px] font-medium text-slate-400 line-clamp-1 uppercase tracking-tighter">Preview tersedia</p>
                            </button>
                        @endforeach
                    </div>
                </div>

                <div class="mb-8">
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-4">Isi Pesan Broadcast</label>
                    <div class="relative">
                        <textarea wire:model="messageContent" rows="6" 
                                  placeholder="Ketik pesan Anda di sini... Gunakan [Name] untuk menyebut nama pengguna."
                                  class="w-full px-6 py-5 bg-slate-50 border-slate-100 rounded-[2rem] focus:ring-indigo-500 focus:border-indigo-500 text-sm font-medium leading-relaxed resize-none"></textarea>
                        <div class="absolute bottom-4 right-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                            Placeholder: <span class="text-indigo-600">[Name]</span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-4 border-t border-slate-50">
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-indigo-500"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" /></svg>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Pesan akan dikirim ke Inbox Dashboard User.</p>
                    </div>
                    <button wire:click="sendBroadcast" wire:loading.attr="disabled"
                            class="px-8 py-4 bg-indigo-600 hover:bg-indigo-500 text-white rounded-2xl font-black text-xs uppercase tracking-widest transition-all shadow-lg shadow-indigo-500/30 flex items-center gap-2">
                        <span wire:loading.remove>Luncurkan Broadcast</span>
                        <span wire:loading>Memproses...</span>
                    </button>
                </div>
            </div>
        </div>

        {{-- Configuration Side --}}
        <div class="space-y-6">
            <div class="bg-slate-900 rounded-[2.5rem] p-8 shadow-2xl border border-slate-800">
                <h3 class="text-xs font-black text-white uppercase tracking-widest mb-6 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-indigo-500 animate-ping"></span>
                    Target Audiens
                </h3>
                
                <div class="space-y-4">
                    <label class="flex items-center p-4 rounded-2xl border-2 transition-all cursor-pointer {{ $targetType === 'all' ? 'border-indigo-500 bg-indigo-500/10' : 'border-slate-800 bg-slate-800/50' }}">
                        <input type="radio" wire:model.live="targetType" value="all" class="hidden">
                        <div class="w-8 h-8 rounded-lg bg-indigo-500/20 flex items-center justify-center text-indigo-400 mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" /></svg>
                        </div>
                        <span class="text-sm font-black {{ $targetType === 'all' ? 'text-white' : 'text-slate-400' }}">Seluruh Pengguna</span>
                    </label>

                    <label class="flex items-center p-4 rounded-2xl border-2 transition-all cursor-pointer {{ $targetType === 'specific' ? 'border-indigo-500 bg-indigo-500/10' : 'border-slate-800 bg-slate-800/50' }}">
                        <input type="radio" wire:model.live="targetType" value="specific" class="hidden">
                        <div class="w-8 h-8 rounded-lg bg-indigo-500/20 flex items-center justify-center text-indigo-400 mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                        </div>
                        <span class="text-sm font-black {{ $targetType === 'specific' ? 'text-white' : 'text-slate-400' }}">Target Spesifik</span>
                    </label>
                </div>

                @if($targetType === 'specific')
                    <div class="mt-6 p-4 bg-slate-800 rounded-2xl max-h-60 overflow-y-auto custom-scrollbar border border-slate-700">
                        <p class="text-[9px] font-black text-slate-500 uppercase tracking-widest mb-3">Pilih Pengguna</p>
                        @foreach($allUsers as $user)
                            <label class="flex items-center gap-3 mb-2 last:mb-0 cursor-pointer group">
                                <input type="checkbox" wire:model="selectedUsers" value="{{ $user->id }}" class="rounded bg-slate-700 border-slate-600 text-indigo-500 focus:ring-indigo-500">
                                <span class="text-[11px] font-bold text-slate-400 group-hover:text-slate-200 transition-colors">{{ $user->name }}</span>
                            </label>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="bg-indigo-600 rounded-[2.5rem] p-8 shadow-2xl relative overflow-hidden group">
                <div class="absolute -right-8 -top-8 w-32 h-32 bg-white/10 rounded-full blur-2xl group-hover:bg-white/20 transition-all duration-700"></div>
                <h3 class="text-xs font-black text-white uppercase tracking-widest mb-4">Status Terjadwal</h3>
                <p class="text-indigo-100 text-sm leading-relaxed opacity-80">Fitur penjadwalan broadcast akan tersedia di versi berikutnya. Pesan saat ini dikirimkan secara instan.</p>
                <div class="mt-6 flex items-center gap-3">
                    <div class="flex -space-x-2">
                        @for($i=0; $i<3; $i++)
                            <div class="w-6 h-6 rounded-full bg-indigo-400 border-2 border-indigo-600"></div>
                        @endfor
                    </div>
                    <span class="text-[10px] font-black text-indigo-200 uppercase tracking-widest">+120 Users Ready</span>
                </div>
            </div>
        </div>
    </div>
</div>
