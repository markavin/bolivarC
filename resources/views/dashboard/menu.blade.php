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
    <!-- Include Sidebar -->
    @include('layout.sidebar')

    <div class="main-content">
        <header>
            <h1>Menu <span class="status-dot"></span></h1>
            <button class="payment-btn">Payment</button>
            <div class="notification"></div>
        </header>
        <div class="summary">
            {{-- Content related to summary goes here --}}
        </div>
        <div class="chart-section">
            {{-- Content related to chart section goes here --}}
        </div>
        <div class="top-selling">
            {{-- Content related to top selling goes here --}}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- <script>
        // JavaScript code for chart
    </script> --}}
</body>
</html>

