<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';

    public function libros()
    {
        return $this->belongsToMany('App\Libro');
    }
}
