<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #0d9488;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #0d9488;
            text-transform: uppercase;
        }
        .title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #111;
        }
        .category {
            display: inline-block;
            padding: 4px 12px;
            background: #f0fdfa;
            color: #0d9488;
            border-radius: 999px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 20px;
        }
        .content {
            font-size: 14px;
            white-space: pre-wrap;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 10px;
            color: #999;
            border-top: 1px solid #eee;
            padding-top: 10px;
            padding-bottom: 20px;
        }
        .highlight {
            background: #fffbeb;
            border-left: 4px solid #f59e0b;
            padding: 15px;
            margin: 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f9fafb;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">PinjolWatch Indonesia</div>
        <div style="font-size: 12px; color: #666;">Platform Pengaduan & Edukasi Anti-Pinjol Ilegal</div>
    </div>

    <div class="category">{{ $category }}</div>
    <h1 class="title">{{ $title }}</h1>
    
    <div class="content">
        {!! $content !!}
    </div>

    <div class="footer">
        &copy; 2026 PinjolWatch.id - Dokumen ini dilindungi hak cipta untuk tujuan edukasi non-komersial.
    </div>
</body>
</html>
