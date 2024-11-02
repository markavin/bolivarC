<?php

namespace Database\Seeders;

use App\Models\Penukaran;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenukaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penukaran::factory()->create([
            'total_penukaranPoin' => -50,
            'tanggal_penukaran' => Carbon::create(2024, 9, 2),
            'id_pelanggan' =>  3,
            'id_menu' =>  1
        ]);
        Penukaran::factory()->create([
            'total_penukaranPoin' => -40,
            'tanggal_penukaran' => Carbon::create(2024, 9, 6),
            'id_pelanggan' =>  6,
            'id_menu' =>  5
        ]);

        Penukaran::factory()->create([
            'total_penukaranPoin' => -40,
            'tanggal_penukaran' => Carbon::create(2024, 9, 8),
            'id_pelanggan' =>  5,
            'id_menu' =>  6
        ]);
        Penukaran::factory()->create([
            'total_penukaranPoin' => -40,
            'tanggal_penukaran' => Carbon::create(2024, 9, 10),
            'id_pelanggan' =>  10,
            'id_menu' =>  2
        ]);

        Penukaran::factory()->create([
            'total_penukaranPoin' => -40,
            'tanggal_penukaran' => Carbon::create(2024, 9, 13),
            'id_pelanggan' =>  9,
            'id_menu' =>  5
        ]);

        Penukaran::factory()->create([
            'total_penukaranPoin' => -25,
            'tanggal_penukaran' => Carbon::create(2024, 9, 14),
            'id_pelanggan' =>  2,
            'id_menu' =>  10
        ]);
        Penukaran::factory()->create([
            'total_penukaranPoin' => -30,
            'tanggal_penukaran' => Carbon::create(2024, 9, 23),
            'id_pelanggan' =>  7,
            'id_menu' =>  9
        ]);
        Penukaran::factory()->create([
            'total_penukaranPoin' => -30,
            'tanggal_penukaran' => Carbon::create(2024, 9, 30),
            'id_pelanggan' =>  1,
            'id_menu' =>  7
        ]);
        Penukaran::factory()->create([
            'total_penukaranPoin' => -40,
            'tanggal_penukaran' => Carbon::create(2024, 10, 9),
            'id_pelanggan' =>  3,
            'id_menu' =>  6
        ]);
        Penukaran::factory()->create([
            'total_penukaranPoin' => -50,
            'tanggal_penukaran' => Carbon::create(2024, 11, 01),
            'id_pelanggan' =>  4,
            'id_menu' =>  1
        ]);
        
    }
}
