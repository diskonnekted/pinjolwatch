<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan PinjolWatch - {{ $report->ticket_id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        .header {
            border-bottom: 2px solid #0d9488;
            padding-bottom: 10px;
            margin-bottom: 20px;
            text-align: center;
        }
        .header h1 {
            color: #0d9488;
            margin: 0;
            font-size: 24px;
            text-transform: uppercase;
        }
        .header p {
            margin: 5px 0 0 0;
            color: #64748b;
            font-size: 12px;
        }
        .section {
            margin-bottom: 20px;
        }
        .section-title {
            background-color: #f1f5f9;
            padding: 8px 12px;
            font-weight: bold;
            color: #0f172a;
            border-left: 4px solid #0d9488;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px 12px;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: top;
        }
        th {
            text-align: left;
            width: 35%;
            color: #475569;
            font-weight: bold;
        }
        .footer {
            margin-top: 40px;
            padding-top: 10px;
            border-top: 1px solid #cbd5e1;
            text-align: center;
            font-size: 11px;
            color: #94a3b8;
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="{{ $logoSrc }}" alt="PinjolWatch Logo" style="height: 60px; margin-bottom: 10px;">
        <p>Laporan Resmi Korban Pinjaman Online</p>
    </div>

    <div style="margin-bottom: 30px; font-size: 14px;">
        <p>Kepada Yth.</p>
        <p><strong>Satgas PASTI OJK</strong></p>
        <p>(Satuan Tugas Pemberantasan Aktivitas Keuangan Ilegal)</p>
        <p>Gedung Menara Radius Prawiro, Lt. 2</p>
        <p>Jalan M.H. Thamrin No. 2, Gambir, Jakarta Pusat, 10110.</p>
    </div>

    <div class="section">
        <div class="section-title">Informasi Tiket</div>
        <table>
            <tr>
                <th>No. Tiket</th>
                <td><strong>{{ $report->ticket_id }}</strong></td>
            </tr>
            <tr>
                <th>Tanggal Laporan</th>
                <td>{{ $report->created_at->format('d F Y H:i') }}</td>
            </tr>
            <tr>
                <th>Status Laporan</th>
                <td style="text-transform: uppercase; font-weight: bold;">{{ $report->status }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Detail Ancaman & Aplikasi</div>
        <table>
            <tr>
                <th>Aplikasi Pinjol Utama</th>
                <td>{{ $report->legalPinjol ? $report->legalPinjol->app_name . ' (' . $report->legalPinjol->company_name . ')' : ($report->app_name ?? 'Tidak disebutkan') }}</td>
            </tr>
            <tr>
                <th>Jumlah Aplikasi Pinjol</th>
                <td>{{ $report->pinjol_count }} Aplikasi</td>
            </tr>
            <tr>
                <th>Aplikasi Terlibat Lainnya</th>
                <td>{{ $report->involved_apps ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jenis Ancaman Utama</th>
                <td>{{ $report->threatType ? $report->threatType->label : '-' }}</td>
            </tr>
            <tr>
                <th>Lokasi Domisili</th>
                <td>{{ $report->kabupaten ? $report->kabupaten->nama . ', ' . ($report->kabupaten->province ? $report->kabupaten->province->name : '') : '-' }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Kronologi Kejadian</div>
        <div style="padding: 12px; border: 1px solid #e2e8f0; background-color: #fafafa; white-space: pre-wrap;">{{ $report->chronology }}</div>
    </div>

    @if($report->dc_actions && count($report->dc_actions) > 0)
    <div class="section">
        <div class="section-title">Tindakan Penagih (Debt Collector)</div>
        <ul>
            @foreach($report->dc_actions as $action)
                <li>{{ $action }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="section">
        <div class="section-title">Informasi Tambahan</div>
        <table>
            <tr>
                <th>Nomor Kontak Penagih</th>
                <td>{{ $report->contact_phone_number ?: '-' }}</td>
            </tr>
            <tr>
                <th>Penyebutan Identitas</th>
                <td>{{ $report->identity_disclosure == 'menyebutkan_aplikasi' ? 'Ya, menyebutkan aplikasi' : ($report->identity_disclosure == 'tidak_menyebutkan' ? 'Tidak menyebutkan aplikasi' : '-') }}</td>
            </tr>
            <tr>
                <th>Nada Komunikasi</th>
                <td>{{ $report->communication_tone == 'kasar_ancaman' ? 'Kasar & Mengancam' : ($report->communication_tone == 'santun_resmi' ? 'Santun/Resmi' : '-') }}</td>
            </tr>
        </table>
    </div>

    @if(!empty($evidenceItems))
    <div style="page-break-before: always;"></div>
    <div class="header">
        <img src="{{ $logoSrc }}" alt="PinjolWatch Logo" style="height: 60px; margin-bottom: 10px;">
        <p>Lampiran Bukti Laporan</p>
    </div>
    <div class="section">
        @foreach($evidenceItems as $index => $item)
            <div style="margin-bottom: 30px; border: 1px solid #e2e8f0; padding: 15px;">
                <h4 style="margin-top: 0;">Lampiran {{ $index + 1 }}: {{ $item['original_name'] }}</h4>
                <p style="font-size: 12px; color: #64748b;">Tipe File: {{ $item['mime_type'] }}</p>
                
                @if($item['is_image'] && $item['base64'])
                    <div style="text-align: center; margin-top: 15px;">
                        <img src="{{ $item['base64'] }}" style="max-width: 100%; max-height: 800px; border: 1px solid #cbd5e1;">
                    </div>
                @elseif($item['is_image'])
                    <p style="color: #ef4444; font-size: 12px;">(Gambar tidak dapat ditampilkan atau terenkripsi secara eksternal)</p>
                @else
                    <p style="font-style: italic; font-size: 12px;">(File berupa audio, video, atau dokumen non-gambar. Tersimpan aman di dalam server dan akan diserahkan kepada pihak berwenang sesuai persetujuan).</p>
                @endif
            </div>
        @endforeach
    </div>
    @endif

    <div class="footer">
        <p>Dokumen ini di-generate secara otomatis oleh sistem PinjolWatch pada {{ now()->format('d F Y H:i') }}.</p>
        <p>Dokumen ini bersifat rahasia dan merupakan bukti pelaporan yang sah pada platform PinjolWatch.</p>
    </div>

</body>
</html>
