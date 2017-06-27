<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitaDomiciliaria extends Model
{
    protected $table='visita_domiciliarias';
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
