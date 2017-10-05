<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\InformeNutricion;
use App\User;
use Carbon\Carbon;
use App\CuadroFamiliar;
use App\EgresoFamiliar;
use App\FichaSocial;
use App\DeclaracionJurada;
use App\ExoneracionPagoCentMed;
use App\VisitaDomiciliaria;
use App\VisitaHospitalaria;
use App\Estudiante;
use App\CmOdontologia;
use App\CmAntecedente;
use App\Religion;
use App\EstCivil;
use App\Distrito;
use App\Provincia;
use App\Departamento;
use App\CmMedicina;

use Auth;
class PdfController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function getInformenutricion($id){
        //return "Esto es el PDF ".$id;
        $informeNutricion=InformeNutricion::find($id);
        $date = Carbon::now();
        //$date = $date->format('d-m-Y');
        $view =  \View::make('pdf.informeNutricion', compact('informeNutricion','date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->download($informeNutricion->titulo.'.pdf');
        //return $pdf->stream('invoiced');
    }
    public function getFs($id){
        $user=User::find($id);
        $date = Carbon::now();
        $cfamiliares=CuadroFamiliar::where('user_id',$id)->get();
        $instruccion=array( ''=>'No especifica',
                            '1'=>'Primaria completa',
                            '2'=>'Primaria incompleta',
                            '3'=>'Secundaria completa',
                            '4'=>'Secundaria incompleta',
                            '5' =>'Superior técnica completa',
                            '6' =>'Superior técnica incompleta',
                            '7' =>'Universitario completo',
                            '8' =>'Universitario incompleta',
                            '9' =>'Posgrado');
        $TipoFamilias=array( ''=>'No especifica',
                            '1'=>'Organizada',
                            '2'=>'Desintegrada',
                            '3'=>'Armoniosa',
                            '4'=>'Conflictiva',
                            '5' =>'Otro');
        $TratoPadres=array( ''=>'No especifica',
                            '1'=>'Buena',
                            '2'=>'Regular',
                            '3'=>'Mala');
        $cubreGastos=array( ''=>'No especifica',
                            '1'=>'Padres',
                            '2'=>'Solo Padre',
                            '3'=>'Solo Madre',
                            '4'=>'Otros');
        $vivienda=array( ''=>'No especifica',
                         '1'=>'Propia',
                         '2'=>'Alquilada',
                         '3'=>'Hipotecada',
                         '4'=>'Alojada',
                         '5'=>'Cuidador',
                         '6'=>'Otros');
        $material=array( ''=>'No especifica',
                         '1'=>'Noble',
                         '2'=>'Mixto',
                         '3'=>'Rustico');
           $techo=array( ''=>'No especifica',
                         '1'=>'Concreto',
                         '2'=>'Calamina',
                         '3'=>'Eternit',
                         '4'=>'Otros');
            $piso=array( ''=>'No especifica',
                         '1'=>'Parquet',
                         '2'=>'Cemento',
                         '3'=>'Tierra',
                         '4'=>'Otros');
        $egresoFamiliar=EgresoFamiliar::where('user_id',$id)->first();
        $datoSalud= Cuadrofamiliar::join('datos_saluds','datos_saluds.miembro_familiar','=','cuadro_familiars.id')->where('cuadro_familiars.user_id',$id)->select('datos_saluds.id as idsalud','cuadro_familiars.parentesco as parentesco','cuadro_familiars.nombres as nombresp','datos_saluds.*')->get();
        $fichasocial=FichaSocial::where('expediente_id',$id)->first();

        $view =  \View::make('pdf.fs', compact('user','date','cfamiliares','instruccion','TipoFamilias','TratoPadres','cubreGastos','egresoFamiliar','vivienda','material','techo','piso','datoSalud','fichasocial'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        //return $pdf->download($informeNutricion->titulo.'.pdf');
        return $pdf->stream('invoiced');
    }

    public function getDj($id){
        //Usamos el ID del user para que a ruta funciones para todos los users
        //Verificamos si ya existe una declaracion jurada de algun pariente del estudiante
        $parientes=CuadroFamiliar::join('declaracion_juradas','declaracion_juradas.miembro_familiar','=','cuadro_familiars.id')->where('cuadro_familiars.id',$id)->select('declaracion_juradas.*')->first();
        if(!$parientes){
             return back()->with('rojo','aún no se ha generado una DJ para este estudiante');
        }
        $ids=$parientes->id;
        $dj= DeclaracionJurada::find($ids);
        if(!$dj){
            return back()->with('rojo','aún no se ha generado una DJ para este estudiante');
        }
        $date = Carbon::now();
        //$date = $date->format('d-m-Y');
        $view =  \View::make('pdf.dj', compact('dj','date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        //return $pdf->download($informeNutricion->titulo.'.pdf');
        return $pdf->stream('invoiced');
    }

    public function getExoneracion($id){
        $exon=ExoneracionPagoCentMed::find($id);
        if(!$exon){
             return back()->with('rojo','ID no identificado');
        }

        $date = Carbon::now();
        //$date = $date->format('d-m-Y');
        $view =  \View::make('pdf.exoneracion', compact('exon','date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        //return $pdf->download($informeNutricion->titulo.'.pdf');
        return $pdf->stream('invoiced');
    }

     public function getVisitadomiciliaria($id){
        $vd=VisitaDomiciliaria::find($id);
        if(!$vd){
             return back()->with('rojo','ID no identificado');
        }        
        $date = Carbon::now();
        //$date = $date->format('d-m-Y');
        $view =  \View::make('pdf.vdomiciliaria', compact('vd','date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        //return $pdf->download($informeNutricion->titulo.'.pdf');
        return $pdf->stream('invoiced');
    }
    public function getVisitahospitalaria($id){
        $vd=VisitaHospitalaria::find($id);
        if(!$vd){
             return back()->with('rojo','ID no identificado');
        }        
        $date = Carbon::now();
        //$date = $date->format('d-m-Y');
        $view =  \View::make('pdf.vhospitalaria', compact('vd','date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        //return $pdf->download($informeNutricion->titulo.'.pdf');
        return $pdf->stream('invoiced');
    }

    //Centro médico
    public function getOdontologia($id){
        if(Auth::user()->tipo_user=='0' || Auth::user()->tipo_user=='2-4' || Auth::user()->tipo_user=='2-4-1' || Auth::user()->tipo_user=='2-4-2'){

         $odontologias=CmOdontologia::find($id);
         $estudiante=Estudiante::find($odontologias->user_id);
         //$religiones=Religion::lists('religion','id');
         //$est_civils=EstCivil::lists('est_civil','id');
         //$departamentos=Departamento::lists('departamento','id');
         //$provincias=Provincia::lists('provincia','id');
         //$distritos=Distrito::lists('distrito','id');
         //$antec0=CmAntecedente::where('user_id',$estudiante->user_id)->where('tipo','0')->first();
         //$antec1=CmAntecedente::where('user_id',$estudiante->user_id)->where('tipo','1')->first();
            

         $date = Carbon::now();
         //$date = $date->format('d-m-Y');
         $view =\View::make('pdf.cm.repor-odontologia',compact('estudiante','odontologias'))->render();
         $pdf = \App::make('dompdf.wrapper');
         $pdf->loadHTML($view);
         return $pdf->download('Ficha odontológica-'.$estudiante->cod_univ.'.pdf');
         //return $pdf->stream('invoiced');

        }else{
            return back()->with('naranja','Ud. no puede realizar esta acción');
        }
    }

    public function getOdontologiatodo($id){
        if(Auth::user()->tipo_user=='0' || Auth::user()->tipo_user=='2-4' || Auth::user()->tipo_user=='2-4-1' || Auth::user()->tipo_user=='2-4-2'){

         $odontologias=CmOdontologia::where('user_id',$id)->where('i_motivo_consulta','<>','')->orderBy('id','desc')->get();
         $estudiante=Estudiante::find($id);   
         $date = Carbon::now();
         //$date = $date->format('d-m-Y');
         $view =\View::make('pdf.cm.repor-odontologia-todo',compact('estudiante','date','odontologias'))->render();
         $pdf = \App::make('dompdf.wrapper');
         $pdf->loadHTML($view);
         return $pdf->download('Ficha odontológica (Historial)-'.$estudiante->cod_univ.'.pdf');
         //return $pdf->stream('invoiced');

        }else{
            return back()->with('naranja','Ud. no puede realizar esta acción');
        }
    }

    public function getMedicina($id){
        if(Auth::user()->tipo_user=='0' || Auth::user()->tipo_user=='2-4' || Auth::user()->tipo_user=='2-4-2'){

         $medicinas=CmMedicina::find($id);
         $estudiante=Estudiante::find($medicinas->user_id); 
         $antec0=CmAntecedente::where('user_id',$estudiante->user_id)->where('tipo','0')->first();
         $antec1=CmAntecedente::where('user_id',$estudiante->user_id)->where('tipo','1')->first();
         $date = Carbon::now();
         //$date = $date->format('d-m-Y');
         $view =\View::make('pdf.cm.repor-medicina',compact('estudiante','medicinas','antec0','antec1'))->render();
         $pdf = \App::make('dompdf.wrapper');
         $pdf->loadHTML($view);
         return $pdf->download('Ficha médica-'.$estudiante->cod_univ.'.pdf');
         //return $pdf->stream('invoiced');

        }else{
            return back()->with('naranja','Ud. no puede realizar esta acción');
        }
    }

    public function getMedicinatodo($id){
      if(Auth::user()->tipo_user=='0' || Auth::user()->tipo_user=='2-4' || Auth::user()->tipo_user=='2-4-2'){
      $estudiante=Estudiante::find($id); 
      $medicinas=CmMedicina::where('user_id',$estudiante->user_id)->where('imp_dx','<>','')->orderBy('id','desc')->get();
      $antec0=CmAntecedente::where('user_id',$estudiante->user_id)->where('tipo','0')->first();
      $antec1=CmAntecedente::where('user_id',$estudiante->user_id)->where('tipo','1')->first();
      $date = Carbon::now();
      //$date = $date->format('d-m-Y');
      $view =\View::make('pdf.cm.repor-medicina-todo',compact('estudiante','medicinas','antec0','antec1'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      return $pdf->download('Ficha médica (Historial)-'.$estudiante->cod_univ.'.pdf');
      //return $pdf->stream('invoiced');

      }else{
            return back()->with('naranja','no puede realizar esta acción ');
      }
    }
}
