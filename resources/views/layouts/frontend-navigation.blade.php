<style>
:root { --teal:#0d9488; --primary-l:#2dd4bf; --dark:#020617; --dark2:#0f172a; }
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap');

/* NAV */
.pw-nav { position: fixed; top: 0; left: 0; right: 0; z-index: 9999; height: 80px; background: rgba(2, 6, 23, 0.8); backdrop-filter: blur(20px); border-bottom: 1px solid rgba(255,255,255,.05); transition: all .4s cubic-bezier(0.4, 0, 0.2, 1); }
.pw-nav.scrolled { background: rgba(2, 6, 23, 0.95); height: 70px; border-bottom: 1px solid var(--teal); }
.pw-nav-inner { max-width: 1400px; margin: 0 auto; height: 100%; display: flex; align-items: center; justify-content: space-between; padding: 0 32px; }

/* LOGO */
.pw-logo img { height: 38px; width: auto; }

/* LINKS */
.pw-links { display: flex; align-items: center; gap: 8px; }
.pw-link { position: relative; color: #94a3b8; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; padding: 10px 16px; border-radius: 12px; text-decoration: none; transition: all .3s; display: inline-flex; align-items: center; gap: 6px; }
.pw-link:hover { color: white; background: rgba(255,255,255,.05); }
.pw-link.active { color: var(--primary-l); }
.pw-link.active::after { content: ''; position: absolute; bottom: 0; left: 16px; right: 16px; height: 2px; background: var(--teal); border-radius: 2px; }

/* DROPDOWN */
.pw-dropdown { position: relative; }
.pw-dropdown:hover .pw-dropdown-menu { opacity: 1; visibility: visible; transform: translateY(0); }
.pw-dropdown-trigger { cursor: pointer; }
.pw-dropdown-menu { position: absolute; top: 100%; left: 0; width: 280px; background: #0f172a; border: 1px solid rgba(255,255,255,.1); border-radius: 20px; padding: 12px; margin-top: 8px; opacity: 0; visibility: hidden; transform: translateY(10px); transition: all .3s cubic-bezier(0.4, 0, 0.2, 1); box-shadow: 0 20px 40px rgba(0,0,0,.4); }
.pw-dropdown-item { display: flex; align-items: center; gap: 14px; padding: 12px; border-radius: 14px; text-decoration: none; transition: all .2s; }
.pw-dropdown-item:hover { background: rgba(255,255,255,.05); }
.pw-dropdown-item .icon { width: 36px; height: 36px; background: #020617; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 1rem; color: #94a3b8; flex-shrink: 0; }
.pw-dropdown-item:hover .icon { color: var(--primary-l); }
.pw-dropdown-divider { height: 1px; background: rgba(255,255,255,.05); margin: 8px 12px; }

/* CTA */
.pw-cta { background: var(--teal); color: white; font-weight: 800; font-size: 0.8rem; text-transform: uppercase; padding: 12px 24px; border-radius: 14px; text-decoration: none; display: flex; align-items: center; gap: 8px; transition: all .3s; box-shadow: 0 10px 20px -5px rgba(13,148,136,.4); }
.pw-cta:hover { transform: translateY(-2px); box-shadow: 0 15px 30px -5px rgba(13,148,136,.6); }

/* HAMBURGER */
.pw-hamburger { display: none; width: 44px; height: 44px; border-radius: 12px; background: rgba(255,255,255,.05); border: 1px solid rgba(255,255,255,.1); align-items: center; justify-content: center; color: white; cursor: pointer; transition: all .2s; border: none; }
.pw-hamburger:hover { background: rgba(255,255,255,.1); }

/* MOBILE MENU */
.pw-mobile-menu { position: fixed; inset: 0; z-index: 10000; background: #020617; padding: 100px 32px; transform: translateX(100%); transition: transform .4s cubic-bezier(0.4, 0, 0.2, 1); overflow-y: auto; }
.pw-mobile-menu.open { transform: translateX(0); }
.pw-mobile-link { display: flex; align-items: center; gap: 16px; color: #94a3b8; font-size: 1rem; font-weight: 700; text-decoration: none; padding: 16px 0; border-bottom: 1px solid rgba(255,255,255,.05); }
.pw-mobile-link svg { color: var(--teal); flex-shrink: 0; }
.pw-mobile-link:last-child { border: none; }
.pw-mobile-section { color: #475569; font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.2em; margin-top: 32px; margin-bottom: 8px; }

@media (max-width: 1024px) {
    .pw-links { display: none; }
    .pw-hamburger { display: flex; }
    .pw-auth { display: none; }
}

/* Bottom Navigation */
.pw-bottom-nav { display: none; position: fixed; bottom: 0; left: 0; right: 0; z-index: 9998; background: rgba(15, 23, 42, 0.98); backdrop-filter: blur(20px); border-top: 1px solid rgba(255,255,255,.07); padding-bottom: env(safe-area-inset-bottom); }
.pw-bottom-nav-inner { display: flex; justify-content: space-around; align-items: center; height: 65px; padding: 0 8px; }
.pw-bottom-link { display: flex; flex-direction: column; align-items: center; justify-content: center; width: 64px; height: 100%; color: #64748b; text-decoration: none; transition: all .2s; }
.pw-bottom-link.active { color: var(--primary-l); }
.pw-bottom-link svg { width: 20px; height: 20px; margin-bottom: 4px; }
.pw-bottom-link span { font-size: 0.6rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; }

@media (max-width: 768px) {
    .pw-nav { display: none !important; }
    .pw-bottom-nav { display: block; }
    body { padding-bottom: calc(75px + env(safe-area-inset-bottom)); }
}
</style>

@if(!$is_mobile)
<nav class="pw-nav" id="pw-nav">
    <div class="pw-nav-inner">
        <a href="{{ url('/') }}" class="pw-logo">
            <img src="/pw-logo.png" alt="PinjolWatch">
        </a>

        <div class="pw-links">
            <a href="{{ url('/') }}" class="pw-link {{ request()->is('/') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:16px;height:16px;"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" /></svg>
                Beranda
            </a>

            {{-- Berita & Data --}}
            <div class="pw-dropdown">
                <span class="pw-link pw-dropdown-trigger {{ request()->routeIs('stories*') || request()->routeIs('info-pinjol') || request()->routeIs('map') || request()->routeIs('statistik') || request()->routeIs('news-feed') ? 'active' : '' }}">
                    Berita & Data
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/></svg>
                </span>
                <div class="pw-dropdown-menu">
                    <a href="{{ route('stories') }}" class="pw-dropdown-item">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:18px;height:18px;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h6m-6 4.5h6M6.75 8.25h.008v.008h-.008V8.25Zm.008 4.5h-.008v.008h.008v-.008Zm0 4.5h-.008v.008h.008v-.008Zm0-9h-.008v.008h.008V3.75Zm0 4.5h-.008v.008h.008v-.008Zm0 4.5h-.008v.008h.008v-.008ZM3 20.25V3.75A2.25 2.25 0 0 1 5.25 1.5h13.5A2.25 2.25 0 0 1 21 3.75v16.5a1.5 1.5 0 0 1-1.5 1.5H4.5a1.5 1.5 0 0 1-1.5-1.5Z" /></svg></div>
                        <div><div style="color:#e2e8f0;font-weight:700;font-size:0.85rem;">Cerita Kita</div><div style="font-size:.7rem;color:#64748b;">Pengalaman korban pinjol</div></div>
                    </a>
                    <a href="{{ route('news-feed') }}" class="pw-dropdown-item">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:18px;height:18px;"><path stroke-linecap="round" stroke-linejoin="round" d="M9.348 14.651a3.75 3.75 0 0 1 0-5.303m5.304 0a3.75 3.75 0 0 1 0 5.303m-7.425 2.122a6.75 6.75 0 0 1 0-9.546m9.546 0a6.75 6.75 0 0 1 0 9.546M5.106 18.894c-3.808-3.807-3.808-9.98 0-13.788m13.788 0c3.808 3.807 3.808 9.98 0 13.788M12 12h.008v.008H12V12Z" /></svg></div>
                        <div><div style="color:#e2e8f0;font-weight:700;font-size:0.85rem;">Update Berita</div><div style="font-size:.7rem;color:#64748b;">Kabar industri & regulasi</div></div>
                    </a>
                    <div class="pw-dropdown-divider"></div>
                    <a href="{{ route('info-pinjol') }}" class="pw-dropdown-item">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:18px;height:18px;"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .415.139.778.376 1.056a2.433 2.433 0 0 1-.996 1.991m-1.147-3.71c-.065.21-.1.433-.1.664 0 .415.139.778.376 1.056a2.433 2.433 0 0 1-.996 1.991m-1.147-3.71C7.67 4.05 6.75 4.946 6.75 6.108V18a2.25 2.25 0 0 0 2.25 2.25h.75m0-18.75h.75m0 18.75h.75" /></svg></div>
                        <div><div style="color:#e2e8f0;font-weight:700;font-size:0.85rem;">Direktori Pinjol</div><div style="font-size:.7rem;color:#64748b;">Daftar platform legal OJK</div></div>
                    </a>
                    <a href="{{ route('map') }}" class="pw-dropdown-item">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:18px;height:18px;"><path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.446 4.874-2.437c.381-.19.623-.579.623-.976V4.208c0-.483-.403-.883-.87-.814a48.226 48.226 0 0 0-4.605.515 48.243 48.243 0 0 1-4.605.515 48.222 48.222 0 0 0-4.605-.515c-.467-.069-.87.331-.87.814v11.585c0 .397.242.786.623.976l4.874 2.437m0 0a11.215 11.215 0 0 1 4.542-1.158m-4.542 1.158v-8.11" /></svg></div>
                        <div><div style="color:#e2e8f0;font-weight:700;font-size:0.85rem;">Peta Sebaran</div><div style="font-size:.7rem;color:#64748b;">Titik aduan nasional</div></div>
                    </a>
                    <a href="{{ route('statistik') }}" class="pw-dropdown-item">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:18px;height:18px;"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V19.875c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" /></svg></div>
                        <div><div style="color:#e2e8f0;font-weight:700;font-size:0.85rem;">Statistik</div><div style="font-size:.7rem;color:#64748b;">Data & tren pinjol</div></div>
                    </a>
                </div>
            </div>

            {{-- Literasi --}}
            <div class="pw-dropdown">
                <span class="pw-link pw-dropdown-trigger {{ request()->routeIs('panduan-dc') || request()->routeIs('bahaya-joki') || request()->routeIs('panduan-keuangan') || request()->routeIs('kalkulator-gltl') || request()->routeIs('download') ? 'active' : '' }}">
                    Literasi
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/></svg>
                </span>
                <div class="pw-dropdown-menu">
                    <a href="{{ route('panduan-dc') }}" class="pw-dropdown-item">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:18px;height:18px;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" /></svg></div>
                        <div><div style="color:#e2e8f0;font-weight:700;font-size:0.85rem;">Menghadapi DC</div><div style="font-size:.7rem;color:#64748b;">Protokol hukum & darurat</div></div>
                    </a>
                    <a href="{{ route('bahaya-joki') }}" class="pw-dropdown-item">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:18px;height:18px;"><path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L5.636 5.636" /></svg></div>
                        <div><div style="color:#e2e8f0;font-weight:700;font-size:0.85rem;">Bahaya Joki</div><div style="font-size:.7rem;color:#64748b;">Waspada penipuan joki</div></div>
                    </a>
                    <a href="{{ route('kalkulator-gltl') }}" class="pw-dropdown-item">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:18px;height:18px;"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" /></svg></div>
                        <div><div style="color:#e2e8f0;font-weight:700;font-size:0.85rem;">Simulasi GLTL</div><div style="font-size:.7rem;color:#64748b;">Gali Lobang Tutup Lobang</div></div>
                    </a>
                    <div class="pw-dropdown-divider"></div>
                    <a href="{{ route('panduan-keuangan') }}" class="pw-dropdown-item">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:18px;height:18px;"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m-.921 1.612 1.271-1.271A1.125 1.125 0 0 0 21.321 6l-1.271 1.271" /></svg></div>
                        <div><div style="color:#e2e8f0;font-weight:700;font-size:0.85rem;">Pemulihan Ekonomi</div><div style="font-size:.7rem;color:#64748b;">Langkah bebas hutang</div></div>
                    </a>
                    <a href="{{ route('download') }}" class="pw-dropdown-item">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:18px;height:18px;"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" /></svg></div>
                        <div><div style="color:#e2e8f0;font-weight:700;font-size:0.85rem;">Materi Literasi</div><div style="font-size:.7rem;color:#64748b;">Unduh PDF & template</div></div>
                    </a>
                </div>
            </div>

            {{-- Kesehatan Mental --}}
            <div class="pw-dropdown">
                <span class="pw-link pw-dropdown-trigger {{ request()->routeIs('quiz') || request()->routeIs('mental-health-directory') || request()->routeIs('panduan-keluarga') || request()->routeIs('anti-stigma') ? 'active' : '' }}">
                    Kesehatan Mental
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/></svg>
                </span>
                <div class="pw-dropdown-menu">
                    <a href="{{ route('quiz') }}" class="pw-dropdown-item">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:18px;height:18px;"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A44.714 44.714 0 0 1 12 13.712a44.715 44.714 0 0 1 7.741-3.565m-7.741 3.565V21" /></svg></div>
                        <div><div style="color:#e2e8f0;font-weight:700;font-size:0.85rem;">Cek Psikologi</div><div style="font-size:.7rem;color:#64748b;">Tes kesehatan mental gratis</div></div>
                    </a>
                    <a href="{{ route('mental-health-directory') }}" class="pw-dropdown-item">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:18px;height:18px;"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.25 0 1 1-5.25 0 2.625 2.25 0 0 1 5.25 0Z" /></svg></div>
                        <div><div style="color:#e2e8f0;font-weight:700;font-size:0.85rem;">Direktori Bantuan</div><div style="font-size:.7rem;color:#64748b;">Layanan profesional mental</div></div>
                    </a>
                    <div class="pw-dropdown-divider"></div>
                    <a href="{{ route('panduan-keluarga') }}" class="pw-dropdown-item">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:18px;height:18px;"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" /></svg></div>
                        <div><div style="color:#e2e8f0;font-weight:700;font-size:0.85rem;">Panduan Keluarga</div><div style="font-size:.7rem;color:#64748b;">Cara dukung orang terkasih</div></div>
                    </a>
                    <a href="{{ route('anti-stigma') }}" class="pw-dropdown-item">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:18px;height:18px;"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a5.971 5.971 0 0 0-.941 3.197m12 0a5.971 5.971 0 0 0-.941-3.197M12 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" /></svg></div>
                        <div><div style="color:#e2e8f0;font-weight:700;font-size:0.85rem;">Anti-Stigma</div><div style="font-size:.7rem;color:#64748b;">Menghapus rasa malu</div></div>
                    </a>
                </div>
            </div>

            {{-- Laporan --}}
            <div class="pw-dropdown">
                <span class="pw-link pw-dropdown-trigger {{ request()->routeIs('report') || request()->routeIs('track') || request()->routeIs('dashboard.tools') ? 'active' : '' }}">
                    Laporan
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/></svg>
                </span>
                <div class="pw-dropdown-menu">
                    <a href="{{ route('report') }}" class="pw-dropdown-item">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:18px;height:18px;"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751A11.959 11.959 0 0 1 12 2.714Z" /></svg></div>
                        <div><div style="color:#e2e8f0;font-weight:700;font-size:0.85rem;">Buat Laporan</div><div style="font-size:.7rem;color:#64748b;">Aduan anonim & aman</div></div>
                    </a>
                    <a href="{{ route('track') }}" class="pw-dropdown-item">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:18px;height:18px;"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.375c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" /></svg></div>
                        <div><div style="color:#e2e8f0;font-weight:700;font-size:0.85rem;">Lacak Tiket</div><div style="font-size:.7rem;color:#64748b;">Pantau progres aduan</div></div>
                    </a>
                    <a href="{{ route('dashboard.tools') }}" class="pw-dropdown-item">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:18px;height:18px;"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12a7.5 7.5 0 0 0 15 0m-15 0a7.5 7.5 0 1 1 15 0m-15 0H3m16.5 0H21m-7.5 0V3.375m0 17.25V21M8.25 8.25l.008-.008M15.75 15.75l.008-.008M8.25 15.75l.008-.008M15.75 8.25l.008-.008" /></svg></div>
                        <div><div style="color:#e2e8f0;font-weight:700;font-size:0.85rem;">Pusat Alat</div><div style="font-size:.7rem;color:#64748b;">Bantuan teknis korban</div></div>
                    </a>
                </div>
            </div>

            {{-- Info --}}
            <div class="pw-dropdown">
                <span class="pw-link pw-dropdown-trigger {{ request()->routeIs('about') || request()->routeIs('disclaimer') || request()->routeIs('privacy.policy') ? 'active' : '' }}">
                    Info
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/></svg>
                </span>
                <div class="pw-dropdown-menu">
                    <a href="{{ route('about') }}" class="pw-dropdown-item">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:18px;height:18px;"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 1 1 .518 1.407l-.041.02a.75.75 0 1 1-.518-1.407zM11.25 15.75l.041-.02a.75.75 0 1 1 .518 1.407l-.041.02a.75.75 0 1 1-.518-1.407zM12 18.75a6.75 6.75 0 1 0 0-13.5 6.75 6.75 0 0 0 0 13.5zM2.25 12c0 5.385 4.365 9.75 9.75 9.75s9.75-4.365 9.75-9.75S17.385 2.25 12 2.25 2.25 6.615 2.25 12z" /></svg></div>
                        <div><div style="color:#e2e8f0;font-weight:700;font-size:0.85rem;">Tentang Kami</div><div style="font-size:.7rem;color:#64748b;">Misi PinjolWatch</div></div>
                    </a>
                    <a href="{{ route('privacy.policy') }}" class="pw-dropdown-item">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:18px;height:18px;"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" /></svg></div>
                        <div><div style="color:#e2e8f0;font-weight:700;font-size:0.85rem;">Privasi Data</div><div style="font-size:.7rem;color:#64748b;">Sesuai UU PDP</div></div>
                    </a>
                    <a href="{{ route('join') }}" class="pw-dropdown-item">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:18px;height:18px;"><path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" /></svg></div>
                        <div><div style="color:#e2e8f0;font-weight:700;font-size:0.85rem;">Jadi Relawan</div><div style="font-size:.7rem;color:#64748b;">Bantu sesama korban</div></div>
                    </a>
                </div>
            </div>
        </div>

        {{-- Auth & CTA --}}
        <div style="display:flex;align-items:center;gap:16px;">
            <div class="pw-auth">
                @auth
                    <a href="{{ route('dashboard') }}" style="color:#94a3b8;font-size:.85rem;font-weight:600;text-decoration:none;">Dasbor</a>
                @else
                    <a href="{{ route('login') }}" style="color:#94a3b8;font-size:.85rem;font-weight:600;text-decoration:none;">Masuk</a>
                @endauth
            </div>
            <a href="{{ route('report') }}" class="pw-cta">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:16px;height:16px;"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751A11.959 11.959 0 0 1 12 2.714Z" /></svg>
                Lapor
            </a>
            <button class="pw-hamburger" onclick="toggleMobileMenu()">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>
            </button>
        </div>
    </div>
</nav>
@endif

{{-- Mobile --}}
<div class="pw-mobile-menu" id="pw-mobile-menu">
    <div class="pw-mobile-section">Berita & Data</div>
    <a href="{{ route('stories') }}" class="pw-mobile-link"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:22px;height:22px;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h6m-6 4.5h6M6.75 8.25h.008v.008h-.008V8.25Zm.008 4.5h-.008v.008h.008v-.008Zm0 4.5h-.008v.008h.008v-.008Zm0-9h-.008v.008h.008V3.75Zm0 4.5h-.008v.008h.008v-.008Zm0 4.5h-.008v.008h.008v-.008ZM3 20.25V3.75A2.25 2.25 0 0 1 5.25 1.5h13.5A2.25 2.25 0 0 1 21 3.75v16.5a1.5 1.5 0 0 1-1.5 1.5H4.5a1.5 1.5 0 0 1-1.5-1.5Z" /></svg> Cerita Kita</a>
    <a href="{{ route('news-feed') }}" class="pw-mobile-link"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:22px;height:22px;"><path stroke-linecap="round" stroke-linejoin="round" d="M9.348 14.651a3.75 3.75 0 0 1 0-5.303m5.304 0a3.75 3.75 0 0 1 0 5.303m-7.425 2.122a6.75 6.75 0 0 1 0-9.546m9.546 0a6.75 6.75 0 0 1 0 9.546M5.106 18.894c-3.808-3.807-3.808-9.98 0-13.788m13.788 0c3.808 3.807 3.808 9.98 0 13.788M12 12h.008v.008H12V12Z" /></svg> Update Berita</a>
    <a href="{{ route('info-pinjol') }}" class="pw-mobile-link"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:22px;height:22px;"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .415.139.778.376 1.056a2.433 2.433 0 0 1-.996 1.991m-1.147-3.71c-.065.21-.1.433-.1.664 0 .415.139.778.376 1.056a2.433 2.433 0 0 1-.996 1.991m-1.147-3.71C7.67 4.05 6.75 4.946 6.75 6.108V18a2.25 2.25 0 0 0 2.25 2.25h.75m0-18.75h.75m0 18.75h.75" /></svg> Direktori Pinjol</a>
    
    <div class="pw-mobile-section">Literasi & Edukasi</div>
    <a href="{{ route('panduan-dc') }}" class="pw-mobile-link"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:22px;height:22px;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" /></svg> Menghadapi DC</a>
    <a href="{{ route('kalkulator-gltl') }}" class="pw-mobile-link"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:22px;height:22px;"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" /></svg> Simulasi GLTL</a>
    <a href="{{ route('download') }}" class="pw-mobile-link"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:22px;height:22px;"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" /></svg> Unduh Materi</a>

    <div class="pw-mobile-section">Kesehatan Mental</div>
    <a href="{{ route('quiz') }}" class="pw-mobile-link"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:22px;height:22px;"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A44.714 44.714 0 0 1 12 13.712a44.715 44.714 0 0 1 7.741-3.565m-7.741 3.565V21" /></svg> Cek Psikologi</a>
    
    <div style="height:1px;background:rgba(255,255,255,.07);margin:24px 0;"></div>
    @auth
        <a href="{{ route('dashboard') }}" class="pw-mobile-link"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:22px;height:22px;"><path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /></svg> Dasbor</a>
        <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="pw-mobile-link" style="width:100%;text-align:left;background:none;border:none;cursor:pointer;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:22px;height:22px;"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" /></svg> Keluar</button></form>
    @else
        <a href="{{ route('login') }}" class="pw-mobile-link">Masuk</a>
        <a href="{{ route('register') }}" class="pw-mobile-link">Daftar</a>
    @endauth
</div>

{{-- Bottom Nav --}}
<nav class="pw-bottom-nav">
    <div class="pw-bottom-nav-inner">
        <a href="{{ url('/') }}" class="pw-bottom-link {{ request()->is('/') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" /></svg>
            <span>Home</span>
        </a>
        <a href="{{ route('report') }}" class="pw-bottom-link {{ request()->routeIs('report') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751A11.959 11.959 0 0 1 12 2.714Z" /></svg>
            <span>Lapor</span>
        </a>
        <a href="{{ route('kalkulator-gltl') }}" class="pw-bottom-link {{ request()->routeIs('kalkulator-gltl') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" /></svg>
            <span>Simulasi</span>
        </a>
        <a href="{{ route('stories') }}" class="pw-bottom-link {{ request()->routeIs('stories*') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h6m-6 4.5h6M6.75 8.25h.008v.008h-.008V8.25Zm.008 4.5h-.008v.008h.008v-.008Zm0 4.5h-.008v.008h.008v-.008Zm0-9h-.008v.008h.008V3.75Zm0 4.5h-.008v.008h.008v-.008Zm0 4.5h-.008v.008h.008v-.008ZM3 20.25V3.75A2.25 2.25 0 0 1 5.25 1.5h13.5A2.25 2.25 0 0 1 21 3.75v16.5a1.5 1.5 0 0 1-1.5 1.5H4.5a1.5 1.5 0 0 1-1.5-1.5Z" /></svg>
            <span>Cerita</span>
        </a>
        @auth
            <a href="{{ route('dashboard') }}" class="pw-bottom-link">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /></svg>
                <span>Profil</span>
            </a>
        @else
            <a href="{{ route('login') }}" class="pw-bottom-link">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" /></svg>
                <span>Masuk</span>
            </a>
        @endauth
    </div>
</nav>

<script>
window.addEventListener('scroll', () => {
    const nav = document.getElementById('pw-nav');
    if(nav) nav.classList.toggle('scrolled', window.scrollY > 20);
});
function toggleMobileMenu() {
    const menu = document.getElementById('pw-mobile-menu');
    if(menu) menu.classList.toggle('open');
}
</script>
