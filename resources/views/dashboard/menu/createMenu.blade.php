<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee Dashboard - Menu</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container">
        <h2>Tambah Menu Baru</h2>
        <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="namaMenu" class="form-label">Nama Menu</label>
                <input type="text" class="form-control" id="namaMenu" name="namaMenu" required>
            </div>

            <div class="mb-3">
                <label for="fotoMenu" class="form-label">Foto Menu</label>
                <input type="file" class="form-control" id="fotoMenu" name="fotoMenu" accept="image/*" required>
            </div>

            <div class="mb-3">
                <label for="hargaMenu" class="form-label">Harga Menu</label>
                <input type="number" step="0.01" class="form-control" id="hargaMenu" name="hargaMenu" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>

</html>
