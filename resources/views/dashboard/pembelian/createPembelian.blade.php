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

            <form action="{{ route('pembelian.store') }}" method="POST" id="createPurchaseForm">
                @csrf
                <div id="stockContainer">
                    <!-- Stock Group -->
                    <div class="stock-group">
                        <!-- Row for Choose Stock and Quantity -->
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
                                <input type="number" class="stockQuantity" name="quantity[]" min="1" value="1"
                                    required oninput="calculateSubTotal(this)">
                            </div>
                        </div>

                        <!-- Row for Price and Subtotal -->
                        <div class="form-row">
                            <div class="form-group stock-price-group">
                                <label for="stockPrice">Price</label>
                                <div class="currency-label">
                                    <span>Rp</span>
                                    <input type="number" class="stockPrice" name="harga[]" min="0" required
                                        oninput="calculateSubTotal(this)">
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

                <!-- Summary for Total Quantity and Total Price -->
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
            <button type="button" class="cancel-btn" onclick="window.location='{{ route('pembelian.show') }}'">Cancel</button>
            <button type="submit" form="createPurchaseForm" class="submit-btn">Create Purchase</button>
        </div>
    </div>

    <script>
        function calculateSubTotal(element) {
            const stockGroup = element.closest('.stock-group');
            const priceInput = stockGroup.querySelector('.stockPrice');
            const quantityInput = stockGroup.querySelector('.stockQuantity');
            const subTotalInput = stockGroup.querySelector('.stockSubTotal');

            const price = parseFloat(priceInput.value) || 0;
            const quantity = parseInt(quantityInput.value) || 0;

            // Hitung subtotal untuk item ini
            const subTotal = price * quantity;
            subTotalInput.value = subTotal;

            // Update total harga dan total quantity
            calculateTotalPrice();
        }

        function calculateTotalPrice() {
            const stockGroups = document.querySelectorAll('.stock-group');
            let totalPrice = 0;
            let totalQuantity = 0;

            stockGroups.forEach(group => {
                const subTotalInput = group.querySelector('.stockSubTotal');
                const quantityInput = group.querySelector('.stockQuantity');

                const subTotal = parseFloat(subTotalInput.value) || 0;
                const quantity = parseInt(quantityInput.value) || 0;

                totalPrice += subTotal;
                totalQuantity += quantity;
            });

            // Tampilkan total price dan total quantity
            document.getElementById('totalPriceDisplay').value = totalPrice;
            document.getElementById('totalPrice').value = totalPrice;
            document.getElementById('totalQuantity').value = totalQuantity;
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
