<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Estudiante;
use App\Expediente;
use App\Departamento;
use App\Distrito;
use App\Provincia;
use App\User;
use App\Religion;
use App\EstCivil;
use App\TipoColegio;
use App\CuadroFamiliar;
use App\EgresoFamiliar;
use App\DatosSalud;
use App\Colegio;
use App\FichaSocial;
use Redirect;
use Input;
use Auth;

class PsicoInicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//getDescargar
        $this->middleware('psico');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.psico.inicio.buscar');
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
        //return "Hola";
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
    public function getBuscar(Request $request){
        $cod        = $request->get('cod');
        $estudiante = Estudiante::where('cod_univ',$cod)->first();
        if(!$estudiante){
          $user = User::where('dni', $cod)->first();
          if($user){
             $estudiante = Estudiante::find($user->id);
          }
        }

        if(!$estudiante){
            return Redirect::to('psicoinicio')->with('rojo','Los datos ingresados no pertenecen a ningun estudiante');
        }else{
            //return $this->recargarFormularios('users.enfermera.inicio.vermas.step-11',Input::get('user_id'));
            return $this->recargarFormularios('users.psico.inicio.vermas',$estudiante->user_id);
        }
    }


    public function postGeneral(){
        $user=User::find(Input::get('id'));
        $user->fill(Input::all())->save();
        //Checkbox
            $vc_padre=Input::get('vc_padre');
            $vc_madre=Input::get('vc_madre');
            $vc_hermano=Input::get('vc_hermano');
            $vc_conyugue=Input::get('vc_conyugue');
            $vc_pension=Input::get('vc_pension');
            $vc_otros=Input::get('vc_otros');
        //if no esta marcado recibe el valor de 0
            if($vc_padre==''){
              $vc_padre=='0';
            }
            if($vc_madre==''){
              $vc_madre='0';
            }
            if($vc_hermano==''){
              $vc_hermano='0';
            }
            if($vc_conyugue==''){
              $vc_conyugue='0';
            }
            if($vc_pension==''){
              $vc_pension='0';
            }
            if($vc_otros==''){
              $vc_otros='0';
            }
      $user->vc_padre=$vc_padre;
      $user->vc_madre=$vc_madre;
      $user->vc_hermano=$vc_hermano;
      $user->vc_conyugue=$vc_conyugue;
      $user->vc_pension=$vc_pension;
      $user->vc_otros=$vc_otros;
      $user->save();
    
      //Tabla estudiante
      $estudiante=Estudiante::find(Input::get('id'));
      $estudiante->fill(Input::all())->save();

      //Tabla colegios
      $colegio=Colegio::where('estudiante_id',Input::get('id'))->first();

      $colegios=Colegio::find($colegio->id);
      $colegios->fill(Input::all())->save();
        return $this->recargarFormularios('users.psico.inicio.vermas.formularios.step-11',Input::get('id'));
    }

    public function postRelacionesfamiliares(){
        $rfamiliar=Estudiante::find(Input::get('id'));
        $rfamiliar->fill(Input::all())->save();
        return $this->recargarFormularios('users.psico.inicio.vermas.formularios.step-22',Input::get('id'));
        //return Redirect::to('estudiantefichasocial')->with('verde', $mensaje);
    }
    public function postGastosyotrosdatos(){
        $cubreGastos=Estudiante::find(Input::get('id'));
        $cubreGastos->fill(Input::all())->save();
        $egresos_id=EgresoFamiliar::where('user_id',Input::get('id'))->first();
        $egresoFamiliar=EgresoFamiliar::find($egresos_id->id);
        $egresoFamiliar->fill(Input::all())->save();
        return $this->recargarFormularios('users.psico.inicio.vermas.formularios.step-33',Input::get('id'));
    }

    public function postEditaringresofamiliar(){
        $ifamiliar=Cuadrofamiliar::find(Input::get('id'));
        $ifamiliar->fill(Input::all())->save();
        $id= $ifamiliar->user_id;
        return $this->recargarFormularios('users.psico.inicio.vermas.formularios.step-33',$id);
    }

    public function postNuevocfamiliar(){
        //Primero todos los campos deben estar llenos en caso contrario, retorna sin hacr nada
        //return Input::get('parentesco');
        if ( (Input::get('nombres')=='') && (Input::get('parentesco')=='') && (Input::get('dni')=='') && (Input::get('grado_instrucion')=='') && (Input::get('ocupacion')=='') && (Input::get('residencia')=='')) 
        {
                return $this->recargarFormularios('users.psico.inicio.vermas.formularios.formularios.step-22',Input::get('user_id') );
        }
        $cfamiliar= new Cuadrofamiliar;       
        $cfamiliar->fill(Input::all())->save();
        $cfamiliar->save();

        //Para capturar la fecha modificación de la ficha
        $mensaje="Se creo nuevo integrante";
        return $this->recargarFormularios('users.psico.inicio.vermas.formularios.step-22',Input::get('user_id') );
        //return back()->with('verde', $mensaje);
    }

    public function getCfamiliar($id){
        return Cuadrofamiliar::find($id);
    }
    public function postEliminarcfamiliar(){
      //Solo el usuario correcto puede Eliminar
      $cfamiliar=Cuadrofamiliar::find(Input::get('id'));
      $id=$cfamiliar->user->id;
      CuadroFamiliar::destroy(Input::get('id'));
      return $this->recargarFormularios('users.psico.inicio.vermas.formularios.step-22',$id);
    }

    public function postOtrosdatossalud(){
      $dsalud=User::find(Input::get('elid'));
      $dsalud->fill(Input::all())->save();
       return $this->recargarFormularios('users.psico.inicio.vermas.formularios.step-55',$dsalud->id);
    }
    public function postEcfamiliar(){
        $cfamiliar=CuadroFamiliar::find(Input::get('id'));
        //Solo el usuario correcto puede editar
        $cfamiliar->fill(Input::all())->save();
        $id=$cfamiliar->user->id;
        //Para capturar la fecha modificación de la ficha
        $mensaje="Se actualizaron los datos";
        return $this->recargarFormularios('users.psico.inicio.vermas.formularios.step-22',$id);
        //return Redirect::to('estudiantefichasocial')->with('verde', $mensaje);
    }

    public function getIngresofamiliar($id){
      $ingresoPariente=Cuadrofamiliar::find($id);
      $OtrosParientes=Cuadrofamiliar::lists('parentesco','id');
      return view('users.psico.inicio.vermas.editar-ifamiliar',compact('ingresoPariente','OtrosParientes'));
    }

    
    public function postEditardvivienda(){
        $dvivienda=User::find(Input::get('elid'));
        $dvivienda->fill(Input::all())->save();
        //Servicios
            $agua=Input::get('servicio_agua');
            $luz=Input::get('servicio_luz');
            $desague=Input::get('servicio_desague');
            $letrinas=Input::get('servicio_letrinas');
            $otros=Input::get('servicio_otros');
            $incompletos=Input::get('servicio_incompletos');
        //if no esta marcado recibe el valor de 0
            if($luz==''){
              $luz='0';
            }
            if($agua==''){
              $agua='0';
            }
            if($desague==''){
              $desague='0';
            }
            if($letrinas==''){
              $letrinas='0';
            }
            if($otros==''){
              $otros='0';
            }
            if($incompletos==''){
              $incompletos='0';
            }
        //Llenamos los datos de servicio
           $dvivienda->servicio_luz=$luz;
           $dvivienda->servicio_agua=$agua;
           $dvivienda->servicio_desague=$desague;
           $dvivienda->servicio_letrinas=$letrinas;
           $dvivienda->servicio_otros=$otros;
           $dvivienda->servicio_incompletos=$incompletos;
           $dvivienda->save();
        return $this->recargarFormularios('users.psico.inicio.vermas.formularios.step-44',Input::get('elid'));
    }

    public function recargarFormularios($ruta,$id){
        $user=User::find($id);
        $departamentos=Departamento::lists('departamento','id');
        $provincias=Provincia::lists('provincia','id');
        $distritos=Distrito::lists('distrito','id');
        $religiones=Religion::lists('religion','id');
        $est_civils=EstCivil::lists('est_civil','id');
        $tipoColegios=TipoColegio::lists('tipo','id');
        $parientes=CuadroFamiliar::lists('parentesco','id');
        $cfamiliares=CuadroFamiliar::where('user_id',$id)->get();
        $instruccion=array( ''=>'Seleccione una opción',
                            '1'=>'Primaria completa',
                            '2'=>'Primaria incompleta',
                            '3'=>'Secundaria completa',
                            '4'=>'Secundaria incompleta',
                            '5' =>'Superior técnica completa',
                            '6' =>'Superior técnica incompleta',
                            '7' =>'Universitario completo',
                            '8' =>'Universitario incompleta',
                            '9' =>'Posgrado');
        $TipoFamilias=array( ''=>'Seleccione una opción',
                            '1'=>'Organizada',
                            '2'=>'Desintegrada',
                            '3'=>'Armoniosa',
                            '4'=>'Conflictiva',
                            '5' =>'Otro');
        $TratoPadres=array( ''=>'Seleccione una opción',
                            '1'=>'Buena',
                            '2'=>'Regular',
                            '3'=>'Mala');
        $cubreGastos=array( ''=>'Seleccione una opción',
                            '1'=>'Padres',
                            '2'=>'Solo Padre',
                            '3'=>'Solo Madre',
                            '4'=>'Otros');
        $egresoFamiliar=EgresoFamiliar::where('user_id',$id)->first();
         //4. Datos de vivienda
        $vivienda=array( '1'=>'Propia',
                         '2'=>'Alquilada',
                         '3'=>'Hipotecada',
                         '4'=>'Alojada',
                         '5'=>'Cuidador',
                         '6'=>'Otros');
        $material=array( '1'=>'Noble',
                         '2'=>'Mixto',
                         '3'=>'Rustico');
           $techo=array( '1'=>'Concreto',
                         '2'=>'Calamina',
                         '3'=>'Eternit',
                         '4'=>'Otros');
        $piso=array('1'=>'Parquet',
                         '2'=>'Cemento',
                         '3'=>'Tierra',
                         '4'=>'Otros');
        $datoSalud= Cuadrofamiliar::join('datos_saluds','datos_saluds.miembro_familiar','=','cuadro_familiars.id')->where('cuadro_familiars.user_id',$id)->select('datos_saluds.id as idsalud','cuadro_familiars.parentesco as parentesco','cuadro_familiars.nombres as nombresp','datos_saluds.*')->get();
        $fichasocial=FichaSocial::where('expediente_id',$id)->first();
        
        return view($ruta, compact('user','departamentos','provincias','distritos','religiones','est_civils','tipoColegios','cfamiliares','instruccion','TipoFamilias','TratoPadres','cubreGastos','egresoFamiliar','vivienda','material','techo','piso','datoSalud','fichasocial')); 
     }

     public function postFoto(){
      $file = Input::file('foto');
      if(!empty($file)){
        $user=User::find(Input::get('id'));        
        $name=$user->estudiante->cod_univ.'.png';
        $file->move('imagenes/avatar', $name);
        $user->foto=$name;
        if($user->save()){
             return back()->with('verde','Se actualizó foto');//redirige a enf que es donde se muestran los registros
        }else{
            return back()->with('rojo','No se pudo guardar la foto, vuelva a intentar');
        }
      }
     }
}
