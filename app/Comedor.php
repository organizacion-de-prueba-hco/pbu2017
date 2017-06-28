<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comedor extends Model
{
    protected $table='comedors';
    protected $fillable=[
    'concesionario',
    'estado'
    ];

    }
	public function desayunos(){
    	return $this->hasMany('App\Desayuno');

    }

    public function almuerzos(){
    	return $this->hasMany('App\Almuerzo');

    
    public function cenas(){
    	return $this->hasMany('App\Cena');

    }

    public function concesionariocomedors(){
    	retunr $this->belongsto('App\ConcesionarioComedor');

    }



}
