<x-frontend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-100 leading-tight">
            {{ __('Buat Laporan Pengaduan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                {{-- MAIN FORM --}}
                <div class="lg:col-span-8">
                    <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] sm:rounded-3xl overflow-hidden mb-8">
                        <div class="relative h-48 bg-teal-900/30 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-r from-teal-900/50 to-transparent z-10"></div>
                            <img src="/Pelaporan Aman & Terlindungi.webp" alt="Header Pelaporan" class="absolute right-0 top-0 h-full w-auto object-cover opacity-60">
                            <div class="relative z-20 p-8 h-full flex flex-col justify-center">
                                <h1 class="text-3xl font-black text-white mb-2">Sampaikan Laporan Anda</h1>
                                <p class="text-teal-100/70 max-w-md">Data Anda dienkripsi dan diproses secara anonim untuk keamanan maksimal.</p>
                            </div>
                        </div>
                        <div class="p-6 md:p-10 text-slate-100">
                            <livewire:report-form />
                        </div>
                    </div>
                </div>

                {{-- SIDEBAR --}}
                <div class="lg:col-span-4 space-y-6">
                    <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 sticky top-24">
                        <div class="mb-8 relative aspect-square overflow-hidden rounded-2xl">
                            <div class="absolute -inset-4 bg-teal-500/10 blur-2xl rounded-full"></div>
                            <img src="/Perlindungan & Keamanan.webp" alt="Ilustrasi Perlindungan" class="relative z-10 w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-white mb-4">Jaminan Keamanan</h3>
                        <ul class="space-y-4">
                            <li class="flex gap-3 items-start text-sm text-slate-400">
                                <span class="text-teal-500">🛡️</span>
                                <div><strong class="text-slate-200 block">100% Anonim</strong> Tanpa NIK, tanpa KTP, tanpa identitas asli.</div>
                            </li>
                            <li class="flex gap-3 items-start text-sm text-slate-400">
                                <span class="text-teal-500">🔐</span>
                                <div><strong class="text-slate-200 block">Enkripsi Militer</strong> Data bukti disimpan dengan standar enkripsi AES-256.</div>
                            </li>
                            <li class="flex gap-3 items-start text-sm text-slate-400">
                                <span class="text-teal-500">⚖️</span>
                                <div><strong class="text-slate-200 block">Dukungan Hukum</strong> Laporan diteruskan ke mitra LBH untuk tindak lanjut.</div>
                            </li>
                        </ul>
                        <div class="mt-8 pt-8 border-t border-slate-800">
                            <p class="text-xs text-slate-500 italic">"Ketenangan Anda adalah prioritas utama kami. Jangan biarkan teror menghancurkan hari Anda."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-frontend-layout>
