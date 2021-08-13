<?php

use Illuminate\Support\Facades\Route;

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


Route::group(['prefix' => 'usuario'], function()
{
    Route::get('/', 'UsuarioController@list');
    Route::get('/{idUsuario}', 'UsuarioController@info');
    Route::post('/', 'UsuarioController@add');
    Route::post('/{idUsuario}', 'UsuarioController@edit');

});

Route::resource('index', "mostrar_index");

Route::get ('esferos' , 'mostrar_esferos@esferos');

Route::resource('eps','EpsController');
Route::resource('cliente','ClienteController');
Route::resource('empleado','EmpleadoController');




