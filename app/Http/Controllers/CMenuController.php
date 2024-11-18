<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\menu;

class CMenuController extends Controller
{
    public function show()
    {
        $menu = Menu::orderBy('id', 'desc')->get();
        return view("dashboard/menu/menu", compact('menu'));
    }
    public function create()
    {
        // $role = Role::all(); // 
        return view('dashboard.menu.createMenu');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaMenu' => 'required|string|max:25',
            'fotoMenu' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hargaMenu' => 'required|numeric',
            // 'namaRole' => 'required|string|exists:role,namaRole'
        ]);


        $namaMenu = $request->input('namaMenu');
        // $fotoMenu = $request->input('fotoMenu');
        $hargaMenu = $request->input('hargaMenu');

        if ($request->hasFile('fotoMenu')) {
            $fotoMenu = $request->file('fotoMenu');
            $fotoPath = 'img/menu/' . $fotoMenu->getClientOriginalName();
            $fotoMenu->move(public_path('img/menu'), $fotoMenu->getClientOriginalName());
        } else {
            $fotoPath = null;
        }

        $menu = menu::create([
            'namaMenu' => $namaMenu,
            'fotoMenu' => $fotoPath,
            'hargaMenu' => $hargaMenu,
        ]);

        return redirect()->route('menu.show')->with('success', 'menu berhasil ditambahkan');
    }

    public function edit(Request $request, $id)
    {
        $menu = menu::findOrFail($id);


        if ($request->isMethod('get')) {
            return view('dashboard.menu.editMenu', compact('menu'));
        }


        $request->validate([
            'namaMenu' => 'required|string|max:25',
            'fotoMenu' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hargaMenu' => 'required|numeric',
        ]);


        $namaMenu = $request->input('namaMenu');
        // $fotoMenu = $request->input('fotoMenu');
        $hargaMenu = $request->input('hargaMenu');

        if ($request->hasFile('fotoMenu')) {
            $fotoMenu = $request->file('fotoMenu');
            $fotoPath = 'img/menu/' . $fotoMenu->getClientOriginalName(); // Tentukan path relatif
            $fotoMenu->move(public_path('img/menu'), $fotoMenu->getClientOriginalName()); // Simpan file di public/img/menu
        } else {
            $fotoPath = $menu->fotoMenu; // Tetap menggunakan path lama jika tidak diunggah
        }

        $menu->update([
            'namaMenu' => $namaMenu,
            'fotoMenu' => $fotoPath,
            'hargaMenu' => $hargaMenu,
        ]);

        return redirect()->route('menu.show')->with('success', 'menu berhasil diperbarui');
    }


    public function delete($id)
    {
        $menu = menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menu.show')->with('success', 'menu berhasil dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $menu = menu::where('namaMenu', 'LIKE', "%$keyword%")
            ->orWhere('hargaMenu', 'LIKE', "%$keyword%")
            ->orderBy('id', 'desc')
            ->get();

        return view("dashboard/menu/menu", compact('menu'));
    }

    public function index()
    {
        $menu = Menu::paginate(10); // Adjust the number as needed
        return view('dashboard.menu.index', compact('menu'));
    }

    public function Checknamamenu(Request $request)
    {
        $namaMenu = $request->input('namaMenu');
        // Checking if the menu name exists in the database
        $exists = Menu::where('namaMenu', $namaMenu)->exists();
        return response()->json(['exists' => $exists]);  // Return true or false
    }
}
