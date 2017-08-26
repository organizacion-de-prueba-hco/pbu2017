<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Taller;
use App\CursoTaller;
use Auth;
use Redirect;
use Input;
use Carbon\Carbon;

class JufcTallerController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');//getDescargar
        $this->middleware('jufc');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $date = Carbon::now();
            if ($date->format('m')>=8) { $semestre=$date->format('Y').' - II'; }
            else{ $semestre=$date->format('Y').' - I';}
        $talleres=CursoTaller::where('semestre',$semestre)->get();
        return view('users.jufc.taller',compact('talleres'));
        //return "hola";
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $talleres=Taller::where('unidad','4')->lists('taller','id');
        return view('users.jufc.taller.nuevo', compact('talleres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Los filtros
        //Verificamos si aun no existe este taller en este semestre
            $date = Carbon::now();
            if ($date->format('m')>=8) {
               $semestre=$date->format('Y').' - II';
            }
            else{
                $semestre=$date->format('Y').' - I';
            }
        $ct=CursoTaller::where('semestre',$semestre)
                        ->where('taller_id',$request->get('taller'))->first();
        if ($ct) {
            return Redirect::to('jufctaller')->with('rojo','No se registró, ya existe un registro del taller de '.$ct->taller->taller.' en este semestre '.$semestre);
        }

        $cursoTaller=new CursoTaller;
        $cursoTaller->taller_id=$request->get('taller');
        $cursoTaller->director=Auth::user()->id;
        $cursoTaller->semestre=$semestre;
        $cursoTaller->docente=$request->get('docente');
        $cursoTaller->save();
        return Redirect::to('jufctaller')->with('verde','Se registró un nuevo taller para este semestre '.$semestre);

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

        $taller=CursoTaller::find($id);
        $talleres=Taller::where('unidad','4')->lists('taller','id');
        return view('users.jufc.taller.editar', compact('taller','talleres'));
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

        $taller=CursoTaller::find($id);
        //Evitar que los talleres se repitan
        //1ro solo asemos cambios si se selecciono algo diferente en el SELECT
        if ($taller->curso_id!=$request->get('taller')) {
            //2do No debe existir este taller en este semestre
             $date = Carbon::now();
            if ($date->format('m')>=8) {$semestre=$date->format('Y').' - II'; }
            else{$semestre=$date->format('Y').' - I';}
            $ct=CursoTaller::where('semestre',$semestre)
                        ->where('taller_id',$request->get('taller'))->first();
            if ($ct) {
                return Redirect::to('jufctaller')
                ->with('rojo','No se pudo actualizar los datos, ya existe un registro del taller de '.$ct->taller->taller.' en este semestre '.$semestre);
            }
            
            $taller->taller_id=$request->get('taller');
        }
            $taller->docente=$request->get('docente');
            if($taller->save()){
                return Redirect::to('jufctaller')->with('verde','Se Actualizó correctamente');   
            }else{
                return Redirect::to('jufctaller')->with('rojo','No se pudo actualizar los datos');
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
