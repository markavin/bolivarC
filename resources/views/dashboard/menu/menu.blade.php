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
            <h1>Bolívar Coffee - Menu List <span class="status-dot"></span></h1>
            <button class="payment-btn">Create menu</button>
            <div class="notification"></div>
        </header>

        <div class="menu-view">
            <div class="search-bar">
                <input type="text" placeholder="Search Customers..." class="search-input">
                <button class="create-btn">Create menu</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Menu ID</th>
                        <th>foto menu</th>
                        <th>Menu Name</th>
                        <th>Price Menu</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($menu as $Menu)
                        <tr>
                            <td>{{ $Menu->id }}</td>
                            <td>{{ $Menu->fotoMenu }}</td>
                            <td>{{ $Menu->namaMenu }}</td>
                            <td>{{ $Menu->hargaMenu }}</td>
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
