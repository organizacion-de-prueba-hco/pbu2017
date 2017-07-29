<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Estudiante;
use App\Expediente;
use App\User;
use App\HistorialExpediente;
use Redirect;

class SuperuserestudiantesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('SuperUsuario');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('tipo_user','5')->get();
        return view('users.super.estudiantes', compact('users'));
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
        $estudiante = Estudiante::where('user_id', $id)->first();
        $expediente=Expediente::where('expediente',$id)->first();
        return view('users.super.estudiantes.editar-becario',compact('estudiante','expediente'));
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
        //return $request->get('obs');
        $id=$request->get('user_id');
        $expediente=Expediente::find($id);
        $obs=$request->get('obs');
        if($expediente){
            $expediente->estado=$request->get('estado');
            $expediente->tipo_beca=$request->get('TipoBeca');
            $expediente->obs=$obs;
            $expediente->save();
            //Ahora también en el Registro
            $UltimoExpediente=Expediente::orderBy('expediente','desc')->first();
            $HistorialExpediente= new HistorialExpediente;
            $HistorialExpediente->expediente_id=$UltimoExpediente->expediente;
            $HistorialExpediente->tipo_beca= $request->get('TipoBeca');
            $HistorialExpediente->obs= $obs;
            $HistorialExpediente->resultado= $request->get('estado');
            $HistorialExpediente->save();
        }else{
            $expediente             = new Expediente;
            $expediente->expediente = $id;
            $expediente->jefe_usu   = '4';
            $expediente->tipo_beca  = $request->get('TipoBeca');
            $expediente->obs  = $obs;
            $expediente->estado     = '1';
            $expediente->save();
            //Lo registramos tambien en el Historial Expediente
            $UltimoExpediente=Expediente::orderBy('expediente','desc')->first();
            $HistorialExpediente= new HistorialExpediente;
            $HistorialExpediente->expediente_id=$UltimoExpediente->expediente;
            $HistorialExpediente->tipo_beca= $request->get('TipoBeca');
            $HistorialExpediente->obs= $obs;
            $HistorialExpediente->resultado= $UltimoExpediente->estado;
            $HistorialExpediente->save();
        }

        return Redirect::to('suestudiantes')->with('verde','se actualizaron datos');
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
