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

    .sales-view {
        margin-top: 20px;
    }

    .search-bar {
            position: relative;
            display: flex;
            align-items: center;
            gap: 10px;
            /* margin-top: 30px; */
            margin-bottom: 20px;
            width: 100%;

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
                flex: 1; /* Fill the remaining space */
        padding: 10px 12px; /* Adjust padding for better spacing */
        padding-left: 40px; /* Add padding to the left to accommodate the icon */
        border: 1px solid #ccc;
        border-radius: 8px;
        height: 40px; /* Ensure consistent height */
        font-size: 16px; /* Set font size */
        }

        .create-btn {
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #B0EACD 0%, #445D48 100%);
            color: #000000;
            gap: 10px;
            border: none;
            padding: 10px 12px;
            border-radius: 8px;
            cursor: pointer;
            height: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: auto;
            text-align: center;

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

    .visibility-btn {
        display: flex;
        /* Pastikan menggunakan flexbox */
        align-items: center;
        /* Center align items vertically */
        justify-content: center;
        /* Center align items horizontally */
        background: linear-gradient(135deg, #B0EACD 0%, #445D48 100%);
        color: #ffffff;
        border: none;
        padding: 10px 12px;
        /* Padding yang seimbang */
        border-radius: 8px;
        cursor: pointer;
        gap: 4px;
        /* Jarak antara ikon dan teks */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .visibility-btn .material-symbols-outlined {
        font-size: 20px;
        /* Ukuran ikon */
        margin: 0;
        /* Menghapus margin jika ada */
    }

    .visibility-btn:hover {
        background: linear-gradient(135deg, #C3F3DB 0%, #556D58 100%);
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
            Menghilangkan th dari tampilan
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
        /* Styling untuk tombol visibility */
        .visibility-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #B0EACD 0%, #445D48 100%);
            color: #ffffff; /* Warna teks dan ikon */
            border: none;
            padding: 10px 12px;
            border-radius: 8px;
            cursor: pointer;
            gap: 4px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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

    }
</style>
<body>
    @include('layout.sidebar')

    <div class="main-content">
        <header>
            <h1>Bolívar Coffee - sales List <span class="status-dot"></span></h1>
            {{-- <button class="payment-btn">Create Customer</button> --}}
            <div class="notification"></div>
        </header>
        <div class="sales-view">
            <div class="search-bar">
                <span class="material-symbols-outlined search-icon">Search</span>
                <input type="text" placeholder="Search Sales..." class="search-input">
                <button class="create-btn">
                    <span class="create-text">Create Sales</span>
                    <span class="material-symbols-outlined">Add</span> 
            </div>
            <table>
                <thead>
                    <tr>
                        <th>sales ID</th>
                        <th>Customer Name</th>
                        <th>Sales Date</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penjualan as $Sales)
                        <tr>
                            <td data-label="sales ID"> {{ $Sales->id_penjualan }}</td>
                            <td data-label="Customer Name">{{ $Sales->NamaPelanggan }}</td>
                            <td data-label="Sales Date">{{ $Sales->tanggalPenjualan }}</td>
                            <td data-label="Quantity">{{ $Sales->totalQuantity }}</td>
                            <td data-label="Total Price">{{ $Sales->totalHarga }}</td>
                            <td data-label="Actions">
                                <div class="action-buttons">
                                    <button class="visibility-btn">
                                        <span class="material-symbols-outlined">Visibility</span> 
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>

</html>