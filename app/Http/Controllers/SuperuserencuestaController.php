<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Redirect;

use App\Estudiantencuesta;
use App\Encuesta;

class SuperuserencuestaController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('SuperUsuario',['except' => ['getExcel'] ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encuestas=Encuesta::get();
        return view('users.super.encuesta',compact('encuestas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = Carbon::now();
        $fecha = $date->format('Y-m').'%';
       $encuestas=Encuesta::where('created_at','like',$fecha)->get();
       $all_encuestas=Encuesta::get();
       if ($encuestas=='[]') { //Vacio
           foreach ($all_encuestas as $key => $ae) {
               $cambiarencuesta=Encuesta::find($ae->id);
               $cambiarencuesta->estado='0';
               $cambiarencuesta->save();
           }
           $nuevaencuesta=new Encuesta;
           switch ($date->format('m')) {
               case '1': $nombremes='Enero'; break;
               case '2': $nombremes='Febrero'; break;
               case '3': $nombremes='Marzo'; break;        
               case '4': $nombremes='Abril'; break;
               case '5': $nombremes='Mayo'; break;
               case '6': $nombremes='Junio';break;
               case '7': $nombremes='Julio'; break;
               case '8': $nombremes='Agosto';break;
               case '9': $nombremes='Septiembre';break;
               case '10':$nombremes='Octubre'; break;
               case '11':$nombremes='Noviembre';break;    
               case '12':$nombremes='Diciembre';break;               
               default:
               return Redirect::to('suencuesta')->with('rojo','Error de mes');
           }
           
           $nuevaencuesta->encuesta=$date->format('Y').' - '.$nombremes;
           $nuevaencuesta->estado='1';
           $nuevaencuesta->save();
            return Redirect::to('suencuesta')->with('verde','Se creó la encuesta del mes');
       }else{
            return Redirect::to('suencuesta')->with('rojo','Ya existe una Encuesta creada para este mes');
       }
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
        return "ahow";
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
        $enc=Encuesta::find($id);
        $enc->estado=$request->get('estado');
        $enc->save();
        return Redirect::to('suencuesta');
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
    public function getExcel($id){
      $encuesta=Encuesta::find($id);
        $titulo="Encuesta - ".$encuesta->encuesta.' ('.$encuesta->created_at.')';
        Excel::create($titulo, function($excel) use($id) {
            
            $excel->sheet('Encuesta', function($sheet) use($id) {
            //------------Elementos para el contenido ----------------------------------

              //Arreglos-Datos
              $eds=Estudiantencuesta::where('encuesta_id',$id)->get();
              //$nt_encuestados=User::where('tipo','1')->where('estado','1')->select(DB::raw('count(*) as cont'))->first();
              //Dimencion 1: PERSONAL, $dim_i[preg][resp]
              $dim_i = array(array(0,0,0,0,0)  );
                for ($i=0; $i <7 ; $i++) { 
                    array_push ( $dim_i , array(0,0,0,0,0) );
                }
              //Dimencion 2: PERSONAL, $dim_ii[preg][resp]
              $dim_ii = array(array(0,0,0,0,0)  );
                for ($i=0; $i <9 ; $i++) { 
                    array_push ( $dim_ii , array(0,0,0,0,0) );
                }
              //Dimencion 3: SERVICIOS, $dim_ii[preg][resp]
              $dim_iii = array(array(0,0,0,0,0)  );
                for ($i=0; $i <5 ; $i++) { 
                    array_push ( $dim_iii , array(0,0,0,0,0) );
                }

                //Dimencion 3: SERVICIOS, $dim_ii[preg][resp]
              $dim_iv = array(array(0,0,0,0,0)  );
                for ($i=0; $i <6 ; $i++) { 
                    array_push ( $dim_iv , array(0,0,0,0,0) );
                }

              //
              $t_docentes=0; 
              $romano=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
              foreach ($eds as $ed) {
                //Dimencion 1 $dim_i
                for ($i=0; $i <7 ; $i++) { 
                  $pregunta='i_'.$romano[$i];
                  switch ($ed->$pregunta) {
                    case '1': $dim_i[$i][0]++; break;
                    case '2': $dim_i[$i][1]++; break;
                    case '3': $dim_i[$i][2]++; break;
                    case '4': $dim_i[$i][3]++; break;
                    case '5': $dim_i[$i][4]++; break;                   
                    default: break;
                  }
                }
                //Dimencion 2 $dim_ii
                for ($i=0; $i <9 ; $i++) { 
                  $pregunta='ii_'.$romano[$i];
                  switch ($ed->$pregunta) {
                    case '1': $dim_ii[$i][0]++; break;
                    case '2': $dim_ii[$i][1]++; break;
                    case '3': $dim_ii[$i][2]++; break;
                    case '4': $dim_ii[$i][3]++; break;
                    case '5': $dim_ii[$i][4]++; break;                    
                    default: break;
                  }
                }
                //Dimencion 3 $dim_iii
                for ($i=0; $i <5 ; $i++) { 
                  $pregunta='iii_'.$romano[$i];
                  switch ($ed->$pregunta) {
                    case '1': $dim_iii[$i][0]++; break;
                    case '2': $dim_iii[$i][1]++; break;
                    case '3': $dim_iii[$i][2]++; break;
                    case '4': $dim_iii[$i][3]++; break;
                    case '5': $dim_iii[$i][4]++; break;                   
                    default: break;
                  }
                }
                //Dimencion 3 $dim_iii
                for ($i=0; $i <6 ; $i++) { 
                  $pregunta='iv_'.$romano[$i];
                  switch ($ed->$pregunta) {
                    case '1': $dim_iv[$i][0]++; break;
                    case '2': $dim_iv[$i][1]++; break;
                    case '3': $dim_iv[$i][2]++; break;
                    case '4': $dim_iv[$i][3]++; break;
                    case '5': $dim_iv[$i][4]++; break;                   
                    default: break;
                  }
                }
                    $t_docentes++;
              }
            //------------------Fin de Datos----------------------------
                    // Cabecera
                    $sheet->mergeCells('A1:G1');
                    $sheet->cells('A1:G200', function($cells) {
                        $cells->setAlignment('center'); //ALineación Horizontal
                        $cells->setValignment('center');//Alineacion vertical
                    });

                    $sheet->row(1, array(
                         'ENCUESTA DE SATISFACIÒN DEL USUARIO DEL COMEDOR UNIVERSITARIO '.Encuesta::find($id)->encuesta
                    ));
                    $sheet->appendRow(2, array(
                        'Dimenciones','Preguntas','% EXCELENTE', '% MUY BUENO', '% BUENO','% REGULAR','% MALO'
                    ));
                    //Cuerpo 
                    //Dimención 1
                    $sheet->mergeCells('A3:A9'); //Combinamos la 1ra columna de dimenc
                    $encuestados=$t_docentes;
                    if($t_docentes<1){
                      $t_docentes=1;
                    }
                    $pregunta_i= array('Amabilidad','Trato personal','Eficacia','Confianza','Rapidez del servicio','Higiene','Vestimenta Personal');
                    for ($i=0; $i <7 ; $i++) { 
                    $sheet->appendRow(($i+3), array(
                        '1.- PERSONAL',$pregunta_i[$i],round(100*$dim_i[$i][0]/$t_docentes,2),round(100*$dim_i[$i][1]/$t_docentes,2),round(100*$dim_i[$i][2]/$t_docentes,2),round(100*$dim_i[$i][3]/$t_docentes,2),round(100*$dim_i[$i][4]/$t_docentes,2)
                    ));
                    }
                    //Dimención 2
                    $sheet->mergeCells('A10:A18');
                    $pregunta_ii= array('Ración de los Alimentos','Calidad del Desayuno','Calidad del Plato de Entrada','Calidad del plato de Fondo','Calidad de la fruta','Calidad de la bebida','Variedad de Alimentos','Sabor de la Comida','Variedad de la bebida');
                    for ($i=0; $i <9 ; $i++) { 
                    $sheet->appendRow(($i+10), array(
                        '2.- ALIMENTO',$pregunta_ii[$i],round(100*$dim_ii[$i][0]/$t_docentes,2),round(100*$dim_ii[$i][1]/$t_docentes,2),round(100*$dim_ii[$i][2]/$t_docentes,2),round(100*$dim_ii[$i][3]/$t_docentes,2),round(100*$dim_ii[$i][4]/$t_docentes,2)
                    ));
                    }
                    //Dimención 3
                    $sheet->mergeCells('A19:A22');
                    $pregunta_iii= array('Conford del Comedor','Limpieza del comedor','Espera en la cola','Disponibilidad de sillas y mesas','Cumplimiento con el horario');
                    for ($i=0; $i <5 ; $i++) { 
                    $sheet->appendRow(($i+19), array(
                        '3.- SERVICIOS',$pregunta_iii[$i],round(100*$dim_iii[$i][0]/$t_docentes,2),round(100*$dim_iii[$i][1]/$t_docentes,2),round(100*$dim_iii[$i][2]/$t_docentes,2),round(100*$dim_iii[$i][3]/$t_docentes,2),round(100*$dim_iii[$i][4]/$t_docentes,2)
                    ));
                    }
                    //Dimención 4
                    $sheet->mergeCells('A23:A28');
                    $pregunta_iv= array('Comodidad del Comedor','Limpieza','Iluminación','Temperatura','Ruidos','Ventilación, humo y olores');
                    for ($i=0; $i <6 ; $i++) { 
                    $sheet->appendRow(($i+23), array(
                        '4.- INSTALACIONES',$pregunta_iv[$i],round(100*$dim_iii[$i][0]/$t_docentes,2),round(100*$dim_iv[$i][1]/$t_docentes,2),round(100*$dim_iv[$i][2]/$t_docentes,2),round(100*$dim_iv[$i][3]/$t_docentes,2),round(100*$dim_iv[$i][4]/$t_docentes,2)
                    ));
                    }
                    //Pie
                   $sheet->mergeCells('C30:D32'); //Fusionamos
                    $sheet->appendRow(30, array(
                        '','','N° Encuestados = '.$encuestados,
                    ));
                    
                    //Estilos----------------------------------------------------
                    $sheet->setBorder('A1:G28', 'thin'); //Bordes
                    $sheet->cells('A1:G2', function($cells) {
                        $cells->setBackground('#A9D0F5'); //Color de fondo
                        // Set font
                        $cells->setFont(array(
                            'family'     => 'Calibri',
                            //'size'       => '16',
                            'bold'       =>  true
                        ));
                    });
                    $sheet->cells('A1:G1', function($cells) {
                        $cells->setFontSize(14);
                    });
                    //$sheet->setAllBorders('thin');
                    $sheet->cells('A3:G9', function($cells) {
                        $cells->setBackground('#F5FFFA'); //Color de fondo dim 1
                    });
                    $sheet->cells('A10:G18', function($cells) {
                        $cells->setBackground('#E6E6FA'); //Color de fondo dim 2
                    });
                    $sheet->cells('A19:G22', function($cells) {
                        $cells->setBackground('#F0FFFF'); //Color de fondo dim 3
                    });
                    $sheet->cells('A23:G28', function($cells) {
                        $cells->setBackground('#E6E6FA'); //Color de fondo dim 4
                    });

                    $sheet->cells('C30:D31', function($cells) {
                        $cells->setBackground('#ffff00'); //Color de fondo Pie
                        $cells->setFontSize(14);
                        $cells->setAlignment('center'); //ALineación Horizontal
                    });
                    $sheet->cells('B3:B28', function($cells) {
                        $cells->setAlignment('left'); //ALineación Horizontal
                    });
                    // Manipulate 2nd row
                    

                    // Append row as very last
                    
            //----------------------------------------------
            
            });

        })->export('xls');
    }
}
