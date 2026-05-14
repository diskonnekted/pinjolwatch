<x-frontend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-100 leading-tight">
            {{ __('Tentang Kami') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-12">
            
            {{-- HERO SECTION --}}
            <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl overflow-hidden relative">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-900/30 to-slate-900 z-0"></div>
                <div class="relative z-10 p-10 md:p-16 text-center">
                    <img src="/pw-logo.png" alt="PinjolWatch Logo Utama" class="mx-auto h-40 w-auto mb-8 drop-shadow-2xl" style="filter: brightness(0) invert(1);">
                    <div class="inline-flex items-center justify-center px-4 py-1.5 rounded-full bg-blue-900/50 border border-blue-800 text-blue-400 text-sm font-bold mb-6">
                        🌐 TENTANG KAMI
                    </div>
                    <h1 class="text-4xl md:text-5xl font-black text-slate-100 leading-tight mb-6">
                        PinjolWatch Bukan Sekadar Aplikasi.<br>
                        <span class="text-blue-400">Ini Adalah Gerakan Melawan Eksploitasi Finansial.</span>
                    </h1>
                    <p class="text-lg text-slate-300 leading-relaxed max-w-3xl mx-auto mb-10">
                        Kami hadir untuk memutus siklus teror pinjol ilegal, menghapus stigma kesulitan ekonomi, dan mengembalikan ketenangan melalui teknologi yang aman, transparan, dan berpusat pada manusia.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('report') }}" class="px-8 py-4 bg-teal-600 text-white font-bold rounded-2xl shadow-[0_4px_14px_rgba(13,148,136,0.4)] hover:bg-teal-500 hover:-translate-y-0.5 transition-all whitespace-nowrap">
                            🛡️ Mulai Pengaduan Anonim
                        </a>
                        <a href="#prinsip" class="px-8 py-4 bg-slate-800 border border-slate-700 text-slate-200 font-bold rounded-2xl hover:bg-slate-700 transition-all whitespace-nowrap">
                            📖 Pelajari Prinsip Kami
                        </a>
                    </div>
                </div>
            </div>

            {{-- LATAR BELAKANG --}}
            <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-12 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-900/10 rounded-full blur-3xl"></div>
                <h2 class="text-2xl font-bold text-slate-100 mb-6">Latar Belakang: Mengapa PinjolWatch Dibuat?</h2>
                <p class="text-slate-400 mb-6 leading-relaxed">
                    Di Indonesia, pinjaman online ilegal berkembang pesat dengan memanfaatkan <strong>kepanikan, ketidaktahuan regulasi, dan stigma sosial</strong>. Korban sering kali:
                </p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                    <div class="p-4 bg-slate-800/50 border border-slate-700 rounded-xl text-sm text-slate-300 flex items-start gap-3">
                        <span class="text-red-400 mt-0.5">⚠️</span> Terisolasi karena malu mengakui kesulitan finansial.
                    </div>
                    <div class="p-4 bg-slate-800/50 border border-slate-700 rounded-xl text-sm text-slate-300 flex items-start gap-3">
                        <span class="text-red-400 mt-0.5">⚠️</span> Terjebak dalam teror debt collector yang melanggar hukum.
                    </div>
                    <div class="p-4 bg-slate-800/50 border border-slate-700 rounded-xl text-sm text-slate-300 flex items-start gap-3">
                        <span class="text-red-400 mt-0.5">⚠️</span> Menjadi sasaran joki pelunasan palsu & pencari konten.
                    </div>
                    <div class="p-4 bg-slate-800/50 border border-slate-700 rounded-xl text-sm text-slate-300 flex items-start gap-3">
                        <span class="text-red-400 mt-0.5">⚠️</span> Kehilangan akses pendampingan karena takut dihakimi.
                    </div>
                </div>

                <div class="bg-indigo-900/20 border-l-4 border-indigo-500 p-6 rounded-r-xl">
                    <p class="text-indigo-200  font-medium leading-relaxed">
                        "Kesulitan ekonomi bukan aib. Teror pinjol ilegal adalah pelanggaran hukum. Dan setiap korban berhak mendapatkan perlindungan tanpa penghakiman."
                    </p>
                </div>
            </div>

            {{-- MISI & VISI --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8">
                    <h2 class="text-xl font-bold text-teal-400 mb-6 flex items-center gap-2">🎯 Misi Kami</h2>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3 text-sm text-slate-300">
                            <span class="text-teal-500 mt-0.5">✅</span> Menyediakan platform pengaduan anonim yang terenkripsi & sesuai UU PDP.
                        </li>
                        <li class="flex items-start gap-3 text-sm text-slate-300">
                            <span class="text-teal-500 mt-0.5">✅</span> Mendampingi pemulihan mental korban melalui panduan & komunitas aman.
                        </li>
                        <li class="flex items-start gap-3 text-sm text-slate-300">
                            <span class="text-teal-500 mt-0.5">✅</span> Memetakan ancaman per kabupaten untuk edukasi publik.
                        </li>
                        <li class="flex items-start gap-3 text-sm text-slate-300">
                            <span class="text-teal-500 mt-0.5">✅</span> Mengedukasi literasi keuangan & cara mengenali penipuan sekunder.
                        </li>
                    </ul>
                </div>
                <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8">
                    <h2 class="text-xl font-bold text-blue-400 mb-6 flex items-center gap-2">🔭 Visi Kami</h2>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3 text-sm text-slate-300">
                            <span class="text-blue-500 mt-0.5">🌍</span> Indonesia di mana tidak ada korban yang terhukum sosial karena kesulitan finansial.
                        </li>
                        <li class="flex items-start gap-3 text-sm text-slate-300">
                            <span class="text-blue-500 mt-0.5">📊</span> Praktik pinjol ilegal ditindak melalui data terverifikasi & pemetaan transparan.
                        </li>
                        <li class="flex items-start gap-3 text-sm text-slate-300">
                            <span class="text-blue-500 mt-0.5">🤝</span> Masyarakat yang kritis terhadap janji instan & saling menopang.
                        </li>
                        <li class="flex items-start gap-3 text-sm text-slate-300">
                            <span class="text-blue-500 mt-0.5">🔒</span> Privasi digital dipahami sebagai hak dasar, bukan kemewahan.
                        </li>
                    </ul>
                </div>
            </div>

            {{-- PRINSIP DASAR --}}
            <div id="prinsip" class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-12 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-900/10 rounded-full blur-3xl"></div>
                <h2 class="text-2xl font-bold text-slate-100 mb-8">5 Prinsip Dasar (Core Values)</h2>
                
                <div class="space-y-4">
                    <div class="p-5 bg-slate-800/80 border border-slate-700 rounded-2xl flex flex-col md:flex-row gap-4">
                        <div class="md:w-1/3">
                            <strong class="text-emerald-400 block text-lg mb-1 flex items-center gap-2"><span>🔒</span> Privasi</strong>
                            <p class="text-xs text-slate-500 uppercase font-bold">Sebagai Hak Dasar</p>
                        </div>
                        <div class="md:w-2/3 border-l border-slate-700 pl-4">
                            <p class="text-sm text-slate-300">Anonimitas penuh, enkripsi AES-256, tidak ada pelacakan IP plain-text, kepatuhan ketat UU PDP No. 27/2022.</p>
                        </div>
                    </div>

                    <div class="p-5 bg-slate-800/80 border border-slate-700 rounded-2xl flex flex-col md:flex-row gap-4">
                        <div class="md:w-1/3">
                            <strong class="text-blue-400 block text-lg mb-1 flex items-center gap-2"><span>🤍</span> Trauma-Informed</strong>
                            <p class="text-xs text-slate-500 uppercase font-bold">Design & UX</p>
                        </div>
                        <div class="md:w-2/3 border-l border-slate-700 pl-4">
                            <p class="text-sm text-slate-300">Bahasa yang memvalidasi, tidak menghakimi, alur yang tidak memicu panik, dan opsi "jeda & simpan draft".</p>
                        </div>
                    </div>

                    <div class="p-5 bg-slate-800/80 border border-slate-700 rounded-2xl flex flex-col md:flex-row gap-4">
                        <div class="md:w-1/3">
                            <strong class="text-indigo-400 block text-lg mb-1 flex items-center gap-2"><span>🔍</span> Transparansi</strong>
                            <p class="text-xs text-slate-500 uppercase font-bold">& Akuntabilitas</p>
                        </div>
                        <div class="md:w-2/3 border-l border-slate-700 pl-4">
                            <p class="text-sm text-slate-300">Audit log admin, pemetaan agregat tanpa doxing, kebijakan publik terbuka, versioning dokumen hukum.</p>
                        </div>
                    </div>

                    <div class="p-5 bg-slate-800/80 border border-slate-700 rounded-2xl flex flex-col md:flex-row gap-4">
                        <div class="md:w-1/3">
                            <strong class="text-amber-400 block text-lg mb-1 flex items-center gap-2"><span>📚</span> Edukasi</strong>
                            <p class="text-xs text-slate-500 uppercase font-bold">& Pencegahan</p>
                        </div>
                        <div class="md:w-2/3 border-l border-slate-700 pl-4">
                            <p class="text-sm text-slate-300">Modul literasi keuangan, panduan keluarga, peringatan joki palsu, cara menghadapi DC, kalkulator bunga.</p>
                        </div>
                    </div>

                    <div class="p-5 bg-slate-800/80 border border-slate-700 rounded-2xl flex flex-col md:flex-row gap-4">
                        <div class="md:w-1/3">
                            <strong class="text-teal-400 block text-lg mb-1 flex items-center gap-2"><span>🤝</span> Kolaborasi</strong>
                            <p class="text-xs text-slate-500 uppercase font-bold">Bukan Konfrontasi</p>
                        </div>
                        <div class="md:w-2/3 border-l border-slate-700 pl-4">
                            <p class="text-sm text-slate-300">Bekerja sama dengan LBH, psikolog, komunitas. Kami <strong>tidak berafiliasi</strong> dengan fintech/pinjol manapun.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- APA YANG BUKAN PINJOLWATCH --}}
            <div class="bg-red-900/10 border border-red-900/30 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-12">
                <h2 class="text-xl font-bold text-red-400 mb-6">Apa yang BUKAN PinjolWatch</h2>
                <p class="text-slate-400 text-sm mb-6">Agar ekspektasi jelas dan sesuai hukum, kami menegaskan:</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="p-4 bg-slate-900/50 border border-slate-800 rounded-xl text-sm">
                        <strong class="text-slate-200 block mb-1">❌ Bukan Penegak Hukum</strong>
                        <p class="text-slate-400 text-xs">Kami bukan pengganti kepolisian atau OJK. Kami hanya wadah pengaduan.</p>
                    </div>
                    <div class="p-4 bg-slate-900/50 border border-slate-800 rounded-xl text-sm">
                        <strong class="text-slate-200 block mb-1">❌ Bukan Joki Pelunasan</strong>
                        <p class="text-slate-400 text-xs">Tidak ada layanan negosiasi berbayar atau penghapusan utang instan.</p>
                    </div>
                    <div class="p-4 bg-slate-900/50 border border-slate-800 rounded-xl text-sm">
                        <strong class="text-slate-200 block mb-1">❌ Bukan Platform Pinjaman</strong>
                        <p class="text-slate-400 text-xs">Kami tidak mengelola dana, investasi, atau transaksi paylater.</p>
                    </div>
                    <div class="p-4 bg-slate-900/50 border border-slate-800 rounded-xl text-sm">
                        <strong class="text-slate-200 block mb-1">❌ Bukan Hakim Sengketa</strong>
                        <p class="text-slate-400 text-xs">Kami memverifikasi pola dan format bukti, bukan mengadili.</p>
                    </div>
                </div>
            </div>

            {{-- FOOTER CTA --}}
            <div class="bg-gradient-to-br from-slate-800 to-slate-900 border border-slate-700 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-12 text-center">
                <h3 class="text-2xl font-bold text-slate-100 mb-4">Mulai Langkah Pertama Bersama Kami</h3>
                <p class="text-slate-400 mb-8 max-w-2xl mx-auto">Tidak perlu sempurna. Tidak perlu sendirian. Cukup mulai dari satu aksi yang membuat Anda merasa lebih aman hari ini.</p>
                
                <div class="grid md:grid-cols-3 gap-4 mb-6">
                    <a href="{{ route('report') }}" class="px-6 py-3 bg-teal-600 text-white font-bold rounded-xl hover:bg-teal-500 transition-all shadow-[0_4px_14px_rgba(13,148,136,0.4)]">
                        🛡️ Lapor Anonim
                    </a>
                    <a href="{{ route('panduan-keuangan') }}" class="px-6 py-3 bg-slate-800 border border-slate-700 text-slate-200 font-bold rounded-xl hover:bg-slate-700 transition-all">
                        📈 Belajar Keuangan
                    </a>
                    <a href="{{ route('panduan-keluarga') }}" class="px-6 py-3 bg-slate-800 border border-slate-700 text-slate-200 font-bold rounded-xl hover:bg-slate-700 transition-all">
                        🤝 Dukungan Profesional
                    </a>
                </div>
                
                <p class="text-sm text-slate-500 mt-4">
                    📧 dpo@pinjolwatch.id<br>
                    Platform independen. Tidak berafiliasi dengan pinjol manapun. Kepatuhan UU PDP terjamin.
                </p>
            </div>

        </div>
    </div>
</x-frontend-layout>
