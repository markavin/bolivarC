<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .notification {
            position: fixed;
            top: 25px;
            right: 40px;
            margin-left: 0;
            z-index: 1000;
        }

        .container {
            overflow-x: hidden;
            max-width: 100vw;
        }

        h1 {
            font-size: 30px;
            color: #333;
            font-weight: bold;
        }

        body {
            overflow-x: hidden;
            margin: 0;
            /* Hilangkan margin bawaan body untuk menghindari geseran */
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        header {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding-left: 7px;
        }


        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(5px);
            background-color: rgba(0, 0, 0, 0.4);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 90%;
            max-width: 400px;
        }

        .modal-header {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #c90000;
            text-align: center;
            justify-items: center;
        }

        .modal-buttons {
            margin-top: 20px;
            display: flex;
            justify-content: space-around;
            color: #445D48
        }

        .modal-button {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        .confirm-button {
            background-color: #445D48;
            color: rgb(240, 240, 240);
        }

        .cancel-button {
            background-color: #c7c7c7;
            color: rgb(255, 255, 255);
        }

        .modal-button:hover {
            opacity: 0.9;
        }

        .success-modal {
            display: none;
            position: fixed;
            z-index: 1100;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(5px);
            background-color: rgba(0, 0, 0, 0.4);
            justify-content: center;
            align-items: center;
        }

        .success-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 90%;
            max-width: 400px;
        }

        #profileModal {
            display: none;
            position: fixed;
            z-index: 1100;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            justify-content: center;
            align-items: center;
            width: 400px;
            /* Sesuaikan lebar modal */
            background: linear-gradient(135deg, #445D48 0%, #799C8C 48%, #445D48 100%);
            /* Warna hijau lembut */
            border-radius: 12px;
            padding: 20px;
            border: none;
            /* Hapus garis di sekitar modal */
        }

        #profileModal .modal-content {

            width: 100%;
            background-color: transparent;
            box-shadow: none;
            border: none;
        }

        #profileModal .modal-title {
            color: #ffffff;
            text-align: center;
            justify-items: center;
        }

        #profileModal .modal-body {
            display: flex;
            flex-direction: column;
            gap: 15px;
            /* Spasi antar elemen */
        }

        #profileModal .modal-header,
        #profileModal .modal-footer {
            border: none;
            padding: 10px 20px;
            justify-content: center;
            border-bottom: none;
            color: #ffffff;
        }

        #profileModal .modal-body {
            display: flex;
            flex-direction: column;
            gap: 15px;
            justify-content: center;
        }

        #profileModal .modal-body p {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            font-size: 16px;
            color: #ffffff;
            /* Warna teks label */
        }

        #profileModal .modal-body p strong {
            flex: 1;
            text-align: left;
            margin-right: 10px;
        }

        #profileModal .modal-body p span {
            background-color: #ffffff;
            /* Warna latar belakang kotak */
            color: #4C6650;
            /* Warna teks isi */
            padding: 5px 10px;
            border-radius: 8px;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
            /* Efek bayangan dalam */
            border: 1px solid #d3d3d3;
            /* Garis tipis dengan warna abu-abu */
            width: calc(100% - 150px);
            /* Memperpanjang kotak agar lebih besar */
            text-align: center;
            /* Teks di dalam span rata tengah */
            margin-left: auto;
            /* Geser kotak putih ke kanan */
        }


        #profileModal .modal-footer {
            display: flex;
            justify-content: center;
            border-top: none;
            /* Hapus garis atas footer */
        }

        #profileModal .btn-close {
            background-color: #fff;
            color: #000000;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            cursor: pointer;
            font-weight: bold;
            display: inline-block;
            width: auto;
            text-align: center;
            /* Teks di dalam tombol di tengah */
        }

        #profileModal .btn-close .material-symbols-outlined {
            display: none;
        }

        #resetPasswordModal {
            display: none;
            position: fixed;
            z-index: 1100;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            justify-content: center;
            align-items: center;
            width: 450px;
            background: linear-gradient(135deg, #445D48 0%, #799C8C 48%, #445D48 100%);
            border-radius: 12px;
            padding: 20px;
            border: none;
        }

        #resetPasswordModal .modal-content {
            width: 500%;
            background-color: transparent;
            box-shadow: none;
            border: none;
        }

        #resetPasswordModal .modal-header,
        #resetPasswordModal .modal-footer {
            border: none;
            /* Hapus garis pada header dan footer */
            padding: 10px 20px;
            justify-content: center;
            /* Atur padding agar simetris */
        }

        #resetPasswordModal .modal-title {
            color: #ffffff;
            font-size: 24px;
        }

        #resetPasswordModal .modal-body {
            display: flex;
            flex-direction: column;
            gap: 15px;
            color: #ffffff;
            /* Atur warna teks menjadi putih */
            text-align: left;
            /* justify-content: center; */
        }

        #resetPasswordModal .modal-label {
            display: flex;
            flex-direction: column;
            gap: 15px;
            color: #ffffff;
            text-align: center;
        }

        #resetPasswordModal .btn-secondary,
        #resetPasswordModal .btn-primary {
            border-radius: 8px;
            padding: 10px 20px;
            cursor: pointer;
        }

        #resetPasswordModal .btn-secondary {
            background-color: #c7c7c7;
            color: #000;
        }

        #resetPasswordModal .btn-primary {
            z-index: 9999;
            background-color: #445D48;
            color: #fff;
        }

        .btn-secondary {
            background-color: #c7c7c7;
            color: #000;
            border-radius: 8px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #445D48;
            color: #fff;
            border-radius: 8px;
            padding: 10px 20px;
            cursor: pointer;
            overflow-x;
        }


        .main-content {
            position: relative padding: 20px;
            /* Jarak di dalam konten utama */
        }

        .overview {
            width: auto;
            height: auto;
            max-height: 250px;
            /* Menyesuaikan tinggi maksimum lebih rendah */
            overflow-y: auto;
            /* Jika konten melebihi tinggi, tampilkan scroll */
            padding: 5px;
            box-sizing: border-box;
            display: inline-block;
            background-color: #f5f5f5;
            border-radius: 8px;
        }


        .overview-view {
            margin-top: 20px;
        }

        .summary {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .summary-card {
            flex: 1;
            background: linear-gradient(180deg, #D1FDE8 0%, #445D48 100%);
            /* Ubah warna latar belakang menjadi gradien */
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .summary-card h5 {
            /* Warna teks untuk "Total Revenue", "Total Sales Transactions", dan "Total Customers" */
            font-size: 16px;
            color: #000000;
            margin-bottom: 10px;
        }

        .summary-card h3 {
            font-size: 24px;
            color: #3b4a3e;
        }

        /* Chart Section */
        .chart-section {
            width: 100%;
            height: 500px;
            background-color: #f4f4f4;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .chart-section h5 {
            font-size: 18px;
            color: #3b4a3e;
            margin-bottom: 10px;
        }

        /* Top Selling Products */
        .top-selling {
            flex: 2;
            background: linear-gradient(180deg, #D1FDE8 0%, #445D48 100%);
            border-radius: 10px;
            padding-top: 0;
            padding-bottom: 0;
            /* margin-bottom: 0px; */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 35%;
            flex-direction: column;
            justify-content: space-between;

        }

        .top-selling h5 {
            font-size: 18px;
            color: #3b4a3e;
            margin-bottom: 10px;
        }

        .top-selling ul {
            margin-top: 0;
            padding-top: 0;
        }


        .list-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 0;
            margin: 0;
        }

        .list-group-item {
            display: flex;
            justify-content: space-between;
            border-radius: 10px;
            padding: 15px;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            color: #333;
            font-size: 16px;
        }

        .list-group-item+.list-group-item {
            margin-top: 10px;
        }

        .badge {
            background-color: #FFDAB9 !important;
            /* Ubah ke warna peach */
            color: #3F4246;
            /* Sesuaikan warna teks agar kontras */
            font-size: 14px;
            padding: 5px 10px;
            border-radius: 12px;

        }

        /* Latest Sections */
        .latest-section {
            display: flex;
            gap: 20px;
            /* Jarak antara elemen */
            margin-bottom: 20px;
            /* Jarak bawah untuk kontainer */
        }

        .latest-transactions,
        .latest-customers {
            flex: 1;
            background-color: #FFDAB9;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background: linear-gradient(180deg, #D1FDE8 0%, #445D48 100%);
            /* Ubah warna latar belakang menjadi gradien */

        }

        .latest-transactions h5,
        .latest-customers h5 {
            font-size: 18px;
            color: #3b4a3e;
            margin-bottom: 10px;
            /* background: linear-gradient(180deg, #D1FDE8 0%, #445D48 100%); Ubah warna latar belakang menjadi gradien */
            /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */

        }

        .latest-transactions,
        .latest-stock {
            flex: 1;
            background-color: #FFDAB9;
            /* Sama dengan Latest Customers */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background: linear-gradient(180deg, #D1FDE8 0%, #445D48 100%);
        }

        .latest-transactions h5,
        .latest-stock h5 {
            font-size: 18px;
            color: #3b4a3e;
            margin-bottom: 10px;
        }


        /* Chart Styling */
        /* Chart Section Styling */
        .content-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 20px;
        }

        .chart-section {
            flex: 3;
            max-width: 65%;
            background: linear-gradient(180deg, #D1FDE8 0%, #445D48 100%);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            position: relative;
        }

        .chart-section h5 {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }

        #overviewChart {
            max-width: 100%;
            height: 150px;
            width: auto;
        }


        .overview-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .overview-header h5 {
            margin: 0;
            font-size: 18px;
        }

        #periodSelect {
            width: 150px;
            max-width: 100%;
            padding: 5px;
            font-size: 14px;
        }

        .custom-tooltip {
            background-color: #2d3e32;
            color: #fff;
            border-radius: 5px;
            padding: 8px;
            font-size: 12px;
            text-align: center;
        }

        /* Media Queries untuk tampilan mobile */
        @media (max-width: 768px) {
            .search-bar {
                display: flex;
                flex-direction: row;
                align-items: center;
                gap: 10px;
                margin-top: 30px;
                margin-bottom: 30px;
                width: 100%;
            }

            .notification {
                position: relative;
                display: flex;
                top: 25px;
                right: 40px;
                margin-right: 30px;
                z-index: 1000;
            }

            header {
                display: flex;
                justify-content: flex-start;
                align-items: center;
                padding-left: 40px;
            }


            .summary {
                flex-direction: column;
                gap: 20px;
                align-items: center;
            }

            .summary-card {
                flex: 1;
                background: linear-gradient(180deg, #D1FDE8 0%, #445D48 100%);
                /* Ubah warna latar belakang menjadi gradien */
                border-radius: 10px;
                padding: 20px;
                text-align: center;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .summary-card h5 {
                /* Warna teks untuk "Total Revenue", "Total Sales Transactions", dan "Total Customers" */
                font-size: 16px;
                color: #000000;
                margin-bottom: 10px;
            }


            .summary-card h3 {
                font-size: 24px;
                color: #3b4a3e;
            }

            .chart-section {
                background-color: #f4f4f4;
                border-radius: 10px;
                padding: 20px;
                margin-bottom: 20px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }


            .chart-section h5 {
                font-size: 18px;
                color: #3b4a3e;
                margin-bottom: 10px;
            }

            #periodSelect {
                width: 120px;
                /* Lebih kecil untuk layar kecil */
                font-size: 12px;
            }



            .top-selling {
                /* display: flex;
                    flex: 2;
                    /* Melebarkan top-selling agar mengisi lebih banyak ruang */
                background: linear-gradient(180deg, #D1FDE8 0%, #445D48 100%);
                /* Ubah warna latar belakang menjadi gradien */
                border-radius: 10px;
                padding: 30px 20px;
                margin-bottom: 20px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                text-align: center;
                max-width: 100%;
                /* Sesuaikan agar tabel terlihat lebih rapi */
                flex-direction: column;
                justify-content: space-between;
                */
                /* Ratakan konten */
            }


            .top-selling h5 {
                font-size: 18px;
                color: #3b4a3e;
                margin-bottom: 10px;
            }

            .list-group {
                display: flex;
                flex-direction: column;
                gap: 10px;
                /* Mengatur jarak antar item */
                padding: 0;
                margin: 0;
            }

            .list-group-item {
                display: flex;
                justify-content: space-between;
                /* Mendorong badge ke kanan */
                border-radius: 10px;
                padding: 15px;
                background-color: #ffffff;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                color: #333;
                font-size: 16px;
            }

            .list-group-item+.list-group-item {
                margin-top: 10px;
            }

            .badge {
                background-color: #FFDAB9;
                color: #3F4246;
                font-size: 14px;
                padding: 5px 10px;
                border-radius: 12px;
                /* margin-left: 10px; Tambahkan margin kiri untuk jarak dengan teks */
            }

            /* Latest Sections */
            .latest-section {
                display: flex;
                gap: 20px;
            }

            .latest-transactions,
            .latest-customers {
                flex: 1;
                background-color: #FFDAB9;
                border-radius: 10px;
                padding: 20px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                background: linear-gradient(180deg, #D1FDE8 0%, #445D48 100%);
                /* Ubah warna latar belakang menjadi gradien */

            }

            .latest-transactions h5,
            .latest-customers h5 {
                font-size: 18px;
                color: #3b4a3e;
                margin-bottom: 10px;
                /* background: linear-gradient(180deg, #D1FDE8 0%, #445D48 100%); Ubah warna latar belakang menjadi gradien */
                /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */

            }


            .latest-section {
                flex-direction: column;
                gap: 15px;
            }

            .latest-transactions,
            .latest-customers {
                width: 100%;
                padding: 15px;
                margin-bottom: 15px;
            }

            .list-group-item {
                font-size: 14px;
                padding: 10px;
            }

            .badge {
                font-size: 12px;
                padding: 4px 8px;
            }

            h5 {
                font-size: 16px;
            }

            h3 {
                font-size: 20px;
            }
        }

        .summary-card {
            width: 100%;
            margin-bottom: 10px;
            padding: 15px;
            text-align: center;
        }

        .chart-section,
        .top-selling {
            width: 100%;
            margin-bottom: 20px;
            padding: 15px;
        }

        .content-row {
            display: flex;
            justify-content: space-between;
            /* Membuat jarak di antara Overview dan Top Selling */
            gap: 20px;
            margin-top: 20px;
            /* max-width: 100%; */
        }

        .chart-section {
            flex: 3;
            /* Menambah ruang untuk chart agar lebih ke kiri */
            max-width: 65%;
            /* Sesuaikan lebar jika diperlukan */
            background: linear-gradient(180deg, #D1FDE8 0%, #445D48 100%);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            position: relative;
        }

        .chart-section h5 {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }

        #overviewChart {
            max-height: 350px;
        }

        /* Dropdown Button Styling */
        #periodSelect {
            background-color: #2d3e32;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 8px 16px;
            font-size: 14px;
            margin-top: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        /* Custom Tooltip Styling */
        .custom-tooltip {
            background-color: #2d3e32;
            color: #fff;
            border-radius: 5px;
            padding: 8px;
            font-size: 12px;
            text-align: center;
        }

        .chart-section,
        .top-selling {
            margin-top: 30px;
        }
    </style>
</head>

<body>
    @include('layout.sidebar')

    <div class="main-content">
        <header class="header-container">
            <h1>Bolívar Coffee is Open <span class="status-dot"></span></h1>
            <div class="notification">
                @include('layout.navbar')
            </div>
        </header>

        <div class="Dashboard-view">
            <div class="summary">
                <div class="summary-card">
                    <h5>Total Revenue</h5>
                    <li class="list-group-item" style="display: flex; justify-content: center; align-items: center;">
                        <h3>Rp {{ number_format($totalRevenue, 2, ',', '.') }}</h3>
                    </li>
                </div>
                <div class="summary-card">
                    <h5>Total Sales Transactions</h5>
                    <li class="list-group-item" style="display: flex; justify-content: center; align-items: center;">
                        <h3>{{ $totalSalesTransactions }}</h3>
                    </li>
                </div>
                <div class="summary-card">
                    <h5>Total Expenses</h5>
                    <li class="list-group-item" style="display: flex; justify-content: center; align-items: center;">
                        <h3>Rp {{ number_format($totalExpenses, 2, ',', '.') }}</h3>
                    </li>
                </div>
            </div>

            <div class="content-row">
                <div class="chart-section">
                    <div class="overview-header">
                        <h5>Overview</h5>
                        <select id="periodSelect" class="form-control" onchange="updateChart();">
                            <option value="week">Week</option>
                            <option value="month">Month</option>
                            <option value="year">Year</option>
                        </select>
                    </div>


                    <div id="yearSelectContainer" style="display:none;">
                        <label for="yearSelect">Select Year:</label>
                        <select id="yearSelect" onchange="updateChart();">
                            @foreach (range(2020, date('Y')) as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                    <canvas id="overviewChart"></canvas>

                    <canvas id="overviewChart"></canvas>
                </div>
                <div class="top-selling">
                    <h5>Top Selling Products</h5>
                    <ul class="list-group">
                        @foreach ($topSelling as $menu)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $menu->namaMenu }}
                                <span class="badge rounded-pill">{{ $loop->iteration }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="latest-section">
                <div class="latest-transactions">
                    <h5>Latest Sales Transactions</h5>
                    <ul class="list-group">
                        @foreach ($latestSalesTransactions as $transaction)
                            <li class="list-group-item">
                                {{ $transaction->created_at->format('d M Y H:i') }} - Rp
                                {{ number_format($transaction->totalHarga, 2, ',', '.') }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="latest-customers">
                    <h5>Latest Customers</h5>
                    @foreach ($latestCustomers as $customer)
                        <li class="list-group-item">
                            {{ $customer->NamaPelanggan }} - Joined {{ $customer->created_at->format('d M Y') }}
                        </li>
                    @endforeach
                </div>
            </div>

            <div class="latest-section">
                <!-- Latest Purchase Transactions -->
                <div class="latest-transactions">
                    <h5>Latest Purchase Transactions</h5>
                    <ul class="list-group">
                        @foreach ($latestPurchaseTransactions as $transaction)
                            <li class="list-group-item">
                                {{ $transaction->created_at->format('d M Y H:i') }} - Rp
                                {{ number_format($transaction->totalHarga, 2, ',', '.') }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Latest Stock -->
                <div class="latest-stock">
                    <h5>Latest Stock</h5>
                    <ul class="list-group">
                        @foreach ($latestStock as $stock)
                            <li class="list-group-item">
                                {{ $stock->namaBahanBaku }} - {{ $stock->jumlahBahanBaku }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>


            <!-- Profile Modal -->
            <div id="profileModal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Profile</h5>
                    </div>
                    <div class="modal-body">
                        <p>Name:<span>{{ session('user.namaPengguna') }}</span></p>
                        <p>Phone:<span>{{ session('user.noHP') }}</span></p>
                        <p>Username:<span>{{ session('user.username') }}</span></p>
                        <p>Role:
                            <span>
                                @if (session('user.id_role') == 1)
                                    Owner
                                @elseif (session('user.id_role') == 2)
                                    Employee
                                @else
                                    Unknown Role
                                @endif
                            </span>
                        </p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="closeProfileModal()">Close</button>
                    </div>
                </div>
            </div>

            <!-- Reset Password Modal -->
            <div id="resetPasswordModal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Reset Password</h5>
                    </div>
                    <div class="modal-label">
                        <p><strong>Username:</strong> <span>{{ session('user.username') }}</span></p>
                        <form id="resetPasswordForm" method="POST" action="{{ route('resetPassword') }}">
                            @csrf
                            <div class="modal-body">
                                <label for="currentPassword" class="form-label">Current Password</label>
                                <input type="password" class="form-control" id="currentPassword" name="currentPassword"
                                    required>
                                <div id="currentPasswordError" style="display: none; color: #721c24; margin-top: 5px;">
                                    Current password is incorrect.
                                </div>
                            </div>
                            <div class="modal-body">
                                <label for="newPassword" class="form-label">New Password</label>
                                <input type="password" class="form-control" id="newPassword" name="newPassword"
                                    required>
                            </div>
                            <div class="modal-body">
                                <label for="confirmNewPassword" class="form-label">Confirm New Password</label>
                                <input type="password" class="form-control" id="confirmNewPassword"
                                    name="newPassword_confirmation" required>
                            </div>
                            <div id="passwordMismatchAlert" style="display: none; color: #721c24;">
                                New passwords do not match.
                            </div>
                            <div id="passwordLengthError" style="display: none; color: #721c24;">
                                Password must be at least 6 characters long.
                            </div>
                            <div id="fieldsRequiredAlert" style="display: none; color:#721c24; margin-top: 5px;">
                                Please fill out the fields.
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            onclick="closeResetPasswordModal()">Close</button>
                        <button type="button" class="btn btn-primary"
                            onclick="validateAndSubmitPassword()">Submit</button>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            <script>
                let overviewChart;

                function formatCurrency(value) {
                    return `Rp ${value.toLocaleString('id-ID')}`;
                }

                function createChart(labels, data) {
                    const ctx = document.getElementById('overviewChart').getContext('2d');

                    if (overviewChart) {
                        overviewChart.destroy();
                    }

                    overviewChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Total Sales',
                                data: data,
                                backgroundColor: '#f7d1ba',
                                borderRadius: 10,
                                barPercentage: 0.5,
                                categoryPercentage: 0.6,
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: false
                                },
                                tooltip: {
                                    backgroundColor: '#2d3e32',
                                    titleColor: '#ffffff',
                                    bodyColor: '#ffffff',
                                    callbacks: {
                                        label: function(context) {
                                            return formatCurrency(context.raw);
                                        }
                                    }
                                }
                            },
                            scales: {
                                x: {
                                    grid: {
                                        display: false
                                    },
                                    ticks: {
                                        color: '#333',
                                        font: {
                                            size: 12
                                        }
                                    }
                                },
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        color: '#333',
                                        font: {
                                            size: 12
                                        },
                                        callback: function(value) {
                                            return formatCurrency(value);
                                        }
                                    }
                                }
                            }
                        }
                    });
                }

                function updateChart() {
                    const period = document.getElementById('periodSelect').value;
                    let fetchUrl = `/dashboard-data?period=${period}`;

                    if (period === 'year') {
                        const selectedYear = document.getElementById('yearSelect').value;
                        fetchUrl += `&year=${selectedYear}`;
                    }

                    fetch(fetchUrl)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            console.log('Received data:', data);
                            createChart(data.labels, data.sales);
                        })
                        .catch(error => console.error('Error fetching chart data:', error));
                }

                function populateLabels(period) {
                    const yearSelectContainer = document.getElementById('yearSelectContainer');
                    yearSelectContainer.style.display = period === 'year' ? 'block' : 'none';
                }

                document.getElementById('periodSelect').addEventListener('change', function() {
                    const period = this.value;
                    populateLabels(period);
                    updateChart();
                });

                document.addEventListener('DOMContentLoaded', () => {
                    const periodSelect = document.getElementById('periodSelect');
                    populateLabels(periodSelect.value);
                    updateChart();
                });

                function openProfileModal() {
                    document.getElementById('profileModal').style.display = 'flex';
                }

                function closeProfileModal() {
                    document.getElementById('profileModal').style.display = 'none';
                    window.location.href = '{{ route('dashboard.index') }}';
                }

                function validateAndSubmitPassword() {
                    const currentPassword = document.getElementById('currentPassword').value;
                    const newPassword = document.getElementById('newPassword').value;
                    const confirmNewPassword = document.getElementById('confirmNewPassword').value;


                    document.getElementById('fieldsRequiredAlert').style.display = 'none';
                    document.getElementById('passwordMismatchAlert').style.display = 'none';
                    document.getElementById('currentPasswordError').style.display = 'none';
                    document.getElementById('passwordLengthError').style.display = 'none';

                    if (!currentPassword || !newPassword || !confirmNewPassword) {
                        document.getElementById('fieldsRequiredAlert').style.display = 'block';
                        return;
                    }

                    if (newPassword !== confirmNewPassword) {
                        document.getElementById('passwordMismatchAlert').style.display = 'block';
                        return;
                    }

                    if (newPassword.length < 6) {
                        document.getElementById('passwordLengthError').style.display = 'block';
                        return;
                    }

                    fetch('{{ route('validateCurrentPassword') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                currentPassword: currentPassword,
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (!data.valid) {
                                document.getElementById('currentPasswordError').style.display = 'block';
                                return;
                            }


                            document.getElementById('resetPasswordForm').submit();
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                }

                function closeResetPasswordModal() {
                    document.getElementById('resetPasswordModal').style.display = 'none';
                    window.location.href = '{{ route('dashboard.index') }}';
                }
            </script>

</body>

</html>
