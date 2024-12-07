<?php

namespace App\Http\Controllers;

use App\Models\Poin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CPoinControllers extends Controller
{
    public function show()
    {
        $poin = Poin::select(
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
            DB::raw("CASE 
                     WHEN poin.status = 'penukaran' THEN penukaran.tanggal_penukaran
                     WHEN poin.status = 'penambahan' THEN penjualan.tanggalPenjualan
                  END as fullDateTime")
        )
            ->join('pelanggan', 'poin.id_pelanggan', '=', 'pelanggan.id')
            ->leftJoin('penukaran', 'poin.id_penukaran', '=', 'penukaran.id_penukaran')
            ->leftJoin('menu as menu_penukuran', 'penukaran.id_menu', '=', 'menu_penukuran.id')
            ->leftJoin('detail_penjualan', 'poin.id_penjualan', '=', 'detail_penjualan.id_penjualan')
            ->leftJoin('menu as menu_penambahan', 'detail_penjualan.id_menu', '=', 'menu_penambahan.id')
            ->leftJoin('penjualan', 'poin.id_penjualan', '=', 'penjualan.id_penjualan')
            ->orderBy('fullDateTime', 'desc')
            ->paginate(10);

        return view('dashboard.penukaranpoin.poin', compact('poin'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('search'); // Nama pelanggan atau status atau tanggal
        $status = $request->input('status'); // Status (penambahan/penukaran)
        $tanggal = $request->input('tanggal'); // Tanggal


        $poin = Poin::select(
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
            DB::raw("CASE 
                     WHEN poin.status = 'penukaran' THEN penukaran.tanggal_penukaran
                     WHEN poin.status = 'penambahan' THEN penjualan.tanggalPenjualan
                  END as fullDateTime")
        )
            ->join('pelanggan', 'poin.id_pelanggan', '=', 'pelanggan.id')
            ->leftJoin('penukaran', 'poin.id_penukaran', '=', 'penukaran.id_penukaran')
            ->leftJoin('menu as menu_penukuran', 'penukaran.id_menu', '=', 'menu_penukuran.id')
            ->leftJoin('detail_penjualan', 'poin.id_penjualan', '=', 'detail_penjualan.id_penjualan')
            ->leftJoin('menu as menu_penambahan', 'detail_penjualan.id_menu', '=', 'menu_penambahan.id')
            ->leftJoin('penjualan', 'poin.id_penjualan', '=', 'penjualan.id_penjualan')
            ->when($keyword, function ($query, $keyword) {
                return $query->where('pelanggan.NamaPelanggan', 'LIKE', "%$keyword%")
                    ->orWhere('poin.status', 'LIKE', "%$keyword%")
                    ->orWhere(DB::raw('DATE(penukaran.tanggal_penukaran)'), 'LIKE', "%$keyword%")
                    ->orWhere(DB::raw('DATE(penjualan.tanggalPenjualan)'), 'LIKE', "%$keyword%");
            })
            ->when($status, function ($query, $status) {
                return $query->where('poin.status', 'LIKE', "%$status%");
            })
            ->when($tanggal, function ($query, $tanggal) {
                return $query->whereDate('penukaran.tanggal_penukaran', '=', $tanggal)
                    ->orWhereDate('penjualan.tanggalPenjualan', '=', $tanggal);
            })
            ->orderBy('fullDateTime', 'desc')
            ->paginate(10);

        return view('dashboard.penukaranpoin.poin', compact('poin'));
    }
}
