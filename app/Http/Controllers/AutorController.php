<?php

namespace App\Http\Controllers;

use App\Autor;
use App\Http\Resources\AutorResource;
use App\Http\Resources\LibroResource;
use App\Libro;
use Illuminate\Http\Request;
use Validator;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autores = Autor::all();
        return AutorResource::collection($autores);
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

        // Save Autor
        $autor = new Autor();
        $autor->nombre = $params->nombre;
        $autor->foto = $params->foto;

        $autor->save();

        $data = array(
            'autor' => $autor,
            'status' => 'success',
            'message' => 'new Autor inserted successfuly',
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
        $autor = Autor::find($id);

        if (!$autor) {
            return response([], 404);
        }
        return new AutorResource($autor);
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

        // Update Autor
        $autor = Autor::find($id);

        if ($autor) {
            $autor->nombre = $params->nombre;
            $autor->foto = $params->foto;
            $autor->save();
            $data = array(
                'autor' => $autor,
                'status' => 'success',
                'message' => 'Autor updated successfuly',
                'code' => 200,
            );
            return response()->json($data);
        } else {
            $data = array(
                'status' => 'error',
                'message' => 'Autor with id ' . $id . ' does not exist',
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
        $autor = Autor::find($id);

        if ($autor) {
            $autor->delete();
            $data = array(
                'autor' => $autor,
                'status' => 'success',
                'message' => 'Autor with id ' . $id . ' deleted successfuly',
                'code' => 200,
            );
            return response()->json($data);
        } else {
            $data = array(
                'status' => 'error',
                'message' => 'Autor with id ' . $id . ' does not exist',
                'code' => 404,
            );
            return response()->json($data, 404);
        }
    }

    /**
     *
     */
    public function getLibrosFromAutor($id)
    {
        $autor = Autor::find($id);
        if (!$autor) {
            return response([], 404);
        }
        return LibroResource::collection($autor->libros);
    }

    /**
     *
     */
    private function validator($data)
    {
        return Validator::make($data, [
            'nombre' => 'required',
            'foto' => 'required',
        ]);
    }

    // WEB METHODS --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------

    function list() {
        $autores = Autor::orderBy('nombre', 'asc')->paginate(9);
        return view('autores.list', array(
            'autores' => $autores,
            'seo_title' => 'Autores',
        ));
    }

    public function detail($autor_id)
    {
        $autor = Autor::find($autor_id);
        // $libros = Libro::where('autor', $autor->id)->offset(0)->limit(8)->get();

        $libros = Libro::whereHas('autores', function ($query) use ($autor) {
            $query->where('id', $autor->id);
        })->get();
        return view('autores.detail', array(
            'autor' => $autor,
            'libros' => $libros,
            'seo_title' => $autor->nombre,
        ));
    }
}
