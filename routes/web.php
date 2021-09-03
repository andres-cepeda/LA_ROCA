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

Route::resource('eps','EpsController')->middleware('miautenticacion');
Route::get('eps/{eps}/estado', 'EpsController@estado')->middleware('miautenticacion');


Route::resource('cliente','ClienteController')->middleware('miautenticacion');
Route::get('cliente/{cliente}/estado', 'ClienteController@estado')->middleware('miautenticacion');


Route::resource('empleado','EmpleadoController')->middleware('miautenticacion');
Route::get('empleado/{empleado}/estado', 'EmpleadoController@estado')->middleware('miautenticacion');


Route::resource('usuario','UsuarioController')->middleware('miautenticacion');
Route::get('usuario/{usuario}/estado', 'UsuarioController@estado')->middleware('miautenticacion');

//Rutas de autenticacion
Route::get('login', 'Auth\LoginController@form');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');

Route::resource('Productos', 'ProductosController')->middleware('miautenticacion');
Route::resource('Marcas', 'MarcaController')->middleware('miautenticacion');
Route::resource('Categorias', 'CategoriaController')->middleware('miautenticacion');

Route::get('Productos/{idProd}/inactivar', 'ProductosController@inactivar' )->middleware('miautenticacion');
Route::get('Marcas/{idMar}/inactivar', 'MarcaController@inactivar' )->middleware('miautenticacion');
Route::get('Categorias/{idCat}/inactivar', 'CategoriaController@inactivar' )->middleware('miautenticacion');

Route::get('Vista', 'ProductosController@vista' );




