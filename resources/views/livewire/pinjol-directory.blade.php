<div class="max-w-4xl mx-auto py-12 px-4">
    <div class="bg-slate-900 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.3)] p-8 border border-slate-800">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-slate-100">Direktori Pinjol Legal</h2>
            <p class="text-slate-400 mt-2">Cari informasi lengkap, pola penagihan, dan riwayat kasus aplikasi pinjol terdaftar OJK.</p>
        </div>

        <div class="mb-10">
            <label for="pinjol_search" class="block text-sm font-bold text-slate-300 mb-2 uppercase tracking-widest">Pilih Aplikasi Pinjol</label>
            <select wire:model.live="pinjolId" id="pinjol_search" class="w-full bg-slate-900 border-slate-700 text-slate-200 rounded-xl shadow-sm focus:border-teal-500 focus:ring-teal-500 py-3">
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
                                <dd><a href="{{ $selectedPinjol->website }}" target="_blank" class="text-teal-400 hover:underline break-all">{{ $selectedPinjol->website }}</a></dd>
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
                <div class="p-6 bg-teal-900/30 rounded-2xl border border-teal-800">
                    <h3 class="text-sm font-bold text-teal-400 uppercase tracking-widest mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Pola Penagihan (Desk/Field Collection)
                    </h3>
                    <p class="text-teal-100 leading-relaxed">{{ $selectedPinjol->collection_patterns }}</p>
                </div>

                {{-- Notable Cases --}}
                <div class="p-6 bg-amber-900/30 rounded-2xl border border-amber-800">
                    <h3 class="text-sm font-bold text-amber-400 uppercase tracking-widest mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.34c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                        </svg>
                        Riwayat Kasus / Keluhan Publik
                    </h3>
                    <p class="text-amber-100 leading-relaxed">{{ $selectedPinjol->notable_cases }}</p>
                </div>
            </div>
        @else
            <div class="mt-12 text-center py-20 bg-slate-900/50 rounded-3xl border border-dashed border-slate-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-16 h-16 mx-auto text-slate-500 mb-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196 7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <p class="text-slate-400 font-medium italic">Silakan pilih aplikasi pinjol untuk melihat detail</p>
            </div>
        @endif
    </div>
</div>
