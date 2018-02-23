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
	return view('welcome');
});
Route::get('nombre/{nombre}/apellido/{apellido}', function ($nombre, $apellido) {
    echo $nombre;
    echo $apellido;
})->name('nombre');
Route::group(['prefix' => '/mantenedores', 'middleware' => ['auth','checkRole:admin']], function () {
    Route::resource('/proveedores', 'ProveedorController');
    Route::resource('/categoria', 'CategoriaController');
    Route::resource('/usuarios', 'UsuariosController');
    Route::resource('/productos', 'ProductoController');
});
Route::resource('/documentos', 'DocumentoController');


Auth::routes();

Route::get('social/login', 'Auth\LoginSocialController@redirectToProvider')->name('social.login');
Route::get('google/callback', 'Auth\LoginSocialController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home');
