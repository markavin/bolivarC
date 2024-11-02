<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class CPelangganController extends Controller
{
    public function show()
    {
        $pelanggan = Pelanggan::withCount('penjualan')->orderBy('id', 'desc')->get();
        
        return view("dashboard/pelanggan/pelanggan", compact('pelanggan'));
    }
}
