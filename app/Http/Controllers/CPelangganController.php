<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class CPelangganController extends Controller
{
    public function show()
    {
        $pelanggan = Pelanggan::withCount('penjualan')->orderBy('id', 'desc')->get();

        return view("dashboard/pelanggan/pelanggan", compact('pelanggan'));
    }
    public function create()
    {
        // $role = Role::all(); // 
        return view('dashboard.pelanggan.createPelanggan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NamaPelanggan' => 'required|string|max:50',
            'NoHP' => 'required|numeric|digits_between:10,15',
            // 'namaRole' => 'required|string|exists:role,namaRole'
        ]);


        $NamaPelanggan = $request->input('NamaPelanggan');
        $NoHP = $request->input('NoHP');



        $pelanggan = Pelanggan::create([
            'NamaPelanggan' => $NamaPelanggan,
            'NoHP' => $NoHP,
            'totalPoin' => 5,
        ]);

        return redirect()->route('pelanggan.show')->with('success', 'pelanggan berhasil ditambahkan');
    }

    public function edit(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);


        if ($request->isMethod('get')) {
            return view('dashboard.pelanggan.editPelanggan', compact('pelanggan'));
        }


        $request->validate([
            'NamaPelanggan' => 'required|string|max:50',
            'NoHP' => 'required|numeric|digits_between:10,15',
        ]);

        $NamaPelanggan = $request->input('NamaPelanggan');
        $NoHP = $request->input('NoHP');


        $pelanggan->update([
            'NamaPelanggan' => $NamaPelanggan,
            'NoHP' => $NoHP,
        ]);

        return redirect()->route('pelanggan.show')->with('success', 'pelanggan berhasil diperbarui');
    }


    public function delete($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.show')->with('success', 'pelanggan berhasil dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $pelanggan = Pelanggan::where('NamaPelanggan', 'LIKE', "%$keyword%")
            ->orWhere('NoHP', 'LIKE', "%$keyword%")
            ->orderBy('id', 'desc')
            ->get();

        return view("dashboard/pelanggan/pelanggan", compact('pelanggan'));
    }
}
