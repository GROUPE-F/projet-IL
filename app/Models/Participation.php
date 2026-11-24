<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    protected $table = 'participations';

    public $timestamps = false;

    protected $fillable = [
        'utilisateur_id',
        'salon_id',
        'role',
        'muet',
        'banni',
        'date_arrivee',
    ];

    protected $casts = [
        'muet' => 'boolean',
        'banni' => 'boolean',
        'date_arrivee' => 'datetime',
    ];
}
