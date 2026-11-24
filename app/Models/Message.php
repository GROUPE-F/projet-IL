<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    public $timestamps = false;

    protected $fillable = [
        'contenu',
        'date_envoi',
        'supprime',
    ];

    protected $casts = [
        'supprime' => 'boolean',
        'date_envoi' => 'datetime',
    ];
}
