<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee Dashboard - Create Menu</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .form-container {
            background: linear-gradient(135deg, #445D48, #799C8C, #445D48);
            padding: 40px 50px;
            border-radius: 12px;
            color: #ffffff;
            width: 800px;
            height: 400px;
            margin: 100px auto 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .form-container h1 {
            font-size: 24px;
            color: #333333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            font-size: 14px;
            color: #ffffff;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            margin-top: 15px;
            width: 100%;
            padding: 12px 16px 12px 45px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            background-color: #f5f5f5;
            color: #333;
        }

        .form-group .material-icons-outlined {
            margin-top: 15px;
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #445D48;
            font-size: 20px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            /* Menempatkan tombol di sisi kanan */
            gap: 10px;
            margin: 20px 0 0 0;
            width: 700px;
            margin-left: 315px;
        }

        .cancel-btn,
        .submit-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        .cancel-btn {
            background-color: #f5f5f5;
            color: #000000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .submit-btn {
            background: linear-gradient(135deg, #D1FDE8, #445D48);
            color: #000000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .main-content header {
            position: relative;
            top: 80px;
            text-align: center;
            margin-bottom: 0;
            width: 800px;
            padding-right: 70px;
        }

        .modal {
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

        .modal-content {
            background-color: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 90%;
            max-width: 400px;
        }

        .modal-icon {
            font-size: 80px;
            margin-bottom: 20px;
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

        header {
            margin-top: 10px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding-left: 100px;
            margin-left: 120px
        }
    </style>
</head>

<body>
    @include('layout.sidebar')

    <div class="main-content">
        <header>
            <h1>Menu / <span style="color: #445D48;">Create Menu</span></h1>
        </header>

        <div class="form-container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data" id="createMenuForm"
                onsubmit="validateForm(event)">
                @csrf

                <div class="form-group">
                    <label for="namaMenu" class="form-label">Menu Name</label>
                    <span class="material-icons-outlined">badge</span>
                    <input type="text" class="form-control" id="namaMenu" name="namaMenu"
                        placeholder="Enter a new menu name" required>
                </div>

                <div class="form-group">
                    <label for="fotoMenu" class="form-label">Menu Image</label>
                    <span class="material-icons-outlined">panorama</span>
                    <input type="file" class="form-control" id="fotoMenu" name="fotoMenu" accept="image/*" required>
                </div>

                <div class="form-group">
                    <label for="hargaMenu" class="form-label">Menu Price</label>
                    <span class="material-icons-outlined">payments</span>
                    <input type="text" step="0.01" class="form-control" id="hargaMenu" name="hargaMenu"
                        placeholder="Enter a new price menu in Rupiah" required oninput="formatHargaMenu(event)">
                </div>

        </div>

        <div class="form-actions">
            <button type="button" class="cancel-btn"
                onclick="window.location='{{ route('menu.show') }}'">Cancel</button>
            <button type="submit" class="submit-btn">Create Menu</button>
        </div>
        </form>

    </div>

    <!-- Success Modal -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon" style="color: #28a745;">
                <i class="material-icons-outlined">check_circle</i>
            </div>
            <p class="modal-message">"Menu created successfully!"</p>
            <button type="button" class="modal-button" onclick="closeSuccessModal()">DONE</button>
        </div>
    </div>

    <!-- Error Modal -->
    <div id="errorModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon" style="color: #dc3545;">
                <i class="material-icons-outlined">error</i>
            </div>
            <p class="modal-message" id="errorMessage">Menu creation failed! Please check your inputs.</p>
            <button type="button" class="modal-button" onclick="closeErrorModal()">BACK</button>
        </div>
    </div>
    <script>
        const MenuShowUrl = "{{ route('menu.show') }}";

        function formatNumber(number) {
            return number.toLocaleString('id-ID');
        }
        async function checknamamenu(namaMenu) {
            const response = await fetch(`{{ route('menu.Checknamamenu') }}?namaMenu=${namaMenu}`);
            const result = await response.json();
            return result.exists;
        }

        function formatHargaMenu(event) {
            // Ambil nilai inputan
            let input = event.target.value;

            // Hapus semua karakter selain angka
            input = input.replace(/\D/g, "");

            // Format angka dengan titik sebagai pemisah ribuan
            const formattedInput = input.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

            // Set nilai input dengan hasil format
            event.target.value = formattedInput;
        }

        async function validateForm(event) {
            event.preventDefault();

            const namaMenu = document.getElementById('namaMenu').value.trim();

            const namaMenuExists = await checknamamenu(namaMenu);

            if (namaMenuExists) {
                showErrorModal("The menu name already exists. Please use a different name.");
            } else {
                // document.getElementById('namaMenu').textContent = namaMenu;
                document.getElementById('successModal').style.display = 'flex';
            }
        }

        function showErrorModal(message) {
            document.getElementById('errorMessage').textContent = message;
            document.getElementById('errorModal').style.display = 'flex';
        }

        function closeSuccessModal() {
            document.getElementById('successModal').style.display = 'none';
            document.getElementById('createMenuForm').submit(); // Submit the form after success modal
        }

        function closeErrorModal() {
            document.getElementById('errorModal').style.display = 'none';
        }

        function removeDotsFromHarga() {
            const hargaInput = document.getElementById('hargaMenu');
            let harga = hargaInput.value;
            // Menghapus titik dari input
            harga = harga.replace(/\./g, "");
            hargaInput.value = harga;
        }

        // Tambahkan event listener untuk submit form
        document.getElementById('createMenuForm').addEventListener('submit', removeDotsFromHarga);
    </script>
</body>

</html>
