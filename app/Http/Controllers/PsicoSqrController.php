<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PsicopedagogiaSqr;
use App\Estudiante;
use App\User;

use Input;
use Redirect;

class PsicoSqrController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//getDescargar
        $this->middleware('psico');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crs=PsicopedagogiaSqr::get();
        return view('users.psico.cuestionario.cuestionario',compact('crs'));
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
        //return $request->get('estudiante_id');
        $user=User::find($request->get('estudiante_id'));
        $user->domicilio=$request->get('domicilio');
        $user->n_domicilio=$request->get('n_domicilio');
        $user->f_nac=$request->get('f_nac');
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
            return Redirect::to('psicosqr')->with('verde','Se registro correctamente');
        }else{
            return Redirect::to('psicosqr')->with('rojo','Algo salió mal, intente nuevamente');
        } 
    }
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
        return view('users.psico.cuestionario.nuevo', compact('estudiante'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $srq=PsicopedagogiaSqr::find($id);
        $cod        = $srq->estudiante_id;
        $estudiante = Estudiante::find($cod);
        if(!$estudiante){
          $user = User::where('users.dni', $cod)->where('tipo_user','5')->first();
          if($user){
             $estudiante = Estudiante::find($user->id);
          }
        }
        return view('users.psico.cuestionario.ver-mas', compact('srq','estudiante'));
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
        //return $request->get('estudiante_id');
        $user=User::find($request->get('estudiante_id'));
        $user->domicilio=$request->get('domicilio');
        $user->n_domicilio=$request->get('n_domicilio');
        $user->f_nac=$request->get('f_nac');
        $user->telefono=$request->get('telefono');
        $user->save();

        //Encuesta
        $sqr= PsicopedagogiaSqr::find($id);
        $sqr->fill($request->all());        
        if($sqr->save()){
            return Redirect::to('psicosqr')->with('verde','Se registro correctamente');
        }else{
            return Redirect::to('psicosqr')->with('rojo','Algo salió mal, intente nuevamente');
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
