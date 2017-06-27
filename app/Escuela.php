<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
   protected $table = 'escuelas';
   protected $fillable = [
   		'id',
        'escuela',
        'facultad_id'
    ];

    public function estudiantes(){
        return $this->hasMany('App\Estudiante');
    }
}
