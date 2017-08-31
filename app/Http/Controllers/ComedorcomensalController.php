<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Estudiante;
use App\Expediente;
use App\CantidadBecas;

class ComedorcomensalController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('comedor');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expedientes = Expediente::join('estudiantes','estudiantes.user_id','=','expedientes.expediente')
                               ->join('users','users.id','=','estudiantes.user_id')
                               ->where('users.estado_activo','1')
                               //->where('expedientes.caso_especial')
                               ->select('expedientes.*')->get();
        return view('users.comedor.comensales', compact('expedientes'));
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
    public function getEncuesta(){
        return view('users.comedor.encuesta');
    }
    public function getNbecas(){
        $cbecas=CantidadBecas::get();
        return view('users.comedor.nbecas',compact('cbecas'));
    }
}
