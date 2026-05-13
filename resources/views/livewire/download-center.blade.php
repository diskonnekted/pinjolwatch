<div class="relative min-h-screen overflow-hidden bg-[#020617] text-slate-100 font-inter">
    {{-- Background Effects --}}
    <style>
        :root { --teal: #0d9488; --teal-l: #2dd4bf; --dark: #020617; --dark2: #0f172a; }
        .glass { background: rgba(255,255,255,.03); backdrop-filter: blur(24px); -webkit-backdrop-filter: blur(24px); border: 1px solid rgba(255,255,255,.08); border-radius: 28px; }
        .glass:hover { background: rgba(255,255,255,.05); border-color: rgba(45,212,191,.4); transform: translateY(-8px); transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1); }
        .grad { background: linear-gradient(135deg, #fff 0%, var(--teal-l) 50%, var(--teal) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        .orb { position: absolute; border-radius: 50%; filter: blur(80px); pointer-events: none; z-index: 0; }
        .orb-1 { width: 600px; height: 600px; background: radial-gradient(circle, rgba(13,148,136,.25) 0%, transparent 70%); top: -150px; left: -150px; animation: pulse-orb 10s infinite alternate; }
        .orb-2 { width: 500px; height: 500px; background: radial-gradient(circle, rgba(45,212,191,.15) 0%, transparent 70%); bottom: 50px; right: -150px; animation: pulse-orb 8s infinite alternate-reverse; }
        @keyframes pulse-orb { from { transform: scale(1) translate(0, 0); opacity: 0.5; } to { transform: scale(1.2) translate(20px, 20px); opacity: 0.8; } }
        .badge-teal { display: inline-flex; align-items: center; gap: 8px; padding: 6px 18px; background: rgba(13,148,136,.12); border: 1px solid rgba(45,212,191,.2); border-radius: 999px; font-size: .65rem; font-weight: 800; color: var(--teal-l); letter-spacing: .15em; text-transform: uppercase; }
        .btn-teal { display: inline-flex; align-items: center; justify-content: center; gap: 10px; padding: 16px 32px; background: linear-gradient(135deg, var(--teal) 0%, #0891b2 100%); color: #fff; font-weight: 800; font-size: 0.8rem; border-radius: 16px; letter-spacing: .05em; text-transform: uppercase; box-shadow: 0 10px 30px -10px rgba(13,148,136,0.5); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); border: none; cursor: pointer; position: relative; overflow: hidden; }
        .btn-teal:hover { transform: translateY(-3px) scale(1.02); box-shadow: 0 20px 40px -10px rgba(13,148,136,0.7); }
        .btn-teal::after { content: ''; position: absolute; top: -50%; left: -50%; width: 200%; height: 200%; background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent); transform: rotate(45deg); transition: 0.5s; }
        .btn-teal:hover::after { left: 120%; }
        .card-icon { transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1); }
        .group:hover .card-icon { transform: scale(1.1) rotate(-5deg); }
    </style>

    {{-- Background Particles (Optional but nice) --}}
    <div id="particles" class="absolute inset-0 pointer-events-none opacity-30"></div>

    {{-- Orbs --}}
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 pt-12 pb-32">
        {{-- Spacer for Navbar --}}
        <div class="h-24 md:h-32"></div>
        
        {{-- Header Section --}}
        <div class="text-center mb-24">
            <div class="badge-teal mb-8 animate-in fade-in slide-in-from-bottom-4 duration-700">
                <span class="w-2 h-2 rounded-full bg-teal-400 animate-ping"></span>
                Resource Library
            </div>
            <h1 class="text-5xl md:text-7xl font-black mb-8 leading-[1.1] tracking-tight animate-in fade-in slide-in-from-bottom-8 duration-700 delay-100">
                <span class="grad">Amunisi Edukasi</span><br>
                <span class="text-white">Gerakan Anti-Pinjol</span>
            </h1>
            <p class="text-slate-400 font-medium text-lg max-w-2xl mx-auto leading-relaxed animate-in fade-in slide-in-from-bottom-12 duration-700 delay-200">
                Senjata terbaik melawan predator finansial adalah literasi. Unduh dan sebarkan materi edukasi kami untuk melindungi komunitas Anda.
            </p>
        </div>

        {{-- Flash Message --}}
        @if (session()->has('message'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)" 
                 class="max-w-md mx-auto mb-16 p-5 glass border-emerald-500/40 text-emerald-400 rounded-2xl text-center font-bold text-sm flex items-center justify-center gap-3 animate-in zoom-in duration-300">
                <div class="w-8 h-8 rounded-full bg-emerald-500/20 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                </div>
                {{ session('message') }}
            </div>
        @endif

        {{-- Materials Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10" style="margin-bottom: 160px;">
            @foreach($materials as $material)
                <div class="group glass p-10 relative overflow-hidden transition-all duration-500 flex flex-col">
                    {{-- Decorative Icon Background --}}
                    <div class="absolute -right-10 -bottom-10 text-[12rem] opacity-[0.03] group-hover:opacity-[0.08] transition-all duration-700 rotate-12 pointer-events-none group-hover:rotate-[20deg] group-hover:scale-110">
                        {{ $material['icon'] }}
                    </div>

                    <div class="relative z-10 flex flex-col h-full">
                        <div class="flex items-start justify-between mb-12">
                            <div class="card-icon w-20 h-20 rounded-[22px] flex items-center justify-center text-4xl shadow-2xl
                                @if($material['color'] == 'teal') bg-teal-500/15 text-teal-400 border border-teal-500/30
                                @elseif($material['color'] == 'indigo') bg-indigo-500/15 text-indigo-400 border border-indigo-500/30
                                @elseif($material['color'] == 'amber') bg-amber-500/15 text-amber-400 border border-amber-500/30
                                @else bg-rose-500/15 text-rose-400 border border-rose-500/30 @endif">
                                {{ $material['icon'] }}
                            </div>
                            <div class="flex flex-col items-end gap-2">
                                <span class="badge-teal" style="background: rgba(255,255,255,0.03); border-color: rgba(255,255,255,0.1); color: #94a3b8;">
                                    {{ $material['category'] }}
                                </span>
                                <span class="text-[9px] font-black text-slate-600 uppercase tracking-[0.2em] px-2">Released 2026</span>
                            </div>
                        </div>

                        <h3 class="text-3xl font-black text-white mb-6 leading-tight group-hover:text-teal-300 transition-colors">
                            {{ $material['title'] }}
                        </h3>
                        
                        <p class="text-slate-400 text-base font-medium leading-relaxed mb-12 flex-grow">
                            {{ $material['description'] }}
                        </p>

                        <div class="flex items-center justify-between pt-10 border-t border-white/10 mt-auto">
                            <div class="flex flex-col">
                                <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Metadata Format</span>
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-teal-500"></span>
                                    <span class="text-sm font-bold text-slate-300">{{ $material['type'] }}</span>
                                </div>
                            </div>
                            <button 
                                wire:click="download('{{ $material['id'] }}')"
                                class="btn-teal group/btn">
                                <span class="group-hover/btn:translate-x-1 transition-transform flex items-center gap-3">
                                    Unduh Materi
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Call to Action --}}
        <div class="relative group/cta" style="margin-top: 180px;">
            <div class="absolute inset-0 bg-gradient-to-r from-teal-500/20 via-transparent to-teal-500/20 rounded-[4rem] blur-3xl opacity-50 group-hover/cta:opacity-100 transition-opacity duration-1000"></div>
            <div class="relative glass p-16 md:p-24 text-center overflow-hidden border-white/15 rounded-[4rem]">
                <div class="max-w-3xl mx-auto relative z-10">
                    <div class="w-20 h-20 bg-teal-500/10 rounded-full flex items-center justify-center mx-auto mb-10 border border-teal-500/20">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10 text-teal-400">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-black text-white mb-8 leading-tight">Jadilah Bagian dari <span class="grad">Perlawanan</span></h2>
                    <p class="text-slate-400 text-lg font-medium mb-12 leading-relaxed">
                        Jika Anda memiliki aset edukasi yang ingin dibagikan secara gratis kepada penyintas lainnya, kontribusi Anda sangat berharga bagi gerakan ini.
                    </p>
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
                        <a href="mailto:contact@pinjolwatch.id" class="btn-teal !py-6 !px-16 !text-base shadow-teal-950/40">
                            Hubungi Tim PinjolWatch
                        </a>
                        <p class="text-slate-500 text-xs font-bold uppercase tracking-widest">Respons kilat dalam 24 jam</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
