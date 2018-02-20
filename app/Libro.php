<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table = 'libros';

    public function autores()
    {
        return $this->belongsToMany('App\Autor', 'libros_autores')->withPivot('fecha')->withTimestamps();
    }

    public function fotos()
    {
        return $this->hasMany('App\Foto');
    }

    public function pedidos()
    {
        return $this->belongsToMany('App\Autor', 'libros_autores')->withPivot('cantidad', 'fecha')->withTimestamps();
    }
}
