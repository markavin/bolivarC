<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee - Create Purchase</title>
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
            box-sizing: border-box;
        }

        .currency-label {
            display: flex;
            align-items: center;
            margin-top: 5px;
        }

        .currency-label span {
            margin-right: 5px;
        }

        .form-row {
            display: flex;
            gap: 20px;
        }

        .stock-select-group,
        .stock-quantity-group,
        .stock-price-group,
        .stock-subtotal-group {
            flex: 1;
        }

        /* Container for each stock group */
        .stock-group {
            margin-left: 0%;
            /* margin-bottom: 5px; */
            padding: 15px;
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
            margin-right: 175px;
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

        .summary-group {
            margin-top: 20px;
        }

        .summary-group .form-group {
            width: 100%;
        }

        .result-box {
            background-color: rgba(255, 255, 255, 0.9);
            border: 2px solid #445D48;
            border-radius: 5px;
            padding: 10px;
            width: auto;
            text-align: left;
            font-size: 18px;
            color: #333;
            margin-left: 10px;
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
            <h1>Purchase / <span style="color: #445D48;">Create Purchase</span></h1>
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

            <form action="{{ route('pembelian.store') }}" method="POST" id="createPurchaseForm"
                onsubmit="return validateForm(event)">
                @csrf
                <div id="stockContainer">
                    <div class="stock-group">
                        <div class="form-row">
                            <div class="form-group stock-select-group">
                                <label for="bahanBakuSelect">Choose Stock</label>
                                <select class="bahanBakuSelect" name="namaBahanBaku[]" required>
                                    <option value="">Choose Stock</option>
                                    @foreach ($bahanBaku as $item)
                                        <option value="{{ $item->id }}" data-price="{{ $item->hargaBahan }}">
                                            {{ $item->namaBahanBaku }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group stock-quantity-group">
                                <label for="stockQuantity">Quantity</label>
                                <input type="number" class="stockQuantity" name="quantity[]" min="1"
                                    value="1" required oninput="calculateSubTotal(this)">
                            </div>
                        </div>

                        <!-- Row for Price and Subtotal -->
                        <div class="form-row">
                            <div class="form-group stock-price-group">
                                <label for="stockPrice">Price</label>
                                <div class="currency-label">
                                    <span>Rp</span>
                                    <input type="text" class="stockPrice" name="harga[]" required
                                        oninput="formatInputPrice(this)">
                                </div>
                            </div>

                            <div class="form-group stock-subtotal-group">
                                <label for="stockSubTotal">SubTotal</label>
                                <div class="currency-label">
                                    <span>Rp</span>
                                    <input type="text" class="stockSubTotal" name="subTotal[]" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" id="addStockBtn" onclick="addStock()">Add Stock</button>

                <div class="summary-group">
                    <div class="form-group">
                        <label for="totalQuantity">Total Quantity</label>
                        <input type="text" id="totalQuantity" name="totalQuantity" readonly>
                    </div>

                    <div class="form-group">
                        <label for="totalPrice">Total Price</label>
                        <div class="currency-label">
                            <span>Rp</span>
                            <input type="text" id="totalPriceDisplay" readonly>
                        </div>
                        <input type="hidden" id="totalPrice" name="totalHarga">
                    </div>
                </div>

            </form>
        </div>

        <div class="form-actions">
            <button type="button" class="cancel-btn"
                onclick="window.location='{{ route('pembelian.show') }}'">Cancel</button>
            <button type="submit" form="createPurchaseForm" class="submit-btn">Create Purchase</button>
        </div>
    </div>


    <!-- Error Modal -->
    <div id="errorModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon" style="color: #dc3545;">
                <i class="material-icons-outlined">error</i>
            </div>
            <p class="modal-message">Purchase failed! Please check your inputs.</p>
            <button type="button" class="modal-button" onclick="closeErrorModal()">BACK</button>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon" style="color: #28a745;">
                <i class="material-icons-outlined">check_circle</i>
            </div>
            <p class="modal-message">Purchase Successful!</p>
            <button type="button" class="modal-button" onclick="closeSuccessModal()">DONE</button>
        </div>
    </div>

    <script>
        const pembelianShowUrl = "{{ route('pembelian.show') }}";
        const pembelianCreateUrl = "{{ route('pembelian.create') }}";

        function formatNumber(number) {
            return number.toLocaleString('id-ID'); 
        }

        function formatInputPrice(input) {
            let value = input.value.replace(/\./g, '');

            const number = parseInt(value, 10);

            if (!isNaN(number)) {
                input.value = number.toLocaleString('id-ID');
            } else {
                input.value = '';
            }

            calculateSubTotal(input);
        }


        function calculateSubTotal(element) {
            const stockGroup = element.closest('.stock-group');
            const priceInput = stockGroup.querySelector('.stockPrice');
            const quantityInput = stockGroup.querySelector('.stockQuantity');
            const subTotalInput = stockGroup.querySelector('.stockSubTotal');

            
            const price = parseFloat(priceInput.value.replace(/\./g, '')) || 0;
            const quantity = parseInt(quantityInput.value) || 0;
            const subTotal = price * quantity;

            subTotalInput.value = subTotal.toLocaleString('id-ID');
            calculateTotalPrice(); 
        }


        function calculateTotalPrice() {
            const stockGroups = document.querySelectorAll('.stock-group');
            let totalPrice = 0;
            let totalQuantity = 0;

            stockGroups.forEach(group => {
                const subTotalInput = group.querySelector('.stockSubTotal');
                const quantityInput = group.querySelector('.stockQuantity');
                const subTotal = parseFloat(subTotalInput.value.replace(/\./g, '')) || 0;
                const quantity = parseInt(quantityInput.value) || 0;

                totalPrice += subTotal;
                totalQuantity += quantity;
            });

            document.getElementById('totalPriceDisplay').value = totalPrice.toLocaleString('id-ID');
            document.getElementById('totalPrice').value = totalPrice; // Gunakan nilai numerik untuk input hidden
            document.getElementById('totalQuantity').value = totalQuantity;
        }

        function validateForm(event) {
            event.preventDefault();

            const totalQuantity = parseFloat(document.getElementById('totalQuantity').value);
            const totalPrice = parseFloat(document.getElementById('totalPrice').value);

            if (totalQuantity > 0 && totalPrice > 0) {
                document.getElementById('successModal').style.display = 'flex';
            } else {
                document.getElementById('errorModal').style.display = 'flex';
            }
            return false;
            x
        }

        function closeSuccessModal() {
            document.getElementById('successModal').style.display = 'none';
            document.getElementById('createPurchaseForm').submit();
        }

        function closeErrorModal() {
            document.getElementById('errorModal').style.display = 'none';
            window.location.href = pembelianCreateUrl;
        }

        function addStock() {
            const newStockGroup = document.createElement('div');
            newStockGroup.classList.add('stock-group');
            newStockGroup.innerHTML = `
        <div class="form-row">
            <div class="form-group stock-select-group">
                <label>Choose Stock</label>
                <select class="bahanBakuSelect" name="namaBahanBaku[]" required>
                    <option value="">Choose Stock</option>
                    @foreach ($bahanBaku as $item)
                        <option value="{{ $item->id }}" data-price="{{ $item->hargaBahan }}">{{ $item->namaBahanBaku }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group stock-quantity-group">
                <label>Quantity</label>
                <input type="number" class="stockQuantity" name="quantity[]" min="1" value="1" required oninput="calculateSubTotal(this)">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group stock-price-group">
                <label>Price</label>
                <div class="currency-label">
                    <span>Rp</span>
                    <input type="number" class="stockPrice" name="harga[]" min="0" required oninput="calculateSubTotal(this)">
                </div>
            </div>
            <div class="form-group stock-subtotal-group">
                <label>SubTotal</label>
                <div class="currency-label">
                    <span>Rp</span>
                    <input type="text" class="stockSubTotal" name="subTotal[]" readonly>
                </div>
            </div>
        </div>`;
            document.getElementById('stockContainer').appendChild(newStockGroup);
        }
    </script>
</body>

</html>
