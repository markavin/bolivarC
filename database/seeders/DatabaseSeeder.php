<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BahanBaku;
use App\Models\Detailpembelian;
use App\Models\Penjualan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(PenggunaSeeder::class);
        $this->call(PelangganSeeder::class);
        $this->call(BahanBakuSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(PenukaranSeeder::class);
        $this->call(PenjualanSeeder::class);
        $this->call(DetailpenjualanSeeder::class);
        $this->call(PembelianSeeder::class);
        $this->call(DetailpembelianSeeder::class);
        $this->call(PoinSeeder::class);
        
    }
}