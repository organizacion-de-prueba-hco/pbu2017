<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Estudiante;
use App\User;
use App\Religion;
use App\EstCivil;
use App\Departamento;
use App\Distrito;
use App\Provincia;
use App\CmAntecedente;
use App\CmOdontologia;
use App\CmMedicina;
use Input;

use Redirect;

class MedicoRegistrosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//getDescargar
        $this->middleware('medico');
    }
    public function index()
    {
        return view('users.medico.inicio.buscar');
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
    public function getBuscar(Request $request){
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
        return $this->recargarFormularios('users.medico.inicio.vermas',$user);
        
    }
    public function postFoto(){

      $file = Input::file('foto');
      if(!empty($file)){
        $user=User::find(Input::get('id-est'));        
        $name=$user->dni.'.png';
        $file->move('imagenes/avatar', $name);
        $user->foto=$name;
        if($user->save()){
             return back()->with('verde','Se actualizó foto');//redirige a enf que es donde se muestran los registros
        }else{
            return back()->with('rojo','No se pudo guardar la foto, vuelva a intentar');
        }
      }
     }

     public function recargarFormularios($ruta,$user){
      $religiones=Religion::lists('religion','id');
      $est_civils=EstCivil::lists('est_civil','id');
      $departamentos=Departamento::lists('departamento','id');
      $provincias=Provincia::lists('provincia','id');
      $distritos=Distrito::lists('distrito','id');
      $odontologias=CmOdontologia::where('user_id',$user->id)
                                     ->where('i_motivo_consulta','<>','')->get();
      $medicinas=CmMedicina::where('user_id',$user->id)->where('imp_dx','<>','')->get();
      $antec0=CmAntecedente::where('user_id',$user->id)->where('tipo','0')->first();
      $antec1=CmAntecedente::where('user_id',$user->id)->where('tipo','1')->first();
      return view($ruta, compact('user','religiones','est_civils','departamentos','provincias','distritos','antec1','antec0','odontologias','medicinas'));  
     }
}
