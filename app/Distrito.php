<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    protected $table='distritos';

    protected $fillable=[
    'distrito',
    'provincia_id'
    ];

    public function provincia()
    {
    	return $this->belongsto('App\Provincia');

    }

    public function v_colegios(){
        return $this->hasMany('App\Colegio','v_distrito','id');
        //return $this->hasMany('App\Comment', 'llave_externa', 'llave_local');
    }

    public function vi_colegios(){
        return $this->hasMany('App\Colegio','v_distrito','id');
    }

    public function declaracionjuradas(){
    	return $this->hasMany('App\DeclaracionJurada');
    }
    public function estudiantes(){
        return $this->hasMany('App\Estudiante');
    }
    public function user_nac(){
        return $this->hasMany('App\User','distrito_nac','id');
    }

    
}
