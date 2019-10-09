<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    protected $fillable = [
        'section',
        'content',
        'elim'
    ];
    
    protected $casts = [
        'content' => 'array',
    ];
}
