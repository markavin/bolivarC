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
            <h1>Bolívar Coffee - Stock List <span class="status-dot"></span></h1>
            {{-- <button class="payment-btn">Create Stock</button> --}}
            <div class="notification"></div>
        </header>

        <div class="stock-view">
            <div class="search-bar">
                <span class="material-symbols-outlined search-icon">Search</span>
                <input type="text" placeholder="Search Stock..." class="search-input">
                <button class="create-btn">
                <span class="create-text">Create Stock</span>
                <span class="material-symbols-outlined">Add</span> 
            </div>
            <table>
                <thead>
                    <tr>
                        <th>stock ID</th>
                        <th>stock Name</th>
                        <th>Stock Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($bahanBaku as $BahanBaku)
                        <tr>
                            <td>{{ $BahanBaku->id }}</td>
                            <td>{{ $BahanBaku->namaBahanBaku }}</td>
                            <td>{{ $BahanBaku->jumlahBahanBaku }}</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="edit-btn">
                                        <span class="material-symbols-outlined">edit</span> 
                                    </button>
                                    <button class="delete-btn">
                                        <span class="material-symbols-outlined">delete</span> 
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
