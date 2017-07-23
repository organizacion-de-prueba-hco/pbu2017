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
    	return $this->hasMany('App\Colegio','v_tipo','id');
    }

    public function iv_colegios(){
    	return $this->hasMany('App\Colegio','iv_tipo','id');
    }



}
