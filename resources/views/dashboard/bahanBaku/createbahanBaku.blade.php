<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee Dashboard - Create Stock</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
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
            gap: 10px;
            margin: 20px 0 0 0; 
            width: 700px; 
            margin-left: auto;
            margin-right: auto;
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
            color: #333;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .submit-btn {
            background: linear-gradient(135deg, #B0EACD, #445D48);
            color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    @include('layout.sidebar')

    <div class="main-content">
        <header>
            <h1>Stock / <span style="color: #445D48;">Create Stock</span></h1>
        </header>

        <div class="form-container">
            <form action="{{ route('stocks.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="namaBahanBaku">Stock Name</label>
                    <span class="material-icons-outlined">description</span>
                    <input type="text" id="namaBahanBaku" name="namaBahanBaku" placeholder="Enter a new stock name" required>
                </div>
                <div class="form-group">
                    <label for="jumlahBahanBaku">Stock Quantity</label>
                    <span class="material-icons-outlined">inventory</span>
                    <input type="number" id="jumlahBahanBaku" name="jumlahBahanBaku" placeholder="Enter a new stock quantity" required min="1">
                </div>
            
        </div>

        <div class="form-actions">
            <button type="button" class="cancel-btn" onclick="window.location='{{ route('bahanBaku.show') }}'">Cancel</button>
            <button type="submit" class="submit-btn">Create Stock</button>
        </div>
    </form>

    </div>

</body>

</html>