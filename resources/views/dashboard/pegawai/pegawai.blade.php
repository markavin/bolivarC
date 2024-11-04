<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee Dashboard - Employees</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @include('layout.sidebar')

    <div class="main-content">
        <header>
            <h1>Bolívar Coffee - Employee List <span class="status-dot"></span></h1>
            <div class="notification"></div>
        </header>

        <div class="Employee-view">
            <div class="search-bar">
                <span class="material-symbols-outlined search-icon">Search</span>
                <input type="text" placeholder="Search Employee..." class="search-input">
                <button class="create-btn">
                    <span class="create-text">Create Employee</span>
                    <span class="material-symbols-outlined">Add</span> 
                </button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th style>Employee ID</th>
                        <th style>Employee Name</th>
                        <th>Phone Number</th>
                        {{-- <th>Password</th> --}}
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengguna as $pegawai)
                        <tr>
                            <td>{{ $pegawai->id }}</td>
                            <td>{{ $pegawai->namaPengguna }}</td>
                            <td>{{ $pegawai->noHP }}</td>
                            {{-- <td>{{ $pegawai->KataSandi }}</td> --}}
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
