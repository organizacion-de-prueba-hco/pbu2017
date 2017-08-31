<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Taller;
use App\CursoTaller;
use App\MatriculaTaller;
use App\Estudiante;
use App\User;
use App\Escuela;
use Auth;
use Redirect;
use Input;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class DirectivotController extends Controller
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
    public function getUafsm()
    {
        $cursos=CursoTaller::get();
        $semestre='----'; $cont=0; $semestres= array();
        foreach ($cursos as $c) {
            if($semestre!=$c->semestre){
                $semestre=$c->semestre;
                array_push($semestres, $semestre);
            }
        }
        return view('users.directivo.uafsm.reportes',compact('semestres'));
    }
    public function getMatriculauafsm(){
        $date = Carbon::now();
            if ($date->format('m')>=8) { $semestre=$date->format('Y').' - II'; }
            else{ $semestre=$date->format('Y').' - I';}

        $matriculas=MatriculaTaller::join('curso_tallers','curso_tallers.id','=','matricula_tallers.curso_taller_id')
            ->join('tallers','tallers.id','=','curso_tallers.taller_id')
            ->where('tallers.unidad','3')
            ->where('curso_tallers.semestre',$semestre)
            ->select('matricula_tallers.*')->get();
        return view('users.directivo.uafsm.matricula',compact('matriculas','semestre'));
    }
    public function getUfc()
    {
        $cursos=CursoTaller::get();
        $semestre='----'; $cont=0; $semestres= array();
        foreach ($cursos as $c) {
            if($semestre!=$c->semestre){
                $semestre=$c->semestre;
                array_push($semestres, $semestre);
            }
        }
        return view('users.directivo.ufc.reportes',compact('semestres'));
    }

    public function getMatriculaufc(){
        $date = Carbon::now();
            if ($date->format('m')>=8) { $semestre=$date->format('Y').' - II'; }
            else{ $semestre=$date->format('Y').' - I';}

        $matriculas=MatriculaTaller::join('curso_tallers','curso_tallers.id','=','matricula_tallers.curso_taller_id')
            ->join('tallers','tallers.id','=','curso_tallers.taller_id')
            ->where('tallers.unidad','4')
            ->where('curso_tallers.semestre',$semestre)
            ->select('matricula_tallers.*')->get();
        return view('users.directivo.ufc.matricula',compact('matriculas','semestre'));
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
}
