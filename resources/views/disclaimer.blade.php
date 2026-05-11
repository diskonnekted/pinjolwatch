<x-frontend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-100 leading-tight">
            {{ __('Disclaimer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-12">
            
            {{-- HERO SECTION --}}
            <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl overflow-hidden relative">
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-900/30 to-slate-900 z-0"></div>
                <div class="relative z-10 p-10 md:p-16 text-center">
                    <div class="inline-flex items-center justify-center px-4 py-1.5 rounded-full bg-indigo-900/50 border border-indigo-800 text-indigo-400 text-sm font-bold mb-6">
                        ⚖️ LEGAL DISCLAIMER
                    </div>
                    <h1 class="text-4xl md:text-5xl font-black text-slate-100 leading-tight mb-6">
                        Batasan Tanggung Jawab &<br>
                        <span class="text-indigo-400">Ketentuan Penggunaan</span>
                    </h1>
                    <p class="text-lg text-slate-300 leading-relaxed max-w-2xl mx-auto mb-8">
                        Halaman ini menjelaskan secara transparan hak, kewajiban, dan batasan tanggung jawab Pengelola PinjolWatch serta seluruh pengguna platform. Dengan mengakses atau menggunakan situs ini, Anda dianggap telah membaca, memahami, dan menyetujui seluruh ketentuan di bawah ini.
                    </p>
                    
                    <div class="inline-block bg-slate-800/80 border border-slate-700 p-4 rounded-xl text-sm text-slate-400">
                        <strong class="text-slate-200">📅 Tanggal Efektif:</strong> 1 Januari 2026 <span class="mx-2">|</span> <strong class="text-slate-200">Terakhir Diperbarui:</strong> {{ now()->format('d F Y') }}
                    </div>
                </div>
            </div>

            {{-- CONTENT SECTIONS --}}
            <div class="space-y-8">
                
                {{-- 1. SIFAT PLATFORM --}}
                <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-10">
                    <h2 class="text-xl font-bold text-slate-100 mb-4 flex items-center gap-3">
                        <span class="w-8 h-8 rounded-lg bg-indigo-900/50 text-indigo-400 flex items-center justify-center text-sm border border-indigo-800">1</span>
                        Sifat Platform & Peran Pengelola
                    </h2>
                    <p class="text-slate-400 text-sm leading-relaxed mb-4">PinjolWatch adalah <strong>platform pengaduan masyarakat, edukasi literasi keuangan, dan pemetaan independen</strong> yang dikelola secara swadaya/swakelola. Platform ini <strong>bukan</strong>:</p>
                    <ul class="space-y-2 mb-4 text-sm text-slate-300">
                        <li class="flex items-center gap-2"><span class="text-slate-500">-</span> Lembaga penegak hukum, kepolisian, atau kejaksaan</li>
                        <li class="flex items-center gap-2"><span class="text-slate-500">-</span> Otoritas jasa keuangan (OJK), bank, atau lembaga finansial berizin</li>
                        <li class="flex items-center gap-2"><span class="text-slate-500">-</span> Kantor konsultan hukum, psikolog, atau perencana keuangan bersertifikat</li>
                        <li class="flex items-center gap-2"><span class="text-slate-500">-</span> Pihak yang memiliki kemitraan resmi dari perusahaan fintech manapun</li>
                    </ul>
                    <p class="text-slate-400 text-sm leading-relaxed">Pengelola hanya bertindak sebagai <strong>penyelenggara sistem elektronik (intermediary)</strong> yang menyediakan wadah teknis untuk pengaduan, edukasi, dan agregasi data agregat.</p>
                </div>

                {{-- 2. KONTEN BUATAN PENGGUNA --}}
                <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-10">
                    <h2 class="text-xl font-bold text-slate-100 mb-4 flex items-center gap-3">
                        <span class="w-8 h-8 rounded-lg bg-indigo-900/50 text-indigo-400 flex items-center justify-center text-sm border border-indigo-800">2</span>
                        Konten Buatan Pengguna (User-Generated Content)
                    </h2>
                    <p class="text-slate-400 text-sm leading-relaxed mb-4">Seluruh laporan, komentar, forum, testimoni, atau unggahan media yang dikirimkan oleh pengguna (Konten Pelapor) merupakan tanggung jawab penuh dari pihak yang mengunggah.</p>
                    <ul class="space-y-3 text-sm text-slate-300">
                        <li class="flex items-start gap-2"><span class="text-teal-400 mt-0.5">✅</span> Pengelola tidak menjamin kebenaran, kelengkapan, atau validitas hukum dari setiap klaim pelapor.</li>
                        <li class="flex items-start gap-2"><span class="text-teal-400 mt-0.5">✅</span> Pengelola menerapkan prinsip <strong>notice-and-takedown</strong>. Jika ditemukan pelanggaran (fitnah, doxing, hate speech), Pengelola berhak menghapus konten tersebut tanpa pemberitahuan.</li>
                        <li class="flex items-start gap-2"><span class="text-teal-400 mt-0.5">✅</span> Pelapor wajib menjamin bahwa unggahan tidak melanggar hak cipta, merek dagang, atau privasi pihak ketiga.</li>
                        <li class="flex items-start gap-2"><span class="text-teal-400 mt-0.5">✅</span> Pengelola terbebas dari segala tuntutan hukum atau sanksi administratif yang timbul akibat Konten Pelapor.</li>
                    </ul>
                </div>

                {{-- 3. BUKAN NASIHAT PROFESIONAL --}}
                <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-10">
                    <h2 class="text-xl font-bold text-slate-100 mb-4 flex items-center gap-3">
                        <span class="w-8 h-8 rounded-lg bg-indigo-900/50 text-indigo-400 flex items-center justify-center text-sm border border-indigo-800">3</span>
                        Bukan Nasihat Profesional
                    </h2>
                    <p class="text-slate-400 text-sm leading-relaxed mb-4">Seluruh informasi, artikel, panduan, atau kalkulator di situs ini bersifat <strong>edukatif dan informatif</strong>.</p>
                    <ul class="space-y-3 text-sm text-slate-300">
                        <li class="flex items-start gap-2"><span class="text-slate-500 mt-0.5">-</span> Konten ini <strong>tidak menggantikan</strong> konsultasi hukum resmi, nasihat keuangan bersertifikat, atau diagnosis psikologis.</li>
                        <li class="flex items-start gap-2"><span class="text-red-400 mt-0.5">🚫</span> Pengelola tidak bertanggung jawab atas keputusan finansial atau langkah hukum yang diambil pengguna.</li>
                        <li class="flex items-start gap-2"><span class="text-teal-400 mt-0.5">✅</span> Pengguna disarankan selalu memverifikasi informasi melalui saluran resmi sebelum mengambil keputusan penting.</li>
                    </ul>
                </div>

                {{-- 4 & 5. TAUTAN & AKURASI --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-10">
                        <h2 class="text-xl font-bold text-slate-100 mb-4 flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-indigo-900/50 text-indigo-400 flex items-center justify-center text-sm border border-indigo-800">4</span>
                            Tautan Pihak Ketiga
                        </h2>
                        <p class="text-slate-400 text-sm leading-relaxed mb-4">Situs ini mungkin menyertakan tautan eksternal (OJK, LBH, dll).</p>
                        <ul class="space-y-2 text-sm text-slate-300 list-disc pl-4">
                            <li>Pengelola tidak mengontrol kebijakan privasi atau keamanan situs pihak ketiga.</li>
                            <li>Akses ke tautan eksternal dilakukan sepenuhnya atas risiko pengguna.</li>
                            <li>Tautan tidak menyiratkan afiliasi resmi antara PinjolWatch dan pihak ketiga.</li>
                        </ul>
                    </div>
                    <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-10">
                        <h2 class="text-xl font-bold text-slate-100 mb-4 flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-indigo-900/50 text-indigo-400 flex items-center justify-center text-sm border border-indigo-800">5</span>
                            Akurasi & Pemutakhiran
                        </h2>
                        <ul class="space-y-2 text-sm text-slate-300 list-disc pl-4">
                            <li>Data statistik dapat mengalami keterlambatan pemutakhiran.</li>
                            <li>Regulasi keuangan dapat berubah sewaktu-waktu.</li>
                            <li>Pengelola tidak menjamin situs selalu bebas error atau tersedia 24/7 (gangguan teknis/force majeure).</li>
                        </ul>
                    </div>
                </div>

                {{-- 6. BATASAN TANGGUNG JAWAB --}}
                <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-10 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-900/10 rounded-full blur-3xl"></div>
                    <h2 class="text-xl font-bold text-slate-100 mb-4 flex items-center gap-3">
                        <span class="w-8 h-8 rounded-lg bg-indigo-900/50 text-indigo-400 flex items-center justify-center text-sm border border-indigo-800">6</span>
                        Batasan Tanggung Jawab (Limitation of Liability)
                    </h2>
                    <p class="text-slate-300 text-sm leading-relaxed mb-4"><strong>Sepanjang diperbolehkan oleh hukum yang berlaku di Republik Indonesia</strong>, Pengelola PinjolWatch beserta mitranya <strong>tidak bertanggung jawab</strong> atas:</p>
                    <ol class="space-y-2 text-sm text-slate-400 list-decimal pl-4 mb-4">
                        <li>Kerugian langsung/tidak langsung (kehilangan data/stres) dari penggunaan situs.</li>
                        <li>Tuntutan hukum pihak ketiga terkait konten pengguna.</li>
                        <li>Kelalaian pengguna melindungi kredensial akun/tiket.</li>
                        <li>Kompensasi yang dijanjikan oleh penipu mengatasnamakan PinjolWatch.</li>
                    </ol>
                    <p class="text-xs text-indigo-300/70 italic">*Batasan ini tidak berlaku untuk kerugian akibat kelalaian berat (gross negligence) yang terbukti secara hukum.</p>
                </div>

                {{-- 7, 8, 9, 10. KEBIJAKAN & KONTAK --}}
                <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-10">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="font-bold text-slate-200 mb-2">7. Kepatuhan Hukum</h3>
                            <p class="text-sm text-slate-400">Pengelola berhak bekerja sama dengan penegak hukum (OJK, Kominfo) jika ada surat perintah resmi, dengan tetap menjunjung asas proporsionalitas perlindungan data.</p>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-200 mb-2">8. Kebijakan Privasi</h3>
                            <p class="text-sm text-slate-400">Pengelolaan data tunduk pada Kebijakan Privasi terpisah. Data dienkripsi dan kami menerapkan retensi 24 bulan kecuali diwajibkan lain oleh hukum.</p>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-200 mb-2">9. Perubahan Ketentuan</h3>
                            <p class="text-sm text-slate-400">Pengelola berhak mengubah Disclaimer ini tanpa pemberitahuan. Penggunaan berkelanjutan atas situs dianggap menyetujui perubahan.</p>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-200 mb-2">10. Kontak Sengketa</h3>
                            <p class="text-sm text-slate-400">
                                📧 legal@pinjolwatch.id<br>
                                ⚖️ Musyawarah mufakat di bawah yurisdiksi Republik Indonesia.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- FOOTER NOTE --}}
            <div class="bg-slate-950 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-12 text-center">
                <p class="text-sm text-slate-400 mb-6 max-w-3xl mx-auto leading-relaxed">
                    <strong class="text-slate-300">🕊️ Catatan Penutup:</strong><br>
                    Disclaimer ini dibuat bukan untuk menjauhkan diri dari tanggung jawab moral, melainkan untuk memberikan kejelasan batas peran agar platform dapat tetap beroperasi, melindungi pelapor, dan fokus pada misi edukasi & pemetaan. Kami berkomitmen penuh pada transparansi, kepatuhan hukum, dan keselamatan pengguna.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('privacy.policy') }}" class="px-6 py-2 bg-slate-800 text-slate-300 text-sm font-bold rounded-xl hover:bg-slate-700 transition-all">
                        Baca Kebijakan Privasi
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-frontend-layout>
