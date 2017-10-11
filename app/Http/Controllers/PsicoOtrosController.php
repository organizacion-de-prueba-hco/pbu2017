<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PsicopedagogiaOtros;
use App\Estudiante;
use App\User;

use Redirect;

class PsicoOtrosController extends Controller
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
        $crs=PsicopedagogiaOtros::get();
        return view('users.psico.otros.otros',compact('crs'));
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
        $user=User::find($request->get('user_id'));
        $user->domicilio=$request->get('domicilio');
        $user->n_domicilio=$request->get('n_domicilio');
        $user->f_nac=$request->get('f_nac');
        $user->telefono=$request->get('telefono');
        $user->save();

        $rs=new PsicopedagogiaOtros;
        $rs->estudiante_id=$request->get('user_id');
        $rs->t_ansiedad=$request->get('t_ansiedad');
        $rs->t_inteligencia=$request->get('t_inteligencia');
        $rs->t_personalidad=$request->get('t_personalidad');
        if($rs->save()){
            return Redirect::to('psicotro')->with('verde','Se registro correctamente');
        }else{
            return Redirect::to('psicotro')->with('rojo','Algo salió mal, intente nuevamente');
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
        return view('users.psico.otros.nuevo', compact('estudiante'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $otro=PsicopedagogiaOtros::find($id);
        if (!$otro) {
            return back()->with('rojo','ID de estudiante no identificado');
        }
        $estudiante=Estudiante::find($otro->estudiante_id);
        return view('users.psico.otros.ver-mas', compact('otro','estudiante'));
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
        $user=User::find($request->get('user_id'));
        $user->domicilio=$request->get('domicilio');
        $user->n_domicilio=$request->get('n_domicilio');
        $user->f_nac=$request->get('f_nac');
        $user->telefono=$request->get('telefono');
        $user->save();

        $rs=PsicopedagogiaOtros::find($id);
        $rs->estudiante_id=$request->get('user_id');
        $rs->motivo=$request->get('motivo');
        if($rs->save()){
            return Redirect::to('psicotro')->with('verde','Se actualizó correctamente');
        }else{
            return Redirect::to('psicotro')->with('rojo','Algo salió mal, intente nuevamente');
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
