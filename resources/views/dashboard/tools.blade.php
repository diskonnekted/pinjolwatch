<x-frontend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-100 leading-tight">
            {{ __('Pusat Alat & Bantuan (Tools)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            {{-- TEMPLATE JAWABAN --}}
            <div class="bg-slate-900 border border-slate-800 shadow-xl rounded-[2.5rem] p-10">
                <h3 class="text-2xl font-black text-white mb-8 flex items-center gap-4">
                    <span class="w-12 h-12 rounded-2xl bg-indigo-500/10 border border-indigo-500/20 flex items-center justify-center text-indigo-400">💬</span>
                    Template Jawaban Ancaman DC
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    {{-- WA Template --}}
                    <div class="p-8 bg-slate-800/50 border border-slate-700 rounded-[2rem]">
                        <h4 class="font-bold text-slate-100 mb-2">WhatsApp</h4>
                        <p class="text-xs text-slate-500 mb-6 leading-relaxed">Gunakan jika DC mengancam akan menghubungi kontak atau menyebar data pribadi.</p>
                        <div class="bg-slate-950 p-6 rounded-2xl border border-slate-800 text-sm text-slate-300  mb-6 leading-relaxed">
                            "Selamat siang. Saya sadar memiliki kewajiban, namun tindakan Anda mengancam menyebarkan data pribadi saya melanggar UU ITE dan UU PDP. Saya telah merekam percakapan ini sebagai bukti untuk pelaporan ke @PinjolWatch dan pihak berwajib. Mari bicara profesional sesuai aturan OJK."
                        </div>
                        <button onclick="copyToClipboard(this)" class="w-full py-3 bg-indigo-600 text-white text-xs font-bold rounded-xl hover:bg-indigo-500 hover:-translate-y-0.5 transition-all">Salin Template</button>
                    </div>

                    {{-- SMS Template --}}
                    <div class="p-8 bg-slate-800/50 border border-slate-700 rounded-[2rem]">
                        <h4 class="font-bold text-slate-100 mb-2">SMS</h4>
                        <p class="text-xs text-slate-500 mb-6 leading-relaxed">Respon singkat untuk menegaskan bahwa Anda mengetahui prosedur hukum.</p>
                        <div class="bg-slate-950 p-6 rounded-2xl border border-slate-800 text-sm text-slate-300  mb-6 leading-relaxed">
                            "Saya mencatat penagihan Anda. Harap lampirkan rincian utang resmi dan surat tugas penagihan sesuai aturan AFPI/OJK melalui email resmi perusahaan. Penagihan di luar prosedur akan saya laporkan ke Satgas Pasti OJK."
                        </div>
                        <button onclick="copyToClipboard(this)" class="w-full py-3 bg-indigo-600 text-white text-xs font-bold rounded-xl hover:bg-indigo-500 hover:-translate-y-0.5 transition-all">Salin Template</button>
                    </div>

                    {{-- Phone Template --}}
                    <div class="p-8 bg-slate-800/50 border border-slate-700 rounded-[2rem]">
                        <h4 class="font-bold text-slate-100 mb-2">Telepon</h4>
                        <p class="text-xs text-slate-500 mb-6 leading-relaxed">Gunakan script ini saat menerima telepon dari nomor tidak dikenal yang mengaku DC.</p>
                        <div class="bg-slate-950 p-6 rounded-2xl border border-slate-800 text-sm text-slate-300  mb-6 leading-relaxed">
                            "Maaf, sebelum lanjut, boleh saya tahu nama lengkap Anda dan dari perusahaan mana? Saya informasikan bahwa percakapan ini sedang saya rekam untuk dokumentasi hukum. Jika ada ancaman, rekaman ini akan langsung saya kirim ke OJK."
                        </div>
                        <button onclick="copyToClipboard(this)" class="w-full py-3 bg-indigo-600 text-white text-xs font-bold rounded-xl hover:bg-indigo-500 hover:-translate-y-0.5 transition-all">Salin Script</button>
                    </div>
                </div>
            </div>

            {{-- REKOMENDASI APLIKASI --}}
            <div class="bg-slate-900 border border-slate-800 shadow-xl rounded-[2.5rem] p-10">
                <h3 class="text-2xl font-black text-white mb-8 flex items-center gap-4">
                    <span class="w-12 h-12 rounded-2xl bg-teal-500/10 border border-teal-500/20 flex items-center justify-center text-teal-400">📱</span>
                    Aplikasi Pendukung
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="p-6 bg-slate-800/30 border border-slate-700 rounded-2xl hover:border-teal-500/50 transition-all group">
                        <div class="text-3xl mb-4 group-hover:scale-110 transition-transform">🔍</div>
                        <h5 class="font-bold text-white mb-2">Getcontact</h5>
                        <p class="text-xs text-slate-500 leading-relaxed">Identifikasi nomor DC melalui tag yang diberikan pengguna lain. Sangat efektif memfilter nomor spam.</p>
                    </div>
                    <div class="p-6 bg-slate-800/30 border border-slate-700 rounded-2xl hover:border-teal-500/50 transition-all group">
                        <div class="text-3xl mb-4 group-hover:scale-110 transition-transform">📞</div>
                        <h5 class="font-bold text-white mb-2">Truecaller</h5>
                        <p class="text-xs text-slate-500 leading-relaxed">Database nomor spam terbesar. Memblokir panggilan DC secara otomatis jika teridentifikasi mengganggu.</p>
                    </div>
                    <div class="p-6 bg-slate-800/30 border border-slate-700 rounded-2xl hover:border-teal-500/50 transition-all group">
                        <div class="text-3xl mb-4 group-hover:scale-110 transition-transform">🎙️</div>
                        <h5 class="font-bold text-white mb-2">Call Recorder</h5>
                        <p class="text-xs text-slate-500 leading-relaxed">Merekam setiap panggilan masuk secara otomatis. Rekaman ini bisa menjadi bukti kuat saat melapor.</p>
                    </div>
                    <div class="p-6 bg-slate-800/30 border border-slate-700 rounded-2xl hover:border-teal-500/50 transition-all group">
                        <div class="text-3xl mb-4 group-hover:scale-110 transition-transform">🔒</div>
                        <h5 class="font-bold text-white mb-2">Google Messages</h5>
                        <p class="text-xs text-slate-500 leading-relaxed">Fitur deteksi spam SMS yang sangat baik. Menjauhkan Anda dari pesan-pesan ancaman yang mengganggu.</p>
                    </div>
                </div>
            </div>

            {{-- INFO TAMBAHAN --}}
            <div class="p-8 bg-amber-500/5 border border-amber-500/20 rounded-[2rem] flex gap-6 items-start">
                <div class="w-12 h-12 rounded-xl bg-amber-500/10 flex items-center justify-center text-2xl shrink-0">💡</div>
                <div class="space-y-2">
                    <h5 class="font-bold text-amber-200">Tips Keamanan Data</h5>
                    <p class="text-sm text-amber-500/80 leading-relaxed">
                        Jangan pernah menghapus log panggilan atau chat ancaman. Rekaman layar (*screen record*) atau tangkapan layar (*screenshot*) adalah bukti fisik yang paling valid saat Anda melakukan pengaduan resmi.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard(btn) {
            const text = btn.previousElementSibling.innerText;
            navigator.clipboard.writeText(text).then(() => {
                const originalText = btn.innerText;
                btn.innerText = '✅ Tersalin!';
                btn.classList.remove('bg-indigo-600');
                btn.classList.add('bg-teal-600');
                setTimeout(() => {
                    btn.innerText = originalText;
                    btn.classList.remove('bg-teal-600');
                    btn.classList.add('bg-indigo-600');
                }, 2000);
            });
        }
    </script>
</x-frontend-layout>
