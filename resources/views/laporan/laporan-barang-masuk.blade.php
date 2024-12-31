<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Laporan Stok Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 12px;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .header p {
            margin: 5px 0;
        }

        .table-container {
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .footer {
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Laporan Barang Masuk</h1>
            <p>Periode: {{ \Carbon\Carbon::parse(request('start_date'))->format('d F Y') }} -
                {{ \Carbon\Carbon::parse(request('end_date'))->format('d F Y') }}</p>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Supplier</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Tanggal Terima</th>
                        <th>Diterima digudang</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $p)
                        <tr>
                            <td>{{ $p->kode }}</td>
                            <td>{{ $p->supplier->nama }}</td>
                            <td>{{ $p->barang->nama_barang }}</td>
                            <td>{{ $p->jumlah }}</td>
                            <td>{{ $p->tanggal_terima }}</td>
                            <td>{{ $p->gudang->nama }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Laporan Data Barang Masuk.</p>
        </div>
    </div>
</body>

</html>
