<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee Dashboard - Employees</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <div class="container">
        <h2>Tambah Pegawai Baru</h2>
        <form action="{{ route('pegawai.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="namaPengguna" class="form-label">Nama Pegawai</label>
                <input type="text" class="form-control" id="namaPengguna" name="namaPengguna" required>
            </div>

            <div class="mb-3">
                <label for="noHP" class="form-label">Nomor HP</label>
                <input type="text" class="form-control" id="noHP" name="noHP" required>
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
