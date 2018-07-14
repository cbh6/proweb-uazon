<?php

namespace App\Http\Controllers;

use App\Autor;
use App\Http\Resources\AutorResource;
use App\Libro;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;

class LibroAutorController extends Controller
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
        return AutorResource::collection($libro->autores()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idLibro, $idAutor)
    {
        // Retrieve post data
        $json = $request->input('json', null);
        $params = json_decode($json);
        $params_array = json_decode($json, true);

        // $validator = $this->validator($params_array);

        // if ($validator->fails()) {
        //     return response()->json($validator->messages(), 400);
        // }

        // Find libro
        $libro = Libro::find($idLibro);

        if (!$libro) {
            $message = 'Libro with id ' . $idLibro . ' does not exist';
            return $this->respondNotFound($message);
        }

        // Find Autor
        $autor = Autor::find($idAutor);

        if (!$autor) {
            $message = 'Autor with id ' . $idAutor . ' does not exist';
            return $this->respondNotFound($message);
        }

        if ($libro->autores->contains($idAutor)) {
            $message = 'Autor and Libro already attached';
            return $this->respondWithError($message);
        }

        // $fecha = Carbon::createFromFormat('Y-m-d', $params->fecha);
        // $fecha = Carbon::now()->format('Y-m-d');
        $libro->autores()->detach();
        $libro->autores()->attach($idAutor);

        $data = array(
            'libro' => $libro,
            'autor' => $autor,
            'status' => 'success',
            'message' => 'Libro and Autor attached successfuly',
            'code' => 200,
        );

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idLibro, $idAutor)
    {

        // Find libro
        $libro = Libro::find($idLibro);

        if (!$libro) {
            $message = 'Libro with id ' . $idLibro . ' does not exist';
            return $this->respondNotFound($message);
        }

        // Find Autor
        $autor = Autor::find($idAutor);

        if (!$autor) {
            $message = 'Autor with id ' . $idAutor . ' does not exist';
            return $this->respondNotFound($message);
        }

        if (!$libro->autores->contains($idAutor)) {
            $message = 'Autor and Libro are not attached';
            return $this->respondWithError($message);
        }

        $libro->autores()->detach($idAutor);

        $data = array(
            'libro' => $libro,
            'autor' => $autor,
            'status' => 'success',
            'message' => 'Libro and Autor detached successfuly',
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
    private function respondWithError($message)
    {
        $data = array(
            'status' => 'error',
            'message' => $message,
            'code' => 400,
        );
        return response()->json($data, 400);
    }

    /**
     *
     */
    private function validator($data)
    {
        return Validator::make($data, [
            'fecha' => 'required|date_format:Y-m-d',
        ]);
    }
}
