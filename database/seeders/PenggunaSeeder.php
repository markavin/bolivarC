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
            'username' => 'anton123',  // Pastikan username unik
            'noHP' => '081266784511',
            'password' => bcrypt('pemilik123'),
            'id_role' => 1,
        ]);
        Pengguna::factory()->create([
            'namaPengguna' => 'Yogi',
            'username' => 'yogi123',  // Pastikan username unik
            'noHP' => '081266784511',
            'password' => bcrypt('Yogi123'),
            'id_role' => 2,
        ]);
        Pengguna::factory()->create([
            'namaPengguna' => 'Rio',
            'username' => 'rio123',
            'noHP' => '081365874599',
            'password' => bcrypt('Rio123'),
            'id_role' => 2,
        ]);
        Pengguna::factory()->create([
            'namaPengguna' => 'Yoga',
            'username' => 'yoga123',
            'noHP' => '081544568736',
            'password' => bcrypt('Yoga123'),
            'id_role' => 2,
        ]);
        Pengguna::factory()->create([
            'namaPengguna' => 'Kevin',
            'username' => 'kevin123',
            'noHP' => '081124569874',
            'password' => bcrypt('Kevin123'),
            'id_role' => 2,

        ]);
        Pengguna::factory()->create([
            'namaPengguna' => 'Syahrul',
            'username' => 'syahrul123',
            'noHP' => '082246895377',
            'password' => bcrypt('Syahrul123'),
            'id_role' => 2,
        ]);
        Pengguna::factory()->create([
            'namaPengguna' => 'Bintang',
            'username' => 'bintang123',
            'noHP' => '08128771242',
            'password' => bcrypt('Bintang123'),
            'id_role' => 2,
        ]);
        Pengguna::factory()->create([
            'namaPengguna' => 'Ehsan',
            'username' => 'ehsan123',
            'noHP' => '081545794104',
            'password' => bcrypt('Ehsan123'),
            'id_role' => 2,
        ]);
        Pengguna::factory()->create([
            'namaPengguna' => 'Yohanes',
            'username' => 'yohanes123',
            'noHP' => '081396397845',
            'password' => bcrypt('Yohanes123'),
            'id_role' => 2,
        ]);
        Pengguna::factory()->create([
            'namaPengguna' => 'Rangga',
            'username' => 'rangga123',
            'noHP' => '081244569853',
            'password' => bcrypt('Rangga123'),
            'id_role' => 2,
        ]);
    }
}
