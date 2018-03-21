<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';

    public function ciudad()
    {
        return $this->belongsTo('App\Ciudad', 'fk_ciudades');
    }
}
