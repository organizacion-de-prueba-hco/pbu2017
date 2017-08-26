<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Taller;
use App\CursoTaller;
use App\MatriculaTaller;
use App\Estudiante;
use App\User;
use App\Escuela;
use Auth;
use Redirect;
use Input;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class JufcReporteController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');//getDescargar
        $this->middleware('jufc',['except' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos=CursoTaller::get();
        $semestre='----'; $cont=0; $semestres= array();
        foreach ($cursos as $c) {
            if($semestre!=$c->semestre){
                $semestre=$c->semestre;
                array_push($semestres, $semestre);
            }
        }
        return view('users.jufc.reportes',compact('semestres'));
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
        $escuelas=Escuela::get();
        //return $escuelas;

        Excel::create('Talleres '.$id, function($excel) use($id,$escuelas) {
         foreach ($escuelas as $e) {
            
            $excel->sheet(substr($e->escuela, 0, 30), function($sheet) use($id,$e) {
            //------------Elementos para el contenido ----------------------------------           
               // Cabecera
               $sheet->mergeCells('A1:S1');
                  $sheet->row(1, array('UNIVERSIDAD NACIONAL HERMILIO VALDIZAN'));
               $sheet->mergeCells('A2:S2');
                  $sheet->row(2, array('BIENESTAR UNIVERSITARIO')); 
               $sheet->mergeCells('A3:S3');
                  $sheet->row(3, array('UNIDAD DE ACTIVIDAD FISICA Y MENTAL -  UNIDAD DE ACTIVIDAD DE FORMACION CULTURAL')); 
               $sheet->mergeCells('A4:S4');
                  $sheet->row(4, array('REGISTRO DE NOTAS '.$id));
               $sheet->mergeCells('A5:S5');
                  $sheet->row(5, array('E.P '.$e->escuela.' - Fac. '.$e->facultad->facultad));
               //$sheet->mergeCells('A6:S6');
                  //$sheet->row(6, array('ACTIVIDADES - I'));

                  //Estilos
                  $sheet->cells('A1:S3', function($cells) {
                        $cells->setAlignment('center'); //ALineación Horizontal
                        $cells->setValignment('center');//Alineacion vertical
                  });
                  $sheet->cells('A5:S6', function($cells) {
                        $cells->setFont(array(
                            'family'     => 'Calibri',
                            'bold'       =>  true
                        ));
                  });
                  //Fin Estilos
               // Fin Cabecera
               // Cuerpo
               $sheet->row(8, array('N°','AP. PAT.','AP. MAT.','NOMBRES','CÓDIGO','EX','EX','','','PRO','EX','EX','','','PRO','1ER','2DO','PRO',''));
               $sheet->row(9, array('','','','','','1','2','PAR','PRE','1 PARC','1','2','PAR','PRE','2 PARC','PAR','PAR','SEM','TALLER'));
               $matricula=MatriculaTaller::join('curso_tallers','curso_tallers.id','=','matricula_tallers.curso_taller_id')->where('curso_tallers.semestre',$id)->select('matricula_tallers.*')->get();
               $fila=9;
               foreach ($matricula as $m) {
                  //Filtramos por escuelas
                  if ($e->id!=$m->estudiant->escuela_id) {
                     continue;
                  }$fila++;
                  $sheet->row($fila, array($fila-9,
                     $m->estudiant->user->apellido_paterno,
                     $m->estudiant->user->apellido_materno,
                     $m->estudiant->user->nombres,
                     $m->estudiant->cod_univ,
                     $m->i_ex_i,
                     $m->i_ex_ii,
                     $m->i_par,
                     $m->i_pre,
                     round( ($m->i_ex_i+$m->i_ex_ii+$m->i_par+$m->i_pre)/4,2),
                     $m->ii_ex_i,
                     $m->ii_ex_ii,
                     $m->ii_par,
                     $m->ii_pre,
                     round( ($m->ii_ex_i+$m->ii_ex_ii+$m->ii_par+$m->ii_pre)/4,2),
                     
                     round( ($m->i_ex_i+$m->i_ex_ii+$m->i_par+$m->i_pre)/4,2),
                     round( ($m->ii_ex_i+$m->ii_ex_ii+$m->ii_par+$m->ii_pre)/4,2),

                     round((round( ($m->i_ex_i+$m->i_ex_ii+$m->i_par+$m->i_pre)/4,2)+
                     round( ($m->ii_ex_i+$m->ii_ex_ii+$m->ii_par+$m->ii_pre)/4,2))/2,2),
                     
                     $m->cursotaller->taller->taller));
               }

                  //Estilos
                  $sheet->cells('A8:S9', function($cells) {
                        $cells->setAlignment('center'); //ALineación Horizontal
                        $cells->setValignment('center');//Alineacion vertical
                        $cells->setFont(array(
                            'family'     => 'Calibri',
                            'bold'       =>  true
                        ));
                  });
                  $sheet->setBorder('A8:S'.$fila, 'thin'); //Bordes
                  $sheet->cells('J8:J'.$fila, function($cells) {
                        $cells->setBackground('#FFFF00'); //Color de fondo
                    });
                  $sheet->cells('O8:O'.$fila, function($cells) {
                        $cells->setBackground('#FFFF00'); //Color de fondo
                    });
                  $sheet->cells('R8:R'.$fila, function($cells) {
                        $cells->setBackground('#00BFFF'); //Color de fondo
                    });
                  //Fin estilos               
               // Fin de Cuerpo
               // Píe
                $sheet->mergeCells('D'.($fila+4).':H'.($fila+4));
                $sheet->mergeCells('D'.($fila+5).':H'.($fila+5));
                $sheet->mergeCells('M'.($fila+4).':R'.($fila+4));
                $sheet->mergeCells('M'.($fila+5).':R'.($fila+5));

                  $sheet->row(($fila+4), 
                     array('','','','JEFE DE LA UNIDAD DE ACTIVIDAD FISICA ','','','','','','','','','JEFE DE LA UNIDAD DE FORMACION'));
                  $sheet->row(($fila+5), array('','','','Y MENTAL','','','','','','','','','CULTURAL'));
               // FIN de Píe
                  //Estilos
                  $sheet->cells('D'.($fila+4).':R'.($fila+5), function($cells) {
                        $cells->setAlignment('center'); //ALineación Horizontal
                        $cells->setValignment('center');//Alineacion vertical
                        $cells->setFont(array(
                            'family'     => 'Calibri',
                            'bold'       =>  true,
                            'size'       => '10'
                        ));
                  });
                  //Fin estilos
                  
            //----------------------------------------------
            });

         }   

        })->export('xls');
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
}
