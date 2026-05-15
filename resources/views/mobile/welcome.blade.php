<x-mobile-layout>
    <style>
        /* Mobile-specific animations and overrides */
        @keyframes pulse-slow {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }
        @keyframes float-y {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }
        .glass-panel {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.2);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .glass-card:active {
            transform: scale(0.96);
            background: rgba(255, 255, 255, 0.08);
        }
        .text-gradient {
            background: linear-gradient(135deg, #2dd4bf 0%, #0ea5e9 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        /* Override body for dark theme specific to mobile */
        body { background-color: #020617; }
        .mobile-container { background-color: #020617; min-height: 100vh; position: relative; overflow-x: hidden; }
    </style>

    <div class="mobile-container pb-28 text-slate-100">
        
        {{-- Ambient Orbs --}}
        <div class="absolute top-[-10%] left-[-10%] w-[300px] h-[300px] rounded-full bg-teal-600/30 blur-[80px] pointer-events-none" style="animation: pulse-slow 8s infinite alternate;"></div>
        <div class="absolute top-[20%] right-[-20%] w-[250px] h-[250px] rounded-full bg-cyan-600/20 blur-[60px] pointer-events-none"></div>

        {{-- Top Navigation / Header --}}
        <div class="px-6 pt-16 pb-6 relative z-10 flex justify-between items-center">
            <div>
                <p class="text-[10px] font-black tracking-[0.2em] text-teal-400 uppercase mb-2 flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-teal-400 animate-pulse"></span>
                    Sistem Monitoring Aktif
                </p>
                <h1 class="text-4xl font-black tracking-tight leading-none text-white drop-shadow-2xl">
                    Pinjol<span class="text-gradient">Watch</span>
                </h1>
            </div>
        </div>

        {{-- Hero Call to Action --}}
        <div class="px-6 mb-8 relative z-10">
            <div class="relative w-full rounded-[28px] overflow-hidden shadow-2xl border border-white/10" style="background: linear-gradient(145deg, #0f172a 0%, #020617 100%);">
                {{-- Inner Glow --}}
                <div class="absolute inset-0 bg-gradient-to-tr from-teal-500/10 to-transparent"></div>
                
                <div class="p-8 relative">
                    <h2 class="text-2xl font-black text-white mb-2 leading-tight">Korban Teror<br>Pinjol Ilegal?</h2>
                    <p class="text-slate-400 text-sm mb-6 max-w-[80%] leading-relaxed">Laporkan secara anonim, aman, dan tanpa jejak. Kami bantu melawan.</p>
                    
                    <a href="{{ route('report') }}" class="w-full flex items-center justify-center gap-2 py-4 rounded-xl font-bold text-white shadow-[0_0_20px_rgba(20,184,166,0.3)] hover:shadow-[0_0_30px_rgba(20,184,166,0.5)] transition-all active:scale-95" style="background: linear-gradient(135deg, #0d9488 0%, #0891b2 100%); text-transform: uppercase; letter-spacing: 0.05em;">
                        Buat Laporan
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M12.97 3.97a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 1 1-1.06-1.06l6.22-6.22H3a.75.75 0 0 1 0-1.5h16.19l-6.22-6.22a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" /></svg>
                    </a>
                </div>
            </div>
        </div>

        {{-- Live Statistics Banner --}}
        <div class="px-6 mb-8 relative z-10">
            <div class="glass-panel rounded-2xl p-4 flex items-center justify-around divide-x divide-white/10">
                <div class="text-center px-2 w-1/2">
                    <div class="text-xs font-semibold tracking-wider text-slate-400 uppercase mb-1">Enkripsi</div>
                    <div class="text-2xl font-black text-teal-400">100%</div>
                </div>
                <div class="text-center px-2 w-1/2">
                    <div class="text-xs font-semibold tracking-wider text-slate-400 uppercase mb-1">Laporan</div>
                    <div class="text-2xl font-black text-white" id="stat-reports">200+</div>
                </div>
            </div>
        </div>

        {{-- Bento Grid Menu --}}
        <div class="px-6 mb-10 relative z-10">
            <div class="flex justify-between items-end mb-4">
                <h3 class="text-lg font-bold text-white tracking-tight">Eksplorasi</h3>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                {{-- Card 1 --}}
                <a href="{{ route('track') }}" class="glass-card rounded-[24px] p-5 relative overflow-hidden group">
                    <div class="absolute -right-4 -bottom-4 w-16 h-16 bg-blue-500/20 rounded-full blur-xl"></div>
                    <div class="w-12 h-12 rounded-full bg-blue-500/10 border border-blue-500/20 flex items-center justify-center mb-4 text-blue-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75l-2.489-2.489m0 0a3.375 3.375 0 10-4.773-4.773 3.375 3.375 0 004.774 4.774zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <h4 class="text-sm font-bold text-white mb-1">Lacak Tiket</h4>
                    <p class="text-[10px] text-slate-400 leading-tight">Pantau status laporan kasus Anda.</p>
                </a>

                {{-- Card 2 --}}
                <a href="{{ route('quiz') }}" class="glass-card rounded-[24px] p-5 relative overflow-hidden group">
                    <div class="absolute -right-4 -bottom-4 w-16 h-16 bg-emerald-500/20 rounded-full blur-xl"></div>
                    <div class="w-12 h-12 rounded-full bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center mb-4 text-emerald-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" /></svg>
                    </div>
                    <h4 class="text-sm font-bold text-white mb-1">Cek Mental</h4>
                    <p class="text-[10px] text-slate-400 leading-tight">Ukur tingkat stres akibat teror.</p>
                </a>

                {{-- Card 3 (Full width) --}}
                <a href="{{ route('info-pinjol') }}" class="col-span-2 glass-card rounded-[24px] p-5 relative overflow-hidden flex items-center justify-between">
                    <div class="absolute left-0 top-0 w-full h-full bg-gradient-to-r from-amber-500/5 to-transparent pointer-events-none"></div>
                    <div class="flex items-center gap-4 relative z-10">
                        <div class="w-12 h-12 rounded-full bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-400 shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" /></svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-white mb-0.5">Direktori Resmi OJK</h4>
                            <p class="text-[10px] text-slate-400 leading-tight">Cek legalitas pinjaman online sebelum meminjam.</p>
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-slate-500 shrink-0"><path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" /></svg>
                </a>
            </div>
        </div>

        {{-- Map Banner --}}
        <div class="px-6 mb-6 relative z-10">
            <a href="{{ route('map') }}" class="block w-full h-36 rounded-[28px] relative overflow-hidden group border border-white/10 shadow-lg">
                <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110 opacity-40" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/Indonesia_map_blank.svg/1024px-Indonesia_map_blank.svg.png'); filter: blur(1px);"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/60 to-transparent"></div>
                
                <div class="absolute bottom-5 left-5 right-5 flex justify-between items-end">
                    <div>
                        <div class="flex items-center gap-1.5 mb-1">
                            <span class="w-2 h-2 rounded-full bg-red-500 animate-ping"></span>
                            <span class="text-[10px] font-bold tracking-widest text-red-400 uppercase">Live Map</span>
                        </div>
                        <h4 class="text-base font-black text-white leading-tight">Peta Sebaran Kasus</h4>
                    </div>
                    <div class="w-8 h-8 rounded-full bg-white/10 backdrop-blur-sm flex items-center justify-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" /></svg>
                    </div>
                </div>
            </a>
        </div>

    </div>

    <script>
        // Fetch stats silently to update the report counter
        fetch('/api/map-stats')
            .then(res => res.json())
            .then(data => {
                let cnt = data.reduce((a, b) => a + b.count, 0);
                if(cnt > 0) document.getElementById('stat-reports').innerText = cnt.toLocaleString('id');
            })
            .catch(e => console.log('Stats err', e));
    </script>
</x-mobile-layout>
