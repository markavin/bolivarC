<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penukaran extends Model
{
    use HasFactory;
    protected $table = 'penukaran';
    protected $guarded = ['penukaran', 'created_at'];
}