<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelanggan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'pelanggan';
    protected $guarded = ['id_pelanggan', 'created_at', 'updated_at', 'deleted_at'];
    protected $dates = ['deleted_at'];
}