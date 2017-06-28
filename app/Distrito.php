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
        return $this->hasMany('App\Colegio');
    }

    public function vi_colegios(){
        return $this->hasMany('App\Colegio');
    }

    public function declaracionjuradas(){
    	return $this->hasMany('App\DeclaracionJurada');
    }
    public function estudiantes(){
        return $this->hasMany('App\Estudiante');
    }

    
}
