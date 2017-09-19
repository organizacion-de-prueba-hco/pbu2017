<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CmMedicina;
use App\Estudiante;
use App\User;
use App\Religion;
use App\EstCivil;
use App\Departamento;
use App\Provincia;
use App\Distrito;
use App\CuadroFamiliar;
use App\CmAntecedente;
use App\CmProcedimiento;
use App\CmMedProc;
use App\CmMedicamento;

use Redirect;
use Input;
use Auth;

class EnfermeraInvController extends Controller
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
        $medicamento=CmMedicamento::get();
        return view('users.enfermera.farmacia.inventario',compact('medicamento')); 
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
        $med = CmMedicamento::find($id);
        return view('users.enfermera.farmacia.editar-inventario',compact('med'));
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
        $med=CmMedicamento::find($id);

        $med->medicamento=$request->get('med');
        $med->presentacion=$request->get('pres');
        $med->cantidad=$request->get('cant');
        //$proc->save();
        //return Redirect::to('enfotroproc')->with('verde','Se actualizo el Procedimiento');
        if($med->fill(Input::all())->save()){
        return Redirect::to('enfinv')->with('verde','Se actualizo el artículo del inventario');    
    }else{
        return Redirect::to('enfinv')->with('rojo','No se pudo actualizar, vuelva a intentar');
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

    

        $medicamento=new CmMedicamento;
        $medicamento->medicamento=$request->get('med');
        $medicamento->presentacion=$request->get('pres');
        $medicamento->cantidad=$request->get('cant');
        $medicamento->save();
        return Redirect::to('enfinv')->with('verde','Se registró un nuevo  artículo en el Inventario');
    }



}
