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
Route::get('/politicaPrivacitat', 'PoliticaPrivacitat@show');

//Rutes que només son accessibles si estem loguejats
Route::group(['middleware' => 'auth'], function() {
Route::get('/home', 'HomeController@index');
/**
 * Rutes relacionades amb la informació dels perfils dels usuaris
 */
    Route::get('/homeTreballador', 'TreballadorController@show');
    Route::get('/homeEmpresa', 'EmpresaController@show');
    Route::get('/perfil', 'Perfil@show');
    Route::get('/editarPerfil', 'EditarPerfil@show');
    Route::put('/editarPerfil', 'EditarPerfil@editar');
    Route::get('/canviarContrassenya', 'CanviarContrassenyaController@show');
    Route::put('/canviarContrassenya', 'CanviarContrassenyaController@editar');
    Route::get('/perfilAlie/{id}', 'Perfil@showOther');
/**
 * Rutes relacionades amb la creacio, vista, i modificació de les ofertes de treball
 */
    Route::get('/ofertes', 'OfertaController@show');
    Route::put('/ofertes', 'OfertaController@crear');
    Route::put('/ofertesCreades/{id}', 'OfertaController@editarOferta');
    Route::delete('/ofertesCreades/{id}', 'OfertaController@borrarOferta');
    Route::get('/editarOferta/{id}', 'OfertaController@showEditar');
    Route::put('/editarOferta/{id}', 'OfertaController@editarOferta');
    //Mostrar les meves ofertes
    Route::get('/ofertesCreades', 'OfertaController@mevesOfertes');
    Route::get('/ofertesCreadesAjax', 'OfertaController@mevesOfertesAjax');//Ajax
    Route::delete('/esborrarMevaOferta/{id}', 'OfertaController@deleteOferta');//Ajax
    //Mostrar ofertes de la zona
    Route::get('/ofertesAjax', 'OfertaController@mostraOfertesAjax');//Ajax
    Route::post('/ofertesAjaxSeguir/{id}', 'OfertaController@seguirAjax');//Ajax
    Route::get('/ofertesSectorZona', 'OfertaController@mostraOfertesSector');
    //Mostrar ofertes de les empreses que segueixo
    Route::get('/ofertesSeguitsAjax', 'SeguidorController@mostraOfertesSeguitsAjax');//Ajax
    Route::delete('/ofertesAjaxBorrar/{id}', 'SeguidorController@esborrarAjax');//Ajax
    Route::get('/ofertesSeguits', 'SeguidorController@mostraOfertesSeguits');

/**
 * Rutes relacionades amb el sistema de missatgeria via mail
 */
    //Formulari en relació a una oferta
    Route::get('/formMail/{id}','MailController@index');
    //Ruta per enviar el correu en relació a una oferta
    Route::post('/send','MailController@send');
    //Mostrar i eliminar els missatges que he enviat a les empreses
    Route::get('/correusEnviats', 'MailController@show');
    Route::get('/correusEnviatsEmpresa', 'MailController@show2');
    Route::get('/correusEnviatsAjax', 'MailController@rebreCorreus');//Ajax
    Route::delete('/esborrarMissatge/{id}', 'MailController@esborrarMissatge');//Ajax

    //Formulari de contacte comú
    Route::get('/formulariContacte/{id}','MailController@index2');
    //Ruta per enviar el correu de contacte
    Route::post('/enviar','MailController@enviar');

/**
 * Rutes relacionades amb l'apartat de buscadors
 */
    Route::get('/buscarTreballadors','CercadorController@showTreballadors');
    Route::get('/buscarEmpreses','CercadorController@showEmpreses');
    Route::get('/obtenirTreballadors','CercadorController@getTreballadorsAjax');//Ajax
    Route::get('/obtenirEmpreses','CercadorController@getEmpresesAjax');//Ajax

});
