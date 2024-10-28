<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelanggan::factory()->create([
            'NamaPelanggan' => 'Mona',
            'NoHP' => '081396784511',
            'totalPoin' => 10
        ]);

        Pelanggan::factory()->create([
            'NamaPelanggan' => 'Frengky',
            'NoHP' => '081265874599',
            'totalPoin' => 25
        ]);
        Pelanggan::factory()->create([
            'NamaPelanggan' => 'Jesica',
            'NoHP' => '081244568736',
            'totalPoin' => 20
        ]);
        Pelanggan::factory()->create([
            'NamaPelanggan' => 'Alvin',
            'NoHP' => '081324569874',
            'totalPoin' => 40
        ]);
        Pelanggan::factory()->create([
            'NamaPelanggan' => 'Felix',
            'NoHP' => '082146895377',
            'totalPoin' => 30
        ]);
        Pelanggan::factory()->create([
            'NamaPelanggan' => 'Evan',
            'NoHP' => '085248771242',
            'totalPoin' => 10
        ]);
        Pelanggan::factory()->create([
            'NamaPelanggan' => 'Fransiska',
            'NoHP' => '081245794104',
            'totalPoin' => 30
        ]);
        Pelanggan::factory()->create([
            'NamaPelanggan' => 'Fenia',
            'NoHP' => '082354961348',
            'totalPoin' => 25
        ]);
        Pelanggan::factory()->create([
            'NamaPelanggan' => 'Fizi',
            'NoHP' => '081453165521',
            'totalPoin' => 10
        ]);
        Pelanggan::factory()->create([
            'NamaPelanggan' => 'Meimei',
            'NoHP' => '081320145671',
            'totalPoin' => 10
        ]);
    }
}
