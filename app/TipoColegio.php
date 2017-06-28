<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoColegio extends Model
{
    protected $table='tipo_colegios';
    protected $fillable=[
    'tipo'
    
    ];

    //revisar colegios con tipo de colegios

    public function colegios(){
    	return $this->hasMany('App\Colegio');
    }



}
