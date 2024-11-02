<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use Illuminate\Http\Request;

class CBahanbakuController extends Controller
{
    public function show()
    {
        $bahanBaku = BahanBaku::orderBy('id', 'desc')->get();
        return view("dashboard/bahanBaku/bahanbaku", compact('bahanBaku'));
    }
}
