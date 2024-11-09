<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee Dashboard - Edit Pegawai</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container">
        <h2>Edit Pelanggan</h2>
        <<form action="{{ route('pelanggan.edit', $pelanggan->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Menentukan metode PUT untuk update -->
            <div class="mb-3">
                <label for="NamaPelanggan" class="form-label">Nama Pelanggan</label>
                <input type="text" class="form-control" id="NamaPelanggan" name="NamaPelanggan" value="{{ $pelanggan->NamaPelanggan }}" required>
            </div>
            <div class="mb-3">
                <label for="NoHP" class="form-label">Nomor HP</label>
                <input type="text" class="form-control" id="NoHP" name="NoHP" value="{{ $pelanggan->NoHP }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>        
    </div>
</body>

</html>
