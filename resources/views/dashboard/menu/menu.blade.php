<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee Dashboard - Menu</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @include('layout.sidebar')

    <div class="main-content">
        <header>
            <h1>Bolívar Coffee - Menu List <span class="status-dot"></span></h1>
            {{-- <button class="payment-btn">Create menu</button> --}}
            <div class="notification"></div>
        </header>

        <div class="menu-view">
            <div class="search-bar">
                <span class="material-symbols-outlined search-icon">Search</span>
                <input type="text" placeholder="Search Menu..." class="search-input">
                <button class="create-btn">
                    <span class="create-text">Create Menu</span>
                    <span class="material-symbols-outlined">Add</span>
            </div>

            <div class="menu-cards">
                <!-- Loop through each menu item -->
                @foreach ($menu as $Menu)
                    <div class="menu-card">
                        <div class="menu-id">#{{$Menu->id}}</div>
                        <div class="menu-awal">
                            <img src="{{ asset('img/menu/' . $Menu->fotoMenu) }}" alt="Menu Image" class="menu-image">
                        </div>
                        <div class="menu-info">
                            <h2>{{ $Menu->namaMenu }}</h2>
                            <p>Rp {{ $Menu->hargaMenu }}</p>
                        </div>
                        <div class="menu-buttons">
                            <button class="menuedit-btn"><span class="material-symbols-outlined">edit</span></button>
                            <button class="menudelete-btn"><span
                                    class="material-symbols-outlined">delete</span></button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>

</html>
