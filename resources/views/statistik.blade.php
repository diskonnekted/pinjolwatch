<x-guest-layout>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap');
    :root { --teal: #0d9488; --teal-l: #2dd4bf; --rose: #e11d48; --dark: #020617; }
    body { font-family: 'Inter', sans-serif; background: var(--dark); color: #f1f5f9; scroll-behavior: smooth; }

    /* Particles & Orbs */
    #particles { position: absolute; inset: 0; overflow: hidden; pointer-events: none; z-index: 0; }
    .orb { position: absolute; border-radius: 50%; filter: blur(100px); pointer-events: none; z-index: 0; }
    .orb-1 { width: 800px; height: 800px; background: radial-gradient(circle, rgba(13,148,136,.15) 0%, transparent 70%); top: -300px; left: -300px; }
    .orb-2 { width: 600px; height: 600px; background: radial-gradient(circle, rgba(225,29,72,.08) 0%, transparent 70%); bottom: -200px; right: -200px; }

    /* Modern Glass Card */
    .glass { background: rgba(15,23,42,.6); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,.05); border-radius: 32px; transition: all .4s cubic-bezier(0.4, 0, 0.2, 1); }
    .glass:hover { border-color: rgba(45,212,191,.2); background: rgba(15,23,42,.8); transform: translateY(-4px); }

    /* Header Styling */
    .grad { background: linear-gradient(135deg, #fff 0%, var(--teal-l) 60%, var(--teal) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
    .badge { display: inline-flex; align-items: center; gap: 8px; padding: 8px 20px; background: rgba(13,148,136,.1); border: 1px solid rgba(45,212,191,.2); border-radius: 999px; font-size: .75rem; font-weight: 800; color: var(--teal-l); letter-spacing: .1em; text-transform: uppercase; }

    /* Buttons */
    .btn-primary { display: inline-flex; align-items: center; gap: 12px; padding: 20px 44px; background: linear-gradient(135deg, var(--teal) 0%, #0d9488 100%); color: #fff; font-weight: 900; font-size: 1rem; border-radius: 20px; text-transform: uppercase; transition: all .3s ease; box-shadow: 0 15px 35px -5px rgba(13,148,136,.3); }
    .btn-primary:hover { transform: translateY(-2px) scale(1.02); box-shadow: 0 20px 50px -5px rgba(13,148,136,.5); }
    
    /* Divider */
    .divider { height: 1px; background: linear-gradient(90deg, transparent, rgba(255,255,255,.05), transparent); margin: 0; }
    </style>

    <main class="relative">
        {{-- Background Elements --}}
        <div id="particles"></div>
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>

        {{-- Hero Header --}}
        <section class="relative pt-32 pb-16 px-6 overflow-hidden">
            <div class="max-w-4xl mx-auto text-center space-y-8 relative z-10">
                <div class="badge">Live Data Insights 2026</div>
                <h1 class="text-5xl md:text-8xl font-black text-white uppercase tracking-tighter leading-[0.9]">
                    Data yang <br><span class="grad italic">Bercerita.</span>
                </h1>
                <p class="text-slate-400 text-lg md:text-xl font-medium max-w-2xl mx-auto leading-relaxed">
                    Menyingkap tabir gelap industri pinjaman online melalui transparansi data laporan masyarakat dan statistik otoritas nasional.
                </p>
            </div>
        </section>

        {{-- Livewire Content --}}
        <section class="relative z-10">
            <livewire:public-stats />
        </section>

        <div class="divider"></div>

        {{-- Footer CTA --}}
        <section class="py-32 px-6 relative z-10 overflow-hidden" style="margin-bottom: 200px !important;">
            <div class="max-w-5xl mx-auto glass p-12 md:p-24 text-center space-y-10 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-teal-500/5 via-transparent to-rose-500/5"></div>
                <div class="relative z-10">
                    <h2 class="text-4xl md:text-6xl font-black text-white uppercase tracking-tighter leading-none mb-6">
                        Data Anda <br><span class="text-rose-500 italic">Adalah Kekuatan.</span>
                    </h2>
                    <p class="text-slate-400 text-lg max-w-xl mx-auto mb-12">
                        Setiap laporan membantu kita memetakan pola teror dan menuntut regulasi yang lebih adil. Jangan biarkan statistik ini berhenti di sini.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-6 justify-center">
                        <a href="{{ route('report') }}" class="btn-primary">Laporkan Kasus Baru</a>
                        <a href="{{ route('stories') }}" class="inline-flex items-center justify-center px-12 py-5 border border-slate-800 rounded-2xl text-white font-bold hover:bg-white/5 transition-all">Baca Cerita Korban</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

<script>
// Particles
(function(){
    const c = document.getElementById('particles');
    if(!c) return;
    for(let i=0;i<40;i++){
        const p = document.createElement('div');
        p.className = 'particle';
        p.style.cssText = `left:${Math.random()*100}%;width:${Math.random()*3+1}px;height:${Math.random()*3+1}px;animation-duration:${Math.random()*15+10}s;animation-delay:${Math.random()*10}s;opacity:${Math.random()*.5+.1}`;
        c.appendChild(p);
    }
})();
</script>
</x-guest-layout>
