<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @include('layout.sidebar')

    <div class="main-content">
        <header>
            <h1>Bolívar Coffee - purchase List <span class="status-dot"></span></h1>
            {{-- <button class="payment-btn">Create purchase</button> --}}
            <div class="notification"></div>
        </header>
        <div class="purchase-view">
            <div class="search-bar">
                <span class="material-symbols-outlined search-icon">Search</span>
                <input type="text" placeholder="Search Purchase..." class="search-input">
                <button class="create-btn">
                    <span class="create-text">Create Purchase</span>
                    <span class="material-symbols-outlined">Add</span> 
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Purchase ID</th>
                        <th>Stock Name</th>
                        <th>Purchase Date</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pembelian as $Purchase)
                        <tr>
                            <td>{{ $Purchase->id_pembelian }}</td>
                            <td>{{ $Purchase->namaBahanBaku }}</td>
                            <td>{{ $Purchase->tanggalPembelian }}</td>
                            <td>{{ $Purchase->totalQuantity }}</td>
                            <td>{{ $Purchase->totalHarga }}</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="visibility-btn">
                                        <span class="material-symbols-outlined">Visibility</span> 
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>

</html>
