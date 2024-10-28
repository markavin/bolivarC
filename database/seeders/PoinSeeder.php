<?php

namespace Database\Seeders;

use App\Models\Poin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Poin::factory()->create([
            'TotalPoin' => -50,
            'status' => 'penukaran',
            'id_pelanggan' =>  4,
            'id_penukaran' =>  1,
            'id_penjualan' =>  null
        ]);

        Poin::factory()->create([
            'TotalPoin' => -40,
            'status' => 'penukaran',
            'id_pelanggan' =>  3,
            'id_penukaran' =>  2,
            'id_penjualan' =>  null
        ]);

        Poin::factory()->create([
            'TotalPoin' => -30,
            'status' => 'penukaran',
            'id_pelanggan' =>  1,
            'id_penukaran' =>  3,
            'id_penjualan' =>  null
        ]);
        Poin::factory()->create([
            'TotalPoin' => 10,
            'status' => 'penambahan',
            'id_pelanggan' =>  1,
            'id_penukaran' =>  null,
            'id_penjualan' => 'd326cb80-518b-4a8f-9b28-2631941db54b',
        ]);
        Poin::factory()->create([
            'TotalPoin' => -30,
            'status' => 'penukaran',
            'id_pelanggan' =>  7,
            'id_penukaran' =>  4,
            'id_penjualan' =>  null
        ]);
        Poin::factory()->create([
            'TotalPoin' => 10,
            'status' => 'penambahan',
            'id_pelanggan' =>  2,
            'id_penukaran' =>  null,
            'id_penjualan' => 'c52997de-0fca-40d4-b597-d7ce8a8b5d81',
        ]);
        Poin::factory()->create([
            'TotalPoin' => -25,
            'status' => 'penukaran',
            'id_pelanggan' =>  2,
            'id_penukaran' =>  5,
            'id_penjualan' =>  null
        ]);
        Poin::factory()->create([
            'TotalPoin' => 10,
            'status' => 'penambahan',
            'id_pelanggan' =>  3,
            'id_penukaran' =>  null,
            'id_penjualan' => '052d5f7c-69e8-4134-b5cf-71063490d55f',
        ]);
        Poin::factory()->create([
            'TotalPoin' => -40,
            'status' => 'penukaran',
            'id_pelanggan' =>  9,
            'id_penukaran' =>  6,
            'id_penjualan' =>  null
        ]);
        Poin::factory()->create([
            'TotalPoin' => -40,
            'status' => 'penukaran',
            'id_pelanggan' =>  10,
            'id_penukaran' =>  7,
            'id_penjualan' =>  null
        ]);
    }
}
