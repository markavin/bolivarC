<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee Dashboard - Customers</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* CSS untuk Responsif */

        .customers-view {
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
            color: #c90000
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
        <header>
            <h1>Bolívar Coffee - Customers List <span class="status-dot"></span></h1>
            <div class="notification"></div>
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
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Phone Number</th>
                        <th>Points</th>
                        <th>Transaction Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelanggan as $Pelanggan)
                        <tr>
                            <td data-label="No">{{ $loop->iteration }}</td>
                            <td data-label="Customer ID">{{ $Pelanggan->id }}</td>
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
        </div>
    </div>

    <div id="deleteModal" class="modal">
        <div class="modal-content">
            < <div class="modal-header">WARNING!!!
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
    </script>

</body>

</html>
