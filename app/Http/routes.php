<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

Route::get('/', function () {
    //return view('welcome');
    return view('login');
});

Route::resource('log', 'LogController');
//Super user
Route::resource('superuser', 'SuperuserController');
Route::resource('suestudiantes', 'SuperuserestudiantesController');
Route::get('cargardatos', 'SuperuserController@cargar');
Route::get('cargarnotas', 'SuperuserController@cargarnotas');
Route::get('cargardocentes', 'SuperuserController@cargardocentes');
Route::get('cargarcomensales', 'SuperuserController@cargarcomensales');
//Asistenta Social
Route::resource('asfichasocial', 'AsistentsocialFichasocialController');
Route::controller('fichasocial', 'AsistentsocialFichasocialController');
Route::resource('asdeclaracionjurada', 'AsistentSocialDeclaracionjuradaController');
Route::resource('asvisitadomc1', 'AsistentSocialVdc1Controller');
Route::resource('asvisitadomc2', 'AsistentSocialVdc2Controller');
Route::resource('asvisitadomc3', 'AsistentSocialVdc3Controller');
Route::resource('asvisitadomc4', 'AsistentSocialVdc4Controller');
Route::resource('asvisitahosp1', 'AsistentSocialVhd1Controller');
Route::resource('asvisitahosp2', 'AsistentSocialVhd2Controller');
Route::resource('asvisitahosp3', 'AsistentSocialVhd3Controller');
Route::resource('asvisitahosp4', 'AsistentSocialVhd4Controller');
//asistendSocial
Route::resource('asexpagocentmed', 'AsistentSocialEpagoController');
Route::controller('asexpagocentmeds', 'AsistentSocialEpagoController');
//JUSU
Route::resource('jusuexpediente', 'JusuExpedienteController');
Route::controller('jusuexpedientes', 'JusuExpedienteController');
Route::resource('jusunbecas', 'JusuNbecasController');
//nutricionista
Route::resource('nutriforme', 'NutriInformeController');
Route::controller('nutriformes', 'NutriInformeController');

//Pdf
Route::controller('pdf', 'PdfController');

//Select Anidado
	Route::get('prov/{id}',function (Request $request, $id) {
            if ($request->ajax()) {
                $provincias=App\Provincia::provincias($id);
                return response()->json($provincias);
            }
        });
	Route::get('dist/{id}',function (Request $request, $id) {
            if ($request->ajax()) {
                $distritos=App\Distrito::distritos($id);
                return response()->json($distritos);
            }
        });
