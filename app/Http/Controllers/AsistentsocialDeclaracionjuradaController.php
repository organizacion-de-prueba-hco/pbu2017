<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Redirect;
use Auth;
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
        $dj=new DeclaracionJurada;
        $dj->fill(Input::all())->save();
        return Redirect::to('asdeclaracionjurada')->with('verde','Se registró una nueva declaración Jurada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dj = DeclaracionJurada::find($id);
        $cod        = $dj->cuadrofamiliar->user->estudiante->cod_univ;
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

        $departamentos=Departamento::lists('departamento','id');
        $provincias=Provincia::lists('provincia','id');
        $distritos=Distrito::lists('distrito','id');

        return view('users.asistentSocial.declaracionJur.editar', compact('dj','estudiante','CuadroFamiliar','instruccion','departamentos','provincias','distritos'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dj = DeclaracionJurada::find($id);
        $cod        = $dj->cuadrofamiliar->user->estudiante->cod_univ;
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


        return view('users.asistentSocial.declaracionJur.editar', compact('dj','estudiante','CuadroFamiliar','instruccion','departamentos','provincias','distritos'));
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
            return Redirect::to('asdeclaracionjurada')->with('rojo','Solo el perosnal de  asistencia social puede realizar estos cambios');
        }
        $dj=DeclaracionJurada::find($id);
        $dj->fill(Input::all())->save();
        return Redirect::to('asdeclaracionjurada')->with('verde','Se actualizó una declaración Jurada');
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
    public function getNuevo(){
        $cod        = Input::get('cod-nuevo');
        $estudiante = Estudiante::where('cod_univ', $cod)->first();
        if(!$estudiante){
          $user = User::where('users.dni', $cod)->where('tipo_user','5')->first();
          if($user){
             $estudiante = Estudiante::find($user->id);
          }
        }
        if(!$estudiante){
          //Para que salga error en la pantalla grande
          return view('users.asistentSocial.declaracionJur.nuevo', compact('estudiante'));
        }


        //Si la asistenta social es quien e´stá asiendo lps cambios
        if(Auth::user()->tipo_user!='2-1'){
            return Redirect::to('asdeclaracionjurada')->with('rojo','Solo el personal de asistencia social puede realizar estos cambios');
        }

        //Verificamos si ya existe una declaracion jurada de algun pariente del estudiante
        $parientes=CuadroFamiliar::join('declaracion_juradas','declaracion_juradas.miembro_familiar','=','cuadro_familiars.id')->where('cuadro_familiars.user_id',$estudiante->user_id)->select('declaracion_juradas.*')->first();

        if($parientes){
            return Redirect::to('asdeclaracionjurada/'.$parientes->id.'/edit')->with('naranja','Ya existe una declaración jurada para el estudiante, actualice en esta ventana');
        }

//                        ->where('user_id',$estudiante->user_id)
  //                      -> $estudiante->user->cuadro_familiars->where("nombres","Estudiante")->first();//->declaracionjuradas;
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


        return back()->with('estudiante','CuadroFamiliar','instruccion','departamentos','provincias','distritos');
    }
}
