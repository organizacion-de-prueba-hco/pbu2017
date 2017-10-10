<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PsicopedagogiaSqr;
use App\Estudiante;
use App\User;

use Input;
use Redirect;

class PsicoSqrController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//getDescargar
        $this->middleware('psico');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crs=PsicopedagogiaSqr::get();
        return view('users.psico.cuestionario.cuestionario',compact('crs'));
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
        //return $request->get('estudiante_id');
        $user=User::find($request->get('estudiante_id'));
        $user->domicilio=$request->get('domicilio');
        $user->n_domicilio=$request->get('n_domicilio');
        $user->f_nac=$request->get('f_nac');
        $user->telefono=$request->get('telefono');
        $user->save();

        //Encuesta
        $sqr=new PsicopedagogiaSqr;
            $sqr_n=PsicopedagogiaSqr::where('estudiante_id',$request->get('estudiante_id'))
                                                                  ->orderBy('id','desc')->first();

            if($sqr_n){ $n=$sqr_n->n+1;}   else{$n=1;}
        $sqr->n=$n;
        $sqr->fill($request->all());
        // $rs->estudiante_id=$request->get('estudiante_id');
        // $rs->p_i=$request->get('p_i');
        // $rs->p_ii=$request->get('p_ii');
        // $rs->p_iii=$request->get('p_iii');
        // $rs->p_iv=$request->get('p_iv');
        // $rs->p_v=$request->get('p_v');
        // $rs->p_vi=$request->get('p_vi');
        // $rs->p_vii=$request->get('p_vii');
        // $rs->p_viii=$request->get('p_viii');
        // $rs->p_ix=$request->get('p_ix');
        // $rs->p_x=$request->get('p_x');
        // $rs->p_xi=$request->get('p_xi');
        // $rs->p_xii=$request->get('p_xii');
        // $rs->p_xiii=$request->get('p_xiii');
        // $rs->p_xiv=$request->get('p_xiv');
        // $rs->p_xv=$request->get('p_xv');
        // $rs->p_xvi=$request->get('p_xvi');
        // $rs->p_xvii=$request->get('p_xvii');
        // $rs->p_xviii=$request->get('p_xviii');
        // $rs->p_xix=$request->get('p_xix');
        // $rs->p_xx=$request->get('p_xx');
        // $rs->p_xxi=$request->get('p_xxi');
        // $rs->p_xxii=$request->get('p_xxii');
        // $rs->p_xxiii=$request->get('p_xxiii');
        // $rs->p_xxiv=$request->get('p_xxiv');
        // $rs->p_xxv=$request->get('p_xxv');
        // $rs->p_xxvi=$request->get('p_xxvi');
        // $rs->p_xxvii=$request->get('p_xxvii');
        // $rs->p_xxviii=$request->get('p_xxviii');
        // $rs->p_xxix=$request->get('p_xxix');
        // $rs->p_xxx=$request->get('p_xxx');
        if($sqr->save()){
            return Redirect::to('psicosqr')->with('verde','Se registro correctamente');
        }else{
            return Redirect::to('psicosqr')->with('rojo','Algo salió mal, intente nuevamente');
        } 
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
        return view('users.psico.cuestionario.nuevo', compact('estudiante'));
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
