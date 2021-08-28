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



Route::resource('index', "mostrar_index");

Route::get ('esferos' , 'mostrar_esferos@esferos');

Route::resource('eps','EpsController');
Route::get('eps/{eps}/estado', 'EpsController@estado');


Route::resource('cliente','ClienteController');
Route::get('cliente/{cliente}/estado', 'ClienteController@estado');


Route::resource('empleado','EmpleadoController');
Route::get('empleado/{empleado}/estado', 'EmpleadoController@estado');


Route::resource('usuario','UsuarioController');
Route::get('usuario/{usuario}/estado', 'UsuarioController@estado');




