<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $table = 'fotos';

    public function libro()
    {
        return $this->belongsTo('App\Libro', 'fk_libro');
    }
}
