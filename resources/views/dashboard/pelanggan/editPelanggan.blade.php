<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee Dashboard - Edit Customers</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        .form-container {
            background: linear-gradient(135deg, #445D48, #799C8C, #445D48);
            padding: 40px 50px;
            border-radius: 12px;
            color: #ffffff;
            width: 800px;
            height: 300px;
            margin: 130px auto 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            position: relative;
            /* margin-left: 50px; */
        }

        .form-container h1 {
            font-size: 24px;
            color: #333333;
            margin-bottom: 30px;
            text-align: left;
            /* Mengatur header agar rata kiri */
            margin-left: 0;
            /* Menghilangkan margin kiri agar lebih rapat */
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
            /* Menempatkan tombol ke kiri */
            gap: 10px;
            margin: 20px 0 0 0;
            width: 700px;
            margin-left: 238px;
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
    </style>
</head>

<body>
    @include('layout.sidebar')

    <div class="main-content">
        <header>
            <h1>Customers / <span style="color: #445D48;">Edit Customers</span></h1>
        </header>

        <div class="form-container">
            <form action="{{ route('pelanggan.edit', $pelanggan->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Menentukan metode PUT untuk update -->


                <div class="form-group">
                    <label for="NamaPelanggan" class="form-label">Customers Name</label>
                    <span class="material-icons-outlined">badge</span>
                    <input type="text" class="form-control" id="NamaPelanggan" name="NamaPelanggan"
                        value="{{ $pelanggan->NamaPelanggan }}" placeholder="Enter a new customer name" required>
                </div>

                <div class="form-group">
                    <label for="NoHP" class="form-label">Phone Number</label>
                    <span class="material-icons-outlined">call</span>
                    <input type="text" class="form-control" id="NoHP" name="NoHP"
                        value="{{ $pelanggan->NoHP }}" placeholder="Enter a new customer name" required>
                </div>

        </div>

        <div class="form-actions">
            <button type="button" class="cancel-btn"
                onclick="window.location='{{ route('pelanggan.show') }}'">Cancel</button>
            <button type="submit" class="submit-btn">Edit Customers</button>
        </div>
        </form>

    </div>
</body>

</html>
