<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class LibroResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'isbn' => $this->isbn,
            'voto' => $this->voto,
            'num_voto' => $this->num_voto,
            'n_pags' => $this->n_pags,
            'precio' => $this->precio,
            'titulo' => $this->titulo,
            'editorial' => $this->editorial,
            'atributos_extra' => $this->atributos_extra,
            'autores' => AutorResource::collection($this->autores),
            'cantidad' => $this->whenPivotLoaded('libros_pedidos', function () {
                return $this->pivot->cantidad;
            }),
        ];
    }
}
