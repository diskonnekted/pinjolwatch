<x-frontend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-100 leading-tight">
            {{ __('Waspada Joki & Konsultan Palsu') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{
        jokiChecks: [
            { label: 'Tidak terdaftar atau tidak bisa diverifikasi di SLIK OJK atau website resmi', checked: false },
            { label: 'Meminta pembayaran ke rekening pribadi/e-wallet pribadi', checked: false },
            { label: 'Menjamin hasil 100% tanpa melihat perjanjian pinjaman asli', checked: false },
            { label: 'Meminta akses penuh ke HP, OTP, password, atau data sensitif', checked: false },
            { label: 'Menekan Anda untuk segera memutuskan (\'promo hanya hari ini\')', checked: false },
            { label: 'Hanya berkomunikasi via WhatsApp pribadi/akun medsos tanpa website resmi', checked: false },
            { label: 'Menawarkan \'penghapusan data\' atau \'blokir DC permanen\' berbayar', checked: false },
            { label: 'Tidak menyediakan kontrak tertulis yang jelas', checked: false },
            { label: 'Menggunakan testimoni anonim atau akun fake', checked: false },
            { label: 'Menjanjikan hasil yang bertentangan dengan hukum', checked: false }
        ],
        init() {
            const savedJoki = localStorage.getItem('dc_joki_checks');
            if (savedJoki) this.jokiChecks = JSON.parse(savedJoki);
        },
        saveChecks() {
            localStorage.setItem('dc_joki_checks', JSON.stringify(this.jokiChecks));
        },
        get dangerScore() {
            return this.jokiChecks.filter(i => i.checked).length;
        }
    }">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-12">
            
            {{-- HERO SECTION --}}
            <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl overflow-hidden relative">
                <div class="absolute inset-0 bg-gradient-to-br from-red-900/30 to-slate-900 z-0"></div>
                <div class="relative z-10 p-10 md:p-16 text-center">
                    <div class="inline-flex items-center justify-center px-4 py-1.5 rounded-full bg-red-900/50 border border-red-800 text-red-400 text-sm font-bold mb-6">
                        🛑 PERINGATAN KEAMANAN
                    </div>
                    <h1 class="text-4xl md:text-5xl font-black text-slate-100 leading-tight mb-6">
                        Janji "Lunas Instan" Seringkali<br>
                        <span class="text-red-400">Adalah Jebakan.</span>
                    </h1>
                    <p class="text-lg text-slate-300 leading-relaxed max-w-2xl mx-auto mb-8">
                        Saat Anda sedang terdesak, banyak pihak menawarkan "jalan pintas". Sayangnya, sebagian besar adalah joki tidak berizin, penipu berkedok konsultan, atau pencari konten yang memanfaatkan kepanikan Anda.
                    </p>
                    
                    <div class="bg-red-900/40 border-l-4 border-red-500 p-6 rounded-r-xl mb-8 max-w-2xl mx-auto text-left">
                        <p class="font-bold text-red-400 text-lg mb-2 flex items-center gap-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                            Fakta Penting:
                        </p>
                        <p class="text-red-200">Tidak ada pihak yang bisa secara legal "menghapus utang" atau "mematikan teror DC" tanpa proses resmi. Pinjol ilegal pun tidak bisa dinegosiasikan oleh perantara tidak berizin.</p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="#tanda-bahaya" class="px-8 py-4 bg-red-600 text-white font-bold rounded-2xl shadow-[0_4px_14px_rgba(220,38,38,0.4)] hover:bg-red-500 hover:-translate-y-0.5 transition-all whitespace-nowrap">
                            🔍 Kenali Modus Penipuan
                        </a>
                        <a href="{{ route('report') }}" class="px-8 py-4 bg-slate-800 border border-slate-700 text-slate-200 font-bold rounded-2xl hover:bg-slate-700 transition-all whitespace-nowrap">
                            🛡️ Lapor Joki Palsu
                        </a>
                    </div>
                </div>
            </div>

            {{-- MENGAPA DITARGETKAN --}}
            <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-12">
                <h2 class="text-2xl font-bold text-slate-100 mb-6">Mengapa Anda Ditargetkan?</h2>
                <p class="text-slate-400 mb-8">Penipu tidak memilih korban secara acak. Mereka memanfaatkan <strong>kondisi psikologis & finansial yang rentan</strong>:</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="p-5 bg-slate-800/50 border border-slate-700 rounded-2xl">
                        <h3 class="font-bold text-teal-400 mb-2 flex items-center gap-2"><span class="text-xl">🌀</span> Kepanikan & Urgensi</h3>
                        <p class="text-sm text-slate-300">Ancaman DC membuat korban mencari solusi cepat tanpa verifikasi.</p>
                    </div>
                    <div class="p-5 bg-slate-800/50 border border-slate-700 rounded-2xl">
                        <h3 class="font-bold text-teal-400 mb-2 flex items-center gap-2"><span class="text-xl">😔</span> Stigma & Rasa Malu</h3>
                        <p class="text-sm text-slate-300">Korban enggan berkonsultasi ke jalur resmi karena takut dihakimi.</p>
                    </div>
                    <div class="p-5 bg-slate-800/50 border border-slate-700 rounded-2xl">
                        <h3 class="font-bold text-teal-400 mb-2 flex items-center gap-2"><span class="text-xl">📱</span> Eksploitasi Digital</h3>
                        <p class="text-sm text-slate-300">Banyak joki beroperasi via medsos dengan konten "testimoni palsu" yang meyakinkan.</p>
                    </div>
                    <div class="p-5 bg-slate-800/50 border border-slate-700 rounded-2xl">
                        <h3 class="font-bold text-teal-400 mb-2 flex items-center gap-2"><span class="text-xl">💸</span> Profit dari Keputusasaan</h3>
                        <p class="text-sm text-slate-300">Mereka tidak peduli utang Anda lunas. Yang mereka kejar adalah biaya admin, DP, atau data pribadi.</p>
                    </div>
                </div>

                <div class="p-6 bg-slate-800 border border-slate-700 rounded-2xl flex gap-4 items-start">
                    <div class="text-3xl">💡</div>
                    <div>
                        <h4 class="font-bold text-slate-200 mb-1">Peringatan Resmi OJK</h4>
                        <p class="text-sm text-slate-400 italic">OJK secara resmi menyatakan bahwa <strong>tidak ada lembaga atau individu berizin</strong> yang menawarkan jasa "pelunasan pinjol ilegal" atau "penghapusan data debtor". Semua klaim tersebut adalah tidak berdasar dan berpotensi penipuan.</p>
                    </div>
                </div>
            </div>

            {{-- 5 MODUS OPERANDI --}}
            <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-12 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-amber-900/20 rounded-full blur-3xl"></div>
                <h2 class="text-2xl font-bold text-slate-100 mb-8">5 Modus Operandi Umum</h2>
                
                <div class="space-y-4">
                    <div class="p-5 bg-slate-800/80 border border-slate-700 rounded-2xl flex flex-col md:flex-row gap-4">
                        <div class="md:w-1/3">
                            <strong class="text-amber-400 block text-lg mb-1">1. Janji Garansi 100% Lunas</strong>
                            <p class="text-xs text-slate-500">Mengklaim punya "koneksi internal"</p>
                        </div>
                        <div class="md:w-2/3 border-l border-slate-700 pl-4">
                            <strong class="text-slate-300 block text-xs uppercase mb-1">Dampak:</strong>
                            <p class="text-sm text-slate-400">Utang tidak berkurang, DC makin agresif, korban kecewa & trauma ulang.</p>
                        </div>
                    </div>

                    <div class="p-5 bg-red-900/20 border border-red-900/50 rounded-2xl flex flex-col md:flex-row gap-4">
                        <div class="md:w-1/3">
                            <strong class="text-red-400 block text-lg mb-1">2. Biaya di Muka (DP)</strong>
                            <p class="text-xs text-red-300/70">Minta transfer sebelum proses dimulai</p>
                        </div>
                        <div class="md:w-2/3 border-l border-red-900/50 pl-4">
                            <strong class="text-slate-300 block text-xs uppercase mb-1">Dampak:</strong>
                            <p class="text-sm text-slate-400">Uang hilang, tidak ada tindak lanjut, kontak Anda langsung diblokir.</p>
                        </div>
                    </div>

                    <div class="p-5 bg-red-900/20 border border-red-900/50 rounded-2xl flex flex-col md:flex-row gap-4">
                        <div class="md:w-1/3">
                            <strong class="text-red-400 block text-lg mb-1">3. Pemerasan Data Pribadi</strong>
                            <p class="text-xs text-red-300/70">Minta KTP, akses HP, atau kontak darurat</p>
                        </div>
                        <div class="md:w-2/3 border-l border-red-900/50 pl-4">
                            <strong class="text-slate-300 block text-xs uppercase mb-1">Dampak:</strong>
                            <p class="text-sm text-slate-400">Data dijual ke pihak ketiga, digunakan untuk ajukan pinjol baru atas nama Anda.</p>
                        </div>
                    </div>

                    <div class="p-5 bg-red-900/20 border border-red-900/50 rounded-2xl flex flex-col md:flex-row gap-4">
                        <div class="md:w-1/3">
                            <strong class="text-red-400 block text-lg mb-1">4. Eksploitasi Konten</strong>
                            <p class="text-xs text-red-300/70">Minta video "testimoni" untuk TikTok/YouTube</p>
                        </div>
                        <div class="md:w-2/3 border-l border-red-900/50 pl-4">
                            <strong class="text-slate-300 block text-xs uppercase mb-1">Dampak:</strong>
                            <p class="text-sm text-slate-400">Privasi dilanggar, Anda jadi tontonan publik, stigma makin berat.</p>
                        </div>
                    </div>

                    <div class="p-5 bg-slate-800/80 border border-slate-700 rounded-2xl flex flex-col md:flex-row gap-4">
                        <div class="md:w-1/3">
                            <strong class="text-amber-400 block text-lg mb-1">5. Gali Lubang Baru</strong>
                            <p class="text-xs text-slate-500">Menyarankan pinjol baru dengan dalih restrukturisasi</p>
                        </div>
                        <div class="md:w-2/3 border-l border-slate-700 pl-4">
                            <strong class="text-slate-300 block text-xs uppercase mb-1">Dampak:</strong>
                            <p class="text-sm text-slate-400">Utang berlipat ganda, bunga menumpuk, masuk spiral finansial tanpa ujung.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- CHECKLIST TANDA BAHAYA --}}
            <div id="tanda-bahaya" class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-12">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-slate-100 mb-2">Tanda Bahaya (Red Flags)</h2>
                        <p class="text-slate-400 text-sm">Jika Anda menemukan ≥2 poin di bawah pada penawaran joki, <strong class="text-red-400">STOP komunikasi & jangan transfer.</strong></p>
                    </div>
                    <div class="text-center px-4 py-2 bg-slate-800 rounded-xl border border-slate-700 hidden sm:block">
                        <span class="block text-xs text-slate-500 font-bold mb-1">Skor Bahaya</span>
                        <span class="text-xl font-black" :class="{'text-emerald-400': dangerScore === 0, 'text-amber-400': dangerScore === 1, 'text-red-500': dangerScore >= 2}" x-text="dangerScore + '/10'"></span>
                    </div>
                </div>
                
                <div class="space-y-3 bg-slate-950/50 p-6 rounded-2xl border border-slate-800">
                    <template x-for="(item, index) in jokiChecks" :key="'joki'+index">
                        <label class="flex items-start gap-3 cursor-pointer group p-2 hover:bg-slate-800/50 rounded-lg transition">
                            <div class="relative flex items-start">
                                <input type="checkbox" x-model="item.checked" @change="saveChecks()" class="w-5 h-5 mt-0.5 rounded border-slate-700 bg-slate-800 text-red-500 focus:ring-red-500 focus:ring-offset-slate-900 transition-colors">
                            </div>
                            <span class="text-sm text-slate-300 group-hover:text-slate-100 transition-colors select-none" :class="{'text-red-400 font-medium': item.checked}" x-text="item.label"></span>
                        </label>
                    </template>
                </div>
                
                <div x-show="dangerScore >= 2" x-transition class="mt-6 p-4 bg-red-900/30 border border-red-800 rounded-xl flex gap-4 items-start">
                    <div class="text-2xl">🛑</div>
                    <div>
                        <strong class="text-red-400 block mb-1">Tingkat Bahaya Tinggi!</strong>
                        <p class="text-sm text-slate-300">Tawaran ini sangat berpotensi penipuan. Segera putuskan komunikasi dan laporkan pihak tersebut.</p>
                    </div>
                </div>
            </div>

            {{-- JIKA TERLANJUR TERTIPU --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8">
                    <h2 class="text-xl font-bold text-slate-100 mb-6 flex items-center gap-2">🆘 Jika Sudah Terlanjur Tertipu</h2>
                    <p class="text-slate-400 text-sm mb-6">Jangan menyalahkan diri sendiri. Penipu memang ahli memanfaatkan situasi darurat. Lakukan langkah berikut:</p>
                    
                    <ul class="space-y-4 mb-6">
                        <li class="flex items-start gap-3">
                            <span class="bg-slate-800 text-slate-300 w-6 h-6 rounded-full flex items-center justify-center shrink-0 text-xs font-bold mt-0.5 border border-slate-700">1</span>
                            <div>
                                <strong class="text-slate-200 text-sm block">Hentikan Komunikasi</strong>
                                <p class="text-slate-400 text-xs">Blokir nomor, jangan ikuti instruksi lebih lanjut.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="bg-slate-800 text-slate-300 w-6 h-6 rounded-full flex items-center justify-center shrink-0 text-xs font-bold mt-0.5 border border-slate-700">2</span>
                            <div>
                                <strong class="text-slate-200 text-sm block">Dokumentasikan Bukti</strong>
                                <p class="text-slate-400 text-xs">Screenshot chat, transfer, profil akun, dan website.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="bg-slate-800 text-slate-300 w-6 h-6 rounded-full flex items-center justify-center shrink-0 text-xs font-bold mt-0.5 border border-slate-700">3</span>
                            <div>
                                <strong class="text-slate-200 text-sm block">Lapor ke Polisi (Gratis)</strong>
                                <p class="text-slate-400 text-xs">Gunakan dasar KUHP Pasal 378 (Penipuan) & UU ITE.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="bg-slate-800 text-slate-300 w-6 h-6 rounded-full flex items-center justify-center shrink-0 text-xs font-bold mt-0.5 border border-slate-700">4</span>
                            <div>
                                <strong class="text-slate-200 text-sm block">Amankan Data Pribadi</strong>
                                <p class="text-slate-400 text-xs">Ganti password penting, aktifkan 2FA, lapor kehilangan KTP jika disalahgunakan.</p>
                            </div>
                        </li>
                    </ul>
                </div>

                {{-- CATATAN KESEHATAN MENTAL --}}
                <div class="bg-blue-900/20 border border-blue-900/50 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 relative overflow-hidden flex flex-col justify-center">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-900/10 to-slate-900 z-0"></div>
                    <div class="relative z-10">
                        <h2 class="text-xl font-bold text-blue-400 mb-6 flex items-center gap-2">💙 Ini Bukan Salah Anda</h2>
                        <p class="text-blue-200/80 text-sm mb-4 leading-relaxed">Menjadi korban joki palsu sering memicu rasa malu, marah, atau kecewa berat. Itu wajar. Tapi ingat:</p>
                        
                        <ul class="space-y-3 mb-6">
                            <li class="text-sm text-slate-300 border-l-2 border-blue-500/50 pl-3"><strong>Penipu mengeksploitasi sistem:</strong> Mereka tahu korban sedang panik & mencari jalan keluar instan.</li>
                            <li class="text-sm text-slate-300 border-l-2 border-blue-500/50 pl-3"><strong>Anda sedang bertahan hidup:</strong> Mencari solusi di tengah tekanan adalah respons manusia yang normal. Yang salah adalah pihak yang menipu.</li>
                            <li class="text-sm text-slate-300 border-l-2 border-blue-500/50 pl-3"><strong>Pemulihan itu mungkin:</strong> Banyak korban berhasil keluar dari masalah ini lewat jalur resmi.</li>
                        </ul>

                        <div class="bg-blue-950/50 p-4 rounded-xl border border-blue-900/50">
                            <p class="text-sm text-blue-300 italic font-medium">"Saya sudah melakukan yang terbaik dengan informasi yang saya punya saat itu. Sekarang saya tahu, saya punya hak untuk dilindungi."</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- FOOTER CTA --}}
            <div class="bg-gradient-to-br from-slate-800 to-slate-900 border border-slate-700 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-12 text-center">
                <h3 class="text-2xl font-bold text-slate-100 mb-4">Lindungi Diri & Orang Lain dari Eksploitasi</h3>
                <p class="text-slate-400 mb-8 max-w-2xl mx-auto">Setiap laporan yang Anda kirim membantu kami memetakan jaringan penipu & mencegah korban baru.</p>
                
                <div class="grid md:grid-cols-3 gap-4 mb-6">
                    <a href="{{ route('report') }}" class="px-6 py-3 bg-red-600 text-white font-bold rounded-xl hover:bg-red-500 transition-all shadow-[0_4px_14px_rgba(220,38,38,0.4)]">
                        🛡️ Lapor Joki Palsu
                    </a>
                    <a href="https://konsumen.ojk.go.id" target="_blank" class="px-6 py-3 bg-slate-800 border border-slate-700 text-slate-200 font-bold rounded-xl hover:bg-slate-700 transition-all">
                        ⚖️ Lapor ke OJK
                    </a>
                    <a href="{{ route('panduan-keluarga') }}" class="px-6 py-3 bg-slate-800 border border-slate-700 text-slate-200 font-bold rounded-xl hover:bg-slate-700 transition-all">
                        🤝 Panduan Keluarga
                    </a>
                </div>
                
                <p class="text-sm text-slate-500 mt-4">
                    📞 Darurat: <strong class="text-slate-400">110 (Polisi)</strong> | <strong class="text-slate-400">157 (OJK)</strong> | <strong class="text-slate-400">159 (Kominfo)</strong><br>
                    Data Anda aman. Pelaporan anonim tersedia.
                </p>
            </div>

        </div>
    </div>
</x-frontend-layout>
