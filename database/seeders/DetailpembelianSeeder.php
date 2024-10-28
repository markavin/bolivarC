<?php

namespace Database\Seeders;

use App\Models\Detailpembelian;
use Egulias\EmailValidator\Result\Reason\DetailedReason;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailpembelianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetailPembelian::factory()->create([
            'harga' => 50.000,
            'subTotal' => 500.000,
            'quantity'=> 10,
            'id_pembelian' => '83cf11b3-5ae8-4076-a50c-06236a8ffbf6',
            'id_bahanBaku' => 2,
        ]);
        DetailPembelian::factory()->create([
            'harga' => 30.000,
            'subTotal' => 150.000,
            'quantity'=> 5,
            'id_pembelian' => '529472b2-1e64-4b1d-b260-74bc5190d5f7',
            'id_bahanBaku' => 3,
        ]);
        DetailPembelian::factory()->create([
            'harga' => 200.000,
            'subTotal' => 2000000,
            'quantity'=> 10,
            'id_pembelian' => 'a175f4b1-4aad-41e9-9ed9-9c0aabb1e1f5',
            'id_bahanBaku' => 1,
        ]);
        DetailPembelian::factory()->create([
            'harga' => 25.000,
            'subTotal' => 125.000,
            'quantity'=> 5,
            'id_pembelian' => 'b4e3eb8d-beed-4ebd-b9bb-03d30b510889',
            'id_bahanBaku' => 4,
        ]);
        DetailPembelian::factory()->create([
            'harga' => 30.000,
            'subTotal' => 300.000,
            'quantity'=> 10,
            'id_pembelian' => '8ccddd26-e6d1-4d9d-9490-93bf72540ffb',
            'id_bahanBaku' => 5,
        ]);
        DetailPembelian::factory()->create([
            'harga' => 25.000,
            'subTotal' => 250.000,
            'quantity'=> 10,
            'id_pembelian' => 'd797cfdd-0cb1-40dc-8a6c-d72d11ffda43',
            'id_bahanBaku' => 4,
        ]);
        DetailPembelian::factory()->create([
            'harga' => 50.000,
            'subTotal' => 250.000,
            'quantity'=> 5,
            'id_pembelian' => 'c1d6febe-b0ec-4375-b14d-5bd603579f91',
            'id_bahanBaku' => 2,
        ]);
        DetailPembelian::factory()->create([
            'harga' => 30.000,
            'subTotal' => 150.000,
            'quantity'=> 5,
            'id_pembelian' => '913a6b9d-eb79-4d64-ad86-78b3589c7cae',
            'id_bahanBaku' => 6,
        ]);
        DetailPembelian::factory()->create([
            'harga' => 30.000,
            'subTotal' => 150.000,
            'quantity'=> 5,
            'id_pembelian' => 'ab8b9e9a-86fb-4fe9-98a2-205e4e1f2ffd',
            'id_bahanBaku' => 7,
        ]);
        DetailPembelian::factory()->create([
            'harga' => 200.000,
            'subTotal' => 800.000,
            'quantity'=> 4,
            'id_pembelian' => '283ade8e-7ddd-4df9-bf69-7cb6db292133',
            'id_bahanBaku' => 1,
        ]);
    }
}
