<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentacion extends Model
{
    protected $table = "documentaciones";

    protected $fillable = [
        "order",
        "cover",
        "file",
        "title",
        "elim"
    ];
    
    protected $casts = [
        'cover' => 'array',
        'file' => 'array',
    ];
}
