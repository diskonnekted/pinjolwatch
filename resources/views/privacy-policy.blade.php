<x-frontend-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap');
        .privacy-body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass-card { background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.05); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5); }
        .glass-card:hover { border-color: rgba(16, 185, 129, 0.2); transition: all 0.3s ease; }
        .glow-orb { position: absolute; border-radius: 50%; filter: blur(100px); pointer-events: none; z-index: 0; }
    </style>

    <div class="privacy-body relative bg-slate-950 text-slate-300 min-h-screen overflow-hidden py-24 px-4 sm:px-6 lg:px-8">
        {{-- Background Orbs --}}
        <div class="glow-orb w-[500px] h-[500px] bg-emerald-900/20 -top-48 -left-48"></div>
        <div class="glow-orb w-[600px] h-[600px] bg-blue-900/10 bottom-0 -right-48"></div>

        <div class="max-w-4xl mx-auto relative z-10">
            
            {{-- HERO SECTION --}}
            <div class="text-center mb-24">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs font-black tracking-widest uppercase mb-8">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    Privacy Commitment
                </div>
                <h1 class="text-5xl md:text-7xl font-black text-white tracking-tighter mb-8 leading-[0.9]">
                    Kebijakan <br><span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-500">Privasi Anda</span>
                </h1>
                <p class="text-xl text-slate-400 max-w-2xl mx-auto leading-relaxed">
                    Privasi bukan hanya tentang menyembunyikan data. Ini adalah tentang melindungi hak Anda untuk merasa aman di dunia digital.
                </p>
            </div>

            {{-- 30s SUMMARY --}}
            <div class="glass-card rounded-[2.5rem] p-10 md:p-16 mb-16 relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-500/5 rounded-full blur-3xl group-hover:bg-emerald-500/10 transition-all"></div>
                <h2 class="text-2xl font-black text-white mb-8 flex items-center gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8 text-emerald-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>
                    Ringkasan Singkat
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <ul class="space-y-6">
                        <li class="flex items-start gap-4">
                            <div class="w-6 h-6 rounded-full bg-emerald-500/20 flex items-center justify-center shrink-0 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-3 h-3 text-emerald-400"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                            </div>
                            <span class="text-slate-300 leading-relaxed"><strong class="text-white">Identitas Anonim:</strong> Anda tidak wajib menggunakan nama asli dalam pelaporan.</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="w-6 h-6 rounded-full bg-emerald-500/20 flex items-center justify-center shrink-0 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-3 h-3 text-emerald-400"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                            </div>
                            <span class="text-slate-300 leading-relaxed"><strong class="text-white">Anti-Komersial:</strong> Kami tidak pernah menjual data Anda kepada pihak manapun.</span>
                        </li>
                    </ul>
                    <ul class="space-y-6">
                        <li class="flex items-start gap-4">
                            <div class="w-6 h-6 rounded-full bg-emerald-500/20 flex items-center justify-center shrink-0 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-3 h-3 text-emerald-400"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                            </div>
                            <span class="text-slate-300 leading-relaxed"><strong class="text-white">Enkripsi Militer:</strong> Semua bukti kronologi diamankan dengan enkripsi AES-256.</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="w-6 h-6 rounded-full bg-emerald-500/20 flex items-center justify-center shrink-0 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-3 h-3 text-emerald-400"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                            </div>
                            <span class="text-slate-300 leading-relaxed"><strong class="text-white">Hak Lupa:</strong> Data dihapus permanen dalam 24 bulan atau atas permintaan Anda.</span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- MAIN CONTENT --}}
            <div class="space-y-12">
                
                {{-- 1. IDENTITAS --}}
                <div class="glass-card rounded-[2rem] p-10">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center text-white font-black text-xl shadow-lg shadow-emerald-500/20">1</div>
                        <h2 class="text-2xl font-black text-white uppercase tracking-tighter">Pengendali Data</h2>
                    </div>
                    <p class="text-slate-400 leading-relaxed mb-6">
                        <strong class="text-white">PinjolWatch</strong> bertindak sebagai Pengendali Data Pribadi sesuai regulasi yang berlaku di Indonesia (UU PDP). Kami bertanggung jawab penuh atas integritas informasi yang Anda percayakan.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="p-6 rounded-2xl bg-white/5 border border-white/5">
                            <span class="text-[10px] font-black text-emerald-400 uppercase tracking-widest block mb-1">Email Resmi</span>
                            <span class="text-white font-bold">dpo@pinjolwatch.id</span>
                        </div>
                        <div class="p-6 rounded-2xl bg-white/5 border border-white/5">
                            <span class="text-[10px] font-black text-emerald-400 uppercase tracking-widest block mb-1">Yurisdiksi</span>
                            <span class="text-white font-bold">Republik Indonesia</span>
                        </div>
                    </div>
                </div>

                {{-- 2. DATA COLLECTION --}}
                <div class="glass-card rounded-[2rem] p-10 overflow-hidden">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white font-black text-xl shadow-lg shadow-blue-500/20">2</div>
                        <h2 class="text-2xl font-black text-white uppercase tracking-tighter">Data Yang Dikumpulkan</h2>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="border-b border-white/10">
                                    <th class="py-4 px-2 text-[10px] font-black text-slate-500 uppercase tracking-widest">Kategori</th>
                                    <th class="py-4 px-2 text-[10px] font-black text-slate-500 uppercase tracking-widest">Jenis Data</th>
                                    <th class="py-4 px-2 text-[10px] font-black text-slate-500 uppercase tracking-widest">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5">
                                <tr>
                                    <td class="py-6 px-2 font-bold text-white">Identitas</td>
                                    <td class="py-6 px-2 text-slate-400 text-sm">Nama samaran, email komunikasi.</td>
                                    <td class="py-6 px-2"><span class="px-2 py-1 rounded bg-slate-800 text-[9px] font-black text-slate-400 uppercase">Opsional</span></td>
                                </tr>
                                <tr>
                                    <td class="py-6 px-2 font-bold text-white">Laporan</td>
                                    <td class="py-6 px-2 text-slate-400 text-sm">Kronologi teror, nama aplikasi, bukti chat.</td>
                                    <td class="py-6 px-2"><span class="px-2 py-1 rounded bg-emerald-500/20 text-[9px] font-black text-emerald-400 uppercase">Wajib</span></td>
                                </tr>
                                <tr>
                                    <td class="py-6 px-2 font-bold text-white">Media</td>
                                    <td class="py-6 px-2 text-slate-400 text-sm">Screenshot ancaman, rekaman telepon.</td>
                                    <td class="py-6 px-2"><span class="px-2 py-1 rounded bg-blue-500/20 text-[9px] font-black text-blue-400 uppercase">Dianonimkan</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- 3. HAK SUBJEK DATA --}}
                <div class="glass-card rounded-[2rem] p-10 relative overflow-hidden">
                    <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-emerald-500/5 rounded-full blur-3xl"></div>
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-violet-500 to-fuchsia-600 flex items-center justify-center text-white font-black text-xl shadow-lg shadow-violet-500/20">3</div>
                        <h2 class="text-2xl font-black text-white uppercase tracking-tighter">Hak Anda (UU PDP)</h2>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="p-6 rounded-3xl bg-white/5 border border-white/5 hover:bg-white/10 transition-colors">
                            <h4 class="text-white font-black text-lg mb-2">Hak Akses & Portabilitas</h4>
                            <p class="text-sm text-slate-400 leading-relaxed">Anda berhak mendapatkan salinan data yang Anda berikan kapan saja melalui kode tiket.</p>
                        </div>
                        <div class="p-6 rounded-3xl bg-white/5 border border-white/5 hover:bg-white/10 transition-colors">
                            <h4 class="text-white font-black text-lg mb-2">Hak Penarikan & Hapus</h4>
                            <p class="text-sm text-slate-400 leading-relaxed">Anda dapat menarik persetujuan pemrosesan data dan meminta penghapusan permanen.</p>
                        </div>
                    </div>
                </div>

            </div>

            {{-- FINAL PROMISE --}}
            <div class="mt-24 p-12 rounded-[3rem] bg-gradient-to-br from-emerald-900/40 to-slate-900 border border-emerald-500/20 text-center relative overflow-hidden">
                <div class="relative z-10">
                    <span class="text-4xl mb-6 block">🕊️</span>
                    <h3 class="text-3xl font-black text-white mb-6 uppercase tracking-tighter">Janji Kami Kepada Anda</h3>
                    <p class="text-slate-300 leading-relaxed max-w-2xl mx-auto mb-10">
                        Kami membangun PinjolWatch bukan sebagai gudang data, tetapi sebagai perisai. Setiap bit informasi yang kami simpan adalah untuk memperjuangkan hak-hak Anda kembali.
                    </p>
                    <div class="flex flex-wrap justify-center gap-6">
                        <a href="{{ route('disclaimer') }}" class="px-8 py-3 bg-white text-slate-900 rounded-2xl font-black text-xs uppercase tracking-widest hover:scale-105 transition-all">
                            Baca Disclaimer
                        </a>
                        <a href="mailto:dpo@pinjolwatch.id" class="px-8 py-3 bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-emerald-500/20 transition-all">
                            Hubungi DPO
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-12 text-center text-[10px] font-black text-slate-600 uppercase tracking-widest">
                Terakhir Diperbarui: 12 Mei 2026 • PinjolWatch Digital Safety
            </div>

        </div>
    </div>
</x-frontend-layout>
