<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>



<body>
    <div class="sidebar">
        <img src="{{ asset('/img/logoobaru.png') }}" alt="Logo">
        <h2>Bolívar Coffee</h2>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <ul class="menu">
            <li class="active"><span class="material-icons">home</span> Home</li>
            <li><span class="material-icons">people</span> Customers</li>
            <li><span class="material-icons">menu_book</span> Menu</li>
            <li><span class="material-icons">inventory</span> Stock</li>
            <li><span class="material-icons">bar_chart</span> Sales</li>
            <li><span class="material-icons">shopping_cart</span> Purchase</li>
            <li><span class="material-icons">bar_chart</span> Point Exchange</li>
        </ul>
    </div>
    <div class="main-content">
        <header>
            <h1>Bolívar Coffee is Open <span class="status-dot"></span></h1>
            <button class="payment-btn">Payment</button>
            <div class="notification"></div>
        </header>
        <div class="summary">
            {{-- <div class="card">Total of Revenue<br><span>{{ $data['totalRevenue'] }}</span></div>
            <div class="card">Total of Sales Transactions<br><span>{{ $data['totalSalesTransactions'] }}</span></div>
            <div class="card">Total of Customers<br><span>{{ $data['totalCustomers'] }}</span></div> --}}
        </div>
        <div class="chart-section">
            {{-- <h2>Overview</h2>
            <canvas id="salesChart"></canvas> --}}
        </div>
        <div class="top-selling">
            {{-- <h2>Top Selling</h2>
            <ul>
                @foreach($data['topSelling'] as $item)
                    <li>{{ $item }}</li>
                @endforeach --}}
            </ul>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- <script>
        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode(array_column($data['salesData'], 'label')) !!},
                datasets: [{
                    label: 'Monthly Sales',
                    data: {!! json_encode(array_column($data['salesData'], 'value')) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script> --}}
</body>
</html>
