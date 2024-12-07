<!-- resources/views/dashboard/laporan/pdf.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ucfirst($tipeLaporan) }} Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        table {
            width: 93%;
            border-collapse: collapse;
            margin-top: 10px;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
            margin-left: 40px;
            margin-right: auto;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #c9d6cf;
            border-right: 1px solid #c9d6cf;
        }

        th {
            background-color: #445D48;
            color: #ffffff;
            padding: 20px 12px;
            text-align: center;
            border-bottom: 1px solid #c9d6cf;
        }

        td {
            background-color: rgba(255, 217, 180, 0.2);
            color: #000000;
            padding: 20px 12px;
            text-align: center;
            border-bottom: 1px solid #c9d6cf;
        }


        .header {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>{{ ucfirst($tipeLaporan) }} Report</h2>
        <p>{{ ucfirst($tipeLaporan) }} report from {{ $tanggalAwal }} to {{ $tanggalAkhir }}</p>
        <p>
            @if ($tipeLaporan == 'penukaran')
                <strong>Total Redemptions: {{ $totalTransaksi }}</strong>
            @elseif ($tipeLaporan == 'penjualan')
                <strong>Total Income : Rp {{ number_format($totalTransaksi, 0, ',', '.') }} </strong>
            @else
                <strong>Total Expenses : Rp {{ number_format($totalTransaksi, 0, ',', '.') }} </strong>
            @endif
        </p>
    </div>

    @if ($tipeLaporan === 'penukaran')
        <table>
            <thead>
                <tr>
                    <th>Redemption ID</th>
                    <th>Redemption Date</th>
                    <th>Customer Name</th>
                    <th>Menu Name</th>
                    <th>Status</th>
                    <th>Total Points Redeemed</th>
                    <th>Remaining Points</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporan as $data)
                    <tr>
                        <td>{{ $data->id_penukaran }}</td>
                        <td>{{ $data->tanggalPenukaran }}</td>
                        <td>{{ $data->NamaPelanggan }}</td>
                        <td>{{ $data->namaMenu }}</td>
                        <td>{{ $data->status }}</td>
                        <td>{{ $data->totalPoin }}</td>
                        <td>{{ $data->sisaPoin }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif ($tipeLaporan === 'penjualan')
        <table>
            <thead>
                <tr>
                    <th>Sales ID</th>
                    <th>Sales Date</th>
                    <th>Customer Name</th>
                    <th>Menu Name</th>
                    <th>Total Quantity</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporan as $data)
                    <tr>
                        <td>{{ $data->id_penjualan }}</td>
                        <td>{{ $data->tanggalPenjualan }}</td>
                        <td>{{ $data->NamaPelanggan }}</td>
                        <td>{{ $data->namaMenu }}</td>
                        <td>{{ $data->totalQuantity }}</td>
                        <td>{{ number_format($data->totalHarga, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif ($tipeLaporan === 'pembelian')
        <table>
            <thead>
                <tr>
                    <th>Purchase ID</th>
                    <th>Purchase Date</th>
                    <th>Stock Name</th>
                    <th>Total Quantity</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporan as $data)
                    <tr>
                        <td>{{ $data->id_pembelian }}</td>
                        <td>{{ $data->purchase_date }}</td>
                        <td>{{ $data->namaBahanBaku }}</td>
                        <td>{{ $data->toquantity }}</td>
                        <td>{{ number_format($data->total_price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No data available for this report type.</p>
    @endif
</body>

</html>
