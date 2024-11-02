<?php

namespace App\Http\Controllers;

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
            'bahanBaku.namaBahanBaku',
            DB::raw('DATE(pembelian.tanggalPembelian) as tanggalPembelian'),
            DB::raw('SUM(detail_pembelian.quantity) as totalQuantity'),
            'pembelian.totalHarga'
        )
        ->join('detail_pembelian', 'pembelian.id_pembelian', '=', 'detail_pembelian.id_pembelian')
        ->join('bahanBaku', 'detail_pembelian.id_bahanBaku', '=', 'bahanBaku.id')
        ->groupBy('pembelian.id_pembelian', 'bahanBaku.namaBahanBaku', 'pembelian.tanggalPembelian', 'pembelian.totalHarga')
        ->orderBy('tanggalPembelian', 'desc')
        ->get();

        return view("dashboard/pembelian/pembelian", compact('pembelian'));
    }
}
