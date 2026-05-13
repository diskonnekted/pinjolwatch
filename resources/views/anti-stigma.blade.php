<x-frontend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-100 leading-tight">
            {{ __('Anti-Stigma & Dukungan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-12">
            
            {{-- HERO SECTION --}}
            <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl overflow-hidden relative">
                <div class="absolute inset-0 bg-gradient-to-br from-teal-900/40 to-slate-900 z-0"></div>
                <div class="relative z-10 p-8 md:p-12">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div class="text-left">
                            <h1 class="text-4xl md:text-5xl font-black text-slate-100 leading-tight mb-6">
                                Pinjol Bukan Pilihan Gaya Hidup.<br>
                                <span class="text-teal-400">Ini Adalah Jalan Bertahan.</span>
                            </h1>
                            <p class="text-lg text-slate-300 leading-relaxed mb-10">
                                Di balik tagihan, teror, dan tangisan, ada manusia yang sedang berjuang memenuhi kebutuhan dasar. Mari kita ganti stigma dengan empati, dan penghakiman dengan dukungan.
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4">
                                <a href="{{ route('panduan-keluarga') }}" class="px-8 py-4 bg-teal-600 text-white font-bold rounded-2xl shadow-[0_4px_14px_rgba(13,148,136,0.4)] hover:bg-teal-500 hover:-translate-y-0.5 transition-all active:scale-95 whitespace-nowrap">
                                    🤝 Cara Mendukung
                                </a>
                                <a href="{{ route('report') }}" class="px-8 py-4 bg-slate-800 border border-slate-700 text-slate-200 font-bold rounded-2xl hover:bg-slate-700 transition-all whitespace-nowrap">
                                    🛡️ Laporkan Teror
                                </a>
                            </div>
                        </div>
                        <div class="hidden lg:block relative">
                            <div class="absolute inset-0 bg-teal-500/20 blur-3xl rounded-full"></div>
                            <div class="relative z-10 aspect-square overflow-hidden rounded-3xl transform -rotate-2 hover:rotate-0 transition-all duration-500 shadow-2xl">
                                <img src="/Kekuatan Komunitas.webp" alt="Ilustrasi Kekuatan Komunitas" class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SECTION 1: Mengapa Kita Cepat Menghakimi? --}}
            <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-12">
                <h2 class="text-2xl font-bold text-slate-100 mb-6">Stigma "Hutang = Aib" Sudah Tidak Relevan dengan Realita Sekarang</h2>
                <div class="prose prose-invert prose-lg max-w-none text-slate-300 leading-relaxed space-y-4">
                    <p>Di budaya kita, hutang sering dikaitkan dengan moral: <em>"Kalau bertanggung jawab, pasti bayar."</em> <em>"Pinjol itu untuk orang boros."</em> Pernyataan ini terdengar logis di permukaan, tapi mengabaikan konteks nyata yang dihadapi jutaan keluarga Indonesia.</p>
                    <p>Ketika dana darurat habis, PHK datang mendadak, biaya sekolah menumpuk, atau anggota keluarga sakit keras, sistem keuangan formal sering kali tertutup. Bank meminta agunan, prosedur memakan waktu, dan syarat tidak terjangkau. Di titik itulah, <strong>pinjol menjadi satu-satunya pintu yang masih terbuka</strong>.</p>
                    <p>Bukan karena keinginan hidup mewah. Bukan karena tidak disiplin. Tapi karena <strong>bertahan hidup adalah hak dasar</strong>, dan ketika jalur resmi buntu, orang akan mengambil jalan apa pun untuk melindungi keluarga.</p>
                </div>
            </div>

            {{-- SECTION 2: Stigma vs Realita --}}
            <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 md:p-12 overflow-hidden">
                <h2 class="text-2xl font-bold text-slate-100 mb-8">Memutus Mata Rantai Penghakiman</h2>
                
                <div class="space-y-4" x-data="{ selected: null }">
                    @php
                    $stigmas = [
                        ['stigma' => 'Gagal bayar = malas/tidak bertanggung jawab', 'realita' => 'Gagal bayar sering terjadi karena bunga mencekik, denda berlapis, dan teror DC yang membuat pembayaran menjadi tidak mungkin, bukan tidak mau.'],
                        ['stigma' => 'Pinjol hanya untuk gaya hidup konsumtif', 'realita' => 'Mayoritas korban menggunakan dana untuk kebutuhan pokok: makan, obat, sewa rumah, biaya persalinan, atau menutupi gaji yang telat.'],
                        ['stigma' => 'Harus malu kalau ketahuan', 'realita' => 'Malu adalah beban tambahan yang memperparah trauma. Kesulitan finansial adalah kondisi ekonomi, bukan cacat karakter.'],
                        ['stigma' => 'Kalau nggak mau ribet, jangan pinjam', 'realita' => 'Banyak korban meminjam di bawah tekanan darurat waktu. Keterdesakan bukan pilihan, tapi keadaan yang dipaksakan oleh keadaan.'],
                        ['stigma' => 'Mereka patut mendapat pelajaran', 'realita' => 'Teror, doxing, dan intimidasi fisik bukan bentuk pendidikan. Itu adalah pelanggaran hukum yang merusak kesehatan mental & martabat manusia.']
                    ];
                    @endphp

                    @foreach($stigmas as $index => $item)
                        <div class="border border-slate-700 rounded-2xl overflow-hidden bg-slate-800/50">
                            <button @click="selected !== {{ $index }} ? selected = {{ $index }} : selected = null" class="w-full px-6 py-4 text-left flex justify-between items-center focus:outline-none focus:bg-slate-800 transition-colors">
                                <span class="font-bold text-red-400 flex items-start gap-3">
                                    <span class="mt-1">🔴</span>
                                    <span>"{{ $item['stigma'] }}"</span>
                                </span>
                                <svg :class="{'rotate-180': selected == {{ $index }}}" class="w-5 h-5 text-slate-400 transform transition-transform duration-300 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="selected == {{ $index }}" x-collapse class="px-6 pb-5 pt-2">
                                <div class="p-4 bg-teal-900/30 border border-teal-800 rounded-xl flex items-start gap-3">
                                    <span class="text-xl">✅</span>
                                    <p class="text-teal-100 text-sm leading-relaxed">{{ $item['realita'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- SECTION 3: Beban Ganda --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8">
                    <h2 class="text-xl font-bold text-slate-100 mb-6">Ketika Stigma Menjadi Racun Kedua</h2>
                    <p class="text-slate-300 leading-relaxed mb-6">Korban pinjol ilegal sudah menghadapi teror dari debt collector. Tapi ketika masyarakat menambahkan <strong>penghakiman, bisik-bisik, atau pengucilan</strong>, korban mengalami <em>double trauma</em>:</p>
                    
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <span class="text-xl">😶</span>
                            <p class="text-slate-300 text-sm"><strong class="text-slate-100 block">Menyembunyikan masalah</strong> tidak mencari bantuan hukum atau psikologis.</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-xl">🌀</span>
                            <p class="text-slate-300 text-sm"><strong class="text-slate-100 block">Merasa tidak berharga</strong> turunnya produktivitas & motivasi hidup.</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-xl">🏚️</span>
                            <p class="text-slate-300 text-sm"><strong class="text-slate-100 block">Isolasi sosial</strong> memperparah depresi & kecemasan.</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-xl">🔇</span>
                            <p class="text-slate-300 text-sm"><strong class="text-slate-100 block">Enggan melapor</strong> predator pinjol terus beroperasi tanpa takut ditindak.</p>
                        </li>
                    </ul>
                    
                    <div class="mt-8 p-4 bg-slate-800 rounded-xl border border-slate-700">
                        <p class="text-teal-400 font-bold italic text-center text-sm">Stigma tidak menyelesaikan masalah. Stigma hanya membuat korban tenggelam dalam diam. Empati membuka jalan. Dukungan mempercepat pemulihan.</p>
                    </div>
                </div>

                {{-- SECTION 4: Cara Lingkungan Merespons --}}
                <div class="bg-slate-900 border border-slate-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-8 flex flex-col">
                    <h2 class="text-xl font-bold text-slate-100 mb-6">Ganti Pertanyaan Menghakimi dengan Sikap Menopang</h2>
                    
                    <div class="flex-1 space-y-6">
                        <div>
                            <h3 class="text-sm font-black text-teal-400 uppercase tracking-widest mb-3 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Yang Seharusnya Dilakukan
                            </h3>
                            <ul class="space-y-3">
                                <li class="text-sm text-slate-300 border-l-2 border-teal-500 pl-3"><strong>Tanyakan keadaan:</strong> "Apa yang sedang kamu hadapi? Ada yang bisa kami bantu?"</li>
                                <li class="text-sm text-slate-300 border-l-2 border-teal-500 pl-3"><strong>Pisahkan finansial dari moral:</strong> Gagal bayar adalah masalah aliran kas, bukan cerminan integritas seseorang.</li>
                                <li class="text-sm text-slate-300 border-l-2 border-teal-500 pl-3"><strong>Dukung pelaporan aman:</strong> Temani korban membuka PinjolWatch, bantu kumpulkan bukti.</li>
                                <li class="text-sm text-slate-300 border-l-2 border-teal-500 pl-3"><strong>Normalisasi percakapan sulit:</strong> "Banyak orang pernah di posisi ini. Kamu tidak sendiri."</li>
                            </ul>
                        </div>

                        <div>
                            <h3 class="text-sm font-black text-red-400 uppercase tracking-widest mb-3 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Yang Harus Dihindari
                            </h3>
                            <ul class="space-y-3">
                                <li class="text-sm text-slate-400 border-l-2 border-red-500/50 pl-3 line-through decoration-red-500/50">Menyebarkan kabar ke grup WA atau tetangga</li>
                                <li class="text-sm text-slate-400 border-l-2 border-red-500/50 pl-3 line-through decoration-red-500/50">Membandingkan dengan orang lain</li>
                                <li class="text-sm text-slate-400 border-l-2 border-red-500/50 pl-3 line-through decoration-red-500/50">Memberi nasihat finansial tanpa diminta</li>
                                <li class="text-sm text-slate-400 border-l-2 border-red-500/50 pl-3 line-through decoration-red-500/50">Mengaitkan hutang dengan dosa atau karma</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SECTION 5: Pledge Komunitas --}}
            <div x-data="pledgeComponent()" x-init="init()" class="bg-blue-900/30 border border-blue-800 shadow-[0_4px_20px_rgba(0,0,0,0.3)] rounded-3xl p-10 md:p-14 text-center relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-900/10 via-teal-900/10 to-blue-900/10 z-0"></div>
                <div class="relative z-10">
                    <h2 class="text-2xl font-black text-blue-400 uppercase tracking-widest mb-6">Saya Berjanji Tidak Akan Menambah Luka dengan Stigma</h2>
                    <p class="text-xl md:text-2xl text-blue-100 font-serif italic leading-relaxed mb-10 max-w-3xl mx-auto">
                        "Saya memahami bahwa kesulitan finansial adalah kondisi, bukan aib. Saya berjanji untuk mendengarkan tanpa menghakimi, mendukung tanpa mempermalukan, dan memilih empati atas gosip."
                    </p>
                    
                    <button x-show="!hasPledged" @click="signPledge()" class="px-8 py-4 bg-blue-600 text-white font-bold rounded-2xl shadow-[0_4px_14px_rgba(37,99,235,0.4)] hover:bg-blue-500 hover:-translate-y-0.5 transition-all active:scale-95 text-lg">
                        ✍️ Saya Mendukung Gerakan Anti-Stigma
                    </button>
                    
                    <div x-show="hasPledged" x-cloak class="inline-flex items-center gap-3 px-6 py-4 bg-blue-800/50 border border-blue-600 rounded-2xl text-blue-200 font-bold">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Terima kasih atas komitmen Anda!
                    </div>
                    
                    <p class="text-sm text-blue-300 mt-6"><span x-text="count" class="font-bold text-white"></span> orang telah mendukung</p>
                </div>
            </div>

            {{-- SECTION 6: PENUTUP & CTA --}}
            <div class="text-center py-8">
                <h2 class="text-3xl font-black text-slate-100 mb-6">Bertahan Hidup Bukan Sesuatu yang Perlu Disembunyikan</h2>
                <p class="text-slate-400 max-w-2xl mx-auto leading-relaxed mb-10">
                    Pinjol ilegal memangsa keputusasaan. Tapi masyarakat tidak harus ikut memangsa harga diri korban. Dengan menghapus stigma, kita tidak hanya menyelamatkan mental individu, tapi juga memutus siklus predator yang bergantung pada rasa malu & ketakutan.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('panduan-keluarga') }}" class="px-6 py-3 bg-teal-600 text-white font-bold rounded-xl shadow-[0_4px_14px_rgba(13,148,136,0.4)] hover:bg-teal-500 transition-all">
                        📖 Panduan Keluarga
                    </a>
                    <a href="{{ route('quiz') }}" class="px-6 py-3 bg-slate-800 border border-slate-700 text-slate-200 font-bold rounded-xl hover:bg-slate-700 transition-all">
                        🧠 Tes Kesehatan Jiwa
                    </a>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('pledgeComponent', () => ({
                count: 1247,
                hasPledged: false,
                
                init() {
                    if (localStorage.getItem('anti_stigma_pledge') === 'true') {
                        this.hasPledged = true;
                        this.count += 1;
                    }
                },
                
                signPledge() {
                    this.hasPledged = true;
                    this.count += 1;
                    localStorage.setItem('anti_stigma_pledge', 'true');
                }
            }))
        })
    </script>
</x-frontend-layout>
