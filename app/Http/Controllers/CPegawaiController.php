<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CPegawaiController extends Controller
{
    public function show()
    {
        $pengguna = Pengguna::where('id_role', 2)->orderBy('id', 'desc')->paginate(5);
        return view("dashboard/pegawai/pegawai", compact('pengguna'));
    }

    public function create()
    {
        // $role = Role::all(); // 
        return view('dashboard.pegawai.createPegawai');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaPengguna' => 'required|string|max:50',
            'noHP' => 'required|numeric|digits_between:10,15',
            // 'namaRole' => 'required|string|exists:role,namaRole'
        ]);


        $namaPengguna = $request->input('namaPengguna');
        $noHP = $request->input('noHP');
        // $namaRole = $request->input('namaRole');

        // $role = Role::where('namaRole', $namaRole)->first();
        // if (!$role) {
        //     return response()->json(['error' => 'Role tidak ditemukan'], 400);
        // }



        $idRole = 2;

        $username = Str::lower(explode(' ', trim($namaPengguna))[0]) . substr($noHP, 0, 3);
        $password = Str::lower(explode(' ', trim($namaPengguna))[0]) . substr($noHP, -4);


        $pengguna = Pengguna::create([
            'namaPengguna' => $namaPengguna,
            'noHP' => $noHP,
            'username' => $username,
            'password' => Hash::make($password),
            'id_role' => $idRole,
        ]);

        return redirect()->route('pegawai.show')->with('success', 'Pengguna berhasil ditambahkan');
    }

    public function edit(Request $request, $id)
    {
        $pengguna = Pengguna::findOrFail($id);


        if ($request->isMethod('get')) {
            return view('dashboard.pegawai.editPegawai', compact('pengguna'));
        }


        $request->validate([
            'namaPengguna' => 'required|string|max:50',
            'noHP' => 'required|numeric|digits_between:10,15',
        ]);

        $namaPengguna = $request->input('namaPengguna');
        $noHP = $request->input('noHP');
        $username = Str::lower(explode(' ', trim($namaPengguna))[0]) . substr($noHP, 0, 3);
        $password = Str::lower(explode(' ', trim($namaPengguna))[0]) . substr($noHP, -4);

        $pengguna->update([
            'namaPengguna' => $namaPengguna,
            'noHP' => $noHP,
            'username' => $username,
            'password' => Hash::make($password),
        ]);

        return redirect()->route('pegawai.show')->with('success', 'Pengguna berhasil diperbarui');
    }


    public function delete($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->delete();

        return redirect()->route('pegawai.show')->with('success', 'Pengguna berhasil dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $pengguna = Pengguna::where('namaPengguna', 'LIKE', "%$keyword%")
            ->orWhere('noHP', 'LIKE', "%$keyword%")
            ->where('id_role', 2)
            ->orderBy('id', 'desc')
            ->paginate(5); // Menggunakan paginate() untuk pagination

        return view("dashboard/pegawai/pegawai", compact('pengguna'));
    }


    public function profile()
    {
        // Assuming the session has user data already stored.
        $user = session('user');

        // If you need to retrieve role data separately:
        $role = $user->role ?? null; // Assuming a relationship if needed

        return view('dashboard.profile.show', compact('user', 'role'));
    }

    public function ChecknoHP(Request $request)
    {
        $noHP = $request->input('noHP');
        $exists = Pengguna::where('noHP', $noHP)->exists();
        return response()->json(['exists' => $exists]);
    }
}
