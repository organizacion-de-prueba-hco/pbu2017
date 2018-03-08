<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Estudiante;
use App\Expediente;
use App\User;
use App\HistorialExpediente;
use App\ComedorAsistencia;
use App\Recibo;
use Redirect;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use DB;
use Yajra\Datatables\Facades\Datatables;

class JusuExpedienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('jusu',['except' => ['getReporte','postAsistencia'] ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //$expediente=Expediente::all()->take(10);
        return view('users.jusu.expediente');
    }
    public function getMostrartablas(){
      $expedientes=Expediente::join('estudiantes','estudiantes.user_id','=','expedientes.expediente')
                               ->join('users','users.id','=','estudiantes.user_id')
                               ->join('escuelas','estudiantes.escuela_id','=','escuelas.id')
                               ->where('users.estado_activo','1')
                               //->where('expedientes.caso_especial')
                               ->select(
                                'estudiantes.cod_univ',
                                DB::raw('CONCAT( users.nombres," ",users.apellido_paterno," ",users.apellido_materno) AS nombres'),
                                'escuelas.escuela AS escuela',
                                'expedientes.caso_especial AS caso_esp',
                                'expedientes.tipo_beca',
                                'expedientes.estado','expedientes.expediente'
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
        if (Expediente::where('expediente', $request->get('id_univ'))->first()) {
            return Redirect::to('jusuexpediente')->with('rojo', 'El estudiante ya cuenta con un expediente');
        }
        $expediente             = new Expediente;
        $expediente->expediente = $request->get('id_univ');
        $expediente->jefe_usu   = Auth::user()->id;
        $expediente->tipo_beca  = $request->get('TipoBeca');
        $expediente->caso_especial=$request->get('caso_especial');
        $expediente->obs  = $request->get('obs');
        $expediente->estado     = '1';
        $expediente->save();
        //Lo registramos tambien en el Historial Expediente
        $UltimoExpediente=Expediente::orderBy('expediente','desc')->first();
        $HistorialExpediente= new HistorialExpediente;
        $HistorialExpediente->expediente_id=$UltimoExpediente->expediente;
        $HistorialExpediente->tipo_beca= $request->get('TipoBeca');
        $HistorialExpediente->obs= $request->get('obs');
        $HistorialExpediente->resultado= $UltimoExpediente->estado;
        $HistorialExpediente->save();
        return Redirect::to('jusuexpediente')->with('verde', 'Se registro un nuevo expediente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return $id;
        $hexpedientes = HistorialExpediente::where('expediente_id', $id)->get();
        $estudiante   = Estudiante::where('user_id', $id)->first();
        $recibo   = Recibo::where('cod_univ',$estudiante->cod_univ)->orderBy('id','desc')->first();
        return view('users.jusu.expediente.verMas', compact('estudiante', 'hexpedientes','recibo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Expediente::where('expediente', $id)->first()) {
            return Redirect::to('jusuexpediente')->with('naranja', 'Solo se puede editar expedientes registrados');
        }
        $estudiante = Estudiante::where('user_id', $id)->first();
        $expediente=Expediente::where('expediente',$id)->first();
        return view('users.jusu.expediente.editar',compact('estudiante','expediente'));
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
        //return Expediente::find($id);
        $exped=Expediente::find($id);
        if ($exped) {
            $exped->estado=$request->get('estado');
            $exped->tipo_beca=$request->get('TipoBeca');
            $exped->caso_especial=$request->get('caso_especial');
            $exped->obs=$request->get('obs');
            $exped->save();

            //Ahora también en el Registro
            $HistorialExpediente= new HistorialExpediente;
            $HistorialExpediente->expediente_id=$exped->expediente;
            $HistorialExpediente->tipo_beca= $request->get('TipoBeca');
            $HistorialExpediente->obs= $request->get('obs');
            $HistorialExpediente->resultado= $request->get('estado');
            $HistorialExpediente->save();
            return Redirect::to('jusuexpediente')->with('verde', 'Se editó correctamente');
        }else{
            return Redirect::to('jusuexpediente')->with('naranja', 'ID no reconocido');
        }
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

    public function postTesteador(Request $request)
    {

        $cod        = $request->get('cod-test');
        $estudiante = Estudiante::where('cod_univ', $cod)->first();
        if(!$estudiante){
          $user = User::where('users.dni', $cod)->first();
          if($user){
             $estudiante = Estudiante::find($user->id);
          }
        }
        //return $estudiante;
        return view('users.jusu.expediente.tester', compact('estudiante'));
    }
    public function postNuevo(Request $request)
    {
        
        $cod        = $request->get('cod-nuevo');
        $estudiante = Estudiante::where('cod_univ', $cod)->first();
        if(!$estudiante){
          $user = User::where('users.dni', $cod)->where('tipo_user','5')->first();
          if($user){
             $estudiante = Estudiante::find($user->id);
          }
        }
        return view('users.jusu.expediente.nuevo', compact('estudiante'));
        //$estudiante=Estudiante::where('cod_univ',$cod)->first();
        //return view('users.jusu.expediente.tester',compact('estudiante'));
    }
    public function getReporte(){
      $titulo='Reporte de Becas del Comedor UNHEVAL - '.Carbon::now();
      $becarios=Expediente::where('estado','1')->get();

      Excel::create($titulo, function($excel) use($becarios) {
        $excel->sheet('CE', function($sheet){
            $becariosA=Expediente::where('estado','1')
               ->join('users','expedientes.expediente','=','users.id')
               ->join('estudiantes','users.id','=','estudiantes.user_id')
               ->join('escuelas','escuelas.id','=','estudiantes.escuela_id')
               ->where('expedientes.caso_especial','!=','0')
               ->orderBy('expedientes.caso_especial')->get();
               $ce = array('0' => 'Ninguno','1'=>'Victima de Violencia Política','2'=>'Consejo Universitario','3'=>'Asamblea Universitaria','4'=>'Deportista Calificado' );

               //echo $ce[$expediente->ce];
            // Cabecera
            $sheet->mergeCells('B1:I1');
            $sheet->cells('B1:I2', function($cells) {
               $cells->setAlignment('center'); //ALineación Horizontal
               $cells->setValignment('center');//Alineacion vertical
            });
            $sheet->cells('E2:E1000', function($cells) {
               $cells->setAlignment('center'); //ALineación Horizontal
               $cells->setValignment('center');//Alineacion vertical
            });
            $sheet->cells('B2:B1000', function($cells) {
               $cells->setAlignment('center'); //ALineación Horizontal
               $cells->setValignment('center');//Alineacion vertical
            });
            $sheet->cells('I2:I1000', function($cells) {
               $cells->setAlignment('center'); //ALineación Horizontal
               $cells->setValignment('center');//Alineacion vertical
            });

            $sheet->row(1, array('','Relación de los comensales - Casos especiales'));
            $sheet->appendRow(2, array('','N°','Facultad','Escuela Académica','Código Universitario','Apellido Paterno','Apellido Materno','Nombres','CE'));
            $fila=3;
            foreach ($becariosA as $key => $b) {
               $sheet->row($fila, array('',
                  $fila-2,
                  $b->estudiante->escuela->facultad->facultad,
                  $b->estudiante->escuela->escuela,
                  $b->estudiante->cod_univ,
                  $b->estudiante->user->apellido_paterno,
                  $b->estudiante->user->apellido_materno,
                  $b->estudiante->user->nombres,
                  $ce[$b->caso_especial])); 
               $fila++;
            }
            //Estilos----------------------------------------------------
            $sheet->setBorder('B1:I'.($fila-1), 'thin'); //Bordes
            $sheet->cells('B1:I2', function($cells) {
               $cells->setBackground('#A9D0F5'); //Color de fondo
               // Set font
               $cells->setFont(array(
                 'family'     => 'Calibri',
                  //'size'       => '16',
                  'bold'       =>  true
               ));
            });
            $sheet->cells('B1:I1', function($cells) {
               $cells->setFontSize(16);
            });
         });

         $excel->sheet('Beca A', function($sheet){
            $becariosA=Expediente::where('estado','1')
               ->join('users','expedientes.expediente','=','users.id')
               ->join('estudiantes','users.id','=','estudiantes.user_id')
               ->join('escuelas','escuelas.id','=','estudiantes.escuela_id')
               ->where('expedientes.tipo_beca','A')
               ->where('expedientes.caso_especial','0')->orderBy('escuelas.id')->get();
            // Cabecera
            $sheet->mergeCells('B1:H1');
            $sheet->cells('B1:H2', function($cells) {
               $cells->setAlignment('center'); //ALineación Horizontal
               $cells->setValignment('center');//Alineacion vertical
            });
            $sheet->cells('E2:E1000', function($cells) {
               $cells->setAlignment('center'); //ALineación Horizontal
               $cells->setValignment('center');//Alineacion vertical
            });
            $sheet->cells('B2:B1000', function($cells) {
               $cells->setAlignment('center'); //ALineación Horizontal
               $cells->setValignment('center');//Alineacion vertical
            });

            $sheet->row(1, array('','Comensales con Beca A'));
            $sheet->appendRow(2, array('','N°','Facultad','Escuela Académica','Código Universitario','Apellido Paterno','Apellido Materno','Nombres'));
            $fila=3;
            foreach ($becariosA as $key => $b) {
               $sheet->row($fila, array('',
                  $fila-2,
                  $b->estudiante->escuela->facultad->facultad,
                  $b->estudiante->escuela->escuela,
                  $b->estudiante->cod_univ,
                  $b->estudiante->user->apellido_paterno,
                  $b->estudiante->user->apellido_materno,
                  $b->estudiante->user->nombres)); 
               $fila++;
            }
            //Estilos----------------------------------------------------
            $sheet->setBorder('B1:H'.($fila-1), 'thin'); //Bordes
            $sheet->cells('B1:H2', function($cells) {
               $cells->setBackground('#A9D0F5'); //Color de fondo
               // Set font
               $cells->setFont(array(
                 'family'     => 'Calibri',
                  //'size'       => '16',
                  'bold'       =>  true
               ));
            });
            $sheet->cells('B1:G1', function($cells) {
               $cells->setFontSize(16);
            });
         });
         $excel->sheet('Beca B', function($sheet){
            $becariosB=Expediente::where('estado','1')
               ->join('users','expedientes.expediente','=','users.id')
               ->join('estudiantes','users.id','=','estudiantes.user_id')
               ->join('escuelas','escuelas.id','=','estudiantes.escuela_id')
               ->where('expedientes.tipo_beca','B')
               ->where('expedientes.caso_especial','0')->orderBy('escuelas.id')->get();
            // Cabecera
            $sheet->mergeCells('B1:H1');
            $sheet->cells('B1:H2', function($cells) {
               $cells->setAlignment('center'); //ALineación Horizontal
               $cells->setValignment('center');//Alineacion vertical
            });
            $sheet->cells('E2:E1000', function($cells) {
               $cells->setAlignment('center'); //ALineación Horizontal
               $cells->setValignment('center');//Alineacion vertical
            });
            $sheet->cells('B2:B1000', function($cells) {
               $cells->setAlignment('center'); //ALineación Horizontal
               $cells->setValignment('center');//Alineacion vertical
            });

            $sheet->row(1, array('','Comensales con Beca B'));
            $sheet->appendRow(2, array('','N°','Facultad','Escuela Académica','Código Universitario','Apellido Paterno','Apellido Materno','Nombres'));
            $fila=3;
            foreach ($becariosB as $key => $b) {
               $sheet->row($fila, array('',
                  $fila-2,
                  $b->estudiante->escuela->facultad->facultad,
                  $b->estudiante->escuela->escuela,
                  $b->estudiante->cod_univ,
                  $b->estudiante->user->apellido_paterno,
                  $b->estudiante->user->apellido_materno,
                  $b->estudiante->user->nombres)); 
               $fila++;
            }
            //Estilos----------------------------------------------------
            $sheet->setBorder('B1:H'.($fila-1), 'thin'); //Bordes
            $sheet->cells('B1:H2', function($cells) {
               $cells->setBackground('#A9D0F5'); //Color de fondo
               // Set font
               $cells->setFont(array(
                 'family'     => 'Calibri',
                  //'size'       => '16',
                  'bold'       =>  true
               ));
            });
            $sheet->cells('B1:G1', function($cells) {
               $cells->setFontSize(16);
            });
         });
         $excel->sheet('Beca C', function($sheet){
            $becariosC=Expediente::where('estado','1')
               ->join('users','expedientes.expediente','=','users.id')
               ->join('estudiantes','users.id','=','estudiantes.user_id')
               ->join('escuelas','escuelas.id','=','estudiantes.escuela_id')
               ->where('expedientes.tipo_beca','C')
               ->where('expedientes.caso_especial','0')->orderBy('escuelas.id')->get();
            // Cabecera
            $sheet->mergeCells('B1:H1');
            $sheet->cells('B1:H2', function($cells) {
               $cells->setAlignment('center'); //ALineación Horizontal
               $cells->setValignment('center');//Alineacion vertical
            });
            $sheet->cells('E2:E1000', function($cells) {
               $cells->setAlignment('center'); //ALineación Horizontal
               $cells->setValignment('center');//Alineacion vertical
            });
            $sheet->cells('B2:B1000', function($cells) {
               $cells->setAlignment('center'); //ALineación Horizontal
               $cells->setValignment('center');//Alineacion vertical
            });

            $sheet->row(1, array('','Comensales con Beca C'));
            $sheet->appendRow(2, array('','N°','Facultad','Escuela Académica','Código Universitario','Apellido Paterno','Apellido Materno','Nombres'));
            $fila=3;
            foreach ($becariosC as $key => $b) {
               $sheet->row($fila, array('',
                  $fila-2,
                  $b->estudiante->escuela->facultad->facultad,
                  $b->estudiante->escuela->escuela,
                  $b->estudiante->cod_univ,
                  $b->estudiante->user->apellido_paterno,
                  $b->estudiante->user->apellido_materno,
                  $b->estudiante->user->nombres)); 
               $fila++;
            }
            //Estilos----------------------------------------------------
            $sheet->setBorder('B1:H'.($fila-1), 'thin'); //Bordes
            $sheet->cells('B1:H2', function($cells) {
               $cells->setBackground('#A9D0F5'); //Color de fondo
               // Set font
               $cells->setFont(array(
                 'family'     => 'Calibri',
                  //'size'       => '16',
                  'bold'       =>  true
               ));
            });
            $sheet->cells('B1:G1', function($cells) {
               $cells->setFontSize(16);
            });
         });


         $excel->sheet('Todos', function($sheet){
            $becariosA=Expediente::where('estado','1')
               ->join('users','expedientes.expediente','=','users.id')
               ->join('estudiantes','users.id','=','estudiantes.user_id')
               ->join('escuelas','escuelas.id','=','estudiantes.escuela_id')
               ->where('expedientes.caso_especial','0')
               ->orderBy('escuelas.id')->get();
            // Cabecera
            $sheet->mergeCells('B1:I1');
            $sheet->cells('B1:I2', function($cells) {
               $cells->setAlignment('center'); //ALineación Horizontal
               $cells->setValignment('center');//Alineacion vertical
            });
            $sheet->cells('E2:E1000', function($cells) {
               $cells->setAlignment('center'); //ALineación Horizontal
               $cells->setValignment('center');//Alineacion vertical
            });
            $sheet->cells('B2:B1000', function($cells) {
               $cells->setAlignment('center'); //ALineación Horizontal
               $cells->setValignment('center');//Alineacion vertical
            });
            $sheet->cells('I2:I1000', function($cells) {
               $cells->setAlignment('center'); //ALineación Horizontal
               $cells->setValignment('center');//Alineacion vertical
            });

            $sheet->row(1, array('','Relación de los comensales - Becas A, B y C'));
            $sheet->appendRow(2, array('','N°','Facultad','Escuela Académica','Código Universitario','Apellido Paterno','Apellido Materno','Nombres','Beca'));
            $fila=3;
            foreach ($becariosA as $key => $b) {
               $sheet->row($fila, array('',
                  $fila-2,
                  $b->estudiante->escuela->facultad->facultad,
                  $b->estudiante->escuela->escuela,
                  $b->estudiante->cod_univ,
                  $b->estudiante->user->apellido_paterno,
                  $b->estudiante->user->apellido_materno,
                  $b->estudiante->user->nombres,
                  $b->tipo_beca)); 
               $fila++;
            }
            //Estilos----------------------------------------------------
            $sheet->setBorder('B1:I'.($fila-1), 'thin'); //Bordes
            $sheet->cells('B1:I2', function($cells) {
               $cells->setBackground('#A9D0F5'); //Color de fondo
               // Set font
               $cells->setFont(array(
                 'family'     => 'Calibri',
                  //'size'       => '16',
                  'bold'       =>  true
               ));
            });
            $sheet->cells('B1:I1', function($cells) {
               $cells->setFontSize(16);
            });
         });
      })->export('xls');
    }
    public function postAsistenciaxd(Request $request){

      $inicio=$request->get('inicio');
      $fin=$request->get('fin'); //Como el sistema compara con las horas(fin seria 00:00:00) y no cogerá la fecha actual. No sirve poner '<=', mejor aumentamos un día con PHP y ponemos '<'
      $fin = date("Y-m-d",strtotime($fin."+ 1 days"));
      //echo "Inicio: ".$inicio.'<br> FIN: '.$fin;
      //-----------------------------------------------------
      $comensales=Expediente::where('estado','1')->where('caso_especial','!=','0')->orderBy('caso_especial')->get();
      foreach ($comensales as $value) {
      $asist=ComedorAsistencia::where('created_at','>=',$inicio)
                                ->where('created_at','<',$fin)
                                      ->where('expediente_id',$value->expediente)
                                      ->where('asistencia','1')->get();
        //echo $value->expediente.' : '.$value->estudiante->user->nombres.' ->'.$asist;
        foreach ($asist as $key => $as) {
          echo "<br>".$as->created_at;
        }
      }

    }
    public function postAsistencia(Request $request){

      $inicio=$request->get('inicio');
      $fin_i=$request->get('fin'); //Como el sistema compara con las horas(fin seria 00:00:00) y no cogerá la fecha actual. No sirve poner '<=', mejor aumentamos un día con PHP y ponemos '<'
      $fin = date("Y-m-d",strtotime($fin_i."+ 1 days")); //Le sumamos un día
      
      Excel::create('Reporte de Asistencia ', function($excel) use($inicio,$fin,$fin_i){

        $excel->sheet('Comensales CE', function($sheet) use($inicio,$fin,$fin_i){
          //----------DATOS----------------
             //$comensales=Expediente::where('estado','1')->where('caso_especial','<>','0')->get();
          //----------Fin DATOS----------------
          // Cabecera
           $sheet->mergeCells('B1:K1');
           
           $sheet->row(1, array('','Reporte de Asistencia CE del '.$inicio.' al '.$fin_i));
            

           $sheet->appendRow(2, array(' ','N°','Facultad','Escuela Académica','Código Universitario','Apellido Paterno','Apellido Materno','Nombres','CE','N° Asistencias', 'N° Faltas'));
            //Estilos
              $sheet->cells('B1:K2', function($cells) {
                $cells->setAlignment('center'); //ALineación Horizontal
                $cells->setValignment('center');//Alineacion vertical
                $cells->setBackground('#A9D0F5');
                $cells->setFont(array(
                  'family'=> 'Calibri',
                  'bold'  =>  true,
                  'size'  => '13'
                ));
              });
            //Fin Estilos
          // Fin Cabecera
          // Cuerpo
           $fila=2;  
           $comensales=Expediente::where('estado','1')->where('caso_especial','!=','0')->orderBy('caso_especial')->get();
           $ce = array('0' => 'Ninguno','1'=>'Victima de Violencia Política','2'=>'Consejo Universitario','3'=>'Asamblea Universitaria','4'=>'Deportista Calificado' );
           
            foreach ($comensales as $c) { $fila++;
              $asist=ComedorAsistencia::where('created_at','>=',$inicio)
                                      ->where('created_at','<',$fin) //cogerá datos <= aa:mm:dd 23:59:59
                                      ->where('expediente_id',$c->expediente)
                                      ->where('asistencia','1')->count();
              $falt=ComedorAsistencia::where('created_at','>=',$inicio)
                                      ->where('created_at','<=',$fin)
                                      ->where('expediente_id',$c->expediente)
                                      ->where('asistencia','0')->count();
                //Aquí modificamos dependiendo del usuario, solo los edministrativos podrán ver el dato real
                if(!(Auth::user()->tipo_user=='0'||Auth::user()->tipo_user=='1')){
                  if ($falt>=5) {
                    $diferencia=$falt-5;
                    $asist=$asist+$diferencia;
                    $falt=$falt-$diferencia;
                  }
                }
              $sheet->appendRow($fila, array(' ',$fila-2,$c->estudiante->escuela->facultad->facultad,
                                                         $c->estudiante->escuela->escuela,
                                                         $c->estudiante->cod_univ,
                                                         $c->estudiante->user->apellido_paterno,
                                                         $c->estudiante->user->apellido_materno,
                                                         $c->estudiante->user->nombres,
                                                         $ce[$c->caso_especial],
                                                         $asist,$falt));
            }
            //Estilos
              $sheet->setBorder('B1:K'.$fila, 'thin'); //Bordes
              $sheet->cells('I3:I'.$fila, function($cells) {//Columna Asistencia
                $cells->setAlignment('center'); //ALineación Horizontal
                $cells->setValignment('center');//Alineacion vertical
              });
              $sheet->cells('J3:J'.$fila, function($cells) {//Columna Asistencia
                $cells->setAlignment('center'); //ALineación Horizontal
                $cells->setValignment('center');//Alineacion vertical
                $cells->setBackground('#A9F5A9');
              });
              $sheet->cells('K3:K'.$fila, function($cells) {
                $cells->setAlignment('center'); //ALineación Horizontal
                $cells->setValignment('center');//Alineacion vertical
                $cells->setBackground('#F5A9A9');
              });
              $sheet->cells('B3:B'.$fila, function($cells) {
                $cells->setAlignment('center'); //ALineación Horizontal
                $cells->setValignment('center');//Alineacion vertical
              });
              $sheet->cells('E3:E'.$fila, function($cells) {
                $cells->setAlignment('center'); //ALineación Horizontal
                $cells->setValignment('center');//Alineacion vertical
              });

            //Fin Estilos

          // Fin de Cuerpo
        });
        $excel->sheet('Comensales A B C', function($sheet) use($inicio,$fin,$fin_i){
          //----------DATOS----------------
            $comensales=Expediente::where('estado','1')->where('caso_especial','0')->get();
          //----------Fin DATOS----------------
          // Cabecera
           $sheet->mergeCells('B1:K1');
           
           $sheet->row(1, array('','Reporte de Asistencia de los Comensales del '.$inicio.' al '.$fin_i));
           $sheet->appendRow(2, array(' ','N°','Facultad','Escuela Académica','Código Universitario','Apellido Paterno','Apellido Materno','Nombres','Beca','N° Asistencias', 'N° Faltas'));
            //Estilos
              $sheet->cells('B1:K2', function($cells) {
                $cells->setAlignment('center'); //ALineación Horizontal
                $cells->setValignment('center');//Alineacion vertical
                $cells->setBackground('#A9D0F5');
                $cells->setFont(array(
                  'family'=> 'Calibri',
                  'bold'  =>  true,
                  'size'  => '13'
                ));
              });
            //Fin Estilos
          // Fin Cabecera
          // Cuerpo
           $fila=2;  
           $comensales=Expediente::where('estado','1')->where('caso_especial','0')->orderBy('tipo_beca')->get();
            foreach ($comensales as $c) { $fila++;
              $asist=ComedorAsistencia::where('created_at','>=',$inicio)
                                      ->where('created_at','<',$fin) //cogerá datos <= aa:mm:dd 23:59:59
                                      ->where('expediente_id',$c->expediente)
                                      ->where('asistencia','1')->count();
              $falt=ComedorAsistencia::where('created_at','>=',$inicio)
                                      ->where('created_at','<',$fin)
                                      ->where('expediente_id',$c->expediente)
                                      ->where('asistencia','0')->count();

              //Aquí modificamos dependiendo del usuario, solo los edministrativos podrán ver el dato real
                if(!(Auth::user()->tipo_user=='0'||Auth::user()->tipo_user=='1')){
                  if ($falt>=5) {
                    $diferencia=$falt-5;
                    $asist=$asist+$diferencia;
                    $falt=$falt-$diferencia;
                  }
                }
              $sheet->appendRow($fila, array(' ',$fila-2,$c->estudiante->escuela->facultad->facultad,
                                                         $c->estudiante->escuela->escuela,
                                                         $c->estudiante->cod_univ,
                                                         $c->estudiante->user->apellido_paterno,
                                                         $c->estudiante->user->apellido_materno,
                                                         $c->estudiante->user->nombres,
                                                         $c->tipo_beca,
                                                         $asist,$falt));
            }
            //Estilos
              $sheet->setBorder('B1:K'.$fila, 'thin'); //Bordes
              $sheet->cells('I3:I'.$fila, function($cells) {//Columna Asistencia
                $cells->setAlignment('center'); //ALineación Horizontal
                $cells->setValignment('center');//Alineacion vertical
              });
              $sheet->cells('J3:J'.$fila, function($cells) {//Columna Asistencia
                $cells->setAlignment('center'); //ALineación Horizontal
                $cells->setValignment('center');//Alineacion vertical
                $cells->setBackground('#A9F5A9');
              });
              $sheet->cells('K3:K'.$fila, function($cells) {
                $cells->setAlignment('center'); //ALineación Horizontal
                $cells->setValignment('center');//Alineacion vertical
                $cells->setBackground('#F5A9A9');
              });
              $sheet->cells('B3:B'.$fila, function($cells) {
                $cells->setAlignment('center'); //ALineación Horizontal
                $cells->setValignment('center');//Alineacion vertical
              });
              $sheet->cells('E3:E'.$fila, function($cells) {
                $cells->setAlignment('center'); //ALineación Horizontal
                $cells->setValignment('center');//Alineacion vertical
              });

            //Fin Estilos

          // Fin de Cuerpo
        });
        
      })->export('xls');
    

    }
}
