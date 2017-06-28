<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitaHospitalaria extends Model
{
    protected $table='visita_hospitalarias';
    protected $fillable=[
    'miembro_familiar',
    'asistenta_social',
    'motivo',
    'diagnostico',
    'observaciones',
    'intervencion',
    'fecha'

    ];

    public function cuadrofamiliar(){
        return $this->belongsto('App/CuadroFamiliar');
    }

    public function user(){
        return $this->belongsto('App/User');
    }

}
