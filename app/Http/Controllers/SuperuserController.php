<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use App\Estudiante;
use App\Docente;
use App\Distrito;
use App\Escuela;
use App\Facultad;
use App\MIngreso;
use App\Colegio;
use App\Notas;

class SuperuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('master.')
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
    public function cargar(){
        
        Excel::load('public/archivo.xlsx',function($archivo){
            $result=$archivo->get();
            foreach ($result as $key => $value) {
               //---------- Si existe el DNI registrado 
                  if(Estudiante::where('cod_univ',$value->id_alumno)->first()){
                     continue;
                  }
               //----------------
                $usuario = new User;
                $usuario->dni=$value->dni;
                $usuario->apellido_paterno=$value->paterno;
                $usuario->apellido_materno=$value->materno;
                $usuario->nombres=$value->nombres;
                $usuario->email=$value->dni.'@mail.com';
                if($value->dni=='--------' || $value->dni==''){
                    $usuario->dni=str_random(8);
                    $usuario->email=str_random(8).'mail.com';
                }
                if ($value->desc_sexo=='MASCULINO') {
                    $usuario->genero='1';
                }else if($value->desc_sexo=='FEMENINO'){
                    $usuario->genero='0';
                }
                switch ($value->est_civil) {
                    case 'SOLTERO(A)':  $usuario->est_civil_id='1'; break;
                    case 'CASADO(A)':  $usuario->est_civil_id='2'; break;
                    case 'CONVIVIENTE':  $usuario->est_civil_id='3'; break;
                    case 'SEPARADO':  $usuario->est_civil_id='4'; break;
                    case 'DIVORCIADO(A)':  $usuario->est_civil_id='5'; break;
                    case 'VIUDO(A)':  $usuario->est_civil_id='6'; 
                    default:
                        $usuario->est_civil_id='7'; 
                        break;
                }
                
                if($value->desc_dir!=''){
                    $usuario->domicilio=$value->desc_dir;
                }
                if($value->num_dir!=''){
                    $usuario->n_domicilio=$value->num_dir;
                }
                if($value->telefono!=''){
                    $usuario->telefono=$value->telefono;
                }

                if($value->dist_nacim!=''){
                    $distrito=Distrito::where('distrito',$value->dist_nacim)->first();
                    if($distrito){
                        $usuario->distrito_nac=$distrito->id;
                    }
                    
                }
                $usuario->save();
                //Ahora ingresamos los datos de estudiante
                $ultimoUsuarioRegistrado=User::where('tipo_user','5')->orderBy('id','desc')->first();
                $estudiante=new Estudiante;
                $estudiante->user_id=$ultimoUsuarioRegistrado->id;
                if($value->id_alumno!=''){
                    $estudiante->cod_univ=$value->id_alumno;
                }else{
                    $estudiante->cod_univ=str_random(10);
                }
                if($value->ep!=''){
                    $escuela=Escuela::where('escuela',$value->ep)->first();
                    if($escuela){
                        $estudiante->escuela_id=$escuela->id;
                    }
                }
                if($value->mod_ingre!=''){
                    $modalidad=MIngreso::where('modalidad',$value->mod_ingre)->first();
                    if($modalidad){
                        $estudiante->m_ingreso_id=$modalidad->id;
                    }
                }

                if($value->anio_est!=''){
                   $estudiante->anio_estudio=$value->anio_est;
                }

                $estudiante->save();

                //Colegio del estudiante
                $colegio=new Colegio;
                $colegio->estudiante_id=$ultimoUsuarioRegistrado->id;
                if($value->cole!=''){
                   $colegio->v_colegio=$value->cole;
                }

                if($value->dist_cole!=''){
                    $distritoCole=Distrito::where('distrito',$value->dist_cole)->first();
                    if($distritoCole){
                        $colegio->v_distrito=$distritoCole->id;
                        
                    }
                }
                $colegio->save();


                //echo 
                //echo $value->desc_sexo.'<br>';
                //echo $value->dni.' - '.$value->nombres.' - '.$value->paterno.'<br>';
            }
            
        });
         echo "Exito, Estudiantes registrados";
    }
    public function cargarnotas(){
        Excel::load('public/archivo2.xlsx',function($archivo){
            $result=$archivo->get();
            foreach ($result as $key => $value) {
               $NotaExiste=Notas::where('cod_univ',$value->id_alumno)->where('curso',$value->curso)->where('nota',$value->nota)->where('semestre',$value->semestre)->where('modalidad',$value->modalidad)->first();
               if($NotaExiste){
                  continue;
               }
               $notas=new Notas;
               if($value->id_alumno!=''){
                    $notas->cod_univ=$value->id_alumno;
                }
                if($value->curso!=''){
                    $notas->curso=$value->curso;
                }
                if($value->nota!=''){
                    $notas->nota=$value->nota;
                }
                if($value->semestre!=''){
                    $notas->semestre=$value->semestre;
                }
                if($value->modalidad!=''){
                    $notas->modalidad=$value->modalidad;
                }
                $notas->save();
            }
            
        });
        return "Éxito, se han registrado correctamente las notas";
    }

    public function cargardocentes(){
        Excel::load('public/archivo3.xlsx',function($archivo){
         $result=$archivo->get();
         foreach ($result as $key => $value) {
            //---------- Si existe el DNI registrado 
                 $usuarioExiste=User::where('dni',$value->dni)->first();
                 if($usuarioExiste){
                     $usuarioExiste->tipo_user='6';
                     $usuarioExiste->save();
                     continue;
                  }
               //----------------
            $usuario=new User;
            $usuario->dni=$value->dni;
            $usuario->email=$value->dni.'@mail.com';
            if($value->dni==''||$value->dni=='--------'){
               $usuario->dni=str_random(8);
               $usuario->email=str_random(8).'mail.com';
            }
            $usuario->apellido_paterno=$value->paterno;
            $usuario->apellido_materno=$value->materno;
            $usuario->nombres=$value->nombres;

            if ($value->desc_sexo=='MASCULINO') {
                    $usuario->genero='1';
            }else if($value->desc_sexo=='FEMENINO'){
                    $usuario->genero='0';
            }

            switch ($value->est_civil) {
                    case 'SOLTERO(A)':  $usuario->est_civil_id='1'; break;
                    case 'CASADO(A)':  $usuario->est_civil_id='2'; break;
                    case 'CONVIVIENTE':  $usuario->est_civil_id='3'; break;
                    case 'SEPARADO':  $usuario->est_civil_id='4'; break;
                    case 'DIVORCIADO(A)':  $usuario->est_civil_id='5'; break;
                    case 'VIUDO(A)':  $usuario->est_civil_id='6'; 
                    default:
                        $usuario->est_civil_id='7'; 
                        break;
            }
            $usuario->tipo_user='6';
            $usuario->save();

            //Para la tabla docente            
               if($value->facultad!=''){
                  $ultimoUsuarioRegistrado=User::where('tipo_user','6')->orderBy('id','desc')->first();
                  $docente=new Docente;
                  $docente->user_id=$ultimoUsuarioRegistrado->id;
                    $facultad=Facultad::where('facultad',$value->ep)->first();
                    if($facultad){
                        $docente->facultad_id=$facultad->id;
                    }
                  $docente->save();
                }
         }
         });

         return "Exito se registraron docentes";
    }
}
