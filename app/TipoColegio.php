<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoColegio extends Model
{
    protected $table='tipo_colegios';
    protected $fillable=[
    'tipo'
    
    ];

   

    public function v_colegios(){
    	return $this->hasMany('App\Colegio');
    }

    public function vi_colegios(){
    	return $this->hasMany('App\Colegio');
    }



}
