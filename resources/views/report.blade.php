<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Report</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 14px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
        }

        .kop {
            text-align: center;
            font-size: 1em;
            color: #000;
        }

        .left {
            text-align: left;
        }

        .total {
            font-weight: bold;
            color: #000;
        }
    </style>
</head>

<body>
    <div id="printable" class="container">
        <h2>Laporan Penjualan {{ $tglAwal }} - {{ $tglAkhir }}</h2>
        <table>
            <thead>
                <tr class="kop">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Total Transaksi</th>
                    <th>Total Penjualan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->transaction }}</td>
                        <td>Rp.{{ $item->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
