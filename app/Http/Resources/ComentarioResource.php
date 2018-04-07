<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ComentarioResource extends Resource
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
            'autor' => $this->autor,
            'descripcion' => $this->descripcion,
            'validado' => $this->validado,
            'fk_libros' => $this->fk_libros,
        ];
    }
}
