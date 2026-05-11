Berikut adalah rancangan struktur **Menu dan Fitur Dashboard Admin PinjolWatch**. Desain ini mengutamakan **Efisiensi Moderasi**, **Keamanan Data (PDP)**, dan **Kepatuhan Hukum**.

Struktur ini dibagi berdasarkan *Sidebar Menu* agar navigasi jelas bagi Admin, Moderator, dan Super Admin.

---
### 🗺️ STRUKTUR MENU DASHBOARD

#### 1. 📊 Dashboard Utama (Overview)
*Halaman pertama saat login untuk melihat kesehatan platform.*
*   **Widget Statistik:**
    *   Total Laporan Masuk (Hari Ini / Bulan Ini).
    *   Laporan Menunggu Verifikasi.
    *   Laporan Diteruskan ke OJK.
    *   Status Sistem (Uptime Server, Kapasitas Storage).
*   **Aktivitas Terkini:** Log aktivitas admin terakhir (login, ubah status, ekspor data).
*   **Peta Heatmap Mini:** Preview sebaran laporan per kabupaten hari ini.

#### 2.  Manajemen Laporan (Core Feature)
*Pusat operasional moderasi laporan.*
*   **Antrian Verifikasi (Inbox):** Daftar laporan baru yang statusnya `Received`.
*   **Daftar Laporan (All Reports):** Tabel lengkap dengan filter canggih (Status, Kabupaten, Jenis Ancaman, Tanggal).
*   **Detail Laporan & Tindakan:**
    *   **Tampilan Ter-Redact:** Bukti yang diupload otomatis di-blur. Admin bisa klik "Tampilkan Asli" (aksi ini dicatat di Audit Log).
    *   **Validasi Data:** Tombol "Verifikasi Valid" atau "Tolak (Spam/Tidak Relevan)".
    *   **Konsolidasi:** Fitur `Merge` untuk menggabungkan 5 laporan serupa tentang pinjol yang sama menjadi 1 kasus agregat.
    *   **Ekspor OJK:** Tombol khusus untuk generate PDF/CSV format resmi jika status `Verified`.
    *   **Update Status:** Ubah status menjadi `Diteruskan`, `Selesai`, atau `Arsip`.

#### 3. 🗺️ Pemetaan & Statistik
*Untuk analisis tren dan pelaporan ke donor/regulator.*
*   **Visualisasi Peta:** Peta interaktif Indonesia (Level Kabupaten) dengan *choropleth* warna berdasarkan jumlah laporan.
*   **Analitik Tren:**
    *   Grafik garis: Kenaikan laporan per minggu.
    *   Grafik batang: Top 5 Aplikasi Pinjol yang paling sering dilaporkan.
    *   Grafik pie: Jenis ancaman terbanyak (Verbal, Fisik, Doxing).
*   **Pusat Unduh Data:** Export statistik agregat (Excel/PDF) untuk laporan bulanan.

#### 4. 📝 Manajemen Konten (CMS)
*Mengelola artikel edukasi dan panduan.*
*   **Daftar Artikel:** CRUD (Create, Read, Update, Delete) untuk halaman seperti "Literasi Keuangan", "Panduan Keluarga", "Waspada Joki".
*   **Editor Rich Text:** Editor konten dengan dukungan embed video dan upload gambar aman.
*   **Manajemen FAQ:** Kelola pertanyaan yang sering diajukan di halaman bantuan.
*   **Manajemen Direktori:** Tambah/edit kontak LBH, Psikolog, atau Hotline resmi di halaman bantuan.

#### 5. 👥 Manajemen Pengguna (Internal)
*Hanya untuk Super Admin.*
*   **Daftar Admin:** Kelola akun moderator dan staf.
*   **Manajemen Role (RBAC):**
    *   *Super Admin:* Akses penuh.
    *   *Moderator:* Akses verifikasi & edit konten.
    *   *Analis Data:* Akses hanya ke menu statistik (tidak bisa lihat data sensitif pelapor).
    *   *Legal:* Akses laporan yang sudah diverifikasi untuk persiapan hukum.

#### 6. ⚙️ Pengaturan Sistem
*   **Pengaturan Umum:** Nama situs, email kontak, mode maintenance.
*   **Manajemen Dokumen Hukum:** Edit teks Kebijakan Privasi, Disclaimer, dan Syarat Ketentuan.
*   **Integrasi OJK:** Konfigurasi API atau sinkronisasi data fintech terdaftar (jika ada API key atau script cron).
*   **Keamanan:**
    *   Log IP yang diblokir.
    *   Pengaturan Retensi Data (Jadwal auto-delete).
    *   Backup Database (Trigger manual backup).

#### 7.  Audit Log (Sangat Penting)
*Mencatat JEJAK DIGITAL setiap admin.*
*   **Tabel Log:** Menampilkan `User`, `Action` (View, Edit, Delete, Export), `Target` (ID Laporan), `Waktu`, dan `IP Address`.
*   **Filter:** Cari berdasarkan admin atau tanggal.
*   **Fungsi:** Wajib ada untuk akuntabilitas jika terjadi kebocoran data oleh oknum internal.

---
### 🔑 FITUR KHUSUS & PRIORITAS PENGEMBANGAN

Berikut adalah fitur "wajib" yang membedakan dashboard ini dari admin panel biasa:

#### 1. 🛡️ Smart Anonymizer (Auto-Redact)
Saat admin membuka detail laporan, sistem tidak boleh menampilkan bukti mentah (foto KTP/Wajah) secara langsung.
*   **Fitur:** Bukti ter-cover layer blur.
*   **Aksi:** Admin harus klik "Reveal" dan konfirmasi alasan.
*   **Log:** Tercatat di Audit Log: *"Admin X melihat bukti asli Laporan Y pada jam Z"*.

#### 2. 📤 One-Click Export ke Format OJK
Mempermudah pelaporan resmi.
*   **Input:** Admin memilih beberapa laporan terverifikasi.
*   **Proses:** Sistem menggabungkan data menjadi 1 PDF terstruktur sesuai format pengaduan OJK (Kronologi, Bukti, Profil Pelapor Teranonim).
*   **Output:** File PDF siap unduh.

#### 3. 🎫 Ticket Status Management
Pelapor mengecek status lewat `Kode Tiket`. Admin butuh antarmuka untuk mengupdate ini.
*   **Input:** Admin menulis pesan update (misal: "Laporan sudah kami teruskan ke OJK").
*   **Notifikasi:** Jika pelapor menyertakan email, sistem otomatis kirim email. Jika tidak, status hanya berubah di web saat dicek pakai kode tiket.

#### 4. 🔍 Deduplikasi Cerdas
Mencegah database penuh dengan laporan ganda.
*   **Fitur:** Saat admin membuka laporan baru, sistem menampilkan *suggestion*: *"Ada 3 laporan serupa untuk Pinjol 'X' di Kabupaten 'Y'. Gabungkan?"*.
*   **Aksi:** Admin bisa klik `Merge` untuk menggabungkan bukti dari beberapa pelapor menjadi satu kasus besar.

---
### 🧑‍💼 DEFINISI ROLE (RBAC)

| Role | Hak Akses Menu |
| :--- | :--- |
| **Super Admin** | Full Access. Bisa hapus data permanen, kelola admin, ubah setting sistem. |
| **Moderator** | Bisa verifikasi laporan, edit konten edukasi, update status tiket. **Tidak bisa** hapus permanen atau ubah setting sistem. |
| **Analis Data** | Hanya bisa melihat menu Statistik & Peta. Tidak bisa melihat data detail pelapor (hanya angka agregat). |
| **Legal Advisor** | Bisa melihat laporan status `Verified`, bisa export data untuk OJK. Tidak bisa edit konten web. |

---
### ️ IMPLEMENTASI TEKNIS (Laravel + Livewire)

Untuk membuat dashboard ini cepat dan interaktif, gunakan pendekatan berikut:

1.  **Layout:** Gunakan **Tailwind UI Dashboard** sebagai base layout (Sidebar + Topbar + Content Area).
2.  **Tables:** Gunakan **Laravel Livewire** dengan **Laravel Datatables** (atau komponen kustom Livewire) untuk tabel laporan agar bisa sorting/filtering tanpa reload halaman.
3.  **Charts:** Gunakan **ApexCharts** atau **Chart.js** untuk visualisasi statistik.
4.  **Security:** Middleware `auth:sanctum` atau `auth:web` + `can:permission` untuk setiap menu.

