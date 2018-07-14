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

Route::get('/', 'HomeController@show')->name('home');

// Libros
Route::get('/libros/list', 'LibroController@list')->name('libros.list');
Route::get('/libros/list/{categoria}', 'LibroController@listCategoria')->name('libros.list.categoria');
Route::get('/libros/detail/{id}', 'LibroController@detail')->name('libros.detail');
Route::post('/comentario', array(
    'middleware' => 'auth',
    'uses' => 'ComentarioController@store',
));

// Autores
Route::get('/autores/list', 'AutorController@list')->name('autores.list');
Route::get('/autores/detail/{id}', 'AutorController@detail')->name('autores.detail');

// Cart
Route::get('/cart', 'CartController@list')->name('cart.list');
Route::post('/addToCart', 'CartController@add');   
Route::post('/addToCartAndOrder', 'CartController@addAndOrder');   
Route::post('/removeFromCart', 'CartController@remove');  
Route::get('/order', 'CartController@order')->name('order'); 

// Auth
Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
