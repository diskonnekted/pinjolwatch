<x-guest-layout>
@section('title', 'PinjolWatch | Platform Pengaduan Anonim & Pemulihan Mental Korban Pinjol')
@section('meta_description', 'Lapor teror debt collector pinjol ilegal secara 100% anonim. Dapatkan pendampingan hukum, cek kesehatan jiwa K10, dan panduan pemulihan keuangan gratis.')

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

/* Step card */
.step-num { width: 48px; height: 48px; background: linear-gradient(135deg, var(--teal), #0891b2); border-radius: 14px; display: flex; align-items: center; justify-content: center; font-weight: 900; font-size: 1.25rem; color: #fff; flex-shrink: 0; }

/* Testimonial */
.quote-mark { font-size: 5rem; line-height: 0; color: var(--teal); font-style: italic; }

/* Scrollbar */
::-webkit-scrollbar { width: 6px; } ::-webkit-scrollbar-track { background: var(--dark2); } ::-webkit-scrollbar-thumb { background: var(--teal); border-radius: 3px; }

/* Divider */
.divider { height: 1px; background: linear-gradient(90deg, transparent, rgba(45,212,191,.3), transparent); margin: 0; }

/* Nav override for dark hero */
nav { background: rgba(2,6,23,.8) !important; backdrop-filter: blur(20px); border-bottom: 1px solid rgba(255,255,255,.06); }

/* Image animations */
@keyframes float-img { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-16px); } }
@keyframes float-badge { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-8px); } }
@keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }

/* Hero responsive */
@media (max-width: 960px) {
    .hero-grid { grid-template-columns: 1fr !important; gap: 32px !important; }
    .hero-img-col { display: none !important; }
    .hero-text { text-align: center !important; }
    .hero-btns { justify-content: center !important; }
}
</style>

<main>
{{-- HERO --}}
<section style="min-height: 100vh; display: flex; align-items: center; position: relative; overflow: hidden; background: var(--dark);">
    <div id="particles"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <div style="max-width: 1280px; margin: 0 auto; padding: 120px 32px 80px; width: 100%; position: relative; z-index: 1;">
        <div class="hero-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 64px; align-items: center;">

            {{-- LEFT: Text content --}}
            <div class="hero-text">
                <div class="badge" style="margin-bottom: 32px;">
                    <span style="width:8px;height:8px;background:var(--teal-l);border-radius:50%;animation:pulse 2s infinite;"></span>
                    Platform Pengaduan #1 Indonesia
                </div>

                <h1 style="font-size: clamp(2.8rem, 4.5vw, 5rem); font-weight: 900; line-height: 1.05; margin-bottom: 28px;">
                    <span class="grad">Anda Tidak</span><br>
                    <span class="grad">Sendirian.</span>
                </h1>

                <p style="font-size: 1.15rem; color: #94a3b8; line-height: 1.8; margin-bottom: 48px;">
                    Ruang aman untuk melaporkan teror pinjol ilegal secara <strong style="color: #e2e8f0;">100% anonim</strong>. Data terenkripsi. Didampingi tim hukum. Kesehatan mental Anda diprioritaskan.
                </p>

                <div class="hero-btns" style="display: flex; gap: 16px; flex-wrap: wrap; margin-bottom: 56px;">
                    <a href="{{ route('report') }}" class="btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>
                        Lapor Sekarang
                    </a>
                    <a href="#cara-kerja" class="btn-ghost">
                        Cara Kerja
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3"/></svg>
                    </a>
                </div>

                {{-- Live Stats --}}
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px;">
                    <div class="glass" style="padding: 20px 24px; transition: all .3s;">
                        <div class="stat-num grad" id="cnt-reports" style="font-size: 2.2rem;">0</div>
                        <div class="stat-label">Laporan Masuk</div>
                    </div>
                    <div class="glass" style="padding: 20px 24px; transition: all .3s;">
                        <div class="stat-num grad" id="cnt-verified" style="font-size: 2.2rem;">0</div>
                        <div class="stat-label">Terverifikasi</div>
                    </div>
                    <div class="glass" style="padding: 20px 24px; transition: all .3s;">
                        <div class="stat-num grad" style="font-size: 2.2rem;">34</div>
                        <div class="stat-label">Provinsi</div>
                    </div>
                    <div class="glass" style="padding: 20px 24px; transition: all .3s;">
                        <div class="stat-num grad" style="font-size: 2.2rem;">100%</div>
                        <div class="stat-label">Identitas Aman</div>
                    </div>
                </div>
            </div>

            {{-- RIGHT: Illustration --}}
            <div style="position: relative; display: flex; align-items: center; justify-content: center;">
                {{-- Ambient glow behind image --}}
                <div style="position: absolute; inset: -40px; background: radial-gradient(ellipse at center, rgba(13,148,136,.35) 0%, rgba(45,212,191,.1) 40%, transparent 70%); border-radius: 50%; animation: pulse 4s ease-in-out infinite alternate;"></div>

                {{-- Floating ring 1 --}}
                <div style="position: absolute; width: 110%; height: 110%; border: 1px solid rgba(45,212,191,.15); border-radius: 50%; animation: spin 20s linear infinite;"></div>
                {{-- Floating ring 2 --}}
                <div style="position: absolute; width: 90%; height: 90%; border: 1px dashed rgba(45,212,191,.1); border-radius: 50%; animation: spin 15s linear infinite reverse;"></div>

                {{-- Image with glass frame - 1:1 square crop --}}
                <div style="position: relative; width: 100%; max-width: 480px; aspect-ratio: 1/1; border-radius: 32px; overflow: hidden; box-shadow: 0 0 80px rgba(13,148,136,.4), 0 0 0 1px rgba(45,212,191,.2); animation: float-img 6s ease-in-out infinite;">
                    <img src="/anda tidak sendiri.webp"
                         alt="Anda Tidak Sendirian - Ilustrasi dukungan komunitas"
                         style="width: 100%; height: 100%; object-fit: cover; object-position: center center; display: block;">
                    {{-- Teal overlay shimmer --}}
                    <div style="position: absolute; inset: 0; background: linear-gradient(135deg, rgba(13,148,136,.08) 0%, transparent 50%, rgba(45,212,191,.08) 100%); pointer-events: none;"></div>
                </div>

                {{-- Floating badge top-right --}}
                <div class="glass" style="position: absolute; top: 16px; right: -8px; padding: 12px 20px; border-radius: 16px; animation: float-badge 4s ease-in-out infinite;">
                    <div style="font-size: .7rem; font-weight: 700; color: var(--teal-l); text-transform: uppercase; letter-spacing: .08em;">🔒 Enkripsi End-to-End</div>
                </div>

                {{-- Floating badge bottom-left --}}
                <div class="glass" style="position: absolute; bottom: 24px; left: -8px; padding: 12px 20px; border-radius: 16px; animation: float-badge 5s ease-in-out infinite reverse;">
                    <div style="font-size: .7rem; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: .08em;">🛡️ 100% Anonim</div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="divider"></div>

{{-- HOW IT WORKS --}}
<section id="cara-kerja" style="background: var(--dark2); padding: 96px 32px;">
    <div style="max-width: 1100px; margin: 0 auto;">
        <div style="text-align: center; margin-bottom: 64px;">
            <div class="badge" style="margin: 0 auto 20px; width: fit-content;">Proses Aman & Anonim</div>
            <h2 style="font-size: clamp(2rem, 4vw, 3rem); font-weight: 900;" class="grad">3 Langkah Lapor Tanpa Takut</h2>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px;">
            <div class="glass" style="padding: 40px; transition: all .3s;">
                <div style="display: flex; gap: 20px; align-items: flex-start;">
                    <div class="step-num">1</div>
                    <div>
                        <h3 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 12px;">Isi Laporan Anonim</h3>
                        <p style="color: #94a3b8; line-height: 1.7;">Tidak perlu nama, KTP, atau email. Cukup pilih jenis ancaman, unggah bukti, dan dapatkan kode tiket pribadi.</p>
                    </div>
                </div>
            </div>
            <div class="glass" style="padding: 40px; transition: all .3s;">
                <div style="display: flex; gap: 20px; align-items: flex-start;">
                    <div class="step-num">2</div>
                    <div>
                        <h3 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 12px;">Enkripsi & Verifikasi</h3>
                        <p style="color: #94a3b8; line-height: 1.7;">Bukti disimpan terenkripsi dan diverifikasi oleh tim moderasi sebelum diteruskan ke otoritas terkait.</p>
                    </div>
                </div>
            </div>
            <div class="glass" style="padding: 40px; transition: all .3s;">
                <div style="display: flex; gap: 20px; align-items: flex-start;">
                    <div class="step-num">3</div>
                    <div>
                        <h3 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 12px;">Pantau & Pulih</h3>
                        <p style="color: #94a3b8; line-height: 1.7;">Cek perkembangan dengan kode tiket. Kami kawal proses hukum, Anda fokus menjaga kesehatan mental.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="divider"></div>

{{-- BENTO FEATURES --}}
<section style="background: var(--dark); padding: 96px 32px;">
    <div style="max-width: 1100px; margin: 0 auto;">
        <div style="text-align: center; margin-bottom: 64px;">
            <div class="badge" style="margin: 0 auto 20px; width: fit-content;">Kenali & Lawan</div>
            <h2 style="font-size: clamp(2rem, 4vw, 3rem); font-weight: 900;" class="grad">Semua yang Anda Butuhkan</h2>
        </div>

        <div style="display: grid; grid-template-columns: repeat(12, 1fr); grid-auto-rows: minmax(180px, auto); gap: 20px;">
            {{-- Big card --}}
            <div class="glass" style="grid-column: span 7; padding: 48px; display: flex; flex-direction: column; justify-content: space-between; transition: all .3s; position: relative; overflow: hidden;">
                <div style="position: absolute; top: -40px; right: -40px; width: 200px; height: 200px; background: radial-gradient(circle, rgba(13,148,136,.3) 0%, transparent 70%); border-radius: 50%;"></div>
                <div>
                    <div style="font-size: 2.5rem; margin-bottom: 20px;">🗺️</div>
                    <h3 style="font-size: 1.75rem; font-weight: 900; margin-bottom: 16px;">Peta Sebaran Real-Time</h3>
                    <p style="color: #94a3b8; line-height: 1.7; max-width: 360px;">Visualisasi interaktif laporan dari seluruh Indonesia. Ketahui daerah mana yang paling terdampak teror pinjol ilegal.</p>
                </div>
                <a href="{{ route('map') }}" style="display: inline-flex; align-items: center; gap: 8px; color: var(--teal-l); font-weight: 700; font-size: .875rem; text-transform: uppercase; letter-spacing: .06em; text-decoration: none; margin-top: 32px;">
                    Lihat Peta
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                </a>
            </div>

            {{-- Tall card --}}
            <div class="glass" style="grid-column: span 5; padding: 40px; display: flex; flex-direction: column; justify-content: space-between; transition: all .3s;">
                <div>
                    <div style="font-size: 2rem; margin-bottom: 20px;">🧠</div>
                    <h3 style="font-size: 1.4rem; font-weight: 900; margin-bottom: 12px;">Cek Kesehatan Jiwa</h3>
                    <p style="color: #94a3b8; line-height: 1.65; font-size: .95rem;">Gunakan standar skala K10. Ukur dampak psikologis tekanan pinjol yang Anda alami.</p>
                </div>
                <a href="{{ route('quiz') }}" class="btn-primary" style="margin-top: 32px; width: fit-content; font-size: .875rem; padding: 12px 24px;">Mulai Tes Gratis</a>
            </div>

            {{-- Medium card --}}
            <div class="glass" style="grid-column: span 5; padding: 40px; transition: all .3s;">
                <div style="font-size: 2rem; margin-bottom: 20px;">📋</div>
                <h3 style="font-size: 1.3rem; font-weight: 900; margin-bottom: 12px;">Direktori Pinjol OJK</h3>
                <p style="color: #94a3b8; line-height: 1.65; font-size: .95rem;">Kenali pola penagihan resmi dan riwayat kasus. Jangan biarkan ketidaktahuan jadi senjata mereka.</p>
                <a href="{{ route('info-pinjol') }}" style="display: inline-flex; align-items: center; gap: 8px; color: var(--teal-l); font-weight: 700; font-size: .8rem; text-transform: uppercase; letter-spacing: .06em; text-decoration: none; margin-top: 24px;">
                    Telusuri Sekarang →
                </a>
            </div>

            {{-- Ticket card --}}
            <div class="glass" style="grid-column: span 7; padding: 40px; display: flex; align-items: center; gap: 40px; transition: all .3s;">
                <div style="flex-shrink: 0; width: 80px; height: 80px; background: linear-gradient(135deg, var(--teal), #0891b2); border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 2.5rem;">🎫</div>
                <div>
                    <h3 style="font-size: 1.3rem; font-weight: 900; margin-bottom: 8px;">Cek Status Laporan</h3>
                    <p style="color: #94a3b8; line-height: 1.65; font-size: .95rem; margin-bottom: 20px;">Pantau perkembangan laporan Anda kapan saja hanya dengan kode tiket.</p>
                    <a href="{{ route('track') }}" style="display: inline-flex; align-items: center; gap: 8px; color: var(--teal-l); font-weight: 700; font-size: .8rem; text-transform: uppercase; letter-spacing: .06em; text-decoration: none;">Lacak Tiket →</a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="divider"></div>

{{-- TESTIMONIALS --}}
<section style="background: var(--dark2); padding: 96px 32px;">
    <div style="max-width: 1100px; margin: 0 auto;">
        <div style="text-align: center; margin-bottom: 64px;">
            <div class="badge" style="margin: 0 auto 20px; width: fit-content;">Kekuatan dalam Berbagi</div>
            <h2 style="font-size: clamp(2rem, 4vw, 3rem); font-weight: 900;" class="grad">Mereka Sudah Bangkit</h2>
        </div>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 32px;">
            @foreach($featuredStories as $story)
            <div class="glass" style="padding: 24px; display: flex; flex-direction: column; justify-content: space-between; transition: all .4s cubic-bezier(0.4, 0, 0.2, 1); min-height: 480px; position: relative; overflow: hidden; group;">
                
                <div>
                    {{-- Article Thumbnail --}}
                    <div style="position: relative; width: 100%; aspect-ratio: 16/9; border-radius: 18px; overflow: hidden; margin-bottom: 24px; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.05);">
                        @if($story->image_path)
                            @php
                                $imageUrl = asset(ltrim($story->image_path, '/'));
                            @endphp
                            <img src="{{ $imageUrl }}" alt="{{ $story->title }}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                        @else
                            <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, var(--teal), #0f172a); color: rgba(255,255,255,0.2);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
                            </div>
                        @endif
                        
                        {{-- Floating Badge --}}
                        <div style="position: absolute; top: 12px; right: 12px; padding: 4px 10px; background: rgba(0,0,0,0.6); backdrop-filter: blur(8px); border-radius: 99px; border: 1px solid rgba(255,255,255,0.1); font-size: 0.6rem; font-weight: 800; color: var(--teal-l); text-transform: uppercase; letter-spacing: 0.05em;">
                            {{ $story->type === 'experience' ? 'Cerita Nyata' : 'Edukasi' }}
                        </div>
                    </div>

                    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                        <div style="width: 32px; height: 32px; background: linear-gradient(135deg, var(--teal), #0891b2); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-weight: 900; font-size: 0.8rem; color: #fff;">
                            {{ substr($story->author_name ?? 'P', 0, 1) }}
                        </div>
                        <div style="font-size: 0.8rem; color: #64748b;">
                            Oleh <span style="color: #cbd5e1; font-weight: 600;">{{ $story->author_name ?? 'Anonim' }}</span>
                        </div>
                    </div>

                    <h3 style="font-size: 1.25rem; font-weight: 900; line-height: 1.4; margin-bottom: 12px; color: #fff; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; min-height: 3.5rem;">
                        {{ $story->title }}
                    </h3>

                    <p style="color: #94a3b8; line-height: 1.6; font-size: 0.9rem; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; margin-bottom: 24px;">
                        {!! Str::limit(html_entity_decode(strip_tags(Str::markdown($story->content))), 180) !!}
                    </p>
                </div>

                <div style="display: flex; align-items: center; justify-content: flex-end; padding-top: 20px; border-top: 1px solid rgba(255,255,255,0.05);">
                    <a href="{{ route('stories.show', $story->slug) }}" style="display: inline-flex; align-items: center; gap: 6px; color: var(--teal-l); font-weight: 800; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em; text-decoration: none; transition: all 0.3s ease;">
                        Baca Kisah →
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div style="text-align: center; margin-top: 48px;">
            <a href="{{ route('stories') }}" class="btn-ghost">Baca Semua Cerita</a>
        </div>
    </div>
</section>

<div class="divider"></div>

{{-- FINAL CTA --}}
<section style="background: var(--dark); padding: 120px 32px; position: relative; overflow: hidden;">
    <div style="position: absolute; inset: 0; background: radial-gradient(ellipse at center, rgba(13,148,136,.15) 0%, transparent 70%);"></div>
    <div style="max-width: 1100px; margin: 0 auto; position: relative; z-index: 1;">
        <div class="hero-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 64px; align-items: center;">
            <div class="hero-text" style="text-align: left;">
                <div class="badge" style="margin-bottom: 32px;">Siap Melangkah?</div>
                <h2 style="font-size: clamp(2rem, 5vw, 4rem); font-weight: 900; line-height: 1.1; margin-bottom: 24px;" class="grad">Ketahanan Anda Sudah Cukup.<br>Izinkan Kami Berjuang Bersama.</h2>
                <p style="color: #94a3b8; font-size: 1.1rem; line-height: 1.8; margin-bottom: 48px;">Setiap langkah kecil menuju ketenangan itu berharga. Kami siap mendampingi Anda.</p>
                <div class="hero-btns" style="display: flex; gap: 16px; flex-wrap: wrap;">
                    <a href="{{ route('report') }}" class="btn-primary" style="font-size: 1.1rem; padding: 18px 48px;">Mulai Pengaduan</a>
                    <a href="{{ route('quiz') }}" class="btn-ghost" style="font-size: 1.1rem; padding: 18px 48px;">Cek Kondisi Jiwa</a>
                </div>
            </div>
            <div class="hero-img-col">
                <div style="position: relative; aspect-ratio: 1/1; border-radius: 40px; overflow: hidden; box-shadow: 0 40px 100px rgba(0,0,0,0.6); border: 1px solid rgba(255,255,255,0.05);">
                    <img src="/Pembebasan dari Beban.webp" alt="Ilustrasi Pembebasan dari Beban" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                </div>
            </div>
        </div>
    </div>
</section>
</main>

<script>
// Particles
(function(){
    const c = document.getElementById('particles');
    for(let i=0;i<40;i++){
        const p = document.createElement('div');
        p.className = 'particle';
        p.style.cssText = `left:${Math.random()*100}%;width:${Math.random()*3+1}px;height:${Math.random()*3+1}px;animation-duration:${Math.random()*15+10}s;animation-delay:${Math.random()*10}s;opacity:${Math.random()*.5+.1}`;
        c.appendChild(p);
    }
})();

// Counter animation
function animCount(el, target, duration){
    let start=0, step=target/((duration/16));
    const t = setInterval(()=>{
        start = Math.min(start+step, target);
        el.textContent = Math.floor(start).toLocaleString('id');
        if(start>=target) clearInterval(t);
    }, 16);
}

// Fetch live stats
fetch('/api/map-stats').then(r=>r.json()).then(data=>{
    const total = data.reduce((a,b)=>a+b.count,0);
    const verified = data.reduce((a,b)=>a+(b.verified||0),0);
    animCount(document.getElementById('cnt-reports'), total||96, 1500);
    animCount(document.getElementById('cnt-verified'), verified||26, 1500);
}).catch(()=>{
    animCount(document.getElementById('cnt-reports'), 96, 1500);
    animCount(document.getElementById('cnt-verified'), 26, 1500);
});

// Responsive bento grid
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
