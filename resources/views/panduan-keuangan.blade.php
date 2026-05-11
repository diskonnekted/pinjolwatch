<x-frontend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-100 leading-tight">
            {{ __('Panduan Pengelolaan Keuangan Sehat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-12">
            
            {{-- HERO SECTION --}}
            <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl overflow-hidden relative">
                <div class="absolute inset-0 bg-gradient-to-br from-emerald-900/30 to-slate-900 z-0"></div>
                <div class="relative z-10 p-10 md:p-16 text-center">
                    <h1 class="text-4xl md:text-5xl font-black text-slate-100 leading-tight mb-6">
                        Uang Bukan Musuh.<br>
                        <span class="text-emerald-400">Ia Adalah Alat untuk Ketenangan.</span>
                    </h1>
                    <p class="text-lg text-slate-300 leading-relaxed max-w-2xl mx-auto mb-10">
                        Panduan ini disusun berdasarkan prinsip literasi keuangan OJK, Bank Indonesia, dan standar perencanaan keuangan internasional. Dibagi dalam 3 fase: sebelum terjebak, saat berjuang, dan setelah bebas.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="#fase-1" class="px-6 py-3 bg-slate-800 border border-slate-700 text-slate-200 font-bold rounded-2xl hover:bg-slate-700 transition-all whitespace-nowrap">
                            🛡️ Fase 1: Pencegahan
                        </a>
                        <a href="#fase-2" class="px-6 py-3 bg-amber-600/20 border border-amber-600 text-amber-400 font-bold rounded-2xl hover:bg-amber-600/30 transition-all whitespace-nowrap">
                            ⚡ Fase 2: Stabilisasi
                        </a>
                        <a href="#fase-3" class="px-6 py-3 bg-emerald-600 text-white font-bold rounded-2xl shadow-[0_4px_14px_rgba(5,150,105,0.4)] hover:bg-emerald-500 hover:-translate-y-0.5 transition-all whitespace-nowrap">
                            🌱 Fase 3: Pemulihan
                        </a>
                    </div>
                    <p class="mt-8 text-xs text-slate-500 font-medium tracking-wide uppercase">
                        Disusun oleh PinjolWatch × Referensi OJK, BI, & Kerangka Perencanaan Keuangan Terstandar
                    </p>
                </div>
            </div>

            {{-- INTRODUKSI --}}
            <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-12 text-center">
                <p class="text-slate-300 leading-relaxed text-lg">
                    Perubahan finansial bukan soal "disiplin keras", tapi soal <strong class="text-slate-100">sistem yang manusiawi</strong>. Stigma sering membuat orang menyembunyikan masalah, yang justru memperparah bunga, denda, dan tekanan mental. Panduan ini memetakan kondisi nyata → target realistis → langkah terukur, agar Anda tidak merasa sendirian dan tahu persis harus mulai dari mana.
                </p>
            </div>

            {{-- KALKULATOR PINJOL ILEGAL --}}
            <div x-data="{
                pokok: 1000000,
                bungaHarian: 2,
                hariTerlambat: 0,
                formatRupiah(num) {
                    return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(num);
                },
                hitungBunga(hari) {
                    return this.pokok * (this.bungaHarian / 100) * hari;
                },
                hitungDenda() {
                    return this.pokok * (8 / 100) * this.hariTerlambat;
                },
                hitungTotal(hari) {
                    return this.pokok + this.hitungBunga(hari) + this.hitungDenda();
                }
            }" class="bg-slate-900 border border-red-900/50 shadow-[0_4px_30px_rgba(225,29,72,0.15)] rounded-3xl p-8 md:p-12 relative overflow-hidden mb-12">
                <div class="absolute top-0 right-0 w-48 h-48 bg-red-900/20 rounded-full blur-3xl"></div>
                
                <div class="inline-flex items-center justify-center px-4 py-1.5 rounded-full bg-red-900/30 border border-red-800 text-red-400 text-sm font-bold mb-4">
                    🧮 SIMULATOR JEBAKAN PINJOL ILEGAL
                </div>
                <h2 class="text-2xl font-bold text-slate-100 mb-2">Seberapa Cepat Utang Anda Membengkak?</h2>
                <p class="text-slate-400 mb-8">Pinjol ilegal sering membebankan bunga 1%-3% per hari dan denda keterlambatan hingga 8% per hari. Gunakan kalkulator ini untuk melihat realitanya.</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    {{-- Input --}}
                    <div class="space-y-6 z-10 relative">
                        <div>
                            <label class="block text-sm font-bold text-slate-300 mb-2">Pokok Pinjaman (Rp)</label>
                            <input type="number" x-model.number="pokok" class="w-full bg-slate-800 border border-slate-700 text-slate-100 rounded-xl px-4 py-3 focus:ring-red-500 focus:border-red-500 font-mono text-lg" min="100000" step="100000">
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-2">
                                <label class="text-sm font-bold text-slate-300">Bunga per Hari (%)</label>
                                <span class="text-red-400 font-bold" x-text="bungaHarian + '%'"></span>
                            </div>
                            <input type="range" x-model.number="bungaHarian" min="1" max="3" step="0.1" class="w-full h-2 bg-slate-700 rounded-lg appearance-none cursor-pointer accent-red-500">
                            <div class="flex justify-between text-xs text-slate-500 mt-1">
                                <span>1%</span>
                                <span>3% (Sangat Ilegal)</span>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between mb-2">
                                <label class="text-sm font-bold text-slate-300">Hari Terlambat (Denda 8%/hari)</label>
                                <span class="text-red-400 font-bold" x-text="hariTerlambat + ' Hari'"></span>
                            </div>
                            <input type="range" x-model.number="hariTerlambat" min="0" max="30" step="1" class="w-full h-2 bg-slate-700 rounded-lg appearance-none cursor-pointer accent-red-500">
                            <div class="flex justify-between text-xs text-slate-500 mt-1">
                                <span>0 Hari</span>
                                <span>30 Hari</span>
                            </div>
                        </div>

                        <div class="p-4 bg-red-950/30 border border-red-900 rounded-xl mt-4">
                            <p class="text-xs text-red-200 leading-relaxed">
                                <strong class="text-red-400">Info:</strong> Pinjol legal OJK membatasi total biaya (bunga + denda + biaya lain) maksimum 100% dari pokok pinjaman. Pinjol ilegal <strong>tidak memiliki batas</strong>.
                            </p>
                        </div>
                    </div>

                    {{-- Output --}}
                    <div class="z-10 relative">
                        <h3 class="text-lg font-bold text-slate-200 mb-4 border-b border-slate-700 pb-2">Total Utang yang Harus Dibayar</h3>
                        
                        <div class="space-y-3">
                            <template x-for="hari in [3, 7, 14, 30, 365]" :key="hari">
                                <div class="p-4 bg-slate-800/80 border border-slate-700 rounded-xl flex justify-between items-center transition-all hover:border-red-500/50 hover:bg-slate-800">
                                    <div>
                                        <div class="text-sm font-bold text-slate-300" x-text="hari == 365 ? '1 Tahun' : hari + ' Hari'"></div>
                                        <div class="text-xs text-slate-500 mt-1">Bunga: <span x-text="formatRupiah(hitungBunga(hari))"></span></div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-lg font-black text-red-400" x-text="formatRupiah(hitungTotal(hari))"></div>
                                        <div x-show="hariTerlambat > 0" class="text-xs text-amber-500 mt-1">+Denda: <span x-text="formatRupiah(hitungDenda())"></span></div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>

            {{-- BI COMPARISON COMPONENT --}}
            <x-bi-interest-comparison />

            {{-- FASE 1: BELUM PERNAH PINJAM PINJOL --}}
            <div id="fase-1" class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-12 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-slate-800 rounded-full blur-3xl"></div>
                <div class="inline-flex items-center justify-center px-4 py-1.5 rounded-full bg-slate-800 border border-slate-700 text-slate-300 text-sm font-bold mb-4">
                    🛡️ FASE 1: BELUM PERNAH PINJAM
                </div>
                <h2 class="text-2xl font-bold text-slate-100 mb-8">Membangun Tameng Sebelum Badai Datang</h2>
                
                <div class="overflow-x-auto mb-10">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-slate-700">
                                <th class="py-4 px-4 text-slate-400 font-medium w-1/2">🔹 SEBELUM (Kondisi Umum)</th>
                                <th class="py-4 px-4 text-emerald-400 font-bold w-1/2">🔸 SESUDAH (Target Sistem)</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr class="border-b border-slate-800">
                                <td class="py-4 px-4 text-slate-300 bg-slate-950/30">Mengandalkan gaji bulanan tanpa rencana cadangan</td>
                                <td class="py-4 px-4 text-slate-200 bg-emerald-900/10">Memiliki anggaran terstruktur & dana darurat bertahap</td>
                            </tr>
                            <tr class="border-b border-slate-800">
                                <td class="py-4 px-4 text-slate-300 bg-slate-950/30">Menganggap pinjaman online sebagai "jalan pintas aman"</td>
                                <td class="py-4 px-4 text-slate-200 bg-emerald-900/10">Memahami bunga efektif, biaya tersembunyi, & hanya pakai sebagai instrumen terakhir</td>
                            </tr>
                            <tr class="border-b border-slate-800">
                                <td class="py-4 px-4 text-slate-300 bg-slate-950/30">Pencatatan keuangan tidak rutin atau berantakan</td>
                                <td class="py-4 px-4 text-slate-200 bg-emerald-900/10">Arus kas tercatat mingguan, evaluasi bulanan</td>
                            </tr>
                            <tr>
                                <td class="py-4 px-4 text-slate-300 bg-slate-950/30 rounded-bl-xl">Tidak memeriksa legalitas lender</td>
                                <td class="py-4 px-4 text-slate-200 bg-emerald-900/10 rounded-br-xl">Hanya menggunakan platform terdaftar & berizin OJK</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h3 class="font-black text-slate-200 uppercase tracking-widest text-sm mb-4">✅ Langkah Nyata (Referensi OJK & BI)</h3>
                <ul class="space-y-4">
                    <li class="p-4 bg-slate-800/50 border border-slate-700 rounded-2xl">
                        <strong class="text-teal-400 block mb-1">1. Terapkan Kerangka 50/30/20</strong>
                        <p class="text-sm text-slate-300">50% Kebutuhan dasar, 30% Keinginan, 20% Tabungan/Utang. <em class="text-slate-500">(Sumber: BI & OJK)</em></p>
                    </li>
                    <li class="p-4 bg-slate-800/50 border border-slate-700 rounded-2xl">
                        <strong class="text-teal-400 block mb-1">2. Bangun Dana Darurat Bertahap</strong>
                        <p class="text-sm text-slate-300">Bulan 1-3: Target 1× pengeluaran. Bulan 4-12: Tingkatkan ke 3× pengeluaran.</p>
                    </li>
                    <li class="p-4 bg-slate-800/50 border border-slate-700 rounded-2xl">
                        <strong class="text-teal-400 block mb-1">3. Verifikasi Legalitas Sebelum Mengajukan</strong>
                        <p class="text-sm text-slate-300">Cek daftar di SLIK OJK & website resmi OJK. Fokus pada <strong>bunga efektif/tahun</strong>.</p>
                    </li>
                    <li class="p-4 bg-slate-800/50 border border-slate-700 rounded-2xl">
                        <strong class="text-teal-400 block mb-1">4. Gunakan Pinjaman Hanya untuk 3 Kondisi</strong>
                        <p class="text-sm text-slate-300">Produktivitas, Darurat mendesak, atau Likuiditas jangka pendek dengan rencana pelunasan jelas.</p>
                    </li>
                </ul>
            </div>

            {{-- FASE 2: SEDANG MENGALAMI KESULITAN PINJOL --}}
            <div id="fase-2" class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-12 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-amber-900/20 rounded-full blur-3xl"></div>
                <div class="inline-flex items-center justify-center px-4 py-1.5 rounded-full bg-amber-900/30 border border-amber-800 text-amber-400 text-sm font-bold mb-4">
                    ⚡ FASE 2: KESULITAN PINJOL
                </div>
                <h2 class="text-2xl font-bold text-slate-100 mb-8">Dari Panik ke Terkendali: Langkah Darurat yang Terukur</h2>
                
                <div class="overflow-x-auto mb-10">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-slate-700">
                                <th class="py-4 px-4 text-slate-400 font-medium w-1/2">🔹 SEBELUM (Kondisi Krisis)</th>
                                <th class="py-4 px-4 text-amber-400 font-bold w-1/2">🔸 SESUDAH (Kondisi Stabil)</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr class="border-b border-slate-800">
                                <td class="py-4 px-4 text-slate-300 bg-slate-950/30">Panik, menghindari kontak, merasa tidak ada jalan keluar</td>
                                <td class="py-4 px-4 text-slate-200 bg-amber-900/10">Memiliki peta utang jelas, prioritas pembayaran, & komunikasi terstruktur</td>
                            </tr>
                            <tr class="border-b border-slate-800">
                                <td class="py-4 px-4 text-slate-300 bg-slate-950/30">Membayar bunga/denda tanpa mengurangi pokok</td>
                                <td class="py-4 px-4 text-slate-200 bg-amber-900/10">Fokus pada pengurangan pokok & negosiasi resmi</td>
                            </tr>
                            <tr>
                                <td class="py-4 px-4 text-slate-300 bg-slate-950/30 rounded-bl-xl">Siklus gali lubang tutup lubang</td>
                                <td class="py-4 px-4 text-slate-200 bg-amber-900/10 rounded-br-xl">Menghentikan pinjaman baru, konsolidasi fokus pada yang ada</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h3 class="font-black text-slate-200 uppercase tracking-widest text-sm mb-4">✅ Langkah Nyata (Crisis Management)</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="p-5 bg-slate-800/50 border border-slate-700 rounded-2xl">
                        <strong class="text-amber-400 block mb-2">1. HENTIKAN PINJAMAN BARU</strong>
                        <p class="text-sm text-slate-300">Uninstall aplikasi pinjol. Fokus hanya pada utang yang sudah berjalan. Gali lubang baru memperdalam krisis.</p>
                    </div>
                    <div class="p-5 bg-slate-800/50 border border-slate-700 rounded-2xl">
                        <strong class="text-amber-400 block mb-2">2. PETAKAN UTANG</strong>
                        <p class="text-sm text-slate-300">Buat tabel detail: Nama Pinjol, Pokok, Bunga, Denda, Total, dan Status Legalitasnya.</p>
                    </div>
                    <div class="p-5 bg-slate-800/50 border border-slate-700 rounded-2xl">
                        <strong class="text-amber-400 block mb-2">3. NEGOSIASI RESMI</strong>
                        <p class="text-sm text-slate-300">Hubungi CS pinjol legal untuk restrukturisasi. Semua kesepakatan harus tertulis (email/chat resmi).</p>
                    </div>
                    <div class="p-5 bg-slate-800/50 border border-slate-700 rounded-2xl">
                        <strong class="text-amber-400 block mb-2">4. LINDUNGI DIRI (ILEGAL)</strong>
                        <p class="text-sm text-slate-300">Blokir nomor tidak resmi pinjol ilegal. Laporkan ke OJK, Kominfo, Polisi, dan <strong>PinjolWatch</strong>.</p>
                    </div>
                </div>
            </div>

            {{-- FASE 3: SUDAH TERBEBAS DARI PINJOL --}}
            <div id="fase-3" class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-12 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-900/20 rounded-full blur-3xl"></div>
                <div class="inline-flex items-center justify-center px-4 py-1.5 rounded-full bg-emerald-900/30 border border-emerald-800 text-emerald-400 text-sm font-bold mb-4">
                    🌱 FASE 3: TERBEBAS DARI PINJOL
                </div>
                <h2 class="text-2xl font-bold text-slate-100 mb-8">Dari Lega ke Tangguh: Membangun Kembali Fondasi Finansial</h2>
                
                <div class="overflow-x-auto mb-10">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-slate-700">
                                <th class="py-4 px-4 text-slate-400 font-medium w-1/2">🔹 SEBELUM (Pasca-Pelunasan)</th>
                                <th class="py-4 px-4 text-emerald-400 font-bold w-1/2">🔸 SESUDAH (Ketahanan Jangka Panjang)</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr class="border-b border-slate-800">
                                <td class="py-4 px-4 text-slate-300 bg-slate-950/30">Lega tapi rentan kembali ke kebiasaan lama</td>
                                <td class="py-4 px-4 text-slate-200 bg-emerald-900/10">Memiliki sistem otomatis, dana darurat utuh, & investasi dasar</td>
                            </tr>
                            <tr class="border-b border-slate-800">
                                <td class="py-4 px-4 text-slate-300 bg-slate-950/30">Takut cek riwayat keuangan atau SLIK</td>
                                <td class="py-4 px-4 text-slate-200 bg-emerald-900/10">Data bersih, paham cara membaca laporan kredit</td>
                            </tr>
                            <tr>
                                <td class="py-4 px-4 text-slate-300 bg-slate-950/30 rounded-bl-xl">Belum punya rencana jangka menengah/panjang</td>
                                <td class="py-4 px-4 text-slate-200 bg-emerald-900/10 rounded-br-xl">Memiliki goals terukur dengan timeline jelas</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h3 class="font-black text-slate-200 uppercase tracking-widest text-sm mb-4">✅ Langkah Nyata (Rebuilding)</h3>
                <ul class="space-y-4">
                    <li class="p-4 bg-slate-800/50 border border-slate-700 rounded-2xl flex items-start gap-4">
                        <span class="text-2xl mt-1">🎉</span>
                        <div>
                            <strong class="text-slate-100 block mb-1">1. Rayakan & Refleksi</strong>
                            <p class="text-sm text-slate-300">Akui bahwa ini bukan kegagalan, tapi "sekolah finansial" yang membentuk ketahanan Anda.</p>
                        </div>
                    </li>
                    <li class="p-4 bg-slate-800/50 border border-slate-700 rounded-2xl flex items-start gap-4">
                        <span class="text-2xl mt-1">🛡️</span>
                        <div>
                            <strong class="text-slate-100 block mb-1">2. Bangun Dana Darurat 3-6 Bulan</strong>
                            <p class="text-sm text-slate-300">Ini adalah tameng utama agar tidak kembali ke pinjol saat darurat mendesak.</p>
                        </div>
                    </li>
                    <li class="p-4 bg-slate-800/50 border border-slate-700 rounded-2xl flex items-start gap-4">
                        <span class="text-2xl mt-1">📈</span>
                        <div>
                            <strong class="text-slate-100 block mb-1">3. Cek & Perbaiki SLIK OJK</strong>
                            <p class="text-sm text-slate-300">Akses SLIK OJK. Jika data belum update pasca-lunas, ajukan keberatan resmi ke OJK.</p>
                        </div>
                    </li>
                </ul>
            </div>

            {{-- FOOTER / DISCLAIMER --}}
            <div class="bg-slate-950 border border-slate-800 rounded-2xl p-8 text-center">
                <p class="text-sm text-slate-400 mb-6">
                    <strong class="text-slate-300">Disclaimer:</strong> Panduan ini bersifat edukatif dan tidak menggantikan konsultasi resmi dengan perencana keuangan bersertifikat (CFP), akuntan, atau penasihat hukum. Setiap kondisi finansial bersifat unik.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('report') }}" class="px-6 py-3 bg-teal-600 text-white font-bold rounded-xl hover:bg-teal-500 transition-all">
                        🛡️ Lapor Teror Pinjol
                    </a>
                    <a href="{{ route('panduan-keluarga') }}" class="px-6 py-3 bg-slate-800 border border-slate-700 text-slate-200 font-bold rounded-xl hover:bg-slate-700 transition-all">
                        🤝 Panduan Keluarga
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-frontend-layout>
