<?php

namespace App\Http\Controllers;

use App\Helpers\JwtAuth;
use App\Http\Resources\AutorResource;
use App\Http\Resources\LibroResource;
use App\Libro;
use Illuminate\Http\Request;
use Validator;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hash = $request->header('Authorization', null);
        $jwtAuth = new JwtAuth();
        $checkToken = $jwtAuth->checkToken($hash);
        if ($checkToken) {
            // Retrieve post data
            $json = $request->input('json', null);
            $params = json_decode($json);
            $params_array = json_decode($json, true);

            // Get identified user
            $user = $jwtAuth->checkToken($hash, true);

            $validator = Validator::make($params_array, [
                'isbn' => 'required',
                'precio' => 'required',
                'titulo' => 'required',
                'editorial' => 'required',
                'n_pags' => 'required',
                'atributos_extra' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->messages(), 400);
            }

            // Save Libro
            $libro = new Libro();
            $libro->isbn = $params->isbn;
            $libro->precio = $params->precio;
            $libro->titulo = $params->titulo;
            $libro->editorial = $params->editorial;
            $libro->n_pags = $params->n_pags;
            $libro->voto = 0;
            $libro->num_voto = 0;
            $libro->atributos_extra = json_encode($params->atributos_extra);

            $libro->save();

            $data = array(
                'libro' => $libro,
                'status' => 'success',
                'message' => 'new Libro inserted successfuly',
                'code' => 200,
            );

            return response()->json($data);
        } else {
            $data = array(
                'message' => 'Not authenticated. Could not insert new Libro',
                'status' => 'error',
                'code' => 400,
            );
            return response()->json($data, 400);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libro = Libro::find($id);

        if (!$libro) {
            return response([], 404);
        }
        return new LibroResource($libro);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     *
     */
    public function getAutoresFromLibro($id)
    {
        $libro = Libro::find($id);
        if (!$libro) {
            return response([], 404);
        }
        return AutorResource::collection($libro->autores);
    }
}
