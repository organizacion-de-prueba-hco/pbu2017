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
use App\CmOdoProc;
use App\CmMedicamento;
use App\CmOdoMed;
use Carbon\Carbon;
use App\InformeNutricion;
use App\CmReporTbc;
use App\CmReporBsalud;
use App\CmReporEnfermedad;
use App\CmOdoAtencion;

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
                $recetas = CmOdoMed::where('odontologia_id',$id)->get();
                $medicina = CmOdontologia::find($id);
                $view =  \View::make('pdf.cm.ro', compact('date','recetas','medicina'))->render();
                $pdf = \App::make('dompdf.wrapper');
                $pdf->loadHTML($view);
                return $pdf->download('Receta-Odontología - '.$med->user->dni.'.pdf');
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
            default: return Redirect::to('odontodonto')->with('naranja','Algo salió mal'); break;
        }
        }
     }

     public function postRegistrar(){
        //return Input::all();
        $registro=CmOdontologia::find(Input::get('o_id'));
        $registro->fill(Input::all())->save();
        $registro->ii_a=Input::get('ii_a');
        $registro->ii_b=Input::get('ii_b');
        $registro->ii_c=Input::get('ii_c');
        $registro->ii_d=Input::get('ii_d');

        $registro->iii_xi=Input::get('iii_xi');
        $registro->iii_xii=Input::get('iii_xii');
        $registro->iii_xiii=Input::get('iii_xiii');
        $registro->iii_xiv=Input::get('iii_xiv');
        $registro->iii_xv=Input::get('iii_xv');
        $registro->iii_xvi=Input::get('iii_xvi');
        $registro->iii_xvii=Input::get('iii_xvii');
        $registro->iii_xviii=Input::get('iii_xviii');
        $registro->iii_xxi=Input::get('iii_xxi');
        $registro->iii_xxii=Input::get('iii_xxii');
        $registro->iii_xxiii=Input::get('iii_xxiii');
        $registro->iii_xxiv=Input::get('iii_xxiv');
        $registro->iii_xxv=Input::get('iii_xxv');
        $registro->iii_xxvi=Input::get('iii_xxvi');
        $registro->iii_xxvi=Input::get('iii_xxvi');
        $registro->iii_xxvii=Input::get('iii_xxvii');
        $registro->iii_xxviii=Input::get('iii_xxviii');
        $registro->iii_xxxi=Input::get('iii_xxxi');
        $registro->iii_xxxi=Input::get('iii_xxxi');
        $registro->iii_xxxii=Input::get('iii_xxxii');
        $registro->iii_xxxiii=Input::get('iii_xxxiii');
        $registro->iii_xxxiv=Input::get('iii_xxxiv');
        $registro->iii_xxxv=Input::get('iii_xxxv');
        $registro->iii_xxxvi=Input::get('iii_xxxvi');
        $registro->iii_xxxvii=Input::get('iii_xxxvii');
        $registro->iii_xxxviii=Input::get('iii_xxxviii');
        $registro->iii_xli=Input::get('iii_xli');
        $registro->iii_xlii=Input::get('iii_xlii');
        $registro->iii_xliii=Input::get('iii_xliii');
        $registro->iii_xliv=Input::get('iii_xliv');
        $registro->iii_xlv=Input::get('iii_xlv');
        $registro->iii_li=Input::get('iii_li');
        $registro->iii_lii=Input::get('iii_lii');
        $registro->iii_liii=Input::get('iii_liii');
        $registro->iii_liv=Input::get('iii_liv');
        $registro->iii_lv=Input::get('iii_lv');
        $registro->iii_lxi=Input::get('iii_lxi');
        $registro->iii_lxii=Input::get('iii_lxii');
        $registro->iii_lxiii=Input::get('iii_lxiii');
        $registro->iii_lxiv=Input::get('iii_lxiv');
        $registro->iii_lxv=Input::get('iii_lxv');
        $registro->iii_lxxi=Input::get('iii_lxxi');
        $registro->iii_lxxii=Input::get('iii_lxxii');
        $registro->iii_lxxiii=Input::get('iii_lxxiii');
        $registro->iii_lxxiv=Input::get('iii_lxxiv');
        $registro->iii_lxxv=Input::get('iii_lxxv');
        $registro->iii_lxxxi=Input::get('iii_lxxxi');
        $registro->iii_lxxxii=Input::get('iii_lxxxii');
        $registro->iii_lxxxiii=Input::get('iii_lxxxiii');
        $registro->iii_lxxxiv=Input::get('iii_lxxxiv');
        $registro->iii_lxxxv=Input::get('iii_lxxxv');

        $registro->iii_b_a=Input::get('iii_b_a');
        $registro->iii_b_b=Input::get('iii_b_b');
        $registro->iii_b_c=Input::get('iii_b_c');
        $registro->iii_b_d=Input::get('iii_b_d');
        $registro->iii_b_e=Input::get('iii_b_e');
        $registro->iii_b_f=Input::get('iii_b_f');
        $registro->iii_b_otros=Input::get('iii_b_otros');

        $registro->save();
      return Redirect('odontodonto')->with('verde','Se registró correctamente la atención');
     }
     public function postProcedimientos(){//NUevo Procedimientos
        //return "Hola";
        $consulta=new CmOdoProc;
        $consulta->fill(Input::all())->save();
        $estudiante=Estudiante::find(Input::get('user_id'));
        $odontologia=CmOdontologia::find(Input::get('odontologia_id'));
        return $this->recargarFormularios('users.odontologo.odontologia.vermas.step-33-tablas',$estudiante,$odontologia);
     }

     public function getCprocedimientos($id){ //Cargar procedimientos al modalActualizar
        return CmOdoProc::find($id);
     }

     public function postAprocedimientos(){//Actualizar
        $consulta=CmOdoProc::find(Input::get('id'));
        $consulta->fill(Input::all())->save();
        $estudiante=Estudiante::find(Input::get('user_id'));
        $odontologia=CmOdontologia::find($consulta->odontologia_id);
        return $this->recargarFormularios('users.odontologo.odontologia.vermas.step-33-tablas',$estudiante,$odontologia);
    }

    public function postEprocedimientos(){//Eliminar
        $consulta=CmOdoProc::find(Input::get('id'));
        $estudiante=Estudiante::find(Input::get('user_id'));
        $odontologia=CmOdontologia::find($consulta->odontologia_id);
        CmOdoProc::destroy(Input::get('id'));
        return $this->recargarFormularios('users.odontologo.odontologia.vermas.step-33-tablas',$estudiante,$odontologia);
    }
    public function getCmedicamentos($id){ //Cargar procedimientos al modalActualizar
       //return "Tio Jones";
        return CmOdoMed::find($id);
     }
    public function postMedicamentos(){
        //return "Hola";
        $consulta=new CmOdoMed;
        $consulta->fill(Input::all())->save();
        $estudiante=Estudiante::find(Input::get('user_id'));
        $odontologia=CmOdontologia::find(Input::get('odontologia_id'));
        return $this->recargarFormularios('users.odontologo.odontologia.vermas.step-33-tablas',$estudiante,$odontologia);
     }
     public function postEmedicamentos(){//Eliminar
        $consulta=CmOdoMed::find(Input::get('m_id'));
        $estudiante=Estudiante::find(Input::get('user_id'));
        $odontologia=CmOdontologia::find($consulta->odontologia_id);
        CmOdoMed::destroy(Input::get('m_id'));
        return $this->recargarFormularios('users.odontologo.odontologia.vermas.step-33-tablas',$estudiante,$odontologia);
    }
    public function postAmedicamentos(){//Actualizar
        $consulta=CmOdoMed::find(Input::get('m_id'));
        $consulta->fill(Input::all())->save();
        $estudiante=Estudiante::find(Input::get('user_id'));
        $odontologia=CmOdontologia::find($consulta->odontologia_id);
        return $this->recargarFormularios('users.odontologo.odontologia.vermas.step-33-tablas',$estudiante,$odontologia);
    }

     public function postAtenciones(){//NUevo Atenciones
      //return "Hola";
        $consulta=new CmOdoAtencion;
        $consulta->fill(Input::all())->save();
        $estudiante=Estudiante::find(Input::get('user_id'));
        $odontologia=CmOdontologia::find(Input::get('odontologia_id'));
        return $this->recargarFormularios('users.odontologo.odontologia.vermas.step-33-tablas',$estudiante,$odontologia);
     }

     public function getCatenciones($id){ //Cargar procedimientos al modalActualizar
        return CmOdoAtencion::find($id);
     }
     public function postEatenciones(){//Eliminar
      // return Input::get('id');
        $consulta=CmOdoAtencion::find(Input::get('id'));
        $estudiante=Estudiante::find(Input::get('user_id'));
        $odontologia=CmOdontologia::find($consulta->odontologia_id);
        CmOdoAtencion::destroy(Input::get('id'));
        return $this->recargarFormularios('users.odontologo.odontologia.vermas.step-33-tablas',$estudiante,$odontologia);
    }
    public function postAatenciones(){//Actualizar
        $consulta=CmOdoAtencion::find(Input::get('id'));
        $consulta->fill(Input::all())->save();
        $estudiante=Estudiante::find(Input::get('user_id'));
        $odontologia=CmOdontologia::find($consulta->odontologia_id);
        return $this->recargarFormularios('users.odontologo.odontologia.vermas.step-33-tablas',$estudiante,$odontologia);
    }
     public function recargarFormularios($ruta,$estudiante,$medicina){
            $religiones=Religion::lists('religion','id');
            $est_civils=EstCivil::lists('est_civil','id');
            $departamentos=Departamento::lists('departamento','id');
            $provincias=Provincia::lists('provincia','id');
            $distritos=Distrito::lists('distrito','id');
            $procedimientos=CmProcedimiento::where('area','1')->lists('procedimiento','id');
            $medicamentos=CmMedicamento::get();
            $antec0=CmAntecedente::where('user_id',$estudiante->user_id)->where('tipo','0')->first();
            $antec1=CmAntecedente::where('user_id',$estudiante->user_id)->where('tipo','1')->first();
            $ops=CmOdoProc::where('odontologia_id',$medicina->id)->get();
            $oms=CmOdoMed::where('odontologia_id',$medicina->id)->get();
            $ots=CmOdoAtencion::where('odontologia_id',$medicina->id)->get();
            
            return view($ruta, compact('estudiante','medicina','religiones','est_civils','departamentos','provincias','distritos','procedimientos','medicamentos','antec1','antec0','ops','oms','ots'));  
     }


}
