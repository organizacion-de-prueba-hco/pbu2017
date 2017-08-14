<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Estudiante;
use App\User;
use App\VisitaDomiciliaria;
use App\CuadroFamiliar;
use App\Departamento;
use App\Provincia;
use App\Distrito;
use Auth;
use Redirect;
use Input;
class AsistentSocialVdc1Controller extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('asistentsocial');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $visitadomiciliaria=VisitaDomiciliaria::get();
        return view('users.asistentSocial.visitaDomic.estudiante',compact('visitadomiciliaria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postNuevo(Request $request)
    {
        $cod        = $request->get('cod-nuevo');
        $estudiante = Estudiante::where('cod_univ', $cod)->first();
        if(!$estudiante){
          $user = User::where('users.dni', $cod)->where('tipo_user','5')->first();
          if($user){
             $estudiante = Estudiante::find($user->id);
          }
        }
        if(!$estudiante){
          //Para que salga error en la pantalla grande
          return view('users.asistentSocial.visitaDomic.estudiante-nuevo', compact('estudiante'));
        }


        //Si la asistenta social es quien está asiendo los cambios
        if(Auth::user()->tipo_user!='2-1'){
            return Redirect::to('asdeclaracionjurada')->with('rojo','Solo el personal de asistencia social puede realizar estos cambios');
        }


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

        return view('users.asistentSocial.visitaDomic.estudiante-nuevo', compact('estudiante','CuadroFamiliar','instruccion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dj=new VisitaDomiciliaria;
        $dj->fill(Input::all())->save();
        return Redirect::to('asvisitadomc1')->with('verde','Se registró una nueva Visita');
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
        $vd = VisitaDomiciliaria::find($id);
        $cod        = $vd->cuadrofamiliar->user->estudiante->cod_univ;
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
       
        return view('users.asistentSocial.visitaDomic.estudiante-editar', compact('vd','estudiante','CuadroFamiliar','instruccion','departamentos','provincias','distritos'));
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
        if(Auth::user()->tipo_user!='2-1'){
            return Redirect::to('asvisitadomc1')->with('rojo','Solo el personal de  asistencia social puede realizar estos cambios');
        }
        $dj=VisitaDomiciliaria::find($id);
        $dj->fill(Input::all())->save();
        return Redirect::to('asvisitadomc1')->with('verde','Se actualizó correctamente');
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

        return view('users.asistentSocial.visitaDomic.estudiante-nuevo',compact('estudiante','CuadroFamiliar','instruccion'));
    }
}
