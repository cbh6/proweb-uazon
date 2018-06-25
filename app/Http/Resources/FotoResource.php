<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class FotoResource extends Resource
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
            'fk_libros' => $this->fk_libros,
            'orden' => $this->orden,
            'path_foto' => $this->path_foto,
            // 'createdAt' => $this->created_at,
            // 'updatedAt' => $this->updated_at,
        ];
    }
}
