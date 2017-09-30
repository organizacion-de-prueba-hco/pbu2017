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
use App\MedMed;
use App\CmOdoMed;

use Redirect;
use Input;
use Auth;

class EnfermeraFarmController extends Controller
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
    public function getIndex($id)
    {
        if($id=='2'){
            $medmed=CmOdoMed::get();
            return view('users.enfermera.farmacia.atencion2',compact('medmed')); 
        }else if($id=='1'){
            $medmed=MedMed::get();
            return view('users.enfermera.farmacia.atencion',compact('medmed'));  
        }else{
            return back()->with('naranja','No se encontró la ruta');
        }
        
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
        if ($request->get('oficina')=='1') {
            $farmacia=MedMed::find($id);
         $medicamento=CmMedicamento::find($farmacia->medicamento_id);
            if ($request->get('estado')=='0') {
               $valor=$medicamento->cantidad+$farmacia->cantidad;
            }else{
               $valor=$medicamento->cantidad-$farmacia->cantidad;
            }
            if($valor<0){
                return back()->with('rojo','No se pudo realizar esta acción, solo se cuenta con '.$medicamento->cantidad.' Unid. de '.$medicamento->medicamento.'-'.$medicamento->presentacion);
            }
         $medicamento->cantidad=$valor;
         $medicamento->save();

        $farmacia->estado=$request->get('estado');
        $farmacia->save();
        return Redirect::to('enffarms/index/1'); 
        }
        else if($request->get('oficina')=='2'){
           $farmacia=CmOdoMed::find($id);
           $medicamento=CmMedicamento::find($farmacia->medicamento_id);
            if ($request->get('estado')=='0') {
               $valor=$medicamento->cantidad+$farmacia->cantidad;
            }else{
               $valor=$medicamento->cantidad-$farmacia->cantidad;
            }
            if($valor<0){
                return back()->with('rojo','No se pudo realizar esta acción, solo se cuenta con '.$medicamento->cantidad.' Unid. de '.$medicamento->medicamento.'-'.$medicamento->presentacion);
            }
         $medicamento->cantidad=$valor;
         $medicamento->save();

        $farmacia->estado=$request->get('estado');
        $farmacia->save();
        return Redirect::to('enffarms/index/2'); 
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
