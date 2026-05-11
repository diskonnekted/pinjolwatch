<style>
:root { --teal:#0d9488; --teal-l:#2dd4bf; --dark:#020617; --dark2:#0f172a; }
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap');

/* NAV */
.pw-nav { position: fixed; top: 0; left: 0; right: 0; z-index: 9999; background: rgba(2,6,23,.85); backdrop-filter: blur(20px); border-bottom: 1px solid rgba(255,255,255,.07); font-family: 'Inter', sans-serif; transition: all .3s; }
.pw-nav.scrolled { background: rgba(2,6,23,.97); box-shadow: 0 4px 30px rgba(0,0,0,.4); }
.pw-nav-inner { max-width: 1280px; margin: 0 auto; padding: 0 32px; display: flex; align-items: center; justify-content: space-between; height: 64px; }
.pw-logo img { height: 42px; width: auto; display: block; }

/* Desktop nav links */
.pw-links { display: flex; align-items: center; gap: 4px; }
.pw-link { padding: 8px 14px; border-radius: 8px; color: #94a3b8; font-weight: 600; font-size: .875rem; text-decoration: none; transition: all .2s; white-space: nowrap; }
.pw-link:hover, .pw-link.active { color: #f1f5f9; background: rgba(255,255,255,.07); }
.pw-link.active { color: var(--teal-l); }

/* Dropdown wrapper */
.pw-dropdown { position: relative; }
.pw-dropdown-trigger { display: flex; align-items: center; gap: 4px; cursor: pointer; }
.pw-dropdown-trigger svg { transition: transform .2s; }
.pw-dropdown:hover .pw-dropdown-trigger svg { transform: rotate(180deg); }

/* Dropdown menu */
.pw-dropdown-menu { position: absolute; top: calc(100% + 8px); left: 0; min-width: 220px; background: rgba(15,23,42,.97); border: 1px solid rgba(255,255,255,.1); border-radius: 14px; padding: 8px; opacity: 0; pointer-events: none; transform: translateY(-8px); transition: all .2s ease; box-shadow: 0 20px 60px rgba(0,0,0,.5); }
.pw-dropdown-menu::before { content: ''; position: absolute; top: -12px; left: 0; right: 0; height: 12px; }
.pw-dropdown:hover .pw-dropdown-menu { opacity: 1; pointer-events: all; transform: translateY(0); }
.pw-dropdown-item { display: flex; align-items: center; gap: 12px; padding: 10px 14px; border-radius: 10px; color: #94a3b8; font-weight: 600; font-size: .85rem; text-decoration: none; transition: all .2s; }
.pw-dropdown-item:hover { background: rgba(255,255,255,.07); color: #f1f5f9; }
.pw-dropdown-item .icon { width: 32px; height: 32px; background: rgba(13,148,136,.15); border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: .9rem; }

/* CTA button */
.pw-cta { padding: 9px 20px; background: linear-gradient(135deg, var(--teal), #0891b2); color: #fff; font-weight: 700; font-size: .85rem; border-radius: 10px; text-decoration: none; transition: all .2s; white-space: nowrap; box-shadow: 0 0 20px rgba(13,148,136,.3); }
.pw-cta:hover { transform: translateY(-1px); box-shadow: 0 0 30px rgba(13,148,136,.5); }

/* Auth links */
.pw-auth { display: flex; align-items: center; gap: 12px; }
.pw-auth a { color: #64748b; font-size: .85rem; font-weight: 600; text-decoration: none; transition: color .2s; }
.pw-auth a:hover { color: #e2e8f0; }

/* Divider in dropdown */
.pw-dropdown-divider { height: 1px; background: rgba(255,255,255,.07); margin: 6px 0; }

/* Mobile hamburger */
.pw-hamburger { display: none; background: none; border: none; cursor: pointer; padding: 8px; color: #94a3b8; }
.pw-mobile-menu { display: none; position: fixed; top: 64px; left: 0; right: 0; background: rgba(2,6,23,.98); border-bottom: 1px solid rgba(255,255,255,.07); padding: 16px; z-index: 9998; }
.pw-mobile-menu.open { display: block; }
.pw-mobile-link { display: block; padding: 12px 16px; color: #94a3b8; font-weight: 600; font-size: .95rem; text-decoration: none; border-radius: 10px; margin-bottom: 4px; }
.pw-mobile-link:hover { background: rgba(255,255,255,.07); color: #f1f5f9; }
.pw-mobile-section { font-size: .7rem; font-weight: 700; color: #475569; text-transform: uppercase; letter-spacing: .1em; padding: 12px 16px 4px; }

@media (max-width: 1024px) {
    .pw-links { display: none; }
    .pw-hamburger { display: flex; }
    .pw-auth { display: none; }
}

/* Bottom Navigation */
.pw-bottom-nav { display: none; position: fixed; bottom: 0; left: 0; right: 0; z-index: 9998; background: rgba(15, 23, 42, 0.95); backdrop-filter: blur(20px); border-top: 1px solid rgba(255,255,255,.07); padding-bottom: env(safe-area-inset-bottom); }
.pw-bottom-nav-inner { display: flex; justify-content: space-around; align-items: center; height: 60px; padding: 0 8px; }
.pw-bottom-link { display: flex; flex-direction: column; align-items: center; justify-content: center; width: 64px; height: 100%; color: #64748b; text-decoration: none; transition: all .2s; }
.pw-bottom-link.active { color: var(--teal-l); }
.pw-bottom-link svg { width: 22px; height: 22px; margin-bottom: 3px; }
.pw-bottom-link span { font-size: 0.65rem; font-weight: 600; }

@media (max-width: 768px) {
    .pw-bottom-nav { display: block; }
    body { padding-bottom: calc(60px + env(safe-area-inset-bottom)); }
}
</style>

<nav class="pw-nav" id="pw-nav">
    <div class="pw-nav-inner">
        {{-- Logo --}}
        <a href="{{ url('/') }}" class="pw-logo">
            <img src="/pw-logo.png" alt="PinjolWatch">
        </a>

        {{-- Desktop Links --}}
        <div class="pw-links">
            {{-- Artikel --}}
            <a href="{{ route('stories') }}" class="pw-link {{ request()->routeIs('stories*') ? 'active' : '' }}">Artikel</a>

            {{-- Info Pinjol --}}
            <a href="{{ route('info-pinjol') }}" class="pw-link {{ request()->routeIs('info-pinjol') ? 'active' : '' }}">Info Pinjol</a>

            {{-- Peta Sebaran --}}
            <a href="{{ route('map') }}" class="pw-link {{ request()->routeIs('map') ? 'active' : '' }}">Peta Sebaran</a>

            {{-- Laporan dropdown --}}
            <div class="pw-dropdown">
                <span class="pw-link pw-dropdown-trigger {{ request()->routeIs('report') || request()->routeIs('track') ? 'active' : '' }}">
                    Laporan
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/></svg>
                </span>
                <div class="pw-dropdown-menu">
                    <a href="{{ route('report') }}" class="pw-dropdown-item">
                        <div class="icon">🛡️</div>
                        <div>
                            <div style="color:#e2e8f0;font-weight:700;">Lapor Kasus</div>
                            <div style="font-size:.75rem;color:#64748b;">Buat pengaduan anonim</div>
                        </div>
                    </a>
                    <a href="{{ route('track') }}" class="pw-dropdown-item">
                        <div class="icon">🎫</div>
                        <div>
                            <div style="color:#e2e8f0;font-weight:700;">Cek Tiket</div>
                            <div style="font-size:.75rem;color:#64748b;">Pantau status laporan</div>
                        </div>
                    </a>
                </div>
            </div>

            {{-- Bantuan dropdown --}}
            <div class="pw-dropdown">
                <span class="pw-link pw-dropdown-trigger {{ request()->routeIs('quiz') || request()->routeIs('panduan-keluarga') ? 'active' : '' }}">
                    Bantuan
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/></svg>
                </span>
                <div class="pw-dropdown-menu">
                    <a href="{{ route('quiz') }}" class="pw-dropdown-item">
                        <div class="icon">🧠</div>
                        <div>
                            <div style="color:#e2e8f0;font-weight:700;">Cek Kesehatan Jiwa</div>
                            <div style="font-size:.75rem;color:#64748b;">Tes psikologis gratis K10</div>
                        </div>
                    </a>
                    <a href="{{ route('panduan-keluarga') }}" class="pw-dropdown-item">
                        <div class="icon">💚</div>
                        <div>
                            <div style="color:#e2e8f0;font-weight:700;">Panduan Keluarga</div>
                            <div style="font-size:.75rem;color:#64748b;">Cara mendukung korban</div>
                        </div>
                    </a>
                    <a href="{{ route('panduan-dc') }}" class="pw-dropdown-item">
                        <div class="icon">🚨</div>
                        <div>
                            <div style="color:#e2e8f0;font-weight:700;">Menghadapi DC</div>
                            <div style="font-size:.75rem;color:#64748b;">Protokol darurat & hukum</div>
                        </div>
                    </a>
                    <a href="{{ route('anti-stigma') }}" class="pw-dropdown-item">
                        <div class="icon">🤝</div>
                        <div>
                            <div style="color:#e2e8f0;font-weight:700;">Anti-Stigma</div>
                            <div style="font-size:.75rem;color:#64748b;">Pahami realita korban pinjol</div>
                        </div>
                    </a>
                    <a href="{{ route('panduan-keuangan') }}" class="pw-dropdown-item">
                        <div class="icon">📈</div>
                        <div>
                            <div style="color:#e2e8f0;font-weight:700;">Pemulihan Keuangan</div>
                            <div style="font-size:.75rem;color:#64748b;">Langkah stabilisasi ekonomi</div>
                        </div>
                    </a>
                    <a href="{{ route('bahaya-joki') }}" class="pw-dropdown-item">
                        <div class="icon">🛑</div>
                        <div>
                            <div style="color:#e2e8f0;font-weight:700;">Bahaya Joki Palsu</div>
                            <div style="font-size:.75rem;color:#64748b;">Hindari jebakan penipu</div>
                        </div>
                    </a>
                    <div class="pw-dropdown-divider"></div>
                    <a href="tel:119" class="pw-dropdown-item">
                        <div class="icon">📞</div>
                        <div>
                            <div style="color:#e2e8f0;font-weight:700;">Hotline 119 ext.8</div>
                            <div style="font-size:.75rem;color:#64748b;">Bantuan psikologis cepat</div>
                        </div>
                    </a>
                </div>
            </div>

            {{-- Info dropdown --}}
            <div class="pw-dropdown">
                <span class="pw-link pw-dropdown-trigger {{ request()->routeIs('about') || request()->routeIs('disclaimer') || request()->routeIs('privacy.policy') ? 'active' : '' }}">
                    Info
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/></svg>
                </span>
                <div class="pw-dropdown-menu">
                    <a href="{{ route('about') }}" class="pw-dropdown-item">
                        <div class="icon">🌐</div>
                        <div>
                            <div style="color:#e2e8f0;font-weight:700;">Tentang Kami</div>
                            <div style="font-size:.75rem;color:#64748b;">Misi & Visi PinjolWatch</div>
                        </div>
                    </a>
                    <a href="{{ route('disclaimer') }}" class="pw-dropdown-item">
                        <div class="icon">⚖️</div>
                        <div>
                            <div style="color:#e2e8f0;font-weight:700;">Disclaimer</div>
                            <div style="font-size:.75rem;color:#64748b;">Batasan tanggung jawab</div>
                        </div>
                    </a>
                    <a href="{{ route('privacy.policy') }}" class="pw-dropdown-item">
                        <div class="icon">🔒</div>
                        <div>
                            <div style="color:#e2e8f0;font-weight:700;">Kebijakan Privasi</div>
                            <div style="font-size:.75rem;color:#64748b;">UU PDP & perlindungan data</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        {{-- Right side: Auth + CTA --}}
        <div style="display:flex;align-items:center;gap:16px;">
            <div class="pw-auth">
                @auth
                    <a href="{{ route('dashboard') }}" style="color:#94a3b8;font-size:.85rem;font-weight:600;text-decoration:none;">{{ Auth::user()->name }}</a>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit" style="background:none;border:none;color:#64748b;font-size:.85rem;font-weight:600;cursor:pointer;">Keluar</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" style="color:#94a3b8;font-size:.85rem;font-weight:600;text-decoration:none;">Masuk</a>
                @endauth
            </div>
            <a href="{{ route('report') }}" class="pw-cta">🛡️ Lapor Sekarang</a>
            <button class="pw-hamburger" id="pw-hamburger" onclick="toggleMobileMenu()">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>
            </button>
        </div>
    </div>
</nav>

{{-- Mobile menu --}}
<div class="pw-mobile-menu" id="pw-mobile-menu">
    <div class="pw-mobile-section">Konten</div>
    <a href="{{ route('stories') }}" class="pw-mobile-link">📰 Artikel</a>
    <a href="{{ route('info-pinjol') }}" class="pw-mobile-link">📋 Info Pinjol</a>
    <a href="{{ route('map') }}" class="pw-mobile-link">🗺️ Peta Sebaran</a>
    <div class="pw-mobile-section">Laporan</div>
    <a href="{{ route('report') }}" class="pw-mobile-link">🛡️ Lapor Kasus</a>
    <a href="{{ route('track') }}" class="pw-mobile-link">🎫 Cek Tiket</a>
    <div class="pw-mobile-section">Bantuan</div>
    <a href="{{ route('quiz') }}" class="pw-mobile-link">🧠 Cek Kesehatan Jiwa</a>
    <a href="{{ route('panduan-keluarga') }}" class="pw-mobile-link">💚 Panduan Keluarga</a>
    <a href="{{ route('panduan-dc') }}" class="pw-mobile-link">🚨 Menghadapi DC</a>
    <a href="{{ route('anti-stigma') }}" class="pw-mobile-link">🤝 Anti-Stigma</a>
    <a href="{{ route('panduan-keuangan') }}" class="pw-mobile-link">📈 Pemulihan Keuangan</a>
    <a href="{{ route('bahaya-joki') }}" class="pw-mobile-link">🛑 Bahaya Joki Palsu</a>
    <a href="tel:119" class="pw-mobile-link">📞 Hotline 119 ext.8</a>
    <div class="pw-mobile-section">Info</div>
    <a href="{{ route('about') }}" class="pw-mobile-link">🌐 Tentang Kami</a>
    <a href="{{ route('disclaimer') }}" class="pw-mobile-link">⚖️ Disclaimer</a>
    <a href="{{ route('privacy.policy') }}" class="pw-mobile-link">🔒 Kebijakan Privasi</a>
    <div style="height:1px;background:rgba(255,255,255,.07);margin:12px 0;"></div>
    @auth
        <a href="{{ route('dashboard') }}" class="pw-mobile-link">Dashboard</a>
    @else
        <a href="{{ route('login') }}" class="pw-mobile-link">Masuk</a>
        <a href="{{ route('register') }}" class="pw-mobile-link">Daftar</a>
    @endauth
</div>

{{-- Bottom Navigation (Mobile) --}}
<nav class="pw-bottom-nav">
    <div class="pw-bottom-nav-inner">
        <a href="{{ url('/') }}" class="pw-bottom-link {{ request()->is('/') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
            <span>Beranda</span>
        </a>
        <a href="{{ route('map') }}" class="pw-bottom-link {{ request()->routeIs('map') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
            </svg>
            <span>Peta</span>
        </a>
        <a href="{{ route('report') }}" class="pw-bottom-link {{ request()->routeIs('report') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
            </svg>
            <span>Lapor</span>
        </a>
        <button onclick="toggleMobileMenu()" class="pw-bottom-link" style="background:none;border:none;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <span>Menu</span>
        </button>
    </div>
</nav>

<script>
window.addEventListener('scroll', () => {
    document.getElementById('pw-nav').classList.toggle('scrolled', window.scrollY > 20);
});
function toggleMobileMenu() {
    document.getElementById('pw-mobile-menu').classList.toggle('open');
}
</script>
