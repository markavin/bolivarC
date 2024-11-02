<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\menu;

class CMenuController extends Controller
{
    public function show()
    {
        $menu = Menu::orderBy('id', 'desc')->get();
        return view("dashboard/menu/menu", compact('menu'));
    }
}
