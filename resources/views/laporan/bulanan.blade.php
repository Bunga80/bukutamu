<!DOCTYPE html>
<html>
<head>
    <title>Laporan Kunjungan Bulanan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            font-size: 12px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #000;
            padding-bottom: 15px;
        }
        
        .header h2 {
            margin: 10px 0;
            font-size: 18px;
        }
        
        .header p {
            margin: 5px 0;
        }
        
        .info {
            margin-bottom: 20px;
        }
        
        .info table {
            width: 100%;
        }
        
        .info td {
            padding: 3px 0;
        }
        
        .info td:first-child {
            width: 150px;
            font-weight: bold;
        }
        
        table.data {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        table.data th,
        table.data td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        
        table.data th {
            background-color: #f0f0f0;
            font-weight: bold;
            text-align: center;
        }
        
        table.data td:first-child {
            text-align: center;
            width: 5%;
        }
        
        .summary {
            margin-top: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
        }
        
        .summary h4 {
            margin-bottom: 10px;
        }
        
        .footer {
            margin-top: 50px;
            text-align: right;
        }
        
        .signature {
            margin-top: 80px;
            text-align: center;
        }
        
        @media print {
            body {
                padding: 0;
            }
            
            .no-print {
                display: none;
            }
            
            @page {
                margin: 1cm;
            }
        }
    </style>
</head>
<body>
    <div class="no-print" style="margin-bottom: 20px;">
        <button onclick="window.print()" style="padding: 10px 20px; background: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">
            <i class="fas fa-print"></i> Cetak Laporan
        </button>
        <button onclick="window.close()" style="padding: 10px 20px; background: #6c757d; color: white; border: none; border-radius: 5px; cursor: pointer; margin-left: 10px;">
            Tutup
        </button>
    </div>

    <div class="header">
        <h2>Loka Labkesmas Pangandaran</h2>
        <p>Jalan Raya Pangandaran KM 3 Ds. Babakan Kabupaten Pangandaran 46396</p>
        <p>Telepon/Faksimile (0265)639375 | Email: Litbangkespangandaran@Gmail.Com</p>
        <h3 style="margin-top: 20px;">LAPORAN KUNJUNGAN BULANAN</h3>
    </div>

    <div class="info">
        <table>
            <tr>
                <td>Periode</td>
                <td>: {{ \Carbon\Carbon::create()->month($month)->translatedFormat('F') }} {{ $year }}</td>
            </tr>
            <tr>
                <td>Dicetak Pada</td>
                <td>: {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y H:i:s') }}</td>
            </tr>
        </table>
    </div>

    <table class="data">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Tamu</th>
                <th>Tanggal</th>
                <th>Nama Tamu</th>
                <th>Kontak</th>
                <th>Instansi</th>
                <th>Keperluan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kunjungans as $index => $kunjungan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $kunjungan->kode_tamu ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($kunjungan->tanggal)->format('d/m/Y') }}</td>
                    <td>{{ $kunjungan->nama }}</td>
                    <td style="word-break: break-word;">{{ $kunjungan->kontak }}</td>
                    <td>{{ $kunjungan->instansi }}</td>
                    <td>{{ $kunjungan->keperluan }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">Tidak ada data kunjungan</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="summary">
        <h4>RINGKASAN</h4>
        <table style="width: 100%;">
            <tr>
                <td style="width: 200px;">Total Kunjungan</td>
                <td>: <strong>{{ $kunjungans->count() }}</strong> kunjungan</td>
            </tr>
            <tr>
                <td>Total Instansi</td>
                <td>: <strong>{{ $kunjungans->unique('instansi')->count() }}</strong> instansi</td>
            </tr>
        </table>
    </div>

</body>
</html>