<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Stok</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 4px;
            text-align: center;
        }

        th {
            background: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h3 style="text-align:center;">Laporan Stok Barang</h3>

    <table>
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga Satuan</th>
                <th>Stok Masuk</th>
                <th>Stok Keluar</th>
                <th>Stok Akhir</th>
                <th>Satuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item['kode_barang'] }}</td>
                    <td>{{ $item['nama_barang'] }}</td>
                    <td>{{ $item['kategori'] }}</td>
                    <td>{{ number_format($item['harga_satuan'], 0) }}</td>
                    <td>{{ $item['stok_masuk'] }}</td>
                    <td>{{ $item['stok_keluar'] }}</td>
                    <td>{{ $item['stok_akhir'] }}</td>
                    <td>{{ $item['satuan'] }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

</body>

</html>
