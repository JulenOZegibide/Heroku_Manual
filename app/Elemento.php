<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Elemento extends Model
{
    public function columna()
    {
        return $this->belongsTo('App\Columna');
    }
}
