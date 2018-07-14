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
            'total' => Cart::subtotal(),
            'items' => Cart::count(),
        );
        return response()->json($response);
    }

    function list() {
        $pedido = [];
        foreach (Cart::content() as $row) {
            $libro = Libro::find($row->id);
            $linea_pedido = [];
            $linea_pedido["libro"] = $libro;
            $linea_pedido["cantidad"] = $row->qty;
            $linea_pedido["precio"] = $row->price;
            array_push($pedido, $linea_pedido);
        }
        return view('orders.cart', array(
            'pedido' => $pedido,
            'total' => Cart::subtotal(),
        ));
    }

    public function remove(Request $request)
    {
        $items = Cart::content()->where('id', $request->id);

        foreach ($items as $item => $value){
            Cart::remove($value->rowId);
        }

        $response = array(
            'status' => 'success',
            'msg' => 'Libro eliminado de la cesta correctamente',
            'total' => Cart::subtotal(),
            'items' => Cart::count(),
        );
        return response()->json($response);
    }

    function addAndOrder(Request $request) {
        $libro = Libro::find($request->libro_id);
        Cart::add($libro->id, $libro->titulo, 1, $libro->precio);    
        
        $response = array(
            'status' => 'success',
            'msg' => 'Libro añadido a la cesta correctamente',
            'total' => Cart::subtotal(),
            'items' => Cart::count(),
        );
        return response()->json($response);
        // $pedido = $this->getPedidoFromCart();
        // return view('orders.order_list', array(
        //     'pedido' => $pedido,
        //     'items' => Cart::count(),
        //     'total' => Cart::subtotal(),
        // ));
    }

    function order() {
        $pedido = $this->getPedidoFromCart();
        return view('orders.order_list', array(
            'pedido' => $pedido,
            'items' => Cart::count(),
            'total' => Cart::subtotal(),
        ));
    }

    function getPedidoFromCart() {
        $pedido = [];
        foreach (Cart::content() as $row) {
            $libro = Libro::find($row->id);
            $linea_pedido = [];
            $linea_pedido["libro"] = $libro;
            $linea_pedido["cantidad"] = $row->qty;
            $linea_pedido["precio"] = $row->price;
            array_push($pedido, $linea_pedido);
        }

        return $pedido;
    }
}
