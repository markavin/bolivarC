<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class CPelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view("dashboard/pelanggan", compact('pelanggan'));
    }
}
