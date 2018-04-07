<?php

namespace App\Http\Controllers;

use App\Http\Resources\ComentarioResource;
use App\Libro;
use Illuminate\Http\Request;
use Validator;

class LibroComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idLibro)
    {
        $libro = Libro::find($idLibro);

        if (!$libro) {
            $message = 'Libro with id ' . $idLibro . ' does not exist';
            return $this->respondNotFound($message);
        }
        return ComentarioResource::collection($libro->comentarios()->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idLibro, $idComentario)
    {
        // Find libro
        $libro = Libro::find($idLibro);

        if (!$libro) {
            $message = 'Libro with id ' . $idLibro . ' does not exist';
            return $this->respondNotFound($message);
        }

        // Find linked Comentario
        $comentario = $libro->comentarios()->find($idComentario);

        if (!$comentario) {
            $message = 'Comentario with id ' . $idComentario . ' does not exist for Libro ' . $idLibro;
            return $this->respondNotFound($message, 'Comentario');
        }

        return new ComentarioResource($comentario);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idLibro, $idComentario)
    {
        // Retrieve post data
        $json = $request->input('json', null);
        $params = json_decode($json);
        $params_array = json_decode($json, true);

        $validator = $this->validator($params_array);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        // Find libro
        $libro = Libro::find($idLibro);

        if (!$libro) {
            $message = 'Libro with id ' . $idLibro . ' does not exist';
            return $this->respondNotFound($message);
        }

        // Find and update linked Comentario
        $comentario = $libro->comentarios()->find($idComentario);

        if (!$comentario) {
            $message = 'Comentario with id ' . $idComentario . ' does not exist for Libro ' . $idLibro;
            return $this->respondNotFound($message, 'Comentario');
        }

        $comentario->autor = $params->autor;
        $comentario->descripcion = $params->descripcion;
        $comentario->validado = $params->validado;

        $comentario->save();

        $data = array(
            'comentario' => $comentario,
            'status' => 'success',
            'message' => 'Comentario updated successfuly',
            'code' => 200,
        );

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($idLibro, $idComentario)
    {
        $libro = Libro::find($idLibro);

        if (!$libro) {
            $message = 'Libro with id ' . $idLibro . ' does not exist';
            return $this->respondNotFound($message);
        }

        $comentario = $libro->comentarios()->find($idComentario);

        if (!$comentario) {
            $message = 'Comentario with id ' . $idComentario . ' does not exist for Libro ' . $idLibro;
            return $this->respondNotFound($message, 'Comentario');
        }

        $comentario->delete();

        $data = array(
            'comentario' => $comentario,
            'status' => 'success',
            'message' => 'Comentario deleted successfuly',
            'code' => 200,
        );

        return response()->json($data);
    }

    /**
     *
     */
    private function respondNotFound($message)
    {
        $data = array(
            'status' => 'error',
            'message' => $message,
            'code' => 404,
        );
        return response()->json($data, 404);
    }

    /**
     *
     */
    private function validator($data)
    {
        return Validator::make($data, [
            'autor' => 'required',
            'descripcion' => 'required',
            'validado' => 'required',
        ]);
    }
}
