<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeclaracionJurada extends Model
{
    protected $table='declaracion_juradas';
    protected $primaryKey='id';
    public $incrementing = false;
    protected $fillable=[
    'id',
    'miembro_familiar',
   	'asistenta_social',
 	'distrito',
 	'desempenio_como',
    'haber_mensual',
    'n_hijos',
    'apoyo_mensual',
    'otros_gastos'
    ];

    public function distrit(){
    	return $this->belongsto('App\Distrito','distrito');
    }

    public function cuadrofamiliar(){
    	return $this->belongsto('App\CuadroFamiliar','miembro_familiar','id'); //se coloca la llave con la cual esta relacionado
    }

    // public function user(){
    // 	return $this->belongsto('App\User','id');
    // }



    
}

