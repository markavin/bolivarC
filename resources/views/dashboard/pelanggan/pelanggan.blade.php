<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee Dashboard - Customers</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* CSS untuk Responsif */
        .notification {
            margin-left: 600px;
        }

        .container {
            overflow-x: hidden;
            max-width: 100vw;
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
            font-weight: bold;
        }

        .customers-view {
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
            padding: 10px 12px;
            padding-left: 40px;
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
            margin-left: 40px;
            /* Jarak kecil ke kiri */
            margin-right: auto;
            /* Pastikan ini agar tabel bergerak ke kiri */
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

        .edit-btn,
        .delete-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #B0EACD 0%, #445D48 100%);
            color: #ffffff;
            border: none;
            padding: 0;
            /* Remove extra padding */
            width: 40px;
            height: 40px;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .edit-btn:hover,
        .delete-btn:hover {
            background: linear-gradient(135deg, #C3F3DB 0%, #556D58 100%);
        }

        .edit-btn .material-symbols-outlined,
        .delete-btn .material-symbols-outlined {
            color: #ffffff;
            font-size: 25px;
            margin: 0;
        }

        .customers-view {
            margin-top: 20px;
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
        #resetPasswordModal .modal-footer{
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
            color: #ffffff; /* Atur warna teks menjadi putih */
            text-align: left;
            /* justify-content: center; */
        }

         #resetPasswordModal .modal-label {
            display: flex;
            flex-direction: column;
            gap: 15px;
            color: #ffffff; /* Atur warna teks menjadi putih */
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
            background-color: #445D48;
            color: #fff;
        }

        /* Styling untuk modal error */
        #errorModal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            max-width: 400px;
            backdrop-filter: blur(5px);
            background-color: rgba(0, 0, 0, 0.4);
            justify-content: center;
            align-items: center;
        }

        /* Konten dalam modal */
        #errorModal .modal-content {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 100%;
        }

        /* Header modal */
        #errorModal .modal-header {
            font-size: 18px;
            font-weight: bold;
            color: #c90000;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Body modal */
        #errorModal .modal-body {
            font-size: 16px;
            padding: 10px 0;
            justify-content: center;
        }

        /* Footer modal */
        #errorModal .modal-footer {
            padding-top: 10px;
            display: flex;
            justify-content: center;
        }

        /* Button pada footer modal */
        #errorModal .modal-footer button {
            background-color: #f5c6cb;
            color: #721c24;
            padding: 8px 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease;
        }

        /* Hover state pada button */
        #errorModal .modal-footer button:hover {
            background-color: #d3a6a1;
        }

        /* Responsif untuk mobile */
        @media (max-width: 768px) {
            #errorModal {
                width: 90%;
                max-width: 350px;
            }

            #errorModal .modal-header,
            #errorModal .modal-body,
            #errorModal .modal-footer {
                padding: 10px;
            }
        }

        /* Modal Success for Reset Password */
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
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 90%;
            max-width: 400px;
        }

        .success-icon {
            font-size: 80px;
            margin-bottom: 20px;
            color: #28a745;
        }

        .modal-message {
            font-size: 18px;
            color: #333;
            margin-bottom: 20px;
        }

        .modal-button {
            background-color: #7e7e7e;
            color: #fff;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            opacity: 0.9;
            transition: opacity 0.3s ease;
        }

        .modal-button:hover {
            background-color: #445D48;
            opacity: 1;
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

            .notification {
                margin-left: 0; /* Atur margin kiri menjadi 0 agar tidak terlalu ke kanan */
                align-self: flex-start; /* Tempatkan di sebelah kiri */
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

            .edit-btn,
            .delete-btn {
                display: flex;
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
        <header class="header-container">
            <h1>Bolívar Coffee - Customers List <span class="status-dot"></span></h1>
            <div class="notification">
                @include('layout.navbar')
            </div>
        </header>

        <div class="customers-view">
            <div class="search-bar">
                <form action="{{ route('pelanggan.search') }}" method="GET" style="display: flex; width: 82%">
                    <span class="material-symbols-outlined search-icon">search</span>
                    <input type="text" placeholder="Search customers..." class="search-input" name="search"
                        value="{{ request('search') }}">
                </form>
                <button class="create-btn" onclick="window.location.href='{{ route('pelanggan.create') }}'">
                    <span class="create-text">Create Customer</span>
                    <span class="material-symbols-outlined">Add</span>
                </button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        {{-- <th>Customer ID</th> --}}
                        <th>Customer Name</th>
                        <th>Phone Number</th>
                        <th>Points</th>
                        <th>Transaction Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelanggan as $index => $Pelanggan)
                        <tr>
                            <td data-label="No">{{ $pelanggan->total() - ($pelanggan->firstItem() - 1) - $index }}</td>
                            {{-- <td data-label="Customer ID">{{ $Pelanggan->id }}</td> --}}
                            <td data-label="Customer Name">{{ $Pelanggan->NamaPelanggan }}</td>
                            <td data-label="Phone Number">{{ $Pelanggan->NoHP }}</td>
                            <td data-label="Points">{{ $Pelanggan->totalPoin }}</td>
                            <td data-label="Transaction Total">{{ $Pelanggan->penjualan_count }}</td>
                            <td data-label="Actions">
                                <div class="action-buttons">
                                    <button class="edit-btn"
                                        onclick="window.location.href='{{ route('pelanggan.edit', ['id' => $Pelanggan->id]) }}'">
                                        <span class="material-symbols-outlined">edit</span>
                                    </button>
                                    <button type="button" class="delete-btn"
                                        onclick="openDeleteModal('{{ $Pelanggan->id }}', '{{ $Pelanggan->NamaPelanggan }}')">
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>
                                    <form id="delete-form-{{ $Pelanggan->id }}"
                                        action="{{ route('pelanggan.delete', ['id' => $Pelanggan->id]) }}"
                                        method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $pelanggan->links('vendor.pagination.custom') }}
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
                <p>Role:<span>{{ session('user.id_role') }}</span></p>
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
                    <div id="passwordMismatchAlert" style="display: none; color: red;">
                        New passwords do not match.
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeResetPasswordModal()">Close</button>
                <button type="button" class="btn btn-primary" onclick="validateAndSubmitPassword()">Submit</button>
            </div>
        </div>
    </div>

    <!-- Success Modal for Reset Password -->
    <div id="successPasswordModal" class="success-modal">
        <div class="success-content">
            <div class="success-icon">
                <i class="material-icons-outlined">check_circle</i>
            </div>
            <p class="modal-message">Password berhasil diubah!</p>
            <button type="button" class="modal-button confirm-button"
                onclick="closeSuccessPasswordModal()">DONE</button>
        </div>
    </div>

    <!-- Modal Error untuk Password Salah -->
    <div id="errorModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>Error</strong></h5>
            </div>
            <div class="modal-body">
                <p><strong>Error:</strong> <span id="errorMessage"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeErrorModal()">Close</button>
            </div>
        </div>
    </div>

    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">WARNING!!!
            </div>
            <p id="deleteMessage"></p>
            <div class="modal-buttons">
                <button type="button" class="modal-button cancel-button" onclick="closeModal()">Cancel</button>
                <button id="confirmDeleteButton" class="modal-button confirm-button">Delete</button>
            </div>
        </div>
    </div>
    <div id="successModal" class="success-modal">
        <div class="success-content">
            <p>Delete successful!</p>
            <button type="button" class="modal-button confirm-button" onclick="closeSuccessModal()">OK</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let currentDeleteId = null;

        function openDeleteModal(id, name) {
            currentDeleteId = id;
            document.getElementById('deleteMessage').innerText =
                `Are you sure you want to delete the customers with the name ${name}?`;
            document.getElementById('deleteModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('deleteModal').style.display = 'none';
            currentDeleteId = null;
        }

        function openSuccessModal() {
            document.getElementById('successModal').style.display = 'flex';
        }

        function closeSuccessModal() {
            document.getElementById('successModal').style.display = 'none';
        }

        document.getElementById('confirmDeleteButton').addEventListener('click', function() {
            if (currentDeleteId) {
                document.getElementById(`delete-form-${currentDeleteId}`).submit();
                closeModal();
                openSuccessModal(); // Open success modal after deletion confirmation
            }
        });

        function openProfileModal() {
            document.getElementById('profileModal').style.display = 'flex';
        }

        function closeProfileModal() {
            document.getElementById('profileModal').style.display = 'none';
            window.location.href = '{{ route('pelanggan.show') }}'; // Ganti dengan route atau URL yang sesuai
        }

        function validateAndSubmitPassword() {
            const currentPassword = document.getElementById('currentPassword').value;
            const newPassword = document.getElementById('newPassword').value;
            const confirmNewPassword = document.getElementById('confirmNewPassword').value;

            if (newPassword !== confirmNewPassword) {
                document.getElementById('passwordMismatchAlert').style.display = 'block';
                return;
            }

            document.getElementById('passwordMismatchAlert').style.display = 'none';

            // Jika validasi berhasil, submit form
            document.getElementById('resetPasswordForm').submit();
        }

        function closeSuccessPasswordModal() {
            document.getElementById('successPasswordModal').style.display = 'none';
            window.location.href = '{{ route('pelanggan.show') }}'; // Ganti dengan route atau URL yang sesuai
        }

        function closeResetPasswordModal() {
            document.getElementById('resetPasswordModal').style.display = 'none';
            window.location.href = '{{ route('pelanggan.show') }}';
        }
    </script>

</body>

</html>
