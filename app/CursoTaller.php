<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CursoTaller extends Model
{
 	protected $table='curso_tallers';
    protected $fillable=['taller_id','director','semestre','docente','estado'];

    public function taller(){
        return $this->belongsto('App\Taller');
    }
    public function direct(){
        return $this->belongsto('App\User','director');
    }
    public function matriculataller(){
    	return $this->hasMany('App\MatriculaTaller','curso_taller_id','id');
    }
}
