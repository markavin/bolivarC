<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Purchase</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 30px 50px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #445D48;
            margin-bottom: 50px;
        }

        /* Styling untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #c9d6cf;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #c9d6cf;
            border-right: 1px solid #c9d6cf;
            border: 1px solid #c9d6cf;
        }

        th {
            background-color: #445D48;
            color: #ffffff;
            padding: 20px 12px;
            text-align: center;
            border-bottom: 1px solid #c9d6cf;
        }

        td:nth-child(1),
        th:nth-child(1) {
            width: 190px;
            /* Lebar yang lebih besar untuk Sales Date */
        }

        td:nth-child(2),
        th:nth-child(2) {
            width: 110px;
            /* Lebar yang lebih besar untuk Sales Date */
        }

        td:nth-child(3),
        th:nth-child(3) {
            width: 100px;
            /* Lebar yang lebih besar untuk Sales Date */
        }

        td:nth-child(4),
        th:nth-child(4) {
            width: auto;
            text-align: center;
        }

        td[data-label="Stock"] {
            text-align: center;

        }

        td[data-label="Price"],
        td[data-label="Sub Total"] {
            text-align: right;
        }

        /* Styling untuk button Done */
        .button-container {
            text-align: right;
            margin-top: 20px;
        }

        .button {
            padding: 10px 20px;
            background: linear-gradient(135deg, #D1FDE8 0%, #445D48 100%);
            color: #000000;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #799C8C;
        }

        /* Styling untuk Return pay */
        .input-return {
            font-weight: bold;
            color: #445D48;
        }

        /* Styling untuk menu items */
        .stock-row {
            margin-top: 15px;
        }

        /* Hiding borders for the first row */
        .transaction-details td {
            border-right: none;
            border-bottom: none;
        }

        /* Styling untuk menu row yang lebih dari 1 */
        .stock-item {
            text-align: center;
        }

        /* Styling untuk tabel dengan margin pada menu */
        .stock-row {
            text-align: left;
        }

        .details {
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .details h1 {
            margin: 20px;
            font-size: 20px;
            color: #445D48;
            text-align: left;
            display: flex;
            margin-right: 20px;
        }

        .result-box {
            background-color: rgba(255, 255, 255, 0.9);
            border: 2px solid #445D48;
            border-radius: 5px;
            padding: 10px;
            width: auto;
            text-align: left;
            font-size: 18px;
            color: #333;
            justify-content: center;
            margin-left: 10px; 
        }
    </style>
</head>

<body>
    @include('layout.sidebar')
    <div class="main-content">
        <header>
            <h1>Purchase / <span style="color: #445D48;">Appearance of Detail Purchase</span></h1>
        </header>

        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Purchase ID</th>
                        <th>Purchase Date</th>
                        <th>Stock</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- First row with transaction details -->
                    <tr class="transaction-details">
                        <td rowspan="{{ count($detailPembelian) }}">{{ $pembelian->id_pembelian }}</td>
                        <td rowspan="{{ count($detailPembelian) }}">{{ $pembelian->tanggalpembelian }}</td>
                        <td class="stock-item">{{ $detailPembelian[0]->namaBahanBaku }}</td>
                        <td>{{ $detailPembelian[0]->quantity }}</td>
                        <td>Rp {{ number_format($detailPembelian[0]->harga, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($detailPembelian[0]->subTotal, 0, ',', '.') }}</td>
                    </tr>
                    @for ($i = 1; $i < count($detailPembelian); $i++)
                        <tr class="stock-row">
                            <td class="stock-item">{{ $detailPembelian[$i]->namaBahanBaku }}</td>
                            <td>{{ $detailPembelian[$i]->quantity }}</td>
                            <td>Rp {{ number_format($detailPembelian[$i]->harga, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($detailPembelian[$i]->subTotal, 0, ',', '.') }}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>

            <div class="details">
                <div class="detail-column">
                    <h1><strong>Total Price:</strong>
                        <span class="result-box">Rp {{ number_format($pembelian->totalHarga, 0, ',', '.') }}</span>
                    </h1>
                </div>
            </div>

            <div class="button-container">
                <a href="{{ route('pembelian.show') }}" class="button">Done</a>
            </div>
        </div>
    </div>
</body>

</html>
