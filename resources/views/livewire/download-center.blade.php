<div class="py-20 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header Section --}}
        <div class="text-center mb-16 space-y-4">
            <h1 class="text-5xl font-black text-slate-900 tracking-tighter uppercase italic">
                Pusat <span class="text-primary-600">Publikasi</span> & Edukasi
            </h1>
            <p class="text-slate-500 font-bold text-xs uppercase tracking-[0.4em]">Ambil Bagian Dalam Gerakan Memutus Rantai Pinjol</p>
            <div class="w-24 h-1.5 bg-primary-600 mx-auto rounded-full mt-6"></div>
        </div>

        {{-- Flash Message --}}
        @if (session()->has('message'))
            <div class="max-w-2xl mx-auto mb-10 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-2xl text-center font-bold text-sm animate-bounce">
                {{ session('message') }}
            </div>
        @endif

        {{-- Materials Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($materials as $material)
                <div class="group bg-white rounded-[2.5rem] p-10 border border-slate-100 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 relative overflow-hidden">
                    {{-- Decorative Background Icon --}}
                    <div class="absolute -right-8 -bottom-8 text-9xl opacity-[0.03] group-hover:opacity-[0.07] transition-opacity duration-500 rotate-12">
                        {{ $material['icon'] }}
                    </div>

                    <div class="relative z-10 flex flex-col h-full">
                        <div class="flex items-start justify-between mb-8">
                            <div class="w-16 h-16 rounded-3xl flex items-center justify-center text-3xl shadow-lg
                                @if($material['color'] == 'teal') bg-teal-50 text-teal-600 shadow-teal-100
                                @elseif($material['color'] == 'indigo') bg-indigo-50 text-indigo-600 shadow-indigo-100
                                @elseif($material['color'] == 'amber') bg-amber-50 text-amber-600 shadow-amber-100
                                @else bg-rose-50 text-rose-600 shadow-rose-100 @endif">
                                {{ $material['icon'] }}
                            </div>
                            <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest border
                                @if($material['color'] == 'teal') bg-teal-50 text-teal-700 border-teal-100
                                @elseif($material['color'] == 'indigo') bg-indigo-50 text-indigo-700 border-indigo-100
                                @elseif($material['color'] == 'amber') bg-amber-50 text-amber-700 border-amber-100
                                @else bg-rose-50 text-rose-700 border-rose-100 @endif">
                                {{ $material['category'] }}
                            </span>
                        </div>

                        <h3 class="text-2xl font-black text-slate-900 mb-4 leading-tight group-hover:text-primary-600 transition-colors">
                            {{ $material['title'] }}
                        </h3>
                        
                        <p class="text-slate-500 text-sm font-medium leading-relaxed mb-8 flex-grow">
                            {{ $material['description'] }}
                        </p>

                        <div class="flex items-center justify-between pt-6 border-t border-slate-50 mt-auto">
                            <div class="flex flex-col">
                                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Format File</span>
                                <span class="text-xs font-bold text-slate-700">{{ $material['type'] }}</span>
                            </div>
                            <button 
                                wire:click="download('{{ $material['id'] }}')"
                                class="px-8 py-4 bg-slate-900 text-white font-black text-xs rounded-2xl uppercase tracking-widest hover:bg-primary-600 hover:shadow-lg hover:shadow-primary-200 transition-all active:scale-95">
                                Unduh Materi
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Call to Action --}}
        <div class="mt-24 bg-gradient-to-br from-indigo-900 to-slate-950 rounded-[3rem] p-12 text-center shadow-2xl relative overflow-hidden">
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10"></div>
            <div class="relative z-10">
                <h2 class="text-3xl font-black text-white italic uppercase tracking-tighter mb-4">Punya materi tambahan?</h2>
                <p class="text-slate-400 text-sm font-medium max-w-xl mx-auto mb-10 leading-relaxed">
                    Jika Anda memiliki poster, video edukasi, atau template hukum yang ingin dibagikan secara gratis kepada penyintas lainnya, silakan hubungi tim PinjolWatch.
                </p>
                <a href="mailto:contact@pinjolwatch.id" class="inline-flex items-center gap-3 px-10 py-5 bg-primary-600 text-white font-black text-sm rounded-2xl uppercase tracking-widest hover:bg-primary-500 transition-all shadow-xl shadow-primary-500/20 group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 group-hover:rotate-12 transition-transform">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>
                    Kirim Materi Kontribusi
                </a>
            </div>
        </div>
    </div>
</div>
