<?php

namespace App\Http\Controllers;

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
        $libros = Libro::all();
        return LibroResource::collection($libros);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Retrieve post data
        $json = $request->input('json', null);
        $params = json_decode($json);
        $params_array = json_decode($json, true);

        $validator = $this->validator($params_array);

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
        
        $atributos_extra = (!is_null($json) && isset($params->atributos_extra)) ? json_encode($params->atributos_extra) : json_encode(json_decode("{}"));
        $libro->atributos_extra = $atributos_extra;

        $libro->save();

        $data = array(
            'libro' => $libro,
            'status' => 'success',
            'message' => 'Libro insertado correctamente',
            'code' => 200,
        );

        return response()->json($data);

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Retrieve post data
        $json = $request->input('json', null);
        $params = json_decode($json);
        $params_array = json_decode($json, true);

        $validator = $this->validator($params_array);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        // Update Libro
        $libro = Libro::find($id);

        if ($libro) {
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
                'message' => 'Libro actualizado correctamente',
                'code' => 200,
            );
            return response()->json($data);
        } else {
            $data = array(
                'status' => 'error',
                'message' => 'El libro con id ' . $id . ' no existe',
                'code' => 404,
            );
            return response()->json($data, 404);
        }

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $libro = Libro::find($id);

        if ($libro) {
            $libro->delete();
            $data = array(
                'libro' => $libro,
                'status' => 'success',
                'message' => 'Libro con id ' . $id . ' borrado correctamente',
                'code' => 200,
            );
            return response()->json($data);
        } else {
            $data = array(
                'status' => 'error',
                'message' => 'El libro con id ' . $id . ' no existe',
                'code' => 404,
            );
            return response()->json($data, 404);
        }
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

    /**
     *
     */
    private function validator($data)
    {
        return Validator::make($data, [
            'isbn' => 'required',
            'precio' => 'required',
            'titulo' => 'required',
            'editorial' => 'required',
            'n_pags' => 'required',
            // 'atributos_extra' => 'required',
        ]);
    }
}
