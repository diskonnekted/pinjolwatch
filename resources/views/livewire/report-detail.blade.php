<div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
    {{-- Breadcrumb & Header --}}
    <div class="mb-8">
        <div class="flex items-center gap-2 text-sm text-slate-500 font-medium mb-3">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-primary-600 transition-colors">Admin</a>
            <span>/</span>
            <a href="{{ route('admin.dashboard') }}" class="hover:text-primary-600 transition-colors">Antrean Moderasi</a>
            <span>/</span>
            <span class="text-slate-800 font-bold">{{ $report->ticket_id }}</span>
        </div>
        
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-3xl font-black text-slate-900 tracking-tight flex items-center gap-3">
                    Detail <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-cyan-600">Laporan</span>
                    @php
                        $statusConfig = [
                            'received' => ['bg' => 'bg-amber-100', 'text' => 'text-amber-800', 'border' => 'border-amber-200', 'dot' => 'bg-amber-500'],
                            'verified' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'border' => 'border-blue-200', 'dot' => 'bg-blue-500'],
                            'forwarded' => ['bg' => 'bg-purple-100', 'text' => 'text-purple-800', 'border' => 'border-purple-200', 'dot' => 'bg-purple-500'],
                            'resolved' => ['bg' => 'bg-emerald-100', 'text' => 'text-emerald-800', 'border' => 'border-emerald-200', 'dot' => 'bg-emerald-500'],
                        ];
                        $config = $statusConfig[$report->status] ?? $statusConfig['received'];
                    @endphp
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider border {{ $config['bg'] }} {{ $config['text'] }} {{ $config['border'] }}">
                        <span class="w-2 h-2 rounded-full {{ $config['dot'] }} animate-pulse"></span>
                        {{ $report->status }}
                    </span>
                </h2>
                <p class="text-slate-500 mt-1 text-sm">Dikirim pada {{ $report->created_at->format('d F Y, H:i') }} ({{ $report->created_at->diffForHumans() }})</p>
            </div>
            
            {{-- Flash Message --}}
            @if (session()->has('message'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="px-4 py-2 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg shadow-sm flex items-center gap-2 animate-fade-in-down">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 text-emerald-500"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                    <span class="text-xs font-bold">{{ session('message') }}</span>
                </div>
            @endif
        </div>
    </div>

    {{-- Main Two-Column Layout --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 relative items-start">
        
        {{-- Left Column: Profil Kasus --}}
        <div class="lg:col-span-2 space-y-6">
            
            {{-- Entitas & Klasifikasi --}}
            <div class="bg-white rounded-3xl p-6 shadow-xl shadow-slate-200/50 border border-slate-100 relative overflow-hidden">
                <div class="absolute right-0 top-0 w-32 h-32 bg-slate-50 rounded-bl-full -mr-8 -mt-8"></div>
                <h3 class="text-xs font-extrabold text-slate-400 uppercase tracking-widest mb-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" /></svg>
                    Profil Entitas Terlapor
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 relative z-10">
                    <div>
                        <div class="text-sm font-medium text-slate-500 mb-1">Nama Aplikasi Pinjol</div>
                        @if($report->legalPinjol)
                            <div class="text-xl font-black text-slate-900">{{ $report->legalPinjol->app_name }}</div>
                            <div class="inline-flex items-center gap-1.5 mt-1 px-2.5 py-1 rounded bg-emerald-50 border border-emerald-100">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                <span class="text-[10px] font-bold text-emerald-700 uppercase tracking-widest">Terdaftar OJK</span>
                            </div>
                        @else
                            <div class="text-xl font-black text-slate-900">{{ $report->app_name ?: 'Tidak Disebutkan' }}</div>
                            <div class="inline-flex items-center gap-1.5 mt-1 px-2.5 py-1 rounded bg-rose-50 border border-rose-100">
                                <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                <span class="text-[10px] font-bold text-rose-700 uppercase tracking-widest">Ilegal / Bodong</span>
                            </div>
                        @endif
                    </div>
                    <div>
                        <div class="text-sm font-medium text-slate-500 mb-1">Konteks Ancaman</div>
                        <div class="text-lg font-bold text-slate-900">{{ $report->threatType->label }}</div>
                        <div class="text-sm text-slate-600 mt-1 flex items-center gap-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" /></svg>
                            {{ $report->kabupaten->nama }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Info Kontak DC & Taktik --}}
            <div class="bg-white rounded-3xl p-6 shadow-xl shadow-slate-200/50 border border-slate-100">
                <h3 class="text-xs font-extrabold text-slate-400 uppercase tracking-widest mb-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" /></svg>
                    Data Investigasi DC
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                        <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Nomor Kontak DC</div>
                        <div class="text-base font-black text-slate-900 font-mono">{{ $report->contact_phone_number ?: 'Tidak dilampirkan' }}</div>
                    </div>
                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                        <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Persetujuan WhatsApp</div>
                        @if($report->whatsapp_consent)
                            <div class="text-xs font-bold text-primary-700 flex flex-col gap-1 mt-1">
                                <span class="inline-flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3 h-3"><path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" /></svg> Bersedia Dihubungi</span>
                                <span class="font-mono text-slate-900">{{ $report->reporter_whatsapp }}</span>
                            </div>
                        @else
                            <div class="text-xs font-bold text-slate-500 mt-1">Tidak Bersedia</div>
                        @endif
                    </div>
                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                        <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Identitas DC</div>
                        <div class="text-sm font-bold text-slate-900">{{ ucfirst(str_replace('_', ' ', $report->identity_disclosure ?? '-')) }}</div>
                    </div>
                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                        <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Nada Komunikasi</div>
                        <div class="text-sm font-bold text-slate-900">{{ ucfirst(str_replace('_', ' ', $report->communication_tone ?? '-')) }}</div>
                    </div>
                </div>

                <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Taktik Intimidasi yang Digunakan</div>
                <div class="flex flex-wrap gap-2">
                    @if(is_array($report->dc_actions) && count($report->dc_actions) > 0)
                        @foreach($report->dc_actions as $action)
                            <span class="px-3 py-1.5 rounded-lg bg-rose-50 border border-rose-100 text-xs font-bold text-rose-700">{{ $action }}</span>
                        @endforeach
                    @else
                        <span class="text-sm text-slate-500 italic">Tidak ada taktik spesifik yang dilaporkan.</span>
                    @endif
                </div>
            </div>

            {{-- Kronologi --}}
            <div class="bg-white rounded-3xl p-6 shadow-xl shadow-slate-200/50 border border-slate-100">
                <h3 class="text-xs font-extrabold text-slate-400 uppercase tracking-widest mb-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" /></svg>
                    Kronologi Kejadian
                </h3>
                <div class="p-5 bg-slate-50 rounded-2xl border border-slate-100 text-slate-700 text-sm leading-relaxed whitespace-pre-wrap font-medium">
{{ $report->chronology }}
                </div>
            </div>

        </div>

        {{-- Right Column: Actions & Smart Anonymizer --}}
        <div class="flex flex-col gap-6 lg:sticky lg:top-24">
            
            {{-- Panel Checklist Verifikasi --}}
            <div class="bg-white rounded-3xl p-6 shadow-xl shadow-slate-200/50 border border-slate-100">
                <h3 class="text-base font-bold text-slate-900 mb-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-primary-600"><path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375c0 .621-.504 1.125-1.125 1.125H6.375C5.754 20.25 5.25 19.746 5.25 19.125V9.375c0-.621.504-1.125 1.125-1.125Z" /></svg>
                    Checklist Verifikasi Internal
                </h3>
                
                <div class="space-y-3">
                    @php
                        $checklists = [
                            'bukti_valid' => 'Bukti Dukung Valid/Relevan',
                            'klasifikasi_sesuai' => 'Klasifikasi Ancaman Sesuai',
                            'kontak_dihubungi' => 'Kontak Dapat Dihubungi',
                            'syarat_ojk' => 'Memenuhi Syarat Lapor OJK'
                        ];
                    @endphp
                    @foreach($checklists as $key => $label)
                        <label class="flex items-center gap-3 p-3 rounded-xl border border-slate-100 hover:bg-slate-50 cursor-pointer transition-colors has-[:checked]:bg-primary-50 has-[:checked]:border-primary-200 group">
                            <input type="checkbox" wire:model.live="verification_checklist" value="{{ $key }}" class="w-5 h-5 rounded border-slate-300 text-primary-600 focus:ring-primary-600 bg-white cursor-pointer shadow-sm">
                            <span class="text-sm font-medium text-slate-700 group-has-[:checked]:text-primary-900">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- Panel Validasi & Aksi --}}
            <div class="bg-slate-900 rounded-3xl p-6 shadow-xl border border-slate-800 text-white">
                <h3 class="text-lg font-bold text-slate-100 mb-4 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-primary-400 animate-ping"></span>
                    Tindakan Moderasi
                </h3>
                <p class="text-xs text-slate-400 mb-6 leading-relaxed">Pilih tindakan berdasarkan tingkat validitas laporan dan kelengkapan bukti pendukung.</p>
                
                <div class="space-y-3">
                    @if($report->status == 'received')
                        <button x-on:click="$dispatch('open-confirm-modal', { 
                            title: 'Verifikasi Laporan',
                            message: 'Apakah Anda yakin ingin menandai laporan ini sebagai valid? Status akan berubah menjadi VERIFIED.',
                            action: 'updateStatus',
                            param: 'verified',
                            type: 'blue'
                        })" class="w-full flex justify-between items-center px-4 py-3 bg-blue-600 hover:bg-blue-500 text-white rounded-xl font-bold text-sm transition-colors shadow-lg shadow-blue-500/20">
                            Verifikasi Valid
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" /></svg>
                        </button>
                    @endif
                    
                    @if($report->status == 'verified')
                        <button wire:click="toggleOjkPreview" class="w-full flex justify-between items-center px-4 py-3 bg-purple-600 hover:bg-purple-500 text-white rounded-xl font-bold text-sm transition-colors shadow-lg shadow-purple-500/20">
                            Teruskan ke Otoritas
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path d="M3.105 2.289a.75.75 0 00-.826.95l1.414 4.925A1.5 1.5 0 005.135 9.25h6.115a.75.75 0 010 1.5H5.135a1.5 1.5 0 00-1.442 1.086l-1.414 4.926a.75.75 0 00.826.95 28.896 28.896 0 0015.293-7.154.75.75 0 000-1.115A28.897 28.897 0 003.105 2.289z" /></svg>
                        </button>
                    @endif

                    @if($report->status == 'forwarded')
                        <button x-on:click="$dispatch('open-confirm-modal', { 
                            title: 'Selesaikan Kasus',
                            message: 'Tandai kasus ini sebagai SELESAI. Pastikan tindakan lanjutan sudah dilakukan.',
                            action: 'updateStatus',
                            param: 'resolved',
                            type: 'emerald'
                        })" class="w-full flex justify-between items-center px-4 py-3 bg-emerald-600 hover:bg-emerald-500 text-white rounded-xl font-bold text-sm transition-colors shadow-lg shadow-emerald-500/20">
                            Tandai Selesai
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                        </button>
                    @endif

                    <button class="w-full flex justify-between items-center px-4 py-3 bg-slate-800 hover:bg-rose-500 hover:text-white text-slate-300 rounded-xl font-bold text-sm transition-colors">
                        Tolak Laporan (Spam)
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4z" clip-rule="evenodd" /></svg>
                    </button>
                </div>
            </div>

            {{-- Smart Anonymizer - Galeri Bukti --}}
            <div class="bg-white rounded-3xl p-6 shadow-xl shadow-slate-200/50 border border-slate-100">
                <h3 class="text-base font-bold text-slate-900 mb-1 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-primary-600"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639l4.43-7.561a1.012 1.012 0 0 1 1.733.001l4.43 7.561a1.012 1.012 0 0 1 0 .639l-4.43 7.561a1.012 1.012 0 0 1-1.733-.001l-4.43-7.561Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /></svg>
                    Bukti & Dokumen
                </h3>
                <p class="text-[10px] font-bold text-rose-500 uppercase tracking-widest mb-4 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3 h-3"><path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" /></svg>
                    Smart Anonymizer Aktif
                </p>

                <div class="space-y-4">
                    @forelse($report->evidence as $evidence)
                        @php
                            $isRevealed = in_array($evidence->id, $revealedEvidence);
                            $isImage = str_contains($evidence->mime_type, 'image');
                        @endphp
                        
                        <div class="relative rounded-2xl overflow-hidden border border-slate-200 bg-slate-50 group">
                            {{-- Image Container --}}
                            <div class="w-full h-48 bg-slate-200 relative overflow-hidden flex items-center justify-center">
                                @if($isRevealed && $isImage)
                                    <img id="evidence-img-{{ $evidence->id }}" src="{{ route('admin.reports.stream-evidence', $evidence->id) }}" alt="Evidence" class="object-cover w-full h-full">
                                @elseif($isImage)
                                    <img id="evidence-img-{{ $evidence->id }}" src="" alt="Evidence" class="object-cover w-full h-full hidden" onload="this.classList.remove('hidden'); this.nextElementSibling.classList.add('hidden')">
                                    <div class="absolute inset-0 bg-slate-800 flex items-center justify-center">
                                        <div class="text-center p-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-slate-500 mx-auto mb-2 opacity-50"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
                                            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Gambar Disensor</p>
                                        </div>
                                    </div>
                                    <div class="absolute inset-0 backdrop-blur-xl bg-white/10"></div>
                                @else
                                    <div class="text-center p-4 flex flex-col items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-slate-400 mb-2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" /></svg>
                                        <p class="text-xs font-bold text-slate-500">Dokumen PDF/Lainnya</p>
                                    </div>
                                @endif
                                @if(!$isRevealed)
                                    <div class="absolute inset-0 flex items-center justify-center bg-slate-900/40 opacity-0 group-hover:opacity-100 transition-opacity">
                                        @if($evidence->is_client_encrypted)
                                            <button 
                                                x-data="{ 
                                                    async decryptAndShow() {
                                                        const password = prompt('Laporan ini dienkripsi oleh pengguna. Masukkan kata sandi dekripsi untuk melihat:');
                                                        if (!password) return;

                                                        try {
                                                            const response = await fetch('{{ route('admin.reports.stream-evidence', $evidence->id) }}');
                                                            const encryptedData = await response.arrayBuffer();
                                                            const metadata = @js($evidence->encryption_metadata);
                                                            
                                                            const salt = new Uint8Array(metadata.salt);
                                                            const iv = new Uint8Array(metadata.iv);
                                                            const encoder = new TextEncoder();

                                                            const keyMaterial = await crypto.subtle.importKey(
                                                                'raw', encoder.encode(password), 'PBKDF2', false, ['deriveKey']
                                                            );
                                                            const key = await crypto.subtle.deriveKey(
                                                                { name: 'PBKDF2', salt: salt, iterations: 100000, hash: 'SHA-256' },
                                                                keyMaterial, { name: 'AES-GCM', length: 256 }, false, ['decrypt']
                                                            );

                                                            const decrypted = await crypto.subtle.decrypt(
                                                                { name: 'AES-GCM', iv: iv }, key, encryptedData
                                                            );

                                                            const blob = new Blob([decrypted], { type: '{{ $evidence->mime_type }}' });
                                                            const url = URL.createObjectURL(blob);
                                                            
                                                            // Update the image src or open in new tab
                                                            @if($isImage)
                                                                const img = document.getElementById('evidence-img-{{ $evidence->id }}');
                                                                if (img) img.src = url;
                                                                $wire.revealEvidence({{ $evidence->id }}); // Still notify server for audit log
                                                            @else
                                                                window.open(url, '_blank');
                                                            @endif
                                                        } catch (e) {
                                                            alert('Gagal dekripsi. Kata sandi mungkin salah.');
                                                            console.error(e);
                                                        }
                                                    }
                                                }"
                                                @click="decryptAndShow()" 
                                                class="px-4 py-2 bg-emerald-600 rounded-lg shadow-lg font-bold text-sm text-white hover:bg-emerald-500 transition-colors flex items-center gap-2"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" /><path fill-rule="evenodd" d="M.664 10.59a1.651 1.651 0 0 1 0-1.186A10.004 10.004 0 0 1 10 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0 1 10 17c-4.257 0-7.893-2.66-9.336-6.41ZM14 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z" clip-rule="evenodd" /></svg>
                                                Dekripsi & Lihat
                                            </button>
                                        @else
                                            <button x-on:click="$dispatch('open-reveal-modal', { id: {{ $evidence->id }} })" class="px-4 py-2 bg-white rounded-lg shadow-lg font-bold text-sm text-slate-900 hover:bg-primary-50 transition-colors flex items-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 text-rose-500"><path fill-rule="evenodd" d="M10 1a4.5 4.5 0 0 0-4.5 4.5V9H5a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2h-.5V5.5A4.5 4.5 0 0 0 10 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" /></svg>
                                                Buka Sensor
                                            </button>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            {{-- File Info Bar --}}
                            <div class="px-4 py-3 bg-white border-t border-slate-100 flex items-center justify-between">
                                <div class="truncate pr-4">
                                    <p class="text-xs font-bold text-slate-800 truncate" title="{{ $evidence->original_name }}">{{ $evidence->original_name }}</p>
                                    <p class="text-[10px] text-slate-500 uppercase tracking-widest mt-0.5">{{ strtoupper(explode('/', $evidence->mime_type)[1] ?? 'FILE') }}</p>
                                </div>
                                @if($isRevealed)
                                    <button wire:click="viewEvidence({{ $evidence->id }})" class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-primary-600 hover:bg-primary-100 transition-colors shrink-0" title="Unduh Asli">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10 3a.75.75 0 01.75.75v6.827l2.53-2.529a.75.75 0 111.06 1.061l-3.82 3.821a.75.75 0 01-1.06 0l-3.82-3.821a.75.75 0 111.06-1.06l2.53 2.529V3.75A.75.75 0 0110 3z" clip-rule="evenodd" /><path d="M3 15a.75.75 0 01.75-.75h12.5a.75.75 0 010 1.5H3.75A.75.75 0 013 15z" /></svg>
                                    </button>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="text-center p-6 bg-slate-50 rounded-2xl border border-slate-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-slate-300 mx-auto mb-2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0l2.77-.693a9 9 0 016.208.682l.108.054a9 9 0 006.086.71l3.114-.732a48.524 48.524 0 01-.005-10.499l-3.11.732a9 9 0 01-6.085-.711l-.108-.054a9 9 0 00-6.208-.682L3 4.5M3 15V4.5" /></svg>
                            <p class="text-sm font-bold text-slate-500">Tidak ada bukti dilampirkan.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
    {{-- OJK Document Preview Modal --}}
    @if($showOjkPreview)
        <div class="fixed inset-0 z-[110] overflow-y-auto" x-transition>
            <div class="flex min-h-full items-center justify-center p-4">
                <div class="fixed inset-0 bg-slate-900/80 backdrop-blur-md" wire:click="toggleOjkPreview"></div>
                
                <div class="relative bg-white w-full max-w-4xl rounded-[2.5rem] shadow-2xl overflow-hidden flex flex-col h-[90vh]">
                    {{-- Modal Header --}}
                    <div class="p-6 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
                        <div>
                            <h3 class="text-xl font-black text-slate-900 uppercase tracking-tight">Pratinjau Dokumen <span class="text-primary-600">OJK</span></h3>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Laporan Pengaduan Masyarakat v1.0</p>
                        </div>
                        <button wire:click="toggleOjkPreview" class="p-2 hover:bg-slate-200 rounded-full transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                    </div>

                    {{-- Document Viewer --}}
                    <div class="flex-1 overflow-y-auto p-10 bg-slate-100 custom-scrollbar">
                        <div class="bg-white shadow-lg mx-auto p-12 min-h-[1000px] w-full max-w-[800px] border border-slate-200">
                            @include('reports.ojk-submission', ['report' => $report])
                        </div>
                    </div>

                    {{-- Modal Footer Actions --}}
                    <div class="p-6 border-t border-slate-100 bg-white flex items-center justify-between">
                        <div class="flex items-center gap-3 text-slate-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" /></svg>
                            <span class="text-xs font-bold uppercase tracking-widest">Kirim ke: konsumen@ojk.go.id</span>
                        </div>
                        <div class="flex gap-4">
                            <button wire:click="toggleOjkPreview" class="px-6 py-3 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-2xl font-black text-xs uppercase tracking-widest transition-all">Tutup</button>
                            <button wire:click="sendToOjk" class="px-8 py-3 bg-primary-600 hover:bg-primary-500 text-white rounded-2xl font-black text-xs uppercase tracking-widest transition-all shadow-lg shadow-primary-500/30 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path d="M3.105 2.289a.75.75 0 00-.826.95l1.414 4.925A1.5 1.5 0 005.135 9.25h6.115a.75.75 0 010 1.5H5.135a1.5 1.5 0 00-1.442 1.086l-1.414 4.926a.75.75 0 00.826.95 28.896 28.896 0 0015.293-7.154.75.75 0 000-1.115A28.897 28.897 0 003.105 2.289z" /></svg>
                                Kirim ke OJK / Satgas
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Custom Confirmation Modal --}}
    <div x-data="{ 
            open: false, 
            title: '',
            message: '',
            action: '',
            param: null,
            type: 'primary',
            confirmAction(data) {
                this.title = data.title;
                this.message = data.message;
                this.action = data.action;
                this.param = data.param;
                this.type = data.type || 'primary';
                this.open = true;
            },
            execute() {
                if (this.action === 'revealEvidence') {
                    $wire.revealEvidence(this.param);
                } else if (this.action === 'updateStatus') {
                    $wire.updateStatus(this.param);
                }
                this.open = false;
            }
         }"
         x-on:open-confirm-modal.window="confirmAction($event.detail)"
         x-on:open-reveal-modal.window="confirmAction({
            title: 'Peringatan Keamanan',
            message: 'Sistem akan mencatat aktivitas Anda saat membuka sensor bukti ini di dalam Audit Log untuk alasan akuntabilitas. Lanjutkan?',
            action: 'revealEvidence',
            param: $event.detail.id,
            type: 'rose'
         })"
         class="relative z-[100]"
         x-show="open"
         x-cloak
         style="display: none">
        
        {{-- Backdrop --}}
        <div x-show="open" 
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity"
             style="display: none"></div>

        {{-- Modal Content --}}
        <div x-show="open" 
             class="fixed inset-0 z-10 overflow-y-auto"
             style="display: none">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                <div x-show="open"
                     x-transition:enter="ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave="ease-in duration-200"
                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     @click.away="open = false"
                     class="relative transform overflow-hidden rounded-[2.5rem] bg-white p-8 text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg border border-slate-100">
                    
                    <div class="mb-6">
                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl mb-6 border"
                             :class="{
                                'bg-blue-50 text-blue-600 border-blue-100': type === 'blue',
                                'bg-purple-50 text-purple-600 border-purple-100': type === 'purple',
                                'bg-emerald-50 text-emerald-600 border-emerald-100': type === 'emerald',
                                'bg-rose-50 text-rose-600 border-rose-100': type === 'rose',
                                'bg-slate-50 text-slate-600 border-slate-100': type === 'primary'
                             }">
                            <template x-if="type === 'rose'">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-8 w-8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0-10.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75A11.959 11.959 0 0 1 12 2.714Z" /></svg>
                            </template>
                            <template x-if="type !== 'rose'">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-8 w-8"><path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" /></svg>
                            </template>
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-black text-slate-900 uppercase tracking-tight mb-2" x-text="title"></h3>
                            <p class="text-sm font-medium text-slate-500 leading-relaxed" x-html="message"></p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mt-8">
                        <button @click="open = false" class="py-4 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-2xl font-black text-xs uppercase tracking-widest transition-all">Batalkan</button>
                        <button @click="execute" class="py-4 text-white rounded-2xl font-black text-xs uppercase tracking-widest transition-all shadow-lg shadow-primary-500/30"
                                :class="{
                                    'bg-blue-600 hover:bg-blue-500 shadow-blue-500/20': type === 'blue',
                                    'bg-purple-600 hover:bg-purple-500 shadow-purple-500/20': type === 'purple',
                                    'bg-emerald-600 hover:bg-emerald-500 shadow-emerald-500/20': type === 'emerald',
                                    'bg-rose-600 hover:bg-rose-500 shadow-rose-500/20': type === 'rose',
                                    'bg-primary-600 hover:bg-primary-500 shadow-primary-500/20': type === 'primary'
                                }">Konfirmasi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
