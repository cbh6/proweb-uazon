<?php

namespace App\Http\Controllers;

use App\Http\Resources\PedidoResource;
use App\Pedido;
use Illuminate\Http\Request;
use Validator;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();
        return PedidoResource::collection($pedidos);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Pedido::find($id);

        if (!$pedido) {
            return response([], 404);
        }
        return new PedidoResource($pedido);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedido = Pedido::find($id);

        if ($pedido) {
            $pedido->delete();
            $data = array(
                'pedido' => $pedido,
                'status' => 'success',
                'message' => 'Pedido con id ' . $id . ' borrado correctamente',
                'code' => 200,
            );
            return response()->json($data);
        } else {
            $data = array(
                'status' => 'error',
                'message' => 'El pedido con id ' . $id . ' no existe',
                'code' => 404,
            );
            return response()->json($data, 404);
        }
    }
}
