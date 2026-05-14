<div class="max-w-4xl mx-auto py-12 px-4">
    <div class="bg-slate-900 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.3)] p-8 border border-slate-800">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-slate-100">Direktori Pinjol Legal</h2>
            <p class="text-slate-400 mt-2">Cari informasi lengkap, pola penagihan, dan riwayat kasus aplikasi pinjol terdaftar OJK.</p>
        </div>

        <div class="mb-10">
            <label for="pinjol_search" class="block text-sm font-bold text-slate-300 mb-2 uppercase tracking-widest">Pilih Aplikasi Pinjol</label>
            <select wire:model.live="pinjolId" id="pinjol_search" class="w-full bg-slate-900 border-slate-700 text-slate-200 rounded-xl shadow-sm focus:border-primary-500 focus:ring-primary-500 py-3">
                <option value="">-- Pilih dari Daftar --</option>
                @foreach($pinjols as $p)
                    <option value="{{ $p->id }}">{{ $p->app_name }} ({{ $p->company_name }})</option>
                @endforeach
            </select>
        </div>

        @if($selectedPinjol)
            <div class="space-y-8 animate-in fade-in slide-in-from-bottom-4 duration-500">
                {{-- Basic Info --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="p-6 bg-slate-800/50 rounded-2xl border border-slate-700">
                        <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-4">Informasi Perusahaan</h3>
                        <dl class="space-y-3 text-sm">
                            <div>
                                <dt class="font-bold text-slate-200">Nama PT</dt>
                                <dd class="text-slate-400">{{ $selectedPinjol->company_name }}</dd>
                            </div>
                            <div>
                                <dt class="font-bold text-slate-200">Website Resmi</dt>
                                <dd><a href="{{ $selectedPinjol->website }}" target="_blank" class="text-primary-400 hover:underline break-all">{{ $selectedPinjol->website }}</a></dd>
                            </div>
                            <div>
                                <dt class="font-bold text-slate-200">Jenis Usaha</dt>
                                <dd class="text-slate-400">{{ $selectedPinjol->business_type }}</dd>
                            </div>
                        </dl>
                    </div>
                    <div class="p-6 bg-slate-800/50 rounded-2xl border border-slate-700">
                        <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-4">Izin OJK</h3>
                        <dl class="space-y-3 text-sm">
                            <div>
                                <dt class="font-bold text-slate-200">Nomor Izin</dt>
                                <dd class="text-slate-400">{{ $selectedPinjol->license_number }}</dd>
                            </div>
                            <div>
                                <dt class="font-bold text-slate-200">Tanggal Izin</dt>
                                <dd class="text-slate-400">{{ $selectedPinjol->license_date ? date('d M Y', strtotime($selectedPinjol->license_date)) : '-' }}</dd>
                            </div>
                            <div>
                                <dt class="font-bold text-slate-200">Sistem Operasi</dt>
                                <dd class="text-slate-400">{{ $selectedPinjol->os }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                {{-- Collection Patterns --}}
                <div class="p-6 bg-primary-900/30 rounded-2xl border border-primary-800">
                    <h3 class="text-sm font-bold text-primary-400 uppercase tracking-widest mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Pola Penagihan (Desk/Field Collection)
                    </h3>
                    <p class="text-primary-100 leading-relaxed">{{ $selectedPinjol->collection_patterns }}</p>
                </div>

                {{-- Media Highlights & News Feed --}}
                <div class="p-8 bg-slate-950/50 rounded-[2.5rem] border border-slate-800 relative overflow-hidden group">
                    <div class="absolute -right-16 -top-16 w-48 h-48 bg-primary-500/5 rounded-full blur-3xl group-hover:bg-primary-500/10 transition-colors duration-700"></div>
                    
                    <div class="flex items-center justify-between mb-8">
                        <div class="space-y-1">
                            <h3 class="text-xs font-black text-slate-400 uppercase tracking-[0.2em] flex items-center gap-2 ">
                                <span class="w-2 h-2 rounded-full bg-primary-500 animate-pulse"></span>
                                Media Highlights & News Feed
                            </h3>
                            @if($lastScanned)
                                <div class="text-[9px] font-bold text-primary-500/70 uppercase tracking-widest animate-in fade-in duration-500">
                                    Last Scan: {{ $lastScanned }} (Live Results)
                                </div>
                            @endif
                        </div>
                        <button 
                            wire:click="scanNews" 
                            wire:loading.attr="disabled" 
                            wire:key="scan-btn-{{ $pinjolId }}"
                            class="group/scan flex items-center gap-2 px-4 py-1.5 rounded-full bg-slate-800 hover:bg-primary-600 transition-all border border-slate-700 hover:border-primary-500 disabled:opacity-50"
                        >
                            <span wire:loading.remove wire:target="scanNews" class="text-[9px] font-black text-slate-400 group-hover/scan:text-white uppercase tracking-widest">Update Feed</span>
                            <span wire:loading wire:target="scanNews" class="text-[9px] font-black text-white uppercase tracking-widest animate-pulse">Scanning DB...</span>
                            <svg wire:loading.remove wire:target="scanNews" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3 h-3 text-slate-500 group-hover/scan:text-white group-hover/scan:rotate-180 transition-transform duration-500">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                        </button>
                    </div>

                    @if($selectedPinjol->news_links && count($selectedPinjol->news_links) > 0)
                        <div class="space-y-4">
                            @foreach($selectedPinjol->news_links as $news)
                                <a href="{{ $news['url'] }}" target="_blank" class="block p-4 bg-slate-900/50 rounded-2xl border border-slate-800 hover:border-primary-500/50 hover:bg-slate-900 transition-all group/news relative overflow-hidden">
                                    <div class="flex gap-4 items-start relative z-10">
                                        <div class="w-12 h-12 rounded-xl bg-slate-800 flex-shrink-0 flex items-center justify-center text-xl group-hover/news:scale-110 transition-transform">
                                            📰
                                        </div>
                                        <div class="space-y-1">
                                            <div class="flex items-center gap-2 text-[10px] font-black text-primary-500 uppercase tracking-widest">
                                                {{ $news['source'] ?? 'Online Media' }}
                                                <span class="text-slate-600">•</span>
                                                <span class="text-slate-500">{{ $news['date'] ?? 'Recent' }}</span>
                                            </div>
                                            <h4 class="text-sm font-bold text-slate-200 leading-snug group-hover/news:text-white transition-colors">{{ $news['title'] }}</h4>
                                        </div>
                                    </div>
                                    <div class="absolute right-4 top-1/2 -translate-y-1/2 opacity-0 group-hover/news:opacity-100 transition-opacity">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 text-primary-500">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                        </svg>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div class="p-6 bg-amber-900/10 rounded-2xl border border-amber-900/30">
                            <div class="flex gap-4 items-start">
                                <div class="text-2xl">⚠️</div>
                                <div class="space-y-1">
                                    <h4 class="text-sm font-bold text-amber-200 uppercase tracking-wider">Riwayat Kasus Terlacak</h4>
                                    <p class="text-amber-100/70 text-xs leading-relaxed">{{ $selectedPinjol->notable_cases ?? 'Belum ada riwayat kasus besar yang tercatat untuk aplikasi ini.' }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @else
            <div class="mt-12 text-center py-20 bg-slate-900/50 rounded-3xl border border-dashed border-slate-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-16 h-16 mx-auto text-slate-500 mb-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196 7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <p class="text-slate-400 font-medium ">Silakan pilih aplikasi pinjol untuk melihat detail</p>
            </div>
        @endif
    </div>
</div>
