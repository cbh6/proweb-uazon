<?php

namespace App\Http\Controllers;

use App\Libro;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $libro = Libro::find($request->libro_id);
        $qty = $request->qty;
        Cart::add($libro->id, $libro->titulo, intval($qty), $libro->precio);

        $response = array(
            'status' => 'success',
            'msg' => 'Libro añadido a la cesta correctamente',
            'total' => Cart::total(),
            'items' => Cart::count(),
        );
        return response()->json($response);
    }
}
