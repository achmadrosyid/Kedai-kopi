<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Nota</title>
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
        <h2>Nota Pembelian - {{ $transaction->nama_pelanggan }} Meja: {{$transaction->id_meja}}</h2>
        <table>
            <thead>
                <tr class="kop">
                    <th>No</th>
                    <th>Nama Menu</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>Rp.{{ $item->harga }}</td>
                        <td>Rp.{{ $item->total }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot class="total">
                <tr>
                    <td colspan="3">Diskon</td>
                    <td colspan="2">Rp. {{ $transaction['diskon'] }}</td>
                </tr>
                <tr>
                    <td colspan="3">Total</td>
                    <td colspan="2">Rp. {{ $transaction['total'] }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>

</html>
