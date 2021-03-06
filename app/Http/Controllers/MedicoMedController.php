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
use DB;
use Yajra\Datatables\Facades\Datatables;

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
    public function getInicio()
    {
        $expedientes=CmMedicina::join('users','users.id','=','cm_medicinas.user_id')
                               ->select(
                                 'cm_medicinas.id',
                                 'cm_medicinas.created_at AS fecha',
                                'users.dni','users.id AS user_id','users.tipo_user AS tipo',
                                DB::raw('CONCAT( users.nombres," ",users.apellido_paterno," ",users.apellido_materno) AS nombres'),
                                'cm_medicinas.imp_dx','cm_medicinas.cita'
                                )->get();

    return Datatables::of($expedientes)->make(true);
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
        //verificamos que exista el expdiente de Méd
        //return $medicina;
        if($medicina==''){
            return back()->with('rojo','Los datos ingresados no pertenecen a ningun usuario');
        }
         $user = User::where('id',$medicina->user_id)->first();
         return $this->recargarFormularios('users.medico.medicina.atencion.ef',$user,$medicina);   
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

        $cod = $request->get('cod');
        //Identificamos si el $cod es un DNI o Cod universitario
        if (strlen($cod)=='8') {
            $user= User::where('dni',$cod)->first();
        }else if(strlen($cod)=='10'){
            $user= User::join('estudiantes','estudiantes.user_id','=','users.id')
                     ->where('estudiantes.cod_univ',$cod)
                     ->select('users.*')->first();
        }else{
            return back()->with('rojo','Los datos ingresados no pertenecen a ningun estudiante');
        }

        //verificamos si existe el usuario
        if(!$user){
            return back()->with('rojo','Los datos ingresados no pertenecen a ningun estudiante');
        }
        return $this->recargarFormularios0('users.medico.medicina.atencion.nuevo',$user);
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

      return $this->recargarFormularios0('users.medico.inicio.registro.step-11',$user);
    }
    public function postAntecedentes0(){
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
      $user=User::find(Input::get('id'));
      return $this->recargarFormularios0('users.medico.inicio.registro.step-22',$user);
    }

    public function postTriaje(){
      //return Input::all();
      $triaje=new CmMedicina;
      $triaje->fill(Input::all())->save();
      $tipo = CmMedicina::find($triaje->id)->user->tipo_user;
      
      //User::join('cm_medicinas','cm_medicina.user_id','=','users.id')->where('cm_medicinas.id');
      return Redirect("medmed")->with('verde','Se registró correctamente la atención');
    }
    public function postActualizartriaje(){
      //return "Input::all()";
      $medicina=CmMedicina::find(Input::get('id'));
      $user=User::find($medicina->user_id);
      $medicina->fill(Input::all())->save();
      $medicina=CmMedicina::find(Input::get('id'));
      return $this->recargarFormularios('users.medico.inicio.vermas.step-actualizartriaje', $user,$medicina);
    }

    public function postProcedimientos(){
        $consulta=new CmMedProc;
        $consulta->fill(Input::all())->save();
        $user=User::find(Input::get('user_id'));
        $medicina=CmMedicina::find(Input::get('medicina_id'));
        return $this->recargarFormularios('users.medico.inicio.vermas.step-ef-tablas',$user,$medicina);
    }

    public function getCprocedimientos($id){ //Cargar procedimientos al modalActualizar
        return CmMedProc::find($id);
    }
    public function postAprocedimientos(){//Actualizar
        $consulta=CmMedProc::find(Input::get('id'));
        $consulta->fill(Input::all())->save();
        $user=User::find(Input::get('user_id'));
        $medicina=CmMedicina::find($consulta->medicina_id);
        return $this->recargarFormularios('users.medico.inicio.vermas.step-ef-tablas',$user,$medicina);
    }
    public function postEprocedimientos(){//Eliminar
        $consulta=CmMedProc::find(Input::get('id'));
        $estudiante=Estudiante::find(Input::get('user_id'));
        $medicina=CmMedicina::find($consulta->medicina_id);
        CmMedProc::destroy(Input::get('id'));
        return $this->recargarFormularios('users.medico.inicio.vermas.step-ef-tablas',$estudiante,$medicina);
    }

    public function postMedicamentos(){
        $consulta=new MedMed;
        $consulta->fill(Input::all())->save();
        $user=User::find(Input::get('user_id'));
        $medicina=CmMedicina::find(Input::get('medicina_id'));
        return $this->recargarFormularios('users.medico.inicio.vermas.step-ef-tablas',$user,$medicina);
    }
    public function getCmedicamentos($id){ //Cargar Medicamentos al modalActualizar
        return MedMed::find($id);
    }
    public function postAmedicamentos(){//Actualizar

        $consulta=MedMed::find(Input::get('m_id'));
        $consulta->fill(Input::all())->save();
        $user=User::find(Input::get('user_id'));
        $medicina=CmMedicina::find($consulta->medicina_id);
        return $this->recargarFormularios('users.medico.inicio.vermas.step-ef-tablas',$user,$medicina);
    }
    public function postEmedicamentos(){//Eliminar

        $consulta=MedMed::find(Input::get('m_id'));
        $estudiante=Estudiante::find(Input::get('user_id'));
        $medicina=CmMedicina::find($consulta->medicina_id);
        MedMed::destroy(Input::get('m_id'));
        return $this->recargarFormularios('users.medico.inicio.vermas.step-ef-tablas',$estudiante,$medicina);
    }

    //Registrar -Actualizar Examen físico
    public function postEf(){//Eliminar
        $consulta=CmMedicina::find(Input::get('m_id'));
        $consulta->fill(Input::all())->save();
        $tipo = $consulta->user->tipo_user;
         
        return Redirect::to("medmed")->with('verde','Se registró atención correctamente');
    }

    public function recargarFormularios0($ruta,$user){
         $religiones=Religion::lists('religion','id');
         $est_civils=EstCivil::lists('est_civil','id');
         $departamentos=Departamento::lists('departamento','id');
         $provincias=Provincia::lists('provincia','id');
         $distritos=Distrito::lists('distrito','id');
         $antec0=CmAntecedente::where('user_id',$user->id)->where('tipo','0')->first();
         $antec1=CmAntecedente::where('user_id',$user->id)->where('tipo','1')->first();
            return view($ruta, compact('user','religiones','est_civils','departamentos','provincias','distritos','antec1','antec0'));
        
     }
     public function recargarFormularios0no($ruta,$user){
         $religiones=Religion::lists('religion','id');
         $est_civils=EstCivil::lists('est_civil','id');
         $departamentos=Departamento::lists('departamento','id');
         $provincias=Provincia::lists('provincia','id');
         $distritos=Distrito::lists('distrito','id');
         $antec0=CmAntecedente::where('user_id',$user->id)->where('tipo','0')->first();
         $antec1=CmAntecedente::where('user_id',$user->id)->where('tipo','1')->first();
         $usuario = array('1' => 'Ingresante','2'=>'Docente','3'=>'Administrativo','4'=>'Público');
            return view($ruta, compact('user','religiones','est_civils','departamentos','provincias','distritos','antec1','antec0','usuario'));
     }

     public function recargarFormularios($ruta,$user,$medicina){
            $religiones=Religion::lists('religion','id');
            $est_civils=EstCivil::lists('est_civil','id');
            $departamentos=Departamento::lists('departamento','id');
            $provincias=Provincia::lists('provincia','id');
            $distritos=Distrito::lists('distrito','id');
            $procedimientos=CmProcedimiento::where('area','0')->lists('procedimiento','id');
            $medicamentos=CmMedicamento::get();
            $antec0=CmAntecedente::where('user_id',$user->id)->where('tipo','0')->first();
            $antec1=CmAntecedente::where('user_id',$user->id)->where('tipo','1')->first();
            $mps=CmMedProc::where('medicina_id',$medicina->id)->get();
            $mms=MedMed::where('medicina_id',$medicina->id)->get();
            return view($ruta, compact('user','medicina','religiones','est_civils','departamentos','provincias','distritos','procedimientos','medicamentos','antec1','antec0','mps','mms'));  
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
                if($recetas=='[]'){
                   return Redirect::to('medmed')->with('azul','aún no se ha registrado ninguna receta médica'); 
                }
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

     public function postEnf(){
            $id=Input::get('medicina_id');
            $r_enf=CmReporEnfermedad::where('medicina_id',$id)->first();
            if($r_enf){
               //PDF
               $view =  \View::make('pdf.cm.enf', compact('r_enf'))->render();
               $pdf = \App::make('dompdf.wrapper');
               $pdf->loadHTML($view);
               return $pdf->download('Constancia por Enfermedad - '.$r_enf->medicina->user->dni.'.pdf');
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
               return $pdf->download('Constancia por Enfermedad - '.$r_enf->medicina->user->dni.'.pdf');
                return Redirect::to('medmed');
            }
            return Input::all();
     }
     //TABLAS DE REPORTE
     public function getTablatbc(){
        $tbcs=CmReporTbc::get();
        return view('users.medico.medicina.descarteTbc',compact('tbcs'));
     }
     public function getTablabs(){
        $tbcs=CmReporBsalud::get();
        return view('users.medico.medicina.constanciaBs',compact('tbcs'));
     }
     public function getTablaenf(){
        $tbcs=CmReporEnfermedad::get();
        return view('users.medico.medicina.constanciaEnf',compact('tbcs'));
     }


    
}
