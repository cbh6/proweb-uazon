<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Route::get('/', function () {

//     $libros = Libro::all();
//     $fotos = Foto::all();
//     foreach ($fotos as $foto) {
//         echo $foto->libro->titulo . '<br/>';
//     }

//     return view('welcome');
// });

Route::get('/', 'HomeController@show')->name('home');
Route::get('/libros/list', 'LibroController@list')->name('list');
Route::get('/libros/detail', 'LibroController@list')->name('detail');

Auth::routes();

