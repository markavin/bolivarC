<!-- resources/views/laporan/index.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee - Reports</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* CSS untuk Responsif */
        .notification {
            margin-left: 690px;
        }

        .report-view {
            margin-top: 20px;
        }

        .container {
            overflow-x: hidden;
            max-width: 100vw;
            /* Membatasi lebar agar tidak melebihi viewport */
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

        table {
            width: 93%;
            table-layout: fixed;
            /* Lebar kolom tetap */
            border-collapse: collapse;
            border-radius: 12px;
            margin-top: 10px;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-left: 40px;
            margin-right: auto;
            overflow: hidden;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #c9d6cf;
            border-right: 1px solid #c9d6cf;
            overflow: hidden;
            /* Sembunyikan overflow */
            text-overflow: ellipsis;
            /* Tambahkan ellipsis untuk teks panjang */
            white-space: nowrap;
            /* Hindari teks membungkus */
            min-width: 100px;
            /* Atur lebar minimum kolom */
            height: 50px;
        }

        th {
            background-color: #445D48;
            color: #ffffff;
            padding: 20px 12px;
            text-align: center;
           
            border-bottom: 1px solid #c9d6cf;
        }

        thead th {
            width: 20%;
        }

        tbody tr {
            height: 50px;
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
            width: 320px;
            background-color: #6A6968;
            color: #ffffff;
            padding: 20px;
            height: 100vh;
            transform: translateX(100%);
            transition: transform 0.3s ease;
            font-family: 'Roboto', sans-serif;
            font-size: medium;
            z-index: 10;
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

        .alert-awal {
            margin-left: 25px;
        }

        .alert-container {
            justify-content: flex-start;
            /* Atur posisi ke kiri */
            align-items: center;
            /* Sejajarkan vertikal */
            /*  -top: 40 */
            /* Sama seperti margin tabel */
        }

        .alert-container .alert {
            margin-left: 17px;
            table-layout: fixed;
        }

        .alert-container .toggle-filter-btn {
            margin-left: 1085px;
            table-layout: fixed;
        }

        .filter-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-top: 50px;
        }

        .cancel-btn,
        .done-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 5px 10px;
            border-radius: 8px;
            height: 20px;
            font-size: 16px;
            cursor: pointer;
            box-sizing: border-box;
        }

        .cancel-btn {
            background-color: #ffffff;
            color: #000000;
            border: 1px solid #ccc;
        }

        .done-btn {
            background: linear-gradient(135deg, #B0EACD 0%, #445D48 100%);
            color: #ffffff;
            border: none;
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
            margin-left: 800px;
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
            /* Hapus garis pada header dan footer */
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
            /* Pastikan label memiliki lebar yang konsisten */
            text-align: left;
            margin-right: 10px;
            /* Tambahkan margin untuk jarak ke kanan */
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
            /* Sembunyikan ikon jika ada */
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
            /* Atur warna teks menjadi putih */
            text-align: center;
            /* justify-content: center; */
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
            <div class="notification">
                @include('layout.navbar')
            </div>
        </header>

        <div class="report-view">
            @if ($tanggalAwal && $tanggalAkhir)
                <div class="container">
                    <div class="alert-awal">
                        @if ($tipeLaporan == 'penukaran')
                            <strong> Redemptions Reports from {{ $tanggalAwal }} - {{ $tanggalAkhir }}</strong>
                        @elseif ($tipeLaporan == 'penjualan')
                            <strong> Sales Reports from {{ $tanggalAwal }} - {{ $tanggalAkhir }}</strong>
                        @else
                            <strong> Purchase Reports from {{ $tanggalAwal }} - {{ $tanggalAkhir }}</strong>
                        @endif
                    </div>
                </div>
            @endif
            <div class="alert-container">
                <div class="alert">
                    @if ($tipeLaporan == 'penukaran')
                        <strong>Total Redemptions: {{ $totalTransaksi }}</strong>
                    @elseif ($tipeLaporan == 'penjualan')
                        <strong>Total Income : Rp {{ number_format($totalTransaksi, 0, ',', '.') }} </strong>
                    @else
                        <strong>Total Expenses : Rp {{ number_format($totalTransaksi, 0, ',', '.') }} </strong>
                    @endif
                </div>

                <button class="toggle-filter-btn" onclick="toggleFilterPanel()">
                    <span class="material-symbols-outlined">filter_alt</span> Filter
                </button>
            </div>

            <table>
                <thead>
                    <tr>
                        @if ($tipeLaporan == 'penukaran')
                            <th>Redemption ID</th>
                            <th>Redemption Date</th>
                            <th>Customer Name</th>
                            <th>Menu Name</th>
                            <th>Status</th>
                            <th>Total Points Redeemed</th>
                            <th>Remaining Points</th>
                        @elseif ($tipeLaporan == 'penjualan')
                            <th>ID Penjualan</th>
                            <th>Tanggal Penjualan</th>
                            <th>Nama Pelanggan</th>
                            <th>Menu</th>
                            <th>Quantity</th>
                            <th>Total Harga (Rp)</th>
                        @else
                            <th>ID Pembelian</th>
                            <th>Tanggal Pembelian</th>
                            <th>Nama Bahan Baku</th>
                            <th>Quantity</th>
                            <th>Total Harga (Rp)</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($laporan as $data)
                        <tr>
                            @if ($tipeLaporan == 'penukaran')
                                <td>{{ $data->id_penukaran }}</td>
                                <td>{{ $data->tanggalPenukaran }}</td>
                                <td>{{ $data->NamaPelanggan }}</td>
                                <td>{{ $data->namaMenu }}</td>
                                <td>{{ $data->status }}</td>
                                <td>{{ $data->totalPoin }}</td>
                                <td>{{ $data->sisaPoin }}</td>
                            @elseif ($tipeLaporan == 'penjualan')
                                <td>{{ $data->id_penjualan }}</td>
                                <td>{{ $data->tanggalPenjualan }}</td>
                                <td>{{ $data->NamaPelanggan }}</td>
                                <td>{{ $data->namaMenu }}</td>
                                <td>{{ $data->totalQuantity }}</td>
                                <td>Rp{{ number_format($data->totalHarga, 0, ',', '.') }}</td>
                            @else
                                <td>{{ $data->id_pembelian }}</td>
                                <td>{{ $data->purchase_date }}</td>
                                <td>{{ $data->namaBahanBaku }}</td>
                                <td>{{ $data->toquantity }}</td>
                                <td>Rp{{ number_format($data->total_price, 0, ',', '.') }}</td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">No data found for the selected filters.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="export-container" style="margin-top: 20px; text-align: left;">
            <div class="export-buttons">
                <form action="{{ route('laporan.exportPDF') }}" method="GET">
                    <input type="hidden" name="tipe" value="{{ $tipeLaporan }}">
                    <input type="hidden" name="tanggal_awal" value="{{ $tanggalAwal }}">
                    <input type="hidden" name="tanggal_akhir" value="{{ $tanggalAkhir }}">
                    <button type="submit" class="export-btn">Export</button>
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
                <select name="tipe" id="tipe" onchange="toggleCustomerFilter(this.value)">
                    <option value="penjualan" {{ request('tipe') == 'penjualan' ? 'selected' : '' }}>Sales</option>
                    <option value="pembelian" {{ request('tipe') == 'pembelian' ? 'selected' : '' }}>Purchase</option>
                    <option value="penukaran" {{ request('tipe') == 'penukaran' ? 'selected' : '' }}>Redemptions
                    </option>
                </select>
            </div>
            <div>
                <label for="tanggal_awal" class="visually-tanggal">Choose Date</label>
                <div style="display: flex; align-items: center;">
                    <div style="text-align: center; margin-right: 10px;">
                        <input type="date" name="tanggal_awal" id="tanggal_awal"
                            value="{{ request('tanggal_awal') }}">
                    </div>
                    <div style="text-align: center; margin-left: 10px;">
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
                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
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
                <button type="button" class="btn btn-secondary" onclick="closeResetPasswordModal()">Close</button>
                <button type="button" class="btn btn-primary" onclick="validateAndSubmitPassword()">Submit</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleFilterPanel() {
            const filterPanel = document.getElementById('filterPanel');
            const mainContent = document.querySelector('.main-content');
            filterPanel.classList.toggle('active');
            mainContent.classList.toggle('blurred');
        }

        function openProfileModal() {
            document.getElementById('profileModal').style.display = 'flex';
        }

        function closeProfileModal() {
            document.getElementById('profileModal').style.display = 'none';
            window.location.href = '{{ route('laporan.index') }}'; // Ganti dengan route atau URL yang sesuai
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
            window.location.href = '{{ route('laporan.index') }}';
        }
    </script>
</body>

</html>
