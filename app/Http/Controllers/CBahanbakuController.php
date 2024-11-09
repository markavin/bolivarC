<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use Illuminate\Http\Request;

class CBahanbakuController extends Controller
{
    public function show()
    {
        $bahanBaku = BahanBaku::orderBy('id', 'desc')->get();
        return view("dashboard/bahanBaku/bahanbaku", compact('bahanBaku'));
    }

    public function create()
    {
        return view("dashboard/bahanBaku.createbahanBaku");
    }

    public function edit($id)
    {
        $stock = BahanBaku::findOrFail($id);
        return view('dashboard.bahanBaku.editbahanBaku', compact('stock'));
    }
    
    // public function delete($id)
    // {
    //     $stock = BahanBaku::findOrFail($id);
    //     return view('dashboard.bahanBaku.deletebahanBaku', compact('stock'));
    // }
    
    public function store(Request $request)
    {
        $request->validate([
            'namaBahanBaku' => 'required|string|max:255',
            'jumlahBahanBaku' => 'required|integer|min:1',
        ]);

        BahanBaku::create([
            'namaBahanBaku' => $request->namaBahanBaku,
            'jumlahBahanBaku' => $request->jumlahBahanBaku,
        ]);

        return redirect()->route('bahanBaku.show');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namaBahanBaku' => 'required|string|max:255',
            'jumlahBahanBaku' => 'required|integer|min:1',
        ]);

        $stock = BahanBaku::findOrFail($id);
        $stock->namaBahanBaku = $request->namaBahanBaku;
        $stock->jumlahBahanBaku = $request->jumlahBahanBaku;
        $stock->save();

        return redirect()->route('bahanBaku.show');
    }

        public function delete($id)
    {
        $stock = BahanBaku::findOrFail($id);
        $stock->delete();

        return redirect()->route('bahanBaku.show');
    }

}