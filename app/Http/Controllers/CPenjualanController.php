<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CPenjualanController extends Controller
{
    public function show()
    {
        $penjualan = Penjualan::select(
            'penjualan.id_penjualan',
            'pelanggan.NamaPelanggan as NamaPelanggan',
            DB::raw('DATE(penjualan.tanggalPenjualan) as tanggalPenjualan'),
            DB::raw('SUM(detail_penjualan.quantity) as totalQuantity'),
            'penjualan.totalHarga'
        )
        ->join('pelanggan', 'penjualan.id_pelanggan', '=', 'pelanggan.id')
        ->join('detail_penjualan', 'penjualan.id_penjualan', '=', 'detail_penjualan.id_penjualan')
        ->groupBy('penjualan.id_penjualan', 'pelanggan.NamaPelanggan', 'penjualan.tanggalPenjualan', 'penjualan.totalHarga')
        ->orderBy('tanggalPenjualan', 'desc')
        ->get();

        return view("dashboard/penjualan/penjualan", compact('penjualan'));
    }
}
