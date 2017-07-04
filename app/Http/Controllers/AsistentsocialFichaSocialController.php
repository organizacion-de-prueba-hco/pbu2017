<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Estudiante;
use App\Expediente;
use App\Departamento;
use App\Distrito;
use App\Provincia;
use App\User;
use App\Religion;
use App\EstCivil;
use App\TipoColegio;
use App\CuadroFamiliar;
use Redirect;
use Input;

class AsistentsocialFichaSocialController extends Controller
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
        $fichaSocEcon=Expediente::get();
        return view('users.asistentSocial.fichaSocEcon',compact('fichaSocEcon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id) //Generar PDF
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

        if(!Expediente::find($id)){
          return Redirect::to('asfichasocial')->with('naranja','Expediente No identificado');
        }
        return $this->recargarFormularios('verMasEditar',$id);
        
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
    public function postGeneral(){
        return "PostGenral";
    }
    public function getCfamiliar($id){
        return Cuadrofamiliar::find($id);
    }
    public function postEcfamiliar(){
        $cfamiliar=CuadroFamiliar::find(Input::get('id'));
        //Solo el usuario correcto puede editar
        $cfamiliar->fill(Input::all())->save();
        $id=$cfamiliar->user->id;
        //Para capturar la fecha modificación de la ficha
        $mensaje="Se actualizaron los datos";
        return $this->recargarFormularios('formularios.step-22',$id);
        //return Redirect::to('estudiantefichasocial')->with('verde', $mensaje);
    }
    public function postEliminarcfamiliar(){
      //Solo el usuario correcto puede Eliminar
      $cfamiliar=Cuadrofamiliar::find(Input::get('id'));
      $id=$cfamiliar->user->id;
      CuadroFamiliar::destroy(Input::get('id'));
      return $this->recargarFormularios('formularios.step-22',$id);
    }
     public function recargarFormularios($form,$id){
        $user=User::find($id);
        $departamentos=Departamento::lists('departamento','id');
        $provincias=Provincia::lists('provincia','id');
        $distritos=Distrito::lists('distrito','id');
        $religiones=Religion::lists('religion','id');
        $est_civils=EstCivil::lists('est_civil','id');
        $tipoColegios=TipoColegio::lists('tipo','id');
        $cfamiliares=Cuadrofamiliar::where('user_id',$id)->get();
        $instruccion=array( '1'=>'Primaria completa',
                            '2'=>'Primaria incompleta',
                            '3'=>'Secundaria completa',
                            '4'=>'Secundaria incompleta',
                            '5' =>'Superior técnica completa',
                            '6' =>'Superior técnica incompleta',
                            '7' =>'Universitario completo',
                            '8' =>'Universitario incompleta',
                            '9' =>'Posgrado');
        
        return view('users.asistentSocial.fichaSocEcon.'.$form, compact('user','departamentos','provincias','distritos','religiones','est_civils','tipoColegios','cfamiliares','instruccion')); 
     }
}
