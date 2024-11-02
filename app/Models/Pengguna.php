<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable; 

class Pengguna extends Authenticatable 
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'pengguna';

    protected $guarded = ['id_pengguna', 'created_at', 'updated_at', 'deleted_at'];

    protected $dates = ['deleted_at'];


    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function getAuthPassword()
    {
        return $this->kataSandi;
    }

    public function setKataSandiAttribute($value)
    {
        $this->attributes['kataSandi'] = bcrypt($value);
    }
}