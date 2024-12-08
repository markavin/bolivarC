<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\Detailpembelian;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CPembelianController extends Controller
{
    public function show()
    {
        $pembelian = DB::table('pembelian')
            ->select(
                'pembelian.id_pembelian',
                DB::raw("GROUP_CONCAT(bahanBaku.namaBahanBaku SEPARATOR ', ') as namaBahanBaku"),
                DB::raw('DATE(pembelian.tanggalPembelian) as tanggalPembelian'),
                DB::raw('SUM(detail_pembelian.quantity) as totalQuantity'),
                'pembelian.totalHarga',
                'pembelian.tanggalPembelian as fullDATE'
            )
            ->join('detail_pembelian', 'pembelian.id_pembelian', '=', 'detail_pembelian.id_pembelian')
            ->join('bahanBaku', 'detail_pembelian.id_bahanBaku', '=', 'bahanBaku.id')
            ->groupBy('pembelian.id_pembelian', 'pembelian.tanggalPembelian', 'pembelian.totalHarga')
            ->orderBy('pembelian.tanggalPembelian', 'desc')
            ->paginate(5);

        return view("dashboard/pembelian/pembelian", compact('pembelian'));
    }


    public function create()
    {
        // $pelanggan = Pelanggan::all();
        $bahanBaku = BahanBaku::all();
        return view('dashboard.pembelian.createPembelian', compact('bahanBaku'));
    }


    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'namaBahanBaku.*' => 'required|exists:bahanBaku,id',
            'harga.*' => 'required|numeric',
            'quantity.*' => 'required|integer|min:1',
            'totalHarga' => 'required|numeric|min:1',
        ]);



        $pembelian = Pembelian::create([
            'tanggalpembelian' => now(),
            // 'harga' =>  $request->harga,
            'totalHarga' => $request->totalHarga,
        ]);

        foreach ($request->namaBahanBaku as $index => $bahanBakuid) {
            $harga = $request->harga[$index];
            $quantity = $request->quantity[$index];
            $subTotal = $harga * $quantity;

            Detailpembelian::create([
                'id_pembelian' => $pembelian->id_pembelian,
                'id_bahanBaku' => $bahanBakuid,
                'quantity' => $quantity,
                'harga' => $harga,
                'subTotal' => $subTotal,
            ]);

            $bahanBaku = BahanBaku::find($bahanBakuid);
            if ($bahanBaku) {   
                $bahanBaku->update([
                    'jumlahBahanBaku' => $bahanBaku->jumlahBahanBaku + $quantity,  // Stok ditambah
                ]);
            }
            
        }

        return redirect()->route('pembelian.show')->with('success', 'pembelian berhasil dibuat dan poin ditambahkan.');
    }

    public function showDetail($id_pembelian)
    {
        // Fetch the main sales data
        $pembelian = Pembelian::where('id_pembelian', $id_pembelian)
            ->select(
                'pembelian.id_pembelian',
                DB::raw('DATE(pembelian.tanggalpembelian) as tanggalpembelian'),
                'pembelian.totalHarga'
            )
            ->first();

        // Fetch the menu items purchased
        $detailPembelian = Detailpembelian::where('id_pembelian', $id_pembelian)
            ->join('bahanBaku', 'detail_pembelian.id_bahanBaku', '=', 'bahanBaku.id')
            ->select(
                'bahanBaku.namaBahanBaku',
                'detail_pembelian.quantity',
                'detail_pembelian.harga',
                DB::raw('detail_pembelian.quantity * detail_pembelian.harga as subTotal')
            )
            ->get();


        return view('dashboard.pembelian.detailPembelian', compact(
            'pembelian',
            'detailPembelian'
        ));
    }


    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $pembelian = Pembelian::select(
            'pembelian.id_pembelian',
            DB::raw("GROUP_CONCAT(bahanBaku.namaBahanBaku SEPARATOR ', ') as namaBahanBaku"),
            'pembelian.tanggalpembelian',
            'pembelian.totalHarga',
            DB::raw('SUM(detail_pembelian.quantity) as totalQuantity')
        )
            ->join('detail_pembelian', 'pembelian.id_pembelian', '=', 'detail_pembelian.id_pembelian')
            ->join('bahanBaku', 'detail_pembelian.id_bahanBaku', '=', 'bahanBaku.id')
            ->groupBy('pembelian.id_pembelian', 'pembelian.tanggalpembelian', 'pembelian.totalHarga')
            ->when($keyword, function ($query, $keyword) {
                $query->where('bahanBaku.namaBahanBaku', 'LIKE', "%$keyword%")
                    ->orWhere('pembelian.tanggalpembelian', 'LIKE', "%$keyword%");
            })
            ->orderBy('pembelian.tanggalpembelian', 'desc')
            ->paginate(10);

        return view("dashboard.pembelian.pembelian", compact('pembelian'));
    }
}
