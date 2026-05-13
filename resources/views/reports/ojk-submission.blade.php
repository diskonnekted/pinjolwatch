<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pengaduan Masyarakat - OJK</title>
    <style>
        @page { margin: 2.5cm; }
        body { font-family: 'Times New Roman', Times, serif; line-height: 1.5; color: #000; font-size: 12pt; }
        .kop { text-align: center; border-bottom: 3px double #000; padding-bottom: 10px; margin-bottom: 30px; position: relative; }
        .logo-container { position: absolute; left: 0; top: 0; width: 60px; height: 60px; background: linear-gradient(135deg, #2563eb, #4f46e5); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-weight: 900; font-size: 24pt; box-shadow: 2px 2px 5px rgba(0,0,0,0.1); }
        .kop-text { margin-left: 70px; }
        .kop h1 { margin: 0; font-size: 18pt; text-transform: uppercase; color: #1e40af; }
        .kop p { margin: 2px 0; font-size: 10pt; color: #444; }
        .content { text-align: justify; }
        .identitas-tabel { margin: 20px 0; width: 100%; border-collapse: collapse; }
        .identitas-tabel td { padding: 4px 0; vertical-align: top; }
        .identitas-tabel td:first-child { width: 30%; font-weight: bold; }
        .identitas-tabel td:nth-child(2) { width: 5%; }
        .section-title { font-weight: bold; margin-top: 20px; text-decoration: underline; }
        .signature-area { margin-top: 50px; text-align: right; }
        .footer { position: fixed; bottom: 0; width: 100%; text-align: center; font-size: 8pt; color: #666; font-style: italic; }
    </style>
</head>
<body>
    <div class="kop">
        <div class="logo-container">P</div>
        <div class="kop-text">
            <h1>PINJOLWATCH</h1>
            <p>Gedung Teknologi Informasi, Banjarnegara, Jawa Tengah</p>
            <p>Email: bantuan@pinjolwatch.id | Website: www.pinjolwatch.id</p>
        </div>
    </div>

    <div class="content">
        <p>Nomor : PW/REPORT/{{ $report->ticket_id }}/{{ now()->format('Y/m') }}<br>
        Lampiran : 1 (satu) Berkas Bukti Digital<br>
        Perihal : <strong>Laporan Pengaduan Dugaan Praktik Pinjaman Online Ilegal / Tidak Beretika</strong></p>

        <p>Yth. <strong>Ketua Satgas PASTI / Deputi Komisioner Perlindungan Konsumen OJK</strong><br>
        Gedung Soemitro Djojohadikusumo<br>
        Jakarta Pusat</p>

        <p>Dengan hormat,</p>
        <p>Melalui surat ini, kami dari Tim PinjolWatch ingin meneruskan laporan pengaduan yang masuk melalui platform kami. Berdasarkan hasil verifikasi awal kami, terdapat dugaan pelanggaran yang dilakukan oleh entitas pinjaman online terhadap masyarakat dengan rincian sebagai berikut:</p>

        <table class="identitas-tabel">
            <tr><td>No. Tiket Laporan</td><td>:</td><td>{{ $report->ticket_id }}</td></tr>
            <tr><td>Nama Aplikasi</td><td>:</td><td>{{ $report->legalPinjol ? $report->legalPinjol->app_name : ($report->app_name ?: 'Tidak Diketahui') }}</td></tr>
            <tr><td>Jenis Pelanggaran</td><td>:</td><td>{{ $report->threatType->label }}</td></tr>
            <tr><td>Lokasi Kejadian</td><td>:</td><td>{{ $report->kabupaten->nama }}, Jawa Tengah</td></tr>
            <tr><td>Waktu Laporan</td><td>:</td><td>{{ $report->created_at->format('d F Y, H:i') }} WIB</td></tr>
        </table>

        <div class="section-title">Kronologi Kejadian:</div>
        <p>{{ $report->chronology }}</p>

        <div class="section-title">Analisis Moderasi:</div>
        <p>Pelapor telah melampirkan bukti-bukti pendukung yang valid (terlampir secara digital). Kami menilai tindakan penagihan yang dilakukan telah melampaui batas kewajaran dan melanggar prinsip perlindungan konsumen.</p>

        <p>Demikian laporan ini kami sampaikan untuk dapat ditindaklanjuti sesuai dengan ketentuan hukum yang berlaku. Atas perhatian dan kerja samanya, kami ucapkan terima kasih.</p>
    </div>

    <div class="signature-area">
        <p>Banjarnegara, {{ now()->format('d F Y') }}</p>
        <p>Hormat kami,</p>
        <br><br><br>
        <p><strong>Admin PinjolWatch</strong><br>
        (Unit Verifikasi Data Masyarakat)</p>
    </div>

    <div class="footer">
        Dokumen ini dihasilkan secara otomatis oleh Sistem Manajemen Laporan PinjolWatch.
    </div>
</body>
</html>
