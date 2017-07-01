<?php

namespace App\Http\Controllers;

use App\Estudiante;
use App\Expediente;
use App\HistorialExpediente;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Redirect;

class JusuExpedienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('jusu');
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
        $expediente->estado     = '1';
        $expediente->save();
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
            $exped->save();
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
        return view('users.jusu.expediente.tester', compact('estudiante'));
    }
    public function postNuevo(Request $request)
    {

        $cod        = $request->get('cod-nuevo');
        $estudiante = Estudiante::where('cod_univ', $cod)->first();
        return view('users.jusu.expediente.nuevo', compact('estudiante'));
        //$estudiante=Estudiante::where('cod_univ',$cod)->first();
        //return view('users.jusu.expediente.tester',compact('estudiante'));
    }
}
