# 🏁 Dokumen Handover: PinjolWatch v2.2.9 (Stable)

Dokumen ini merangkum status terakhir pengembangan aplikasi PinjolWatch untuk memastikan keberlanjutan operasional dan kemudahan pengelolaan di masa mendatang.

## 1. Status Terakhir & Pencapaian Utama
Aplikasi saat ini berada pada versi **v2.2.9** dengan fokus utama pada **Advokasi Data** dan **Optimasi Performa**.

*   **Unified Statistics Dashboard (v2.2.3+):** Integrasi data industri OJK dengan dampak kemanusiaan (Tren bunuh diri, krisis kesehatan mental, kerugian ekonomi).
*   **Literasi & CMS:** Penambahan konten edukasi kritis (Literasi Keuangan, Privasi Data) lengkap dengan ilustrasi orisinal.
*   **Optimasi Gambar (Full WebP):** Seluruh aset visual telah dikonversi ke format WebP, mengurangi ukuran halaman hingga 85% untuk kecepatan akses maksimal.
*   **Sistem Pelaporan interaktif:** Peta sebaran dampak nasional dan alur pelaporan terenkripsi.

## 2. Detail Teknis (Tech Stack)
*   **Back-end:** Laravel 12 (PHP 8.3+)
*   **Front-end Reaktif:** Livewire 4 & Alpine.js
*   **Desain:** Tailwind CSS (Custom Design System)
*   **Visualisasi:** Chart.js (Grafik) & Leaflet.js (Peta)
*   **Database:** MySQL / MariaDB

## 3. Panduan Deployment (Server Produksi)
Jika Anda melakukan instalasi ulang atau pemindahan server, ikuti urutan ini:

1.  **Clone & Pull:** `git pull origin main`.
2.  **PHP Dependencies:** `composer install --no-dev -o`.
3.  **Node/NPM (via NVM):** Instal NVM jika `npm` tidak ada, lalu jalankan `npm install && npm run build`.
4.  **Database Sync:**
    *   Gunakan file **`pinjolwatch_fix.sql`** di folder root.
    *   **Wajib:** Hapus/Drop tabel lama di server sebelum melakukan Import ulang.
5.  **Environment:** Pastikan `.env` memiliki kredensial DB yang benar dan `APP_DEBUG=false`.
6.  **Storage Link:** `php artisan storage:link` (Meskipun aset utama sekarang ada di folder `/public`).

## 4. Konvensi Aset & Data
*   **Gambar Artikel:** Semua gambar baru harus disimpan di `public/images/articles/` dan didaftarkan di database dengan jalur diawali garis miring (contoh: `/images/articles/nama_file.webp`).
*   **Format Gambar:** Gunakan **WebP** untuk performa terbaik.
*   **Keamanan:** Jangan aktifkan `APP_DEBUG` di produksi untuk menghindari kebocoran informasi teknis kepada publik.

## 5. Peta Jalan Pengembangan (Next Steps)
*   [ ] **AI Chatbot:** Integrasi pendampingan otomatis bagi korban krisis.
*   [ ] **PWA Support:** Membuat aplikasi dapat diinstal di smartphone tanpa melalui Play Store.
*   [ ] **PDF Export:** Fitur unduh laporan statistik sebagai dokumen advokasi resmi.
*   [ ] **API Integrasi:** Menghubungkan pelaporan langsung ke kanal resmi otoritas.

---
**Catatan Penting:**  
Aset besar seperti PNG/JPG lama telah dihapus dari repository untuk menjaga ukuran folder project tetap efisien. Selalu pastikan database Anda sinkron dengan file SQL terbaru agar tidak terjadi error 404 pada gambar.

**Dibuat Oleh:** Antigravity AI Coding Assistant  
**Tanggal:** 13 Mei 2026  
**Status:** Serah Terima Selesai (v2.2.9)