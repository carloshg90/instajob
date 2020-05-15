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
//Mostrar el perfil de un altre empresa
Route::get('/perfilAlie/{id}', 'perfil@showOther');
Route::get('/editarPerfil', 'editarPerfil@show');
Route::put('/editarPerfil', 'editarPerfil@editar');
Route::get('/canviarContrassenya', 'canviarContrassenyaController@show');
Route::put('/canviarContrassenya', 'canviarContrassenyaController@editar');
Route::get('/ofertes', 'ofertaController@show');
Route::put('/ofertes', 'ofertaController@crear');

Route::put('/ofertesCreades/{id}', 'ofertaController@editarOferta');
Route::delete('/ofertesCreades/{id}', 'ofertaController@borrarOferta');
Route::get('/editarOferta/{id}', 'ofertaController@showEditar');
Route::put('/editarOferta/{id}', 'ofertaController@editarOferta');

//Mostrar les meves ofertes
Route::get('/ofertesCreades', 'ofertaController@mevesOfertes');
Route::get('/ofertesCreadesAjax', 'ofertaController@mevesOfertesAjax');//Ajax
Route::delete('/esborrarMevaOferta/{id}', 'ofertaController@deleteOferta');//Ajax

//Mostrar ofertes de la zona
//OFERTACONTROLLER pertany a l'apartat de les ofertes per sector i zona
Route::get('/ofertesAjax', 'ofertaController@mostraOfertesAjax');//Ajax
Route::post('/ofertesAjaxSeguir/{id}', 'ofertaController@seguirAjax');//Ajax
Route::get('/ofertesSectorZona', 'ofertaController@mostraOfertesSector');

//Mostrar ofertes de les empreses que segueixo
//SEGUIDORCONTROLLER pertany a l'apartat de les ofertes de les empreses que segueixo
Route::get('/ofertesSeguitsAjax', 'seguidorController@mostraOfertesSeguitsAjax');//Ajax
Route::delete('/ofertesAjaxBorrar/{id}', 'seguidorController@esborrarAjax');//Ajax
Route::get('/ofertesSeguits', 'seguidorController@mostraOfertesSeguits');

//Ruta fer el formuari de enviament
Route::get('/formMail/{id}','mailController@index');
//Ruta per enviar el correu
Route::post('/send','mailController@send');

//Mostrar els missatges que he enviat a les empreses
//Missatgescontroller
Route::get('/correusEnviats', 'mailController@show');
Route::get('/correusEnviatsAjax', 'mailController@rebreCorreus');//Ajax
Route::delete('/esborrarMissatge/{id}', 'mailController@esborrarMissatge');//Ajax

//Rutes per els buscadors
Route::get('/buscarTreballadors','cercadorController@showTreballadors');
Route::get('/buscarEmpreses','cercadorController@showEmpreses');
});
