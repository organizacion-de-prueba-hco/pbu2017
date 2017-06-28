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
}
