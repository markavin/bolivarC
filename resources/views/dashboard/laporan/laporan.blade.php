<!-- resources/views/laporan/index.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee - Reports</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        /* CSS untuk Responsif */

        .report-view {
            margin-top: 20px;
        }

        .search-bar {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .search-input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-left: 10px;
        }

        .create-btn {
            padding: 10px 15px;
            background-color: #5b9bd5;
            color: #000000;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .create-text {
            margin-right: 5px;
            color: #000000
        }

        .create-btn .material-symbols-outlined {
            color: #000000
        }

        /* Styling tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
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

        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .header-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .filter-panel {
            display: block;
            position: fixed;
            right: 0;
            top: 0;
            width: 300px;
            background-color: #6A6968;
            color: #ffffff;
            padding: 20px;
            height: 100vh;
            transform: translateX(100%);
            transition: transform 0.3s ease;
            font-family: 'Roboto', sans-serif;
            font-size: medium;
            z-index: 10;
            /* Ensure it overlays main content */
        }

        .filter-panel.active {
            transform: translateX(0);
        }

        .visually-hidden {
            display: block;
            color: #ffffff;
            font-family: 'Roboto', sans-serif;
            font-size: medium;
            margin-top: 50px;
            margin-bottom: 20px;
        }

        .visually-tanggal {
            display: block;
            color: #ffffff;
            font-family: 'Roboto', sans-serif;
            font-size: medium;
            margin-top: 30px;
        }

        .filter-panel select {
            display: inline-block;
            align-items: center;
            background: linear-gradient(135deg, #38B568 0%, #445D48 100%);
            color: #ffffff;
            gap: 10px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: auto;
            text-align: center;
            background-color: #ffffff;

        }

        .filter-panel option {
            filter: invert(1);
            color: #000000;
        }

        .filter-panel input {
            display: inline-block;
            align-items: center;
            background: linear-gradient(135deg, #38B568 0%, #445D48 100%);
            color: #ffffff;
            gap: 10px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: auto;
            text-align: center;
            background-color: #ffffff;
        }

        .filter-panel input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
        }

        .filter-buttons {
            margin-top: 50px;
        }

        .alert-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 10px;
        }

        .alert-container .alert {
            display: inline-block;
        }

        .cancel-btn {
            display: inline-block;
            align-items: center;
            background: #ffffff;
            color: #000000;
            gap: 10px;
            border: none;
            padding: 5px;
            border-radius: 8px;
            cursor: pointer;
            height: 25px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 50px;
            text-align: right;
        }

        .done-btn {
            display: inline-block;
            align-items: center;
            background: linear-gradient(135deg, #B0EACD 0%, #445D48 100%);
            color: #000000;
            gap: 10px;
            border: none;
            padding: 5px;
            border-radius: 8px;
            cursor: pointer;
            height: 25px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 50px;
            text-align: center;
            margin-left: 140px;
        }

        .toggle-filter-btn {
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #B0EACD 0%, #445D48 100%);
            color: #000000;
            gap: 10px;
            border: none;
            padding: 10px;
            border-radius: 8px;
            cursor: pointer;
            height: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: auto;
            text-align: center;
        }

        .toggle-filter-btn:hover {
            background: linear-gradient(135deg, #C3F3DB 0%, #556D58 100%);
        }

        .toggle-filter-btn .material-symbols-outlined {
            font-size: 20px;
            color: #000000;
        }

        .create-text {
            font-size: 15px;
            margin-left: 0px;
        }

        .export-buttons button {
            display: inline-flex;
            align-items: center;
            background: linear-gradient(135deg, #B0EACD 0%, #445D48 100%);
            color: #000000;
            gap: 10px;
            border: none;
            padding: 10px;
            border-radius: 8px;
            cursor: pointer;
            height: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: auto;
            text-align: center;
            margin-top: 30px;
        }

        .export-buttons button:hover {
            background: linear-gradient(135deg, #C3F3DB 0%, #556D58 100%);
        }

        .export-buttons .material-symbols-outlined {
            font-size: 20px;
            color: #000000;
        }

        .export-container {
            text-align: center;
        }

        /* Media Queries untuk tampilan mobile */
        @media (max-width: 768px) {
            .search-bar {
                display: flex;
                /* Pastikan display adalah flex */
                flex-direction: row;
                /* Ubah dari column ke row */
                align-items: center;
                /* Center align items vertically */
                gap: 10px;
                /* Tambahkan jarak antar elemen */
                margin-top: 30px;
                margin-bottom: 30px;
                width: 100%;
                /* Pastikan lebar 100% */
            }

            .search-input {
                padding: 10px;
                /* Padding yang seimbang */
                border: 1px solid #c9d6cf;
                border-radius: 8px;
                width: 100%;
                /* Pastikan input mengambil ruang yang tersedia */
                font-size: 16px;
                height: 40px;
                /* Tinggi kotak input */
                box-sizing: border-box;
                /* Pastikan padding tidak mempengaruhi lebar total */
                text-align: left;
                /* Atur teks untuk rata kiri */
            }

            .create-btn {
                width: auto;
                /* Ubah lebar menjadi auto */
                flex-shrink: 0;
                /* Mencegah tombol untuk menyusut */
            }


            table {
                font-size: 14px;
                /* Mengurangi ukuran font pada tabel */
            }

            th,
            td {
                display: block;
                width: 100%;
                /* Membuat setiap sel menempati lebar penuh */
            }

            th {
                position: absolute;
                top: -9999px;
                /* Menghilangkan th dari tampilan */
                left: -9999px;
            }

            .action-buttons {
                display: flex;
                gap: 8px;
                justify-content: flex-end;
                /* Mengatur tombol ke sebelah kanan */
                align-items: center;
                width: 100%;
            }


            td {
                text-align: right;
                /* Rata kanan untuk td */
                padding-left: 50%;
                /* Memberi ruang untuk label */
                position: relative;
                padding: 10px;
                /* Pastikan ada padding agar tampak rapi */
            }

            /* Menjaga agar label tetap berfungsi dalam tampilan mobile */
            td::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                width: calc(50% - 20px);
                padding-right: 10px;
                text-align: left;
                font-weight: bold;
            }

            .export-buttons button {
                display: inline-flex;
                align-items: center;
                background: linear-gradient(135deg, #B0EACD 0%, #445D48 100%);
                color: #000000;
                gap: 10px;
                border: none;
                padding: 10px;
                border-radius: 8px;
                cursor: pointer;
                height: 40px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                width: auto;
                text-align: center;
                margin-top: 30px;
            }

            .export-buttons button:hover {
                background: linear-gradient(135deg, #C3F3DB 0%, #556D58 100%);
            }

            .export-buttons .material-symbols-outlined {
                font-size: 20px;
                color: #000000;
            }

            .export-container {
                text-align: center;
            }

        }
    </style>
</head>

<body>
    @include('layout.sidebar')

    <div class="main-content">
        <header>
            <h1>Bolívar Coffee - Reports <span class="status-dot"></span></h1>
        </header>

        <div class="report-view">
            @if ($tanggalAwal && $tanggalAkhir)
                <div class="container">
                    <div class="alert-awal">
                        @if ($tipeLaporan == 'penjualan')
                            Sales Reports from {{ $tanggalAwal }} - {{ $tanggalAkhir }}
                        @else
                            Purchase Reports from {{ $tanggalAwal }} - {{ $tanggalAkhir }}
                        @endif
                    </div>
                </div>
            @endif
            <div class="alert-container">
                <div class="alert"> 
                    @if ($tipeLaporan == 'penjualan')
                        <strong>Total Income :  Rp {{ number_format($totalTransaksi, 0, ',', '.') }} </strong>
                    @else
                        <strong>Total Expenses :  Rp {{ number_format($totalTransaksi, 0, ',', '.') }} </strong>
                    @endif
                </div>
                <button class="toggle-filter-btn" onclick="toggleFilterPanel()">
                    <span class="material-symbols-outlined">filter_alt</span> Filter
                </button>
            </div>

            <!-- Report Table -->
            <table>
                <thead>
                    <tr>
                        @if ($tipeLaporan == 'penjualan')
                            <th>Sales ID</th>
                            <th>Sales Date</th>
                            <th>Customer Name</th>
                            <th>Menu</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        @else
                            <th>Purchase ID</th>
                            <th>Purchase Date</th>
                            <th>Stock Name</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporan as $data)
                        <tr>
                            @if ($tipeLaporan == 'penjualan')
                                <td data-label="Sales ID">{{ $data->id_penjualan }}</td>
                                <td data-label="Sales Date">{{ $data->tanggalPenjualan }}</td>
                                <td data-label="Customer Name">{{ $data->NamaPelanggan }}</td>
                                <td data-label="Menu">{{ $data->namaMenu }}</td>
                                <td data-label="Quantity">{{ $data->totalQuantity }}</td>
                                <td data-label="Total Price">Rp{{ number_format($data->totalHarga, 0, ',', '.') }}</td>
                            @else
                                <td data-label="Purchase ID">{{ $data->id_pembelian }}</td>
                                <td data-label="Purchase Date">{{ $data->purchase_date }}</td>
                                <td data-label="Stock Name">{{ $data->namaBahanBaku }}</td>
                                <td data-label="Quantity">{{ $data->toquantity }}</td>
                                <td data-label="Total Price">Rp{{ number_format($data->total_price, 0, ',', '.') }}
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="export-container" style="margin-top: 20px; text-align: left;">
            <div class="export-buttons">
                <form action="{{ route('laporan.exportExcel') }}" method="GET">
                    <input type="hidden" name="tipe" value="{{ $tipeLaporan }}">
                    <input type="hidden" name="tanggal_awal" value="{{ $tanggalAwal }}">
                    <input type="hidden" name="tanggal_akhir" value="{{ $tanggalAkhir }}">
                    <button type="submit" class="export-btn">Export to Excel</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Filter Panel -->
    <div class="filter-panel" id="filterPanel">
        <h2>Opsi Filter</h2>
        <form method="GET" action="{{ route('laporan.index') }}">
            <div>
                <label for="tipe" class="visually-hidden">Choose Transactions</label>
                <select name="tipe" id="tipe">
                    <option value="penjualan" {{ request('tipe') == 'penjualan' ? 'selected' : '' }}>Sales</option>
                    <option value="pembelian" {{ request('tipe') == 'pembelian' ? 'selected' : '' }}>Purchase</option>
                </select>
            </div>
            <div>
                <label for="tanggal_awal" class="visually-tanggal">Choose Date</label>
                <div style="display: flex; align-items: center;">
                    <div style="text-align: center; margin-right: 10px;">
                        <label for="tanggal_awal" </label><br>
                            <input type="date" name="tanggal_awal" id="tanggal_awal"
                                value="{{ request('tanggal_awal') }}">
                    </div>
                    <div style="text-align: center; margin-left: 10px;">
                        <label for="tanggal_akhir" </label><br>
                            <input type="date" name="tanggal_akhir" id="tanggal_akhir"
                                value="{{ request('tanggal_akhir') }}">
                    </div>
                </div>
            </div>

            <div class="filter-buttons">
                <button type="button" class="cancel-btn" onclick="toggleFilterPanel()">Cancel</button>
                <button type="submit" class="done-btn">Done</button>
            </div>
        </form>
    </div>


    <script>
        function toggleFilterPanel() {
            const filterPanel = document.getElementById('filterPanel');
            const mainContent = document.querySelector('.main-content');
            filterPanel.classList.toggle('active');
            mainContent.classList.toggle('blurred');
        }
    </script>
</body>

</html>
