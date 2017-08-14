<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuadroFamiliar extends Model
{
    protected $table='cuadro_familiars';
    protected $fillable=[
    'user_id',
    'nombres',
    'parentesco',
    'f_nac',
    'dni',
    'telefono',
    'grado_instrucion',
    'ocupacion',
    'residencia',
    'sueldo',
    'honorario',
    'pension',
    'empresa',
    'lugar_trabajo',
    'trabajo_inicio',
    'trabajo_fin'
    ];

    public function visitadomiciliarias(){
        return $this->hasMany('App\VisitaDomiciliaria','miembro_familiar','id');

    }
    public function visitahospitalarias(){
        return $this->hasMany('App\VisitaHospitalaria','miembro_familiar','id');

    }
    public function datossaludes(){
        return $this->hasMany('App\DatosSalud','miembro_familiar','id');
    }

    public function declaracionjuradas(){
        return $this->hasMany('App\DeclaracionJurada','miembro_familiar');
    }

    public function user(){
        return $this->belongsto('App\User');
    }


    
}
