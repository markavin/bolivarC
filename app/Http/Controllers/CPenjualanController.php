<?php

namespace App\Http\Controllers;

use App\Models\Detailpenjualan;
use App\Models\Menu;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CPenjualanController extends Controller
{
    public function show()
    {
        // Fetch the sales data, including guest sales
        $penjualan = Penjualan::select(
            'penjualan.id_penjualan',
            'pelanggan.NamaPelanggan as NamaPelanggan',
            DB::raw('DATE(penjualan.tanggalPenjualan) as tanggalPenjualan'),
            DB::raw('SUM(detail_penjualan.quantity) as totalQuantity'),
            'penjualan.totalHarga',
            'penjualan.tanggalPenjualan as fullDate'
        )
            ->leftJoin('pelanggan', 'penjualan.id_pelanggan', '=', 'pelanggan.id') // Include guest sales
            ->join('detail_penjualan', 'penjualan.id_penjualan', '=', 'detail_penjualan.id_penjualan')
            ->groupBy('penjualan.id_penjualan', 'pelanggan.NamaPelanggan', 'penjualan.tanggalPenjualan', 'penjualan.totalHarga')
            ->orderBy('penjualan.tanggalPenjualan', 'desc')
            ->paginate(10);

        return view("dashboard.penjualan.penjualan", compact('penjualan'));
    }

    public function create()
    {
        $pelanggan = Pelanggan::all();
        $menu = Menu::all();
        return view('dashboard.penjualan.createPenjualan', compact('pelanggan', 'menu'));
    }

    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'NamaPelanggan' => 'required|nullable',
            'namaMenu.*' => 'required|exists:menu,id',
            'quantity.*' => 'required|integer|min:1',
            'totalHarga' => 'required|numeric',
            'totalBayar' => 'required|numeric',
        ]);

        // Check if the customer is a guest
        if ($request->NamaPelanggan == '0') {
            $customerName = 'Guest';
            $customerId = null;
        } else {
            $pelanggan = Pelanggan::find($request->NamaPelanggan);
            $customerName = $pelanggan->NamaPelanggan;
            $customerId = $pelanggan->id;
        }

        if ($request->totalBayar < $request->totalHarga) {
            return redirect()->back()->withErrors(['totalBayar' => 'Jumlah bayar tidak boleh kurang dari total harga.'])->withInput();
        }

        // Create the sales record
        $penjualan = Penjualan::create([
            'id_pelanggan' => $customerId,
            'tanggalPenjualan' => now(),
            'totalHarga' => $request->totalHarga,
            'totalBayar' => $request->totalBayar,
        ]);

        foreach ($request->namaMenu as $index => $menuId) {
            $menuPrice = $this->getMenuPrice($menuId);
            $quantity = $request->quantity[$index];
            $subTotal = $menuPrice * $quantity;

            DetailPenjualan::create([
                'id_penjualan' => $penjualan->id_penjualan,
                'id_menu' => $menuId,
                'quantity' => $quantity,
                'harga' => $menuPrice,
                'subTotal' => $subTotal,
            ]);
        }

        // Only add points if the customer is not a specific ID (e.g., a special case or 'Guest')
        if ($customerId && $customerName !== 'Guest') {
            $pelanggan = Pelanggan::find($customerId);
            $pelanggan->increment('totalPoin', 10);

            DB::table('poin')->insert([
                'id_pelanggan' => $customerId,
                'id_penjualan' => $penjualan->id_penjualan,
                'status' => 'penambahan',
                'TotalPoin' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('penjualan.show')->with('success', 'Penjualan berhasil dibuat.');
    }


    protected function getMenuPrice($menuId)
    {
        $menu = Menu::find($menuId);
        return $menu ? $menu->hargaMenu : 0;
    }

    public function showDetail($id_penjualan)
    {
        // Fetch the main sales data
        $penjualan = Penjualan::where('id_penjualan', $id_penjualan)
            ->leftJoin('pelanggan', 'penjualan.id_pelanggan', '=', 'pelanggan.id')
            ->select(
                'penjualan.id_penjualan',
                'pelanggan.NamaPelanggan',
                DB::raw('DATE(penjualan.tanggalPenjualan) as tanggalPenjualan'),
                'penjualan.totalHarga',
                'penjualan.totalBayar'
            )
            ->first();

        // Fetch the menu items purchased
        $detailPenjualan = Detailpenjualan::where('id_penjualan', $id_penjualan)
            ->join('menu', 'detail_penjualan.id_menu', '=', 'menu.id')
            ->select(
                'menu.namaMenu',
                'detail_penjualan.quantity',
                'detail_penjualan.harga',
                DB::raw('detail_penjualan.quantity * detail_penjualan.harga as subTotal')
            )
            ->get();

        // Calculate the points earned and the return payment
        $pointsEarned = $penjualan->id_pelanggan ? 10 : 10;
        $returnPay = $penjualan->totalBayar - $penjualan->totalHarga;

        return view('dashboard.penjualan.detailPenjualan', compact(
            'penjualan',
            'detailPenjualan',
            'pointsEarned',
            'returnPay'
        ));
    }
    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $penjualan = Penjualan::select(
            'penjualan.id_penjualan',
            'pelanggan.NamaPelanggan',
            'penjualan.tanggalPenjualan',
            'penjualan.totalHarga',
            DB::raw('SUM(detail_penjualan.quantity) as totalQuantity')
        )
            ->leftJoin('pelanggan', 'penjualan.id_pelanggan', '=', 'pelanggan.id')
            ->leftJoin('detail_penjualan', 'penjualan.id_penjualan', '=', 'detail_penjualan.id_penjualan')
            ->groupBy('penjualan.id_penjualan', 'pelanggan.NamaPelanggan', 'penjualan.tanggalPenjualan', 'penjualan.totalHarga')
            ->when($keyword, function ($query, $keyword) {
                $query->where('pelanggan.NamaPelanggan', 'LIKE', "%$keyword%")
                    ->orWhere('penjualan.tanggalPenjualan', 'LIKE', "%$keyword%");
            })
            ->orderBy('penjualan.tanggalPenjualan', 'desc')
            ->paginate(10);

        return view("dashboard.penjualan.penjualan", compact('penjualan'));
    }
}
