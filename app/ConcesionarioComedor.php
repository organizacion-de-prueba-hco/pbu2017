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

    public function comedores(){
    	return $this->hasMany('App\Comedors');
    }
    public function users(){
    	return $this->belongsto('App\User');
    }


}
