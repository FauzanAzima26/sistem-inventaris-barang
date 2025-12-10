<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 11px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 5px;
            text-align: center;
        }

        th {
            background: #eee;
            font-weight: bold;
        }

        h3 {
            text-align: center;
            margin-bottom: 5px;
            text-transform: uppercase;
        }
    </style>
</head>

<body>

    <h3>Laporan Detail Transaksi</h3>

    <table style="width:100%; border:none;">
        <tr>
            <td><strong>No Transaksi:</strong></td>
            <td>{{ $transaksi->kode_transaksi }}</td>
        </tr>
        <tr>
            <td><strong>Tanggal:</strong></td>
            <td>{{ $transaksi->tgl_transaksi }}</td>
        </tr>
        <tr>
            <td><strong>Jenis Transaksi:</strong></td>
            <td>{{ ucfirst($transaksi->jenis_transaksi) }}</td>
        </tr>
        <tr>
            <td><strong>Keterangan:</strong></td>
            <td>{{ $transaksi->keterangan }}</td>
        </tr>
    </table>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Qty</th>
                <th>Harga Satuan</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi->items as $i => $item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $item->barang->kode_barang ?? '-' }}</td>
                    <td>{{ $item->barang->nama ?? '-' }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->subtotal, 0, ',', '.') }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="5" style="text-align:right;font-weight:bold;">TOTAL</td>
                <td style="font-weight:bold;">
                    {{ number_format($transaksi->items->sum('subtotal'), 0, ',', '.') }}
                </td>
            </tr>
        </tbody>
    </table>

</body>

</html>
