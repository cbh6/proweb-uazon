<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth.jwt']], function () {
    Route::apiResource('libros', 'LibroController');
    Route::apiResource('autores', 'AutorController');
    Route::apiResource('pedidos', 'PedidoController', ['only' => ['index', 'show', 'destroy']]);
    Route::apiResource('usuarios', 'UserController', ['only' => ['index', 'show', 'update', 'destroy']]);
    Route::apiResource('comentarios', 'ComentarioController', ['only' => ['index', 'show', 'update', 'destroy']]);
    
    /*
    Route::get('/autores/{id}/libros', 'AutorController@getLibrosFromAutor');
    Route::get('/libros/{id}/autores', 'LibroController@getAutoresFromLibro');
     */

    // Recursos anidados
    Route::apiResource('libros.autores', 'LibroAutorController', ['only' => ['index', 'update', 'destroy']]);
    Route::apiResource('libros.comentarios', 'LibroComentarioController', ['only' => ['index', 'show', 'update', 'destroy']]);
    Route::apiResource('libros.fotos', 'LibroFotoController', ['only' => ['index', 'store', 'destroy']]);
    
    Route::post('/addFoto', 'LibroController@addFoto'); // No se usa. Tenemos el endpoint anterior
});
Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');
