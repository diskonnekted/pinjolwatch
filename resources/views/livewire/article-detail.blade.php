<div class="max-w-4xl mx-auto py-12 px-4">

    {{-- BACK BUTTON --}}
    <div class="mb-10">
        <a href="{{ route('stories') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-teal-400 transition-colors font-bold text-sm group">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 group-hover:-translate-x-1 transition-transform">
              <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
            Kembali ke Cerita Kita
        </a>
    </div>

    <article>
        {{-- HERO: Image or Header --}}
        @if($article->image_path)
            <div class="relative h-[28rem] w-full rounded-[2rem] overflow-hidden mb-8 shadow-2xl">
                <img src="{{ Storage::url($article->image_path) }}" alt="{{ $article->title }}" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>
                <div class="absolute bottom-10 left-10 right-10">
                    @php $typeLabel = ['experience' => 'Cerita Penyintas', 'news' => 'Berita', 'education' => 'Edukasi'][$article->type] ?? $article->type; @endphp
                    <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest bg-teal-500 text-white mb-4 inline-block">
                        {{ $typeLabel }}
                    </span>
                    <h1 class="text-4xl md:text-5xl font-black text-white leading-tight tracking-tight">{{ $article->title }}</h1>
                </div>
            </div>
        @else
            <div class="rounded-[2rem] overflow-hidden mb-8 shadow-2xl bg-gradient-to-br from-slate-900 via-slate-900 to-slate-800 border border-slate-800 p-10 md:p-14 relative">
                <div class="absolute -right-16 -top-16 w-64 h-64 bg-teal-500/5 rounded-full blur-3xl"></div>
                <div class="absolute -left-8 -bottom-8 w-48 h-48 bg-primary-500/5 rounded-full blur-3xl"></div>
                @php $typeLabel = ['experience' => 'Cerita Penyintas', 'news' => 'Berita', 'education' => 'Edukasi'][$article->type] ?? $article->type; @endphp
                <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest bg-teal-500/10 text-teal-400 border border-teal-500/30 mb-6 inline-block">
                    {{ $typeLabel }}
                </span>
                <h1 class="text-4xl md:text-5xl font-black text-white leading-tight tracking-tight relative z-10">{{ $article->title }}</h1>
            </div>
        @endif

        {{-- AUTHOR META --}}
        <div class="flex items-center gap-4 mb-10 px-2">
            <div class="w-11 h-11 rounded-2xl bg-teal-500/10 border border-teal-500/20 flex items-center justify-center text-lg font-black text-teal-400">
                {{ strtoupper(substr($article->author_name, 0, 1)) }}
            </div>
            <div>
                <p class="text-sm font-bold text-slate-200">{{ $article->author_name }}</p>
                <p class="text-xs text-slate-500">{{ $article->created_at->format('d F Y') }} &bull; {{ $article->created_at->diffForHumans() }}</p>
            </div>
        </div>

        {{-- CONTENT --}}
        <div class="bg-slate-900 border border-slate-800 rounded-[2rem] p-8 md:p-12 shadow-xl">
            <div class="
                prose prose-lg prose-invert max-w-none
                prose-headings:font-black prose-headings:tracking-tight prose-headings:text-white prose-headings:mt-12 prose-headings:mb-4
                prose-h2:text-2xl prose-h2:border-l-4 prose-h2:border-teal-500 prose-h2:pl-4 prose-h2:not-italic
                prose-p:text-slate-300 prose-p:leading-[1.9] prose-p:mb-5
                prose-strong:text-teal-300 prose-strong:font-black
                prose-em:text-slate-300
                prose-blockquote:border-l-4 prose-blockquote:border-teal-500/60 prose-blockquote:bg-teal-500/5 prose-blockquote:rounded-r-2xl prose-blockquote:px-6 prose-blockquote:py-4 prose-blockquote:text-slate-300 prose-blockquote:not-italic prose-blockquote:my-8
                prose-ul:text-slate-300 prose-ul:space-y-2
                prose-li:marker:text-teal-500
                prose-code:bg-slate-800 prose-code:text-teal-300 prose-code:px-2 prose-code:py-0.5 prose-code:rounded prose-code:text-sm prose-code:before:content-[''] prose-code:after:content-['']
                prose-hr:border-slate-700 prose-hr:my-10
                prose-a:text-teal-400 prose-a:underline
            ">
                {!! $article->content !!}
            </div>
        </div>
    </article>

    {{-- CTA SECTION --}}
    <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-4">
        <a href="{{ route('report') }}"
           class="group flex flex-col items-center text-center gap-3 p-6 bg-slate-900 border border-slate-800 rounded-[2rem] hover:border-teal-500/50 hover:bg-slate-900/80 transition-all duration-300 shadow-xl">
            <span class="w-12 h-12 rounded-2xl bg-rose-500/10 border border-rose-500/20 flex items-center justify-center text-2xl">🛡️</span>
            <div>
                <p class="font-black text-sm text-white uppercase tracking-wider">Laporkan Secara Anonim</p>
                <p class="text-xs text-slate-500 mt-1">Laporan Anda aman &amp; terenkripsi</p>
            </div>
            <span class="text-teal-400 text-xs font-black group-hover:translate-x-1 transition-transform">Laporkan →</span>
        </a>

        <a href="{{ route('track') }}"
           class="group flex flex-col items-center text-center gap-3 p-6 bg-slate-900 border border-slate-800 rounded-[2rem] hover:border-teal-500/50 hover:bg-slate-900/80 transition-all duration-300 shadow-xl">
            <span class="w-12 h-12 rounded-2xl bg-blue-500/10 border border-blue-500/20 flex items-center justify-center text-2xl">📥</span>
            <div>
                <p class="font-black text-sm text-white uppercase tracking-wider">Lacak Status Laporan</p>
                <p class="text-xs text-slate-500 mt-1">Pantau perkembangan tiket Anda</p>
            </div>
            <span class="text-teal-400 text-xs font-black group-hover:translate-x-1 transition-transform">Lacak →</span>
        </a>

        <a href="{{ route('mental-health-directory') }}"
           class="group flex flex-col items-center text-center gap-3 p-6 bg-slate-900 border border-slate-800 rounded-[2rem] hover:border-teal-500/50 hover:bg-slate-900/80 transition-all duration-300 shadow-xl">
            <span class="w-12 h-12 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-2xl">📞</span>
            <div>
                <p class="font-black text-sm text-white uppercase tracking-wider">Dukungan Psikologis</p>
                <p class="text-xs text-slate-500 mt-1">Akses layanan pendampingan gratis</p>
            </div>
            <span class="text-teal-400 text-xs font-black group-hover:translate-x-1 transition-transform">Akses →</span>
        </a>
    </div>

    {{-- SHARE STORY BANNER --}}
    <div class="mt-6 bg-gradient-to-r from-slate-900 via-teal-950/30 to-slate-900 rounded-[2rem] p-8 border border-teal-900/50 flex flex-col md:flex-row items-center justify-between gap-6 shadow-xl">
        <div>
            <h3 class="text-xl font-black text-white tracking-tight">Punya cerita serupa?</h3>
            <p class="text-slate-400 text-sm mt-1">Berbagi pengalaman Anda dapat membantu orang lain yang sedang berjuang.</p>
        </div>
        <a href="{{ route('stories.create') }}" class="shrink-0 px-8 py-4 bg-teal-600 text-white font-black text-sm rounded-2xl shadow-[0_4px_20px_rgba(13,148,136,0.3)] hover:bg-teal-500 hover:-translate-y-0.5 transition-all active:scale-95 uppercase tracking-widest">
            Bagikan Cerita Saya
        </a>
    </div>

</div>
