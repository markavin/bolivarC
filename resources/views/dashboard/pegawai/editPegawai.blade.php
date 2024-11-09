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
        <h2>Edit Pegawai</h2>
        <<form action="{{ route('pegawai.edit', $pengguna->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Menentukan metode PUT untuk update -->
            <div class="mb-3">
                <label for="namaPengguna" class="form-label">Nama Pegawai</label>
                <input type="text" class="form-control" id="namaPengguna" name="namaPengguna" value="{{ $pengguna->namaPengguna }}" required>
            </div>
            <div class="mb-3">
                <label for="noHP" class="form-label">Nomor HP</label>
                <input type="text" class="form-control" id="noHP" name="noHP" value="{{ $pengguna->noHP }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>        
    </div>
</body>

</html>
