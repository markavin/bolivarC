<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee Dashboard - Sales</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<style>
    /* CSS untuk Responsif */
    .container {
        overflow-x: hidden;
        max-width: 100vw;
        /* Membatasi lebar agar tidak melebihi viewport */
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
        padding-left: 40px;
    }

    h1 {
        font-size: 30px;
        color: #333;
    }

    .sales-view {
        margin-top: 20px;
    }

    .search-bar {
        position: relative;
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
        width: calc(100% - 40px);
        /* Menyesuaikan lebar untuk menghindari geser */
        margin-left: 40px;
    }

    .search-bar .search-icon {
        position: absolute;
        left: 15px;
        font-size: 20px;
        color: #445D48;
        pointer-events: none;
        top: 50%;
        transform: translateY(-50%);
    }

    .search-bar input[type="text"] {
        flex: 1;
        /* Fill the remaining space */
        padding: 10px 12px;
        /* Adjust padding for better spacing */
        padding-left: 40px;
        /* Add padding to the left to accommodate the icon */
        border: 1px solid #ccc;
        border-radius: 8px;
        height: 40px;
        /* Ensure consistent height */
        font-size: 16px;
        /* Set font size */
    }

    .create-btn {
        display: flex;
        align-items: center;
        background: linear-gradient(135deg, #D1FDE8, #445D48);
        color: #000000;
        gap: 10px;
        border: none;
        padding: 10px 12px;
        border-radius: 8px;
        cursor: pointer;
        height: 40px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        white-space: nowrap;
        flex-shrink: 0;
        margin-right: 40px;
        /* Atur jarak tombol dari sisi kanan */

    }


    .create-text {
        font-size: 15px;
        margin-left: 0px;
    }

    .create-btn .material-symbols-outlined {
        font-size: 20px;
        color: #000000;
    }

    /* Styling tabel */
    table {
            width: 93%;
            border-collapse: collapse;
            margin-top: 10px;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
            margin-left: 40px; /* Jarak kecil ke kiri */
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

    .action-buttons {
        display: flex;
        gap: 8px;
        justify-content: center;
        align-items: center;
        width: 100%;
    }

    .visibility-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #B0EACD 0%, #445D48 100%);
        color: #ffffff;
        border: none;
        padding: 10px 12px;
        border-radius: 8px;
        cursor: pointer;
        gap: 4px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .visibility-btn .material-symbols-outlined {
        color: #ffffff;
        font-size: 25px;
        margin: 0;
    }

    .visibility-btn:hover {
        background: linear-gradient(135deg, #C3F3DB 0%, #556D58 100%);
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

        table {
            font-size: 14px;
        }

        th,
        td {
            display: block;
            width: 100%;
        }

        th {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        td::before {
            content: attr(data-label);
            position: absolute;
            left: 10px;
            width: calc(50% - 20px);
            padding-right: 10px;
            text-align: left;
            font-weight: bold;
        }
    }
</style>

<body>
    @include('layout.sidebar')

    <div class="main-content">
        <header>
            <h1>Bolívar Coffee - Sales List <span class="status-dot"></span></h1>
            <div class="notification"></div>
        </header>
        <div class="sales-view">
            <div class="search-bar">
                <form action="{{ route('penjualan.search') }}" method="GET" style="display: flex; width: 84%">
                <span class="material-symbols-outlined search-icon">Search</span>
                <input type="text" placeholder="Search Sales..." class="search-input" name="search"
                value="{{ request('search') }}">
            </form>
                <button class="create-btn" onclick="window.location.href='{{ route('penjualan.create') }}'">
                    <span class="create-text">Create Sales</span>
                    <span class="material-symbols-outlined">Add</span>
                </button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        {{-- <th>Sales ID</th> --}}
                        <th>Customer Name</th>
                        <th>Sales Date</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penjualan as $index => $Sales)
                        <tr>
                            <td data-label="No">{{ $penjualan->total() - ($penjualan->firstItem() - 1) - $index }}</td>
                            {{-- <td data-label="Sales ID"> {{ $Sales->id_penjualan }}</td> --}}
                            <td data-label="Customer Name">
                                {{ $Sales->NamaPelanggan == '0' || is_null($Sales->NamaPelanggan) ? 'Guest' : $Sales->NamaPelanggan }}
                            </td>
                            <td data-label="Sales Date">{{ $Sales->tanggalPenjualan }}</td>
                            <td data-label="Quantity">{{ $Sales->totalQuantity }}</td>
                            <td data-label="Total Price">{{ $Sales->totalHarga }}</td>
                            <td data-label="Actions">
                                <div class="action-buttons">
                                    <button class="visibility-btn"
                                        onclick="window.location.href='{{ route('penjualan.detail', ['id_penjualan' => $Sales->id_penjualan]) }}'">
                                        <span class="material-symbols-outlined">visibility</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $penjualan->links('vendor.pagination.custom') }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>
