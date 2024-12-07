<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Menu;
use App\Models\Penukaran;
use App\Models\Poin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CPenukaranController extends Controller
{
    // Controller method: show

    public function create()
    {
        // Ambil data pelanggan
        $pelanggan = Pelanggan::all();

        // Ambil data menu dan hitung deduct_poin berdasarkan harga menu
        $menu = Menu::all()->map(function ($item) {
            if ($item->hargaMenu > 27000) {
                $item->deduct_poin = 20; // Harga > 27,000, pengurangan poin 20
            } elseif ($item->hargaMenu > 25000) {
                $item->deduct_poin = 15; // Harga > 25,000, pengurangan poin 15
            } else {
                $item->deduct_poin = 10; // Harga <= 25,000, pengurangan poin 10
            }
            return $item;
        });

        return view('dashboard.penukaranpoin.createPenukaran', compact('pelanggan', 'menu'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_pelanggan' => 'required|exists:pelanggan,id',
            'id_menu' => 'required|exists:menu,id',
        ]);

        // Ambil data pelanggan dan menu
        $pelanggan = Pelanggan::find($request->id_pelanggan);
        $menu = Menu::find($request->id_menu);

        // Hitung poin yang akan dikurang berdasarkan harga menu
        $deductPoints = 0;
        if ($menu->hargaMenu > 27000) {
            $deductPoints = 20;
        } elseif ($menu->hargaMenu > 25000) {
            $deductPoints = 15;
        } else {
            $deductPoints = 10;
        }

        // Cek apakah pelanggan memiliki cukup poin untuk penukaran
        if ($pelanggan->totalPoin < $deductPoints) {
            return redirect()->back()->withErrors(['message' => 'Poin tidak cukup untuk penukaran ini.']);
        }

        // Mulai transaksi database untuk memastikan konsistensi data
        DB::beginTransaction();

        try {
            // Kurangi poin dari total poin pelanggan
            $pelanggan->totalPoin -= $deductPoints;
            $pelanggan->save();

            // Buat record baru penukaran di tabel 'penukaran'
            $penukaran = Penukaran::create([
                'id_pelanggan' => $pelanggan->id,
                'id_menu' => $menu->id,
                'total_penukaranPoin' => $deductPoints,
                'tanggal_penukaran' => now(),
            ]);

            // Catat pengurangan poin di tabel 'poin'
            Poin::create([
                'id_pelanggan' => $pelanggan->id,
                'status' => 'penukaran',  // Status transaksi
                'TotalPoin' => -$deductPoints,  // Kurangi poin
                'id_penukaran' => $penukaran->id_penukaran,
            ]);

            DB::commit();

            // Redirect ke halaman poin.show setelah berhasil dengan sisa poin
            return redirect()->route('poin.show')->with('success', 'Penukaran berhasil.')
                ->with('menu', $menu->namaMenu)
                ->with('harga', number_format($menu->hargaMenu, 0, ',', '.'))
                ->with('poin', $deductPoints)
                ->with('namaPelanggan', $pelanggan->NamaPelanggan)
                ->with('sisaPoin', $pelanggan->totalPoin);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['message' => 'Terjadi kesalahan saat penukaran poin.']);
        }
    }


    // Metode untuk mengambil poin pelanggan
    public function getPoinPelanggan($id)
    {
        $pelanggan = Pelanggan::find($id);
        if (!$pelanggan) {
            return response()->json(['error' => 'Pelanggan tidak ditemukan.'], 404);
        }

        return response()->json(['total_poin' => $pelanggan->totalPoin]);
    }

    // Metode untuk mengambil diskon poin berdasarkan menu
    public function getDiskonMenu($id)
    {
        $menu = Menu::find($id);
        if (!$menu) {
            return response()->json(['error' => 'Menu tidak ditemukan.'], 404);
        }

        // Hitung pengurangan poin berdasarkan harga menu
        if ($menu->hargaMenu > 27000) {
            $deductPoints = 20;
        } elseif ($menu->hargaMenu > 25000) {
            $deductPoints = 15;
        } else {
            $deductPoints = 10;
        }

        return response()->json(['deduct_poin' => $deductPoints]);
    }
}
