<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class PedidoResource extends Resource
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
            'total' => $this->total,
            'fecha' => $this->fecha,
            'pagado' => $this->pagado,
            'total' => $this->total,
            'usuario' => UserResource::collection($this->user),
            'libros' => LibroResource::collection($this->libros),
        ];
    }
}
