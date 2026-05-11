Berikut adalah **Draft Kebijakan Privasi Lengkap** untuk `PinjolWatch`. Dokumen ini disusun memenuhi **UU No. 27 Tahun 2022 tentang Pelindungan Data Pribadi (UU PDP)**, standar internasional (GDPR principles sebagai best practice), dan prinsip **Trauma-Informed Design** agar transparan, mudah dipahami, dan tidak memicu kecemasan tambahan bagi pengguna yang sedang dalam kondisi rentan.

---
# 🔒 Halaman: `/kebijakan-privasi`
## Judul: "Kebijakan Privasi PinjolWatch"

---
### 🟦 HERO & RINGKASAN CEPAT (Trauma-Informed UX)
```html
<h1>Kebijakan Privasi</h1>
<p class="lead">Privasi Anda bukan formalitas. Ini adalah fondasi keamanan dan ketenangan Anda.</p>

<div class="quick-summary bg-emerald-50 border border-emerald-200 rounded-xl p-6 mb-8">
  <h2 class="text-lg font-semibold mb-3">📌 Ringkasan Singkat (30 Detik Baca)</h2>
  <ul class="space-y-2 text-sm">
    <li>✅ <strong>Anda tidak wajib memberikan identitas asli.</strong> Sistem menggunakan kode tiket acak untuk pelacakan.</li>
    <li>✅ <strong>Kami tidak menjual, meminjamkan, atau membagikan data Anda</strong> ke pihak ketiga untuk tujuan komersial.</li>
    <li>✅ <strong>Bukti & kronologi dienkripsi</strong> dan hanya dapat diakses oleh tim verifikasi terotorisasi.</li>
    <li>✅ <strong>Anda bisa menarik persetujuan atau meminta penghapusan data</strong> kapan saja melalui kode tiket.</li>
    <li>✅ <strong>Data otomatis dihapus permanen setelah 24 bulan</strong> atau lebih cepat atas permintaan Anda.</li>
  </ul>
  <p class="text-xs text-emerald-700 mt-3">Baca detail lengkap di bawah ini. Jika ada bagian yang kurang jelas, hubungi DPO kami di <a href="mailto:dpo@pinjolwatch.id" class="underline">dpo@pinjolwatch.id</a>.</p>
</div>
```

---
### 📜 1. IDENTITAS PENGENDALI DATA
**PinjolWatch** bertindak sebagai **Pengendali Data Pribadi** sesuai Pasal 1 angka 9 UU PDP.  
- 📧 Email Resmi: `dpo@pinjolwatch.id`  
- 📍 Yurisdiksi: Republik Indonesia  
- 🛡️ Peran: Menyediakan platform pengaduan independen, pemetaan agregat, dan edukasi literasi keuangan. Kami **bukan** lembaga penegak hukum, otoritas jasa keuangan, atau kantor hukum berizin.

---
### 📦 2. DATA YANG KAMI KUMPULKAN
Kami menganut prinsip **Data Minimization**. Kami hanya mengumpulkan data yang benar-benar diperlukan untuk fungsi platform.

| Kategori | Contoh Data | Keterangan |
|----------|-------------|------------|
| **🆔 Data Identitas (Opsional)** | Nama samaran, email/token pelacakan | Tidak wajib. Digunakan hanya jika Anda memilih menerima notifikasi status. |
| ** Data Laporan** | Kronologi, jenis ancaman, nama aplikasi pinjol, kabupaten, kode tiket | Disimpan terenkripsi. Tidak mengandung NIK, KTP, atau alamat presisi. |
| **📎 Bukti Pendukung** | Screenshot, rekaman audio/video, dokumen chat | Diunggah ke penyimpanan terenkripsi. Fitur *auto-anonymizer* akan mengaburkan wajah/NIK/nama lengkap secara otomatis sebelum penyimpanan. |
| **🔐 Data Teknis & Keamanan** | Hash IP, user-agent, timestamp, log audit | Digunakan untuk pencegahan spam, deteksi bot, dan keamanan sistem. Tidak digunakan untuk pelacakan individu. |
| **🍪 Cookie & Analisis** | Strictly necessary cookies, anonymized analytics | Kami menggunakan alat analisis privasi-first (tanpa fingerprinting atau tracking lintas situs). |

---
### 🎯 3. TUJUAN & DASAR HUKUM PENGOLAHAN
Kami memproses data Anda berdasarkan dasar hukum yang sah sesuai **Pasal 20-22 UU PDP**:

| Tujuan Pengolahan | Dasar Hukum |
|-------------------|-------------|
| Menerima, menyimpan, & menampilkan status laporan | Persetujuan eksplisit Anda (Pasal 20) |
| Verifikasi, deduplikasi, & moderasi konten | Kepentingan sah platform & pencegahan penyalahgunaan (Pasal 21) |
| Pemetaan statistik agregat per kabupaten | Kepentingan publik & edukasi masyarakat (Pasal 21) |
| Pemenuhan kewajiban hukum (jika ada surat perintah resmi) | Kewajiban hukum & perintah pengadilan (Pasal 21) |
| Keamanan sistem, audit, & pencegahan fraud | Kepentingan vital & keamanan jaringan (Pasal 21) |

---
### 🔗 4. BERBAGI DATA DENGAN PIHAK KETIGA
**Kami tidak menjual, menyewakan, atau memperdagangkan data pribadi.** Data hanya dapat dibagikan dalam kondisi terbatas berikut:

1. **Otoritas Resmi (OJK, Polri, Kominfo, LDPDP)**  
   Hanya jika:  
   ✅ Anda memberikan persetujuan eksplisit (`share_to_authorities`)  
   ✅ Terdapat surat perintah penyidikan, putusan pengadilan berkekuatan hukum tetap, atau permintaan hukum yang sah  
   ✅ Dilakukan dengan prinsip proporsionalitas & perlindungan data dasar

2. **Penyedia Layanan Infrastruktur**  
   Hosting, email delivery, atau alat analisis privasi-first yang terikat **Perjanjian Pengolahan Data (Data Processing Agreement/DPA)** ketat. Mereka hanya memproses data atas instruksi kami & tidak memiliki akses independen.

3. **Data Agregat & Publikasi**  
   Statistik peta, tren wilayah, atau laporan publik **telah dianonimkan sepenuhnya**. Tidak ada data yang dapat dikaitkan kembali ke individu tertentu.

---
### 🛡️ 5. KEAMANAN & PERLINDUNGAN DATA
Kami menerapkan langkah teknis & organisasional sesuai **Pasal 50 UU PDP**:

- 🔐 **Enkripsi End-to-End / At-Rest**: AES-256 untuk file bukti & database. Kunci enkripsi disimpan terpisah dari server data.
- 🌐 **TLS 1.3**: Semua transmisi data dilindungi sertifikat SSL modern.
- 👥 **Akses Terbatas (RBAC)**: Hanya admin terverifikasi dengan 2FA yang dapat mengakses data mentah. Setiap aksi dicatat dalam audit log.
- 🔄 **Anonymizer Otomatis**: Wajah, NIK, nama lengkap, & nomor telepon pada bukti di-blur/redact secara algoritmik sebelum penyimpanan.
-  **Audit & Pentest Berkala**: Pemindaian kerentanan, peninjauan akses, & pengujian penetrasi oleh pihak independen minimal 1x/tahun.
-  **Rencana Respons Insiden**: Jika terjadi kebocoran data, kami akan memberitahu Anda & otoritas dalam **3×24 jam** sesuai Pasal 66 UU PDP, beserta langkah mitigasi.

---
### 🗑️ 6. RETENSI & PENGHAPUSAN DATA
| Kondisi | Periode Penyimpanan | Tindakan |
|---------|---------------------|----------|
| Laporan aktif / dalam verifikasi | Hingga status `Selesai` atau `Diteruskan` | Disimpan terenkripsi |
| Setelah status `Selesai` / `Arsip` | Maksimal **24 bulan** | Auto-soft delete, lalu hard delete permanen setelah 30 hari |
| Permintaan penghapusan pengguna | Segera diproses (maks 14 hari kerja) | Data dihapus dari DB & backup, kecuali diwajibkan disimpan oleh hukum |
| Data teknis (log, hash IP) | 12 bulan | Dirotasi & dihapus otomatis |

Anda dapat mempercepat penghapusan kapan saja melalui fitur **Tarik Persetujuan** atau email ke DPO.

---
###  7. HAK ANDA SEBAGAI SUBJEK DATA
Sesuai **Pasal 36 UU PDP**, Anda berhak:

| Hak | Cara Menggunakan |
|-----|------------------|
| ✅ Mengakses & menyalin data Anda | Masukkan kode tiket di `/cek-tiket` atau email DPO |
| ✅ Meminta koreksi data tidak akurat | Kirim permintaan via email dengan kode tiket |
| ✅ Membatasi atau menolak pemrosesan | Pilih `internal_only` atau aktifkan pembatasan via dashboard tiket |
| ✅ Menarik persetujuan (consent) | Klik `/tarik-persetujuan/{ticket}` atau hubungi DPO |
| ✅ Meminta penghapusan data | Gunakan fitur `Hapus Data Saya` atau email permintaan resmi |
| ✅ Pengaduan ke Lembaga Pelindung Data Pribadi (LDPDP) | Hubungi LDPDP jika respons kami tidak memuaskan |

️ **Catatan:** Penarikan persetujuan tidak menghapus data yang telah diserahkan ke otoritas secara sah berdasarkan kewajiban hukum, namun akan menghentikan pemrosesan lebih lanjut oleh platform kami.

---
###  8. TAUTAN & LAYANAN PIHAK KETIGA
Situs ini mungkin menyertakan tautan ke website OJK, Kominfo, LBH, atau alat edukasi eksternal. Kami **tidak bertanggung jawab** atas kebijakan privasi, praktik keamanan, atau konten situs pihak ketiga. Kami menyarankan Anda selalu memeriksa kebijakan privasi mereka sebelum berbagi informasi.

---
### 👶 9. DATA ANAK & PENGGUNA RENTAN
Platform ini tidak ditujukan untuk pengguna di bawah 18 tahun. Jika kami secara tidak sengaja mengumpulkan data dari anak di bawah umur tanpa verifikasi persetujuan orang tua/wali, kami akan **menghapus data tersebut segera** setelah konfirmasi. Orang tua/wali dapat menghubungi DPO untuk verifikasi & penghapusan.

---
### 📅 10. PERUBAHAN KEBIJAKAN
Kami dapat memperbarui kebijakan ini seiring perubahan regulasi, fitur platform, atau praktik operasional. Perubahan signifikan akan:
- Dipublikasikan di halaman ini dengan tanggal pembaruan
- Diberitahukan melalui banner situs atau email (jika Anda berlangganan notifikasi)
- Tidak berlaku surut untuk data yang telah diproses dengan persetujuan sebelumnya

Penggunaan berkelanjutan setelah pembaruan dianggap sebagai penerimaan terhadap ketentuan yang berlaku.

---
### 📬 11. KONTAK & PENYELESAIAN KELUHAN
Jika Anda memiliki pertanyaan, permintaan hak data, atau keluhan terkait privasi:

📧 **Data Protection Officer (DPO):** `dpo@pinjolwatch.id`  
⏱️ **Waktu Respons:** Maksimal 2×24 jam pada hari kerja  
📍 **Alamat Korespondensi:** [Isi alamat operasional/kantor virtual jika ada]  

Kami berkomitmen menyelesaikan setiap permintaan secara transparan, gratis, & tanpa diskriminasi. Jika tidak puas dengan respons kami, Anda berhak mengajukan pengaduan ke **Lembaga Pelindung Data Pribadi (LDPDP)** sesuai mekanisme yang berlaku.

---
### 🟦 FOOTER NOTE (Trauma-Informed Closing)
```html
<div class="bg-slate-50 border border-slate-200 rounded-xl p-6 mt-8 text-center">
  <p class="text-sm text-slate-600 mb-3">
    <strong>️ Janji Kami:</strong><br>
    Kebijakan ini bukan sekadar dokumen hukum. Ini adalah komitmen bahwa suara Anda akan didengar, data Anda akan dilindungi, dan ketenangan Anda adalah prioritas utama. Terima kasih telah mempercayakan keamanan digital Anda kepada PinjolWatch.
  </p>
  <div class="flex justify-center gap-4 text-sm">
    <a href="/disclaimer" class="text-blue-600 hover:underline">Disclaimer →</a>
    <a href="/syarat-ketentuan" class="text-blue-600 hover:underline">Syarat & Ketentuan →</a>
    <a href="/kontak" class="text-blue-600 hover:underline">Hubungi Kami →</a>
  </div>
</div>
```

---
### ️ CATATAN IMPLEMENTASI TEKNIS (Laravel + Tailwind)

| Aspek | Rekomendasi |
|-------|-------------|
| **Struktur Blade** | Gunakan `<x-policy-layout>` dengan TOC sticky di desktop & accordion di mobile. Setiap `<section>` memiliki `id` untuk anchor navigation. |
| **Aksesibilitas** | `aria-labelledby` pada heading, kontras ≥ 4.5:1, skip-link, mode cetak `@media print` yang menyembunyikan nav/CTA & menyesuaikan tipografi. |
| **SEO & Legal** | Tambahkan Schema.org `LegalDocument` & `WebPage` dengan `dateModified`. Meta `robots: index, follow`. Hindari keyword stuffing. |
| **Interaktivitas** | Tombol "Salin Email DPO" dengan clipboard API. Accordion untuk hak subjek data di mobile. `last_read_timestamp` di localStorage. |
| **Versioning** | Simpan versi kebijakan di database (`policy_versions` table). Tampilkan `?v=2026-05` di URL. Arsip versi lama di `/kebijakan-privasi/archive`. |
| **Compliance Check** | Pastikan semua link hak data (`/tarik-persetujuan`, `/cek-tiket`) aktif. Test flow penghapusan data via artisan command `php artisan data:delete-user --ticket=XXXX`. |

---
### ️ CHECKLIST KEPUHUHAN UU PDP
- [x] Identitas Pengendali Data & DPO jelas
- [x] Jenis data & tujuan pengolahan terinci
- [x] Dasar hukum sesuai Pasal 20-22
- [x] Mekanisme persetujuan & penarikan jelas
- [x] Hak subjek data (Pasal 36) lengkap & mudah diakses
- [x] Keamanan teknis & organisasional (Pasal 50)
- [x] Retensi & penghapusan otomatis (Pasal 55)
- [x] Prosedur breach notification (Pasal 66)
- [x] Bahasa jelas, tidak menyesatkan, trauma-informed
- [x] Mekanisme pengaduan & kontak DPO tersedia

