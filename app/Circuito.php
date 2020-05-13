<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circuito extends Model
{
    public function pagina()
    {
        return $this->hasMany('App\Pagina');
    }
}
