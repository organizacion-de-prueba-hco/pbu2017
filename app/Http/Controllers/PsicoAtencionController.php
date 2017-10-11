<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PsicopedagogiaAtencion;
use App\Estudiante;
use App\User;

use Redirect;

class PsicoAtencionController extends Controller
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
        $crs=PsicopedagogiaAtencion::get();
        return view('users.psico.atencion.atencion',compact('crs'));
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

    public function store(Request $request)
    {
        $user=User::find($request->get('user_id'));
        $user->domicilio=$request->get('domicilio');
        $user->n_domicilio=$request->get('n_domicilio');
        $user->f_nac=$request->get('f_nac');
        $user->telefono=$request->get('telefono');
        $user->save();

        $rs=new PsicopedagogiaAtencion;
        $rs->estudiante_id=$request->get('user_id');
        $rs->motivo=$request->get('motivo');
        if($rs->save()){
            return Redirect::to('psicoatencion')->with('verde','Se registro correctamente');
        }else{
            return Redirect::to('psicoatencion')->with('rojo','Algo salió mal, intente nuevamente');
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rc=PsicopedagogiaAtencion::find($id);
        if (!$rc) {
            return back()->with('rojo','ID de estudiante no identificado');
        }
        $estudiante=Estudiante::find($rc->estudiante_id);
        return view('users.psico.atencion.ver-mas', compact('rc','estudiante'));
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

        $rs=PsicopedagogiaAtencion::find($request->get('rc_id'));
        $rs->estudiante_id=$request->get('user_id');
        $rs->motivo=$request->get('motivo');
        if($rs->save()){
            return Redirect::to('psicoatencion')->with('verde','Se actualizó correctamente');
        }else{
            return Redirect::to('psicoatencion')->with('rojo','Algo salió mal, intente nuevamente');
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
