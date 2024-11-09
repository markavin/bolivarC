<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee Dashboard - Menu</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        /* CSS untuk Responsif */

        .menu-view {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .search-bar {
            position: relative;
            display: flex;
            align-items: center;
            gap: 10px;
            /* margin-top: 30px; */
            margin-bottom: 20px;
            width: 100%;

        }

        .search-bar .search-icon {
            position: absolute;
            left: 15px;
            font-size: 20px;
            color: #445D48;
            pointer-events: none;
            top: 50%;
            transform: translateY(-50%);
        }

        .search-bar input[type="text"] {
            flex: 1;
            /* Fill the remaining space */
            padding: 10px 12px;
            /* Adjust padding for better spacing */
            padding-left: 40px;
            /* Add padding to the left to accommodate the icon */
            border: 1px solid #ccc;
            border-radius: 8px;
            height: 40px;
            /* Ensure consistent height */
            font-size: 16px;
            /* Set font size */
        }

        .create-btn {
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #B0EACD 0%, #445D48 100%);
            color: #000000;
            gap: 10px;
            border: none;
            padding: 10px 12px;
            border-radius: 8px;
            cursor: pointer;
            height: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: auto;
            text-align: center;

        }


        .create-text {
            font-size: 15px;
            margin-left: 0px;
        }

        .create-btn .material-symbols-outlined {
            font-size: 20px;
            color: #000000;
        }


        /* Styling kartu menu */
        .menu-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); 
            gap: 20px;
            margin-top: 10px;
            padding: 0 40px;
        }

        .menu-card {
            background: linear-gradient(to bottom, #FFD9B4 0%, #445D48 50%, #445D48 100%);
            border-radius: 8px;
            padding: 70px;
            width: 250px;
            height: 250px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 30px;
            position: relative;
        }

        .menu-id {
            position: absolute;
            top: 10px;
            left: 5px;
            font-size: 16px;
            font-weight: bold;
            color: #ffffff;
            padding: 5px 8px;
            border-radius: 4px;
        }

        .menu-image {
            width: 150px;
            height: 130px;
            border-radius: 50%;
            overflow: hidden;
            position: absolute;
            top: -40px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1;
            background-color: white;
        }

        .menu-info {
            margin-top: 50px;
            color: #ffffff;
            text-align: center;
        }

        .menu-info h2 {
            font-size: 18px;
            color: #ffffff;
            font-family: 'Coustard', serif;
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .menu-info p {
            font-size: 14px;
            color: #ffffff;
            margin-top: 10px;
            margin-bottom: 0px;
            font-family: 'Roboto', sans-serif;
        }

        .menu-buttons {
            position: absolute;
            bottom: 5px;
            width: 100%;
            padding: 0 10px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .menuedit-btn,
        .menudelete-btn {
            padding: 0;
            border: none;
            background: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .menuedit-btn .material-symbols-outlined,
        .menudelete-btn .material-symbols-outlined {
            font-size: 24px;
            color: #ffffff;
        }

        .menuedit-btn:hover .material-symbols-outlined,
        .menudelete-btn:hover .material-symbols-outlined {
            color: #FFD9B4;
        }
        .customers-view {
            margin-top: 20px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(5px);
            background-color: rgba(0, 0, 0, 0.4);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 90%;
            max-width: 400px;
        }

        .modal-header {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #c90000
        }

        .modal-buttons {
            margin-top: 20px;
            display: flex;
            justify-content: space-around;
            color: #445D48
        }

        .modal-button {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        .confirm-button {
            background-color: #445D48;
            color: rgb(240, 240, 240);
        }

        .cancel-button {
            background-color: #c7c7c7;
            color: rgb(255, 255, 255);
        }

        .modal-button:hover {
            opacity: 0.9;
        }

        .success-modal {
            display: none;
            position: fixed;
            z-index: 1100;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(5px);
            background-color: rgba(0, 0, 0, 0.4);
            justify-content: center;
            align-items: center;
        }

        .success-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 90%;
            max-width: 400px;
        }

        /* Media Queries untuk tampilan mobile */
        @media (max-width: 768px) {
            .menu-cards {
                grid-template-columns: repeat(1, 1fr);
                /* Mengubah kolom menjadi 1 pada tampilan mobile */
            }

            .menu-card {
                width: 100%;
                /* Memastikan kartu mengisi lebar penuh pada mobile */
                height: auto;
                /* Biarkan tinggi menyesuaikan konten */
                padding: 20px;
                /* Mengurangi padding untuk tampilan mobile */
                margin-top: 20px;
                /* Mengurangi margin */
            }

            .menu-image {
                width: 100px;
                /* Mengurangi ukuran gambar pada tampilan mobile */
                height: 100px;
                top: -30px;
                /* Menurunkan posisi gambar agar pas pada tampilan mobile */
            }

            .menu-info {
                margin-top: 40px;
                /* Menurunkan informasi menu */
            }

            .menu-info h2 {
                font-size: 16px;
                /* Mengurangi ukuran teks judul pada tampilan mobile */
            }

            .menu-info p {
                font-size: 14px;
                /* Ukuran teks harga tetap */
            }

            .menu-buttons {
                position: relative;
                bottom: 0;
                padding: 0;
                margin-top: 10px;
            }

        }
    </style>
</head>

<body>
    @include('layout.sidebar')

    <div class="main-content">
        <header>
            <h1>Bolívar Coffee - Menu List <span class="status-dot"></span></h1>
            <div class="notification"></div>
        </header>

        <div class="menu-view">
            <div class="search-bar">
                <form action="{{ route('menu.search') }}" method="GET" style="display: flex; width: 82%">
                    <span class="material-symbols-outlined search-icon">search</span>
                    <input type="text" placeholder="Search menu..." class="search-input" name="search"
                        value="{{ request('search') }}">
                </form>
                <button class="create-btn" onclick="window.location.href='{{ route('menu.create') }}'">
                    <span class="create-text">Create Menu</span>
                    <span class="material-symbols-outlined">add</span>
                </button>
            </div>

            <div class="menu-cards">
                <!-- Loop through each menu item -->
                @foreach ($menu as $Menu)
                    <div class="menu-card">
                        <div class="menu-id">#{{ $Menu->id }}</div>
                        <div class="menu-awal">
                           <img src="{{ asset($Menu->fotoMenu) }}" alt="Menu Image" class="menu-image">
                        </div>
                        <div class="menu-info">
                            <h2>{{ $Menu->namaMenu }}</h2>
                            <p>Rp {{ number_format($Menu->hargaMenu, 0, ',', '.') }}</p>
                        </div>
                        <div class="menu-buttons">
                            <button class="menuedit-btn" 
                            onclick="window.location.href='{{ route('menu.edit', ['id' => $Menu->id]) }}'">
                                <span class="material-symbols-outlined">edit</span>
                            <button class="menudelete-btn"onclick="openDeleteModal('{{ $Menu->id }}', '{{ $Menu->namaMenu }}')">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                            <form id="delete-form-{{ $Menu->id }}"
                                action="{{ route('menu.delete', ['id' => $Menu->id]) }}"
                                method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div id="deleteModal" class="modal">
        <div class="modal-content">
            < <div class="modal-header">WARNING!!!
        </div>
        <p id="deleteMessage"></p>
        <div class="modal-buttons">
            <button type="button" class="modal-button cancel-button" onclick="closeModal()">Cancel</button>
            <button id="confirmDeleteButton" class="modal-button confirm-button">Delete</button>
        </div>
    </div>
    </div>
    <div id="successModal" class="success-modal">
        <div class="success-content">
            <p>Delete successful!</p>
            <button type="button" class="modal-button confirm-button" onclick="closeSuccessModal()">OK</button>
        </div>
    </div>

    <script>
        let currentDeleteId = null;

        function openDeleteModal(id, name) {
            currentDeleteId = id;
            document.getElementById('deleteMessage').innerText =
                `Are you sure you want to delete the customers with the name ${name}?`;
            document.getElementById('deleteModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('deleteModal').style.display = 'none';
            currentDeleteId = null;
        }

        function openSuccessModal() {
            document.getElementById('successModal').style.display = 'flex';
        }

        function closeSuccessModal() {
            document.getElementById('successModal').style.display = 'none';
        }

        document.getElementById('confirmDeleteButton').addEventListener('click', function() {
            if (currentDeleteId) {
                document.getElementById(`delete-form-${currentDeleteId}`).submit();
                closeModal();
                openSuccessModal(); // Open success modal after deletion confirmation
            }
        });
    </script>

</body>

</html>
