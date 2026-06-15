<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }
        h2 {
            text-align: center;
            margin-bottom: 5px;
        }
        p.subtitle {
            text-align: center;
            margin-bottom: 15px;
            color: #666;
        }
        .summary {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
        }
        .summary-box {
            border: 1px solid #ddd;
            padding: 8px 15px;
            border-radius: 5px;
            flex: 1;
            text-align: center;
        }
        .summary-box p {
            margin: 0;
        }
        .summary-box .label {
            font-size: 11px;
            color: #666;
        }
        .summary-box .value {
            font-size: 16px;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th {
            background-color: #4a5568;
            color: white;
            padding: 6px 8px;
            text-align: center;
        }
        td {
            border: 1px solid #ddd;
            padding: 5px 8px;
            text-align: center;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .footer {
            margin-top: 20px;
            text-align: right;
            font-size: 11px;
            color: #666;
        }
    </style>
</head>
<body>

    <h2>Laporan Transaksi Rental Mobil</h2>

    @if($request->tanggal_mulai && $request->tanggal_selesai)
        <p class="subtitle">
            Periode: {{ \Carbon\Carbon::parse($request->tanggal_mulai)->format('d/m/Y') }}
            s/d {{ \Carbon\Carbon::parse($request->tanggal_selesai)->format('d/m/Y') }}
        </p>
    @else
        <p class="subtitle">Semua Periode</p>
    @endif

    <table style="width:100%; margin-bottom:15px; border:none;">
        <tr>
            <td style="border:1px solid #ddd; padding:8px; text-align:center; width:50%;">
                <p style="margin:0; font-size:11px; color:#666;">Jumlah Transaksi</p>
                <p style="margin:0; font-size:18px; font-weight:bold;">{{ $jumlahTransaksi }}</p>
            </td>
            <td style="border:1px solid #ddd; padding:8px; text-align:center; width:50%;">
                <p style="margin:0; font-size:11px; color:#666;">Total Pendapatan</p>
                <p style="margin:0; font-size:18px; font-weight:bold;">
                    Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                </p>
            </td>
        </tr>
    </table>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Transaksi</th>
                <th>Pelanggan</th>
                <th>Mobil</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Lama Sewa</th>
                <th>Total Bayar</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transaksis as $i => $transaksi)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $transaksi->kode_transaksi }}</td>
                <td>{{ $transaksi->pelanggan->nama_pelanggan ?? '-' }}</td>
                <td>{{ $transaksi->mobil->nama_mobil ?? '-' }}</td>
                <td>{{ \Carbon\Carbon::parse($transaksi->tanggal_mulai)->format('d/m/Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($transaksi->tanggal_selesai)->format('d/m/Y') }}</td>
                <td>{{ $transaksi->lama_sewa }} hari</td>
                <td>Rp {{ number_format($transaksi->total_bayar, 0, ',', '.') }}</td>
                <td>{{ ucfirst($transaksi->status) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="9">Belum ada data transaksi.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada: {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}
    </div>

</body>
</html>
