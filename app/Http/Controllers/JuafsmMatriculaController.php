<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Taller;
use App\CursoTaller;
use App\MatriculaTaller;
use App\Estudiante;
use App\User;
use Auth;
use Redirect;
use Input;
use Carbon\Carbon;

class JuafsmMatriculaController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('juafsm');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = Carbon::now();
            if ($date->format('m')>=8) { $semestre=$date->format('Y').' - II'; }
            else{ $semestre=$date->format('Y').' - I';}

        $matriculas=MatriculaTaller::join('curso_tallers','curso_tallers.id','=','matricula_tallers.curso_taller_id')
            ->join('tallers','tallers.id','=','curso_tallers.taller_id')
            ->where('tallers.unidad','3')
            ->where('curso_tallers.semestre',$semestre)
            ->select('matricula_tallers.*')->get();
        return view('users.juafsm.matricula',compact('matriculas','semestre'));
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
        $matricula=new MatriculaTaller;
        $matricula->curso_taller_id=$request->get('curso_taller_id');
        $matricula->estudiante=$request->get('estudiante');
        $matricula->save();
        return Redirect::to('jufsmatricula')->with('verde','Se registró un nuevo estudiante');
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
        $notas=MatriculaTaller::find($id);
        return view('users.juafsm.matricula.notas',compact('notas'));
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
        $notas=MatriculaTaller::find($id);
        $notas->fill(Input::all())->save();
        return Redirect::to('jufsmatricula')->with('verde','Se actualizaron las notas');
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

        $cod = $request->get('cod-nuevo');
        $estudiante = Estudiante::where('cod_univ', $cod)->first();
        if(!$estudiante){
          $user = User::where('users.dni', $cod)->where('tipo_user','5')->first();
          if($user){
             $estudiante = Estudiante::find($user->id);
          }
        }
        if(!$estudiante){
          return view('users.juafsm.matricula.nuevo', compact('estudiante'));
        }

        //Si la asistenta social es quien e´stá asiendo lps cambios
        if(Auth::user()->tipo_user!='3'){
            return Redirect::to('jufsmatricula')->with('rojo','Solo el Director de Unidad puede realizar estos cambios');
        }

        $date = Carbon::now();
            if ($date->format('m')>=8) { $semestre=$date->format('Y').' - II'; }
            else{ $semestre=$date->format('Y').' - I';}

        $talleres=CursoTaller::join('tallers','tallers.id','=','curso_tallers.taller_id')->where('tallers.unidad','3')->where('curso_tallers.semestre',$semestre)->select('tallers.*','curso_tallers.id as id_ct')->get();
        $mistalleres=MatriculaTaller::where('estudiante',$estudiante->user_id)->get();

        return view('users.juafsm.matricula.nuevo', compact('estudiante','talleres','mistalleres'));
    }
    public function getEliminar($id){
        MatriculaTaller::destroy($id);
        return Redirect::to('jufsmatricula')->with('verde','Se eliminó correctamente');
    }
}
