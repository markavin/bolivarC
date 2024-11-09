<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee Dashboard - Customers</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <div class="container">
        <h2>Tambah Pelanggan Baru</h2>
        <form action="{{ route('pelanggan.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="NamaPelanggan" class="form-label">Nama Pelanggan</label>
                <input type="text" class="form-control" id="NamaPelanggan" name="NamaPelanggan" required>
            </div>

            <div class="mb-3">
                <label for="NoHP" class="form-label">Nomor HP</label>
                <input type="text" class="form-control" id="NoHP" name="NoHP" required>
            </div>

            {{-- <div class="mb-3">
                <label for="namaRole" class="form-label">Role</label>
                <select class="form-control" id="namaRole" name="namaRole" required>
                    <option value="">Pilih Role</option>
                    @foreach ($role as $role)
                        <option value="{{ $role->namaRole }}">{{ $role->namaRole }}</option>
                    @endforeach
                </select>
            </div> --}}
</head>

<button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>


</html>
