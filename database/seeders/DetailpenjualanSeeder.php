<?php

namespace Database\Seeders;

use App\Models\Detailpenjualan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailpenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Detailpenjualan::factory()->create([
            'harga' => 28000,
            'subTotal' => 56000,
            'quantity'=> 2,
            'id_penjualan' => 'd326cb80-518b-4a8f-9b28-2631941db54b',
            'id_menu' => 1
        ]);
        Detailpenjualan::factory()->create([
            'harga' => 27000,
            'subTotal' => 27000,
            'quantity'=> 1,
            'id_penjualan' => 'c52997de-0fca-40d4-b597-d7ce8a8b5d81',
            'id_menu' => 5
        ]);
        Detailpenjualan::factory()->create([
            'harga' => 30000,
            'subTotal' => 90000,
            'quantity'=> 3,
            'id_penjualan' => '052d5f7c-69e8-4134-b5cf-71063490d55f',
            'id_menu' => 9
        ]);
        Detailpenjualan::factory()->create([
            'harga' => 27000,
            'subTotal' => 27000,
            'quantity'=> 1,
            'id_penjualan' => 'e82359e9-68b7-415f-b102-d4198c0beb5e',
            'id_menu' => 2
        ]);
        Detailpenjualan::factory()->create([
            'harga' => 23000,
            'subTotal' => 23000,
            'quantity'=> 1,
            'id_penjualan' => 'e82359e9-68b7-415f-b102-d4198c0beb5e',
            'id_menu' => 10
        ]);
        Detailpenjualan::factory()->create([
            'harga' => 28000,
            'subTotal' => 28000,
            'quantity'=> 1,
            'id_penjualan' => 'f576170c-b4f2-4f26-a490-0449baa7bfce',
            'id_menu' => 3
        ]);
        Detailpenjualan::factory()->create([
            'harga' => 26000,
            'subTotal' => 78000,
            'quantity'=> 3,
            'id_penjualan' => '819bbc1a-d121-460c-88e8-f99798d5ff8f',
            'id_menu' => 4
        ]);
        Detailpenjualan::factory()->create([
            'harga' => 23000,
            'subTotal' => 46000,
            'quantity'=> 2,
            'id_penjualan' => '819bbc1a-d121-460c-88e8-f99798d5ff8f',
            'id_menu' => 10
        ]);
        Detailpenjualan::factory()->create([
            'harga' => 27000,
            'subTotal' => 54000,
            'quantity'=> 2,
            'id_penjualan' => '5fa993dd-9786-495b-940f-a024606ab86a',
            'id_menu' => 2
        ]);
        Detailpenjualan::factory()->create([
            'harga' => 26000,
            'subTotal' => 26000,
            'quantity'=> 1,
            'id_penjualan' => 'e8aee3c4-0c8d-4300-9571-b202bc057d2a',
            'id_menu' => 4
        ]);
        Detailpenjualan::factory()->create([
            'harga' => 26000,
            'subTotal' => 52000,
            'quantity'=> 2,
            'id_penjualan' => 'a5ff54f1-6ffc-40f0-ae61-605a0c614b78',
            'id_menu' => 4
        ]);
        Detailpenjualan::factory()->create([
            'harga' => 23000,
            'subTotal' => 69000,
            'quantity'=> 3,
            'id_penjualan' => '9d7a79e9-dedf-4e6f-a6c4-521c0de33bb4',
            'id_menu' => 10
        ]);
    } 
}
