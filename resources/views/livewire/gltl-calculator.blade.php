<div class="max-w-6xl mx-auto py-12 px-6">
    {{-- Header Section --}}
    <div class="mb-12 text-center">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-rose-500/10 border border-rose-500/20 text-rose-500 text-[10px] font-black uppercase tracking-[0.2em] mb-6">
            <span class="w-2 h-2 rounded-full bg-rose-500 animate-pulse"></span>
            Simulasi Gali Lobang Tutup Lobang
        </div>
        <h2 class="text-5xl font-black text-white uppercase tracking-tighter mb-4 grad">Visualisasi Siklus Hutang.</h2>
        <p class="text-slate-400 text-lg max-w-2xl mx-auto">
            Gunakan kalkulator ini untuk melihat bagaimana hutang Anda membengkak saat mencoba menutup lubang lama dengan lubang baru.
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Input Section --}}
        <div class="lg:col-span-2 space-y-6">
            {{-- Existing Debt Input --}}
            <div class="glass p-8 rounded-[2.5rem] border-slate-800 bg-gradient-to-br from-slate-900 to-slate-950">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-10 h-10 bg-rose-500/10 rounded-xl flex items-center justify-center text-rose-500 border border-rose-500/20">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-black text-white uppercase tracking-tighter">Total Hutang Saat Ini</h3>
                        <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">Hutang yang sudah ada sebelum Gali Lobang dimulai</p>
                    </div>
                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none text-slate-500 font-black text-sm">Rp</div>
                    <input wire:model.live="existingDebt" type="number" class="w-full bg-slate-950 border-slate-800 rounded-2xl pl-14 pr-6 py-5 text-xl font-black text-rose-400 focus:ring-rose-500 focus:border-rose-500 transition-all" placeholder="0">
                </div>
            </div>

            <div class="glass p-8 rounded-[2.5rem] border-slate-800">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-xl font-black text-white uppercase tracking-tighter">Daftar Pinjol Baru</h3>
                    <button wire:click="addLoan" class="p-3 bg-teal-500/10 hover:bg-teal-500/20 text-teal-500 rounded-2xl transition-all border border-teal-500/20 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 group-hover:rotate-90 transition-transform">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>

                <div class="space-y-6">
                    @foreach($loans as $index => $loan)
                        <div class="relative group p-6 bg-slate-950/50 border border-slate-800 rounded-3xl hover:border-slate-700 transition-all">
                            <div class="absolute -top-3 -left-3 w-8 h-8 bg-slate-800 text-white rounded-xl flex items-center justify-center text-xs font-black border border-slate-700 shadow-xl">
                                {{ $index + 1 }}
                            </div>
                            
                            @if(count($loans) > 1)
                                <button wire:click="removeLoan({{ $index }})" class="absolute -top-3 -right-3 w-8 h-8 bg-rose-500/10 hover:bg-rose-500 text-rose-500 hover:text-white rounded-xl flex items-center justify-center transition-all border border-rose-500/20 shadow-xl opacity-0 group-hover:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            @endif

                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <div class="md:col-span-1">
                                    <label class="text-[9px] font-black text-slate-500 uppercase tracking-widest block mb-2 ml-1">Nama Pinjol</label>
                                    <input wire:model.live="loans.{{ $index }}.name" type="text" class="w-full bg-slate-900 border-slate-800 rounded-xl px-4 py-3 text-slate-200 text-sm focus:ring-teal-500 focus:border-teal-500">
                                </div>
                                <div>
                                    <label class="text-[9px] font-black text-slate-500 uppercase tracking-widest block mb-2 ml-1">Tagihan (Plafond)</label>
                                    <input wire:model.live="loans.{{ $index }}.plafond" type="number" class="w-full bg-slate-900 border-slate-800 rounded-xl px-4 py-3 text-slate-200 text-sm focus:ring-teal-500 focus:border-teal-500" placeholder="0">
                                </div>
                                <div>
                                    <label class="text-[9px] font-black text-slate-500 uppercase tracking-widest block mb-2 ml-1">Dana Diterima</label>
                                    <input wire:model.live="loans.{{ $index }}.dana_cair" type="number" class="w-full bg-slate-900 border-slate-800 rounded-xl px-4 py-3 text-slate-200 text-sm focus:ring-teal-500 focus:border-teal-500" placeholder="0">
                                </div>
                                <div>
                                    <label class="text-[9px] font-black text-slate-500 uppercase tracking-widest block mb-2 ml-1">Untuk Tutup Lobang</label>
                                    <input wire:model.live="loans.{{ $index }}.dana_tutup" type="number" class="w-full bg-slate-900 border-slate-800 rounded-xl px-4 py-3 text-slate-200 text-sm focus:ring-teal-500 focus:border-teal-500" placeholder="0">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="mt-8 pt-8 border-t border-slate-800 flex justify-center">
                    <button wire:click="addLoan" class="px-8 py-3 bg-slate-800 hover:bg-slate-700 text-white font-black text-[10px] rounded-2xl uppercase tracking-[0.2em] transition-all">
                        + Tambah Pinjol Lagi
                    </button>
                </div>
            </div>

            {{-- Contextual Alert --}}
            <div class="p-6 bg-rose-500/5 border border-rose-500/20 rounded-3xl flex items-start gap-4">
                <div class="w-12 h-12 bg-rose-500/10 rounded-2xl flex items-center justify-center text-rose-500 shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                    </svg>
                </div>
                <div>
                    <h4 class="text-white font-bold text-sm uppercase tracking-tight mb-1">Bahaya GLTL!</h4>
                    <p class="text-rose-400/80 text-xs leading-relaxed">
                        Membayar pinjol dengan pinjol lain hanya akan membuat hutang Anda meledak karena potongan biaya admin dan bunga yang sangat tinggi di setiap aplikasi baru.
                    </p>
                </div>
            </div>
        </div>

        {{-- Summary Section --}}
        <div class="space-y-6">
            <div class="glass p-8 rounded-[2.5rem] border-teal-500/20 bg-gradient-to-br from-slate-900 to-slate-950 sticky top-24">
                <h3 class="text-xl font-black text-white uppercase tracking-tighter mb-8 flex items-center gap-3">
                    <span class="w-8 h-8 bg-teal-500 rounded-xl flex items-center justify-center shadow-lg shadow-teal-500/20">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75V18m-3-9.75V18m-3-3V18m3-9.75ZM6 7.5h12M5.25 18h13.5A2.25 2.25 0 0 0 21 15.75V9.456a2.25 2.25 0 0 0-1.061-1.915l-6-3.6a2.25 2.25 0 0 0-2.378 0l-6 3.6A2.25 2.25 0 0 0 3 9.456v6.294A2.25 2.25 0 0 0 5.25 18Z" />
                        </svg>
                    </span>
                    Hasil Akumulasi
                </h3>

                <div class="space-y-6">
                    <div class="p-5 bg-slate-950 rounded-3xl border border-white/5">
                        <label class="text-[9px] font-black text-slate-500 uppercase tracking-widest block mb-1">Total Hutang (Plafond)</label>
                        <div class="text-2xl font-black text-white tracking-tighter">Rp {{ number_format($totalPlafond, 0, ',', '.') }}</div>
                    </div>

                    <div class="p-5 bg-slate-950 rounded-3xl border border-white/5">
                        <label class="text-[9px] font-black text-slate-500 uppercase tracking-widest block mb-1">Total Dana Cair</label>
                        <div class="text-xl font-bold text-teal-400 tracking-tight">Rp {{ number_format($totalDanaCair, 0, ',', '.') }}</div>
                    </div>

                    <div class="p-5 bg-slate-950 rounded-3xl border border-white/5">
                        <label class="text-[9px] font-black text-slate-500 uppercase tracking-widest block mb-1">Total Dana Untuk Tutup Lobang</label>
                        <div class="text-xl font-bold text-rose-400 tracking-tight">Rp {{ number_format($totalDanaTutup, 0, ',', '.') }}</div>
                    </div>

                    <div class="p-5 bg-teal-500/5 rounded-3xl border border-teal-500/10">
                        <label class="text-[9px] font-black text-teal-500 uppercase tracking-widest block mb-1">Sisa Dana Cair Bersih</label>
                        <div class="text-xl font-black text-teal-400 tracking-tight">Rp {{ number_format($netCash, 0, ',', '.') }}</div>
                    </div>

                    <div class="pt-6 border-t border-slate-800">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Saldo Akhir (Status Finansial)</span>
                            <span class="px-3 py-1 bg-slate-800 text-white text-[9px] font-black rounded-lg uppercase tracking-widest">Hasil Akhir</span>
                        </div>
                        <div class="text-3xl font-black {{ $finalBalance >= 0 ? 'text-teal-500' : 'text-rose-500' }} tracking-tighter mb-2">
                            Rp {{ number_format($finalBalance, 0, ',', '.') }}
                        </div>
                        <p class="text-[10px] text-slate-500 font-bold uppercase leading-tight">
                            {{ $finalBalance < 0 ? 'Anda masih kekurangan dana sebesar ini untuk melunasi seluruh hutang.' : 'Selamat! Dana cair baru Anda mencukupi untuk menutup hutang lama (Sangat Jarang Terjadi).' }}
                        </p>
                    </div>

                    <div class="p-4 bg-slate-950 rounded-2xl border border-slate-800">
                        <label class="text-[8px] font-black text-slate-500 uppercase tracking-widest block mb-1 text-center">Total Akumulasi Hutang (Jika Dilanjut)</label>
                        <div class="text-lg font-black text-white tracking-tighter text-center opacity-60">Rp {{ number_format($debtAccumulation, 0, ',', '.') }}</div>
                    </div>
                </div>

                <button class="w-full mt-10 py-5 bg-gradient-to-r from-rose-600 to-rose-700 hover:from-rose-500 hover:to-rose-600 text-white font-black text-xs rounded-3xl uppercase tracking-widest transition-all shadow-xl shadow-rose-900/20 group">
                    <span class="flex items-center justify-center gap-2">
                        STOP GALI LOBANG SEKARANG!
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 group-hover:translate-x-1 transition-transform">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>
