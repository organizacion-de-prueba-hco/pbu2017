<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Estudiante;
use App\Expediente;
use App\User;
use App\HistorialExpediente;
use App\CantidadBecas;
use App\ControlRegistro;
use App\ExoneracionPagoCentMed;
use Redirect;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class DirectivousuController extends Controller
{
    public function __construct()
   {
        $this->middleware('auth');
        $this->middleware('directivo');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function getComensales(){
        $expedientes = Expediente::get();
        return view('users.directivo.usu.expediente', compact('expedientes'));
    }
    public function getComensalesvermas($id){
        //return $id;
        $hexpedientes = HistorialExpediente::where('expediente_id', $id)->get();
        $estudiante   = Estudiante::where('user_id', $id)->first();
        return view('users.directivo.usu.expediente-verMas', compact('estudiante', 'hexpedientes'));
    }
    public function getNbecas(){
        $cbecas=CantidadBecas::get();
        return view('users.directivo.usu.nbecas',compact('cbecas'));
    }
    public function getAsocial(){
        $crs=ControlRegistro::get();
        return view('users.directivo.usu.rcontrol',compact('crs'));
    }
    public function getExoneracion(){
        $exoneraciones=ExoneracionPagoCentMed::get();
        return view('users.directivo.usu.exoneracion',compact('exoneraciones'));
        $crs=ExoneracionPagoCent::get();
    }
}
