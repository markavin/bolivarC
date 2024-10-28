<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengguna::factory()->create([
            'namaPengguna' => 'anton',
            'noHP' => '081266784511',
            'katasandi' => 'pemilik123', 
            'role_id' => 1,
        ]);
        Pengguna::factory()->create([
            'namaPengguna' => 'Yogi',
            'noHP' => '081266784511',
            'katasandi' => 'Yogi123',
            'role_id' => 2,

        ]);
        Pengguna::factory()->create([
            'namaPengguna' => 'Rio',
            'noHP' => '081365874599',
            'katasandi' => 'Rio123',
            'role_id' => 2,
        ]);
        Pengguna::factory()->create([
            'namaPengguna' => 'Yoga',
            'noHP' => '081544568736',
            'katasandi' => 'Yoga123',
            'role_id' => 2,
        ]);
        Pengguna::factory()->create([
            'namaPengguna' => 'Kevin',
            'noHP' => '081124569874',
            'katasandi' => 'Kevin123',
            'role_id' => 2,
        ]);
        Pengguna::factory()->create([
            'namaPengguna' => 'Syahrul',
            'noHP' => '082246895377',
            'katasandi' => 'Syahrul123',
            'role_id' => 2,
        ]);
        Pengguna::factory()->create([
            'namaPengguna' => 'Bintang',
            'noHP' => '08128771242',
            'katasandi' => 'Bintang123',
            'role_id' => 2,
        ]);
        Pengguna::factory()->create([
            'namaPengguna' => 'Ehsan',
            'noHP' => '081545794104',
            'katasandi' => 'Ehsan123',
            'role_id' => 2,
        ]);
        Pengguna::factory()->create([
            'namaPengguna' => 'Yohanes',
            'noHP' => '081396397845',
            'katasandi' => 'Yohanes123',
            'role_id' => 2,
        ]);
        Pengguna::factory()->create([
            'namaPengguna' => 'Rangga',
            'noHP' => '081244569853',
            'katasandi' => 'Rangga123',
            'role_id' => 2,
        ]);
       
    }
}
