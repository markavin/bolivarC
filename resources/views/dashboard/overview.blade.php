<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    @include('layout.sidebar')

    <div class="main-content">
        <header>
            <h1>Bolívar Coffee is Open <span class="status-dot"></span></h1>
            <button class="payment-btn">Payment</button>
            <div class="notification"></div>
        </header>

        <div class="summary">
            <div class="summary-card">
                <h5>Total Revenue</h5>
                <h3>Rp {{ number_format($totalRevenue, 2, ',', '.') }}</h3>
            </div>
            <div class="summary-card">
                <h5>Total Sales Transactions</h5>
                <h3>{{ $totalSalesTransactions }}</h3>
            </div>
            <div class="summary-card">
                <h5>Total Customers</h5>
                <h3>{{ $totalCustomers }}</h3>
            </div>
        </div>

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
                        <span class="badge bg-primary rounded-pill">{{ $menu->total_quantity }}</span>
                    </li>
                @endforeach
            </ul>
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
                <ul class="list-group">
                    @foreach ($latestCustomers as $customer)
                        <li class="list-group-item">
                            {{ $customer->name }} - Joined {{ $customer->created_at->format('d M Y') }}
                        </li>
                    @endforeach
                </ul>
            </div>
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
                        legend: { display: false },
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
                            grid: { display: false },
                            ticks: { color: '#333', font: { size: 12 } }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: '#333',
                                font: { size: 12 },
                                callback: function(value) { return formatCurrency(value); }
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
                .then(response => response.json())
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
</body>

</html>
