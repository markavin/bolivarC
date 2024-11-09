<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee Dashboard - Edit Menu</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container">
        <h2>Edit Menu</h2>
        <form action="{{ route('menu.edit', ['id' => $menu->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="namaMenu" class="form-label">Nama Menu</label>
                <input type="text" class="form-control" id="namaMenu" name="namaMenu" value="{{ $menu->namaMenu }}" required>
            </div>

            <div class="mb-3">
                <label for="fotoMenu" class="form-label">Foto Menu</label>
                <input type="file" class="form-control" id="fotoMenu" name="fotoMenu" accept="image/*">
                <!-- Display existing image if available -->
                @if($menu->fotoMenu)
                    <div class="mt-2">
                        <p>Foto Saat Ini:</p>
                        <img src="{{ asset('storage/' . $menu->fotoMenu) }}" alt="Foto Menu" style="width: 150px; height: auto;">
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="hargaMenu" class="form-label">Harga Menu</label>
                <input type="number" step="0.01" class="form-control" id="hargaMenu" name="hargaMenu" value="{{ $menu->hargaMenu }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Perbarui</button>
        </form>
    </div>
</body>

</html>
