<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Estudiante;
use Redirect;
use App\Expediente;
use App\Encuesta;
use App\Estudiantencuesta;
use Input;

class EstudiantencuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.estudiante.login-encuesta');
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
        //return $request->get('usuario').' <> '.$request->get('f_nac');
        $estudiante=Estudiante::join('users','users.id','=','estudiantes.user_id')
        ->where('estudiantes.cod_univ',$request->get('usuario'))
        ->where('users.f_nac',$request->get('f_nac'))
        ->select('estudiantes.*')->first();
        
        if($estudiante){
            //Solo los comensales activos deben responder encuestas
            $expediente=Expediente::where('expediente',$estudiante->user_id)
                            ->where('estado','1')->first();
            if (!$expediente) {
               return Redirect::to('encuesta')->with('rojo', 'Los datos ingresados no son válidos');
            }
        }else{
             return Redirect::to('encuesta')->with('rojo', 'Los datos ingresados no son válidos');
        }

        $encuesta=Encuesta::where('estado','1')->orderBy('id','asc')->first();
        $estudiantencuesta=Estudiantencuesta::where('encuesta_id',$encuesta->id)->where('estudiante_id',$estudiante->user_id)->first();
        if($estudiantencuesta){//Si ya respondió la encuesta, retorna 
         return Redirect::to('encuesta')->with('naranja','Ud. ya respondió la Encuesta de este mes el '.$estudiantencuesta->created_at);
        }
        $respuestas= array('1' => 'Exelente',
                           '2' =>'Muy Bueno',
                           '3' =>'Bueno',
                           '4' =>'Regular',
                           '5' =>'Malo');

        return view('users.estudiante.encuesta',compact('estudiante','respuestas','encuesta'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
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
        $estudiante=Expediente::find($request->get('estudiante_id'));
        $encuesta=Encuesta::find($request->get('encuesta_id'));
        if($estudiante && $encuesta->estado=='1'){
         $nuevaencuesta=new Estudiantencuesta;
         $nuevaencuesta->fill(Input::all())->save();
         return Redirect::to('encuesta')->with('verde','Se registro su encuesta');
        }else{
         return Redirect::to('encuesta')->with('Rojo','No se pudo registrar su encuesta por una alteración de datos, intente nuevanete');
        }
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

}
