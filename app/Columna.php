<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Columna extends Model
{
    public function elemento()
    {
        return $this->hasMany('App\Elemento');
    }
    public function bloque()
    {
        return $this->belongsTo('App\Bloque');
    }
}
