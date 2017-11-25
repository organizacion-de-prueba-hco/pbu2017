<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CmMedicamento;
use App\CmProcedimiento;
use App\CmInventario;
use App\NoEstudiante;
use App\Departamento;
use App\Distrito;
use App\Provincia;
use App\CuadroFamiliar;
use App\EgresoFamiliar;
use App\CmAntecedente;
use App\Religion;
use App\EstCivil;
use Auth;
use Redirect;
use Input;
use App\User;
use App\CmOdontologia;
use App\ExoneracionPagoCentMed;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        $this->middleware('auth');//getDescargar
        $this->middleware('medico');
    }
    public function index()
    {
        return view('users.medico.ajustes');
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
        $user=User::find(Auth::user()->id);
        $user->nombres=$request->get('nombres');
        $user->apellido_paterno=$request->get('apellido_paterno');
        $user->apellido_materno=$request->get('apellido_materno');
        $user->email=$request->get('email');
        $user->dni=$request->get('dni');
        if($request->get('pasword')){
            $user->password=$request->get('pasword');
        }
        if($user->save()){
            return Redirect::to('med')->with('verde','Se actulizaron los datos');
        }else{
            return Redirect::to('med')->with('rojo','Los datos ingresados no son válidos');            
        }
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


    public function postFoto(){
      $file = Input::file('foto');
      if(!empty($file)){
        $user=User::find(Auth::user()->id);        
        $name=$user->dni.'.png';
        $file->move('imagenes/avatar', $name);
        $user->foto=$name;
        if($user->save()){
             return Redirect::to('med')->with('verde','Se actualizó foto');     //redirige a enf que es donde se muestran los registros
        }else{
            return Redirect::to('med')->with('rojo','No se pudo guardar la foto, vuelva a intentar');
        }
      }
     }

     public function getExoneracion(){
        $exoneraciones=ExoneracionPagoCentMed::get();
        return view('users.medico.otros.exoneracion-pago',compact('exoneraciones'));
     }

     public function getOdontologia(){
         $odontologia=CmOdontologia::get();
        return view('users.medico.odontologia.atencion',compact('odontologia'));
     }
     //------------------------ No Estudiantes
     public function getNoestudiantes(){
        $noEstudiantes=NoEstudiante::get();
        $usuario = array('1' => 'Ingresante','2'=>'Docente','3'=>'Administrativo','4'=>'Público');
        $religiones=Religion::lists('religion','id');
        $est_civils=EstCivil::lists('est_civil','id');
        $departamentos=Departamento::lists('departamento','id');
        $provincias=Provincia::lists('provincia','id');
        $distritos=Distrito::lists('distrito','id');
        //return $noEstudiantes;
        return view('users.medico.noEstudiantes.noEstudiante',compact('noEstudiantes','usuario','religiones','est_civils','departamentos','provincias','distritos'));
    }
    public function postNoestudiantesnuevo(){
         //Que no exiata el DNI
      $consulta=User::where('dni',Input::get('dni'))->first();
      if($consulta){
         return Redirect('medicos/noestudiantes')
            ->with('rojo','DNI ('.$consulta->dni.') duplicado. El usuario ya está registrado');
      }
        $user=new User;
        $user->fill(Input::all());
        $user->email=Input::get('dni').'@mail.com';
        $user->tipo_user='6';
        if($user->save()){
            $ultimoUsuarioRegistrado=User::where('tipo_user','6')->orderBy('id','desc')->first();
                $cfamiliar=new CuadroFamiliar;
                $cfamiliar->user_id=$ultimoUsuarioRegistrado->id;
                $cfamiliar->nombres='Estudiante';
                $cfamiliar->ocupacion=Input::get('ocupacion');
                $cfamiliar->parentesco='YO';
                $cfamiliar->save();

                $efamiliar=new EgresoFamiliar;
                $efamiliar->user_id=$ultimoUsuarioRegistrado->id;
                $efamiliar->save();

                //Crear nuevos antecedentes de los médics
                $antecedentes = new CmAntecedente;
                $antecedentes->user_id=$ultimoUsuarioRegistrado->id;
                $antecedentes->tipo='0'; //YO
                $antecedentes->save();

                $antecedentes = new CmAntecedente;
                $antecedentes->user_id=$ultimoUsuarioRegistrado->id;
                $antecedentes->tipo='1'; //Pariente
                $antecedentes->save();

            //Para la tabla No Estudiante   
                  $noEst=new NoEstudiante;
                  $noEst->user_id=$ultimoUsuarioRegistrado->id;
                  $noEst->usuario_descripcion=Input::get('usuario_descripcion');
                  $noEst->usuario=Input::get('usuario');
                  $noEst->save();

        }else {
           return Redirect('medicos/noestudiantes')->with('rojo','No se registró correctamente');
        }
        return Redirect('medicos/noestudiantes')->with('verde','Se registró correctamente');
    }

}
