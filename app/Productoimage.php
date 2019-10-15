<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productoimage extends Model
{
    protected $fillable = [
        'producto_id',
        'order',
        'image',
        'elim'
    ];
    
    protected $casts = [
        'image' => 'array'
    ];
}
