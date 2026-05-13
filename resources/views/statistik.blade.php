<x-guest-layout>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

/* Custom Table Styles inside Glass */
.glass-table { width: 100%; text-align: left; border-collapse: collapse; }
.glass-table th { padding: 12px 16px; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; color: var(--teal-l); border-bottom: 1px solid rgba(255,255,255,0.1); }
.glass-table td { padding: 16px; font-size: 0.95rem; border-bottom: 1px solid rgba(255,255,255,0.05); color: #e2e8f0; }
.glass-table tr:last-child td { border-bottom: none; }

.chart-container { position: relative; height: 300px; width: 100%; margin-top: 24px; }
</style>

<main>
{{-- HERO --}}
<section style="padding: 140px 32px 80px; position: relative; overflow: hidden; background: var(--dark);">
    <div id="particles"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <div style="max-width: 1100px; margin: 0 auto; position: relative; z-index: 1; text-align: center;">
        <div class="badge" style="margin-bottom: 24px;">
            Per Maret 2026
        </div>
        <h1 style="font-size: clamp(2.5rem, 4vw, 4.5rem); font-weight: 900; line-height: 1.1; margin-bottom: 24px;">
            <span class="grad">Visualisasi Statistik</span><br>
            <span style="color: #f1f5f9;">Ekosistem Pinjol.</span>
        </h1>
        <p style="font-size: 1.1rem; color: #94a3b8; line-height: 1.8; max-width: 700px; margin: 0 auto 48px;">
            Analisis data interaktif berdasarkan laporan resmi OJK, AFPI, dan data internal pelaporan PinjolWatch.
        </p>

        {{-- Top 4 Big Stats --}}
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
            <div class="glass" style="padding: 32px 24px;">
                <div class="stat-num grad" style="font-size: 2.5rem;">Rp101T</div>
                <div class="stat-label">Outstanding Pinjaman</div>
            </div>
            <div class="glass" style="padding: 32px 24px;">
                <div class="stat-num grad" style="font-size: 2.5rem;">146,5M</div>
                <div class="stat-label">Akun Terdaftar</div>
            </div>
            <div class="glass" style="padding: 32px 24px;">
                <div class="stat-num grad" style="font-size: 2.5rem;">9.081</div>
                <div class="stat-label">Entitas Ilegal Diblokir</div>
            </div>
            <div class="glass" style="padding: 32px 24px;">
                <div class="stat-num grad" style="font-size: 2.5rem;">95</div>
                <div class="stat-label">Platform Legal OJK</div>
            </div>
        </div>
    </div>
</section>

<div class="divider"></div>

{{-- BENTO GRID SECTIONS --}}
<section style="background: var(--dark2); padding: 96px 32px;">
    <div style="max-width: 1100px; margin: 0 auto;">
        
        <div style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px;">
            
            {{-- Outstanding & Pertumbuhan --}}
            <div class="glass" style="grid-column: span 12; padding: 40px;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px; flex-wrap: wrap; gap: 16px;">
                    <div>
                        <div class="badge" style="margin-bottom: 12px; background: rgba(245, 158, 11, 0.1); border-color: rgba(245, 158, 11, 0.3); color: #fbbf24;">Tren Utama</div>
                        <h3 style="font-size: 1.75rem; font-weight: 900;">Pertumbuhan Outstanding</h3>
                    </div>
                    <p style="color: #94a3b8; font-size: .9rem; max-width: 400px; margin: 0;">Fintech lending tumbuh konsisten >25% YoY. Grafik menunjukkan tren kenaikan sejak Desember 2025.</p>
                </div>
                
                <div class="chart-container" style="height: 350px;">
                    <canvas id="outstandingChart"></canvas>
                </div>
            </div>

            {{-- Pinjol Ilegal --}}
            <div class="glass" style="grid-column: span 7; padding: 40px; position: relative; overflow: hidden;">
                <div class="badge" style="margin-bottom: 16px; background: rgba(225,29,72,.1); border-color: rgba(225,29,72,.3); color: #fb7185;">Skala Masalah</div>
                <h3 style="font-size: 1.5rem; font-weight: 900; margin-bottom: 24px;">Evolusi Entitas Ilegal</h3>
                
                <div class="chart-container">
                    <canvas id="ilegalChart"></canvas>
                </div>
            </div>

            {{-- Komposisi Pembiayaan --}}
            <div class="glass" style="grid-column: span 5; padding: 40px; display: flex; flex-direction: column;">
                <div class="badge" style="margin-bottom: 16px; background: rgba(59,130,246,.1); border-color: rgba(59,130,246,.3); color: #60a5fa;">Komposisi</div>
                <h3 style="font-size: 1.5rem; font-weight: 900; margin-bottom: 24px;">Produktif vs Konsumtif</h3>
                
                <div class="chart-container" style="flex-grow: 1;">
                    <canvas id="compositionChart"></canvas>
                </div>
            </div>

            {{-- Kualitas Kredit --}}
            <div class="glass" style="grid-column: span 12; padding: 40px;">
                <div style="display: flex; align-items: center; gap: 40px; flex-wrap: wrap;">
                    <div style="flex-grow: 1;">
                        <div class="badge" style="margin-bottom: 16px; background: rgba(245, 158, 11, 0.1); border-color: rgba(245, 158, 11, 0.3); color: #fbbf24;">Risk Monitoring</div>
                        <h3 style="font-size: 1.5rem; font-weight: 900; margin-bottom: 16px;">Tingkat Wanprestasi (TWP90)</h3>
                        <p style="color: #94a3b8; font-size: 1rem; line-height: 1.6; margin-bottom: 24px;">
                            TWP90 mengukur tingkat kegagalan pembayaran di atas 90 hari. Ambang batas aman OJK adalah 5%. Saat ini di angka <strong>4,54%</strong>.
                        </p>
                        <div style="height: 12px; background: rgba(255,255,255,0.1); border-radius: 99px; overflow: hidden;">
                            <div style="width: 90.8%; height: 100%; background: linear-gradient(90deg, var(--teal) 0%, #fbbf24 100%);"></div>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-top: 10px; font-size: .75rem; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: .1em;">
                            <span>Aman (0%)</span>
                            <span style="color: #fbbf24;">4,54% (Saat Ini)</span>
                            <span>Warning (5%)</span>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Pengaduan Masyarakat --}}
            <div class="glass" style="grid-column: span 12; padding: 40px; display: flex; align-items: center; gap: 40px; flex-wrap: wrap;">
                <div style="flex-shrink: 0; width: 80px; height: 80px; background: linear-gradient(135deg, #e11d48, #be123c); border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 2.5rem;">📣</div>
                <div>
                    <h3 style="font-size: 1.5rem; font-weight: 900; margin-bottom: 12px;">Pengaduan Masyarakat (2025)</h3>
                    <p style="color: #cbd5e1; font-size: 1.05rem; line-height: 1.6; margin-bottom: 0;">
                        Terdapat <strong>14.634 total pengaduan</strong> terkait entitas ilegal. Mayoritas didominasi oleh <strong>Pinjol Ilegal (11.653 laporan / 79,6%)</strong>.
                    </p>
                </div>
            </div>

        </div>
    </div>
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
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

// Charts Initialization
document.addEventListener('DOMContentLoaded', function() {
    // Register the datalabels plugin
    Chart.register(ChartDataLabels);

    const teal = '#0d9488';
    const tealL = '#2dd4bf';
    const blue = '#3b82f6';
    const rose = '#e11d48';

    // 1. Outstanding Chart (Line)
    new Chart(document.getElementById('outstandingChart'), {
        type: 'line',
        data: {
            labels: ['Des 2025', 'Jan 2026', 'Feb 2026', 'Mar 2026'],
            datasets: [{
                label: 'Outstanding (Triliun Rp)',
                data: [94.85, 98.54, 100.69, 101.03],
                borderColor: tealL,
                backgroundColor: 'rgba(45, 212, 191, 0.1)',
                borderWidth: 4,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: tealL,
                pointBorderColor: '#fff',
                pointHoverRadius: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                datalabels: {
                    color: '#fff',
                    align: 'top',
                    offset: 8,
                    font: { weight: '900', size: 12 },
                    formatter: function(value) {
                        return 'Rp' + value + 'T';
                    }
                }
            },
            layout: {
                padding: { top: 30 }
            },
            scales: {
                y: { grid: { color: 'rgba(255,255,255,0.05)' }, ticks: { color: '#94a3b8' } },
                x: { grid: { display: false }, ticks: { color: '#94a3b8' } }
            }
        }
    });

    // 2. Ilegal Chart (Bar/Doughnut mix logic)
    new Chart(document.getElementById('ilegalChart'), {
        type: 'bar',
        data: {
            labels: ['2023', '2024', '2025*'],
            datasets: [
                {
                    label: 'Pinjol Ilegal',
                    data: [2248, 2930, 1556],
                    backgroundColor: rose,
                    borderRadius: 8
                },
                {
                    label: 'Investasi Ilegal',
                    data: [40, 310, 284],
                    backgroundColor: 'rgba(255,255,255,0.2)',
                    borderRadius: 8
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { labels: { color: '#94a3b8', font: { weight: 'bold' } } },
                datalabels: { display: false }
            },
            scales: {
                y: { stacked: true, grid: { color: 'rgba(255,255,255,0.05)' }, ticks: { color: '#94a3b8' } },
                x: { stacked: true, grid: { display: false }, ticks: { color: '#94a3b8' } }
            }
        }
    });

    // 3. Composition Chart (Pie)
    new Chart(document.getElementById('compositionChart'), {
        type: 'doughnut',
        data: {
            labels: ['Konsumtif', 'Produktif (UMKM)'],
            datasets: [{
                data: [65.69, 34.31],
                backgroundColor: [tealL, blue],
                borderColor: 'transparent',
                hoverOffset: 20
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: { position: 'bottom', labels: { color: '#94a3b8', padding: 20, font: { weight: 'bold' } } },
                datalabels: {
                    color: '#fff',
                    font: { weight: '900', size: 11 },
                    formatter: (value) => value + '%'
                }
            }
        }
    });
});

// Responsive bento grid fix
function fixBento(){
    const cards = document.querySelectorAll('[style*="grid-column: span 7"], [style*="grid-column: span 5"]');
    if(window.innerWidth < 768) cards.forEach(c=>c.style.gridColumn='span 12');
    else cards.forEach(c=>{
        c.style.gridColumn = c.style.cssText.includes('span 7') ? 'span 7' : 'span 5';
    });
}
window.addEventListener('resize', fixBento);
fixBento();
</script>
</x-guest-layout>