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
use Carbon\Carbon;
use App\InformeNutricion;
use App\CmReporTbc;
use App\CmReporBsalud;
use App\CmReporEnfermedad;

use Redirect;
use Input;
use Auth;

class EnfermeraMedController extends Controller
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
        $medicina=CmMedicina::get();
        return view('users.enfermera.medicina.atencion',compact('medicina'));
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

    public function getNuevo(Request $request){

       $cod        = $request->get('cod');
        $estudiante = Estudiante::where('cod_univ',$cod)->first();
        if(!$estudiante){
          $user = User::where('dni', $cod)->first();
          if($user){
             $estudiante = Estudiante::find($user->id);
          }
        }

        if(!$estudiante){
            return Redirect::to('enfmed')->with('rojo','Los datos ingresados no pertenecen a ningun estudiante');
        }else{
            //return $this->recargarFormularios('users.enfermera.inicio.vermas.step-11',Input::get('user_id'));
            return $this->recargarFormularios('users.enfermera.medicina.atencion.nuevo',$estudiante);
        }
    }

    public function postFiliacion(){
      //return "Holitas...";
      $user=User::find(Input::get('id'));
      $user->fill(Input::all())->save();
      $estudiante=Estudiante::find(Input::get('id'));

      $cfamiliar=CuadroFamiliar::where('nombres','Estudiante')->where('parentesco','YO')->where('user_id',Input::get('id'))->first();

      $ocupacion=CuadroFamiliar::find($cfamiliar->id);
      $ocupacion->ocupacion=Input::get('ocupacion');
      $ocupacion->save();
      //$opinion->fill(Input::all())->save();

      return $this->recargarFormularios('users.enfermera.inicio.vermas.step-11',$estudiante);
    }
    public function postAntecedentes(){
      //return "Holitas...";
      for ($i=0; $i <=1 ; $i++) { 
         $id=Input::get('id'.$i);
         $antec=CmAntecedente::find($id);
         $antec->user_id=Input::get('id');
         $antec->c_alcohol=Input::get('c_alcohol_'.$i);
         $antec->c_droga=Input::get('c_droga_'.$i);
         $antec->c_tabaco=Input::get('c_tabaco_'.$i);
         $antec->c_cafe=Input::get('c_cafe_'.$i);
         $antec->p_hepatitis=Input::get('p_hepatitis_'.$i);
         $antec->p_tifoidea=Input::get('p_tifoidea_'.$i);
         $antec->p_tbc=Input::get('p_tbc_'.$i);
         $antec->p_hta=Input::get('p_hta_'.$i);
         $antec->p_dm=Input::get('p_dm_'.$i);
         $antec->p_asma=Input::get('p_asma_'.$i);
         $antec->p_otros=Input::get('p_otros_'.$i);
         $antec->p_otros_desc=Input::get('p_otros_desc_'.$i);
         $antec->qx=Input::get('qx_'.$i);
         $antec->save();

      }
      $estudiante=Estudiante::find(Input::get('id'));
      return $this->recargarFormularios('users.enfermera.inicio.vermas.step-22',$estudiante);
    }

    public function postTriaje(){
      //return Input::all();
      $triaje=new CmMedicina;
      $triaje->fill(Input::all())->save();
      return Redirect('enfmed')->with('verde','Se registró correctamente la atención');
    }

     public function recargarFormularios($ruta,$estudiante){
        $religiones=Religion::lists('religion','id');
        $est_civils=EstCivil::lists('est_civil','id');
        $departamentos=Departamento::lists('departamento','id');
        $provincias=Provincia::lists('provincia','id');
        $distritos=Distrito::lists('distrito','id');
        $antec0=CmAntecedente::where('user_id',$estudiante->user_id)->where('tipo','0')->first();
        $antec1=CmAntecedente::where('user_id',$estudiante->user_id)->where('tipo','1')->first();
        return view($ruta, compact('estudiante','religiones','est_civils','departamentos','provincias','distritos','antec1','antec0'));
        
     }
     //TABLAS DE REPORTE
     public function getTablatbc(){
        $tbcs=CmReporTbc::get();
        return view('users.enfermera.medicina.descarteTbc',compact('tbcs'));
     }
     public function getTablabs(){
        $tbcs=CmReporBsalud::get();
        return view('users.enfermera.medicina.constanciaBs',compact('tbcs'));
     }
     public function getTablaenf(){
        $tbcs=CmReporEnfermedad::get();
        return view('users.enfermera.medicina.constanciaEnf',compact('tbcs'));
     }

    public function getDescargareporte($tipo, $id){
        $med=CmMedicina::find($id);
        if(!$med) {
            return back()->with('azul','Estado pendiente, no se ha generado aún este reporte');
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
                return $pdf->download('Receta Médica - '.$medicina->user->dni.'.pdf');
            break;
            case '2': 
                $r_tbc=CmReporTbc::where('medicina_id',$id)->first();
                if($r_tbc){
                    //PDF
                    $r_tbc=CmReporTbc::where('medicina_id',$id)->first();
                    $view =  \View::make('pdf.cm.tbc', compact('date','r_tbc'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    return $pdf->download('Descarte de TBC -'.$r_tbc->medicina->user->dni.'.pdf');
                    
                }else{
                    return back()->with('naranja','No se encontró PDF');
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
                    return back()->with('naranja','No se encontró PDF');
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
                    return back()->with('naranja','No se encontró PDF');
                }
            break;
            default: return back()->with('naranja','Algo salió mal'); break;
        }

        }
     }
    
}
