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
            <h1>Bolívar Coffee - sales List <span class="status-dot"></span></h1>
            <button class="payment-btn">Create Customer</button>
            <div class="notification"></div>
        </header>
        <div class="sales-view">
            <div class="search-bar">
                <input type="text" placeholder="Search sales..." class="search-input">
                <button class="create-btn">Create sales</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>sales ID</th>
                        <th>Customer Name</th>
                        <th>Sales Date</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($penjualan as $Sales)
                        <tr>
                            <td>{{ $Sales->id_penjualan }}</td>
                            <td>{{ $Sales->NamaPelanggan }}</td>
                            <td>{{ $Sales->tanggalPenjualan }}</td>
                            <td>{{ $Sales->totalQuantity }}</td>
                            <td>{{ $Sales->totalHarga }}</td>
                            <td>
                                <button class="edit-btn">Edit</button>
                                <button class="delete-btn">Delete</button>
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
