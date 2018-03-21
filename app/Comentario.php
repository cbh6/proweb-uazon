<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentarios';

    public function libro()
    {
        return $this->belongsTo('App\Libro', 'fk_libros');
    }
}
