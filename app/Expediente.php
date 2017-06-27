<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    protected $table='expedientes';
    protected $fillable=[
    'expediente',
    'jefe_usu',
    'solicitud_decano',
    'croquis_vivienda',
    'reporte_notas',
    'dni_estudiante',
    'dni_apoderado',
    'recibo',
    'certificado_medico',
    'ficha_soc_econ',
    'declaracion_jurada',
    'tipo_beca',
    'estado',
    'obs',
    'huella_a',
    'huella_b'


    ];
}
