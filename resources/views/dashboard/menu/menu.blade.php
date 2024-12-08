<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee Dashboard - Menu</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* CSS untuk Responsif */

        .notification {
            position: fixed;
            top: 25px;
            right: 40px;
            margin-right: 60px;
            z-index: 1000;
        }


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


        h1 {
            font-size: 30px;
            color: #333;
            font-weight: bold;
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

        .menu-view {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
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
            margin-right: 60px;
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


        /* Styling kartu menu */
        .menu-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 10px;
            padding: 0 40px;
        }

        .menu-card {
            background: linear-gradient(to bottom, #FFD9B4 0%, #445D48 50%, #445D48 100%);
            border-radius: 8px;
            padding: 70px;
            width: 250px;
            height: 250px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 30px;
            position: relative;
        }

        .menu-id {
            position: absolute;
            top: 10px;
            left: 5px;
            font-size: 16px;
            font-weight: bold;
            color: #ffffff;
            padding: 5px 8px;
            border-radius: 4px;
        }

        .menu-image {
            width: 150px;
            height: 130px;
            border-radius: 50%;
            /* Membuat gambar berbentuk lingkaran */
            overflow: hidden;
            position: absolute;
            top: -40px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1;
            background-color: white;
            object-fit: cover;
            /* Memastikan gambar memenuhi kotak dengan proporsi */
        }

        .menu-info {
            margin-top: 50px;
            color: #ffffff;
            text-align: center;
        }

        .menu-info h2 {
            font-size: 18px;
            color: #ffffff;
            font-family: 'Coustard', serif;
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .menu-info p {
            font-size: 14px;
            color: #ffffff;
            margin-top: 10px;
            margin-bottom: 0px;
            font-family: 'Roboto', sans-serif;
        }

        .menu-buttons {
            position: absolute;
            bottom: 5px;
            width: 100%;
            padding: 0 10px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .menuedit-btn,
        .menudelete-btn {
            padding: 0;
            border: none;
            background: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .menuedit-btn .material-symbols-outlined,
        .menudelete-btn .material-symbols-outlined {
            font-size: 24px;
            color: #ffffff;
        }

        .menuedit-btn:hover .material-symbols-outlined,
        .menudelete-btn:hover .material-symbols-outlined {
            color: #D1FDE8;
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
            /* Memusatkan teks secara horizontal */
            display: flex;
            /* Tambahan untuk memastikan pemusatan */
            justify-content: center;
            /* Memusatkan isi secara horizontal */
            align-items: center;
            /* Memusatkan isi secara vertikal (jika diperlukan) */
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
            .menu-cards {
                grid-template-columns: repeat(1, 1fr);
                /* Mengubah kolom menjadi 1 pada tampilan mobile */
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

            .menu-card {
                width: 100%;
                /* Memastikan kartu mengisi lebar penuh pada mobile */
                height: auto;
                /* Biarkan tinggi menyesuaikan konten */
                padding: 20px;
                /* Mengurangi padding untuk tampilan mobile */
                margin-top: 20px;
                /* Mengurangi margin */
                margin-left: 10px;

            }

            .menu-image {
                width: 100px;
                /* Mengurangi ukuran gambar pada tampilan mobile */
                height: 100px;
                top: -30px;
                /* Menurunkan posisi gambar agar pas pada tampilan mobile */
            }

            .menu-info {
                margin-top: 60px;
                /* Menurunkan informasi menu */
            }

            .menu-info h2 {
                font-size: 16px;
                /* Mengurangi ukuran teks judul pada tampilan mobile */
            }

            .menu-info p {
                font-size: 14px;
                /* Ukuran teks harga tetap */
            }

            .menu-buttons {
                position: relative;
                bottom: 0;
                padding: 0;
                margin-top: 10px;
            }

        }
    </style>
</head>

<body>
    @include('layout.sidebar')

    <div class="main-content">
        <header>
            <h1>Bolívar Coffee - Menu List <span class="status-dot"></span></h1>
            <div class="notification">
                @include('layout.navbar')
            </div>
        </header>

        <div class="menu-view">
            <div class="search-bar">
                <form action="{{ route('menu.search') }}" method="GET" style="display: flex; width: 82%">
                    <span class="material-symbols-outlined search-icon">search</span>
                    <input type="text" placeholder="Search menu..." class="search-input" name="search"
                        value="{{ request('search') }}">
                </form>
                <button class="create-btn" onclick="window.location.href='{{ route('menu.create') }}'">
                    <span class="create-text">Create Menu</span>
                    <span class="material-symbols-outlined">add</span>
                </button>
            </div>

            <div class="menu-cards">
                @foreach ($menu as $index => $Menu)
                    <div class="menu-card">
                        <div class="menu-id">#{{ $menu->count() - $index }}</div>
                        <div class="menu-awal">
                            <img src="{{ asset($Menu->fotoMenu) }}" alt="Menu Image" class="menu-image">
                        </div>
                        <div class="menu-info">
                            <h2>{{ $Menu->namaMenu }}</h2>
                            <p>Rp {{ number_format($Menu->hargaMenu, 0, ',', '.') }}</p>
                        </div>
                        <div class="menu-buttons">
                            <button class="menuedit-btn"
                                onclick="window.location.href='{{ route('menu.edit', ['id' => $Menu->id]) }}'">
                                <span class="material-symbols-outlined">edit</span>
                            </button>
                            <button class="menudelete-btn"
                                onclick="openDeleteModal('{{ $Menu->id }}', '{{ $Menu->namaMenu }}')">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                            <form id="delete-form-{{ $Menu->id }}"
                                action="{{ route('menu.delete', ['id' => $Menu->id]) }}" method="POST"
                                style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
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
            {{-- <button type="button" class="modal-button confirm-button" onclick="closeSuccessModal()">OK</button> --}}
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
        let currentDeleteId = null;

        function openDeleteModal(id, name) {
            currentDeleteId = id;
            document.getElementById('deleteMessage').innerText =
                `Are you sure you want to delete the Menu with the name ${name}?`;
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
            window.location.href = '{{ route('menu.show') }}'; // Ganti dengan route atau URL yang sesuai
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
            window.location.href = '{{ route('menu.show') }}';
        }
    </script>

</body>

</html>
