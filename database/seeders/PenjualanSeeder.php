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
            'tanggalPenjualan' => Carbon::now(),
            'totalHarga' => 56000 ,
            'totalBayar' => 60000,
            'id_pengguna'=>7,
            'id_pelanggan'=> 1
        ]);
        Penjualan::factory()->create([
            'tanggalPenjualan' => Carbon::create(2024, 10, 13),
            'totalHarga' => 27000,
            'totalBayar' => 27000,
            'id_pengguna' => 5,
            'id_pelanggan' => 2
        ]);
        Penjualan::factory()->create([
            'tanggalPenjualan' => Carbon::create(2024, 10, 13),
            'totalHarga' => 90000,
            'totalBayar' => 100000,
            'id_pengguna' => 2,
            'id_pelanggan' => 3
        ]);   
        Penjualan::factory()->create([
            'tanggalPenjualan' => Carbon::create(2024, 10, 13),
            'totalHarga' => 50000,
            'totalBayar' => 50000,
            'id_pengguna' => 3,
            'id_pelanggan' => 4
        ]);
        Penjualan::factory()->create([
            'tanggalPenjualan' => Carbon::create(2024, 10, 13),
            'totalHarga' => 28000,
            'totalBayar' => 28000,
            'id_pengguna' => 7,
            'id_pelanggan' => 7
        ]);
        Penjualan::factory()->create([
            'tanggalPenjualan' => Carbon::create(2024, 10, 13),
            'totalHarga' => 124000,
            'totalBayar' => 130000,
            'id_pengguna' => 5,
            'id_pelanggan' => 5
        ]);
        Penjualan::factory()->create([
            'tanggalPenjualan' => Carbon::create(2024, 10, 13),
            'totalHarga' => 54000,
            'totalBayar' => 54000,
            'id_pengguna' => 4,
            'id_pelanggan' => 6
        ]);
        Penjualan::factory()->create([
            'tanggalPenjualan' => Carbon::create(2024, 10, 13),
            'totalHarga' => 26000,
            'totalBayar' => 26000,
            'id_pengguna' => 2,
            'id_pelanggan' => 1
        ]);
        Penjualan::factory()->create([
            'tanggalPenjualan' => Carbon::create(2024, 10, 13),
            'totalHarga' => 52000,
            'totalBayar' => 52000,
            'id_pengguna' => 7,
            'id_pelanggan' => 9
        ]);
        Penjualan::factory()->create([
            'tanggalPenjualan' => Carbon::create(2024, 10, 13),
            'totalHarga' => 69000,
            'totalBayar' => 70000,
            'id_pengguna' => 9,
            'id_pelanggan' => 10
        ]); 
    }
}
