<div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
    {{-- Header --}}
    <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-sm text-slate-500 font-medium mb-3">
                <a href="{{ route('admin.dashboard') }}" class="hover:text-primary-600 transition-colors">Admin</a>
                <span>/</span>
                <span class="text-slate-800 font-bold">Manajemen Berita</span>
            </div>
            <h2 class="text-3xl font-black text-slate-900 tracking-tight flex items-center gap-3">
                Pengelola <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-cyan-600">Feed Berita Pinjol</span>
            </h2>
            <p class="text-slate-500 mt-2 text-sm">Manajemen tautan berita media massa untuk ditampilkan di feed publik.</p>
        </div>
    </div>

    @if (session()->has('message'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="mb-6 px-4 py-3 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl shadow-sm flex items-center gap-2 animate-fade-in-down">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
            <span class="text-sm font-bold">{{ session('message') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        {{-- Form Section --}}
        <div class="lg:col-span-4">
            <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden sticky top-8">
                <div class="p-6 border-b border-slate-100 bg-slate-50/50">
                    <h3 class="font-bold text-slate-800">{{ $editingId ? 'Edit Berita' : 'Tambah Berita Baru' }}</h3>
                </div>
                <form wire:submit.prevent="save" class="p-6 space-y-5">
                    <div>
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block mb-1.5 ml-1">Judul Berita</label>
                        <input wire:model="title" type="text" class="w-full border-slate-200 rounded-xl px-4 py-2.5 text-slate-700 text-sm focus:ring-primary-500 focus:border-primary-500">
                        @error('title') <span class="text-rose-500 text-[10px] font-bold ml-1">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block mb-1.5 ml-1">URL Sumber (Link)</label>
                        <input wire:model="url" type="text" class="w-full border-slate-200 rounded-xl px-4 py-2.5 text-slate-700 text-sm focus:ring-primary-500 focus:border-primary-500" placeholder="https://...">
                        @error('url') <span class="text-rose-500 text-[10px] font-bold ml-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block mb-1.5 ml-1">Sumber Media</label>
                            <input wire:model="source" type="text" class="w-full border-slate-200 rounded-xl px-4 py-2.5 text-slate-700 text-sm focus:ring-primary-500 focus:border-primary-500" placeholder="Bloomberg">
                        </div>
                        <div>
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block mb-1.5 ml-1">Waktu Terbit</label>
                            <input wire:model="published_at" type="datetime-local" class="w-full border-slate-200 rounded-xl px-4 py-2.5 text-slate-700 text-sm focus:ring-primary-500 focus:border-primary-500">
                        </div>
                    </div>

                    <div>
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block mb-1.5 ml-1">URL Gambar (Opsional)</label>
                        <input wire:model="image_url" type="text" class="w-full border-slate-200 rounded-xl px-4 py-2.5 text-slate-700 text-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>

                    <div>
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block mb-1.5 ml-1">Ringkasan</label>
                        <textarea wire:model="description" rows="3" class="w-full border-slate-200 rounded-xl px-4 py-2.5 text-slate-700 text-sm focus:ring-primary-500 focus:border-primary-500"></textarea>
                    </div>

                    <div class="pt-4 flex gap-3">
                        <button type="submit" class="flex-1 py-3 bg-primary-600 hover:bg-primary-500 text-white font-bold text-xs rounded-xl uppercase tracking-widest transition-all shadow-lg shadow-primary-500/20">
                            {{ $editingId ? 'Update' : 'Simpan' }}
                        </button>
                        @if($editingId)
                            <button type="button" wire:click="resetInput" class="px-5 py-3 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-xs rounded-xl uppercase tracking-widest transition-all">
                                Batal
                            </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        {{-- List Section --}}
        <div class="lg:col-span-8">
            <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
                <div class="p-5 border-b border-slate-100 bg-slate-50/50 flex flex-col md:flex-row gap-4 items-center justify-between">
                    <div class="w-full md:w-80 relative">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 absolute left-3 top-2.5 text-slate-400"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /></svg>
                        <input wire:model.live.debounce.300ms="search" type="text" placeholder="Cari berita..." class="w-full pl-10 pr-4 py-2 border-slate-200 rounded-xl focus:ring-primary-500 focus:border-primary-500 text-sm">
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm whitespace-nowrap">
                        <thead class="bg-slate-50 text-slate-500 font-bold uppercase tracking-wider text-[10px]">
                            <tr>
                                <th class="px-6 py-4">Berita</th>
                                <th class="px-6 py-4">Sumber & Tanggal</th>
                                <th class="px-6 py-4 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse($newsList as $news)
                                <tr class="hover:bg-slate-50/80 transition-colors group">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-4">
                                            <div class="w-12 h-12 rounded-xl bg-slate-100 overflow-hidden shrink-0 border border-slate-200 flex items-center justify-center">
                                                @if($news->image_url)
                                                    <img src="{{ $news->image_url }}" class="w-full h-full object-cover">
                                                @else
                                                    <span class="text-xl">📰</span>
                                                @endif
                                            </div>
                                            <div>
                                                <div class="font-bold text-slate-900 truncate max-w-xs" title="{{ $news->title }}">{{ $news->title }}</div>
                                                <a href="{{ $news->url }}" target="_blank" class="text-[10px] text-primary-600 hover:underline font-medium truncate block max-w-xs">
                                                    {{ Str::limit($news->url, 40) }}
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-col">
                                            <span class="px-2 py-0.5 bg-indigo-50 text-indigo-700 rounded-lg text-[9px] font-black uppercase tracking-widest border border-indigo-100 w-fit mb-1">
                                                {{ $news->source ?: 'Media' }}
                                            </span>
                                            <span class="text-xs text-slate-500 font-medium">
                                                {{ $news->published_at ? $news->published_at->format('d M Y') : 'Tanpa Tanggal' }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex justify-end gap-2">
                                            <button wire:click="edit({{ $news->id }})" class="p-2 text-slate-400 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" /><path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" /></svg>
                                            </button>
                                            <button onclick="confirm('Hapus berita ini?') || event.stopImmediatePropagation()" wire:click="delete({{ $news->id }})" class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4z" clip-rule="evenodd" /></svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-12 text-center text-slate-400">
                                        Tidak ada berita ditemukan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($newsList->hasPages())
                    <div class="p-4 border-t border-slate-100 bg-slate-50">
                        {{ $newsList->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
