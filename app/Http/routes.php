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
Route::get('actualizar', 'SuperuserController@actualizar');
Route::resource('suencuesta', 'SuperuserencuestaController');
Route::controller('suencuestas', 'SuperuserencuestaController');
Route::resource('suajuste', 'SuperuserajustesController');
Route::controller('suajustes', 'SuperuserajustesController');
//Directivo
Route::get('directivoencuesta', function () {
    return view('users.directivo.encuesta');
});
Route::resource('directivoajuste', 'DirectivoController');
Route::controller('directivoajustes', 'DirectivoController');
Route::controller('directivousus', 'DirectivousuController');
Route::controller('directivotalleres', 'DirectivotController');

//Route::resource('directivoencuesta', 'DirectivoController');
//Asistenta Social
Route::resource('asfichasocial', 'AsistentsocialFichaSocialController');
Route::controller('fichasocial', 'AsistentsocialFichaSocialController');
Route::resource('asdeclaracionjurada', 'AsistentsocialDeclaracionjuradaController');
Route::controller('asdj', 'AsistentsocialDeclaracionjuradaController');
Route::resource('asvisitadomc1', 'AsistentSocialVdc1Controller');
Route::controller('asvisitadomc1s', 'AsistentSocialVdc1Controller');
Route::resource('asvisitadomc2', 'AsistentSocialVdc2Controller');
Route::resource('asvisitadomc3', 'AsistentSocialVdc3Controller');
Route::resource('asvisitadomc4', 'AsistentSocialVdc4Controller');
Route::resource('asvisitahosp1', 'AsistentSocialVhd1Controller');
Route::controller('asvisitahosp1s', 'AsistentSocialVhd1Controller');
Route::resource('asvisitahosp2', 'AsistentSocialVhd2Controller');
Route::resource('asvisitahosp3', 'AsistentSocialVhd3Controller');
Route::resource('asvisitahosp4', 'AsistentSocialVhd4Controller');
Route::resource('asrc', 'AsistentsocialrcController');
Route::controller('asrcs', 'AsistentsocialrcController');
Route::resource('asajuste', 'AsistentSocialController');
Route::controller('asajustes', 'AsistentSocialController');
//asistendSocial
Route::resource('asexpagocentmed', 'AsistentSocialEpagoController');
Route::controller('asexpagocentmeds', 'AsistentSocialEpagoController');
//JUSU
Route::resource('jusuexpediente', 'JusuExpedienteController');
Route::controller('jusuexpedientes', 'JusuExpedienteController');
Route::resource('jusunbecas', 'JusuNbecasController');
Route::resource('jusuajustes', 'JusuajustesController');
Route::controller('jusuajuste', 'JusuajustesController');
Route::get('jusuencuesta', function () {
    return view('users.jusu.encuesta');
});

//nutricionista=7
Route::resource('nutriforme', 'NutriInformeController');
Route::controller('nutriformes', 'NutriInformeController');
Route::controller('nutriajustes', 'NutriController');
Route::resource('nutriajuste', 'NutriController');

//Estudiante
Route::resource('encuesta', 'EstudiantencuestaController');


//JUAFSM = 3
Route::resource('jufsmtaller', 'JuafsmTallerController');
Route::resource('jufsmatricula', 'JuafsmMatriculaController');
Route::controller('jufsmatriculas', 'JuafsmMatriculaController');
Route::resource('jufsmreporte', 'JuafsmReporteController');
Route::resource('jufsm', 'JuafsmController'); //Actualizar datos
Route::controller('jufsms', 'JuafsmController'); // Actualizar Foto

//JUFC = 4
Route::resource('jufctaller', 'JufcTallerController'); //metodos normales, controller para los adicionales
Route::resource('jufcmatricula', 'JufcMatriculaController');
Route::controller('jufcmatriculas', 'JufcMatriculaController');
Route::resource('jufcreporte', 'JufcReporteController');
Route::resource('jufc', 'JufcController'); //Actualizar datos
Route::controller('jufcs', 'JufcController'); // Actualizar Foto

//Comedor = 2-2
Route::resource('comedor', 'ComedorcomensalController');
Route::controller('comedors', 'ComedorcomensalController');
Route::resource('comedorajuste', 'ComedorController');
Route::controller('comedorajustes', 'ComedorController');

//Centro médico 2-4, 2-4-1, 2-4-2
Route::resource('enf', 'EnfermeraRegistrosController');
Route::controller('enfs', 'EnfermeraRegistrosController'); //metodos adicionales
Route::resource('enfermera', 'EnfermeraController'); //metodos normales
Route::controller('enfermeras', 'EnfermeraController'); // Actualizar Foto
Route::resource('enfmed', 'EnfermeraMedController');
Route::controller('enfmeds', 'EnfermeraMedController');
Route::resource('enfodonto', 'EnfermeraOdontoController');
Route::controller('enfodontos', 'EnfermeraOdontoController');

Route::resource('med', 'MedicoRegistrosController');
Route::resource('medmed', 'MedicoMedController');
Route::controller('medmeds', 'MedicoMedController');
Route::resource('medico', 'MedicoController');
Route::controller('medicos', 'MedicoController');

Route::resource('odonto', 'OdontoRegistrosController');
Route::controller('odontos', 'OdontoRegistrosController');
Route::resource('odontodonto', 'OdontologoOdontoController');
Route::controller('odontodontos', 'OdontologoOdontoController');
Route::controller('odontotros', 'OdontologoController');

Route::resource('enffarm', 'EnfermeraFarmController');
Route::controller('enffarms', 'EnfermeraFarmController');
Route::resource('enfinv', 'EnfermeraInvController');
Route::controller('enfinvs', 'EnfermeraInvController');
//enfermera/otro/inventario
Route::resource('enfotroinv', 'EnfermeraOtroInvController');
Route::controller('enfotroinvs', 'EnfermeraOtroInvController');
//enfermera/otro/procedimiento
Route::resource('enfotroproc', 'EnfermeraOtroProcController');
Route::controller('enfotroprocs', 'EnfermeraOtroProcController');


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
