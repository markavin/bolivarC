<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailpembelian extends Model
{
    use HasFactory;
    protected $table = 'detail_pembelian';

    protected $fillable = [
        'id_pembelian',
        'id_bahanBaku',
        'quantity',
        'harga',
        'subTotal',
    ];

    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class, 'id_pembelian');
    }

    public function bahanBaku()
    {
        return $this->belongsTo(BahanBaku::class, 'id_bahanBaku');
    }
}