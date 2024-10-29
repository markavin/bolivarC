<?php

namespace Database\Seeders;

use App\Models\Penjualan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penjualan::factory()->create([
            'id_penjualan' => 'd326cb80-518b-4a8f-9b28-2631941db54b',
            'tanggalPenjualan' => Carbon::now(),
            'totalHarga' => 56000 ,
            'totalBayar' => 60000,
            'id_pengguna'=>7,
            'id_pelanggan'=> 1
        ]);
        Penjualan::factory()->create([
            'id_penjualan' => 'c52997de-0fca-40d4-b597-d7ce8a8b5d81',
            'tanggalPenjualan' => Carbon::create(2024, 10, 13),
            'totalHarga' => 27000,
            'totalBayar' => 27000,
            'id_pengguna' => 5,
            'id_pelanggan' => 2
        ]);
        Penjualan::factory()->create([
            'id_penjualan' => '052d5f7c-69e8-4134-b5cf-71063490d55f',
            'tanggalPenjualan' => Carbon::create(2024, 10, 13),
            'totalHarga' => 90000,
            'totalBayar' => 100000,
            'id_pengguna' => 2,
            'id_pelanggan' => 3
        ]);   
        Penjualan::factory()->create([
            'id_penjualan' => 'e82359e9-68b7-415f-b102-d4198c0beb5e',
            'tanggalPenjualan' => Carbon::create(2024, 10, 13),
            'totalHarga' => 50000,
            'totalBayar' => 50000,
            'id_pengguna' => 3,
            'id_pelanggan' => 4
        ]);
        Penjualan::factory()->create([
            'id_penjualan' => 'f576170c-b4f2-4f26-a490-0449baa7bfce',
            'tanggalPenjualan' => Carbon::create(2024, 10, 13),
            'totalHarga' => 28000,
            'totalBayar' => 28000,
            'id_pengguna' => 7,
            'id_pelanggan' => 7
        ]);
        Penjualan::factory()->create([
            'id_penjualan' => '819bbc1a-d121-460c-88e8-f99798d5ff8f',
            'tanggalPenjualan' => Carbon::create(2024, 10, 13),
            'totalHarga' => 124000,
            'totalBayar' => 130000,
            'id_pengguna' => 5,
            'id_pelanggan' => 5
        ]);
        Penjualan::factory()->create([
            'id_penjualan' => '5fa993dd-9786-495b-940f-a024606ab86a',
            'tanggalPenjualan' => Carbon::create(2024, 10, 13),
            'totalHarga' => 54000,
            'totalBayar' => 54000,
            'id_pengguna' => 4,
            'id_pelanggan' => 6
        ]);
        Penjualan::factory()->create([
            'id_penjualan' => 'e8aee3c4-0c8d-4300-9571-b202bc057d2a',
            'tanggalPenjualan' => Carbon::create(2024, 10, 13),
            'totalHarga' => 26000,
            'totalBayar' => 26000,
            'id_pengguna' => 2,
            'id_pelanggan' => 1
        ]);
        Penjualan::factory()->create([
            'id_penjualan' => 'a5ff54f1-6ffc-40f0-ae61-605a0c614b78',
            'tanggalPenjualan' => Carbon::create(2024, 10, 13),
            'totalHarga' => 52000,
            'totalBayar' => 52000,
            'id_pengguna' => 7,
            'id_pelanggan' => 9
        ]);
        Penjualan::factory()->create([
            'id_penjualan' => '9d7a79e9-dedf-4e6f-a6c4-521c0de33bb4',
            'tanggalPenjualan' => Carbon::create(2024, 10, 13),
            'totalHarga' => 69000,
            'totalBayar' => 70000,
            'id_pengguna' => 9,
            'id_pelanggan' => 10
        ]); 
    }
}
