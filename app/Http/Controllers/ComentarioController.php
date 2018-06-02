<?php

namespace App\Http\Controllers;

use App\Comentario;
use App\Http\Resources\ComentarioResource;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comentarios = Comentario::all();
        return ComentarioResource::collection($comentarios);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comentario = Comentario::find($id);

        if (!$comentario) {
            $data = array(
                'status' => 'error',
                'message' => 'Comentario with id ' . $id . ' does not exist',
                'code' => 404,
            );
            return response()->json($data, 404);
        }

        return new ComentarioResource($comentario);
    }
}