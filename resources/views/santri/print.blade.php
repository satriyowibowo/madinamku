<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Santri</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px double #333;
            padding-bottom: 20px;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .section {
            margin-bottom: 25px;
        }
        .section-title {
            background-color: #f0f0f0;
            padding: 8px 12px;
            font-weight: bold;
            border-left: 4px solid #2c5282;
            margin-bottom: 15px;
        }
        .data-row {
            display: flex;
            margin-bottom: 8px;
        }
        .data-label {
            width: 200px;
            font-weight: bold;
            flex-shrink: 0;
        }
        .data-value {
            flex-grow: 1;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f5f5f5;
        }
        .footer {
            margin-top: 50px;
            text-align: right;
        }
        .signature {
            margin-top: 80px;
            border-top: 1px solid #333;
            width: 300px;
            text-align: center;
            margin-left: auto;
        }
        @media print {
            .no-print {
                display: none;
            }
            body {
                padding: 0;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">Kuttab Miftahu Khairil Ummah</div>
        <div class="address">Taman Wisma Asri Jl. Delima V Blok D14 Teluk Pucung Bekasi Utara Kota Bekasi</div>
        <div class="title">FORMULIR PENDAFTARAN SANTRI PPDB 2025/2026</div>
    </div>

    <div class="section">
        <div class="section-title">DATA SANTRI</div>
        <div class="data-row">
            <div class="data-label">Status Pendaftaran</div>
            <div class="data-value">: {{ strtoupper($santri->status) }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Nama Lengkap</div>
            <div class="data-value">: {{ $santri->nama_lengkap }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Nama Panggilan</div>
            <div class="data-value">: {{ $santri->nama_panggilan }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Tempat, Tanggal Lahir</div>
            <div class="data-value">: {{ $santri->tempat_lahir }}, {{ date('d-m-Y', strtotime($santri->tanggal_lahir)) }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Alamat Lengkap</div>
            <div class="data-value">: {{ $santri->alamat_lengkap }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Sekolah Asal</div>
            <div class="data-value">: {{ $santri->sekolah_asal }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">NISN</div>
            <div class="data-value">: {{ $santri->nisn ?? '-' }}</div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">DATA ORANG TUA</div>
        
        <h4>Ayah</h4>
        @php($ayah = $santri->orangTua->where('tipe', 'ayah')->first())
        <div class="data-row">
            <div class="data-label">Nama</div>
            <div class="data-value">: {{ $ayah->nama }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Tempat, Tanggal Lahir</div>
            <div class="data-value">: {{ $ayah->tempat_lahir }}, {{ date('d-m-Y', strtotime($ayah->tanggal_lahir)) }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Kontak</div>
            <div class="data-value">: {{ $ayah->kontak }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Alamat</div>
            <div class="data-value">: {{ $ayah->alamat }}</div>
        </div>
        
        <h4>Ibu</h4>
        @php($ibu = $santri->orangTua->where('tipe', 'ibu')->first())
        <div class="data-row">
            <div class="data-label">Nama</div>
            <div class="data-value">: {{ $ibu->nama }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Tempat, Tanggal Lahir</div>
            <div class="data-value">: {{ $ibu->tempat_lahir }}, {{ date('d-m-Y', strtotime($ibu->tanggal_lahir)) }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Kontak</div>
            <div class="data-value">: {{ $ibu->kontak }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Alamat</div>
            <div class="data-value">: {{ $ibu->alamat }}</div>
        </div>
    </div>

    @if($santri->orangTua->where('tipe', 'wali')->count() > 0)
    <div class="section">
        <div class="section-title">DATA WALI</div>
        @php($wali = $santri->orangTua->where('tipe', 'wali')->first())
        <div class="data-row">
            <div class="data-label">Nama</div>
            <div class="data-value">: {{ $wali->nama }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Tempat, Tanggal Lahir</div>
            <div class="data-value">: {{ $wali->tempat_lahir }}, {{ date('d-m-Y', strtotime($wali->tanggal_lahir)) }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Kontak</div>
            <div class="data-value">: {{ $wali->kontak }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Alamat</div>
            <div class="data-value">: {{ $wali->alamat }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Hubungan dengan Santri</div>
            <div class="data-value">: {{ $wali->hubungan }}</div>
        </div>
    </div>
    @endif

    <div class="section">
        <div class="section-title">INFORMASI PEMBAYARAN</div>
        <div class="data-row">
            <div class="data-label">No. Rekening Pengirim</div>
            <div class="data-value">: {{ $santri->no_rekening }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Bukti Transfer</div>
            <div class="data-value">: Terlampir</div>
        </div>
    </div>

    <div class="footer">
        <div>_______________, {{ date('d-m-Y') }}</div>
        <div class="signature">
            Orang Tua/Wali Calon Santri,
		<br>
            {{ $santri->nama_lengkap }}
        </div>
    </div>

    <div class="no-print" style="margin-top: 30px; text-align: center;">
        <button onclick="window.print()" class="btn btn-primary">Cetak Formulir</button>
        <a href="{{ route('santri.create') }}" class="btn btn-success">Kembali ke Form Pendaftaran</a>
    </div>
</body>
</html>
