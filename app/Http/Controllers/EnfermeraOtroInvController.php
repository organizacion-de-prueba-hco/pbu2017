<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\CmInventario;

use Redirect;
use Input;
use Auth;

class EnfermeraOtroInvController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//getDescargar
        $this->middleware('enfermera');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $inventario=CmInventario::get();
        return view('users.enfermera.otros.inventario',compact('inventario')); 
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
         $inv = CmInventario::find($id);
        return view('users.enfermera.otros.editar-inventario',compact('inv'));
        
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

         $inv=CmInventario::find($id);

        $inv->nombre=$request->get('nom');
        $inv->descripcion=$request->get('desc');
        $inv->cantidad=$request->get('cant');
        //$proc->save();
        //return Redirect::to('enfotroproc')->with('verde','Se actualizo el Procedimiento');
        if($inv->fill(Input::all())->save()){
        return Redirect::to('enfotroinv')->with('verde','Se actualizo el artículo del inventario');    
    }else{
        return Redirect::to('enfotroinv')->with('rojo','No se pudo actualizar, vuelva a intentar');
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

    public function postNuevo(Request $request){

    

        $inventario=new CmInventario;
        $inventario->nombre=$request->get('nom');
        $inventario->descripcion=$request->get('desc');
        $inventario->cantidad=$request->get('cant');
        $inventario->save();
        return Redirect::to('enfotroinv')->with('verde','Se registró un nuevo  artículo en el Invenario');
    }


}
