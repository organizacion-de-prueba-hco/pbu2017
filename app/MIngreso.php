<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MIngreso extends Model
{
  	protected $table = 'm_ingresos';
   	protected $fillable = [
   		'id',
       'modalidad'
    ];
    public function Estudiantes(){
        return $this->hasMany('App\Estudiante');
    }
}
