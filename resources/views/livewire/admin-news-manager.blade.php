<div class="p-6 lg:p-12">
    <div class="mb-12">
        <h2 class="text-4xl font-black text-white italic uppercase tracking-tighter mb-2 grad">Pengelola Feed Berita.</h2>
        <p class="text-slate-500 uppercase text-[10px] font-black tracking-[0.3em]">Manajemen tautan berita & update industri</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        {{-- Form Section --}}
        <div class="lg:col-span-1">
            <form wire:submit.prevent="save" class="glass p-8 rounded-[2rem] border-slate-800 sticky top-8">
                <div class="space-y-6">
                    <div>
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block mb-2 ml-1">Judul Berita</label>
                        <input wire:model="title" type="text" class="w-full bg-slate-950 border-slate-800 rounded-xl px-4 py-3 text-slate-200 text-sm focus:ring-teal-500 focus:border-teal-500">
                        @error('title') <span class="text-rose-500 text-[10px] font-bold uppercase ml-1">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block mb-2 ml-1">URL Sumber (Link)</label>
                        <input wire:model="url" type="text" class="w-full bg-slate-950 border-slate-800 rounded-xl px-4 py-3 text-slate-200 text-sm focus:ring-teal-500 focus:border-teal-500" placeholder="https://...">
                        @error('url') <span class="text-rose-500 text-[10px] font-bold uppercase ml-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block mb-2 ml-1">Sumber Media</label>
                            <input wire:model="source" type="text" class="w-full bg-slate-950 border-slate-800 rounded-xl px-4 py-3 text-slate-200 text-sm focus:ring-teal-500 focus:border-teal-500" placeholder="Bloomberg">
                            @error('source') <span class="text-rose-500 text-[10px] font-bold uppercase ml-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block mb-2 ml-1">Waktu Terbit</label>
                            <input wire:model="published_at" type="datetime-local" class="w-full bg-slate-950 border-slate-800 rounded-xl px-4 py-3 text-slate-200 text-sm focus:ring-teal-500 focus:border-teal-500">
                        </div>
                    </div>

                    <div>
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block mb-2 ml-1">URL Gambar (Opsional)</label>
                        <input wire:model="image_url" type="text" class="w-full bg-slate-950 border-slate-800 rounded-xl px-4 py-3 text-slate-200 text-sm focus:ring-teal-500 focus:border-teal-500">
                        @error('image_url') <span class="text-rose-500 text-[10px] font-bold uppercase ml-1">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block mb-2 ml-1">Ringkasan Berita</label>
                        <textarea wire:model="description" rows="3" class="w-full bg-slate-950 border-slate-800 rounded-xl px-4 py-3 text-slate-200 text-sm focus:ring-teal-500 focus:border-teal-500"></textarea>
                        @error('description') <span class="text-rose-500 text-[10px] font-bold uppercase ml-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="pt-4 flex gap-4">
                        <button type="submit" class="flex-1 py-4 bg-teal-600 hover:bg-teal-500 text-white font-black text-[10px] rounded-xl uppercase tracking-widest transition-all">
                            {{ $editingId ? 'Update Berita' : 'Simpan Berita' }}
                        </button>
                        @if($editingId)
                            <button type="button" wire:click="resetInput" class="px-6 py-4 bg-slate-800 hover:bg-slate-700 text-white font-black text-[10px] rounded-xl uppercase tracking-widest transition-all">
                                Batal
                            </button>
                        @endif
                    </div>
                </div>
            </form>
        </div>

        {{-- List Section --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="flex items-center justify-between mb-8">
                <div class="relative w-96">
                    <input wire:model.live="search" type="text" placeholder="Cari berita..." class="w-full bg-slate-900/50 border-slate-800 rounded-xl px-5 py-3 text-slate-200 text-sm focus:ring-teal-500 focus:border-teal-500">
                </div>
            </div>

            @if(session()->has('message'))
                <div class="p-4 bg-teal-500/10 border border-teal-500/20 text-teal-500 text-xs font-bold rounded-xl uppercase tracking-widest mb-6">
                    {{ session('message') }}
                </div>
            @endif

            <div class="space-y-4">
                @foreach($newsList as $news)
                    <div class="glass p-6 rounded-2xl border-slate-800 flex items-center justify-between group hover:border-slate-700 transition-all">
                        <div class="flex items-center gap-6">
                            @if($news->image_url)
                                <img src="{{ $news->image_url }}" class="w-16 h-16 rounded-xl object-cover border border-slate-800">
                            @else
                                <div class="w-16 h-16 bg-slate-950 rounded-xl border border-slate-800 flex items-center justify-center text-xl">📰</div>
                            @endif
                            <div>
                                <h4 class="text-white font-bold text-sm mb-1 line-clamp-1">{{ $news->title }}</h4>
                                <div class="flex items-center gap-3">
                                    <span class="text-[9px] font-black text-teal-500 uppercase tracking-widest">{{ $news->source }}</span>
                                    <span class="text-[9px] font-bold text-slate-600 uppercase tracking-widest">{{ $news->published_at ? $news->published_at->format('d M Y') : 'Tanpa Tanggal' }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button wire:click="edit({{ $news->id }})" class="p-2 bg-slate-800 hover:bg-slate-700 text-white rounded-lg transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                            <button onclick="confirm('Hapus berita ini?') || event.stopImmediatePropagation()" wire:click="delete({{ $news->id }})" class="p-2 bg-rose-500/10 hover:bg-rose-500 text-rose-500 hover:text-white rounded-lg transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $newsList->links() }}
            </div>
        </div>
    </div>
</div>
