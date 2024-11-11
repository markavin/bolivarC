<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poin extends Model
{
    use HasFactory;

    protected $table = 'poin';

    // Tambahkan properti $fillable dengan nama atribut yang benar
    protected $fillable = [
        'id_pelanggan',
        'id_penjualan',
        'id_penukaran',
        'TotalPoin', // Pastikan nama ini sesuai dengan kolom di database
        'status',
    ];

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'id_penjualan');
    }

    public function penukaran()
    {
        return $this->belongsTo(Penukaran::class, 'id_penukaran');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }
}
