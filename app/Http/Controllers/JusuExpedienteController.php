<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Estudiante;
use App\Expediente;
use App\User;
use App\HistorialExpediente;
use Redirect;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class JusuExpedienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('jusu',['except' => ['getReporte'] ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expedientes = Expediente::get();
        return view('users.jusu.expediente', compact('expedientes'));
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
        return view('users.jusu.expediente.verMas', compact('estudiante', 'hexpedientes'));
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
          $user = User::where('users.dni', $cod)->first();
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
         $excel->sheet('Beca A', function($sheet){
            $becariosA=Expediente::where('estado','1')
               ->join('users','expedientes.expediente','=','users.id')
               ->join('estudiantes','users.id','=','estudiantes.user_id')
               ->join('escuelas','escuelas.id','=','estudiantes.escuela_id')
               ->where('expedientes.tipo_beca','A')->orderBy('escuelas.id')->get();
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
                  $b->user->estudiante->escuela->facultad->facultad,
                  $b->user->estudiante->escuela->escuela,
                  $b->user->estudiante->cod_univ,
                  $b->user->apellido_paterno,
                  $b->user->apellido_materno,
                  $b->user->nombres)); 
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
               ->where('expedientes.tipo_beca','B')->orderBy('escuelas.id')->get();
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
                  $b->user->estudiante->escuela->facultad->facultad,
                  $b->user->estudiante->escuela->escuela,
                  $b->user->estudiante->cod_univ,
                  $b->user->apellido_paterno,
                  $b->user->apellido_materno,
                  $b->user->nombres)); 
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
               ->where('expedientes.tipo_beca','C')->orderBy('escuelas.id')->get();
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
                  $b->user->estudiante->escuela->facultad->facultad,
                  $b->user->estudiante->escuela->escuela,
                  $b->user->estudiante->cod_univ,
                  $b->user->apellido_paterno,
                  $b->user->apellido_materno,
                  $b->user->nombres)); 
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

            $sheet->row(1, array('','Relación de los comensales'));
            $sheet->appendRow(2, array('','N°','Facultad','Escuela Académica','Código Universitario','Apellido Paterno','Apellido Materno','Nombres','Beca'));
            $fila=3;
            foreach ($becariosA as $key => $b) {
               $sheet->row($fila, array('',
                  $fila-2,
                  $b->user->estudiante->escuela->facultad->facultad,
                  $b->user->estudiante->escuela->escuela,
                  $b->user->estudiante->cod_univ,
                  $b->user->apellido_paterno,
                  $b->user->apellido_materno,
                  $b->user->nombres,
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
}
