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
/**
 * Rutes relacionades amb la informació dels perfils dels usuaris
 */
    Route::get('/homeTreballador', 'TreballadorController@show');
    Route::get('/homeEmpresa', 'EmpresaController@show');
    Route::get('/perfil', 'perfil@show');
    Route::get('/editarPerfil', 'editarPerfil@show');
    Route::put('/editarPerfil', 'editarPerfil@editar');
    Route::get('/canviarContrassenya', 'canviarContrassenyaController@show');
    Route::put('/canviarContrassenya', 'canviarContrassenyaController@editar');
    Route::get('/perfilAlie/{id}', 'perfil@showOther');
/**
 * Rutes relacionades amb la creacio, vista, i modificació de les ofertes de treball
 */
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
    Route::get('/ofertesAjax', 'ofertaController@mostraOfertesAjax');//Ajax
    Route::post('/ofertesAjaxSeguir/{id}', 'ofertaController@seguirAjax');//Ajax
    Route::get('/ofertesSectorZona', 'ofertaController@mostraOfertesSector');
    //Mostrar ofertes de les empreses que segueixo
    Route::get('/ofertesSeguitsAjax', 'seguidorController@mostraOfertesSeguitsAjax');//Ajax
    Route::delete('/ofertesAjaxBorrar/{id}', 'seguidorController@esborrarAjax');//Ajax
    Route::get('/ofertesSeguits', 'seguidorController@mostraOfertesSeguits');

/**
 * Rutes relacionades amb el sistema de missatgeria via mail
 */
    //Formulari en relació a una oferta
    Route::get('/formMail/{id}','mailController@index');
    //Ruta per enviar el correu en relació a una oferta
    Route::post('/send','mailController@send');
    //Mostrar i eliminar els missatges que he enviat a les empreses
    Route::get('/correusEnviats', 'mailController@show');
    Route::get('/correusEnviatsEmpresa', 'mailController@show2');
    Route::get('/correusEnviatsAjax', 'mailController@rebreCorreus');//Ajax
    Route::delete('/esborrarMissatge/{id}', 'mailController@esborrarMissatge');//Ajax

    //Formulari de contacte comú
    Route::get('/formulariContacte/{id}','mailController@index2');
    //Ruta per enviar el correu de contacte
    Route::post('/enviar','mailController@enviar');

/**
 * Rutes relacionades amb l'apartat de buscadors
 */
    Route::get('/buscarTreballadors','cercadorController@showTreballadors');
    Route::get('/buscarEmpreses','cercadorController@showEmpreses');
    Route::get('/obtenirTreballadors','cercadorController@getTreballadorsAjax');//Ajax
    Route::get('/obtenirEmpreses','cercadorController@getEmpresesAjax');//Ajax

});
