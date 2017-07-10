<?php

namespace App\Http\Controllers;
use App\Estudiante;
use Illuminate\Http\Request;
use App\ExoneracionPagoCentMed;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class AsistentSocialEpagoController extends Controller
{
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
        if (ExoneracionPagoCentMed::where('id', $request->get('id_univ'))->first()) {
            return Redirect::to('asexpagocentmed')->with('rojo', 'El estudiante ya cuenta con un expediente');
        }
        $exoneracion            = new ExoneracionPagoCentMed;
        $exoneracion->estudiante = $request->get('id_univ');
        $exoneracion->asistenta_social   = Auth::user()->id;
        $exoneracion->opinion  = $request->get('opinion');
        
        $exoneracion->save();
        return Redirect::to('asexpagocentmed')->with('verde', 'Se registro una nueva Exoneración');
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
        //
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
        return view('users.asistentSocial.exoneracion.nuevo', compact('estudiante'));
        //$estudiante=Estudiante::where('cod_univ',$cod)->first();
        //return view('users.jusu.expediente.tester',compact('estudiante'));
    }


}
