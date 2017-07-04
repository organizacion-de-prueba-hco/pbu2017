<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\InformeNutricion;
use Illuminate\Http\Request;
use Auth;

class NutriInformeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('nutricionista');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $nutriformes = InformeNutricion::get();
        return view('users.nutricionista.informenutricion', compact('nutriformes'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users.nutricionista.informenutricion.nuevo");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $informenutricion=new InformeNutricion;
        $informenutricion->nutricionista   = Auth::user()->id;
        $informenutricion->titulo=$request->get('titulo');
        $informenutricion->subtitulo=$request->get('subtitulo');
        $informenutricion->archivo=$request->get('archivo');
        $informenutricion->contenido=$request->getElementById("editor1").innerText;
        
        $informenutricion->save();
        return view('users.nutricionista.informenutricion', compact('nutriformes'));

       
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
}
