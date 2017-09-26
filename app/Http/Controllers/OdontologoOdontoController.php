<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CmOdontologia;
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
use Carbon\Carbon;
use App\InformeNutricion;
use App\CmReporTbc;
use App\CmReporBsalud;
use App\CmReporEnfermedad;

use Redirect;
use Input;
use Auth;

class OdontologoOdontoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//getDescargar
        $this->middleware('odonto');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $odontologia=CmOdontologia::get();
        return view('users.odontologo.odontologia.atencion',compact('odontologia'));
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
        $odontologia = CmOdontologia::find($id);
        $cod=$odontologia->user->estudiante->cod_univ;

        $estudiante = Estudiante::where('cod_univ',$cod)->first();
        if(!$estudiante){
          $user = User::where('dni', $cod)->first();
          if($user){
             $estudiante = Estudiante::find($user->id);
          }
        }

        if(!$estudiante){
            return Redirect::to('odontoodonto')->with('rojo','Los datos ingresados no pertenecen a ningun estudiante');
        }else{
            return $this->recargarFormularios('users.odontologo.odontologia.verMas',$estudiante,$odontologia);
        }        
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

    public function getDescargareporte($tipo, $id){
        $med=CmOdontologia::find($id);
        if(!$med) {
            return Redirect::to('odontodonto')->with('azul','Estado pendiente, no puede generar reportes o constancias');
        }
        else{
        $date = Carbon::now();
        switch ($tipo) {
            case '1':
                $recetas = MedMed::where('medicina_id',$id)->get();
                $medicina = CmMedicina::find($id);
                $view =  \View::make('pdf.cm.rm', compact('date','recetas','medicina'))->render();
                $pdf = \App::make('dompdf.wrapper');
                $pdf->loadHTML($view);
                return $pdf->download('Receta Médica - '.$med->user->dni.'.pdf');
            break;
            case '2': 
                $r_tbc=CmReporTbc::where('medicina_id',$id)->first();
                if($r_tbc){
                    //PDF
                    $r_tbc=CmReporTbc::where('medicina_id',$id)->first();
                    $view =  \View::make('pdf.cm.tbc', compact('date','r_tbc'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    return $pdf->download('Descarte de TBC - '.$med->user->dni.'.pdf');
                    
                }else{
                    $tbc=new CmReporTbc;
                    $tbc->medicina_id=$id;
                    $tbc->save();
                    //PDF
                    $r_tbc=CmReporTbc::where('medicina_id',$id)->first();
                    $view =  \View::make('pdf.cm.tbc', compact('date','r_tbc'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    return $pdf->download('Descarte de TBC - '.$med->user->dni.'.pdf');
                }
            break;
            case '3': 
                $r_bs=CmReporBsalud::where('medicina_id',$id)->first();
                if($r_bs){
                    //PDF
                    $view =  \View::make('pdf.cm.bs', compact('date','r_bs'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    return $pdf->download('Constancia de Buena Salud - '.$med->user->dni.'.pdf');
                    
                }else{
                    $bs=new CmReporBsalud;
                    $bs->medicina_id=$id;
                    $bs->save();
                    //PDF
                    $r_bs=CmReporBsalud::where('medicina_id',$id)->first();
                    $view =  \View::make('pdf.cm.bs', compact('date','r_bs'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    return $pdf->download('Constancia de Buena Salud - '.$med->user->dni.'.pdf');
                }
            break;
            case '4':
                $r_enf=CmReporEnfermedad::where('medicina_id',$id)->first();
                if($r_enf){
                    //PDF
                    $view =  \View::make('pdf.cm.enf', compact('date','r_enf'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    return $pdf->download('Constancia por Enfermedad - '.$med->user->dni.'.pdf');
                }else{
                    return view('users.medico.medicina.atencion.enf',compact('id'));
                }
                return "Constancia por enfermedad";
            break;
            default: return Redirect::to('medmed')->with('naranja','Algo salió mal'); break;
        }
        }
     }

     public function recargarFormularios($ruta,$estudiante,$medicina){
            $religiones=Religion::lists('religion','id');
            $est_civils=EstCivil::lists('est_civil','id');
            $departamentos=Departamento::lists('departamento','id');
            $provincias=Provincia::lists('provincia','id');
            $distritos=Distrito::lists('distrito','id');
            $procedimientos=CmProcedimiento::where('area','0')->lists('procedimiento','id');
            $medicamentos=CmMedicamento::get();
            $antec0=CmAntecedente::where('user_id',$estudiante->user_id)->where('tipo','0')->first();
            $antec1=CmAntecedente::where('user_id',$estudiante->user_id)->where('tipo','1')->first();
            $mps=CmMedProc::where('medicina_id',$medicina->id)->get();
            $mms=MedMed::where('medicina_id',$medicina->id)->get();
            return view($ruta, compact('estudiante','medicina','religiones','est_civils','departamentos','provincias','distritos','procedimientos','medicamentos','antec1','antec0','mps','mms'));  
     }
}
