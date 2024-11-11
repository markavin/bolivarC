<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Penukaran extends Model
{
    use HasFactory;

    protected $table = 'penukaran';
    protected $primaryKey = 'id_penukaran';
    public $incrementing = false;
    protected $keyType = 'string';

    // Add the fields to the fillable property
    protected $fillable = [
        'id_pelanggan',
        'id_menu',
        'total_penukaranPoin',
        'tanggal_penukaran',
    ];

    // Relationships
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }

    // Automatic UUID generation on create
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function poin()
    {
        return $this->hasMany(Poin::class, 'id_penukaran');
    }
}
