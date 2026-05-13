<div class="max-w-7xl mx-auto py-12 px-6">
    <div class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
            <div class="badge mb-4">Update Industri</div>
            <h2 class="text-5xl font-black text-white uppercase tracking-tighter mb-4 grad">Feed Berita Pinjol.</h2>
            <p class="text-slate-400 text-lg max-w-xl">
                Pantau perkembangan regulasi, kasus hukum, dan berita terkini mengenai industri fintech lending di Indonesia.
            </p>
        </div>
        <div class="relative w-full md:w-96">
            <input wire:model.live="search" type="text" placeholder="Cari berita atau sumber..." class="w-full bg-slate-900 border-slate-800 rounded-2xl px-6 py-4 text-slate-200 focus:ring-teal-500 focus:border-teal-500 transition-all font-medium">
            <div class="absolute right-4 top-4 text-slate-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($news as $item)
            <a href="{{ $item->url }}" target="_blank" class="group relative flex flex-col bg-slate-900/50 border border-slate-800 rounded-[2.5rem] overflow-hidden hover:border-teal-500/50 transition-all hover:-translate-y-2 hover:shadow-2xl hover:shadow-teal-500/10">
                @if($item->image_url)
                    <div class="aspect-video w-full overflow-hidden">
                        <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                @else
                    <div class="aspect-video w-full bg-slate-950 flex items-center justify-center">
                        <span class="text-4xl">📰</span>
                    </div>
                @endif

                <div class="p-8 flex-1 flex flex-col">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="px-3 py-1 bg-teal-500/10 text-teal-500 text-[10px] font-black uppercase tracking-widest rounded-lg border border-teal-500/20">
                            {{ $item->source ?: 'Media' }}
                        </span>
                        <span class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">
                            {{ $item->published_at ? $item->published_at->diffForHumans() : $item->created_at->diffForHumans() }}
                        </span>
                    </div>

                    <h3 class="text-xl font-black text-white uppercase tracking-tighter mb-4 group-hover:text-teal-400 transition-colors leading-tight">
                        {{ $item->title }}
                    </h3>

                    <p class="text-slate-400 text-sm leading-relaxed mb-6 line-clamp-3 flex-1">
                        {{ $item->description ?: 'Klik untuk membaca detail berita selengkapnya di sumber media terkait.' }}
                    </p>

                    <div class="pt-6 border-t border-slate-800 flex items-center justify-between">
                        <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Baca Sumber</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 text-teal-500 group-hover:translate-x-1 transition-transform">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <div class="mt-16">
        {{ $news->links() }}
    </div>

    @if($news->isEmpty())
        <div class="text-center py-20 glass rounded-[3rem] border-slate-800">
            <div class="text-6xl mb-6 opacity-30">📭</div>
            <h3 class="text-2xl font-black text-white uppercase tracking-tighter mb-2">Belum Ada Berita.</h3>
            <p class="text-slate-500 uppercase text-[10px] font-black tracking-widest">Kami akan segera memperbarui feed ini dengan informasi terkini.</p>
        </div>
    @endif
</div>
