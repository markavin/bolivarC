<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* .navbar {
            display: flex;
            padding: 0.05rem 0.1rem;
            font-size: 0.9rem;
            box-shadow: 0 5px 8px rgba(0, 0, 0, 0.1);
            border-radius: 0 0 0.5rem 0.5rem;
            background: linear-gradient(135deg, #445D48 0%, #38B568 100%);
            color: #FFDAB9;
            margin-bottom: 20px;
            justify-content: center;
        } */
 
        .btn {
            display: inline-block;
            padding: 0.05rem 0.1rem;
            font-size: 0.9rem;
            /* box-shadow: 0 5px 8px rgba(0, 0, 0, 0.1);
            border-radius: 0 0 0.5rem 0.5rem; */
            background: linear-gradient(135deg, #445D48 0%, #38B568 100%);
            color: #FFDAB9;
            margin-bottom: 20px;
            margin-left: 150px;
            justify-content: center;
            width: 100px;
        }
 
        .navbar-nav .nav-link {
            padding: 0.1rem 0.1rem;
        }
 
        .header-container {
            display: flex;
            justify-content: space-between;
            /* Menempatkan navbar dan judul di sisi yang berbeda */
            align-items: center;
            /* Menyelaraskan secara vertikal */
            margin-bottom: 20px;
            /* Jarak di bawah header */
        }
 
        .user-info {
            color: #fffffF;
            font-size: 12px;
            text-align: center;
        }
 
        header {
            text-align: left;
            /* Menyelaraskan judul ke kiri */
            margin-left: 20px;
            /* Memberikan jarak dari tepi kiri */
        }
 
        #navbar {
            margin-right: 20px;
            /* Jarak dari tepi kanan */
        }
 
        .main-content {
            position: relative;
            /* Menjadikan konten utama sebagai referensi untuk posisi anak */
            padding: 20px;
            /* Jarak di dalam konten utama */
        }
 
        .navbar .nav-link {
            text-decoration: none;
            /* Menghilangkan underline */
        }
 
        .dropdown-toggle {
            border-radius: 20px;
            /* Membuat kotak lebih bulat */
            padding: 0.25rem 0.2rem;
            /* Mengurangi padding */
            font-size: 0.9rem;
            /* Mengubah ukuran font jika perlu */
            border-radius: 10px;
            margin-right: auto;
        }
 
        /* CSS untuk Responsif */
 
        .overview-view {
            margin-top: 20px;
        }
 
        .summary {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
 
        .summary-card {
            flex: 1;
            background: linear-gradient(180deg, #D1FDE8 0%, #445D48 100%);
            /* Ubah warna latar belakang menjadi gradien */
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
 
        .summary-card h5 {
            /* Warna teks untuk "Total Revenue", "Total Sales Transactions", dan "Total Customers" */
            font-size: 16px;
            color: #000000;
            margin-bottom: 10px;
        }
 
        .summary-card h3 {
            font-size: 24px;
            color: #3b4a3e;
        }
 
        /* Chart Section */
        .chart-section {
            background-color: #f4f4f4;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
 
        .chart-section h5 {
            font-size: 18px;
            color: #3b4a3e;
            margin-bottom: 10px;
        }
 
        /* Top Selling Products */
        .top-selling {
            display: flex;
            flex: 2;
            /* Melebarkan top-selling agar mengisi lebih banyak ruang */
            background: linear-gradient(180deg, #D1FDE8 0%, #445D48 100%);
            /* Ubah warna latar belakang menjadi gradien */
            border-radius: 10px;
            padding: 30px 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 35%;
            /* Sesuaikan agar tabel terlihat lebih rapi */
            flex-direction: column;
            justify-content: space-between;
            /* Ratakan konten */
        }
 
        .top-selling h5 {
            font-size: 18px;
            color: #3b4a3e;
            margin-bottom: 10px;
        }
 
        .list-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
            /* Mengatur jarak antar item */
            padding: 0;
            margin: 0;
        }
 
        .list-group-item {
            display: flex;
            justify-content: space-between;
            /* Mendorong badge ke kanan */
            border-radius: 10px;
            padding: 15px;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            color: #333;
            font-size: 16px;
        }
 
        .list-group-item+.list-group-item {
            margin-top: 10px;
        }
 
        .badge {
            background-color: #FFDAB9;
            color: #3F4246;
            font-size: 14px;
            padding: 5px 10px;
            border-radius: 12px;
            /* margin-left: 10px; Tambahkan margin kiri untuk jarak dengan teks */
        }
 
        /* Latest Sections */
        .latest-section {
            display: flex;
            gap: 20px;
        }
 
        .latest-transactions,
        .latest-customers {
            flex: 1;
            background-color: #FFDAB9;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background: linear-gradient(180deg, #D1FDE8 0%, #445D48 100%);
            /* Ubah warna latar belakang menjadi gradien */
 
        }
 
        .latest-transactions h5,
        .latest-customers h5 {
            font-size: 18px;
            color: #3b4a3e;
            margin-bottom: 10px;
            /* background: linear-gradient(180deg, #D1FDE8 0%, #445D48 100%); Ubah warna latar belakang menjadi gradien */
            /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
 
        }
 
        /* Chart Styling */
        /* Chart Section Styling */
        .content-row {
            display: flex;
            justify-content: space-between;
            /* Membuat jarak di antara Overview dan Top Selling */
            gap: 20px;
            margin-top: 20px;
            /* max-width: 100%; */
        }
 
        .chart-section {
            flex: 3;
            /* Menambah ruang untuk chart agar lebih ke kiri */
            max-width: 65%;
            /* Sesuaikan lebar jika diperlukan */
            background: linear-gradient(180deg, #D1FDE8 0%, #445D48 100%);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            position: relative;
        }
 
        .chart-section h5 {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }
 
        #overviewChart {
            max-height: 350px;
        }
 
        /* Dropdown Button Styling */
        #periodSelect {
            background-color: #2d3e32;
            color: #fffffF;
            border: none;
            border-radius: 8px;
            padding: 8px 16px;
            font-size: 14px;
            margin-top: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
 
        /* Custom Tooltip Styling */
        .custom-tooltip {
            background-color: #2d3e32;
            color: #fff;
            border-radius: 5px;
            padding: 8px;
            font-size: 12px;
            text-align: center;
        }
 
 
 
        /* Media Queries untuk tampilan mobile */
        @media (max-width: 768px) {
            .search-bar {
                display: flex;
                /* Pastikan display adalah flex */
                flex-direction: row;
                /* Ubah dari column ke row */
                align-items: center;
                /* Center align items vertically */
                gap: 10px;
                /* Tambahkan jarak antar elemen */
                margin-top: 30px;
                margin-bottom: 30px;
                width: 100%;
                /* Pastikan lebar 100% */
            }
 
            .summary {
                flex-direction: column;
                gap: 20px;
                align-items: center;
            }
 
            .summary-card {
                flex: 1;
                background: linear-gradient(180deg, #D1FDE8 0%, #445D48 100%);
                /* Ubah warna latar belakang menjadi gradien */
                border-radius: 10px;
                padding: 20px;
                text-align: center;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
 
            .summary-card h5 {
                /* Warna teks untuk "Total Revenue", "Total Sales Transactions", dan "Total Customers" */
                font-size: 16px;
                color: #000000;
                margin-bottom: 10px;
            }
 
           
            .summary-card h3 {
                font-size: 24px;
                color: #3b4a3e;
            }
            .chart-section {
                 background-color: #f4f4f4;
                border-radius: 10px;
                padding: 20px;
                margin-bottom: 20px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
 
 
            .chart-section h5 {
                font-size: 18px;
                color: #3b4a3e;
                margin-bottom: 10px;
            }
           
            .top-selling {
                display: flex;
                flex: 2;
                /* Melebarkan top-selling agar mengisi lebih banyak ruang */
                background: linear-gradient(180deg, #D1FDE8 0%, #445D48 100%);
                /* Ubah warna latar belakang menjadi gradien */
                border-radius: 10px;
                padding: 30px 20px;
                margin-bottom: 20px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                text-align: center;
                max-width: 100%;
                /* Sesuaikan agar tabel terlihat lebih rapi */
                flex-direction: column;
                justify-content: space-between;
                /* Ratakan konten */
            }
 
 
            .top-selling h5 {
                font-size: 18px;
                color: #3b4a3e;
                margin-bottom: 10px;
            }
 
            .list-group {
                display: flex;
                flex-direction: column;
                gap: 10px;
                /* Mengatur jarak antar item */
                padding: 0;
                margin: 0;
            }
 
            .list-group-item {
                display: flex;
                justify-content: space-between;
                /* Mendorong badge ke kanan */
                border-radius: 10px;
                padding: 15px;
                background-color: #ffffff;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                color: #333;
                font-size: 16px;
            }
 
            .list-group-item+.list-group-item {
                margin-top: 10px;
            }
 
            .badge {
                background-color: #FFDAB9;
                color: #3F4246;
                font-size: 14px;
                padding: 5px 10px;
                border-radius: 12px;
                /* margin-left: 10px; Tambahkan margin kiri untuk jarak dengan teks */
            }
 
            /* Latest Sections */
            .latest-section {
                display: flex;
                gap: 20px;
            }
 
            .latest-transactions,
            .latest-customers {
                flex: 1;
                background-color: #FFDAB9;
                border-radius: 10px;
                padding: 20px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                background: linear-gradient(180deg, #D1FDE8 0%, #445D48 100%);
                /* Ubah warna latar belakang menjadi gradien */
 
            }
 
            .latest-transactions h5,
            .latest-customers h5 {
                font-size: 18px;
                color: #3b4a3e;
                margin-bottom: 10px;
                /* background: linear-gradient(180deg, #D1FDE8 0%, #445D48 100%); Ubah warna latar belakang menjadi gradien */
                /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
 
            }
 
 
            .latest-section {
                flex-direction: column;
                gap: 15px;
            }
 
            .latest-transactions, .latest-customers {
                width: 100%;
                padding: 15px;
                margin-bottom: 15px;
            }
 
            .list-group-item {
                font-size: 14px;
                padding: 10px;
            }
 
            .badge {
                font-size: 12px;
                padding: 4px 8px;
            }
 
            h5 {
                font-size: 16px;
            }
 
            h3 {
                font-size: 20px;
            }
        }
 
            .summary-card {
                width: 100%;
                margin-bottom: 10px;
                padding: 15px;
                text-align: center;
            }
 
            .chart-section, .top-selling {
                width: 100%;
                margin-bottom: 20px;
                padding: 15px;
            }
 
            .content-row {
                display: flex;
                justify-content: space-between;
                /* Membuat jarak di antara Overview dan Top Selling */
                gap: 20px;
                margin-top: 20px;
                /* max-width: 100%; */
            }
 
            .chart-section {
                flex: 3;
                /* Menambah ruang untuk chart agar lebih ke kiri */
                max-width: 65%;
                /* Sesuaikan lebar jika diperlukan */
                background: linear-gradient(180deg, #D1FDE8 0%, #445D48 100%);
                border-radius: 15px;
                padding: 20px;
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
                position: relative;
            }
 
            .chart-section h5 {
                font-size: 18px;
                font-weight: bold;
                color: #333;
                margin-bottom: 15px;
            }
 
            #overviewChart {
                max-height: 350px;
            }
 
            /* Dropdown Button Styling */
            #periodSelect {
                background-color: #2d3e32;
                color: #fff;
                border: none;
                border-radius: 8px;
                padding: 8px 16px;
                font-size: 14px;
                margin-top: 10px;
                margin-bottom: 20px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            }
 
            /* Custom Tooltip Styling */
            .custom-tooltip {
                background-color: #2d3e32;
                color: #fff;
                border-radius: 5px;
                padding: 8px;
                font-size: 12px;
                text-align: center;
            }
       
        .chart-section,
            .top-selling {
                margin-top: 30px;
            }
       
    </style>
</head>
 
<body>
    @include('layout.sidebar')
 
    <div class="main-content">
        <div class="header-container">
            <header>
                <h1>Bolívar Coffee is Open <span class="status-dot"></span></h1>
                <div class="notification"></div>
            </header>
 
            <div id="navbar">
                @include('layout.navbar')
            </div>
        </div>
 
        <div class="summary">
            <div class="summary-card">
                <h5>Total Revenue</h5>
                <li class="list-group-item" style="display: flex; justify-content: center; align-items: center;">
                    <h3>Rp {{ number_format($totalRevenue, 2, ',', '.') }}</h3>
                </li>
            </div>
            <div class="summary-card">
                <h5>Total Sales Transactions</h5>
                <li class="list-group-item" style="display: flex; justify-content: center; align-items: center;">
                    <h3>{{ $totalSalesTransactions }}</h3>
                </li>
            </div>
            <div class="summary-card">
                <h5>Total Expenses</h5>
                <li class="list-group-item" style="display: flex; justify-content: center; align-items: center;">
                    <h3>Rp {{ number_format($totalExpenses, 2, ',', '.') }}</h3>
                </li>
            </div>
        </div>
 
        <div class="content-row">
            <div class="chart-section">
                <h5>Overview</h5>
                <label for="periodSelect">Select Period:</label>
                <select id="periodSelect" class="form-control" onchange="updateChart();">
                    <option value="week">Week</option>
                    <option value="month">Month</option>
                    <option value="year">Year</option>
                </select>
 
                <div id="yearSelectContainer" style="display:none;">
                    <label for="yearSelect">Select Year:</label>
                    <select id="yearSelect" onchange="updateChart();">
                        @foreach (range(2020, date('Y')) as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                </div>
 
                <canvas id="overviewChart"></canvas>
            </div>
            <div class="top-selling">
                <h5>Top Selling Products</h5>
                <ul class="list-group">
                    @foreach ($topSelling as $menu)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $menu->namaMenu }}
                            <span class="badge bg-primary rounded-pill">{{ $loop->iteration }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
 
        <div class="latest-section">
            <div class="latest-transactions">
                <h5>Latest Sales Transactions</h5>
                <ul class="list-group">
                    @foreach ($latestSalesTransactions as $transaction)
                        <li class="list-group-item">
                            {{ $transaction->created_at->format('d M Y H:i') }} - Rp
                            {{ number_format($transaction->totalHarga, 2, ',', '.') }}
                        </li>
                    @endforeach
                </ul>
            </div>
 
            <div class="latest-customers">
                <h5>Latest Customers</h5>
                @foreach ($latestCustomers as $customer)
                    <li class="list-group-item">
                        {{ $customer->name }} - Joined {{ $customer->created_at->format('d M Y') }}
                    </li>
                @endforeach
            </div>
        </div>
 
        <script>
            let overviewChart;
 
            function formatCurrency(value) {
                return `Rp ${value.toLocaleString('id-ID')}`;
            }
 
            function createChart(labels, data) {
                const ctx = document.getElementById('overviewChart').getContext('2d');
 
                if (overviewChart) {
                    overviewChart.destroy();
                }
 
                overviewChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Total Sales',
                            data: data,
                            backgroundColor: '#f7d1ba',
                            borderRadius: 10,
                            barPercentage: 0.5,
                            categoryPercentage: 0.6,
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                backgroundColor: '#2d3e32',
                                titleColor: '#ffffff',
                                bodyColor: '#ffffff',
                                callbacks: {
                                    label: function(context) {
                                        return formatCurrency(context.raw);
                                    }
                                }
                            }
                        },
                        scales: {
                            x: {
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    color: '#333',
                                    font: {
                                        size: 12
                                    }
                                }
                            },
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    color: '#333',
                                    font: {
                                        size: 12
                                    },
                                    callback: function(value) {
                                        return formatCurrency(value);
                                    }
                                }
                            }
                        }
                    }
                });
            }
 
            function updateChart() {
                const period = document.getElementById('periodSelect').value;
                let fetchUrl = `/dashboard-data?period=${period}`;
 
                if (period === 'year') {
                    const selectedYear = document.getElementById('yearSelect').value;
                    fetchUrl += `&year=${selectedYear}`;
                }
 
                fetch(fetchUrl)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log('Received data:', data);
                        createChart(data.labels, data.sales);
                    })
                    .catch(error => console.error('Error fetching chart data:', error));
            }
 
            function populateLabels(period) {
                const yearSelectContainer = document.getElementById('yearSelectContainer');
                yearSelectContainer.style.display = period === 'year' ? 'block' : 'none';
            }
 
            document.getElementById('periodSelect').addEventListener('change', function() {
                const period = this.value;
                populateLabels(period);
                updateChart();
            });
 
            document.addEventListener('DOMContentLoaded', () => {
                const periodSelect = document.getElementById('periodSelect');
                populateLabels(periodSelect.value);
                updateChart();
            });
        </script>
    </div>
</body>
 
</html>
