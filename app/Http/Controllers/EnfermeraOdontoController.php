<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CmOdontologia;
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

class EnfermeraOdontoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//getDescargar
        $this->middleware('enfermera',['except' => ['getInicio']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   //return "Hola";
        $odontologia=CmOdontologia::get();
        return view('users.enfermera.odontologia.atencion',compact('odontologia'));
    }
    public function getInicio()
    {
        $consulta=CmOdontologia::join('users','users.id','=','cm_odontologias.user_id')
         ->select(
         'cm_odontologias.id',
         'cm_odontologias.created_at AS fecha',
         'users.dni','users.id AS user_id','users.tipo_user AS tipo',
         DB::raw('CONCAT( users.nombres," ",users.apellido_paterno," ", 
         users.apellido_materno) AS nombres'),
         'cm_odontologias.iv_diagnostico AS dx', 'cm_odontologias.i_motivo_consulta AS mc')->get();

        return Datatables::of($consulta)->make(true);
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
         return $this->recargarFormularios('users.enfermera.odontologia.atencion.nuevo',$user);
    }

    public function postFiliacion(){
      $user=User::find(Input::get('id'));
      return $user;
      $user->fill(Input::all())->save();
      return $this->recargarFormularios('users.enfermera.odontologia.atencion.nuevo.step-11',$user);
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
      return $this->recargarFormularios('users.enfermera.odontologia.atencion.nuevo.step-22',$estudiante);
    }

    public function recargarFormularios($ruta,$user){
        $religiones=Religion::lists('religion','id');
        $est_civils=EstCivil::lists('est_civil','id');
        $departamentos=Departamento::lists('departamento','id');
        $provincias=Provincia::lists('provincia','id');
        $distritos=Distrito::lists('distrito','id');
        $antec0=CmAntecedente::where('user_id',$user->id)->where('tipo','0')->first();
        $antec1=CmAntecedente::where('user_id',$user->id)->where('tipo','1')->first();
        return view($ruta, compact('user','religiones','est_civils','departamentos','provincias','distritos','antec1','antec0'));
        
     }

     public function postRegistrar(){
      //return Input::all();
      $registrar=new CmOdontologia;
      $registrar->fill(Input::all())->save();
      return Redirect('enfodonto')->with('verde','Se registró correctamente una nueva atención');
    }
}
