<!-- resources/views/laporan/index.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee - Reports</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
    @include('layout.sidebar')

    <div class="main-content">
        <header>
            <h1>Bolívar Coffee - Reports <span class="status-dot"></span></h1>
        </header>

        <div class="report-view">
            @if ($tanggalAwal && $tanggalAkhir)
                <div class="container">
                    <div class="alert-awal">
                        @if ($tipeLaporan == 'penjualan')
                            Sales Reports from {{ $tanggalAwal }} - {{ $tanggalAkhir }}
                        @else
                            Purchase Reports from {{ $tanggalAwal }} - {{ $tanggalAkhir }}
                        @endif
                    </div>
                </div>
            @endif
            <div class="alert-container">
                <div class="alert">
                    @if ($tipeLaporan == 'penjualan')
                        <strong>Total Income : </strong> Rp {{ number_format($totalTransaksi, 0, ',', '.') }}
                    @else
                        <strong>Total Expenses : </strong> Rp {{ number_format($totalTransaksi, 0, ',', '.') }}
                    @endif
                </div>
                <button class="toggle-filter-btn" onclick="toggleFilterPanel()">
                    <span class="material-symbols-outlined">filter_alt</span> Filter
                </button>
            </div>

            <!-- Report Table -->
            <table>
                <thead>
                    <tr>
                        @if ($tipeLaporan == 'penjualan')
                            <th>Sales ID</th>
                            <th>Sales Date</th>
                            <th>Customer Name</th>
                            <th>Menu</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        @else
                            <th>Purchase ID</th>
                            <th>Purchase Date</th>
                            <th>Stock Name</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporan as $data)
                        <tr>
                            @if ($tipeLaporan == 'penjualan')
                                <td>{{ $data->id_penjualan }}</td>
                                <td>{{ $data->tanggalPenjualan }}</td>
                                <td>{{ $data->NamaPelanggan }}</td>
                                <td>{{ $data->namaMenu }}</td>
                                <td>{{ $data->totalQuantity }}</td>
                                <td>Rp{{ number_format($data->totalHarga, 0, ',', '.') }}</td>
                            @else
                                <td>{{ $data->id_pembelian }}</td>
                                <td>{{ $data->purchase_date }}</td>
                                <td>{{ $data->namaBahanBaku }}</td>
                                <td>{{ $data->toquantity }}</td>
                                <td>Rp{{ number_format($data->total_price, 0, ',', '.') }}</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="export-container">
        <div class="export-buttons">
            <form action="{{ route('laporan.exportExcel') }}" method="GET">
                <input type="hidden" name="tipe" value="{{ $tipeLaporan }}">
                <input type="hidden" name="tanggal_awal" value="{{ $tanggalAwal }}">
                <input type="hidden" name="tanggal_akhir" value="{{ $tanggalAkhir }}">
                <button type="submit" class="export-btn">Export to Excel</button>
            </form>
        </div>
    </div>
    </div>

    <!-- Filter Panel -->
    <div class="filter-panel" id="filterPanel">
        <h2>Opsi Filter</h2>
        <form method="GET" action="{{ route('laporan.index') }}">
            <div>
                <label for="tipe" class="visually-hidden">Choose Transactions</label>
                <select name="tipe" id="tipe">
                    <option value="penjualan" {{ request('tipe') == 'penjualan' ? 'selected' : '' }}>Sales</option>
                    <option value="pembelian" {{ request('tipe') == 'pembelian' ? 'selected' : '' }}>Purchase</option>
                </select>
            </div>
            <div>
                <label for="tanggal_awal" class="visually-tanggal">Choose Date</label>
                <div style="display: flex; align-items: center;">
                    <div style="text-align: center; margin-right: 10px;">
                        <label for="tanggal_awal" </label><br>
                            <input type="date" name="tanggal_awal" id="tanggal_awal"
                                value="{{ request('tanggal_awal') }}">
                    </div>
                    <div style="text-align: center; margin-left: 10px;">
                        <label for="tanggal_akhir" </label><br>
                            <input type="date" name="tanggal_akhir" id="tanggal_akhir"
                                value="{{ request('tanggal_akhir') }}">
                    </div>
                </div>
            </div>

            <div class="filter-buttons">
                <button type="button" class="cancel-btn" onclick="toggleFilterPanel()">Cancel</button>
                <button type="submit" class="done-btn">Done</button>
            </div>
        </form>
    </div>


    <script>
        function toggleFilterPanel() {
            const filterPanel = document.getElementById('filterPanel');
            const mainContent = document.querySelector('.main-content');
            filterPanel.classList.toggle('active');
            mainContent.classList.toggle('blurred');
        }
    </script>
</body>

</html>
