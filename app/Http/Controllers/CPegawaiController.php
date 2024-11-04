<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class CPegawaiController extends Controller
{
    public function show()
    {
        $pengguna = Pengguna::orderBy('id', 'desc')->get();
        
        return view("dashboard/pegawai/pegawai", compact('pengguna'));
    }
}
