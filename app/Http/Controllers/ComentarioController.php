<?php

namespace App\Http\Controllers;

use App\Comentario;
use App\Http\Resources\ComentarioResource;
use Illuminate\Http\Request;

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comentario = Comentario::find($id);

        if ($comentario) {
            $comentario->delete();
            $data = array(
                'comentario' => $comentario,
                'status' => 'success',
                'message' => 'Comentario with id ' . $id . ' deleted successfuly',
                'code' => 200,
            );
            return response()->json($data);
        } else {
            $data = array(
                'status' => 'error',
                'message' => 'Comentario with id ' . $id . ' does not exist',
                'code' => 404,
            );
            return response()->json($data, 404);
        }
    }

    public function store(Request $request)
    {
        // $validate = $this->validate($request, [
        //     'body' => 'required',
        // ]);

        $user = \Auth::user();
        $comentario = new Comentario();
        $comentario->descripcion = $request->input('descripcion');
        $comentario->autor = $user->name;
        $comentario->fk_libros = $request->input('id_libro');
        $comentario->validado = 0;
        $comentario->save();
        return redirect()->route('libros.detail', ['id' => $request->input('id_libro')])->with('success', ['Comentario añadido correctamente']);
    }
}
