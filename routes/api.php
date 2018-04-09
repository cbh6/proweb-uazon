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
    Route::get('/autores/{id}/libros', 'AutorController@getLibrosFromAutor');
    Route::get('/libros/{id}/autores', 'LibroController@getAutoresFromLibro');

    // Comentarios
    // Como la clase principal es libro y un comentario no se puede crear si no le indicamos el libro,
    // entonces necesitaremos crear lo que se conoce como  "Recurso Anidado" de libros con comentarios.
    Route::apiResource('libros.comentarios', 'LibroComentarioController', ['only' => ['index', 'show', 'update', 'destroy']]);
    Route::apiResource('comentarios', 'ComentarioController', ['only' => ['index', 'show']]);

    // Fotos
    Route::apiResource('libros.fotos', 'LibroFotoController', ['only' => ['index', 'store', 'destroy']]);
});
Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');
