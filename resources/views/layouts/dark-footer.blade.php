@php
// Shared dark footer partial
@endphp
<footer style="background:#0f172a;border-top:1px solid rgba(255,255,255,.07);font-family:'Inter',sans-serif;">
    <div style="max-width:1280px;margin:0 auto;padding:64px 32px 40px;">
        <div style="display:grid;grid-template-columns:2fr 1fr 1fr 1fr;gap:48px;margin-bottom:48px;">
            <div>
                <img src="/pw-logo.png" alt="PinjolWatch" style="height:72px;margin-bottom:16px;filter: brightness(0) invert(1);">
                <p style="color:#64748b;font-size:.875rem;line-height:1.75;max-width:280px;">Platform pengaduan masyarakat independen. Fokus pada perlindungan data, transparansi, dan pemulihan mental korban teror pinjol ilegal.</p>
                <div style="display:flex;gap:12px;margin-top:20px;">
                    <a href="tel:119" style="display:inline-flex;align-items:center;gap:6px;padding:8px 14px;background:rgba(220,38,38,.15);border:1px solid rgba(220,38,38,.3);color:#fca5a5;border-radius:8px;font-size:.75rem;font-weight:700;text-decoration:none;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:14px;height:14px;"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" /></svg>
                        119 ext.8
                    </a>
                    <a href="tel:110" style="display:inline-flex;align-items:center;gap:6px;padding:8px 14px;background:rgba(13,148,136,.15);border:1px solid rgba(45,212,191,.3);color:#5eead4;border-radius:8px;font-size:.75rem;font-weight:700;text-decoration:none;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:14px;height:14px;"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" /></svg>
                        110 Polri
                    </a>
                </div>
            </div>
            <div>
                <h5 style="color:#e2e8f0;font-weight:700;font-size:.875rem;text-transform:uppercase;letter-spacing:.08em;margin-bottom:16px;">Navigasi</h5>
                <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:10px;">
                    <li><a href="{{ route('stories') }}" style="color:#64748b;font-size:.875rem;text-decoration:none;transition:color .2s;" onmouseover="this.style.color='#e2e8f0'" onmouseout="this.style.color='#64748b'">Artikel</a></li>
                    <li><a href="{{ route('info-pinjol') }}" style="color:#64748b;font-size:.875rem;text-decoration:none;" onmouseover="this.style.color='#e2e8f0'" onmouseout="this.style.color='#64748b'">Info Pinjol</a></li>
                    <li><a href="{{ route('map') }}" style="color:#64748b;font-size:.875rem;text-decoration:none;" onmouseover="this.style.color='#e2e8f0'" onmouseout="this.style.color='#64748b'">Peta Sebaran</a></li>
                    <li><a href="{{ route('report') }}" style="color:#64748b;font-size:.875rem;text-decoration:none;" onmouseover="this.style.color='#e2e8f0'" onmouseout="this.style.color='#64748b'">Lapor Kasus</a></li>
                    <li><a href="{{ route('track') }}" style="color:#64748b;font-size:.875rem;text-decoration:none;" onmouseover="this.style.color='#e2e8f0'" onmouseout="this.style.color='#64748b'">Cek Tiket</a></li>
                    <li><a href="{{ route('join') }}" style="color:#64748b;font-size:.875rem;text-decoration:none;" onmouseover="this.style.color='#e2e8f0'" onmouseout="this.style.color='#64748b'">Gabung Relawan</a></li>
                </ul>
            </div>
            <div>
                <h5 style="color:#e2e8f0;font-weight:700;font-size:.875rem;text-transform:uppercase;letter-spacing:.08em;margin-bottom:16px;">Bantuan</h5>
                <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:10px;">
                    <li><a href="{{ route('quiz') }}" style="color:#64748b;font-size:.875rem;text-decoration:none;" onmouseover="this.style.color='#e2e8f0'" onmouseout="this.style.color='#64748b'">Cek Kesehatan Jiwa</a></li>
                    <li><a href="{{ route('panduan-keluarga') }}" style="color:#64748b;font-size:.875rem;text-decoration:none;" onmouseover="this.style.color='#e2e8f0'" onmouseout="this.style.color='#64748b'">Panduan Keluarga</a></li>
                    <li><a href="{{ route('privacy.policy') }}" style="color:#64748b;font-size:.875rem;text-decoration:none;" onmouseover="this.style.color='#e2e8f0'" onmouseout="this.style.color='#64748b'">Kebijakan Privasi</a></li>
                </ul>
            </div>
            <div>
                <h5 style="color:#e2e8f0;font-weight:700;font-size:.875rem;text-transform:uppercase;letter-spacing:.08em;margin-bottom:16px;">Darurat</h5>
                <p style="color:#64748b;font-size:.875rem;line-height:1.75;">Jika Anda mengalami krisis psikologis atau ancaman fisik, segera hubungi hotline.</p>
                <div style="margin-top:12px;padding:14px;background:rgba(220,38,38,.08);border:1px solid rgba(220,38,38,.2);border-radius:10px;">
                    <p style="color:#fca5a5;font-size:.8rem;font-weight:700;margin-bottom:8px;display:flex;align-items:center;gap:8px;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:14px;height:14px;"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" /></svg>
                        119 ext. 8 — Psikologis
                    </p>
                    <p style="color:#fca5a5;font-size:.8rem;font-weight:700;display:flex;align-items:center;gap:8px;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:14px;height:14px;"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" /></svg>
                        110 — Polri
                    </p>
                </div>
            </div>
        </div>
        <div style="height:1px;background:linear-gradient(90deg,transparent,rgba(255,255,255,.1),transparent);margin-bottom:32px;"></div>
        <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:16px;">
            <p style="color:#334155;font-size:.8rem;">© 2026 PinjolWatch. Semua hak dilindungi.</p>
            <p style="color:#334155;font-size:.75rem;max-width:600px;text-align:right;">Disclaimer: PinjolWatch bukan lembaga penegak hukum. Data laporan digunakan untuk verifikasi, pemetaan, dan pendampingan sesuai persetujuan pelapor.</p>
        </div>
    </div>
</footer>
