<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'role';
    // protected $primaryKey = 'id';
    // protected $guarded = ['id'];
    // protected $casts = [
    //     'id' => 'integer',
    // ];
    protected $fillable = [
        'namaRole', // Pastikan nama kolom sesuai dengan tabel Anda
    ];


    public function pengguna()
    {
        // Menghubungkan foreign key di tabel pengguna ('id_role') dengan local key di tabel role ('id')
        return $this->hasMany(Pengguna::class, 'id_role');
    }
}