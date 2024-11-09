<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'pelanggan'; // Nama tabel
    protected $guarded = ['id']; // Hanya menjaga kolom 'id' agar tidak diisi massal
    // protected $dates = ['deleted_at']; // Menggunakan SoftDeletes untuk 'deleted_at'

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'id_pelanggan', 'id'); // Hubungan hasMany
    }
}