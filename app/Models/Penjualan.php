<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Penjualan extends Model
{
    use HasFactory;
    protected $table = 'penjualan';
    protected $primaryKey = 'id_penjualan';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_pelanggan',
        'id_menu',
        'tanggalPenjualan',
        'totalHarga',
        'totalBayar',
        'totalQuantity',
    ];
    // Define the relationship with the Pelanggan model
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }

    // Define the relationship with the Pengguna model
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }

    // Automatically generate UUID for `id_penjualan` when creating a new Penjualan
    protected static function boot()
    {
        parent::boot();

        // Mengisi UUID secara otomatis
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    // Relationship with DetailPenjualan model
    public function detailPenjualan()
    {
        return $this->hasMany(DetailPenjualan::class, 'id_penjualan');
    }
}