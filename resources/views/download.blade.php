<x-guest-layout>
<div class="bg-slate-950 min-height-screen py-20 px-4">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-teal-950/30 border border-teal-900/50 rounded-full text-[10px] font-black text-teal-400 uppercase tracking-widest mb-6">
                Pusat Sumber Daya & Publikasi
            </div>
            <h1 class="text-4xl md:text-6xl font-black text-white uppercase italic tracking-tighter mb-6 grad">
                Bahan Edukasi & <br> Advokasi
            </h1>
            <p class="text-slate-400 text-lg max-w-2xl mx-auto leading-relaxed">
                Unduh dan bagikan materi-materi ini untuk membantu menyebarkan kesadaran tentang dampak pinjol dan memperjuangkan hak-hak penyintas.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- MATERIAL 1: INFOGRAFIS --}}
            <div class="bg-slate-900 border border-slate-800 rounded-[2.5rem] overflow-hidden flex flex-col hover:border-teal-500/50 transition-all group">
                <div class="aspect-video overflow-hidden">
                    <img src="{{ asset('images/downloads/infografis_188_juta.png') }}" alt="Infografis 188 Juta Jiwa" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-8 flex-grow">
                    <h3 class="text-xl font-black text-white uppercase italic mb-4">Infografis Dampak Nasional</h3>
                    <p class="text-slate-400 text-sm leading-relaxed mb-8">
                        Visualisasi data dampak psikologis pinjol terhadap 188 juta jiwa di Indonesia. Sangat cocok untuk kampanye di media sosial.
                    </p>
                    <a href="{{ asset('images/downloads/infografis_188_juta.png') }}" download class="w-full py-4 bg-slate-800 border border-slate-700 text-white font-black uppercase text-xs tracking-widest rounded-2xl flex items-center justify-center gap-2 hover:bg-teal-600 hover:border-teal-500 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" /></svg>
                        Unduh JPG
                    </a>
                </div>
            </div>

            {{-- MATERIAL 2: ADVOCACY TEMPLATE --}}
            <div class="bg-slate-900 border border-slate-800 rounded-[2.5rem] overflow-hidden flex flex-col hover:border-purple-500/50 transition-all group">
                <div class="aspect-video overflow-hidden">
                    <img src="{{ asset('images/downloads/template_advocacy.png') }}" alt="Template Advocacy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-8 flex-grow">
                    <h3 class="text-xl font-black text-white uppercase italic mb-4">Template Laporan OJK/DPR</h3>
                    <p class="text-slate-400 text-sm leading-relaxed mb-8">
                        Struktur laporan profesional untuk menyampaikan aspirasi dan data dampak sistemik kepada regulator dan wakil rakyat.
                    </p>
                    <a href="{{ asset('images/downloads/template_advocacy.png') }}" download class="w-full py-4 bg-slate-800 border border-slate-700 text-white font-black uppercase text-xs tracking-widest rounded-2xl flex items-center justify-center gap-2 hover:bg-purple-600 hover:border-purple-500 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" /></svg>
                        Unduh Template
                    </a>
                </div>
            </div>

            {{-- MATERIAL 3: EDUCATION MODUL --}}
            <div class="bg-slate-900 border border-slate-800 rounded-[2.5rem] overflow-hidden flex flex-col hover:border-amber-500/50 transition-all group">
                <div class="aspect-video overflow-hidden">
                    <img src="{{ asset('images/downloads/modul_edukasi.png') }}" alt="Modul Edukasi" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-8 flex-grow">
                    <h3 class="text-xl font-black text-white uppercase italic mb-4">Modul Edukasi Komunitas</h3>
                    <p class="text-slate-400 text-sm leading-relaxed mb-8">
                        Materi presentasi "Membaca Data Pinjol Tanpa Panik" yang siap dibawakan di lingkungan RT/RW atau komunitas Anda.
                    </p>
                    <a href="{{ asset('images/downloads/modul_edukasi.png') }}" download class="w-full py-4 bg-slate-800 border border-slate-700 text-white font-black uppercase text-xs tracking-widest rounded-2xl flex items-center justify-center gap-2 hover:bg-amber-600 hover:border-amber-500 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" /></svg>
                        Unduh Modul
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-20 p-12 bg-gradient-to-br from-slate-900 to-teal-950/20 border border-teal-900/50 rounded-[3rem] text-center">
            <h2 class="text-2xl font-black text-white uppercase italic mb-4">Butuh Materi Spesifik?</h2>
            <p class="text-slate-400 mb-8 max-w-xl mx-auto">Jika Anda memerlukan data atau materi publikasi untuk kebutuhan penelitian atau pelaporan khusus, silakan hubungi tim responder kami.</p>
            <a href="{{ route('dashboard', ['tab' => 'messages']) }}" class="inline-block px-10 py-4 bg-teal-600 text-white font-black uppercase text-sm tracking-widest rounded-2xl hover:bg-teal-500 transition-all shadow-lg shadow-teal-900/20">
                Hubungi Fiona
            </a>
        </div>
    </div>
</div>
</x-guest-layout>
