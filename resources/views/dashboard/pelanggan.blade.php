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
            <h1>Bolívar Coffee - Customers List <span class="status-dot"></span></h1>
            <button class="payment-btn">Create Customer</button>
            <div class="notification"></div>
        </header>

        <div class="customers-view">
            <div class="search-bar">
                <input type="text" placeholder="Search Customers..." class="search-input">
                <button class="create-btn">Create Customer</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Phone Number</th>
                        <th>Points</th>
                        <th>Transaction Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelanggan as $Pelanggan)
                        <tr>
                            <td>{{ $Pelanggan->id }}</td>
                            <td>{{ $Pelanggan->NamaPelanggan }}</td>
                            <td>{{ $Pelanggan->NoHP }}</td>
                            <td>{{ $Pelanggan->totalPoin }}</td>
                            <td>{{ $Pelanggan->transactionTotal }}</td>
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
