<?php

namespace Database\Seeders;

use App\Models\Pembelian;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PembelianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pembelian::factory()->create([
            'tanggalpembelian' => Carbon::now(),
            'totalHarga' => 500000 ,
            'id_pengguna'=> 2,
        ]);
        Pembelian::factory()->create([
            'tanggalpembelian' => Carbon::create(2024, 10, 8),
            'totalHarga' => 150000,
            'id_pengguna'=> 3,
        ]);
        Pembelian::factory()->create([
            'tanggalpembelian' => Carbon::create(2024, 9, 30),
            'totalHarga' => 2000000,
            'id_pengguna'=> 4,
        ]);
        Pembelian::factory()->create([
            'tanggalpembelian' => Carbon::create(2024, 9, 23),
            'totalHarga' => 125000,
            'id_pengguna'=> 5,
        ]);
        Pembelian::factory()->create([
            'tanggalpembelian' => Carbon::create(2024, 9, 13),
            'totalHarga' => 300000,
            'id_pengguna'=> 6,
        ]);
        Pembelian::factory()->create([
            'tanggalpembelian' => Carbon::create(2024, 9, 13),
            'totalHarga' => 250000,
            'id_pengguna'=> 7,
        ]);
        Pembelian::factory()->create([
            'tanggalpembelian' => Carbon::create(2024, 10, 10),
            'totalHarga' => 250000,
            'id_pengguna'=> 8,
        ]);
        Pembelian::factory()->create([
            'tanggalpembelian' => Carbon::create(2024, 10, 8),
            'totalHarga' => 150000,
            'id_pengguna'=> 9,
        ]);
        Pembelian::factory()->create([
            'tanggalpembelian' => Carbon::create(2024, 10, 9),
            'totalHarga' => 150000,
            'id_pengguna'=> 9,
        ]);
        Pembelian::factory()->create([
            'tanggalpembelian' => Carbon::create(2024, 10, 30),
            'totalHarga' => 800000,
            'id_pengguna'=> 2,
        ]);

    }
}
