<?php

namespace App\Http\Controllers;
use App\Estudiante;
use Illuminate\Http\Request;
use App\ExoneracionPagoCentMed;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Redirect;

class AsistentSocialEpagoController extends Controller
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
        $exoneraciones=ExoneracionPagoCentMed::get();
        return view('users.asistentSocial.exoneracion',compact('exoneraciones'));
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
        $user=User::find($request->get('id_univ'));
        $user->telefono=$request->get('telefono');
        $user->domicilio=$request->get('domicilio');
        $user->n_domicilio=$request->get('n_domicilio');
        $user->f_nac=$request->get('f_nac');
        $user->save();
        $exoneracion   = new ExoneracionPagoCentMed;
        $exoneracion->estudiante = $request->get('id_univ');
        $exoneracion->asistenta_social   = Auth::user()->id;
        $exoneracion->opinion  = $request->get('opinion');
        if($exoneracion->save()){
        return Redirect::to('asexpagocentmed')->with('verde','Se registro una nueva Exoneración');
        }
        else{
        return Redirect::to('asexpagocentmed')->with('rojo','No se registró, vuelva a intentar');
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
        $exon=ExoneracionPagoCentMed::find($id);
        if (!$exon) {
            return back()->with('rojo','ID no identificado');
        }

        $estudiante = Estudiante::where('cod_univ', $exon->estudiant->cod_univ)->first();
        return view('users.asistentSocial.exoneracion.editar', compact('estudiante','exon'));
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
        $exon=ExoneracionPagoCentMed::find($id);
        if (!$exon) {
            return back()->with('rojo','ID no identificado');
        }
        
        $user=User::find($request->get('id_univ'));
        $user->telefono=$request->get('telefono');
        $user->domicilio=$request->get('domicilio');
        $user->n_domicilio=$request->get('n_domicilio');
        $user->f_nac=$request->get('f_nac');
        $user->save();

        $exon->estudiante = $request->get('id_univ');
        $exon->asistenta_social   = Auth::user()->id;
        $exon->opinion  = $request->get('opinion');
        if($exon->save()){
        return Redirect::to('asexpagocentmed')->with('verde','Se actualizó una Exoneración');
        }
        else{
        return Redirect::to('asexpagocentmed')->with('rojo','No se guardaron los cambios, vuelva a intentar');
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
        return view('users.asistentSocial.exoneracion.nuevo', compact('estudiante'));
        //$estudiante=Estudiante::where('cod_univ',$cod)->first();
        //return view('users.jusu.expediente.tester',compact('estudiante'));
    }


}
