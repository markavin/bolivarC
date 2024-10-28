<?php

namespace Database\Seeders;

use App\Models\BahanBaku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BahanbakuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BahanBaku::factory()->create([
            'namaBahanbaku' => 'Biji kopi',
            'jumlahBahanbaku' => 5
        ]);
        Bahanbaku::factory()->create([
            'namaBahanbaku' => 'Susu',
            'jumlahBahanbaku' => 10
        ]);
        Bahanbaku::factory()->create([
            'namaBahanbaku' => 'Sirup pemanis',
            'jumlahBahanbaku' => 4
        ]);
        Bahanbaku::factory()->create([
            'namaBahanbaku' => 'Gula',
            'jumlahBahanbaku' => 2
        ]);
        Bahanbaku::factory()->create([
            'namaBahanbaku' => 'Ice cube',
            'jumlahBahanbaku' => 10
        ]);
        Bahanbaku::factory()->create([
            'namaBahanbaku' => 'Whipped cream',
            'jumlahBahanbaku' => 5
        ]);
        Bahanbaku::factory()->create([
            'namaBahanbaku' => 'Butter',
            'jumlahBahanbaku' => 5
        ]);
        Bahanbaku::factory()->create([
            'namaBahanbaku' => 'Madu',
            'jumlahBahanbaku' => 3
        ]);
        Bahanbaku::factory()->create([
            'namaBahanbaku' => 'Almond',
            'jumlahBahanbaku' => 2
        ]);
        Bahanbaku::factory()->create([
            'namaBahanbaku' => 'Garam',
            'jumlahBahanbaku' => 2
        ]);
    }
}
