<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CPenukaranController extends Controller
{
    public function show()
    {
        $poin = DB::table('poin')
        ->select(
            'poin.id as id_poin',
            'pelanggan.NamaPelanggan',
            DB::raw("CASE 
                        WHEN poin.status = 'penambahan' THEN menu_penambahan.namaMenu 
                        WHEN poin.status = 'penukaran' THEN menu_penukuran.namaMenu 
                     END as nama_menu"),
            'poin.status',
            'poin.TotalPoin',
            DB::raw("CASE 
                        WHEN poin.status = 'penukaran' THEN DATE(penukaran.tanggal_penukaran)
                        WHEN poin.status = 'penambahan' THEN DATE(penjualan.tanggalPenjualan)
                     END as Tanggal"),
        )
        ->join('pelanggan', 'poin.id_pelanggan', '=', 'pelanggan.id')
        ->leftJoin('penukaran', 'poin.id_penukaran', '=', 'penukaran.id')
        ->leftJoin('menu as menu_penukuran', 'penukaran.id_menu', '=', 'menu_penukuran.id')
        ->leftJoin('detail_penjualan', 'poin.id_penjualan', '=', 'detail_penjualan.id_penjualan')
        ->leftJoin('menu as menu_penambahan', 'detail_penjualan.id_menu', '=', 'menu_penambahan.id')
        ->leftJoin('penjualan', 'poin.id_penjualan', '=', 'penjualan.id_penjualan')
        ->orderBy('Tanggal', 'desc')
        ->get();
    

        return view("dashboard/penukaranpoin/poin", compact('poin'));
    }
}