<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bloque extends Model
{
    public function columna()
    {
        return $this->hasMany('App\Columna');
    }
    public function pagina()
    {
        return $this->belongsTo('App\Pagina');
    }
}
