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
use App\User;
use App\Estudiantencuesta;
use App\PsicopedagogiaSqr;
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

    //Cuestionario SRQ de psicopedagogía
    public function getCuestionario()
    {
        return view('users.estudiante.cuestionario_srq.login');
    }
    public function postCuestionarioinicio(Request $request)
    {
        //return $request->get('usuario').' <> '.$request->get('f_nac');
        $estudiante=Estudiante::join('users','users.id','=','estudiantes.user_id')
        ->where('estudiantes.cod_univ',$request->get('usuario'))
        ->where('users.f_nac',$request->get('f_nac'))
        ->where('users.estado_activo','1')
        ->select('estudiantes.*')->first();
        

        if(!$estudiante){
               return Redirect::to('psicopedagogia/cuestionario')
                                ->with('rojo', 'Los datos ingresados no son válidos 1');
        }

        $respuestas= array('1' => 'Exelente',
                           '2' =>'Muy Bueno',
                           '3' =>'Bueno',
                           '4' =>'Regular',
                           '5' =>'Malo');
        $crs=PsicopedagogiaSqr::where('estudiante_id',$estudiante->user_id)->get();
        return view('users.estudiante.cuestionario_srq.cuestionario',compact('estudiante','respuestas','crs'));
    }

    public function postCuestionarionuevo(Request $request)
    {
        $cod        = $request->get('cod-nuevo');
        $estudiante = Estudiante::where('cod_univ', $cod)->first();
        if(!$estudiante){
          $user = User::where('users.dni', $cod)->where('tipo_user','5')->first();
          if($user){
             $estudiante = Estudiante::find($user->id);
          }
        }
        return view('users.estudiante.cuestionario_srq.nuevo', compact('estudiante'));
    }
    //cuestionarioregistrarnuevo
    public function postCuestionarioregistrarnuevo(Request $request)
    {
        //return $request->get('estudiante_id');
        $user=User::find($request->get('estudiante_id'));
        $user->domicilio=$request->get('domicilio');
        $user->n_domicilio=$request->get('n_domicilio');
        $user->telefono=$request->get('telefono');
        $user->save();

        //Encuesta
        $sqr=new PsicopedagogiaSqr;
            $sqr_n=PsicopedagogiaSqr::where('estudiante_id',$request->get('estudiante_id'))
                                                                  ->orderBy('id','desc')->first();

        if($sqr_n){ $n=$sqr_n->n+1;}   else{$n=1;}
        $sqr->n=$n;
        $sqr->fill($request->all());
        
        if($sqr->save()){
           
           //No podemos usar el Redirec así que escribimos todo el código de CuestionarioInicio
            $estudiante=Estudiante::join('users','users.id','=','estudiantes.user_id')
            ->where('estudiantes.user_id',$user->id)
            ->where('users.f_nac',$user->f_nac)
            ->where('users.estado_activo','1')
            ->select('estudiantes.*')->first();
            

            if(!$estudiante){
                   return Redirect::to('psicopedagogia/cuestionario')
                                    ->with('rojo', 'Los datos ingresados no son válidos 1');
            }

            $respuestas= array('1' => 'Exelente',
                               '2' =>'Muy Bueno',
                               '3' =>'Bueno',
                               '4' =>'Regular',
                               '5' =>'Malo');
            $crs=PsicopedagogiaSqr::where('estudiante_id',$estudiante->user_id)->get();
            return view('users.estudiante.cuestionario_srq.cuestionario',compact('estudiante','respuestas','crs'))->with('verde','Se registro correctamente');
         //
        }else{
            return Redirect::to('psicopedagogia/cuestionario')
                                                        ->with('rojo','Algo salió mal, intente nuevamente');
        } 
    }

}
