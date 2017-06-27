<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desayuno extends Model
{
   	protected $table='desayunos';
   	protected $fillable=[
   	'comedor_id',
   	'expediente_id'
   	];

   	public function expediente(){
   		return $this->belogsto('App\Expediente');
   	}

  	public function comedor(){
  		return $this->belongsto('App\Comedor');

  	}


}
