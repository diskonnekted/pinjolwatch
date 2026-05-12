Berikut adalah rancangan lengkap fitur **Dashboard Pengguna Terdaftar** untuk PinjolWatch. Desain ini mengutamakan **privasi terenkripsi, pemulihan holistik, dan kontrol penuh pengguna**, tanpa mengorbankan prinsip *trauma-informed* dan kepatuhan UU PDP.

---
### 🧭 PRINSIP DASAR DASHBOARD
1. **Pseudonim, Bukan Identitas Nyata**: Akun terdaftar tidak wajib menggunakan nama asli/KTP. Sistem tetap menggunakan kode tiket & hash.
2. **Enkripsi End-to-End di Level User**: Semua catatan, dokumen, dan log aktivitas dienkripsi di sisi klien/server sebelum disimpan.
3. **Kontrol Penuh (User Sovereignty)**: Pengguna bisa mengunduh, membatasi, atau menghapus datanya kapan saja.
4. **Tanpa "Wall of Text"**: Antarmuka dibagi menjadi modul ringan dengan opsi `Simpan Draft` atau `Jeda Sesi` untuk mencegah overload kognitif.

---
### 📦 6 MODUL UTAMA DASHBOARD

#### 1. 📄 **Laporan & Tiket Saya**
*Pusat pelacakan semua pengaduan yang pernah dibuat.*
| Fitur | Fungsi & Catatan Teknis |
|-------|------------------------|
| **Daftar Tiket** | Tabel dengan filter status (`Diterima`, `Diverifikasi`, `Diteruskan ke OJK`, `Selesai`, `Arsip`). |
| **Timeline Status** | Visualisasi langkah demi langkah (seperti tracking paket). Update otomatis via cron/email. |
| **Manajemen Consent** | Tombol `Ubah Persetujuan` per laporan: `Internal Only` ↔ `Share to Authorities`. Perubahan dicatat di audit log. |
| **Upload Bukti Tambahan** | Fitur `Add Evidence` dengan anonymizer otomatis. File dienkripsi & di-hash. |
| **Ekspor Laporan Pribadi** | Download PDF ringkasan laporan + bukti teranotasi (untuk keperluan LBH/konsultasi pribadi). |

#### 2. 🛡️ **Keamanan Digital & Darurat**
*Tools proaktif untuk melindungi diri dari eskalasi teror DC.*
| Fitur | Fungsi & Catatan Teknis |
|-------|------------------------|
| **Log Insiden Pribadi** | Jurnal terenkripsi untuk mencatat waktu, nomor, & modus ancaman. Bisa di-export sebagai lamporan laporan polisi. |
| **Kontak Darurat Cepat** | Simpan 3 nomor tepercaya. Tombol `Hubungi Semua` atau `Kirim Lokasi & Pesan Standar` via WhatsApp/SMS. |
| **Checklist Keamanan Digital** | Panduan interaktif: blokir nomor, aktifkan 2FA, cek kebocoran data, amankan media sosial. Progress tersimpan di localStorage/DB terenkripsi. |
| **Tombol Keluar Cepat (Quick Exit)** | Mengalihkan ke halaman aman (misal: cuaca/BPOM), menghapus history session, & mengunci akses dashboard sementara. |

#### 3. 💰 **Pemulihan Keuangan & Dokumen**
*Membantu pengguna keluar dari siklus utang dengan terstruktur.*
| Fitur | Fungsi & Catatan Teknis |
|-------|------------------------|
| **Debt Visualizer** | Input semua utang (pinjol, bank, keluarga). Tampilkan grafik prioritas (`Avalanche` vs `Snowball`) & proyeksi lunas. |
| **Anggaran Bulanan** | Template 50/30/20 yang bisa disesuaikan. Notifikasi jika pengeluaran > pemasukan. |
| **Brankas Dokumen Terenkripsi** | Upload foto KTP, perjanjian pinjaman, bukti transfer. File dienkripsi AES-256, hanya bisa diakses dengan kunci user. |
| **Target Dana Darurat** | Progress bar visual + pengingat menabung mingguan. Integrasi dengan kalkulator bunga pinjol untuk motivasi. |

#### 4.  **Kesehatan Mental & Kesejahteraan**
*Dukungan psikologis yang terintegrasi & privat.*
| Fitur | Fungsi & Catatan Teknis |
|-------|------------------------|
| **Mood & Wellness Tracker** | Check-in harian (emoji/slider + catatan opsional). Grafik tren emosi mingguan. Data tidak dibagikan ke siapa pun. |
| **Latihan Grounding & Pernapasan** | Widget interaktif 4-7-8 breathing, teknik 5-4-3-2-1, audio panduan singkat. Bisa diakses tanpa login. |
| **Perpustakaan Pemulihan** | Artikel, video, & worksheet terkurasi: `Mengatasi Panic Attack`, `Cara Bicara pada Keluarga`, `Financial Trauma Healing`. |
| **Direktori Profesional** | Filter psikolog/LBH berdasar lokasi, biaya, & spesialisasi. Tombol `Minta Pendampingan` (mengirim request anonim ke mitra). |

#### 5. 👥 **Komunitas & Dukungan Sebaya**
*Ruang aman untuk berbagi tanpa stigma.*
| Fitur | Fungsi & Catatan Teknis |
|-------|------------------------|
| **Forum Anonim Termoderasi** | Thread berdasarkan topik: `Tips Hadapi DC`, `Sukses Lunas`, `Dukungan Keluarga`. Auto-filter kata pemicu & doxing. |
| **Sistem "Buddy" Sukarela** | Match dengan mentor terverifikasi (mantan korban/relawan) untuk pendampingan 1-on-1 (chat terenkripsi, batas waktu 30 hari). |
| **Kalender Webinar/Workshop** | Jadwal sesi edukasi: literasi keuangan, hak hukum, manajemen stres. Fitur RSVP & reminder. |
| **Kotak Saran & Umpan Balik** | Form anonim untuk melaporkan bug, meminta fitur, atau memberi masukan kebijakan platform. |

#### 6. ⚙️ **Pengaturan Akun & Pusat Privasi**
*Kontrol penuh atas data & keamanan akun.*
| Fitur | Fungsi & Catatan Teknis |
|-------|------------------------|
| **Profil Pseudonim** | Nama tampilan, avatar, zona waktu, preferensi bahasa. Tidak ada field NIK/KTP. |
| **Pusat Data Pribadi (UU PDP)** | `Download Data Saya` (JSON/PDF), `Batasi Pemrosesan`, `Tarik Consent`, `Hapus Akun Permanen`. Semua diproses dalam 14 hari. |
| **Keamanan & Sesi** | Aktifkan 2FA, lihat perangkat aktif, `Keluar dari Semua Sesi`, riwayat login (IP masked + lokasi kasar). |
| **Notifikasi** | Toggle: email/SMS/push untuk update tiket, konten edukasi, safety alert, atau komunitas. Bisa set "Jangan Ganggu" jam 22.00-06.00. |

---
###  PRIORITAS PENGEMBANGAN (ROADMAP)

| Fase | Fitur Inti | Estimasi Waktu |
|------|------------|----------------|
| **MVP (Bulan 1-2)** | Daftar Tiket, Timeline Status, Upload Bukti Tambahan, Log Insiden, Kontak Darurat, Profil Pseudonim, Pusat Data Pribadi dasar | 6-8 minggu |
| **Fase 2 (Bulan 3-4)** | Debt Visualizer, Brankas Dokumen, Mood Tracker, Forum Anonim, Checklist Keamanan Digital, 2FA, Notifikasi terkelola | 6-8 minggu |
| **Fase 3 (Bulan 5+)** | Buddy System, Webinar Calendar, Audio Grounding, Export Laporan Polisi terformat, Integrasi API mitra LBH/psikolog | 4-6 minggu |

---
### 🎨 PRINSIP UX TRAUMA-INFORMED UNTUK DASHBOARD
1. **Jeda & Simpan Otomatis**: Setiap form/input memiliki `Save Draft` & `Ambil Nafas` button. Session tidak timeout mendadak.
2. **Bahasa Validatif**: Ganti `"Error: Input Salah"` → `"Hmm, sepertinya ada yang kurang lengkap. Coba periksa lagi ya."`
3. **Kontrol Visual**: Toggle `Mode Tenang` (reduce animations, hide red alerts, soft contrast) untuk pengguna yang mudah terpicu kecemasan.
4. **Transparansi Proses**: Tampilkan `"Data Anda dienkripsi & hanya Anda yang memegang kuncinya"` di setiap modul sensitif.
5. **Escape Hatch**: Tombol `Keluar Cepat` selalu visible di header. Tidak ada modal yang mengunci layar.

---
### 💻 CONTOH STRUKTUR DATABASE TAMBAHAN (Laravel Migration)

```php
// dashboard_user_data.php (encrypted user-specific tables)
Schema::create('user_incident_logs', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
    $table->text('encrypted_note'); // Catatan insiden terenkripsi
    $table->string('threat_type')->nullable();
    $table->timestamp('occurred_at');
    $table->timestamps();
});

Schema::create('user_debt_items', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained();
    $table->string('creditor_name'); // Nama pinjol/bank
    $table->decimal('principal', 12, 2);
    $table->decimal('interest_rate', 5, 3); // % per hari/bulan
    $table->enum('status', ['active', 'paid', 'disputed']);
    $table->date('due_date')->nullable();
    $table->timestamps();
});

Schema::create('user_mood_entries', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained();
    $table->integer('mood_score'); // 1-5
    $table->text('encrypted_note')->nullable();
    $table->date('logged_date');
    $table->timestamps();
});
```

---
### ✅ CHECKLIST KEPUHUHAN & KEAMANAN
- [x] Semua data user dienkripsi at-rest & in-transit
- [x] Tidak ada field identitas wajib (NIK/KTP)
- [x] Mekanisme tarik consent & hapus data sesuai UU PDP Pasal 36 & 55
- [x] Audit log untuk setiap aksi sensitif (export, change consent, delete)
- [x] Rate limiting & 2FA untuk mencegah brute force akun user
- [x] UI/UX mendukung `prefers-reduced-motion` & high-contrast mode

