<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'familia_id',
        'destacado',
        'argentina',
        'order',
        'file',
        'details',
        'content',
        'title',
        'metadata',
        'elim'
    ];
    
    protected $casts = [
        'file' => 'array',
        'content' => 'array',
        'details' => 'array'
    ];
    public function images() {
        return $this->hasMany( 'App\Productoimage' , 'producto_id' );
    }
    public function familia() {
        return $this->belongsTo( 'App\Familia' );
    }
}
