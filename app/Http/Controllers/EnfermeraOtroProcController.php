<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CmProcedimiento;

use Redirect;
use Input;
use Auth;

class EnfermeraOtroProcController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//getDescargar
        $this->middleware('enfermera');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $procedimiento=CmProcedimiento::get();
        return view('users.enfermera.otros.procedimientos',compact('procedimiento')); 
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

     

        $procedimiento=new CmProcedimiento;
        $procedimiento->procedimiento=$request->get('procedimiento');
        $procedimiento->tarifa=$request->get('tarifa');
        $procedimiento->save();
        return Redirect::to('enfotroproc')->with('verde','Se registró un nuevo Procedimiento');

        /*
        $cod = $request->get('cod-nuevo');
        $estudiante = Estudiante::where('cod_univ', $cod)->first();
        if(!$estudiante){
          $user = User::where('users.dni', $cod)->where('tipo_user','5')->first();
          if($user){
             $estudiante = Estudiante::find($user->id);
          }
        }
        if(!$estudiante){
          return view('users.jufc.matricula.nuevo', compact('estudiante'));
        }

        //Si la asistenta social es quien e´stá asiendo lps cambios
        if(Auth::user()->tipo_user!='4'){
            return Redirect::to('jufcmatricula')->with('rojo','Solo el Director de Unidad puede realizar estos cambios');
        }

        $date = Carbon::now();
            if ($date->format('m')>=8) { $semestre=$date->format('Y').' - II'; }
            else{ $semestre=$date->format('Y').' - I';}

        $talleres=CursoTaller::join('tallers','tallers.id','=','curso_tallers.taller_id')->where('tallers.unidad','4')->where('curso_tallers.semestre',$semestre)->select('tallers.*','curso_tallers.id as id_ct')->get();
        $mistalleres=MatriculaTaller::join('curso_tallers','curso_tallers.id','=','matricula_tallers.curso_taller_id')->where('curso_tallers.semestre',$semestre)->where('matricula_tallers.estudiante',$estudiante->user_id)->get();
        
        return view('users.jufc.matricula.nuevo', compact('estudiante','talleres','mistalleres'));

        */
    }


}
