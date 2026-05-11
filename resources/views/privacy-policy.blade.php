<x-frontend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-100 leading-tight">
            {{ __('Kebijakan Privasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-12">
            
            {{-- HERO SECTION --}}
            <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl overflow-hidden relative">
                <div class="absolute inset-0 bg-gradient-to-br from-emerald-900/30 to-slate-900 z-0"></div>
                <div class="relative z-10 p-10 md:p-16 text-center">
                    <div class="inline-flex items-center justify-center px-4 py-1.5 rounded-full bg-emerald-900/50 border border-emerald-800 text-emerald-400 text-sm font-bold mb-6">
                        🔒 PRIVACY POLICY
                    </div>
                    <h1 class="text-4xl md:text-5xl font-black text-slate-100 leading-tight mb-6">
                        Kebijakan Privasi
                    </h1>
                    <p class="text-lg text-slate-300 leading-relaxed max-w-2xl mx-auto mb-8">
                        Privasi Anda bukan formalitas. Ini adalah fondasi keamanan dan ketenangan Anda.
                    </p>
                    
                    <div class="bg-emerald-900/20 border border-emerald-800 p-6 rounded-2xl max-w-3xl mx-auto text-left">
                        <h2 class="text-lg font-bold text-emerald-400 mb-4 flex items-center gap-2">
                            <span class="text-xl">📌</span> Ringkasan Singkat (30 Detik Baca)
                        </h2>
                        <ul class="space-y-3 text-sm text-slate-300">
                            <li class="flex items-start gap-2"><span class="text-emerald-500 mt-0.5">✅</span> <strong>Anda tidak wajib memberikan identitas asli.</strong> Sistem menggunakan kode tiket acak untuk pelacakan.</li>
                            <li class="flex items-start gap-2"><span class="text-emerald-500 mt-0.5">✅</span> <strong>Kami tidak menjual, meminjamkan, atau membagikan data Anda</strong> ke pihak ketiga untuk tujuan komersial.</li>
                            <li class="flex items-start gap-2"><span class="text-emerald-500 mt-0.5">✅</span> <strong>Bukti & kronologi dienkripsi</strong> dan hanya dapat diakses oleh tim verifikasi terotorisasi.</li>
                            <li class="flex items-start gap-2"><span class="text-emerald-500 mt-0.5">✅</span> <strong>Anda bisa menarik persetujuan atau meminta penghapusan data</strong> kapan saja melalui kode tiket.</li>
                            <li class="flex items-start gap-2"><span class="text-emerald-500 mt-0.5">✅</span> <strong>Data otomatis dihapus permanen setelah 24 bulan</strong> atau lebih cepat atas permintaan Anda.</li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- CONTENT SECTIONS --}}
            <div class="space-y-8">
                
                {{-- 1. IDENTITAS --}}
                <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-10">
                    <h2 class="text-xl font-bold text-slate-100 mb-4 flex items-center gap-3">
                        <span class="w-8 h-8 rounded-lg bg-emerald-900/50 text-emerald-400 flex items-center justify-center text-sm border border-emerald-800">1</span>
                        Identitas Pengendali Data
                    </h2>
                    <p class="text-slate-400 text-sm leading-relaxed mb-4"><strong>PinjolWatch</strong> bertindak sebagai <strong>Pengendali Data Pribadi</strong> sesuai Pasal 1 angka 9 UU PDP.</p>
                    <ul class="space-y-3 text-sm text-slate-300">
                        <li class="flex items-center gap-2"><span class="text-xl">📧</span> <strong>Email Resmi:</strong> dpo@pinjolwatch.id</li>
                        <li class="flex items-center gap-2"><span class="text-xl">📍</span> <strong>Yurisdiksi:</strong> Republik Indonesia</li>
                        <li class="flex items-start gap-2"><span class="text-xl">🛡️</span> <strong>Peran:</strong> Menyediakan platform pengaduan independen, pemetaan agregat, dan edukasi literasi keuangan. Kami <strong>bukan</strong> lembaga penegak hukum, otoritas jasa keuangan, atau kantor hukum berizin.</li>
                    </ul>
                </div>

                {{-- 2. DATA YANG KAMI KUMPULKAN --}}
                <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-10 overflow-hidden">
                    <h2 class="text-xl font-bold text-slate-100 mb-4 flex items-center gap-3">
                        <span class="w-8 h-8 rounded-lg bg-emerald-900/50 text-emerald-400 flex items-center justify-center text-sm border border-emerald-800">2</span>
                        Data yang Kami Kumpulkan
                    </h2>
                    <p class="text-slate-400 text-sm leading-relaxed mb-6">Kami menganut prinsip <strong>Data Minimization</strong>. Kami hanya mengumpulkan data yang benar-benar diperlukan untuk fungsi platform.</p>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-sm">
                            <thead>
                                <tr class="border-b border-slate-700">
                                    <th class="py-4 px-4 text-slate-400 font-medium">Kategori</th>
                                    <th class="py-4 px-4 text-emerald-400 font-bold">Contoh Data</th>
                                    <th class="py-4 px-4 text-slate-400 font-medium">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-slate-800">
                                    <td class="py-4 px-4 text-slate-200">🆔 Identitas (Opsional)</td>
                                    <td class="py-4 px-4 text-slate-400">Nama samaran, email/token</td>
                                    <td class="py-4 px-4 text-slate-400">Tidak wajib. Hanya untuk notifikasi status.</td>
                                </tr>
                                <tr class="border-b border-slate-800">
                                    <td class="py-4 px-4 text-slate-200">📝 Data Laporan</td>
                                    <td class="py-4 px-4 text-slate-400">Kronologi, ancaman, pinjol, kabupaten</td>
                                    <td class="py-4 px-4 text-slate-400">Disimpan terenkripsi. Tanpa NIK/KTP.</td>
                                </tr>
                                <tr class="border-b border-slate-800">
                                    <td class="py-4 px-4 text-slate-200">📎 Bukti Pendukung</td>
                                    <td class="py-4 px-4 text-slate-400">Screenshot, rekaman, chat</td>
                                    <td class="py-4 px-4 text-slate-400">Auto-anonymizer otomatis mengaburkan wajah/NIK.</td>
                                </tr>
                                <tr class="border-b border-slate-800">
                                    <td class="py-4 px-4 text-slate-200">🔐 Data Teknis</td>
                                    <td class="py-4 px-4 text-slate-400">Hash IP, user-agent, log</td>
                                    <td class="py-4 px-4 text-slate-400">Untuk keamanan sistem & anti-spam.</td>
                                </tr>
                                <tr>
                                    <td class="py-4 px-4 text-slate-200">🍪 Cookie & Analisis</td>
                                    <td class="py-4 px-4 text-slate-400">Anonymized analytics</td>
                                    <td class="py-4 px-4 text-slate-400">Privasi-first, tanpa tracking lintas situs.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- 3 & 4. TUJUAN & BERBAGI DATA --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-10">
                        <h2 class="text-xl font-bold text-slate-100 mb-4 flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-emerald-900/50 text-emerald-400 flex items-center justify-center text-sm border border-emerald-800">3</span>
                            Dasar Hukum
                        </h2>
                        <ul class="space-y-3 text-sm text-slate-300">
                            <li class="flex items-start gap-2"><span class="text-emerald-500 mt-0.5">✅</span> <strong>Persetujuan Eksplisit:</strong> Penerimaan & penyimpanan laporan.</li>
                            <li class="flex items-start gap-2"><span class="text-emerald-500 mt-0.5">✅</span> <strong>Kepentingan Sah:</strong> Verifikasi & moderasi konten.</li>
                            <li class="flex items-start gap-2"><span class="text-emerald-500 mt-0.5">✅</span> <strong>Kepentingan Publik:</strong> Pemetaan statistik wilayah anonim.</li>
                            <li class="flex items-start gap-2"><span class="text-emerald-500 mt-0.5">✅</span> <strong>Kewajiban Hukum:</strong> Jika ada perintah pengadilan resmi.</li>
                        </ul>
                    </div>
                    <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-10">
                        <h2 class="text-xl font-bold text-slate-100 mb-4 flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-emerald-900/50 text-emerald-400 flex items-center justify-center text-sm border border-emerald-800">4</span>
                            Berbagi dengan Pihak ke-3
                        </h2>
                        <p class="text-slate-400 text-sm mb-4"><strong>Kami tidak menjual data pribadi.</strong> Data hanya dibagikan jika:</p>
                        <ul class="space-y-2 text-sm text-slate-300 list-disc pl-4">
                            <li>Otoritas Resmi: Hanya atas perintah hukum sah dan persetujuan eksplisit.</li>
                            <li>Penyedia Infrastruktur: Terikat DPA ketat (hanya memproses atas instruksi).</li>
                            <li>Publikasi: Seluruh data agregat dipastikan 100% anonim.</li>
                        </ul>
                    </div>
                </div>

                {{-- 5 & 6. KEAMANAN & RETENSI --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-10 relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-900/10 rounded-full blur-3xl"></div>
                        <h2 class="text-xl font-bold text-slate-100 mb-4 flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-emerald-900/50 text-emerald-400 flex items-center justify-center text-sm border border-emerald-800">5</span>
                            Keamanan Data
                        </h2>
                        <ul class="space-y-2 text-sm text-slate-300">
                            <li><strong>Enkripsi:</strong> AES-256 (At-Rest) & TLS 1.3 (In-Transit).</li>
                            <li><strong>Akses Terbatas:</strong> Hanya admin dengan 2FA.</li>
                            <li><strong>Anonymizer Otomatis:</strong> Blur pada KTP/Wajah sebelum disimpan.</li>
                            <li><strong>Respons Insiden:</strong> Notifikasi max 3x24 jam sesuai UU PDP.</li>
                        </ul>
                    </div>
                    <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-10">
                        <h2 class="text-xl font-bold text-slate-100 mb-4 flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-emerald-900/50 text-emerald-400 flex items-center justify-center text-sm border border-emerald-800">6</span>
                            Retensi & Penghapusan
                        </h2>
                        <ul class="space-y-2 text-sm text-slate-300 list-disc pl-4">
                            <li><strong>Selesai/Arsip:</strong> Maksimal 24 bulan, lalu hard delete permanen.</li>
                            <li><strong>Permintaan Hapus:</strong> Maks 14 hari kerja diproses dari DB & backup.</li>
                            <li><strong>Data Teknis:</strong> 12 bulan dirotasi.</li>
                        </ul>
                    </div>
                </div>

                {{-- 7. HAK ANDA --}}
                <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-10">
                    <h2 class="text-xl font-bold text-slate-100 mb-4 flex items-center gap-3">
                        <span class="w-8 h-8 rounded-lg bg-emerald-900/50 text-emerald-400 flex items-center justify-center text-sm border border-emerald-800">7</span>
                        Hak Anda sebagai Subjek Data
                    </h2>
                    <p class="text-slate-400 text-sm leading-relaxed mb-6">Sesuai Pasal 36 UU PDP, Anda berhak sepenuhnya atas data Anda:</p>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="p-4 bg-slate-800/50 border border-slate-700 rounded-xl text-sm">
                            <strong class="text-emerald-400 block mb-1">Akses & Salin</strong>
                            <p class="text-slate-300">Gunakan tiket Anda di Cek Tiket atau hubungi DPO.</p>
                        </div>
                        <div class="p-4 bg-slate-800/50 border border-slate-700 rounded-xl text-sm">
                            <strong class="text-emerald-400 block mb-1">Koreksi Data</strong>
                            <p class="text-slate-300">Kirim permintaan perubahan info via email resmi DPO.</p>
                        </div>
                        <div class="p-4 bg-slate-800/50 border border-slate-700 rounded-xl text-sm">
                            <strong class="text-emerald-400 block mb-1">Tarik Persetujuan / Hapus</strong>
                            <p class="text-slate-300">Gunakan opsi Hapus pada dashboard tiket atau lapor DPO.</p>
                        </div>
                        <div class="p-4 bg-slate-800/50 border border-slate-700 rounded-xl text-sm">
                            <strong class="text-emerald-400 block mb-1">Pengaduan LDPDP</strong>
                            <p class="text-slate-300">Anda berhak lapor LDPDP jika respons kami tak memuaskan.</p>
                        </div>
                    </div>
                </div>

            </div>

            {{-- FOOTER NOTE --}}
            <div class="bg-slate-950 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-12 text-center">
                <p class="text-sm text-slate-400 mb-6 max-w-3xl mx-auto leading-relaxed">
                    <strong class="text-slate-300">🕊️ Janji Kami:</strong><br>
                    Kebijakan ini bukan sekadar dokumen hukum. Ini adalah komitmen bahwa suara Anda akan didengar, data Anda akan dilindungi, dan ketenangan Anda adalah prioritas utama. Terima kasih telah mempercayakan keamanan digital Anda kepada PinjolWatch.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('disclaimer') }}" class="text-emerald-500 hover:text-emerald-400 text-sm font-bold transition-all">
                        Disclaimer →
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-frontend-layout>
