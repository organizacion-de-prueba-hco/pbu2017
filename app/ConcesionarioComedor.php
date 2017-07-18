<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConcesionarioComedor extends Model
{
    protected $table='concesionario_comedors';
    protected $fillable=[
    'responsable',
    'empresa',
    'ruc'

    ];

    public function comedor_asistencias(){
    	return $this->hasMany('App\ComedorAsistencias','concesionario_id');
    }
    public function comedor_faltas(){
        return $this->hasMany('App\ComedorFaltas','concesionario_id');
    }
    public function users(){
    	return $this->belongsto('App\User');
    }


}
