<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitaHospitalaria extends Model
{
    protected $table='visita_hospitalarias';
    protected $fillable=[
    'miembro_familiar',
    'asistenta_social',
    'centro_atencion',
    'tipo_sangre',
    'medico',
    'motivo',
    'diagnostico',
    'observaciones',
    'intervencion',
    'fecha'

    ];

    public function cuadrofamiliar(){
        return $this->belongsto('App\CuadroFamiliar','miembro_familiar','id');
    }
    public function asistentasocial(){
        return $this->belongsto('App\User','asistenta_social');
    }

}
