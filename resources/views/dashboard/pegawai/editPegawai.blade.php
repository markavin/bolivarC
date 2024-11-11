<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee Dashboard - Edit Employee</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>

        .form-container {
            background: linear-gradient(135deg,  #445D48, #799C8C, #445D48);
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
                justify-content: flex-end; /* Menempatkan tombol di sisi kanan */
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
            top: 130px; 
            text-align: relative;
            margin-bottom: 0; 
            width: 800px; 
            padding-left: 210px;
    
        }
    
    </style>

</head>

<body>
    @include('layout.sidebar')


    <div class="main-content">
        <header>
            <h1>Employee / <span style="color: #445D48;">Edit Employee</span></h1>
        </header> 
        
        <div class="form-container">
        <form action="{{ route('pegawai.edit', $pengguna->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Menentukan metode PUT untuk update -->
           
            <div class="form-group">
                <label for="namaPengguna" class="form-label">Nama Pegawai</label>
                <span class="material-icons-outlined">badge</span>
                <input type="text" class="form-control" id="namaPengguna" name="namaPengguna" value="{{ $pengguna->namaPengguna }}" required>
            </div>

            <div class="form-group">
                <label for="noHP" class="form-label">Nomor HP</label>
                <span class="material-icons-outlined">call</span>
                <input type="text" class="form-control" id="noHP" name="noHP" value="{{ $pengguna->noHP }}" required>
            </div>
        </div>

            <div class="form-actions">
                <button type="button" class="cancel-btn" onclick="window.location='{{ route('pegawai.show') }}'">Cancel</button>
            <button type="submit" class="submit-btn">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</body>

</html>