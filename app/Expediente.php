<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    //protected $primarykey = 'expediente';
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

    public function user(){
        return $this->belongsto('App\User','expediente');
    }

    public function desayunos(){
        return $this->hasMany('App\Desayuno');
    }

    public function almuerzos(){
        return $this->hasMany('App\Almuerzo');
    }

    public function cenas(){
        return $this->hasMany('App\Cena');
    }

    public function fichasociales(){
        return $this->hasMany('App\FichaSocial');
    }

    public function historialexpedientes(){
        return $this->hasMany('App\HistorialExpediente');
    }






}
