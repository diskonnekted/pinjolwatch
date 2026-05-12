
<x-frontend-layout>
    <div class="py-12 bg-slate-900">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-slate-800 border border-slate-700 rounded-[2.5rem] p-8 sm:p-12 shadow-2xl">
                
                <div class="text-center mb-12">
                    <span class="text-5xl mb-4 block">📄</span>
                    <h1 class="text-4xl font-black text-white italic uppercase tracking-tighter">Template Negosiasi Utang</h1>
                    <p class="text-slate-400 font-bold text-sm uppercase tracking-widest mt-2">Untuk Kreditor Legal & Kooperatif</p>
                </div>

                <div class="prose prose-lg prose-invert max-w-none text-slate-300">
                    <p class="lead">Menghadapi tumpukan utang bisa terasa menakutkan, terutama saat pendapatan tidak menentu. Namun, diam dan menghindar bukanlah solusi, khususnya untuk utang dari pinjaman legal. Kreditor legal (bank, multifinance, pinjol OJK) lebih memilih debitur yang kooperatif daripada yang macet total. Negosiasi adalah jembatan untuk menemukan solusi yang menguntungkan kedua belah pihak.</p>
                    
                    <div class="not-prose my-10 p-6 bg-blue-500/10 border border-blue-500/20 rounded-2xl">
                        <h3 class="font-bold text-lg mb-2 text-blue-300">💡 Prinsip Kunci Negosiasi</h3>
                        <ul class="list-disc pl-5 space-y-2 text-sm text-blue-200/80">
                            <li><strong>Jujur & Transparan:</strong> Akui adanya utang dan jelaskan kondisi keuangan Anda saat ini dengan jujur (misal: kehilangan pekerjaan, pendapatan menurun).</li>
                            <li><strong>Proaktif:</strong> Hubungi kreditor sebelum Anda jatuh tempo atau menunggak terlalu lama. Ini menunjukkan niat baik.</li>
                            <li><strong>Tawarkan Solusi:</strong> Jangan hanya datang dengan masalah. Siapkan proposal atau penawaran solusi yang menurut Anda paling memungkinkan.</li>
                            <li><strong>Minta Komunikasi Tertulis:</strong> Selalu minta hasil akhir negosiasi dalam bentuk surat atau email resmi untuk menghindari kesalahpahaman di kemudian hari.</li>
                        </ul>
                    </div>

                    <h2>Opsi Keringanan yang Bisa Diajukan</h2>
                    <p>Berikut adalah beberapa jenis restrukturisasi atau keringanan yang umum ditawarkan oleh lembaga keuangan:</p>
                    <ol>
                        <li><strong>Perpanjangan Jangka Waktu (Tenor):</strong> Memperpanjang masa cicilan agar angsuran bulanan menjadi lebih kecil.</li>
                        <li><strong>Penundaan Pembayaran (Grace Period):</strong> Libur bayar pokok atau bunga untuk beberapa waktu (misal: 3-6 bulan) untuk memberi Anda ruang bernapas.</li>
                        <li><strong>Pengurangan Tunggakan Bunga/Denda:</strong> Memohon penghapusan sebagian atau seluruh denda keterlambatan.</li>
                        <li><strong>Diskon Pelunasan Sekaligus (Haircut):</strong> Jika Anda memiliki sejumlah dana, Anda bisa menegosiasikan diskon untuk melunasi sisa pokok utang sekaligus.</li>
                    </ol>

                    <h2 class="mt-12">📝 Template Email / Surat Pengajuan Keringanan</h2>
                    <p>Gunakan template di bawah ini sebagai titik awal. Sesuaikan bagian dalam kurung siku `[...]` dengan data Anda yang sebenarnya.</p>

                    <div class="relative my-8 p-8 bg-slate-900 border border-slate-700 rounded-2xl text-sm">
                         <button 
                            x-data="{ copied: false }" 
                            @click="
                                const textToCopy = $refs.template.innerText;
                                navigator.clipboard.writeText(textToCopy); 
                                copied = true; 
                                setTimeout(() => copied = false, 2000);
                            "
                            class="absolute top-4 right-4 px-4 py-2 bg-teal-600/20 text-teal-300 font-black text-[10px] uppercase tracking-widest rounded-xl hover:bg-teal-600 hover:text-white transition-all"
                            :class="{ 'bg-teal-500 text-white': copied }">
                            <span x-show="!copied">Salin Template</span>
                            <span x-show="copied">✅ Tersalin!</span>
                        </button>
                        <div x-ref="template">
                            <p><strong>Kepada Yth.</strong><br>Bapak/Ibu Pimpinan<br>[Nama Bank / Lembaga Keuangan]<br>Di Tempat</p>
                            <br>
                            <p><strong>Perihal: Permohonan Keringanan / Restrukturisasi Kredit</strong></p>
                            <br>
                            <p>Dengan hormat,</p>
                            <p>Saya yang bertanda tangan di bawah ini:</p>
                            <p>Nama Lengkap: [Nama Lengkap Anda Sesuai KTP]<br>
                               Nomor KTP: [Nomor KTP Anda]<br>
                               Nomor Kontrak / Kartu Kredit: [Nomor Kontrak Pinjaman Anda]<br>
                               Alamat: [Alamat Anda]<br>
                               No. Telepon: [Nomor HP Anda yang Aktif]</p>
                            <br>
                            <p>Dengan ini saya ingin menyampaikan bahwa saat ini saya mengalami kesulitan finansial yang menyebabkan saya kesulitan untuk memenuhi kewajiban pembayaran cicilan pinjaman saya. Kesulitan ini disebabkan oleh [Jelaskan penyebabnya secara singkat dan jujur, contoh: 'penurunan pendapatan usaha saya secara drastis sejak bulan lalu', atau 'saya baru saja mengalami pemutusan hubungan kerja (PHK)'].</p>
                            <br>
                            <p>Saya menyadari sepenuhnya kewajiban saya dan memiliki niat baik untuk menyelesaikan seluruh tunggakan. Oleh karena itu, saya memberanikan diri untuk mengajukan permohonan keringanan berupa [Pilih salah satu atau lebih opsi yang paling sesuai: perpanjangan tenor, penundaan pembayaran selama X bulan, penghapusan denda keterlambatan].</p>
                            <br>
                            <p>Sebagai bukti kondisi saya, terlampir saya sertakan [Sebutkan dokumen pendukung jika ada, misal: 'surat PHK', atau 'laporan keuangan usaha 3 bulan terakhir'].</p>
                            <br>
                            <p>Saya sangat berharap Bapak/Ibu dapat mempertimbangkan permohonan saya ini. Saya bersedia untuk berdiskusi lebih lanjut mengenai solusi terbaik yang bisa kita capai bersama. </p>
                            <br>
                            <p>Atas perhatian dan kebijaksanaan Bapak/Ibu, saya ucapkan terima kasih.</p>
                            <br>
                            <p>Hormat saya,</p>
                            <br><br>
                            <p>[Nama Lengkap Anda]</p>
                        </div>
                    </div>
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
