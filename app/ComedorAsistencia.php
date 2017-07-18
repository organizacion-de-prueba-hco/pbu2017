<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComedorAsistencia extends Model
{
    protected $table='comedor_asistencias';
    protected $fillable=[
    'expediente_id',
    'concesionario_id',
    'tipo'
    ];

    public function expediente(){
  		return $this->belongsto('App\Expediente','expediente_id','expediente');
  	}
  	public function concesionario(){
  		return $this->belongsto('App\ConcesionarioComedor','concesionario_id','responsable');
  	}
}
