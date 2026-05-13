<x-guest-layout>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap');
:root { --teal: #0d9488; --teal-l: #2dd4bf; --dark: #020617; --dark2: #0f172a; }
body { font-family: 'Inter', sans-serif; background: var(--dark); color: #f1f5f9; }

/* Particles */
#particles { position: absolute; inset: 0; overflow: hidden; pointer-events: none; }
.particle { position: absolute; width: 2px; height: 2px; background: var(--teal-l); border-radius: 50%; opacity: 0; animation: float linear infinite; }
@keyframes float { 0% { transform: translateY(100vh) scale(0); opacity: 0; } 10% { opacity: .6; } 90% { opacity: .3; } 100% { transform: translateY(-10vh) scale(1); opacity: 0; } }

/* Glow orbs */
.orb { position: absolute; border-radius: 50%; filter: blur(80px); pointer-events: none; }
.orb-1 { width: 600px; height: 600px; background: radial-gradient(circle, rgba(13,148,136,.35) 0%, transparent 70%); top: -200px; left: -200px; }
.orb-2 { width: 500px; height: 500px; background: radial-gradient(circle, rgba(45,212,191,.2) 0%, transparent 70%); top: 100px; right: -150px; animation: pulse 4s ease-in-out infinite alternate; }
@keyframes pulse { from { transform: scale(1); opacity: .6; } to { transform: scale(1.2); opacity: 1; } }

/* Glass card */
.glass { background: rgba(255,255,255,.05); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,.1); border-radius: 24px; }
.glass:hover { background: rgba(255,255,255,.08); border-color: rgba(45,212,191,.3); transform: translateY(-4px); transition: all .3s ease; }

/* Gradient text */
.grad { background: linear-gradient(135deg, #fff 0%, var(--teal-l) 50%, var(--teal) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }

/* Badge */
.badge { display: inline-flex; align-items: center; gap: 8px; padding: 6px 16px; background: rgba(13,148,136,.2); border: 1px solid rgba(45,212,191,.4); border-radius: 999px; font-size: .75rem; font-weight: 700; color: var(--teal-l); letter-spacing: .08em; text-transform: uppercase; }

/* CTA buttons */
.btn-primary { display: inline-flex; align-items: center; gap: 10px; padding: 16px 36px; background: linear-gradient(135deg, var(--teal) 0%, #0891b2 100%); color: #fff; font-weight: 800; font-size: 1rem; border-radius: 14px; letter-spacing: .05em; text-transform: uppercase; box-shadow: 0 0 40px rgba(13,148,136,.4); transition: all .3s ease; text-decoration: none; }
.btn-primary:hover { transform: translateY(-3px); box-shadow: 0 0 60px rgba(13,148,136,.6); }
.btn-ghost { display: inline-flex; align-items: center; gap: 10px; padding: 16px 36px; background: rgba(255,255,255,.07); border: 1px solid rgba(255,255,255,.15); color: #fff; font-weight: 700; font-size: 1rem; border-radius: 14px; letter-spacing: .05em; text-transform: uppercase; transition: all .3s ease; text-decoration: none; }
.btn-ghost:hover { background: rgba(255,255,255,.12); border-color: rgba(45,212,191,.5); }

/* Stat counter */
.stat-num { font-size: 3rem; font-weight: 900; line-height: 1; }
.stat-label { font-size: .75rem; font-weight: 600; color: #94a3b8; text-transform: uppercase; letter-spacing: .08em; margin-top: 4px; }

/* Divider */
.divider { height: 1px; background: linear-gradient(90deg, transparent, rgba(45,212,191,.3), transparent); margin: 0; }
</style>

<main>
{{-- HERO --}}
<section style="padding: 140px 32px 80px; position: relative; overflow: hidden; background: var(--dark);">
    <div id="particles"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

        <livewire:public-stats />
</section>

<div class="divider"></div>

{{-- FINAL CTA --}}
<section style="background: var(--dark); padding: 120px 32px; text-align: center; position: relative; overflow: hidden;">
    <div style="position: absolute; inset: 0; background: radial-gradient(ellipse at center, rgba(13,148,136,.15) 0%, transparent 70%);"></div>
    <div style="max-width: 760px; margin: 0 auto; position: relative; z-index: 1;">
        <div class="badge" style="margin: 0 auto 32px; width: fit-content;">Bantu Ubah Statistik Ini</div>
        <h2 style="font-size: clamp(2rem, 5vw, 4rem); font-weight: 900; line-height: 1.1; margin-bottom: 24px;" class="grad">Jangan Jadi Korban Senyap.</h2>
        <p style="color: #94a3b8; font-size: 1.1rem; line-height: 1.8; margin-bottom: 48px;">Data menunjukkan pinjol ilegal masih marak. Laporkan teror yang Anda alami secara anonim dan aman.</p>
        <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
            <a href="{{ route('report') }}" class="btn-primary" style="font-size: 1.1rem; padding: 18px 48px;">Lapor Sekarang</a>
            <a href="{{ route('info-pinjol') }}" class="btn-ghost" style="font-size: 1.1rem; padding: 18px 48px;">Cek Legalitas</a>
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