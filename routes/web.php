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

Route::get('/', function () {

});
Route::get('nombre/{nombre}/apellido/{apellido}', function ($nombre, $apellido) {
    echo $nombre;
    echo $apellido;
})->name('nombre');

Route::resource('/proveedores', 'ProveedorController');
Route::resource('/usuarios', 'UsuariosController');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
