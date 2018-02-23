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

Route::group(['prefix' => 'v1', 'middleware' => ['auth:api','checkRole:admin']], function () {
    Route::resource('categorias', 'Api\CategoriaController');
    Route::resource('categorias.productos', 'Api\CategoriaProductosController');
    Route::resource('documento', 'Api\DocumentoController');
    Route::resource('documento.detalles', 'Api\DocumentoDetalleController');
});