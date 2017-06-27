<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Redirect;
use Input;
use DB;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Auth::logout();
        return Redirect::to('/');
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
        //return $request['usuario'].'  -  '.$request['password'];
        if (Auth::attempt(['dni' => $request['usuario'], 'password' => $request['password'] ])) {
            //return Auth::user()->nombres;
             if (Auth::user()->estado_login=='1'){
                //return Redirect::to('');//->with('message','store');
                $mensaje = "ingresó correctamente";
                switch (Auth::user()->tipo_user) {
                    case '0':
                        return Redirect::to('super-usuario'); 
                        break;
                    case '1':
                        return Redirect::to('docenteproyecto');
                        break;
                    case '2':
                        return Redirect::to('jusuexpediente');
                        break;
                    case '2-1':
                        return Redirect::to('asfichasocial');
                        break;
                    default:
                        return Redirect::to('/')->with('rojo', 'Algo salió mal');
                        break;
                }
             } else{
               
                    return Redirect::to('/');
                }
        }else{
            $mensaje = "El usuario o contraseña Incorrecto ";
                    return Redirect::to('/')->with('rojo', $mensaje);
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
}