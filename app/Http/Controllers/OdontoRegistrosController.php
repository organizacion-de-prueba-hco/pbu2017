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

use Redirect;

class OdontoRegistrosController extends Controller
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
        
        return view('users.odontologo.inicio.buscar');
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
    public function postBuscar(Request $request){

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
            return $this->recargarFormularios('users.odontologo.inicio.vermas',$user);
        
        
    }

    public function recargarFormularios($ruta,$user){
        
            $religiones=Religion::lists('religion','id');
            $est_civils=EstCivil::lists('est_civil','id');
            $departamentos=Departamento::lists('departamento','id');
            $provincias=Provincia::lists('provincia','id');
            $distritos=Distrito::lists('distrito','id');
            $antec0=CmAntecedente::where('user_id',$user->id)->where('tipo','0')->first();
            $antec1=CmAntecedente::where('user_id',$user->id)->where('tipo','1')->first();
            $odontologias=CmOdontologia::where('user_id',$user->id)->where('i_motivo_consulta','<>','')->orderBy('id','desc')->get();
            return view($ruta, compact('user','religiones','est_civils','departamentos','provincias','distritos','antec1','antec0','odontologias'));
     }
}
