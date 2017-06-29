<?php

namespace App\Http\Controllers;

use App\Estudiante;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JusuExpedienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('jusu');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.jusu.expediente');
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

        $expediente             = new Expediente;
        $expediente->expediente = $request->get('cod_univ');
        $expediente->save();
        return view('users.jusu.expediente');
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

    public function postTesteador(Request $request)
    {

        $cod        = $request->get('cod-test');
        $estudiante = Estudiante::where('cod_univ', $cod)->first();
        return view('users.jusu.expediente.tester', compact('estudiante'));
    }
    public function postNuevo(Request $request)
    {

        $cod        = $request->get('cod-nuevo');
        $estudiante = Estudiante::where('cod_univ', $cod)->first();
        return view('users.jusu.expediente.nuevo', compact('estudiante'));
        //$estudiante=Estudiante::where('cod_univ',$cod)->first();
        //return view('users.jusu.expediente.tester',compact('estudiante'));
    }
}
