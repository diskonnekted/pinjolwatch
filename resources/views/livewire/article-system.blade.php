<div class="max-w-5xl mx-auto py-12 px-4">
    <div class="flex justify-between items-end mb-10">
        <div>
            <h2 class="text-3xl font-extrabold text-slate-100 tracking-tight">Artikel & Berita</h2>
            <p class="text-slate-400 mt-2">Ruang berbagi pengalaman, tips pemulihan, dan berita terkini seputar dunia pinjol.</p>
        </div>
        <a href="{{ route('stories.create') }}" class="inline-flex items-center px-6 py-3 bg-primary-600 text-white font-bold rounded-xl shadow-lg hover:bg-primary-700 transition-all active:scale-95">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 mr-2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
            </svg>
            Bagikan Cerita Anda
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($articles as $article)
            <article class="bg-slate-900 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.3)] border border-slate-800 overflow-hidden flex flex-col hover:shadow-[0_8px_30px_rgba(13,148,136,0.15)] hover:border-teal-900 transition-all duration-300">
                @if($article->image_path)
                    <img src="{{ Storage::url($article->image_path) }}" alt="{{ $article->title }}" class="h-48 w-full object-cover">
                @endif
                <div class="p-6 flex-auto">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-widest 
                            @if($article->type == 'news') bg-blue-900/30 text-blue-400 border border-blue-800/50
                            @elseif($article->type == 'experience') bg-teal-900/30 text-teal-400 border border-teal-800/50
                            @else bg-slate-800 text-slate-300 @endif">
                            {{ $article->type }}
                        </span>
                        <span class="text-[10px] text-slate-500 font-medium">{{ $article->created_at->format('d M Y') }}</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-100 leading-tight mb-3">{{ $article->title }}</h3>
                    <p class="text-slate-400 text-sm leading-relaxed line-clamp-4">{{ Str::limit(strip_tags($article->content), 200) }}</p>
                </div>
                <div class="p-6 pt-0 mt-auto border-t border-slate-800 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center text-xs font-bold text-slate-400 border border-slate-700">
                            {{ substr($article->author_name, 0, 1) }}
                        </div>
                        <span class="text-xs font-bold text-slate-300">{{ $article->author_name }}</span>
                    </div>
                    <a href="{{ route('stories.show', $article->slug) }}" class="text-xs font-bold text-teal-400 hover:text-teal-300 uppercase tracking-widest">Baca Selengkapnya</a>
                </div>
            </article>
        @empty
            <div class="col-span-full py-20 text-center bg-slate-900/50 rounded-3xl border-2 border-dashed border-slate-700">
                <p class="text-slate-500 italic">Belum ada cerita atau berita yang dipublikasikan.</p>
            </div>
        @endforelse
    </div>
    <div class="mt-12">
        {{ $articles->links() }}
    </div>
</div>
