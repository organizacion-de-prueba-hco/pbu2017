<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    //protected $primarykey = 'expediente';

    protected $table='expedientes';
    protected $primaryKey='expediente';
    public $incrementing = false;
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
    'caso_especial',
    'obs',
    'huella_a',
    'huella_b'
    ];

    public function estudiante(){
        return $this->belongsto('App\Estudiante','expediente');
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
    public function comedor_asistencias(){
        return $this->hasMany('App\ComedorAsistencias','concesionario_id');
    }
    public function comedor_faltas(){
        return $this->hasMany('App\ComedorFaltas','concesionario_id');
    }
}
