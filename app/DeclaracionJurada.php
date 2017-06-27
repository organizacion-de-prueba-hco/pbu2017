<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeclaracionJurada extends Model
{
    protected $table='declaracion_juradas';
    protected $fillable=[
    'miembro_familiar',
   	'asistenta_social',
 	'distrito',
 	'desempeño_como',
    'haber_mensual',
    'n_hijos',
    'apoyo_mensual',
    'otros_gastos'
    ];


    
}

