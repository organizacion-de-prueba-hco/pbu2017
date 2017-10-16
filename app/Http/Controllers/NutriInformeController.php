<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Redirect;
use App\InformeNutricion;
use Carbon\Carbon;
use Input;
use Validator;
use Storage;

class NutriInformeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');//getDescargar
        $this->middleware('nutricionista',['except' => ['getDescargar','getOuser'] ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $nutriformes = InformeNutricion::get();
        return view('users.nutricionista.informenutricion', compact('nutriformes'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users.nutricionista.informenutricion.nuevo");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //obtenemos el campo file definido en el formulario
    $file = Input::file('archivo');
    if(!empty($file)){
        //tamaño del archivo en kBytes
            $condiciones= array('archivo' => 'max:3072' );
            $validator=Validator::make(Input::all(),$condiciones);
            if ($validator->fails()){
              return back()->withErrors($validator);
            }else{
              $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
              $nombre=Carbon::now()->second.$request->get('titulo').'.'.$extension;

              if(!(\Storage::disk('local')->put('informeNutricion/'.$nombre,  \File::get($file)) )){
              return Redirect::to('forosestudiantes')->with('rojo','Algo salió mal '); 
              }
            }
    }else{
        $nombre="";
    }
    //-----------------------------------------


        //return $request->get('contenido-n');
        $informenutricion=new InformeNutricion;
        $informenutricion->nutricionista   = Auth::user()->id;
        $informenutricion->titulo=$request->get('titulo');
        $informenutricion->subtitulo=$request->get('subtitulo');
        $informenutricion->archivo=$nombre;
        $informenutricion->contenido=$request->get('contenido-n');
        $informenutricion->save();
        return Redirect::to('nutriforme')->with('verde', 'Se registro un nuevo informe');

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foro=InformeNutricion::find($id);
        return view('users.nutricionista.informenutricion.verMas', compact('foro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $informenutricion=InformeNutricion::where('id',$id)->first();
        return view('users.nutricionista.informenutricion.editar', compact('informenutricion'));
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
        //Si esta marcado el checkbox borramos el archivo y limpiamos de la BD
    if($request->get('eliminar')=='1'){
        $datosActuales=InformeNutricion::find($id);
        if (Storage::exists('informeNutricion/'.$datosActuales->archivo)) {
            Storage::delete('informeNutricion/'.$datosActuales->archivo);
        }
        $datosActuales->archivo='';
        $datosActuales->save();
    }else{

    $file = Input::file('archivo');
    if(!empty($file)){
        //Si existe un nuevo archivo, borramos el actual
        $datosActuales=InformeNutricion::find($id);
        if($datosActuales->archivo){
            if (Storage::exists('informeNutricion/'.$datosActuales->archivo)) {
                Storage::delete('informeNutricion/'.$datosActuales->archivo);
            }
        }
        //Luego agregamos el nuevo archivo
        //tamaño del archivo en kBytes
            $condiciones= array('archivo' => 'max:3072' );
            $validator=Validator::make(Input::all(),$condiciones);
            if ($validator->fails()){
              return back()->withErrors($validator);
            }else{
              $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
              $nombre=Carbon::now()->second.$request->get('titulo').'.'.$extension;

              if(!(\Storage::disk('local')->put('informeNutricion/'.$nombre,  \File::get($file)) )){
              return Redirect::to('forosestudiantes')->with('rojo','Algo salió mal '); 
              }
              $datosActuales->archivo=$nombre;
              $datosActuales->save();
            }
    }
    }
    //-----------------------------------------

        $informenutricion=InformeNutricion::find($id);
        $informenutricion->titulo=$request->get('titulo');
        $informenutricion->subtitulo=$request->get('subtitulo');
        $informenutricion->contenido=$request->get('contenido-n');
        $informenutricion->save();
        return Redirect::to('nutriforme')->with('verde', 'Se actualizo el informe');
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
    public function getDescargar($archivo){
        $url = Storage_path('app/informeNutricion/'.$archivo);
        if (Storage::exists('informeNutricion/'.$archivo))
        {
            //return Storage_path($archivo);
        return response()->download($url);
        }
        //si no se encuentra lanzamos un error 404.
        return "No se encontró ningun archivo, si el problema persiste comuniquese con el administrador del Software: ".$url;
    }
    public function getOuservermas(){

    }
    public function getOuser(){        
        switch (Auth::user()->tipo_user) {
            case '0':
            case '1': $carpeta='directivo.usu';  break;
            case '2': $carpeta='jusu';  break;
            case '2-1': $carpeta='asistentSocial';  break;
            case '2-3': $carpeta='concesionario';  break;
            default: return back();   break;
        }
        $nutriformes = InformeNutricion::get();
        return view('users.'.$carpeta.'.informenutricion', compact('nutriformes'));
    }

}
