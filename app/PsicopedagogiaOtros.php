<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PsicopedagogiaOtros extends Model
{
   protected $table = 'psicopedagogia_otros';
   protected $fillable = [
           'estudiante_id','n', 't_ansiedad', 't_inteligencia',   't_personalidad' 
    ];
    public function estudiante(){
    	return $this->belongsto('App\Estudiante','estudiante_id','user_id');
    }
}
