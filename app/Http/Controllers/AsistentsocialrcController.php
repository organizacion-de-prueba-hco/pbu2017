<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ControlRegistro;
use App\Estudiante;
use App\User;
use Redirect;
class AsistentsocialrcController extends Controller
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
        $crs=ControlRegistro::get();
        return view('users.asistentSocial.rc',compact('crs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "Holi";
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
        return view('users.asistentSocial.rc.nuevo', compact('estudiante'));
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

        $rs=new ControlRegistro;
        $rs->user_id=$request->get('user_id');
        $rs->caso_social=$request->get('caso_social');
        if($rs->save()){
            return Redirect::to('asrc')->with('verde','Se registro correctamente');
        }else{
            return Redirect::to('asrc')->with('rojo','Algo salió mal, intente nuevamente');
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
        $rc=ControlRegistro::find($id);
        $estudiante=Estudiante::find($rc->user_id);
        return view('users.asistentSocial.rc.ver-mas', compact('rc','estudiante'));
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

        $rs=ControlRegistro::find($request->get('rc_id'));
        $rs->user_id=$request->get('user_id');
        $rs->caso_social=$request->get('caso_social');
        if($rs->save()){
            return Redirect::to('asrc')->with('verde','Se registro correctamente');
        }else{
            return Redirect::to('asrc')->with('rojo','Algo salió mal, intente nuevamente');
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
