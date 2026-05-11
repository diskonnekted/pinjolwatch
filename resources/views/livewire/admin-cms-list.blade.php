<div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
    
    <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-sm text-slate-500 font-medium mb-3">
                <a href="{{ route('admin.dashboard') }}" class="hover:text-primary-600 transition-colors">Admin</a>
                <span>/</span>
                <span class="text-slate-800 font-bold">Manajemen Konten</span>
            </div>
            <h2 class="text-3xl font-black text-slate-900 tracking-tight flex items-center gap-3">
                Direktori <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-cyan-600">Artikel & Edukasi</span>
            </h2>
            <p class="text-slate-500 mt-2 text-sm">Kelola publikasi konten edukasi, berita, dan pengalaman korban pinjol.</p>
        </div>
        
        <a href="{{ route('admin.cms.create') }}" wire:navigate class="px-5 py-2.5 bg-primary-600 hover:bg-primary-500 text-white rounded-xl font-bold text-sm transition-colors shadow-lg shadow-primary-500/30 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" /></svg>
            Tulis Artikel Baru
        </a>
    </div>

    @if (session()->has('message'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="mb-6 px-4 py-3 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl shadow-sm flex items-center gap-2 animate-fade-in-down">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
            <span class="text-sm font-bold">{{ session('message') }}</span>
        </div>
    @endif

    <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
        {{-- Toolbar Filter --}}
        <div class="p-5 border-b border-slate-100 bg-slate-50/50 flex flex-col md:flex-row gap-4 items-center justify-between">
            <div class="w-full md:w-96 relative">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 absolute left-3 top-2.5 text-slate-400"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /></svg>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Cari judul atau penulis..." class="w-full pl-10 pr-4 py-2 border-slate-200 rounded-xl focus:ring-primary-500 focus:border-primary-500 text-sm">
            </div>
            
            <div class="flex items-center gap-3 w-full md:w-auto">
                <select wire:model.live="filterType" class="w-full md:w-40 border-slate-200 rounded-xl focus:ring-primary-500 focus:border-primary-500 text-sm">
                    <option value="">Semua Tipe</option>
                    <option value="article">Artikel Edukasi</option>
                    <option value="news">Berita</option>
                    <option value="experience">Pengalaman Korban</option>
                </select>
                <select wire:model.live="filterStatus" class="w-full md:w-40 border-slate-200 rounded-xl focus:ring-primary-500 focus:border-primary-500 text-sm">
                    <option value="">Semua Status</option>
                    <option value="published">Diterbitkan</option>
                    <option value="pending">Draft / Menunggu</option>
                    <option value="archived">Diarsipkan</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm whitespace-nowrap">
                <thead class="bg-slate-50 text-slate-500 font-bold uppercase tracking-wider text-[10px]">
                    <tr>
                        <th class="px-6 py-4">Konten</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Tanggal Dibuat</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($articles as $article)
                        <tr class="hover:bg-slate-50/80 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-slate-200 overflow-hidden shrink-0 border border-slate-200">
                                        @if($article->image_path)
                                            <img src="{{ Storage::url($article->image_path) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-slate-400 bg-slate-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" /></svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="font-bold text-slate-900 truncate max-w-sm" title="{{ $article->title }}">{{ $article->title }}</div>
                                        <div class="text-xs text-slate-500 mt-0.5">Oleh: {{ $article->author_name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $typeColors = [
                                        'article' => 'bg-indigo-50 text-indigo-700 border-indigo-200',
                                        'news' => 'bg-amber-50 text-amber-700 border-amber-200',
                                        'experience' => 'bg-rose-50 text-rose-700 border-rose-200',
                                    ];
                                    $typeLabels = [
                                        'article' => 'Artikel Edukasi',
                                        'news' => 'Berita',
                                        'experience' => 'Cerita Korban',
                                    ];
                                @endphp
                                <span class="px-2.5 py-1 text-[10px] uppercase tracking-widest font-bold rounded-lg border {{ $typeColors[$article->type] ?? 'bg-slate-50 text-slate-600 border-slate-200' }}">
                                    {{ $typeLabels[$article->type] ?? ucfirst($article->type) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $statusColors = [
                                        'published' => 'bg-emerald-50 text-emerald-700 border-emerald-200 dot-emerald-500',
                                        'pending' => 'bg-amber-50 text-amber-700 border-amber-200 dot-amber-500',
                                        'archived' => 'bg-slate-50 text-slate-600 border-slate-200 dot-slate-400',
                                    ];
                                    $sClass = $statusColors[$article->status] ?? 'bg-slate-50 text-slate-600 border-slate-200';
                                    preg_match('/dot-([a-z0-9\-]+)/', $sClass, $dotMatch);
                                    $dotClass = $dotMatch ? 'bg-' . $dotMatch[1] : 'bg-slate-400';
                                    $sClass = preg_replace('/dot-[a-z0-9\-]+/', '', $sClass);
                                @endphp
                                <button wire:click="toggleStatus({{ $article->id }})" class="inline-flex items-center gap-1.5 px-2.5 py-1 text-[10px] uppercase tracking-widest font-bold rounded-full border {{ trim($sClass) }} hover:scale-105 transition-transform">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $dotClass }}"></span>
                                    {{ $article->status == 'pending' ? 'Draft' : ucfirst($article->status) }}
                                </button>
                            </td>
                            <td class="px-6 py-4 text-slate-500">
                                {{ $article->created_at->format('d M Y, H:i') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('stories.show', $article->slug) }}" target="_blank" class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors" title="Lihat Publik">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path d="M10 12.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" /><path fill-rule="evenodd" d="M.664 10.59a1.651 1.651 0 010-1.186A10.004 10.004 0 0110 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0110 17c-4.257 0-7.893-2.66-9.336-6.41zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" /></svg>
                                    </a>
                                    <a href="{{ route('admin.cms.edit', $article->id) }}" wire:navigate class="p-2 text-slate-400 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition-colors" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" /><path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" /></svg>
                                    </a>
                                    <button wire:click="deleteArticle({{ $article->id }})" wire:confirm="Yakin ingin menghapus artikel ini? Data akan dihapus permanen." class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-colors" title="Hapus">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4z" clip-rule="evenodd" /></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-slate-300 mx-auto mb-3"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" /></svg>
                                <div class="text-sm font-bold text-slate-500">Tidak ada artikel ditemukan.</div>
                                <div class="text-xs text-slate-400 mt-1">Gunakan tombol 'Tulis Artikel Baru' untuk memulai.</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="p-4 border-t border-slate-100 bg-slate-50">
            {{ $articles->links() }}
        </div>
    </div>
</div>
