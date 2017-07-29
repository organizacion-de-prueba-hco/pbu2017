<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\DeclaracionJurada;
use Carbon\Carbon;
use App\Estudiante;
use App\User;
use App\CuadroFamiliar;
use App\Departamento;
use App\Distrito;
use App\Provincia;

class AsistentsocialDeclaracionjuradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $declaracionjuradas = DeclaracionJurada::get();
       
        return view('users.asistentSocial.declaracionJurada', compact('declaracionjuradas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.asistentSocial.declaracionJur.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function postNuevo(Request $request){
        $cod        = $request->get('cod-nuevo');
        $estudiante = Estudiante::where('cod_univ', $cod)->first();
        $CuadroFamiliar=CuadroFamiliar::where('user_id',$estudiante->user_id)->get();
        $instruccion=array( ''=>'Seleccione una opción',
                            '1'=>'Primaria completa',
                            '2'=>'Primaria incompleta',
                            '3'=>'Secundaria completa',
                            '4'=>'Secundaria incompleta',
                            '5' =>'Superior técnica completa',
                            '6' =>'Superior técnica incompleta',
                            '7' =>'Universitario completo',
                            '8' =>'Universitario incompleta',
                            '9' =>'Posgrado');
        if(!$estudiante){
          $user = User::where('users.dni', $cod)->where('tipo_user','5')->first();
          if($user){
             $estudiante = Estudiante::find($user->id);
          }
        }
        $departamentos=Departamento::lists('departamento','id');
        $provincias=Provincia::lists('provincia','id');
        $distritos=Distrito::lists('distrito','id');

        return view('users.asistentSocial.declaracionJur.nuevo', compact('estudiante','CuadroFamiliar','instruccion','departamentos','provincias','distritos'));
        //return $cod;
    }
    public function postNuevopariente(Request $request){
        $cfamiliar= new Cuadrofamiliar;       
        $cfamiliar->fill(Input::all())->save();
        $cfamiliar->save();
        //return back();
        
        $estudiante = Estudiante::find($request->get('user_id'));
        $CuadroFamiliar=CuadroFamiliar::where('user_id',$estudiante->user_id)->get();
        $instruccion=array( ''=>'Seleccione una opción',
                            '1'=>'Primaria completa',
                            '2'=>'Primaria incompleta',
                            '3'=>'Secundaria completa',
                            '4'=>'Secundaria incompleta',
                            '5' =>'Superior técnica completa',
                            '6' =>'Superior técnica incompleta',
                            '7' =>'Universitario completo',
                            '8' =>'Universitario incompleta',
                            '9' =>'Posgrado');
        if(!$estudiante){
          $user = User::where('users.dni', $cod)->where('tipo_user','5')->first();
          if($user){
             $estudiante = Estudiante::find($user->id);
          }
        }
        $departamentos=Departamento::lists('departamento','id');
        $provincias=Provincia::lists('provincia','id');
        $distritos=Distrito::lists('distrito','id');

        return view('users.asistentSocial.declaracionJur.nuevo', compact('estudiante','CuadroFamiliar','instruccion','departamentos','provincias','distritos'));
    }
}
