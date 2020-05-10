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

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::get('/politicaPrivacitat', 'politicaPrivacitat@show');

//Rutes que només son accessibles si estem loguejats
Route::group(['middleware' => 'auth'], function() {
Route::get('/home', 'HomeController@index');
Route::get('/homeTreballador', 'TreballadorController@show');
Route::get('/homeEmpresa', 'EmpresaController@show');
Route::get('/perfil', 'perfil@show');
Route::get('/editarPerfil', 'editarPerfil@show');
Route::put('/editarPerfil', 'editarPerfil@editar');
Route::get('/canviarContrassenya', 'canviarContrassenyaController@show');
Route::put('/canviarContrassenya', 'canviarContrassenyaController@editar');
Route::get('/ofertes', 'ofertaController@show');
Route::put('/ofertes', 'ofertaController@crear');
Route::get('/ofertesCreades', 'ofertaController@mevesOfertes');
Route::put('/ofertesCreades/{id}', 'ofertaController@editarOferta');
Route::delete('/ofertesCreades/{id}', 'ofertaController@borrarOferta');
Route::get('/editarOferta/{id}', 'ofertaController@showEditar');
Route::put('/editarOferta/{id}', 'ofertaController@editarOferta');
//Mostrar ofertes de la zona
Route::get('/ofertesSectorZona', 'ofertaController@mostraOfertesSector');
Route::put('/ofertesSectorZona/{id}', 'seguidorController@seguirZona');
Route::delete('/ofertesSectorZona/{id}', 'seguidorController@noSeguirZona');
//Mostrar ofertes de les empreses que segueixo
Route::get('/ofertesSeguits', 'ofertaController@mostraOfertesSeguits');
Route::put('/ofertesSeguits/{id}', 'seguidorController@seguirSeguits');
Route::delete('/ofertesSeguits/{id}', 'seguidorController@noSeguirSeguits');
});
