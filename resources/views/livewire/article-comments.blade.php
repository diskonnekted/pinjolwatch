<div class="mt-16 pt-12 border-t border-white/10">
    <h3 class="text-3xl font-black text-white mb-8 uppercase tracking-tighter flex items-center gap-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8 text-emerald-400">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3h9m-9 3h3m-6.75 4.125 3.375-3.375h9.75a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-13.5A2.25 2.25 0 0 0 2.25 6v9a2.25 2.25 0 0 0 2.25 2.25z" />
        </svg>
        Suara Komunitas
    </h3>

    {{-- Form --}}
    @auth
        <div class="glass rounded-[2rem] p-8 mb-12 border border-white/5 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-500/5 rounded-full blur-3xl"></div>
            
            <form wire:submit.prevent="submitComment">
                <div class="mb-6">
                    <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-3">Berikan Komentar</label>
                    <textarea 
                        wire:model="content"
                        class="w-full bg-slate-950/50 border border-white/10 rounded-2xl p-6 text-slate-300 focus:border-emerald-500/50 focus:ring-0 transition-all min-h-[160px]"
                        placeholder="Tuliskan pemikiran atau dukungan Anda di sini..."></textarea>
                    @error('content') <span class="text-rose-500 text-xs mt-2 block font-bold">{{ $message }}</span> @enderror
                </div>

                @if (session()->has('message'))
                    <div class="p-4 mb-6 bg-emerald-500/10 border border-emerald-500/20 rounded-xl text-emerald-400 text-sm font-bold animate-pulse">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="flex justify-end">
                    <button type="submit" class="btn-primary py-3 px-10 text-xs font-black uppercase tracking-widest">
                        Kirim Komentar
                    </button>
                </div>
            </form>
        </div>
    @else
        <div class="glass rounded-[2rem] p-12 mb-12 text-center border border-white/5">
            <p class="text-slate-400 mb-6">Silakan masuk untuk berpartisipasi dalam diskusi.</p>
            <a href="{{ route('login') }}" class="btn-primary py-3 px-10 text-xs font-black uppercase tracking-widest">Login / Registrasi</a>
        </div>
    @endauth

    {{-- List --}}
    <div class="space-y-8">
        @forelse($comments as $comment)
            <div class="flex gap-6 items-start group">
                @if($comment->user->avatar_url)
                    <img src="{{ $comment->user->avatar_url }}" alt="{{ $comment->user->name }}" class="w-12 h-12 rounded-2xl object-cover border border-white/5 shadow-lg shrink-0">
                @else
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-slate-800 to-slate-900 border border-white/5 flex items-center justify-center text-white font-black text-xl shadow-lg shrink-0">
                        {{ substr($comment->user->name, 0, 1) }}
                    </div>
                @endif
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="font-black text-white text-sm uppercase tracking-tight">{{ $comment->user->name }}</span>
                        <span class="text-[10px] text-slate-600 font-bold uppercase tracking-widest">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="glass rounded-3xl p-6 text-slate-300 leading-relaxed text-sm group-hover:border-emerald-500/20 transition-all">
                        {!! nl2br(e($comment->content)) !!}
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-12 text-slate-600 ">
                Belum ada komentar. Jadilah yang pertama memberikan suara.
            </div>
        @endforelse
    </div>
</div>
