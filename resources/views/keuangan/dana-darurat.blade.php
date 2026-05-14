
<x-frontend-layout>
    <div class="py-12 bg-slate-900">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-slate-800 border border-slate-700 rounded-[2.5rem] p-8 sm:p-12 shadow-2xl">
                
                <div class="text-center mb-12">
                    <span class="text-5xl mb-4 block">🏦</span>
                    <h1 class="text-4xl font-black text-white  uppercase tracking-tighter">Mulai Bangun Dana Darurat</h1>
                    <p class="text-slate-400 font-bold text-sm uppercase tracking-widest mt-2">Benteng Pertahanan Finansial Anda</p>
                </div>

                <div class="prose prose-lg prose-invert max-w-none text-slate-300">
                    <p class="lead">Jika jeratan utang adalah penyakit, maka dana darurat adalah vaksinnya. Dana darurat adalah sejumlah uang yang Anda sisihkan khusus untuk kejadian tak terduga, seperti kehilangan pekerjaan, sakit, atau perbaikan mendesak. Memilikinya akan mencegah Anda kembali berutang saat krisis datang.</p>
                    
                    <h2>Mengapa Dana Darurat Begitu Penting?</h2>
                    <p>Bayangkan dana darurat sebagai tombol 'pause' untuk kepanikan finansial. Tanpanya, setiap masalah kecil bisa menjadi bencana yang memaksa Anda mencari pinjaman dengan bunga tinggi. Dengan dana darurat, Anda memberi diri Anda waktu dan pilihan.</p>
                    <ul class="list-disc pl-5 space-y-2">
                        <li><strong>Memutus Siklus Utang:</strong> Menghentikan kebiasaan "gali lubang, tutup lubang".</li>
                        <li><strong>Memberi Ketenangan Pikiran:</strong> Mengurangi stres dan kecemasan karena Anda tahu Anda punya bantalan pengaman.</li>
                        <li><strong>Melindungi Tujuan Keuangan Lain:</strong> Anda tidak perlu mencairkan investasi atau tabungan jangka panjang saat ada kebutuhan mendesak.</li>
                    </ul>

                    <h2 class="mt-12">Berapa Banyak yang Saya Butuhkan?</h2>
                    <p>Jumlah ideal dana darurat bervariasi, namun ada panduan umum yang bisa diikuti:</p>
                    <div class="not-prose my-10 grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
                        <div class="p-6 bg-yellow-500/10 border border-yellow-500/20 rounded-2xl">
                            <h3 class="font-black text-xl text-yellow-300 mb-2">3x</h3>
                            <p class="text-yellow-200/80 text-xs font-bold">Pengeluaran Bulanan<br>Jika Anda lajang & punya pendapatan tetap.</p>
                        </div>
                        <div class="p-6 bg-orange-500/10 border border-orange-500/20 rounded-2xl">
                            <h3 class="font-black text-2xl text-orange-300 mb-2">6x</h3>
                            <p class="text-orange-200/80 text-xs font-bold">Pengeluaran Bulanan<br>Jika Anda sudah berkeluarga atau pencari nafkah tunggal.</p>
                        </div>
                        <div class="p-6 bg-red-500/10 border border-red-500/20 rounded-2xl">
                            <h3 class="font-black text-2xl text-red-300 mb-2">12x</h3>
                            <p class="text-red-200/80 text-xs font-bold">Pengeluaran Bulanan<br>Jika pekerjaan Anda tidak menentu (freelancer) atau memiliki tanggungan banyak.</p>
                        </div>
                    </div>
                    <p class="text-center  text-sm">Jangan terintimidasi oleh jumlahnya. Memulai dengan target Rp 1.000.000 jauh lebih baik daripada tidak memulai sama sekali.</p>

                    <h2 class="mt-12">Cara Praktis Memulai Dana Darurat Hari Ini</h2>
                    <p>Kuncinya adalah konsistensi, bukan jumlah. Berikut beberapa cara untuk memulai:</p>
                    <ul class="list-disc pl-5 space-y-3">
                        <li><strong>Otomatisasi:</strong> Atur transfer otomatis dari rekening gaji Anda ke rekening khusus dana darurat setiap tanggal gajian. Mulai dari Rp 50.000 atau Rp 100.000 per bulan.</li>
                        <li><strong>Metode "Uang Receh":</strong> Setiap hari, masukkan semua uang kembalian receh atau pecahan Rp 2.000 ke dalam sebuah toples. Anda akan terkejut dengan hasilnya di akhir bulan.</li>
                        <li><strong>Jual Barang Tidak Terpakai:</strong> Lakukan decluttering. Jual barang-barang yang sudah tidak Anda gunakan lagi dan masukkan seluruh hasilnya ke dana darurat.</li>
                        <li><strong>Sisihkan dari "Keinginan":</strong> Kurangi jatah ngopi atau makan di luar sebanyak satu kali seminggu, lalu alokasikan dana tersebut.</li>
                        <li><strong>Simpan di Tempat yang Tepat:</strong> Letakkan dana darurat di instrumen yang aman dan mudah diakses, tapi tidak terlalu mudah untuk dibelanjakan. Contoh: Rekening tabungan terpisah tanpa kartu ATM, atau Reksadana Pasar Uang (RDPU).</li>
                    </ul>

                    <p class="mt-12">Membangun dana darurat adalah maraton, bukan sprint. Setiap seribu rupiah yang Anda sisihkan hari ini adalah investasi untuk ketenangan pikiran Anda di masa depan. Mulailah sekarang, sekecil apapun itu.</p>
                </div>

                <div class="text-center mt-12">
                    <a href="{{ url('/dashboard?tab=finance') }}" class="inline-flex items-center gap-2 text-sm font-bold text-slate-400 hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg>
                        Kembali ke Peta Jalan Ekonomi
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-frontend-layout>
