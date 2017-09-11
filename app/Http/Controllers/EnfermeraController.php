<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Redirect;
use Input;
use App\User;

class EnfermeraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');//getDescargar
        $this->middleware('enfermera');
    }
    public function index()
    {
        return view('users.enfermera.ajustes');
        //return "hola";
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
        $user=User::find(Auth::user()->id);
        $user->nombres=$request->get('nombres');
        $user->apellido_paterno=$request->get('apellido_paterno');
        $user->apellido_materno=$request->get('apellido_materno');
        $user->email=$request->get('email');
        $user->dni=$request->get('dni');
        if($request->get('pasword')){
            $user->password=$request->get('pasword');
        }
        if($user->save()){
            return Redirect::to('enf')->with('verde','Se actulizaron los datos');
        }else{
            return Redirect::to('enf')->with('rojo','Los datos ingresados no son válidos');            
        }
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

    public function postFoto(){
      $file = Input::file('foto');
      if(!empty($file)){
        $user=User::find(Auth::user()->id);        
        $name=$user->dni.'.png';
        $file->move('imagenes/avatar', $name);
        $user->foto=$name;
        if($user->save()){
             return Redirect::to('enf')->with('verde','Se actualizó foto');     //redirige a enf que es donde se muestran los registros
        }else{
            return Redirect::to('enf')->with('rojo','No se pudo guardar la foto, vuelva a intentar');
        }
      }
     }


}
