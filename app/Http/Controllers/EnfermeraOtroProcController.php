<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CmProcedimiento;

use Redirect;
use Input;
use Auth;

class EnfermeraOtroProcController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//getDescargar
        $this->middleware('enfermera',['except' => ['index','edit','update','postNuevo']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $procedimiento=CmProcedimiento::get();
        
        if (Auth::user()->tipo_user=='2-4') {
            return view('users.medico.otros.procedimientos',compact('procedimiento')); 
        }
        else if(Auth::user()->tipo_user=='2-4-2'){
            return view('users.enfermera.otros.procedimientos',compact('procedimiento')); 
        }else{
            return back();
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
        $proc = CmProcedimiento::find($id);
        return view('users.enfermera.otros.editar-procedimiento',compact('proc'));
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
            $proc=CmProcedimiento::find($id);
            $proc->procedimiento=$request->get('proc');
            $proc->tarifa=$request->get('tar');
            $proc->area=$request->get('area');
            $proc->save();
            //return Redirect::to('enfotroproc')->with('verde','Se actualizo el Procedimiento');
            if($proc->fill(Input::all())->save()){
                return back()->with('verde','Se actualizo el Procedimiento');    
            }else{
                return back()->with('rojo','No se pudo actualizar, vuelva a intentar');
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
        $procedimiento=new CmProcedimiento;
        $procedimiento->procedimiento=$request->get('procedimiento');
        $procedimiento->area=$request->get('area');
        $procedimiento->tarifa=$request->get('tarifa');
        $procedimiento->save();
        return back()->with('verde','Se registró un nuevo Procedimiento');

    }


}
