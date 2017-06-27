<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cena extends Model
{
    
    protected $table='cenas';
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
