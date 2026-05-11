<div class="max-w-xl mx-auto py-8 px-4">
    <div class="bg-slate-900 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.3)] p-8 border border-slate-800">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-12 h-12 rounded-lg bg-primary-900/30 mb-4 border border-primary-800/50">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-primary-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196 7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-slate-100">Lacak Tiket Laporan</h2>
            <p class="text-sm text-slate-400 mt-2">Masukkan kode tiket Anda untuk melihat perkembangan terbaru.</p>
        </div>

        <form wire:submit.prevent="track" class="space-y-4">
            <div>
                <x-text-input wire:model="ticket_id" id="ticket_id" class="block w-full text-center font-mono text-lg tracking-widest" placeholder="PW-XXXXXX-YYYYMMDD" required />
                <x-input-error :messages="$errors->get('ticket_id')" class="mt-2 text-center" />
            </div>

            <x-primary-button class="w-full justify-center py-3">
                {{ __('Periksa Status') }}
            </x-primary-button>
        </form>

        @if($searched)
            <div class="mt-12 border-t border-slate-800 pt-8">
                @if($report)
                    <div class="space-y-6">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-slate-500 uppercase tracking-wider">Status Laporan</span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider 
                                @if($report->status == 'received') bg-amber-900/50 text-amber-400 border border-amber-800
                                @elseif($report->status == 'verified') bg-blue-900/50 text-blue-400 border border-blue-800
                                @elseif($report->status == 'forwarded') bg-purple-900/50 text-purple-400 border border-purple-800
                                @elseif($report->status == 'resolved') bg-green-900/50 text-green-400 border border-green-800
                                @else bg-slate-800 text-slate-300 @endif">
                                {{ $report->status }}
                            </span>
                        </div>

                        <div class="relative">
                            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                <div class="w-full border-t border-slate-700"></div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-xs text-slate-500 uppercase">Jenis Ancaman</p>
                                <p class="text-sm font-semibold text-slate-300 mt-1">{{ $report->threatType->label }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 uppercase">Kabupaten/Kota</p>
                                <p class="text-sm font-semibold text-slate-300 mt-1">{{ $report->kabupaten->nama }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 uppercase">Aplikasi</p>
                                <p class="text-sm font-semibold text-slate-300 mt-1">{{ $report->app_name ?: '-' }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 uppercase">Tanggal Kirim</p>
                                <p class="text-sm font-semibold text-slate-300 mt-1">{{ $report->created_at->format('d/m/Y') }}</p>
                            </div>
                        </div>

                        <div class="bg-primary-900/30 border border-primary-800 rounded-xl p-4 mt-4">
                            <h4 class="text-xs font-bold text-primary-400 uppercase tracking-widest flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                                Informasi Terbaru
                            </h4>
                            <p class="text-sm text-primary-100 mt-2 leading-relaxed">
                                @if($report->status == 'received')
                                    Laporan Anda telah kami terima dan sedang dalam antrean verifikasi tim moderasi.
                                @elseif($report->status == 'verified')
                                    Laporan Anda telah diverifikasi dan masuk dalam database pemetaan statistik nasional.
                                @elseif($report->status == 'forwarded')
                                    Laporan Anda telah diteruskan ke otoritas terkait untuk tindak lanjut hukum sesuai izin Anda.
                                @elseif($report->status == 'resolved')
                                    Kasus ini telah ditandai sebagai selesai. Data akan diarsipkan secara permanen.
                                @endif
                            </p>
                        </div>
                    </div>
                @else
                    <div class="text-center py-4">
                        <div class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-red-900/30 mb-3 text-red-400 border border-red-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-100">Tiket Tidak Ditemukan</h3>
                        <p class="text-sm text-slate-400 mt-1">Periksa kembali penulisan kode tiket Anda.</p>
                    </div>
                @endif
            </div>
        @endif
    </div>
</div>
