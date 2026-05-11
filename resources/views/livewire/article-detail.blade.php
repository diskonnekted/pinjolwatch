<div class="max-w-4xl mx-auto py-12 px-4">
    <div class="mb-8">
        <a href="{{ route('stories') }}" class="inline-flex items-center text-sm font-semibold text-teal-400 hover:text-teal-300 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 mr-1">
              <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
            Kembali ke Artikel
        </a>
    </div>

    <article class="bg-slate-900 rounded-3xl shadow-[0_4px_20px_rgba(0,0,0,0.3)] border border-slate-800 overflow-hidden">
        @if($article->image_path)
            <div class="relative h-96 w-full">
                <img src="{{ Storage::url($article->image_path) }}" alt="{{ $article->title }}" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                <div class="absolute bottom-8 left-8 right-8">
                    <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-widest bg-teal-600 text-white mb-4 inline-block">
                        {{ $article->type }}
                    </span>
                    <h1 class="text-4xl font-extrabold text-white leading-tight">{{ $article->title }}</h1>
                </div>
            </div>
        @else
            <div class="p-8 md:p-12 border-b border-slate-800 bg-slate-900/50">
                <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-widest bg-teal-900/30 text-teal-400 border border-teal-800 mb-4 inline-block">
                    {{ $article->type }}
                </span>
                <h1 class="text-4xl font-extrabold text-slate-100 leading-tight">{{ $article->title }}</h1>
            </div>
        @endif

        <div class="p-8 md:p-12">
            <div class="flex items-center gap-4 mb-10 pb-8 border-b border-slate-800">
                <div class="w-12 h-12 rounded-full bg-teal-900/30 flex items-center justify-center text-xl font-bold text-teal-400 border border-teal-800">
                    {{ substr($article->author_name, 0, 1) }}
                </div>
                <div>
                    <p class="text-sm font-bold text-slate-100">{{ $article->author_name }}</p>
                    <p class="text-xs text-slate-500">{{ $article->created_at->format('d F Y') }}</p>
                </div>
            </div>

            <div class="prose prose-lg prose-invert max-w-none text-slate-300 leading-relaxed">
                {!! nl2br(e($article->content)) !!}
            </div>
        </div>
    </article>

    <div class="mt-12 bg-slate-800/50 rounded-3xl p-8 border border-slate-700 flex flex-col md:flex-row items-center justify-between gap-6">
        <div>
            <h3 class="text-xl font-bold text-slate-100">Punya cerita serupa?</h3>
            <p class="text-slate-400">Berbagi pengalaman Anda dapat membantu orang lain yang sedang berjuang.</p>
        </div>
        <a href="{{ route('stories.create') }}" class="px-8 py-4 bg-teal-600 text-white font-bold rounded-2xl shadow-[0_4px_14px_rgba(13,148,136,0.4)] hover:bg-teal-500 hover:-translate-y-0.5 transition-all active:scale-95 whitespace-nowrap">
            Bagikan Cerita Saya
        </a>
    </div>
</div>
