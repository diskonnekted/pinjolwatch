<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; color: #111; font-size: 11px; }
        .header { text-align: center; border-bottom: 2px solid #2563eb; padding-bottom: 10px; margin-bottom: 20px; }
        .header h1 { margin: 0; font-size: 16px; color: #2563eb; }
        .meta { display: flex; justify-content: space-between; margin-bottom: 15px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ccc; padding: 6px; text-align: left; vertical-align: top; }
        th { background: #f3f4f6; font-weight: bold; }
        .footer { margin-top: 40px; font-size: 9px; color: #555; border-top: 1px solid #ccc; padding-top: 8px; }
        .signature { text-align: right; margin-top: 30px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>PINJOLWATCH - LAPORAN PENGADUAN MASYARAKAT</h1>
        <p>Dokumen ini bersifat draft dan disiapkan untuk keperluan verifikasi otoritas.</p>
    </div>

    <div class="meta">
        <div>
            <strong>Tanggal Ekspor:</strong> {{ now()->format('d/m/Y H:i') }}<br>
            <strong>Filter Periode:</strong> {{ $start ?? 'Semua' }} s/d {{ $end ?? 'Semua' }}<br>
            <strong>Status:</strong> {{ $status ?? 'Semua' }}
        </div>
        <div style="text-align: right;">
            <strong>Total Laporan:</strong> {{ $reports->count() }}<br>
            <strong>Lingkup Consent:</strong> {{ $consent_label ?? 'Internal & Otoritas' }}
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th width="10%">Tiket</th>
                <th width="12%">Kabupaten</th>
                <th width="15%">Aplikasi</th>
                <th width="18%">Jenis Ancaman</th>
                <th width="25%">Kronologi Singkat</th>
                <th width="10%">Status</th>
                <th width="10%">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $r)
            <tr>
                <td>{{ $r->ticket_id }}</td>
                <td>{{ $r->kabupaten->nama ?? '-' }}</td>
                <td>{{ $r->app_name ?? '-' }}</td>
                <td>{{ $r->threatType->label ?? '-' }}</td>
                <td>{{ Str::limit($r->chronology, 80) }}</td>
                <td>{{ ucfirst($r->status) }}</td>
                <td>{{ $r->created_at->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="signature">
        <p>Hormat kami,</p>
        <br><br>
        <p><strong>Tim Moderasi PinjolWatch</strong><br>
        Dokumen ini dihasilkan secara otomatis oleh sistem.<br>
        Kontak: admin@pinjolwatch.id | +62 812 XXXX XXXX</p>
    </div>

    <div class="footer">
        <strong>Disclaimer:</strong> Data dalam dokumen ini bersifat faktual berdasarkan pengaduan masyarakat. PinjolWatch tidak memverifikasi kebenaran mutlak setiap klaim sebelum diteruskan ke otoritas. Penggunaan data ini harus sesuai dengan UU No. 27 Tahun 2022 tentang Pelindungan Data Pribadi dan peraturan perundang-undangan yang berlaku.
    </div>
</body>
</html>
