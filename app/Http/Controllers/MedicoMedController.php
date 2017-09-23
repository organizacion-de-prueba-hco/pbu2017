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

class MedicoMedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//getDescargar
        $this->middleware('medico');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicina=CmMedicina::get();
        return view('users.medico.medicina.atencion',compact('medicina'));
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

        $medicina = CmMedicina::find($id);
        $cod=$medicina->user->estudiante->cod_univ;

        $estudiante = Estudiante::where('cod_univ',$cod)->first();
        if(!$estudiante){
          $user = User::where('dni', $cod)->first();
          if($user){
             $estudiante = Estudiante::find($user->id);
          }
        }

        if(!$estudiante){
            return Redirect::to('medmed')->with('rojo','Los datos ingresados no pertenecen a ningun estudiante');
        }else{
            //return $this->recargarFormularios('users.enfermera.inicio.vermas.step-11',Input::get('user_id'));
            return $this->recargarFormularios('users.medico.medicina.atencion.ef',$estudiante,$medicina);
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
            return Redirect::to('medmed')->with('rojo','Los datos ingresados no pertenecen a ningun estudiante');
        }else{
            return $this->recargarFormularios0('users.medico.medicina.atencion.nuevo',$estudiante);
        }
    }

    public function postFiliacion0(){
      //return "Holitas...";
      $user=User::find(Input::get('id'));
      $user->fill(Input::all())->save();
      $estudiante=Estudiante::find(Input::get('id'));

      $cfamiliar=CuadroFamiliar::where('nombres','Estudiante')->where('parentesco','YO')->where('user_id',Input::get('id'))->first();

      $ocupacion=CuadroFamiliar::find($cfamiliar->id);
      $ocupacion->ocupacion=Input::get('ocupacion');
      $ocupacion->save();
      //$opinion->fill(Input::all())->save();

      return $this->recargarFormularios0('users.medico.inicio.registro.step-11',$estudiante);
    }
    public function postAntecedentes0(){
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
      return $this->recargarFormularios0('users.medico.inicio.registro.step-22',$estudiante);
    }

    public function postTriaje(){
      //return Input::all();
      $triaje=new CmMedicina;
      $triaje->fill(Input::all())->save();
      return Redirect('medmed')->with('verde','Se registró correctamente la atención');
    }
    public function postActualizartriaje(){
      //return Input::all();
      $medicina=CmMedicina::find(Input::get('id'));
      $estudiante=Estudiante::find($medicina->user_id);
      $medicina->fill(Input::all())->save();
      $medicina=CmMedicina::find(Input::get('id'));
      return $this->recargarFormularios('users.medico.inicio.vermas.step-actualizartriaje',$estudiante,$medicina);
    }

    public function postProcedimientos(){
        $consulta=new CmMedProc;
        $consulta->fill(Input::all())->save();
        $estudiante=Estudiante::find(Input::get('user_id'));
        $medicina=CmMedicina::find(Input::get('medicina_id'));
        return $this->recargarFormularios('users.medico.inicio.vermas.step-ef',$estudiante,$medicina);
    }

    public function getCprocedimientos($id){ //Cargar procedimientos al modalActualizar
        return CmMedProc::find($id);
    }
    public function postAprocedimientos(){//Actualizar
        $consulta=CmMedProc::find(Input::get('id'));
        $consulta->fill(Input::all())->save();
        $estudiante=Estudiante::find(Input::get('user_id'));
        $medicina=CmMedicina::find($consulta->medicina_id);
        return $this->recargarFormularios('users.medico.inicio.vermas.step-ef',$estudiante,$medicina);
    }
    public function postEprocedimientos(){//Eliminar
        $consulta=CmMedProc::find(Input::get('id'));
        $estudiante=Estudiante::find(Input::get('user_id'));
        $medicina=CmMedicina::find($consulta->medicina_id);
        CmMedProc::destroy(Input::get('id'));
        return $this->recargarFormularios('users.medico.inicio.vermas.step-ef',$estudiante,$medicina);
    }

    public function postMedicamentos(){
        $consulta=new MedMed;
        $consulta->fill(Input::all())->save();
        $estudiante=Estudiante::find(Input::get('user_id'));
        $medicina=CmMedicina::find(Input::get('medicina_id'));
        return $this->recargarFormularios('users.medico.inicio.vermas.step-ef',$estudiante,$medicina);
    }
    public function getCmedicamentos($id){ //Cargar Medicamentos al modalActualizar
        return MedMed::find($id);
    }
    public function postAmedicamentos(){//Actualizar

        $consulta=MedMed::find(Input::get('m_id'));
        $consulta->fill(Input::all())->save();
        $estudiante=Estudiante::find(Input::get('user_id'));
        $medicina=CmMedicina::find($consulta->medicina_id);
        return $this->recargarFormularios('users.medico.inicio.vermas.step-ef',$estudiante,$medicina);
    }
    public function postEmedicamentos(){//Eliminar

        $consulta=MedMed::find(Input::get('m_id'));
        $estudiante=Estudiante::find(Input::get('user_id'));
        $medicina=CmMedicina::find($consulta->medicina_id);
        MedMed::destroy(Input::get('m_id'));
        return $this->recargarFormularios('users.medico.inicio.vermas.step-ef',$estudiante,$medicina);
    }

    public function postEf(){//Eliminar
        
        $consulta=CmMedicina::find(Input::get('m_id'));
        $consulta->fill(Input::all())->save();
        return Redirect::to('medmed')->with('verde','Se registró atención correctamente');
    }

    public function recargarFormularios0($ruta,$estudiante){
            $religiones=Religion::lists('religion','id');
            $est_civils=EstCivil::lists('est_civil','id');
            $departamentos=Departamento::lists('departamento','id');
            $provincias=Provincia::lists('provincia','id');
            $distritos=Distrito::lists('distrito','id');
            $antec0=CmAntecedente::where('user_id',$estudiante->user_id)->where('tipo','0')->first();
            $antec1=CmAntecedente::where('user_id',$estudiante->user_id)->where('tipo','1')->first();
            return view($ruta, compact('estudiante','religiones','est_civils','departamentos','provincias','distritos','antec1','antec0'));
        
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

     public function getDescargareporte($tipo, $id){
        $med=CmMedicina::find($id);
        if(!$med) {
            return Redirect::to('medmed')->with('azul','Estado pendiente, no puede generar reportes o constancias');
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
                return $pdf->download('Receta Médica.pdf');
            break;
            case '2': 
                $r_tbc=CmReporTbc::where('medicina_id',$id)->first();
                if($r_tbc){
                    //PDF
                    $r_tbc=CmReporTbc::where('medicina_id',$id)->first();
                    $view =  \View::make('pdf.cm.tbc', compact('date','r_tbc'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    return $pdf->download('Descarte de TBC.pdf');
                    
                }else{
                    $tbc=new CmReporTbc;
                    $tbc->medicina_id=$id;
                    $tbc->save();
                    //PDF
                    $r_tbc=CmReporTbc::where('medicina_id',$id)->first();
                    $view =  \View::make('pdf.cm.tbc', compact('date','r_tbc'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    return $pdf->download('Descarte de TBC.pdf');
                }
            break;
            case '3': 
                $r_bs=CmReporBsalud::where('medicina_id',$id)->first();
                if($r_bs){
                    //PDF
                    $view =  \View::make('pdf.cm.bs', compact('date','r_bs'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    return $pdf->download('Constancia de Buena Salud.pdf');
                    
                }else{
                    $bs=new CmReporBsalud;
                    $bs->medicina_id=$id;
                    $bs->save();
                    //PDF
                    $r_bs=CmReporBsalud::where('medicina_id',$id)->first();
                    $view =  \View::make('pdf.cm.bs', compact('date','r_bs'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    return $pdf->download('Constancia de Buena Salud.pdf');
                }
            break;
            case '4':
                $r_enf=CmReporEnfermedad::where('medicina_id',$id)->first();
                if($r_enf){
                    //PDF
                    $view =  \View::make('pdf.cm.enf', compact('date','r_enf'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    return $pdf->download('Constancia por Enfermedad.pdf');
                }else{
                    return view('users.medico.medicina.atencion.enf',compact('id'));
                }
                return "Constancia por enfermedad";
            break;
            default: return Redirect::to('medmed')->with('naranja','Algo salió mal'); break;
        }

 
       
        //$date = $date->format('d-m-Y');
       
         //$pdf->stream('invoiced');
        }
     }

     public function postEnf(){
            $id=Input::get('medicina_id');
            $r_enf=CmReporEnfermedad::where('medicina_id',$id)->first();
            if($r_enf){
               //PDF
               $view =  \View::make('pdf.cm.enf', compact('r_enf'))->render();
               $pdf = \App::make('dompdf.wrapper');
               $pdf->loadHTML($view);
               return $pdf->download('Constancia por Enfermedad.pdf');
            }else{
                $bs=new CmReporEnfermedad;
                $bs->medicina_id=$id;
                $bs->periodo=Input::get('periodo');
                $bs->save();

               //PDF
                 $r_enf=CmReporEnfermedad::where('medicina_id',$id)->first();
               $view =  \View::make('pdf.cm.enf', compact('r_enf'))->render();
               $pdf = \App::make('dompdf.wrapper');
               $pdf->loadHTML($view);
               return $pdf->download('Constancia por Enfermedad.pdf');
                return Redirect::to('medmed');
            }
            return Input::all();
     }


    
}
