<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almuerzo extends Model
{
    protected $table='almuerzos';
    protected $fillable=[
    'comedor_id',
    'expediente_id'
    ];

    public function expediente(){
  		return $this->belongsto('App\Expediente');

  	}
  	public function comedor(){
  		return $this->belongsto('App\Comedor');

  	}

}
