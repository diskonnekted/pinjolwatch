<div class="bg-white rounded-3xl p-8 shadow-xl shadow-slate-200/50 border border-slate-100">
    <div class="mb-8">
        <h3 class="text-2xl font-black text-slate-900 tracking-tight flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-7 h-7 text-primary-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
            </svg>
            Bagikan Cerita Anda
        </h3>
        <p class="text-slate-500 mt-2">Cerita Anda bisa menginspirasi dan membantu sesama penyintas untuk bangkit. Tuliskan pengalaman Anda secara jujur dan berdaya.</p>
    </div>

    <form wire:submit.prevent="submit" class="space-y-6">
        {{-- Judul --}}
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">Judul Cerita <span class="text-rose-500">*</span></label>
            <input wire:model="title" type="text" placeholder="Contoh: Bagaimana Saya Berhenti dari Lingkaran Setan Pinjol" class="w-full px-5 py-4 bg-slate-50 border-slate-200 rounded-2xl focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all font-medium text-slate-900">
            @error('title') <span class="text-xs text-rose-500 font-bold mt-1 block">{{ $message }}</span> @enderror
        </div>

        {{-- Nama Penulis --}}
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">Nama Penulis / Samaran <span class="text-rose-500">*</span></label>
            <input wire:model="author_name" type="text" class="w-full px-5 py-4 bg-slate-50 border-slate-200 rounded-2xl focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all font-medium text-slate-900">
            <p class="text-[10px] text-slate-400 mt-1 uppercase font-bold tracking-widest">Gunakan Nama Samaran (Nickname) jika ingin tetap anonim.</p>
            @error('author_name') <span class="text-xs text-rose-500 font-bold mt-1 block">{{ $message }}</span> @enderror
        </div>

        {{-- Konten --}}
        <div wire:ignore x-data="{
            content: @entangle('content'),
            init() {
                // Simplified text editor or just a textarea for now
            }
        }">
            <label class="block text-sm font-bold text-slate-700 mb-2">Isi Cerita <span class="text-rose-500">*</span></label>
            <textarea wire:model="content" rows="12" placeholder="Tuliskan kisah lengkap Anda di sini... (Minimal 100 karakter)" class="w-full px-5 py-4 bg-slate-50 border-slate-200 rounded-2xl focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all font-medium text-slate-900 resize-none"></textarea>
            @error('content') <span class="text-xs text-rose-500 font-bold mt-1 block">{{ $message }}</span> @enderror
        </div>

        {{-- Image Upload --}}
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">Gambar Pendukung (Opsional)</label>
            <div class="flex items-center justify-center w-full">
                <label class="flex flex-col items-center justify-center w-full h-48 border-2 border-slate-300 border-dashed rounded-3xl cursor-pointer bg-slate-50 hover:bg-slate-100 transition-all">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        @if ($image)
                            <img src="{{ $image->temporaryUrl() }}" class="h-32 rounded-xl mb-2 object-cover">
                        @else
                            <svg class="w-10 h-10 mb-3 text-slate-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-slate-500"><span class="font-bold">Klik untuk upload</span> atau drag and drop</p>
                            <p class="text-xs text-slate-400 font-medium">PNG, JPG, or WEBP (Max. 2MB)</p>
                        @endif
                    </div>
                    <input type="file" wire:model="image" class="hidden" />
                </label>
            </div>
            @error('image') <span class="text-xs text-rose-500 font-bold mt-1 block">{{ $message }}</span> @enderror
        </div>

        {{-- Info Box --}}
        <div class="p-4 bg-blue-50 border border-blue-100 rounded-2xl flex gap-4">
            <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center text-blue-600 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0zm-9-3.75h.008v.008H12V8.25z" /></svg>
            </div>
            <div class="text-sm text-blue-800 leading-relaxed font-medium">
                Setiap cerita yang dikirimkan akan melalui proses <strong>moderasi admin</strong> terlebih dahulu. Admin berhak mengedit konten (tanpa mengubah inti cerita) untuk tujuan keterbacaan, atau menolak cerita jika dianggap tidak relevan/melanggar aturan.
            </div>
        </div>

        <div class="flex justify-end gap-4 pt-4">
            <button type="submit" wire:loading.attr="disabled" class="px-10 py-4 bg-slate-900 hover:bg-slate-800 text-white font-black rounded-2xl transition-all shadow-lg shadow-slate-900/20 disabled:opacity-50">
                <span wire:loading.remove>Kirim Cerita</span>
                <span wire:loading>Mengirim...</span>
            </button>
        </div>
    </form>
</div>
