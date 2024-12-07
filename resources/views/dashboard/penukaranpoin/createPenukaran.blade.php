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

        .success-modal,
        .error-modal,
        .success-guest {
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

        .success-content,
        .error-content,
        .success-modelG {
            background-color: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 90%;
            max-width: 400px;
        }

        .success-icon,
        .error-icon,
        .guest-icon {
            font-size: 80px;
            margin-bottom: 20px;
        }

        .success-icon,
        .guest-icon {
            color: #28a745;
        }

        .error-icon {
            color: #dc3545;
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
            margin-top: 5px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding-left: 220px;
        }
    </style>
</head>


<body>
    @include('layout.sidebar')

    <div class="main-content">
        <header>
            <h1>Redeem Point / <span style="color: #445D48;">Create Redeem Point</span></h1>
        </header>

        <div class="form-container">
            <!-- Menampilkan pesan sukses atau error -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
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
                            <option value="{{ $item->id }}">
                                {{ $item->namaMenu }} - Rp {{ number_format($item->hargaMenu, 0, ',', '.') }} -
                                {{ $item->deduct_poin }} Points
                            </option>
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
                    <button type="button" class="cancel-btn"
                        onclick="window.location='{{ route('poin.show') }}'">Cancel</button>
                    <button type="submit" class="submit-btn">Create Redemption</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Error Modal -->
    <div id="errorModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon" style="color: #dc3545;">
                <i class="material-icons-outlined">error</i>
            </div>
            <p class="modal-message" id="errorMessage">Purchase failed! Please check your inputs.</p>
            <button type="button" class="modal-button" onclick="closeErrorModal()">BACK</button>
        </div>
    </div>

    <!-- Success Modal -->
    <!-- Success Modal -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon" style="color: #28a745;">
                <i class="material-icons-outlined">check_circle</i>
            </div>
            <p class="modal-message">Redeem Point Successful!</p>
            {{-- <p class="modal-message">
                Sisa poin {{ $customer->NamaPelanggan }} sebesar {{ $customer->totalPoin }} Poin
            </p> --}}
            <button type="button" class="modal-button" onclick="closeSuccessModal()">DONE</button>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pelangganSelect = document.getElementById('id_pelanggan');
            const totalPoinInput = document.getElementById('total_poin');
            const menuSelect = document.getElementById('id_menu');
            const deductPoinInput = document.getElementById('deduct_poin');

            pelangganSelect.addEventListener('change', function() {
                const pelangganId = this.value;

                if (pelangganId) {
                    fetch(`/api/pelanggan/${pelangganId}/poin`)
                        .then(response => response.json())
                        .then(data => {
                            totalPoinInput.value = data.total_poin ?? '0';
                        })
                        .catch(() => {
                            totalPoinInput.value = '0';
                        });
                } else {
                    totalPoinInput.value = '';
                }

                deductPoinInput.value = '';
                menuSelect.value = '';
            });

            menuSelect.addEventListener('change', function() {
                const menuId = this.value;

                if (menuId) {
                    fetch(`/api/menu/${menuId}/diskon`)
                        .then(response => response.json())
                        .then(data => {
                            deductPoinInput.value = data.deduct_poin ?? '0';
                        })
                        .catch(() => {
                            deductPoinInput.value = '0';
                        });
                } else {
                    deductPoinInput.value = '';
                }
            });
        });

        const form = document.getElementById('createRedemptionForm');
        form.addEventListener('submit', function(event) {
            const totalPoin = parseInt(document.getElementById('total_poin').value) || 0;
            const deductPoin = parseInt(document.getElementById('deduct_poin').value) || 0;

            if (totalPoin < deductPoin) {
                event.preventDefault();
                document.getElementById('errorMessage').textContent =
                    `Insufficient points! You need ${deductPoin} points but you only have ${totalPoin} points.`;
                document.getElementById('errorModal').style.display = 'flex';
            } else {
                event.preventDefault();
                document.getElementById('successModal').style.display = 'flex';
            }
        });

        function closeSuccessModal() {
            document.getElementById('successModal').style.display = 'none';
            form.submit();
        }

        function closeErrorModal() {
            document.getElementById('errorModal').style.display = 'none';
        }
    </script>
</body>

</html>
