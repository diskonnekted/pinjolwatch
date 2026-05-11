<div class="max-w-2xl mx-auto p-4">
    @if($success)
        <div class="bg-primary-50 border-l-4 border-primary-500 p-6 mb-6 rounded-r-xl shadow-sm">
            <div class="flex">
                <div class="shrink-0">
                    <svg class="h-8 w-8 text-primary-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-bold text-primary-900">Laporan Berhasil Terkirim</h3>
                    <div class="mt-2 text-primary-800">
                        <p>Simpan nomor tiket Anda untuk melacak status laporan:</p>
                        <p class="mt-2 font-mono text-2xl font-black tracking-widest bg-white inline-block px-4 py-2 rounded-lg border border-primary-100">{{ $ticket_id }}</p>
                    </div>
                    <div class="mt-6">
                        <button wire:click="$set('success', false)" class="text-sm font-semibold text-primary-700 hover:text-primary-600 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Buat Laporan Baru
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @else
        {{-- Progress Bar --}}
        <div class="mb-8 px-4">
            <div class="flex justify-between items-center relative">
                <div class="absolute left-0 top-1/2 w-full h-0.5 bg-gray-200 -z-10"></div>
                @foreach([1, 2, 3, 4] as $i)
                    <div class="flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold transition-all duration-300
                            @if($step == $i) bg-primary-600 text-white ring-4 ring-primary-100
                            @elseif($step > $i) bg-primary-200 text-primary-700
                            @else bg-white border-2 border-gray-200 text-gray-400 @endif">
                            @if($step > $i)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-5 h-5">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                            @else
                                {{ $i }}
                            @endif
                        </div>
                        <span class="text-[10px] uppercase tracking-wider font-bold mt-2 @if($step == $i) text-primary-600 @else text-gray-400 @endif">
                            @if($i == 1) Lokasi @elseif($i == 2) Kronologi @elseif($i == 3) Bukti @else Kirim @endif
                        </span>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <form wire:submit.prevent="submit" class="p-8">
                
                {{-- Step 1: Info Dasar --}}
                @if($step == 1)
                    <div class="space-y-6 animate-in fade-in slide-in-from-bottom-4 duration-500">
                        <h2 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                             <div class="p-2 bg-primary-50 rounded-lg text-primary-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25s-7.5-4.108-7.5-11.25a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                             </div>
                             Informasi Lokasi & Ancaman
                        </h2>
                        
                        <div>
                            <label for="province_id" class="block text-sm font-semibold text-gray-700 mb-2">Provinsi</label>
                            <select id="province_id" wire:model.live="province_id" class="w-full border-gray-300 text-gray-900 rounded-xl shadow-sm focus:border-primary-500 focus:ring-primary-500 @error('province_id') border-red-500 @enderror">
                                <option value="">-- Pilih Provinsi --</option>
                                @foreach($provinces as $prov)
                                    <option value="{{ $prov->id }}">{{ $prov->name }}</option>
                                @endforeach
                            </select>
                            @error('province_id') <p class="text-red-500 text-xs mt-2 font-medium">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="kabupaten_id" class="block text-sm font-semibold text-gray-700 mb-2">Kabupaten/Kota</label>
                            <select id="kabupaten_id" wire:model="kabupaten_id" class="w-full border-gray-300 text-gray-900 rounded-xl shadow-sm focus:border-primary-500 focus:ring-primary-500 @error('kabupaten_id') border-red-500 @enderror" @if(empty($kabupatens)) disabled @endif>
                                <option value="">-- Pilih Kabupaten/Kota --</option>
                                @foreach($kabupatens as $kab)
                                    <option value="{{ $kab->id }}">{{ $kab->nama }}</option>
                                @endforeach
                            </select>
                            @error('kabupaten_id') <p class="text-red-500 text-xs mt-2 font-medium">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="threat_type_id" class="block text-sm font-semibold text-gray-700 mb-2">Jenis ancaman utama?</label>
                            <select id="threat_type_id" wire:model="threat_type_id" class="w-full border-gray-300 text-gray-900 rounded-xl shadow-sm focus:border-primary-500 focus:ring-primary-500 @error('threat_type_id') border-red-500 @enderror">
                                <option value="">-- Pilih Jenis Ancaman --</option>
                                @foreach($threatTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->label }}</option>
                                @endforeach
                            </select>
                            @error('threat_type_id') <p class="text-red-500 text-xs mt-2 font-medium">{{ $message }}</p> @enderror
                        </div>

                        <div class="border-t border-gray-100 pt-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Aplikasi Pinjol</label>
                            
                            <div class="space-y-4">
                                <div>
                                    <p class="text-[10px] uppercase tracking-widest text-gray-400 font-bold mb-1">Aplikasi Terdaftar OJK</p>
                                    <select id="legal_pinjol_id" wire:model="legal_pinjol_id" class="w-full border-gray-300 text-gray-900 rounded-xl shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm">
                                        <option value="">-- Pilih dari Daftar Legal (Jika ada) --</option>
                                        @foreach($legalPinjols as $lp)
                                            <option value="{{ $lp->id }}">{{ $lp->app_name }} ({{ $lp->company_name }})</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="relative py-2">
                                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                        <div class="w-full border-t border-gray-100"></div>
                                    </div>
                                    <div class="relative flex justify-center">
                                        <span class="bg-white px-2 text-xs text-gray-400 font-medium italic uppercase">Atau ketik manual</span>
                                    </div>
                                </div>

                                <div>
                                    <input id="app_name" wire:model.live.debounce.500ms="app_name" type="text" class="w-full border-gray-300 text-gray-900 rounded-xl shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm" placeholder="Ketik nama aplikasi di sini jika tidak ada di daftar">
                                    <p class="mt-1 text-[10px] text-gray-400 italic">Pilih dari daftar di atas atau ketik manual jika aplikasi tidak terdaftar/ilegal.</p>
                                    
                                    @if($app_legal_status)
                                        <div class="mt-2 text-sm font-semibold flex items-center gap-1.5">
                                            @if($app_legal_status == 'tidak_ditemukan')
                                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-red-100 text-red-700 text-xs">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3 h-3"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" /></svg>
                                                    Tidak Terdaftar OJK (Kemungkinan Ilegal)
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-700 text-xs">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3 h-3"><path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" /></svg>
                                                    Status OJK: {{ $app_legal_status }}
                                                </span>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Step 2: Kronologi --}}
                @if($step == 2)
                    <div class="space-y-6 animate-in fade-in slide-in-from-right-4 duration-500">
                        <h2 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                             <div class="p-2 bg-primary-50 rounded-lg text-primary-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                                </svg>
                             </div>
                             Ceritakan Kronologi
                        </h2>
                        <div class="border-b border-gray-100 pb-6 mb-6">
                            <label for="contact_phone_number" class="block text-sm font-semibold text-gray-700 mb-2">Nomor HP/WA Penagih (Opsional)</label>
                            <input id="contact_phone_number" wire:model="contact_phone_number" type="text" class="w-full border-gray-300 text-gray-900 rounded-xl shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm" placeholder="Contoh: 08123456789">
                            @error('contact_phone_number') <p class="text-red-500 text-xs mt-2 font-medium">{{ $message }}</p> @enderror
                        </div>

                        <div class="border-b border-gray-100 pb-6 mb-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-3">Pengungkapan Identitas Aplikasi</label>
                                <div class="space-y-2">
                                    <label class="flex items-start gap-2 cursor-pointer text-sm text-gray-900">
                                        <input type="radio" wire:model="identity_disclosure" value="menyebutkan_aplikasi" class="mt-1 text-primary-600 focus:ring-primary-500">
                                        <span>Menyebutkan nama aplikasi dengan jelas</span>
                                    </label>
                                    <label class="flex items-start gap-2 cursor-pointer text-sm text-gray-900">
                                        <input type="radio" wire:model="identity_disclosure" value="tidak_menyebutkan" class="mt-1 text-primary-600 focus:ring-primary-500">
                                        <span>Gelap (Tidak menyebutkan dari aplikasi mana)</span>
                                    </label>
                                </div>
                                @error('identity_disclosure') <p class="text-red-500 text-xs mt-2 font-medium">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-3">Nada Komunikasi / Ancaman</label>
                                <div class="space-y-2">
                                    <label class="flex items-start gap-2 cursor-pointer text-sm text-gray-900">
                                        <input type="radio" wire:model="communication_tone" value="santun_resmi" class="mt-1 text-primary-600 focus:ring-primary-500">
                                        <span>Standar / Santun / Resmi sesuai prosedur</span>
                                    </label>
                                    <label class="flex items-start gap-2 cursor-pointer text-sm text-gray-900">
                                        <input type="radio" wire:model="communication_tone" value="kasar_ancaman" class="mt-1 text-primary-600 focus:ring-primary-500">
                                        <span>Memaki / Kasar / Menggunakan Ancaman</span>
                                    </label>
                                </div>
                                @error('communication_tone') <p class="text-red-500 text-xs mt-2 font-medium">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="border-b border-gray-100 pb-6 mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Taktik Teror yang Anda Alami (Boleh pilih lebih dari satu)</label>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                @php
                                    $dc_action_list = [
                                        'sebar_kontak' => ['icon' => '📱', 'label' => 'Sebar Data ke Kontak HP'],
                                        'grup_wa' => ['icon' => '💬', 'label' => 'Dibuatkan Grup WhatsApp'],
                                        'hubungi_kantor' => ['icon' => '🏢', 'label' => 'Teror Tempat Kerja/HRD'],
                                        'hubungi_tetangga' => ['icon' => '🏘️', 'label' => 'Teror Tetangga/RT/RW'],
                                        'edit_asusila' => ['icon' => '🔞', 'label' => 'Edit Foto Konten Asusila'],
                                        'order_fiktif' => ['icon' => '📦', 'label' => 'Order Fiktif (GoFood/COD)'],
                                        'surat_palsu' => ['icon' => '📄', 'label' => 'Surat Somasi/Polisi Palsu'],
                                        'spam_telp' => ['icon' => '🤖', 'label' => 'Spam Telepon Bertubi-tubi']
                                    ];
                                @endphp
                                @foreach($dc_action_list as $key => $item)
                                    <label class="relative flex items-start p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 transition-all has-[:checked]:bg-primary-50 has-[:checked]:border-primary-300">
                                        <div class="flex items-center h-5">
                                            <input type="checkbox" wire:model="dc_actions" value="{{ $key }}" class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-500">
                                        </div>
                                        <div class="ml-3 text-sm flex items-center gap-2">
                                            <span class="text-lg">{{ $item['icon'] }}</span>
                                            <span class="font-medium text-gray-900">{{ $item['label'] }}</span>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                            @error('dc_actions') <p class="text-red-500 text-xs mt-2 font-medium">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="chronology" class="block text-sm font-semibold text-gray-700 mb-2">Jelaskan secara jujur dan padat</label>
                            <textarea id="chronology" wire:model="chronology" rows="6" class="w-full border-gray-300 text-gray-900 rounded-2xl shadow-sm focus:border-primary-500 focus:ring-primary-500" placeholder="Contoh: 'Pada tanggal 10 Mei, saya dihubungi oleh nomor 0812... yang mengaku dari PinjolCepat dan mengancam akan menyebar data KTP saya...'"></textarea>
                            @error('chronology') <p class="text-red-500 text-xs mt-2 font-medium">{{ $message }}</p> @enderror
                        </div>
                    </div>
                @endif

                {{-- Step 3: Bukti --}}
                @if($step == 3)
                    <div class="space-y-6 animate-in fade-in slide-in-from-right-4 duration-500">
                        <h2 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                             <div class="p-2 bg-primary-50 rounded-lg text-primary-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                                </svg>
                             </div>
                             Unggah Bukti Pendukung
                        </h2>
                        
                        <div class="p-4 bg-yellow-50 border-l-4 border-yellow-400">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 3.011-1.742 3.011H4.42c-1.53 0-2.493-1.677-1.743-3.011l5.58-9.92zM10 13a1 1 0 110-2 1 1 0 010 2zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-yellow-700">
                                        <strong>PENTING:</strong> Harap samarkan (blur atau tutup) informasi sensitif seperti NIK, nomor KTP, wajah, atau data pribadi lainnya dari bukti yang Anda unggah. Sistem tidak lagi melakukan anonymisasi otomatis untuk melindungi privasi Anda secara maksimal.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="border-2 border-dashed border-gray-200 rounded-2xl p-12 text-center bg-gray-50 hover:bg-gray-100 transition-colors cursor-pointer relative group">
                            <input type="file" id="evidence" wire:model="evidence" multiple class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                            <div class="space-y-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 mx-auto text-gray-400 group-hover:text-primary-500 transition-colors">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A4.5 4.5 0 0 1 18.75 19.5H6.75Z" />
                                </svg>
                                <div class="text-sm text-gray-600 font-semibold">Klik atau tarik file ke sini</div>
                                <div class="text-xs text-gray-400 uppercase tracking-widest">JPG, PNG, PDF, MP4 (Maks 10MB)</div>
                            </div>
                        </div>

                        <div wire:loading wire:target="evidence" class="text-sm text-primary-600 font-bold flex items-center gap-2">
                            <svg class="animate-spin h-4 w-4" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                            Sedang mengunggah...
                        </div>
                        
                        @if ($evidence)
                            <div class="bg-white border border-gray-100 rounded-xl p-4 shadow-sm">
                                <p class="text-xs font-bold text-gray-400 uppercase mb-3 tracking-widest">Daftar file siap kirim:</p>
                                <ul class="space-y-2">
                                    @foreach ($evidence as $file)
                                        <li class="flex items-center justify-between text-sm p-2 bg-gray-50 rounded-lg">
                                            <span class="truncate font-medium text-gray-700">{{ $file->getClientOriginalName() }}</span>
                                            <span class="text-xs text-gray-400 ml-2 shrink-0">{{ round($file->getSize() / 1024, 1) }} KB</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @error('evidence.*') <p class="text-red-500 text-xs mt-2 font-medium">{{ $message }}</p> @enderror
                    </div>
                @endif

                {{-- Step 4: Consent & Submit --}}
                @if($step == 4)
                    <div class="space-y-6 animate-in fade-in slide-in-from-right-4 duration-500">
                        <h2 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                             <div class="p-2 bg-primary-50 rounded-lg text-primary-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.333 9-6.03 9-11.623 0-1.312-.135-2.592-.402-3.824L18 7.5l-6-3.75-6 3.75-1.002-1.002z" />
                                </svg>
                             </div>
                             Persetujuan & Kirim
                        </h2>

                        <div class="space-y-3">
                            <label class="flex items-start gap-3 p-4 border rounded-xl hover:bg-gray-50 cursor-pointer transition-all @if($consent_scope == 'internal_only') bg-primary-50 border-primary-300 shadow-sm @endif">
                                <input type="radio" wire:model="consent_scope" value="internal_only" class="h-5 w-5 text-primary-600 border-gray-300 focus:ring-primary-500 mt-1">
                                <span class="text-sm">
                                    <strong class="block font-bold text-gray-900">🔒 Hanya Simpan di PinjolWatch</strong>
                                    <span class="text-gray-600">Hanya untuk statistik anonim. Data tidak dibagikan ke mana pun.</span>
                                </span>
                            </label>

                            <label class="flex items-start gap-3 p-4 border rounded-xl hover:bg-gray-50 cursor-pointer transition-all @if($consent_scope == 'share_to_authorities') bg-primary-50 border-primary-300 shadow-sm @endif">
                                <input type="radio" wire:model="consent_scope" value="share_to_authorities" class="h-5 w-5 text-primary-600 border-gray-300 focus:ring-primary-500 mt-1">
                                <span class="text-sm">
                                    <strong class="block font-bold text-gray-900">🏛️ Teruskan ke OJK / Polri / Kominfo</strong>
                                    <span class="text-gray-600">Izinkan kami menyusun laporan resmi untuk ditindak otoritas.</span>
                                </span>
                            </label>

                            <label class="flex items-start gap-3 p-4 border rounded-xl hover:bg-gray-50 cursor-pointer transition-all @if($consent_scope == 'public_anonymized') bg-primary-50 border-primary-300 shadow-sm @endif">
                                <input type="radio" wire:model="consent_scope" value="public_anonymized" class="h-5 w-5 text-primary-600 border-gray-300 focus:ring-primary-500 mt-1">
                                <span class="text-sm">
                                    <strong class="block font-bold text-gray-900">📊 Gunakan untuk Edukasi Publik</strong>
                                    <span class="text-gray-600">Data anonim sepenuhnya boleh dipakai untuk riset & media.</span>
                                </span>
                            </label>
                        </div>

                        <div class="p-4 bg-amber-50 border border-amber-100 rounded-xl">
                            <p class="text-xs text-amber-800 leading-relaxed italic">
                                <strong>Catatan UU PDP:</strong> Anda berhak menarik persetujuan ini kapan saja melalui fitur lacak tiket.
                            </p>
                        </div>
                    </div>
                @endif

                <div class="mt-12 flex items-center justify-between border-t pt-8">
                    @if($step > 1)
                        <button type="button" wire:click="prevStep" class="inline-flex items-center gap-1 text-sm font-bold text-gray-500 hover:text-gray-800 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                            </svg>
                            Kembali
                        </button>
                    @else
                        <div></div>
                    @endif

                    @if($step < 4)
                        <button type="button" wire:click="nextStep" class="inline-flex items-center gap-2 bg-primary-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-primary-700 shadow-lg shadow-primary-100 transition-all active:scale-95">
                            Lanjut
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </button>
                    @else
                        <button type="submit" wire:loading.attr="disabled" class="inline-flex items-center gap-2 bg-primary-600 text-white px-8 py-3 rounded-xl font-black uppercase tracking-widest hover:bg-primary-700 shadow-xl shadow-primary-200 transition-all active:scale-95 disabled:opacity-50">
                            <span wire:loading.remove wire:target="submit">Kirim Laporan</span>
                            <span wire:loading wire:target="submit" class="flex items-center gap-2">
                                <svg class="animate-spin h-4 w-4" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                Mengirim...
                            </span>
                        </button>
                    @endif
                </div>
            </form>
        </div>
    @endif
</div>
