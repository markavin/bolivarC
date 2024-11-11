<?php

namespace Database\Seeders;

use App\Models\Detailpenjualan;
use Carbon\Carbon;
use App\Models\Penjualan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailpenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penjualan = Penjualan::orderBy('tanggalPenjualan')->get();

        $penjualan1 = $penjualan[0];
        Detailpenjualan::create([
            'harga' => 28000,
            'subTotal' => 56000,
            'quantity' => 2,
            'id_penjualan' => $penjualan1->id_penjualan, // Gunakan UUID yang dihasilkan
            'id_menu' => 1
        ]);

        $penjualan2 = $penjualan[1];
         Detailpenjualan::create([
            'harga' => 27000,
            'subTotal' => 27000,
            'quantity' => 1,
            'id_penjualan' => $penjualan2->id_penjualan, // Gunakan UUID yang dihasilkan
            'id_menu' => 5
        ]);

        $penjualan3 = $penjualan[2];
        Detailpenjualan::factory()->create([
            'harga' => 30000,
            'subTotal' => 90000,
            'quantity'=> 3,
            'id_penjualan' => $penjualan3->id_penjualan,
            'id_menu' => 9
        ]);

        $penjualan4 = $penjualan[3];

        Detailpenjualan::factory()->create([
            'harga' => 27000,
            'subTotal' => 27000,
            'quantity'=> 1,
            'id_penjualan' =>$penjualan4->id_penjualan,
            'id_menu' => 2
        ]);
        Detailpenjualan::factory()->create([
            'harga' => 23000,
            'subTotal' => 23000,
            'quantity'=> 1,
            'id_penjualan' => $penjualan4->id_penjualan,
            'id_menu' => 10
        ]);

        $penjualan5 = $penjualan[4];
        Detailpenjualan::factory()->create([
            'harga' => 28000,
            'subTotal' => 28000,
            'quantity'=> 1,
            'id_penjualan' => $penjualan5->id_penjualan,
            'id_menu' => 3
        ]);

        $penjualan6 = $penjualan[5];

        Detailpenjualan::factory()->create([
            'harga' => 26000,
            'subTotal' => 78000,
            'quantity'=> 3,
            'id_penjualan' => $penjualan6->id_penjualan,
            'id_menu' => 4
        ]);
        Detailpenjualan::factory()->create([
            'harga' => 23000,
            'subTotal' => 46000,
            'quantity'=> 2,
            'id_penjualan' => $penjualan6->id_penjualan,
            'id_menu' => 10
        ]);

        $penjualan7 =$penjualan[6];

        Detailpenjualan::factory()->create([
            'harga' => 27000,
            'subTotal' => 54000,
            'quantity'=> 2,
            'id_penjualan' => $penjualan7->id_penjualan,
            'id_menu' => 2
        ]);

        $penjualan8 = $penjualan[7];
        Detailpenjualan::factory()->create([
            'harga' => 26000,
            'subTotal' => 26000,
            'quantity'=> 1,
            'id_penjualan' => $penjualan8->id_penjualan,
            'id_menu' => 4
        ]);

        $penjualan9 = $penjualan[8];

        Detailpenjualan::factory()->create([
            'harga' => 26000,
            'subTotal' => 52000,
            'quantity'=> 2,
            'id_penjualan' => $penjualan9->id_penjualan,
            'id_menu' => 4
        ]);

        $penjualan10 = $penjualan[9];

        Detailpenjualan::factory()->create([
            'harga' => 23000,
            'subTotal' => 69000,
            'quantity'=> 3,
            'id_penjualan' => $penjualan10->id_penjualan,
            'id_menu' => 10
        ]);
    } 
}
