<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use Illuminate\Http\Request;

class CBahanbakuController extends Controller
{
    public function show()
    {
        $bahanBaku = BahanBaku::orderBy('id', 'desc')->paginate(5); 
        return view("dashboard/bahanBaku/bahanbaku", compact('bahanBaku'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaBahanBaku' => 'required|string|max:255',
            'jumlahBahanBaku' => 'required|integer|min:1',
        ]);



        $namaBahanBaku = $request->input('namaBahanBaku');
        $jumlahBahanBaku = $request->input('jumlahBahanBaku');


        $bahanBaku = BahanBaku::create([
            'namaBahanBaku' => $namaBahanBaku,
            'jumlahBahanBaku' => $jumlahBahanBaku,
        ]);

        return redirect()->route('bahanBaku.show')->with('success', 'Bahan Baku berhasil ditambahkan');
    }

    public function create()
    {
        return view("dashboard/bahanBaku.createbahanBaku");
    }

    
    public function delete($id)
    {
        $bahanBaku = BahanBaku::findOrFail($id);
        $bahanBaku->delete();

        return redirect()->route('bahanBaku.show')->with('success', 'bahan Baku berhasil dihapus');
    }
    
    public function edit(Request $request, $id)
    {
        $bahanBaku = BahanBaku::findOrFail($id);


        if ($request->isMethod('get')) {
            return view('dashboard.bahanBaku.editbahanBaku', compact('bahanBaku'));
        }


        $request->validate([
            'namaBahanBaku' => 'required|string|max:255',
            'jumlahBahanBaku' => 'required|integer|min:1',
        ]);


        $namaBahanBaku = $request->input('namaBahanBaku');
        $jumlahBahanBaku = $request->input('jumlahBahanBaku');


        $bahanBaku->update([
            'namaBahanBaku' => $namaBahanBaku,
            'jumlahBahanBaku' => $jumlahBahanBaku,
        ]);

        return redirect()->route('bahanBaku.show')->with('success', 'bahanBaku berhasil diperbarui');
    }

   
    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $bahanBaku = BahanBaku::where('namaBahanBaku', 'LIKE', "%$keyword%")
            ->orderBy('id', 'desc')
            ->paginate(5);
        return view("dashboard/bahanBaku/bahanbaku", compact('bahanBaku'));
    }
   

    public function ChecknamaStock(Request $request)
    {
        $namaBahanBaku = $request->input('namaBahanBaku');
        $exists = BahanBaku::where('namaBahanBaku', $namaBahanBaku)->exists();
        return response()->json(['exists' => $exists]);
    }
}