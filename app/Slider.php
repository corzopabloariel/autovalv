<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'order',
        'content',
        'image',
        'section',
        'buttons',
        'elim'
    ];
    
    protected $casts = [
        'image' => 'array',
    ];
}