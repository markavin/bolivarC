<?php

namespace Database\Seeders;

use App\Models\menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::insert([
            'namaMenu' => 'el Fuerte',
            'hargaMenu' => 28000,
	        'fotoMenu' => 'el-fuerte.jpg' 
        ]);
        Menu::insert([
            'namaMenu' => 'Caramel Macchiato',
            'hargaMenu' => 27000,
	        'fotoMenu' => 'CaramelMacchiato.jpg' 
        ]);
        Menu::insert([
            'namaMenu' => 'Peanut Butter Latte',
            'hargaMenu' => 28000,
	        'fotoMenu' => 'peanutbutter.jpg' 
        ]);
        Menu::insert([
            'namaMenu' => 'el Pamar',
            'hargaMenu' => 26000,
	        'fotoMenu' => 'elpamar.jpg' 
        ]);
        Menu::insert([
            'namaMenu' => 'Malika Latte',
            'hargaMenu' => 27000,
	        'fotoMenu' => 'malikalatte.jpg' 
        ]);
        Menu::insert([
            'namaMenu' => 'Spanish Latte',
            'hargaMenu' => 26000,
	        'fotoMenu' => 'spannishlatte.jpg' 
        ]);
        Menu::insert([
            'namaMenu' => 'Red velvet',
            'hargaMenu' => 27000,
            'fotoMenu' => 'redvelvet.jpg' ,
        ]);
        Menu::insert([
            'namaMenu' => 'Chocolate cheese',
            'hargaMenu' => 29000,
	        'fotoMenu' => 'chocolatecheese.jpg' ,
        ]);
        Menu::insert([
            'namaMenu' => 'Matcha cheese',
            'hargaMenu' => 30000,
	        'fotoMenu' => 'matcha.jpg' ,
        ]);
        Menu::insert([
            'namaMenu' => 'Strawberry Cheese',
            'hargaMenu' => 23000,
	        'fotoMenu' => 'strawberrycheese.jpg' ,
        ]);
    }
}
