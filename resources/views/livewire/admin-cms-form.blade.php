<div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
    
    <div class="mb-8">
        <div class="flex items-center gap-2 text-sm text-slate-500 font-medium mb-3">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-primary-600 transition-colors">Admin</a>
            <span>/</span>
            <a href="{{ route('admin.cms.index') }}" wire:navigate class="hover:text-primary-600 transition-colors">Manajemen Konten</a>
            <span>/</span>
            <span class="text-slate-800 font-bold">{{ $isEditMode ? 'Edit Artikel' : 'Tulis Baru' }}</span>
        </div>
        <h2 class="text-3xl font-black text-slate-900 tracking-tight">
            {{ $isEditMode ? 'Edit Konten' : 'Publikasi Konten Baru' }}
        </h2>
    </div>

    <form wire:submit="save" class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
        
        {{-- Left Column: Main Editor --}}
        <div class="lg:col-span-2 space-y-6">
            
            <div class="bg-white rounded-3xl p-6 md:p-8 shadow-xl shadow-slate-200/50 border border-slate-100">
                <div class="space-y-6">
                    <div>
                        <label for="title" class="block text-sm font-extrabold text-slate-900 mb-2 uppercase tracking-wider">Judul Artikel</label>
                        <input id="title" wire:model="title" type="text" class="w-full border-slate-200 text-slate-900 rounded-xl shadow-sm focus:border-primary-500 focus:ring-primary-500 font-bold text-lg px-4 py-3" placeholder="Masukkan judul yang menarik...">
                        @error('title') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="content" class="block text-sm font-extrabold text-slate-900 mb-2 uppercase tracking-wider">Isi Konten</label>
                        <textarea id="content" wire:model="content" rows="20" class="w-full border-slate-200 text-slate-800 rounded-xl shadow-sm focus:border-primary-500 focus:ring-primary-500 leading-relaxed font-medium p-4" placeholder="Tuliskan isi edukasi, berita, atau cerita di sini... (Mendukung paragraf rapi)"></textarea>
                        @error('content') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

        </div>

        {{-- Right Column: Settings & Publish --}}
        <div class="flex flex-col gap-6 lg:sticky lg:top-24">
            
            {{-- Panel Pengaturan --}}
            <div class="bg-white rounded-3xl p-6 shadow-xl shadow-slate-200/50 border border-slate-100 space-y-5">
                <h3 class="text-sm font-extrabold text-slate-400 uppercase tracking-widest border-b border-slate-100 pb-3">Pengaturan Publikasi</h3>
                
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-2">Tipe Konten</label>
                    <div class="grid grid-cols-1 gap-2">
                        <label class="flex items-center gap-3 p-3 rounded-xl border border-slate-100 hover:bg-slate-50 cursor-pointer transition-colors has-[:checked]:bg-indigo-50 has-[:checked]:border-indigo-200 group">
                            <input type="radio" wire:model="type" value="article" class="w-4 h-4 text-indigo-600 focus:ring-indigo-600 border-slate-300">
                            <span class="text-sm font-medium text-slate-700 group-has-[:checked]:text-indigo-900">Artikel Edukasi</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 rounded-xl border border-slate-100 hover:bg-slate-50 cursor-pointer transition-colors has-[:checked]:bg-amber-50 has-[:checked]:border-amber-200 group">
                            <input type="radio" wire:model="type" value="news" class="w-4 h-4 text-amber-600 focus:ring-amber-600 border-slate-300">
                            <span class="text-sm font-medium text-slate-700 group-has-[:checked]:text-amber-900">Berita Pinjol</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 rounded-xl border border-slate-100 hover:bg-slate-50 cursor-pointer transition-colors has-[:checked]:bg-rose-50 has-[:checked]:border-rose-200 group">
                            <input type="radio" wire:model="type" value="experience" class="w-4 h-4 text-rose-600 focus:ring-rose-600 border-slate-300">
                            <span class="text-sm font-medium text-slate-700 group-has-[:checked]:text-rose-900">Cerita Pengalaman</span>
                        </label>
                    </div>
                    @error('type') <p class="text-rose-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-2">Status Publikasi</label>
                    <select wire:model="status" class="w-full border-slate-200 text-slate-900 rounded-xl shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm">
                        <option value="pending">Draft (Belum Rilis)</option>
                        <option value="published">Published (Rilis Publik)</option>
                        <option value="archived">Diarsipkan (Sembunyikan)</option>
                    </select>
                    @error('status') <p class="text-rose-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-2">Nama Penulis</label>
                    <input type="text" wire:model="author_name" class="w-full border-slate-200 text-slate-900 rounded-xl shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm" placeholder="Contoh: Admin PW">
                    @error('author_name') <p class="text-rose-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Panel Upload Gambar --}}
            <div class="bg-white rounded-3xl p-6 shadow-xl shadow-slate-200/50 border border-slate-100">
                <h3 class="text-sm font-extrabold text-slate-400 uppercase tracking-widest border-b border-slate-100 pb-3 mb-4">Gambar Sampul (Thumbnail)</h3>
                
                @if ($image)
                    <div class="relative w-full h-40 rounded-xl overflow-hidden mb-3 border border-slate-200">
                        <img src="{{ $image->temporaryUrl() }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-primary-900/10 backdrop-blur-sm flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                            <span class="px-3 py-1 bg-white text-primary-900 text-xs font-bold rounded-lg shadow-sm">Preview Baru</span>
                        </div>
                    </div>
                @elseif ($existing_image_path)
                    <div class="relative w-full h-40 rounded-xl overflow-hidden mb-3 border border-slate-200">
                        <img src="{{ Storage::url($existing_image_path) }}" class="w-full h-full object-cover">
                        <div class="absolute top-2 right-2 bg-white/90 backdrop-blur px-2 py-1 rounded text-[10px] font-bold text-slate-600">Terpasang</div>
                    </div>
                @endif

                <div class="flex items-center justify-center w-full">
                    <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-slate-300 border-dashed rounded-xl cursor-pointer bg-slate-50 hover:bg-slate-100 transition-colors">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-2 text-slate-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-1 text-xs text-slate-500"><span class="font-bold">Klik untuk unggah</span> atau seret</p>
                            <p class="text-[10px] text-slate-400">PNG, JPG (Maks. 2MB)</p>
                        </div>
                        <input wire:model="image" type="file" class="hidden" accept="image/*" />
                    </label>
                </div>
                @error('image') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
            </div>

            {{-- Panel Submit --}}
            <div class="bg-slate-900 rounded-3xl p-6 shadow-xl border border-slate-800 text-white">
                <button type="submit" class="w-full flex justify-center items-center gap-2 px-4 py-3.5 bg-primary-500 hover:bg-primary-400 text-slate-900 rounded-xl font-black text-sm transition-colors shadow-lg shadow-primary-500/20">
                    <svg wire:loading.remove wire:target="save" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" /></svg>
                    <svg wire:loading wire:target="save" class="animate-spin -ml-1 mr-3 h-5 w-5 text-slate-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                    <span>{{ $isEditMode ? 'Simpan Perubahan' : 'Publikasikan Sekarang' }}</span>
                </button>
                <a href="{{ route('admin.cms.index') }}" wire:navigate class="mt-4 w-full flex justify-center items-center px-4 py-2 text-slate-400 hover:text-white text-xs font-bold transition-colors">
                    Batalkan & Kembali
                </a>
            </div>

        </div>
    </form>
</div>
