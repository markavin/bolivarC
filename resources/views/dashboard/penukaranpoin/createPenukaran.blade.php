<!-- resources/views/dashboard/penukaranpoin/createPenukaran.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee - Create Redemption</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <style>
        .form-container {
            background: linear-gradient(135deg, #445D48 0%, #799C8C 48%, #445D48 100%);
            padding: 20px 40px;
            border-radius: 12px;
            color: #ffffff;
            max-width: 800px;
            margin: 50px auto 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .form-container h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #ddd;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 16px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            background-color: #f5f5f5;
            color: #333;
        }

        .form-row {
            display: flex;
            gap: 20px;
        }

        .form-row .form-group {
            flex: 1;
        }

        #addStockBtn {
            color: #96D3FF;
            background: none;
            border: none;
            cursor: pointer;
            text-decoration: underline;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding: 10px 40px;
            border-bottom-left-radius: 12px;
            border-bottom-right-radius: 12px;
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
            color: #000;
        }

        .submit-btn {
            background: linear-gradient(135deg, #D1FDE8 0%, #445D48 100%);
            color: #000;
        }

        .currency-label {
            display: flex;
            align-items: center;
        }

        .currency-label span {
            margin-right: 5px;
        }

        /* Tambahan untuk alert */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-danger {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
    </style>
</head>

<body>
    @include('layout.sidebar')

    <div class="main-content">
        <header>
            <h1>Redemption / <span style="color: #445D48;">Create Redemption</span></h1>
        </header>

        <div class="form-container">
            <!-- Menampilkan pesan sukses atau error -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('penukaran.store') }}" method="POST" id="createRedemptionForm">
                @csrf

                <!-- Pilih Pelanggan -->
                <div class="form-group">
                    <label for="id_pelanggan">Choose Customer</label>
                    <select name="id_pelanggan" id="id_pelanggan" class="form-control" required>
                        <option value="">Choose Customer</option>
                        @foreach ($pelanggan as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->NamaPelanggan }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Menampilkan Total Poin Pelanggan -->
                <div class="form-group">
                    <label for="total_poin">Total Points</label>
                    <input type="text" id="total_poin" class="form-control" readonly>
                </div>

                <!-- Pilih Menu -->
                <div class="form-group">
                    <label for="id_menu">Choose Menu</label>
                    <select name="id_menu" id="id_menu" class="form-control" required>
                        <option value="">Choose Menu</option>
                        @foreach ($menu as $item)
                            <option value="{{ $item->id }}">{{ $item->namaMenu }} (Price: Rp {{ number_format($item->hargaMenu, 0, ',', '.') }})</option>
                        @endforeach
                    </select>
                </div>

                <!-- Menampilkan Pengurangan Poin -->
                <div class="form-group">
                    <label for="deduct_poin">Points Deducted</label>
                    <input type="text" id="deduct_poin" class="form-control" readonly>
                </div>

                <!-- Tombol Submit -->
                <div class="form-actions">
                    <button type="button" class="cancel-btn" onclick="window.location='{{ route('poin.show') }}'">Cancel</button>
                    <button type="submit" class="submit-btn">Create Redemption</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const pelangganSelect = document.getElementById('id_pelanggan');
            const totalPoinInput = document.getElementById('total_poin');
            const menuSelect = document.getElementById('id_menu');
            const deductPoinInput = document.getElementById('deduct_poin');

            // Event Listener untuk memilih pelanggan
            pelangganSelect.addEventListener('change', function () {
                const pelangganId = this.value;

                if (pelangganId) {
                    fetch(`/api/pelanggan/${pelangganId}/poin`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.total_poin !== undefined) {
                                totalPoinInput.value = data.total_poin;
                            } else {
                                totalPoinInput.value = '0';
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching poin pelanggan:', error);
                            totalPoinInput.value = '0';
                        });
                } else {
                    totalPoinInput.value = '';
                }

                // Reset pengurangan poin ketika pelanggan berubah
                deductPoinInput.value = '';
                menuSelect.value = '';
            });

            // Event Listener untuk memilih menu
            menuSelect.addEventListener('change', function () {
                const menuId = this.value;

                if (menuId) {
                    fetch(`/api/menu/${menuId}/diskon`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.deduct_poin !== undefined) {
                                deductPoinInput.value = data.deduct_poin;
                            } else {
                                deductPoinInput.value = '0';
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching diskon menu:', error);
                            deductPoinInput.value = '0';
                        });
                } else {
                    deductPoinInput.value = '';
                }
            });
        });
    </script>
</body>

</html>
