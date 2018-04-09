<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table = 'libros';

    public function autores()
    {
        return $this->belongsToMany('App\Autor', 'libros_autores', 'fk_libros', 'fk_autores')
            ->withPivot('fecha')
            ->withTimestamps();
    }

    public function fotos()
    {
        return $this->hasMany('App\Foto', 'fk_libros');
    }

    public function comentarios()
    {
        return $this->hasMany('App\Comentario', 'fk_libros');
    }

    public function pedidos()
    {
        return $this->belongsToMany('App\Pedido', 'libros_pedidos', 'fk_libros', 'fk_pedidos')
            ->withPivot('cantidad', 'precio')
            ->withTimestamps();
    }
}
