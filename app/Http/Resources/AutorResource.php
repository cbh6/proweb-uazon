<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class AutorResource extends Resource
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
            'nombre' => $this->nombre,
            'foto' => $this->foto,
        ];
    }
}
