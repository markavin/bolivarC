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
            <h1>Bolívar Coffee - Point List <span class="status-dot"></span></h1>
            <button class="payment-btn">Create Points Exchange</button>
            <div class="notification"></div>
        </header>
        <div class="point-view">
            <div class="search-bar">
                <input type="text" placeholder="Search point..." class="search-input">
                <button class="create-btn">Create Points Exchange</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID Poin</th>
                        <th>Nama Pelanggan</th>
                        <th>Nama Menu</th> <!-- Menggabungkan kolom menu -->
                        <th>Status</th>
                        <th>Total Poin</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($poin as $item)
                    <tr>
                        <td>{{ $item->id_poin }}</td>
                        <td>{{ $item->NamaPelanggan }}</td>
                        <td>{{ $item->nama_menu }}</td> <!-- Menggunakan kolom gabungan -->
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->TotalPoin }}</td>
                        <td>{{ $item->Tanggal }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>

</html>
