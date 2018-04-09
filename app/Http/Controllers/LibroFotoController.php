<?php

namespace App\Http\Controllers;

use App\Foto;
use App\Http\Resources\FotoResource;
use App\Libro;
use Illuminate\Http\Request;
use Validator;

class LibroFotoController extends Controller
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
        return FotoResource::collection($libro->fotos()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idLibro)
    {

        // Retrieve post data
        $json = $request->input('json', null);
        $params = json_decode($json);
        $params_array = json_decode($json, true);

        $validator = $this->validator($params_array);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        $libro = Libro::find($idLibro);

        if (!$libro) {
            $message = 'Libro with id ' . $idLibro . ' does not exist';
            return $this->respondNotFound($message);
        }
        if ($libro->fotos()->where('orden', $params->orden)->first()) {
            $message = 'Foto with orden ' . $params->orden . ' already exist';
            return $this->respondNotFound($message);
        }

        // Save Libro
        $foto = new Foto();
        $foto->orden = $params->orden;
        $foto->path_foto = $params->path_foto;

        $libro->fotos()->save($foto);

        $data = array(
            'foto' => $foto,
            'status' => 'success',
            'message' => 'new Foto inserted successfuly',
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
    public function destroy($idLibro, $idFoto)
    {
        $libro = Libro::find($idLibro);

        if (!$libro) {
            $message = 'Libro with id ' . $idLibro . ' does not exist';
            return $this->respondNotFound($message);
        }

        $foto = $libro->fotos()->find($idFoto);

        if (!$foto) {
            $message = 'Foto with id ' . $idFoto . ' does not exist for Libro ' . $idLibro;
            return $this->respondNotFound($message);
        }

        $foto->delete();

        $data = array(
            'foto' => $foto,
            'status' => 'success',
            'message' => 'Foto deleted successfuly',
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
            'orden' => 'required',
            'path_foto' => 'required',
        ]);
    }
}
