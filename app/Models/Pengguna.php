<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable; 

class Pengguna extends Authenticatable 
{
    use HasFactory, Notifiable;
    protected $table = 'pengguna';
    protected $primaryKey = 'id';
    // protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];
    // protected $dates = ['deleted_at'];
    protected $fillable = ['namaPengguna', 'noHP', 'username', 'password', 'id_role'];

    protected $hidden = [
        'password',
    ];
}