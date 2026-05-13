@section('title', $article->title . ' | PinjolWatch Stories')
@section('meta_description', Str::limit(strip_tags($article->content), 160))
@php
    $ogImage = asset(ltrim($article->image_path, '/'));
@endphp
@section('og_image', $ogImage)

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
            @php
                $imageUrl = asset(ltrim($article->image_path, '/'));
            @endphp
            <div class="relative h-[28rem] w-full rounded-[2rem] overflow-hidden mb-8 shadow-2xl">
                <img src="{{ $imageUrl }}" alt="{{ $article->title }}" class="absolute inset-0 w-full h-full object-cover">
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
        <div class="flex flex-wrap items-center justify-between gap-6 mb-10 px-2">
            <div class="flex items-center gap-4">
                <div class="w-11 h-11 rounded-2xl bg-teal-500/10 border border-teal-500/20 flex items-center justify-center text-lg font-black text-teal-400">
                    {{ strtoupper(substr($article->author_name, 0, 1)) }}
                </div>
                <div>
                    <p class="text-sm font-bold text-slate-200">{{ $article->author_name }}</p>
                    <p class="text-xs text-slate-500">{{ $article->created_at->format('d F Y') }} &bull; {{ $article->created_at->diffForHumans() }}</p>
                </div>
            </div>

            {{-- SHARE BUTTONS --}}
            <div class="flex items-center gap-2">
                <span class="text-[10px] font-black uppercase tracking-widest text-slate-500 mr-2">Bagikan:</span>
                
                {{-- WhatsApp --}}
                <a href="https://api.whatsapp.com/send?text={{ urlencode($article->title . ' - ' . url()->current()) }}" target="_blank" 
                   class="w-10 h-10 rounded-xl bg-green-500/10 border border-green-500/20 flex items-center justify-center text-green-500 hover:bg-green-500 hover:text-white transition-all shadow-lg shadow-green-950/20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                    </svg>
                </a>

                {{-- Twitter/X --}}
                <a href="https://twitter.com/intent/tweet?text={{ urlencode($article->title) }}&url={{ urlencode(url()->current()) }}" target="_blank" 
                   class="w-10 h-10 rounded-xl bg-slate-100/10 border border-slate-100/20 flex items-center justify-center text-white hover:bg-white hover:text-black transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.6.75zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633z"/>
                    </svg>
                </a>

                {{-- Facebook --}}
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" 
                   class="w-10 h-10 rounded-xl bg-blue-600/10 border border-blue-600/20 flex items-center justify-center text-blue-500 hover:bg-blue-600 hover:text-white transition-all shadow-lg shadow-blue-950/20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                    </svg>
                </a>

                {{-- Copy Link --}}
                <button onclick="copyToClipboard()" 
                   class="w-10 h-10 rounded-xl bg-slate-800 border border-slate-700 flex items-center justify-center text-slate-400 hover:text-teal-400 hover:border-teal-500/50 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                    </svg>
                </button>
            </div>
        </div>

        <script>
            function copyToClipboard() {
                navigator.clipboard.writeText(window.location.href);
                alert('Tautan artikel berhasil disalin!');
            }
        </script>

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
                {!! \Illuminate\Support\Str::markdown($article->content) !!}
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

    {{-- COMMENTS SECTION --}}
    <livewire:article-comments :articleId="$article->id" />

</div>
