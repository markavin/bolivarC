<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee Dashboard - Customers</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        /* Styling untuk form create */

        .form-container {
            background: linear-gradient(135deg, #445D48, #799C8C, #445D48);
            padding: 40px 50px;
            border-radius: 12px;
            color: #ffffff;
            width: 800px;
            height: 300px;
            margin: 150px auto 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            position: relative;
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
            top: 100px;
            text-align: relative;
            /* Mengubah agar header rata kiri */
            margin-bottom: 0;
            width: 800px;
            padding-left: 140px;
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
            margin-left: 80px
        }
    </style>
</head>

<body>
    @include('layout.sidebar')

    <div class="main-content">
        <header>
            <h1>Customers / <span style="color: #445D48;">Create Customers</span></h1>
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

            <form action="{{ route('pelanggan.store') }}" method="POST" id="createCustForm"
                onsubmit="validateForm(event)">
                @csrf
                <div class="form-group">
                    <label for="NamaPelanggan" class="form-label">Customers Name</label>
                    <span class="material-icons-outlined">badge</span>
                    <input type="text" class="form-control" id="NamaPelanggan" name="NamaPelanggan"
                        placeholder="Enter a new customer name" required>
                </div>

                <div class="form-group">
                    <label for="NoHP" class="form-label">Phone Number</label>
                    <span class="material-icons-outlined">call</span>
                    <input type="text" class="form-control" id="NoHP" name="NoHP"
                        placeholder="Enter a new phone number" required>
                </div>
        </div>

        <div class="form-actions">
            <button type="button" class="cancel-btn"
                onclick="window.location='{{ route('pelanggan.show') }}'">Cancel</button>
            <button type="submit" class="submit-btn">Create Customer</button>
        </div>
        </form>

    </div>

    <!-- Success Modal -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon" style="color: #28a745;">
                <i class="material-icons-outlined">check_circle</i>
            </div>
            <p class="modal-message">Customer created successfully!</p>
            <p class="modal-message" id="successCustomerMessage"></p>
            <button type="button" class="modal-button" onclick="closeSuccessModal()">DONE</button>
        </div>
    </div>

    <!-- Error Modal -->
    <div id="errorModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon" style="color: #dc3545;">
                <i class="material-icons-outlined">error</i>
            </div>
            <p class="modal-message" id="errorMessage">Customers creation failed! Please check your inputs.</p>
            <button type="button" class="modal-button" onclick="closeErrorModal()">BACK</button>
        </div>
    </div>

    <script>
        const pelangganShowUrl = "{{ route('pelanggan.show') }}";

        async function checknoHP(NoHP) {
            const response = await fetch(`{{ route('pelanggan.ChecknoHP') }}?NoHP=${NoHP}`);
            const result = await response.json();
            return result.exists;
        }

        async function validateForm(event) {
            event.preventDefault(); // Prevent the default form submission

            const namaPelanggan = document.getElementById('NamaPelanggan').value.trim();
            const NoHP = document.getElementById('NoHP').value.trim();

            const noHPexists = await checknoHP(NoHP);

            if (noHPexists) {
                showErrorModal("The phone number already exists. Please use a different number.");
            } else if (NoHP.length < 10 || NoHP.length > 15 || isNaN(NoHP)) {
                showErrorModal("The phone number is invalid. It must be between 10 and 15 digits.");
            } else {
                // Jika validasi berhasil, tampilkan nama pelanggan di modal sukses
                document.getElementById('successCustomerMessage').textContent = `${namaPelanggan} GOT +5 POINT.`;
                document.getElementById('successModal').style.display = 'flex';
            }
        }


        function showErrorModal(message) {
            document.getElementById('errorMessage').textContent = message;
            document.getElementById('errorModal').style.display = 'flex';
        }

        function closeSuccessModal() {
            document.getElementById('successModal').style.display = 'none';
            document.getElementById('createCustForm').submit(); // Submit the form after success
        }

        function closeErrorModal() {
            document.getElementById('errorModal').style.display = 'none';
        }
    </script>
</body>

</html>
