<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';

    public function libros()
    {
        return $this->belongsToMany('App\Libro', 'libros_pedidos', 'fk_pedidos', 'fk_libros')
            ->withPivot('cantidad', 'precio')
            ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'fk_usuarios');
    }
}
