<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    protected $fillable = [
        //'familia_id',
        'order',
        'image',
        'title',
        'elim'
    ];
    
    protected $casts = [
        'image' => 'array',
    ];

    public function familias() {
        return $this->hasMany( 'App\Familia' , 'familia_id' );
    }
    public function productos() {
        return $this->hasMany( 'App\Producto' , 'familia_id' );
    }
}
