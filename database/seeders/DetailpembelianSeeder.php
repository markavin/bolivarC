<?php

namespace Database\Seeders;

use App\Models\Detailpembelian;
use App\Models\Pembelian;
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
        $pembelian = Pembelian::orderBy('tanggalpembelian')->get();

        $pembelian1 = $pembelian[0];
        DetailPembelian::factory()->create([
            'harga' => 50000,
            'subTotal' => 500000,
            'quantity'=> 10,
            'id_pembelian' => $pembelian1->id_pembelian,
            'id_bahanBaku' => 2,
        ]);

        $pembelian2 = $pembelian[1];
        DetailPembelian::factory()->create([
            'harga' => 30000,
            'subTotal' => 150000,
            'quantity'=> 5,
            'id_pembelian' => $pembelian2->id_pembelian,
            'id_bahanBaku' => 3,
        ]);

        $pembelian3 = $pembelian[2];
        DetailPembelian::factory()->create([
            'harga' => 200000,
            'subTotal' => 2000000,
            'quantity'=> 10,
            'id_pembelian' => $pembelian3->id_pembelian,
            'id_bahanBaku' => 1,
        ]);

        $pembelian4 = $pembelian[3];
        DetailPembelian::factory()->create([
            'harga' => 25000,
            'subTotal' => 125000,
            'quantity'=> 5,
            'id_pembelian' => $pembelian4->id_pembelian,
            'id_bahanBaku' => 4,
        ]);

        $pembelian5 = $pembelian[4];
        DetailPembelian::factory()->create([
            'harga' => 30000,
            'subTotal' => 300000,
            'quantity'=> 10,
            'id_pembelian' => $pembelian5->id_pembelian,
            'id_bahanBaku' => 5,
        ]);

        $pembelian6 = $pembelian[5];
        DetailPembelian::factory()->create([
            'harga' => 25000,
            'subTotal' => 250000,
            'quantity'=> 10,
            'id_pembelian' => $pembelian6->id_pembelian,
            'id_bahanBaku' => 4,
        ]);

        $pembelian7 = $pembelian[6];
        DetailPembelian::factory()->create([
            'harga' => 50000,
            'subTotal' => 250000,
            'quantity'=> 5,
            'id_pembelian' => $pembelian7->id_pembelian,
            'id_bahanBaku' => 2,
        ]);

        $pembelian8 = $pembelian[7];
        DetailPembelian::factory()->create([
            'harga' => 30000,
            'subTotal' => 150000,
            'quantity'=> 5,
            'id_pembelian' => $pembelian8->id_pembelian,
            'id_bahanBaku' => 6,
        ]);

        $pembelian9 = $pembelian[8];
        DetailPembelian::factory()->create([
            'harga' => 30000,
            'subTotal' => 150000,
            'quantity'=> 5,
            'id_pembelian' => $pembelian9->id_pembelian,
            'id_bahanBaku' => 7,
        ]);

        $pembelian10 = $pembelian[9];
        DetailPembelian::factory()->create([
            'harga' => 200000,
            'subTotal' => 800000,
            'quantity'=> 4,
            'id_pembelian' => $pembelian10->id_pembelian,
            'id_bahanBaku' => 1,
        ]);
    }
}
