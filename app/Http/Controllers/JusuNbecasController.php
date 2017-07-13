<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Redirect;
use Maatwebsite\Excel\Facades\Excel;
use App\CantidadBecas;
use Input;
use Auth;

class JusuNbecasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('jusu',['except' => ['getReporte'] ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cbecas=CantidadBecas::get();
        return view('users.jusu.nbecas',compact('cbecas'));
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
        $nb = CantidadBecas::find($id);
        return view('users.jusu.editar-nbecas',compact('nb'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return "PPP";
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
        $nb=CantidadBecas::find($id);
        if($nb->fill(Input::all())->save()){
        return Redirect::to('jusunbecas')->with('verde','Se actualizo el N° de becas');    
    }else{
        return Redirect::to('jusunbecas')->with('rojo','No se pudo actualizar, vuelva a intentar');
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
