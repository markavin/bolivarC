<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailpenjualan extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'detail_penjualan';

    // Specify the fillable fields
    protected $fillable = [
        'id_penjualan',
        'id_menu',
        'quantity',
        'harga',
        'subTotal',
    ];
    

    // Define the relationship with the Penjualan model
    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'id_penjualan');
    }

    // Define the relationship with the Menu model
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }
}