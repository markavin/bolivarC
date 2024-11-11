<?php

namespace Database\Seeders;

use App\Models\Penjualan;
use App\Models\Penukaran;
use App\Models\Poin;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoinSeeder extends Seeder
{
    public function run(): void
    {
        $penjualan = Penjualan::orderBy('tanggalPenjualan')->get();
        $penukaran = Penukaran::orderBy('tanggal_penukaran')->get();

        $penukaran4 = $penukaran[3];
        Poin::factory()->create([
            'TotalPoin' => -40,
            'status' => 'penukaran',
            'id_pelanggan' =>  10,
            'id_penukaran' =>  $penukaran4->id_penukaran,
            'id_penjualan' =>  null
        ]);

        $penukaran5 = $penukaran[4];
        Poin::factory()->create([
            'TotalPoin' => -40,
            'status' => 'penukaran',
            'id_pelanggan' =>  9,
            'id_penukaran' => $penukaran5->id_penukaran,
            'id_penjualan' =>  null
        ]);
        
        $penukaran6 = $penukaran[5];
        Poin::factory()->create([
            'TotalPoin' => -25,
            'status' => 'penukaran',
            'id_pelanggan' =>  2,
            'id_penukaran' =>  $penukaran6->id_penukaran,
            'id_penjualan' =>  null
        ]);

        $penukaran7 = $penukaran[6];
        Poin::factory()->create([
            'TotalPoin' => -30,
            'status' => 'penukaran',
            'id_pelanggan' =>  7,
            'id_penukaran' =>  $penukaran7->id_penukaran,
            'id_penjualan' =>  null
        ]);
        
        $penukaran8 = $penukaran[7];
        Poin::factory()->create([
            'TotalPoin' => -30,
            'status' => 'penukaran',
            'id_pelanggan' =>  1,
            'id_penukaran' =>  $penukaran8->id_penukaran,
            'id_penjualan' =>  null
        ]);

        $penukaran9 = $penukaran[8];
        Poin::factory()->create([
            'TotalPoin' => -40,
            'status' => 'penukaran',
            'id_pelanggan' =>  3,
            'id_penukaran' =>  $penukaran9->id_penukaran,
            'id_penjualan' =>  null
        ]);

        $penjualan3 = $penjualan[2];
        Poin::factory()->create([
            'TotalPoin' => 10,
            'status' => 'penambahan',
            'id_pelanggan' =>  3,
            'id_penukaran' =>  null,
            'id_penjualan' => $penjualan3->id_penjualan,
        ]);

        $penjualan2 = $penjualan[1];
        Poin::factory()->create([
            'TotalPoin' => 10,
            'status' => 'penambahan',
            'id_pelanggan' =>  2,
            'id_penukaran' =>  null,
            'id_penjualan' =>  $penjualan2->id_penjualan,
        ]);

        $penukaran10 = $penukaran[9];
        Poin::factory()->create([
            'TotalPoin' => -50,
            'status' => 'penukaran',
            'id_pelanggan' =>  4,
            'id_penukaran' =>  $penukaran10->id_penukaran,
            'id_penjualan' =>  null
        ]);

        $penjualan1 = $penjualan[0];
        Poin::factory()->create([
            'TotalPoin' => 10,
            'status' => 'penambahan',
            'id_pelanggan' =>  1,
            'id_penukaran' =>  null,
            'id_penjualan' => $penjualan1->id_penjualan,
        ]);
    }
}
