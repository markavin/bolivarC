<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee - Create Sales</title>
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
            margin-bottom: 0px;
            margin-top: 10px;
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

        .menu-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .menu-select-group {
            flex: 1;
        }

        .menuSelect {
            width: 100%;
            border-radius: 8px;
        }

        .menu-quantity-group {
            flex: 0 0 100px;
        }

        .menuQuantity {
            width: 100%;
            border-radius: 8px;
        }

        #addMenuBtn {
            margin-top: 0px;
            margin-bottom: 10px;
            color: #96D3FF;
            background: none;
            border: none;
            cursor: pointer;
            text-decoration: underline;
        }
/* 
        .form-group input,
        .form-group select {
            width: 100%;
            box-sizing: border-box;
           
        } */

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 0;
            /* Hapus margin atas */
            padding: 10px 40px;
            /* Tambahkan padding untuk menyesuaikan posisi */
            /* Tambahkan latar belakang hijau jika ingin menyatu */
            border-bottom-left-radius: 12px;
            /* Sesuaikan dengan border-radius container */
            border-bottom-right-radius: 12px;
            margin-right: 165px;
            /* Sesuaikan dengan border-radius container */
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

        .payment-group {
            display: flex;
            gap: 20px;
        }

        .payment-group .form-group {
            flex: 1;
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
    </style>
</head>

<body>
    @include('layout.sidebar')

    <div class="main-content">
        <header>
            <h1>Sales / <span style="color: #445D48;">Create Sales</span></h1>
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

            <form action="{{ route('penjualan.store') }}" method="POST" id="createSaleForm"
                onsubmit="return validateForm(event)">
                @csrf
                <div class="form-group">
                    <label for="customerSelect">Choose Customers</label>
                    <select id="customerSelect" name="NamaPelanggan" onchange="toggleCustomerFields()">
                        <option value="">Choose a customer</option>
                        <option value="0">Guest</option>
                        @foreach ($pelanggan as $customer)
                            <option value="{{ $customer->id }}" data-phone="{{ $customer->NoHP }}">
                                {{ $customer->NamaPelanggan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div id="customerFields" class="form-group">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="text" id="phoneNumber" readonly>
                </div>

                <div id="menuContainer">
                    <div class="menu-group">
                        <div class="form-group menu-select-group">
                            <label for="menuSelect">Choose Menu</label>
                            <select class="menuSelect" name="namaMenu[]" required onchange="calculateTotalPrice(this)">
                                <option value="">Choose menu</option>
                                @foreach ($menu as $item)
                                    <option value="{{ $item->id }}" data-price="{{ $item->hargaMenu }}">
                                        {{ $item->namaMenu }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group menu-quantity-group">
                            <label for="menuQuantity">Quantity</label>
                            <input type="number" class="menuQuantity" name="quantity[]" min="1" value="1"
                                required oninput="calculateTotalPrice(this)">
                        </div>
                    </div>
                </div>

                <button type="button" id="addMenuBtn">Add Menu</button>

                <div class="form-group">
                    <label for="totalQuantity">Total Quantity</label>
                    <input type="text" id="totalQuantity" name="totalQuantity" readonly>
                </div>

                <div class="form-group">
                    <label for="totalPrice">Total Price</label>
                    <div style="display: flex; align-items: center;">
                        <span style="margin-right: 5px;">Rp</span>
                        <input type="text" id="totalPriceDisplay" readonly>
                    </div>
                    <input type="hidden" id="totalPrice" name="totalHarga">
                </div>

                <div class="payment-group">
                    <div class="form-group">
                        <label for="paymentAmount">Nominal of Payment</label>
                        <div style="display: flex; align-items: center;">
                            <span style="margin-right: 5px;">Rp</span>
                            <input type="number" id="paymentAmount" name="totalBayar" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="returnAmount">Return</label>
                        <div style="display: flex; align-items: center;">
                            <span style="margin-right: 5px;">Rp</span>
                            <input type="text" id="returnAmount" readonly>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <div class="form-actions">
            <button type="button" class="cancel-btn"
                onclick="window.location='{{ route('penjualan.show') }}'">Cancel</button>
            <button type="submit" form="createSaleForm" class="submit-btn">Create Sale</button>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="success-modal">
        <div class="success-content">
            <div class="success-icon">
                <i class="material-icons-outlined">check_circle</i>
            </div>
            <p class="modal-message">Payment Successful!</p>
            <p class="modal-message">{{ $customer->NamaPelanggan }} GOT +10 POINT.</p>
            <button type="button" class="modal-button confirm-button" onclick="closeSuccessModal()">DONE</button>
        </div>
    </div>

    <!-- Success Modal for guest -->
    <div id="successguest" class="success-guest">
        <div class="success-modelG">
            <div class="guest-icon">
                <i class="material-icons-outlined">check_circle</i>
            </div>
            <p class="modal-message">Payment Successful!</p>
            <button type="button" class="modal-button confirm-button" onclick="closeSuccessModal()">DONE</button>
        </div>
    </div>

    <!-- Error Modal -->
    <div id="errorModal" class="error-modal">
        <div class="error-content">
            <div class="error-icon">
                <i class="material-icons-outlined">error</i>
            </div>
            <p class="modal-message">Payment failed!</p>
            <p class="modal-message">The payment amount is less than the total price.</p>
            <button type="button" class="modal-button confirm-button" onclick="closeErrorModal()">BACK</button>
        </div>
    </div>

    <script>
        document.getElementById('customerSelect').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const phoneNumber = selectedOption.dataset.phone || '';

            if (selectedOption.value === '0') {
                document.getElementById('customerFields').style.display = 'none';
            } else {
                document.getElementById('customerFields').style.display = 'block';
                document.getElementById('phoneNumber').value = phoneNumber;
            }
        });

        function validateForm(event) {
            const totalBayar = parseFloat(document.getElementById('paymentAmount').value);
            const totalHarga = parseFloat(document.getElementById('totalPrice').value);

            if (totalBayar < totalHarga) {
                event.preventDefault();
                document.getElementById('errorModal').style.display = 'flex';
                return false;
            }

            event.preventDefault();
            const selectedCustomer = document.getElementById('customerSelect').value;
            if (selectedCustomer === '0') {
                document.getElementById('successguest').style.display = 'flex';
            } else {
                document.getElementById('successModal').style.display = 'flex';
            }
            return false;
        }

        function closeSuccessModal() {
            document.getElementById('successModal').style.display = 'none';
            document.getElementById('successguest').style.display = 'none';
            document.getElementById('createSaleForm').submit();
        }

        function closeErrorModal() {
            document.getElementById('errorModal').style.display = 'none';
        }

        function calculateTotalPrice() {
            const menuGroups = document.querySelectorAll('.menu-group');
            let totalPrice = 0;
            let totalQuantity = 0;

            menuGroups.forEach(group => {
                const menuSelect = group.querySelector('.menuSelect');
                const quantityInput = group.querySelector('.menuQuantity');
                const price = parseFloat(menuSelect.options[menuSelect.selectedIndex]?.dataset.price || 0);
                const quantity = parseInt(quantityInput.value) || 0;

                totalPrice += price * quantity;
                totalQuantity += quantity;
            });

            // Tampilkan Total Price tanpa simbol "Rp" di dalam input
            document.getElementById('totalPriceDisplay').value = totalPrice;
            document.getElementById('totalPrice').value = totalPrice;
            document.getElementById('totalQuantity').value = totalQuantity;
            calculateReturnAmount();
        }

        function calculateReturnAmount() {
            // Ambil nilai total harga dan jumlah pembayaran
            const totalPrice = parseFloat(document.getElementById('totalPrice').value.replace(/[^0-9]/g, '')) || 0;
            const paymentAmount = parseFloat(document.getElementById('paymentAmount').value.replace(/[^0-9]/g, '')) || 0;

            // Hitung jumlah pengembalian
            const returnAmount = paymentAmount - totalPrice;

            // Tampilkan jumlah pengembalian hanya dengan angka
            document.getElementById('returnAmount').value = returnAmount >= 0 ?
                returnAmount.toLocaleString('id-ID') :
                `-${Math.abs(returnAmount).toLocaleString('id-ID')}`;
        }


        // Tambahkan event listener untuk menghitung jumlah pengembalian saat pengguna mengetik di input pembayaran
        document.getElementById('paymentAmount').addEventListener('input', calculateReturnAmount);

        document.getElementById('addMenuBtn').addEventListener('click', function() {
            const newMenuGroup = document.createElement('div');
            newMenuGroup.classList.add('menu-group');
            newMenuGroup.innerHTML = `
        <div class="form-group menu-select-group">
            <label>Choose Menu</label>
            <select class="menuSelect" name="namaMenu[]" required onchange="calculateTotalPrice()">
                <option value="">Choose menu</option>
                @foreach ($menu as $item)
                    <option value="{{ $item->id }}" data-price="{{ $item->hargaMenu }}">{{ $item->namaMenu }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group menu-quantity-group">
            <label>Quantity</label>
            <input type="number" class="menuQuantity" name="quantity[]" min="1" value="1" required oninput="calculateTotalPrice()">
        </div>`;
            document.getElementById('menuContainer').appendChild(newMenuGroup);
        });
    </script>

</body>

</html>
