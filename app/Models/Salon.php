<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Salon extends Model
{
    protected $table = 'salons';

    public $timestamps = false;

    protected $fillable = [
        'nom',
        'visibilite',
        'mot_de_passe',
        'actif',
        'date_creation',
    ];

    protected $casts = [
        'actif' => 'boolean',
        'date_creation' => 'datetime',
    ];

    protected static function booted()
    {
        static::creating(function ($salon) {
            $salon->code = Str::upper(Str::random(8));
        });
    }
}
