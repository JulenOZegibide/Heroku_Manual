<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    public function bloque()
    {
        return $this->hasMany('App\Bloque');
    }
    public function circuito()
    {
        return $this->belongsTo('App\Circuito');
    }
}
