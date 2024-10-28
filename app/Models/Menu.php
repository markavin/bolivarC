<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class menu extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'menu';
    protected $guarded = ['id_menu', 'created_at', 'updated_at', 'deleted_at'];
    protected $dates = ['deleted_at'];
}