<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosSalud extends Model
{
    protected $table='datos_saluds';
    protected $fillable=[
    'miembro_familiar',
    'diagnostico',
	'seguro_medico',
	'lugar_atencion'
    ];

    public function cuadrofamiliar(){
    	return $this->belongsto('App\CuadroFamiliar');
    }


}
