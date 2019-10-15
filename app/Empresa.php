<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = "empresa";

    protected $guarded = [];
    protected $fillable = [
        'email',
        'phone',
        'domicile',
        'social_networks',
        'images',
        'metadata',
        'form',
        'sections',
        'schedule',
        'footer'
    ];
    
    protected $casts = [
        'email' => 'array',
        'phone' => 'array',
        'domicile' => 'array',
        'social_networks' => 'array',
        'images' => 'array',
        'metadata' => 'array',
        'form' => 'array',
        'sections' => 'array',
        'schedule' => 'array',
        'footer' => 'array'
    ];
}
