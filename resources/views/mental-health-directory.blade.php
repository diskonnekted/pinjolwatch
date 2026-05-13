<x-guest-layout>
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
.glass { background: rgba(255,255,255,.05); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,.1); border-radius: 24px; transition: all .3s ease; }
.glass:hover { background: rgba(255,255,255,.08); border-color: rgba(45,212,191,.3); transform: translateY(-4px); }

/* Gradient text */
.grad { background: linear-gradient(135deg, #fff 0%, var(--teal-l) 50%, var(--teal) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }

/* Badge */
.badge { display: inline-flex; align-items: center; gap: 8px; padding: 6px 16px; background: rgba(13,148,136,.2); border: 1px solid rgba(45,212,191,.4); border-radius: 999px; font-size: .75rem; font-weight: 700; color: var(--teal-l); letter-spacing: .08em; text-transform: uppercase; }

/* CTA buttons */
.btn-primary { display: inline-flex; align-items: center; justify-content: center; gap: 10px; padding: 12px 24px; background: linear-gradient(135deg, var(--teal) 0%, #0891b2 100%); color: #fff; font-weight: 800; font-size: .9rem; border-radius: 12px; letter-spacing: .05em; text-transform: uppercase; box-shadow: 0 0 20px rgba(13,148,136,.4); transition: all .3s ease; text-decoration: none; }
.btn-primary:hover { transform: translateY(-2px); box-shadow: 0 0 30px rgba(13,148,136,.6); }
.btn-ghost { display: inline-flex; align-items: center; justify-content: center; gap: 10px; padding: 12px 24px; background: rgba(255,255,255,.07); border: 1px solid rgba(255,255,255,.15); color: #fff; font-weight: 700; font-size: .9rem; border-radius: 12px; letter-spacing: .05em; text-transform: uppercase; transition: all .3s ease; text-decoration: none; }
.btn-ghost:hover { background: rgba(255,255,255,.12); border-color: rgba(45,212,191,.5); }

/* Divider */
.divider { height: 1px; background: linear-gradient(90deg, transparent, rgba(45,212,191,.3), transparent); margin: 0; }
</style>

<main>
{{-- HERO --}}
<section style="padding: 140px 32px 80px; position: relative; overflow: hidden; background: var(--dark);">
    <div id="particles"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <div style="max-width: 1280px; margin: 0 auto; position: relative; z-index: 1;">
        <div style="display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 48px; align-items: center;">
            <div style="text-align: left;">
                <div class="badge" style="margin-bottom: 24px;">
                    <span style="width:8px;height:8px;background:var(--teal-l);border-radius:50%;animation:pulse 2s infinite;"></span>
                    Update Terakhir: Mei 2026
                </div>
                <h1 style="font-size: clamp(2.5rem, 4vw, 4.5rem); font-weight: 900; line-height: 1.1; margin-bottom: 24px;">
                    <span class="grad">Direktori Bantuan Mental</span>
                </h1>
                <p style="font-size: 1.1rem; color: #94a3b8; line-height: 1.8; margin-bottom: 32px;">
                    Berdasarkan pencarian informasi terkini, <strong>tidak ada layanan kesehatan mental yang secara eksklusif khusus untuk korban pinjol</strong>. Namun, terdapat <strong>banyak layanan kesehatan mental umum di Indonesia yang dapat diakses korban pinjol</strong>, baik gratis maupun berbayar, dengan pendekatan trauma-informed yang relevan.
                </p>
                <div style="display: flex; gap: 16px;">
                    <a href="#layanan-pemerintah" class="btn-primary">Layanan Gratis</a>
                    <a href="#layanan-ngo" class="btn-ghost">Layanan NGO</a>
                </div>
            </div>
            
            <div class="hero-img-col" style="position: relative;">
                <div style="position: absolute; inset: -30px; background: radial-gradient(circle, rgba(13,148,136,0.2) 0%, transparent 70%); filter: blur(20px);"></div>
                <div class="glass" style="padding: 12px; border-radius: 32px; transform: rotate(2deg); overflow: hidden; box-shadow: 0 20px 50px rgba(0,0,0,0.5); aspect-ratio: 1/1;">
                    <img src="/Ketenangan & Pemulihan Mental.webp" alt="Ilustrasi Ketenangan & Pemulihan Mental" style="width: 100%; height: 100%; object-fit: cover; border-radius: 20px; display: block;">
                </div>
            </div>
        </div>
    </div>
</section>

<div class="divider"></div>

<section style="background: var(--dark2); padding: 96px 32px;">
    <div style="max-width: 1100px; margin: 0 auto;">
        
        {{-- 1. LAYANAN PEMERINTAH (GRATIS) --}}
        <div style="margin-bottom: 64px;">
            <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 32px;">
                <div style="width: 56px; height: 56px; background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.2); border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">🏥</div>
                <h2 style="font-size: 2rem; font-weight: 900; color: #fff;">Layanan Pemerintah <span style="color: #34d399;">(Gratis)</span></h2>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;">
                {{-- Healing119 --}}
                <div class="glass" style="padding: 32px; display: flex; flex-direction: column;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
                        <h3 style="font-size: 1.25rem; font-weight: 800; color: #fff;">Healing119.id / Halo Kemenkes</h3>
                        <span style="background: rgba(16, 185, 129, 0.2); color: #34d399; padding: 4px 12px; border-radius: 999px; font-size: 0.7rem; font-weight: 800; text-transform: uppercase;">Official</span>
                    </div>
                    <div style="flex-grow: 1; margin-bottom: 24px;">
                        <div style="display: flex; gap: 12px; margin-bottom: 12px; align-items: center;">
                            <span style="font-size: 1.25rem;">📞</span>
                            <div style="color: #e2e8f0; font-weight: 600;">119 ext. 8 <br><span style="font-size: 0.85rem; color: #94a3b8;">WA: 0811-2550-567</span></div>
                        </div>
                        <div style="display: flex; gap: 12px; margin-bottom: 16px; align-items: center;">
                            <span style="font-size: 1.25rem;">⏱️</span>
                            <div style="color: #e2e8f0; font-weight: 600; font-size: 0.9rem;">Operasional 24 Jam</div>
                        </div>
                        <p style="color: #94a3b8; font-size: 0.9rem; line-height: 1.6;">Konseling krisis, dukungan emosional, rujukan ke fasilitas kesehatan.</p>
                    </div>
                    <a href="https://healing119.id" target="_blank" class="btn-ghost" style="width: 100%;">Kunjungi Website</a>
                </div>

                {{-- Puskesmas --}}
                <div class="glass" style="padding: 32px; display: flex; flex-direction: column;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
                        <h3 style="font-size: 1.25rem; font-weight: 800; color: #fff;">Puskesmas (Poli Jiwa)</h3>
                        <span style="background: rgba(16, 185, 129, 0.2); color: #34d399; padding: 4px 12px; border-radius: 999px; font-size: 0.7rem; font-weight: 800; text-transform: uppercase;">Faskes 1</span>
                    </div>
                    <div style="flex-grow: 1; margin-bottom: 24px;">
                        <div style="display: flex; gap: 12px; margin-bottom: 16px; align-items: center;">
                            <span style="font-size: 1.25rem;">📍</span>
                            <div style="color: #e2e8f0; font-weight: 600; font-size: 0.9rem;">Sesuai Domisili KTP/BPJS</div>
                        </div>
                        <p style="color: #94a3b8; font-size: 0.9rem; line-height: 1.6; margin-bottom: 12px;">Puskesmas kini banyak yang dilengkapi Psikolog Klinis. Tersedia layanan skrining kesehatan mental (SRQ-20), konseling dasar, dan rujukan ke RSUD/RSJ.</p>
                        <div style="color: #34d399; font-weight: 700; font-size: 0.85rem;">Biaya: GRATIS penuh dengan BPJS.</div>
                    </div>
                    <a href="https://yankes.kemkes.go.id/app/siranap/" target="_blank" class="btn-ghost" style="width: 100%;">Cari Faskes Terdekat</a>
                </div>

                {{-- RSJ --}}
                <div class="glass" style="padding: 32px; display: flex; flex-direction: column;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
                        <h3 style="font-size: 1.25rem; font-weight: 800; color: #fff;">RSJ Daerah & Nasional</h3>
                        <span style="background: rgba(16, 185, 129, 0.2); color: #34d399; padding: 4px 12px; border-radius: 999px; font-size: 0.7rem; font-weight: 800; text-transform: uppercase;">Lanjutan</span>
                    </div>
                    <div style="flex-grow: 1; margin-bottom: 24px;">
                        <div style="display: flex; gap: 12px; margin-bottom: 16px; align-items: center;">
                            <span style="font-size: 1.25rem;">🩺</span>
                            <div style="color: #e2e8f0; font-weight: 600; font-size: 0.9rem;">Layanan Komprehensif & IGD 24 Jam</div>
                        </div>
                        <p style="color: #94a3b8; font-size: 0.9rem; line-height: 1.6; margin-bottom: 12px;">Intervensi medis oleh Psikiater dan terapi lanjutan oleh Psikolog Klinis. Disarankan untuk kondisi trauma berat dan darurat.</p>
                        <div style="color: #34d399; font-weight: 700; font-size: 0.85rem;">Ditanggung penuh BPJS via rujukan Faskes 1.</div>
                    </div>
                    <a href="https://yankes.kemkes.go.id/" target="_blank" class="btn-ghost" style="width: 100%;">Info Direktori RS</a>
                </div>
            </div>
        </div>

        {{-- 2. NGO & PROFESI --}}
        <div style="margin-bottom: 64px;">
            <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 32px;">
                <div style="width: 56px; height: 56px; background: rgba(45, 212, 191, 0.1); border: 1px solid rgba(45, 212, 191, 0.2); border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">🤝</div>
                <h2 style="font-size: 2rem; font-weight: 900; color: #fff;">Layanan NGO & Profesi <span style="color: var(--teal-l);">(Terjangkau)</span></h2>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 24px;">
                {{-- IPK --}}
                <div class="glass" style="padding: 32px; display: flex; flex-direction: column;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
                        <h3 style="font-size: 1.25rem; font-weight: 800; color: #fff;">IPK Indonesia — "Sahabat IPK"</h3>
                        <span style="background: rgba(45, 212, 191, 0.2); color: var(--teal-l); padding: 4px 12px; border-radius: 999px; font-size: 0.7rem; font-weight: 800; text-transform: uppercase;">Psikolog</span>
                    </div>
                    <p style="color: #94a3b8; font-size: 0.95rem; line-height: 1.6; margin-bottom: 24px; flex-grow: 1;">Telekonseling gratis & berbayar dengan psikolog klinis bersertifikat. Fokus pada trauma dan krisis.</p>
                    <div style="background: rgba(0,0,0,0.3); padding: 12px 16px; border-radius: 12px; margin-bottom: 24px; font-weight: 700; color: #e2e8f0; font-size: 0.9rem;">
                        Biaya: Gratis / Rp150rb+
                    </div>
                    <a href="https://sahabat.ipkindonesia.or.id" target="_blank" class="btn-ghost" style="width: 100%;">Akses Layanan</a>
                </div>

                {{-- Yayasan Pulih --}}
                <div class="glass" style="padding: 32px; display: flex; flex-direction: column;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
                        <h3 style="font-size: 1.25rem; font-weight: 800; color: #fff;">Yayasan Pulih</h3>
                    </div>
                    <p style="color: #94a3b8; font-size: 0.95rem; line-height: 1.6; margin-bottom: 24px; flex-grow: 1;">Berpengalaman menangani trauma kompleks & kekerasan struktural. Tersedia skema sliding scale untuk yang tidak mampu.</p>
                    <div style="background: rgba(0,0,0,0.3); padding: 12px 16px; border-radius: 12px; margin-bottom: 24px; font-weight: 700; color: #e2e8f0; font-size: 0.9rem;">
                        Biaya: Rp200rb - 250rb / Sesi
                    </div>
                    <a href="https://yayasanpulih.org" target="_blank" class="btn-primary" style="width: 100%;">Daftar Konseling</a>
                </div>

                {{-- LBH --}}
                <div class="glass" style="grid-column: 1 / -1; padding: 40px;">
                    <h3 style="font-size: 1.5rem; font-weight: 900; color: #fff; margin-bottom: 24px;">LBH Jakarta / LBH APIK</h3>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 32px;">
                        <div>
                            <p style="color: #94a3b8; font-size: 1rem; line-height: 1.6; margin-bottom: 16px;">Layanan bantuan hukum gratis yang juga menyediakan rujukan pendampingan psikologis bagi korban pinjol.</p>
                            <div style="background: rgba(45, 212, 191, 0.1); border-left: 4px solid var(--teal-l); padding: 16px; border-radius: 0 12px 12px 0;">
                                <p style="color: var(--teal-l); font-style: italic; font-size: 0.9rem; margin: 0;">"LBH Jakarta mencatat 1.944 korban pinjol mengadu, dengan mayoritas perempuan, dan beberapa berujung bunuh diri."</p>
                            </div>
                        </div>
                        <div style="display: flex; flex-direction: column; justify-content: center; gap: 16px;">
                            <div style="display: flex; align-items: center; gap: 12px; color: #e2e8f0; font-weight: 600;">
                                <span style="color: var(--teal-l);">✓</span> Pendampingan Holistik (Hukum + Mental)
                            </div>
                            <div style="display: flex; align-items: center; gap: 12px; color: #e2e8f0; font-weight: 600;">
                                <span style="color: var(--teal-l);">✓</span> Khusus Korban Ketidakadilan
                            </div>
                            <div style="margin-top: 16px;">
                                <div style="font-size: 0.8rem; color: #94a3b8; text-transform: uppercase; font-weight: 800; letter-spacing: 0.05em;">Kontak Darurat:</div>
                                <div style="font-size: 1.5rem; font-weight: 900; color: #fff;">(021) 852-3399</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- PANDUAN MEMILIH --}}
        <div class="glass" style="padding: 48px; border-color: rgba(244, 63, 94, 0.3); background: rgba(2, 6, 23, 0.6);">
            <div style="text-align: center; margin-bottom: 40px;">
                <h2 style="font-size: 2rem; font-weight: 900; color: #fff; margin-bottom: 12px;">🧭 Panduan Memilih Layanan</h2>
                <p style="color: #94a3b8; max-width: 600px; margin: 0 auto;">Pilih layanan yang paling sesuai dengan kondisi dan urgensi Anda saat ini.</p>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 24px;">
                <div style="background: rgba(244, 63, 94, 0.1); border: 1px solid rgba(244, 63, 94, 0.2); padding: 24px; border-radius: 20px;">
                    <div style="font-size: 2rem; margin-bottom: 16px;">😰</div>
                    <h4 style="color: #fff; font-weight: 800; font-size: 1.1rem; margin-bottom: 8px;">Krisis / Ide Bunuh Diri</h4>
                    <p style="color: #cbd5e1; font-size: 0.9rem;">Hubungi <strong style="color: #f43f5e;">Healing119 (119 ext. 8)</strong> segera.</p>
                </div>
                <div style="background: rgba(45, 212, 191, 0.1); border: 1px solid rgba(45, 212, 191, 0.2); padding: 24px; border-radius: 20px;">
                    <div style="font-size: 2rem; margin-bottom: 16px;">😔</div>
                    <h4 style="color: #fff; font-weight: 800; font-size: 1.1rem; margin-bottom: 8px;">Stres Berat Terus-Menerus</h4>
                    <p style="color: #cbd5e1; font-size: 0.9rem;">Konsultasi ke <strong>IPK Indonesia</strong> atau <strong>Yayasan Pulih</strong>.</p>
                </div>
                <div style="background: rgba(59, 130, 246, 0.1); border: 1px solid rgba(59, 130, 246, 0.2); padding: 24px; border-radius: 20px;">
                    <div style="font-size: 2rem; margin-bottom: 16px;">⚖️</div>
                    <h4 style="color: #fff; font-weight: 800; font-size: 1.1rem; margin-bottom: 8px;">Butuh Bantuan Hukum</h4>
                    <p style="color: #cbd5e1; font-size: 0.9rem;">Kontak <strong>LBH Jakarta / LBH APIK</strong> untuk bantuan holistik.</p>
                </div>
            </div>
        </div>

    </div>
</section>

<div class="divider"></div>

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