<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee Dashboard - Points</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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

        .point-view {
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
            /* Mengisi ruang yang tersisa */
            padding: 10px 12px;
            padding-left: 40px;
            /* Menambahkan padding untuk ikon */
            border: 1px solid #ccc;
            border-radius: 8px;
            height: 40px;
            font-size: 16px;
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
        }

        .create-btn .material-symbols-outlined {
            font-size: 20px;
            color: #000000;
        }

        /* Styling tabel */
        table {
            width: calc(100% - 80px);
            /* Menyesuaikan lebar tabel */
            border-collapse: collapse;
            margin-top: 10px;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
            margin-left: 40px;
            /* Jarak kecil ke kiri */
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

        }
    </style>
</head>

<body>
    @include('layout.sidebar')

    <div class="main-content">
        <header>
            <h1>Bolívar Coffee - Point List <span class="status-dot"></span></h1>
            <div class="notification"></div>
        </header>

        <div class="point-view">
            <div class="search-bar">
                <form action="{{ route('poin.search') }}" method="GET" style="display: flex; width: 84%">
                    <span class="material-symbols-outlined search-icon">Search</span>
                    <input type="text" placeholder="Search point..." class="search-input" name="search"
                    value="{{ request('search') }}">
                </form>
                <button class="create-btn" onclick="window.location.href='{{ route('penukaran.create') }}'">
                    <span class="create-text">Redeem Point</span>
                    <span class="material-symbols-outlined">Add</span>
                </button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        {{-- <th>ID Poin</th> --}}
                        <th>Nama Pelanggan</th>
                        <th>Nama Menu</th>
                        <th>Status</th>
                        <th>Total Poin</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($poin as $index => $item)
                        <tr>
                            <td data-label="No">{{ $poin->total() - ($poin->firstItem() - 1) - $index }}</td>
                            {{-- <td>{{ $item->id_poin }}</td> --}}
                            <td>{{ $item->NamaPelanggan }}</td>
                            <td>{{ $item->nama_menu }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->TotalPoin }}</td>
                            <td>{{ $item->Tanggal }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $poin->links('vendor.pagination.custom') }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>

</html>
