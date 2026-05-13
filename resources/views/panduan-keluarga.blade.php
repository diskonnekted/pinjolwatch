<x-guest-layout>
<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap');
:root { --teal:#0d9488; --teal-l:#2dd4bf; --dark:#020617; --dark2:#0f172a; }
body { font-family:'Inter',sans-serif; background:#f8fafc; color:#1e293b; }
nav { background: rgba(2,6,23,.95) !important; backdrop-filter: blur(20px); border-bottom: 1px solid rgba(255,255,255,.06); }

/* Hero */
.hero { background: linear-gradient(135deg, var(--dark) 0%, #0f2027 50%, #0d3340 100%); position: relative; overflow: hidden; }
.hero-orb { position:absolute; border-radius:50%; filter:blur(80px); pointer-events:none; }
.grad { background: linear-gradient(135deg,#fff 0%,var(--teal-l) 60%,var(--teal) 100%); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text; }
.badge { display:inline-flex; align-items:center; gap:8px; padding:6px 16px; background:rgba(13,148,136,.2); border:1px solid rgba(45,212,191,.4); border-radius:999px; font-size:.75rem; font-weight:700; color:var(--teal-l); letter-spacing:.08em; text-transform:uppercase; }

/* Sections */
.section { padding: 80px 32px; }
.container { max-width: 1100px; margin: 0 auto; }

/* Accordion */
.accordion-item { border-radius: 16px; overflow: hidden; margin-bottom: 12px; border: 1px solid; }
.accordion-item.red { border-color: #fecaca; background: #fff5f5; }
.accordion-item.green { border-color: #bbf7d0; background: #f0fdf4; }
.accordion-header { width:100%; text-align:left; padding:20px 24px; font-weight:700; font-size:1rem; cursor:pointer; display:flex; justify-content:space-between; align-items:center; background:transparent; border:none; }
.accordion-header.red { color:#991b1b; }
.accordion-header.green { color:#166534; }
.accordion-body { padding:0 24px 20px; display:none; line-height:1.75; }
.accordion-body.red { color:#7f1d1d; }
.accordion-body.green { color:#14532d; }
.accordion-body.show { display:block; }
.chevron { transition: transform .3s; font-size:1.2rem; }
.chevron.open { transform: rotate(180deg); }

/* Script box */
.script-box { background: linear-gradient(135deg, #0f172a, #0d2233); border: 1px solid rgba(45,212,191,.3); border-radius: 20px; padding: 40px; position: relative; }

/* Checklist */
.check-item { display:flex; align-items:flex-start; gap:16px; padding:16px 20px; border-radius:12px; background:#fff; border:1px solid #e2e8f0; margin-bottom:10px; cursor:pointer; transition:all .2s; }
.check-item:hover { border-color:var(--teal); background:#f0fdfa; }
.check-item.checked { background:#f0fdfa; border-color:var(--teal); }
.check-box { width:24px; height:24px; border-radius:6px; border:2px solid #cbd5e1; flex-shrink:0; display:flex; align-items:center; justify-content:center; transition:all .2s; }
.check-item.checked .check-box { background:var(--teal); border-color:var(--teal); }

/* Floating button */
.float-btn { position:fixed; bottom:32px; right:32px; z-index:999; background:linear-gradient(135deg,#dc2626,#b91c1c); color:#fff; padding:14px 22px; border-radius:999px; font-weight:700; font-size:.85rem; box-shadow:0 8px 30px rgba(220,38,38,.4); text-decoration:none; display:flex; align-items:center; gap:8px; animation: pulse-red 2s infinite; }
@keyframes pulse-red { 0%,100%{box-shadow:0 8px 30px rgba(220,38,38,.4)} 50%{box-shadow:0 8px 40px rgba(220,38,38,.7)} }

/* Image styles */
.hero-img { width:100%; aspect-ratio:1/1; object-fit:cover; object-position:center; border-radius:28px; box-shadow:0 0 80px rgba(13,148,136,.5); }
.section-img { width:100%; max-height:420px; object-fit:cover; border-radius:24px; box-shadow:0 20px 60px rgba(0,0,0,.15); }
</style>

{{-- HERO --}}
<section class="hero" style="padding: 120px 32px 80px;">
    <div style="position:absolute;top:-100px;left:-100px;width:500px;height:500px;background:radial-gradient(circle,rgba(13,148,136,.3),transparent 70%);border-radius:50%;pointer-events:none;"></div>
    <div style="position:absolute;bottom:-80px;right:-80px;width:400px;height:400px;background:radial-gradient(circle,rgba(45,212,191,.2),transparent 70%);border-radius:50%;pointer-events:none;"></div>

    <div class="container" style="position:relative;z-index:1;">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:center;">
            <div>
                <div class="badge" style="margin-bottom:24px;">💚 Panduan Trauma-Informed</div>
                <h1 style="font-size:clamp(2.2rem,4vw,3.8rem);font-weight:900;line-height:1.1;margin-bottom:24px;color:#fff;">
                    <span class="grad">Cinta Itu Melindungi,</span><br>
                    <span style="color:#f1f5f9;">Bukan Menghakimi.</span>
                </h1>
                <p style="font-size:1.1rem;color:#94a3b8;line-height:1.8;margin-bottom:40px;">Ketika orang yang kita sayangi terjerat teror pinjol ilegal, ketakutan mereka nyata. Peran Anda bukan menghakimi masa lalu, tapi menjadi <strong style="color:#e2e8f0;">benteng keamanan dan ketenangan</strong> di masa kini.</p>
                <div style="display:flex;gap:12px;flex-wrap:wrap;">
                    <a href="#zona-merah" style="padding:14px 28px;background:linear-gradient(135deg,var(--teal),#0891b2);color:#fff;font-weight:700;border-radius:12px;text-decoration:none;font-size:.9rem;letter-spacing:.05em;">Baca Panduan ↓</a>
                    <a href="{{ route('report') }}" style="padding:14px 28px;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.15);color:#fff;font-weight:700;border-radius:12px;text-decoration:none;font-size:.9rem;">Dampingi Lapor Sekarang</a>
                </div>
            </div>
            <div style="position:relative;">
                <div style="position:absolute;inset:-20px;background:radial-gradient(ellipse,rgba(13,148,136,.3),transparent 70%);border-radius:50%;"></div>
                <img src="/anda tidak sendiri.webp" alt="Anda Tidak Sendirian" class="hero-img">
            </div>
        </div>
    </div>
</section>

{{-- INTRO --}}
<section class="section" style="background:#fff;">
    <div class="container">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:center;">
            <div>
                <img src="/Kekuatan Komunitas.webp" alt="Kekuatan Komunitas" class="section-img">
            </div>
            <div>
                <div class="badge" style="background:rgba(13,148,136,.1);border-color:rgba(13,148,136,.3);color:var(--teal);margin-bottom:20px;">Mengapa Pendekatan Anda Berdampak Besar?</div>
                <h2 style="font-size:2rem;font-weight:900;color:#0f172a;margin-bottom:20px;line-height:1.2;">Teror Pinjol Bukan Sekadar Masalah Finansial</h2>
                <p style="color:#475569;line-height:1.85;font-size:1.05rem;">Ini adalah <strong>penyerangan mental</strong>. Korban sering mengalami kecemasan berlebih, rasa malu yang mendalam, dan ketakutan akan keselamatan fisik.</p>
                <div style="margin-top:24px;padding:20px 24px;background:#f0fdfa;border-left:4px solid var(--teal);border-radius:0 12px 12px 0;">
                    <p style="color:#0f766e;font-weight:600;font-size:.95rem;line-height:1.7;">Respon Anda bisa menjadi <strong>racun yang memperparah luka</strong>, atau <strong>penawar racun yang mempercepat pemulihan</strong>. Berikut panduan langkah demi langkah.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ZONA MERAH --}}
<section class="section" style="background:#fef2f2;" id="zona-merah">
    <div class="container">
        <div style="text-align:center;margin-bottom:48px;">
            <div style="display:inline-flex;align-items:center;gap:8px;padding:6px 16px;background:#fee2e2;border:1px solid #fca5a5;border-radius:999px;font-size:.75rem;font-weight:700;color:#991b1b;letter-spacing:.08em;text-transform:uppercase;margin-bottom:16px;">🚫 Zona Merah</div>
            <h2 style="font-size:2rem;font-weight:900;color:#7f1d1d;">Yang Seharusnya TIDAK Dilakukan</h2>
            <p style="color:#991b1b;margin-top:8px;">Hindari perilaku ini — dapat memicu trauma ulang atau isolasi sosial.</p>
        </div>
        <div style="max-width:780px;margin:0 auto;">
            @foreach([
                ['❌ Jangan Menyalahkan: "Kan Dah Bilang..."','Memvalidasi rasa bersalah korban. Korban sudah tahu mereka salah mengambil langkah, tapi teror DC yang ilegal adalah kejahatan terpisah yang tidak layak mereka terima.','Ganti dengan: Fokus pada solusi, bukan masa lalu.'],
                ['❌ Jangan Meremehkan Rasa Takutnya','Korban merasa tidak didengar dan sendirian. Bagi korban, ancaman penyebaran foto KTP itu nyata dan menakutkan.','Ganti dengan: "Wajar kalau kamu takut, ini memang situasi yang tidak adil."'],
                ['❌ Jangan Memaksa "Tutup Mulut"','Memaksa korban mengurung emosi justru meningkatkan risiko burnout atau depresi berat.','Ganti dengan: Biarkan mereka mengeluarkan ketakutannya pada ruang aman di rumah.'],
                ['❌ Jangan Mengambil Alih Semua Urusan Tanpa Izin','Korban bisa merasa tidak berdaya (learned helplessness) atau kehilangan kendali atas hidupnya sendiri.','Ganti dengan: "Apa yang bisa kami bantu? Kita atasi ini bersama-sama."'],
                ['❌ Jangan Menyebarkan Masalah ke Kerabat Lain','Menambah beban malu sosial dan memperluas trauma.','Ganti dengan: Jaga privasi korban. Hanya orang yang terlibat dalam solusi yang perlu tahu.'],
            ] as $i => $item)
            <div class="accordion-item red">
                <button class="accordion-header red" onclick="toggleAccordion(this)">
                    <span>{{ $item[0] }}</span>
                    <span class="chevron">▾</span>
                </button>
                <div class="accordion-body red">
                    <p style="margin-bottom:8px;"><strong>Risiko:</strong> {{ $item[1] }}</p>
                    <p style="padding:10px 14px;background:#fecaca;border-radius:8px;font-weight:600;">💡 {{ $item[2] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ZONA HIJAU --}}
<section class="section" style="background:#f0fdf4;" id="zona-hijau">
    <div class="container">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:start;">
            <div>
                <div style="display:inline-flex;align-items:center;gap:8px;padding:6px 16px;background:#dcfce7;border:1px solid #86efac;border-radius:999px;font-size:.75rem;font-weight:700;color:#166534;letter-spacing:.08em;text-transform:uppercase;margin-bottom:16px;">✅ Zona Hijau</div>
                <h2 style="font-size:2rem;font-weight:900;color:#14532d;margin-bottom:8px;">Yang Bisa Dilakukan</h2>
                <p style="color:#166534;margin-bottom:32px;">Tindakan suportif yang memulihkan mental dan menyelesaikan masalah.</p>
                @foreach([
                    ['🔕','Jadilah "Filter" Informasi','Bantu korban memblokir nomor-nomor teror di HP mereka. Tawarkan diri untuk menampung pesan yang masuk agar korban tidak terus-menerus melihat ancaman di layar HP.'],
                    ['💬','Validasi & Tenangkan (Emotional First Aid)','"Kamu tidak sendirian. Ini bukan akhir dunia. Kita akan laporkan ini secara resmi dan lindungi data kamu."'],
                    ['📸','Bantu Dokumentasi Bukti','Screenshot chat ancaman, catat nomor pengirim, rekam panggilan jika diperlukan, dan simpan bukti di tempat aman (bukan galeri umum).'],
                    ['🛡️','Gunakan Fitur PinjolWatch Bersama','Temani korban mengisi formulir pengaduan. Kehadiran Anda mengurangi rasa cemas dan memastikan data terisi dengan benar.'],
                    ['🧠','Dorong Mencari Bantuan Profesional','Jika korban menunjukkan tanda stres berat (susah tidur, panic attack), ajak akses fitur "Panduan Ketenangan" atau hubungi psikolog.'],
                ] as $item)
                <div class="accordion-item green">
                    <button class="accordion-header green" onclick="toggleAccordion(this)">
                        <span>{{ $item[0] }} {{ $item[1] }}</span>
                        <span class="chevron">▾</span>
                    </button>
                    <div class="accordion-body green">{{ $item[2] }}</div>
                </div>
                @endforeach
            </div>
            <div style="position:sticky;top:100px;">
                <img src="/Perlindungan & Keamanan.webp" alt="Perlindungan dan Keamanan" class="section-img" style="aspect-ratio:4/3;object-fit:cover;">
            </div>
        </div>
    </div>
</section>

{{-- SCRIPT PENENANG --}}
<section class="section" style="background:var(--dark);">
    <div class="container">
        <div style="text-align:center;margin-bottom:40px;">
            <div class="badge" style="margin-bottom:16px;">🛡️ Script Penenang</div>
            <h2 style="color:#fff;font-size:2rem;font-weight:900;" class="grad">Kata-Kata yang Menyembuhkan</h2>
            <p style="color:#94a3b8;margin-top:8px;">Gunakan kalimat ini saat korban mulai panik atau menangis.</p>
        </div>
        <div class="script-box" style="max-width:780px;margin:0 auto;">
            <div style="position:absolute;top:-1px;left:0;right:0;height:2px;background:linear-gradient(90deg,transparent,var(--teal-l),transparent);border-radius:2px;"></div>
            <div style="font-size:4rem;color:var(--teal);line-height:0;margin-bottom:24px;font-style:italic;">"</div>
            <p id="script-text" style="color:#e2e8f0;font-size:1.15rem;line-height:1.9;font-style:italic;margin-bottom:32px;">
                "Ini berat, dan tidak apa-apa jika kamu merasa takut sekarang. Tapi ingat, ancaman mereka adalah pelanggaran hukum, bukan cerminan diri kamu. Kami ada di sini. Data kamu aman, kami akan bantu laporkan. Tarik napas pelan-pelan, kita selesaikan langkah demi langkah."
            </p>
            <button onclick="copyScript()" id="copy-btn" style="display:inline-flex;align-items:center;gap:8px;padding:12px 24px;background:rgba(45,212,191,.15);border:1px solid rgba(45,212,191,.4);color:var(--teal-l);font-weight:700;border-radius:10px;cursor:pointer;font-size:.875rem;letter-spacing:.05em;text-transform:uppercase;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184"/></svg>
                Salin ke Clipboard
            </button>
        </div>
    </div>
</section>

{{-- CHECKLIST --}}
<section class="section" style="background:#f8fafc;">
    <div class="container" style="max-width:780px;">
        <div style="text-align:center;margin-bottom:48px;">
            <div style="display:inline-flex;align-items:center;gap:8px;padding:6px 16px;background:#e0f2fe;border:1px solid #7dd3fc;border-radius:999px;font-size:.75rem;font-weight:700;color:#0369a1;letter-spacing:.08em;text-transform:uppercase;margin-bottom:16px;">📝 Checklist</div>
            <h2 style="font-size:2rem;font-weight:900;color:#0f172a;">Checklist Dukungan Keluarga</h2>
            <p style="color:#64748b;margin-top:8px;">Klik untuk menandai yang sudah Anda lakukan.</p>
        </div>
        <div id="checklist">
            @foreach([
                'Saya sudah mendengarkan cerita korban tanpa memotong atau menghakimi.',
                'Saya membantu memblokir nomor-nomor pengganggu.',
                'Saya membantu menyimpan bukti ancaman di tempat aman.',
                'Saya tidak menyebarluaskan aib korban ke tetangga atau medsos.',
                'Saya mendampingi korban melapor via PinjolWatch.',
                'Saya memastikan korban makan dan istirahat yang cukup.',
            ] as $i => $item)
            <div class="check-item" onclick="toggleCheck(this)">
                <div class="check-box">
                    <svg style="display:none;color:#fff;" xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                </div>
                <span style="color:#334155;font-weight:500;line-height:1.6;">{{ $item }}</span>
            </div>
            @endforeach
        </div>
        <div id="progress-bar-wrap" style="margin-top:24px;background:#e2e8f0;border-radius:999px;height:8px;overflow:hidden;">
            <div id="progress-bar" style="height:100%;background:linear-gradient(90deg,var(--teal),var(--teal-l));border-radius:999px;width:0%;transition:width .4s ease;"></div>
        </div>
        <p id="progress-text" style="text-align:center;margin-top:12px;font-size:.875rem;color:#64748b;font-weight:600;">0 dari 6 selesai</p>
    </div>
</section>

{{-- FOOTER CTA --}}
<section class="section" style="background:linear-gradient(135deg,var(--dark),#0d2233);text-align:center;">
    <div class="container" style="max-width:700px;">
        <div class="badge" style="margin:0 auto 24px;width:fit-content;">Butuh Panduan Lebih Lanjut?</div>
        <h2 style="color:#fff;font-size:2rem;font-weight:900;margin-bottom:16px;" class="grad">Bersama, Kita Bisa Pulih</h2>
        <p style="color:#94a3b8;font-size:1.05rem;line-height:1.8;margin-bottom:40px;">Bantu orang terdekat Anda pulihkan ketenangan dan lawan teror pinjol ilegal bersama PinjolWatch.</p>
        <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
            <a href="{{ route('report') }}" style="padding:16px 36px;background:linear-gradient(135deg,var(--teal),#0891b2);color:#fff;font-weight:800;border-radius:14px;text-decoration:none;font-size:1rem;letter-spacing:.05em;text-transform:uppercase;box-shadow:0 0 40px rgba(13,148,136,.4);">Dampingi Lapor Sekarang</a>
            <a href="{{ route('quiz') }}" style="padding:16px 36px;background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.15);color:#fff;font-weight:700;border-radius:14px;text-decoration:none;font-size:1rem;letter-spacing:.05em;text-transform:uppercase;">Cek Kondisi Mental</a>
        </div>
    </div>
</section>

{{-- FLOATING EMERGENCY BUTTON --}}
<a href="tel:119" class="float-btn">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 6.75Z"/></svg>
    119 ext.8 — Bantuan Psikologis
</a>

<script>
function toggleAccordion(btn) {
    const body = btn.nextElementSibling;
    const chev = btn.querySelector('.chevron');
    body.classList.toggle('show');
    chev.classList.toggle('open');
}

function copyScript() {
    const text = document.getElementById('script-text').innerText;
    navigator.clipboard.writeText(text).then(() => {
        const btn = document.getElementById('copy-btn');
        btn.innerHTML = '✅ Tersalin!';
        setTimeout(() => { btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184"/></svg> Salin ke Clipboard'; }, 2000);
    });
}

function toggleCheck(el) {
    el.classList.toggle('checked');
    const box = el.querySelector('.check-box svg');
    if (el.classList.contains('checked')) { box.style.display = 'block'; } else { box.style.display = 'none'; }
    const total = document.querySelectorAll('.check-item').length;
    const done = document.querySelectorAll('.check-item.checked').length;
    document.getElementById('progress-bar').style.width = (done/total*100) + '%';
    document.getElementById('progress-text').textContent = done + ' dari ' + total + ' selesai';
}
</script>
</x-guest-layout>
