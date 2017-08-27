<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Redirect;
use Maatwebsite\Excel\Facades\Excel;
use App\CantidadBecas;
use App\Estudiante;
use Input;
use Auth;
use Carbon\Carbon;

class JusuNbecasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('jusu',['except' => ['getReporte','show'] ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cbecas=CantidadBecas::get();
        return view('users.jusu.nbecas',compact('cbecas'));
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
      Excel::create('Reporte N° de Becas', function($excel) {
        $date = Carbon::now();
        //$date = $date->format('d-m-Y');
        $excel->sheet(Carbon::now()->format('d-m-Y'), function($sheet) use($date){
          //Datos
            $cbecas=CantidadBecas::get();
            $ba=0;$bb=0;$bc=0;
            foreach ($cbecas as $cb) {
              $ba=$cb->a+$ba;$bb=$cb->b+$bb;$bc=$cb->c+$bc;
            }
          //Fin Datos

          //Cabecera

          $sheet->mergeCells('B1:H1'); //Combinar columnas
           $sheet->row(1, array('','DISTRIBUCIÓN DE BECAS DEL COMEDOR UNIVERSITARIO '.$date->format('Y')));
          $sheet->mergeCells('D3:D5'); //Combinar 
          $sheet->mergeCells('D6:E6'); //Combinar 
           $sheet->row(3, array('','','','BECA','A',$ba));
           $sheet->row(4, array('','','','','B',$bb));
           $sheet->row(5, array('','','','','C',$bc));
           $sheet->row(6, array('','','','TOTAL','',$total_becas=$ba+$bb+$bc));
          $sheet->mergeCells('A8:A9'); //Combinar 
          $sheet->mergeCells('B8:B9'); //Combinar 
          $sheet->mergeCells('C8:E8'); //Combinar  
          $sheet->mergeCells('F8:H8'); //Combinar
          $sheet->mergeCells('I8:I9'); //Combinar
          $sheet->mergeCells('J8:J9'); //Combinar
           $sheet->row(8, array('E.P.','Población Matriculada','% de Becas por Categoría','','','Total de Becas','','','% TOTAL','TOTAL',));
           $sheet->row(9, array('','','A','B','C','A','B','C','',));
           $sheet->setAutoSize(true);

           //Estilos
            // Set width for multiple cells
              $sheet->setWidth(array(
              'A' => 43,
              'B' => 15,
              'C' => 11,
              'D' => 11,
              'E' => 11,
              'F' => 11,
              'G' => 11,
              'H' => 11,
              'I' => 11,
              'J' => 11
              ));
              //Ajustar texto a celda
              $sheet->getStyle('A8:J9' , $sheet->getHighestRow())->getAlignment()->setWrapText(true);
              //Todo lo demás: centrar, fuente, etc
              $sheet->cells('A1:J9', function($cells) {
                $cells->setAlignment('center'); //ALineación Horizontal
                $cells->setValignment('center');//Alineacion vertical
                //$cells->setBackground('#A9D0F5');
                $cells->setFont(array(
                  'family'=> 'Calibri',
                  'size'  => '13'
                ));
              });

              $sheet->cells('A8:J9', function($cells) {
                $cells->setFont(array(
                  'family'=> 'Calibri',
                  'bold'  =>  true,
                  'size'  => '13'
                ));
              });
              $sheet->setBorder('D3:F6', 'thin'); //Bordes
           //Fin Estilos
          //Fin de Cabecera
          //Cuerpo
              $fila=9;$pm_total=0;
            foreach ($cbecas as $cb) {$fila++;
                $pm=Estudiante::where('escuela_id',$cb->escuela_id)->count();
               $sheet->row($fila, array($cb->escuela->escuela,$pm,round($cb->a/$ba,2),round($cb->b/$bb,2),round($cb->c/$bc,2),$cb->a,$cb->b,$cb->c,round(($cb->a+$cb->b+$cb->c)/$total_becas,2),$cb->a+$cb->b+$cb->c));    
               $pm_total=$pm_total+$pm;
            }
            $sheet->row($fila+1, array('TOTAL',$pm_total,'','','',$ba,$bb,$bc,'',$total_becas));

            //Estilos
              $sheet->setBorder('A8:J38', 'thin'); //Bordes
              $sheet->cells('A38:J38', function($cells) {
                $cells->setFont(array(
                  'family'=> 'Calibri',
                  'bold'  =>  true,
                  'size'  => '12'
                ));
              });

            //FIN Estilos
          //Fin Cuerpo
        });
      })->export('xls');
        return "Holitas";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nb = CantidadBecas::find($id);
        return view('users.jusu.editar-nbecas',compact('nb'));
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
        $nb=CantidadBecas::find($id);
        if($nb->fill(Input::all())->save()){
        return Redirect::to('jusunbecas')->with('verde','Se actualizo el N° de becas');    
    }else{
        return Redirect::to('jusunbecas')->with('rojo','No se pudo actualizar, vuelva a intentar');
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
}
