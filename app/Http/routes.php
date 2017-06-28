<?php

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
Route::get('provando', function () {
	Excel::load('public/archivo.xlsx',function($archivo){
            $result=$archivo->get();
            foreach ($result as $key => $value) {
    if(App\EStudiante::where('cod_univ',$value->id_alumno)->first()){
    	continue;
    	echo "Existe";
    }
    echo $value->id_alumno."No existe";
    echo "<br>";
	}
});
   
});
Route::resource('log','LogController');
//Super user
Route::resource('superuser','SuperuserController');
Route::get('cargardatos','SuperuserController@cargar');
Route::get('cargarnotas','SuperuserController@cargarnotas');
Route::get('cargardocentes','SuperuserController@cargardocentes');
//Asistenta Social
Route::resource('asfichasocial','AsistentSocialFichasocialController');
Route::resource('asdeclaracionjurada','AsistentSocialDeclaracionjuradaController');
Route::resource('asvisitadomc1','AsistentSocialVdc1Controller');
Route::resource('asvisitadomc2','AsistentSocialVdc2Controller');
Route::resource('asvisitadomc3','AsistentSocialVdc3Controller');
Route::resource('asvisitadomc4','AsistentSocialVdc4Controller');
Route::resource('asvisitahosp1','AsistentSocialVhd1Controller');
Route::resource('asvisitahosp2','AsistentSocialVhd2Controller');
Route::resource('asvisitahosp3','AsistentSocialVhd3Controller');
Route::resource('asvisitahosp4','AsistentSocialVhd4Controller');
Route::resource('asexpagocentmed','AsistentSocialEpagoController');
//Asistenta Social
Route::resource('jusuexpediente','JusuExpedienteController');
