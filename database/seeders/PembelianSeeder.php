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
            'id_pembelian' => '83cf11b3-5ae8-4076-a50c-06236a8ffbf6',
            'tanggalpembelian' => Carbon::now(),
            'totalHarga' => 500000 ,
            'id_pengguna'=> 2,
        ]);
        Pembelian::factory()->create([
            'id_pembelian' => '529472b2-1e64-4b1d-b260-74bc5190d5f7',
            'tanggalpembelian' => Carbon::create(2024, 10, 8),
            'totalHarga' => 150000,
            'id_pengguna'=> 3,
        ]);
        Pembelian::factory()->create([
            'id_pembelian' => 'a175f4b1-4aad-41e9-9ed9-9c0aabb1e1f5',
            'tanggalpembelian' => Carbon::create(2024, 9, 30),
            'totalHarga' => 2000000,
            'id_pengguna'=> 4,
        ]);
        Pembelian::factory()->create([
            'id_pembelian' => 'b4e3eb8d-beed-4ebd-b9bb-03d30b510889',
            'tanggalpembelian' => Carbon::create(2024, 9, 23),
            'totalHarga' => 125000,
            'id_pengguna'=> 5,
        ]);
        Pembelian::factory()->create([
            'id_pembelian' => '8ccddd26-e6d1-4d9d-9490-93bf72540ffb',
            'tanggalpembelian' => Carbon::create(2024, 9, 13),
            'totalHarga' => 300000,
            'id_pengguna'=> 6,
        ]);
        Pembelian::factory()->create([
            'id_pembelian' => 'd797cfdd-0cb1-40dc-8a6c-d72d11ffda43',
            'tanggalpembelian' => Carbon::create(2024, 9, 13),
            'totalHarga' => 250000,
            'id_pengguna'=> 7,
        ]);
        Pembelian::factory()->create([
            'id_pembelian' => 'c1d6febe-b0ec-4375-b14d-5bd603579f91',
            'tanggalpembelian' => Carbon::create(2024, 10, 10),
            'totalHarga' => 250000,
            'id_pengguna'=> 8,
        ]);
        Pembelian::factory()->create([
            'id_pembelian' => '913a6b9d-eb79-4d64-ad86-78b3589c7cae',
            'tanggalpembelian' => Carbon::create(2024, 10, 8),
            'totalHarga' => 150000,
            'id_pengguna'=> 9,
        ]);
        Pembelian::factory()->create([
            'id_pembelian' => 'ab8b9e9a-86fb-4fe9-98a2-205e4e1f2ffd',
            'tanggalpembelian' => Carbon::create(2024, 10, 9),
            'totalHarga' => 150000,
            'id_pengguna'=> 9,
        ]);
        Pembelian::factory()->create([
            'id_pembelian' => '283ade8e-7ddd-4df9-bf69-7cb6db292133',
            'tanggalpembelian' => Carbon::create(2024, 10, 30),
            'totalHarga' => 800000,
            'id_pengguna'=> 2,
        ]);

    }
}
