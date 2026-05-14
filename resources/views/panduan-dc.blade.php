<x-frontend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-100 leading-tight">
            {{ __('Panduan Menghadapi DC') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{
        dailyChecks: [
            { label: 'HP selalu terisi daya minimal 50%', checked: false },
            { label: 'Aplikasi rekam siap digunakan', checked: false },
            { label: 'Kontak darurat tersimpan di speed dial', checked: false },
            { label: 'Tetangga terpercaya sudah diinformasikan', checked: false },
            { label: 'Pintu & jendela terkunci dengan baik', checked: false }
        ],
        arrivalChecks: [
            { label: 'Informasikan keluarga/teman', checked: false },
            { label: 'Siapkan perangkat rekam (HP + power bank)', checked: false },
            { label: 'Siapkan catatan & dokumen (jangan kasih dokumen asli)', checked: false },
            { label: 'Siaga kontak polisi/RT/RW', checked: false }
        ],
        init() {
            const savedDaily = localStorage.getItem('dc_daily_checks');
            const savedArrival = localStorage.getItem('dc_arrival_checks');
            if (savedDaily) this.dailyChecks = JSON.parse(savedDaily);
            if (savedArrival) this.arrivalChecks = JSON.parse(savedArrival);
        },
        saveChecks() {
            localStorage.setItem('dc_daily_checks', JSON.stringify(this.dailyChecks));
            localStorage.setItem('dc_arrival_checks', JSON.stringify(this.arrivalChecks));
        }
    }">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-12">
            
            {{-- HERO SECTION --}}
            <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl overflow-hidden relative">
                <div class="absolute inset-0 bg-gradient-to-br from-red-900/20 to-slate-900 z-0"></div>
                <div class="relative z-10 p-10 md:p-16 text-center">
                    <h1 class="text-4xl md:text-5xl font-black text-slate-100 leading-tight mb-6">
                        Panduan Lengkap Menghadapi<br>
                        <span class="text-red-400">Kunjungan Debt Collector</span>
                    </h1>
                    <p class="text-lg text-slate-300 leading-relaxed max-w-2xl mx-auto mb-8">
                        Keselamatan Anda adalah prioritas utama. Pelajari cara menghadapi DC dengan tenang, merekam bukti secara legal, dan melindungi hak-hak Anda sesuai hukum Indonesia.
                    </p>
                    
                    <div class="bg-red-900/40 border-l-4 border-red-500 p-6 rounded-r-xl mb-8 max-w-2xl mx-auto text-left">
                        <p class="font-bold text-red-400 text-lg mb-2 flex items-center gap-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                            Jika Anda dalam bahaya segera:
                        </p>
                        <p class="text-red-200">📞 Hubungi <strong class="text-white text-xl">110</strong> (Polisi) atau <strong class="text-white text-xl">112</strong> (Darurat Nasional)</p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="#langkah-darurat" class="px-8 py-4 bg-red-600 text-white font-bold rounded-2xl shadow-[0_4px_14px_rgba(220,38,38,0.4)] hover:bg-red-500 hover:-translate-y-0.5 transition-all active:scale-95 whitespace-nowrap">
                            🚨 Langkah Darurat
                        </a>
                        <a href="#rekam-bukti" class="px-8 py-4 bg-slate-800 border border-slate-700 text-slate-200 font-bold rounded-2xl hover:bg-slate-700 transition-all whitespace-nowrap">
                            📹 Cara Merekam yang Sah
                        </a>
                    </div>
                </div>
            </div>

            {{-- SECTION 1: Hak Hukum Anda Saat DC Datang --}}
            <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-12">
                <h2 class="text-2xl font-bold text-slate-100 mb-6">Anda Punya Hak yang Dilindungi Undang-Undang</h2>
                <p class="text-slate-400 mb-6">Menurut <strong>UU No. 8 Tahun 1999 tentang Perlindungan Konsumen</strong> dan <strong>UU No. 27 Tahun 2022 tentang Pelindungan Data Pribadi</strong>, Anda berhak:</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="p-5 bg-slate-800/50 border border-slate-700 rounded-2xl">
                        <h3 class="font-bold text-teal-400 mb-2 flex items-center gap-2"><span class="text-xl">✅</span> Privasi & Martabat</h3>
                        <p class="text-sm text-slate-300">DC tidak boleh menyebarluaskan masalah hutang Anda ke tetangga, keluarga, atau tempat kerja.</p>
                    </div>
                    <div class="p-5 bg-slate-800/50 border border-slate-700 rounded-2xl">
                        <h3 class="font-bold text-teal-400 mb-2 flex items-center gap-2"><span class="text-xl">✅</span> Bebas dari Kekerasan</h3>
                        <p class="text-sm text-slate-300">Ancaman fisik, verbal, psikis, atau intimidasi adalah tindak pidana (KUHP Pasal 335, 351, 368).</p>
                    </div>
                    <div class="p-5 bg-slate-800/50 border border-slate-700 rounded-2xl">
                        <h3 class="font-bold text-teal-400 mb-2 flex items-center gap-2"><span class="text-xl">✅</span> Waktu yang Wajar</h3>
                        <p class="text-sm text-slate-300">DC tidak boleh datang di luar jam wajar (sebelum jam 8 pagi atau setelah jam 8 malam).</p>
                    </div>
                    <div class="p-5 bg-slate-800/50 border border-slate-700 rounded-2xl">
                        <h3 class="font-bold text-teal-400 mb-2 flex items-center gap-2"><span class="text-xl">✅</span> Penolakan Kunjungan</h3>
                        <p class="text-sm text-slate-300">Anda berhak menolak pertemuan jika tidak ada perjanjian sebelumnya.</p>
                    </div>
                </div>
            </div>

            {{-- SECTION 3 & 4: Menghadapi DC --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                {{-- Kooperatif --}}
                <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8">
                    <h2 class="text-xl font-bold text-slate-100 mb-6 flex items-center gap-2">🤝 Menghadapi DC Kooperatif</h2>
                    <ul class="space-y-4 mb-6">
                        <li class="flex items-start gap-3">
                            <span class="bg-teal-900/50 text-teal-400 w-6 h-6 rounded-full flex items-center justify-center shrink-0 text-sm font-bold mt-0.5">1</span>
                            <p class="text-slate-300 text-sm"><strong>Tanya Identitas via Intercom/Jendela:</strong> Minta surat tugas resmi sebelum buka pintu.</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="bg-teal-900/50 text-teal-400 w-6 h-6 rounded-full flex items-center justify-center shrink-0 text-sm font-bold mt-0.5">2</span>
                            <p class="text-slate-300 text-sm"><strong>Rekam dari Awal:</strong> Ucapkan "Saya merekam percakapan ini untuk dokumentasi."</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="bg-teal-900/50 text-teal-400 w-6 h-6 rounded-full flex items-center justify-center shrink-0 text-sm font-bold mt-0.5">3</span>
                            <p class="text-slate-300 text-sm"><strong>Bicara di Area Terbuka:</strong> Jangan undang masuk. Tetap di teras.</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="bg-teal-900/50 text-teal-400 w-6 h-6 rounded-full flex items-center justify-center shrink-0 text-sm font-bold mt-0.5">4</span>
                            <p class="text-slate-300 text-sm"><strong>Jangan Tanda Tangani Apapun:</strong> Foto semua dokumen, konsultasi dulu.</p>
                        </li>
                    </ul>
                    <div class="bg-slate-800 p-4 rounded-xl border border-slate-700">
                        <p class="text-xs text-slate-400 uppercase tracking-wider mb-2 font-bold">💬 Script Komunikasi</p>
                        <p class="text-sm text-teal-300 ">"Selamat siang. Saya bersedia berbicara, tapi saya perlu verifikasi identitas. Bisa tunjukkan kartu identitas dan surat tugas? Saya juga merekam ini."</p>
                    </div>
                </div>

                {{-- Intimidatif --}}
                <div id="langkah-darurat" class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-red-900/20 rounded-full blur-3xl"></div>
                    <h2 class="text-xl font-bold text-slate-100 mb-6 flex items-center gap-2">⚠️ Jika DC Mengancam</h2>
                    <ul class="space-y-4 mb-6">
                        <li class="flex items-start gap-3">
                            <span class="bg-red-900/50 text-red-400 w-6 h-6 rounded-full flex items-center justify-center shrink-0 text-sm font-bold mt-0.5">1</span>
                            <p class="text-slate-300 text-sm"><strong>Jangan Panik & Jangan Buka Pintu:</strong> Pertahankan nada suara stabil.</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="bg-red-900/50 text-red-400 w-6 h-6 rounded-full flex items-center justify-center shrink-0 text-sm font-bold mt-0.5">2</span>
                            <p class="text-slate-300 text-sm"><strong>Segera Rekam:</strong> Fokus pada suara ancaman, wajah, plat nomor.</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="bg-red-900/50 text-red-400 w-6 h-6 rounded-full flex items-center justify-center shrink-0 text-sm font-bold mt-0.5">3</span>
                            <p class="text-slate-300 text-sm"><strong>Panggil Bantuan:</strong> Teriak minta tolong jika perlu. Panggil satpam/RT.</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="bg-red-900/50 text-red-400 w-6 h-6 rounded-full flex items-center justify-center shrink-0 text-sm font-bold mt-0.5">4</span>
                            <p class="text-slate-300 text-sm"><strong>Hubungi Polisi (110):</strong> "Saya dalam bahaya. Ada debt collector mengancam memaksa masuk."</p>
                        </li>
                    </ul>
                    <div class="bg-slate-800 p-4 rounded-xl border border-slate-700">
                        <p class="text-xs text-slate-400 uppercase tracking-wider mb-2 font-bold">💬 Script Terancam</p>
                        <p class="text-sm text-red-300 ">"JANGAN MASUK! Ini pelanggaran hukum! Saya sudah merekam dan menghubungi polisi!"</p>
                    </div>
                </div>
            </div>

            {{-- SECTION 5: Merekam yang Sah --}}
            <div id="rekam-bukti" class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-12">
                <h2 class="text-2xl font-bold text-slate-100 mb-6">Bukti Rekaman yang Kuat di Pengadilan</h2>
                <p class="text-slate-400 mb-8">Menurut <strong>UU ITE No. 11 Tahun 2008</strong>, rekaman Anda sah sebagai bukti jika direkam oleh pihak yang terlibat dan untuk pembuktian pelanggaran hukum.</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-lg font-bold text-teal-400 mb-4">📱 Teknik Merekam:</h3>
                        <ul class="space-y-3">
                            <li class="text-sm text-slate-300 border-l-2 border-teal-500 pl-3"><strong>Video:</strong> Rekam dari dalam rumah melalui jendela/pintu kaca.</li>
                            <li class="text-sm text-slate-300 border-l-2 border-teal-500 pl-3"><strong>Audio:</strong> Simpan HP di saku jika merekam diam-diam.</li>
                            <li class="text-sm text-slate-300 border-l-2 border-teal-500 pl-3"><strong>Ucapkan Data:</strong> Sebutkan tanggal, waktu, lokasi, dan identitas di awal rekaman.</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-teal-400 mb-4">📸 Konten yang Harus Terekam:</h3>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="bg-slate-800 rounded-lg p-3 text-center border border-slate-700"><span class="block text-xl mb-1">👤</span> <span class="text-xs text-slate-300">Wajah DC</span></div>
                            <div class="bg-slate-800 rounded-lg p-3 text-center border border-slate-700"><span class="block text-xl mb-1">🚗</span> <span class="text-xs text-slate-300">Plat Kendaraan</span></div>
                            <div class="bg-slate-800 rounded-lg p-3 text-center border border-slate-700"><span class="block text-xl mb-1">📢</span> <span class="text-xs text-slate-300">Suara Ancaman</span></div>
                            <div class="bg-slate-800 rounded-lg p-3 text-center border border-slate-700"><span class="block text-xl mb-1">⏱️</span> <span class="text-xs text-slate-300">Waktu Kejadian</span></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SECTION 6: Catatan Kronologi --}}
            <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-12">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-slate-100">Template Catatan Kronologi</h2>
                    <button class="text-sm bg-slate-800 hover:bg-slate-700 text-teal-400 px-4 py-2 rounded-lg transition border border-slate-700 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy Format
                    </button>
                </div>
                <div class="bg-slate-950 p-6 rounded-2xl border border-slate-800 overflow-x-auto">
<pre class="text-sm text-slate-400 font-mono leading-relaxed">
TANGGAL: [DD/MM/YYYY]
WAKTU: [HH:MM - HH:MM]
LOKASI: [Alamat lengkap]

IDENTITAS DC:
- Nama: [jika diketahui]
- Perusahaan: [nama kolektor/pinjol]
- Jumlah orang: [berapa orang]
- Kendaraan: [merk, warna, plat nomor]

KRONOLOGI:
[Jam] - DC tiba di lokasi
[Jam] - DC mengucapkan/melakukan [catat detail]
[Jam] - Saya merespons [catat respons Anda]
[Jam] - DC pergi

ANCAMAN/KEKERASAN:
[ ] Verbal: [catat kalimat ancaman]
[ ] Fisik: [deskripsikan aksi]

BUKTI YANG DIMILIKI:
[ ] Video rekaman / [ ] Audio / [ ] Foto / [ ] Saksi
</pre>
                </div>
            </div>

            {{-- SECTION 9: Checklist Keselamatan (Interactive) --}}
            <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-12">
                <h2 class="text-2xl font-bold text-slate-100 mb-2">Checklist Keselamatan</h2>
                <p class="text-slate-400 mb-8">Tandai persiapan yang sudah Anda lakukan. (Disimpan di browser Anda)</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-lg font-bold text-teal-400 mb-4">Siap Siaga Harian:</h3>
                        <div class="space-y-3">
                            <template x-for="(item, index) in dailyChecks" :key="'daily'+index">
                                <label class="flex items-start gap-3 cursor-pointer group">
                                    <div class="relative flex items-start">
                                        <input type="checkbox" x-model="item.checked" @change="saveChecks()" class="w-5 h-5 mt-0.5 rounded border-slate-700 bg-slate-800 text-teal-500 focus:ring-teal-500 focus:ring-offset-slate-900 transition-colors">
                                    </div>
                                    <span class="text-sm text-slate-300 group-hover:text-slate-100 transition-colors select-none" :class="{'line-through text-slate-500': item.checked}" x-text="item.label"></span>
                                </label>
                            </template>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-bold text-amber-400 mb-4">Saat DC Dijadwalkan Datang:</h3>
                        <div class="space-y-3">
                            <template x-for="(item, index) in arrivalChecks" :key="'arrival'+index">
                                <label class="flex items-start gap-3 cursor-pointer group">
                                    <div class="relative flex items-start">
                                        <input type="checkbox" x-model="item.checked" @change="saveChecks()" class="w-5 h-5 mt-0.5 rounded border-slate-700 bg-slate-800 text-amber-500 focus:ring-amber-500 focus:ring-offset-slate-900 transition-colors">
                                    </div>
                                    <span class="text-sm text-slate-300 group-hover:text-slate-100 transition-colors select-none" :class="{'line-through text-slate-500': item.checked}" x-text="item.label"></span>
                                </label>
                            </template>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SECTION 7: Pelaporan --}}
            <div class="bg-gradient-to-br from-slate-800 to-slate-900 border border-slate-700 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-12 text-center">
                <h2 class="text-2xl font-bold text-slate-100 mb-4">Langkah Hukum & Pelaporan</h2>
                <p class="text-slate-400 mb-8 max-w-2xl mx-auto">Jika Anda mengalami ancaman atau kekerasan, segera laporkan ke pihak berwajib. Laporan Anda juga membantu memutus rantai pinjol ilegal.</p>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="bg-slate-900 p-4 rounded-2xl border border-slate-800">
                        <div class="text-3xl mb-2">👮</div>
                        <h4 class="font-bold text-slate-200">Polisi (110)</h4>
                        <p class="text-xs text-slate-500 mt-1">Ancaman/Kekerasan</p>
                    </div>
                    <div class="bg-slate-900 p-4 rounded-2xl border border-slate-800">
                        <div class="text-3xl mb-2">🏛️</div>
                        <h4 class="font-bold text-slate-200">OJK (157)</h4>
                        <p class="text-xs text-slate-500 mt-1">Pinjol Terdaftar</p>
                    </div>
                    <div class="bg-slate-900 p-4 rounded-2xl border border-slate-800">
                        <div class="text-3xl mb-2">🌐</div>
                        <h4 class="font-bold text-slate-200">Kominfo</h4>
                        <p class="text-xs text-slate-500 mt-1">Penyebaran Data</p>
                    </div>
                    <a href="{{ route('report') }}" class="bg-teal-900/30 p-4 rounded-2xl border border-teal-800 hover:bg-teal-900/50 transition">
                        <div class="text-3xl mb-2">🛡️</div>
                        <h4 class="font-bold text-teal-400">PinjolWatch</h4>
                        <p class="text-xs text-teal-200/70 mt-1">Lapor Kasus</p>
                    </a>
                </div>
            </div>

            {{-- FOOTER CTA --}}
            <div class="text-center py-8">
                <p class="text-slate-400 font-medium mb-2">Anda Tidak Sendirian. Kami Siap Mendukung.</p>
                <div class="flex justify-center gap-4 text-sm text-slate-500">
                    <span>📧 dpo@pinjolwatch.id</span>
                    <span>|</span>
                    <span>📞 119 ext.8 (Krisis)</span>
                </div>
            </div>

        </div>
    </div>

</x-frontend-layout>
