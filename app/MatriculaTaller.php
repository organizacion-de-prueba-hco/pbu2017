<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatriculaTaller extends Model
{
    protected $table='matricula_tallers';
    protected $primaryKey='id';
    protected $fillable=[
    
    'curso_taller_id',
    'estudiante',
    'i_ex_i',
    'i_ex_ii',
    'i_par',
    'i_pre',
    'ii_ex_i',
    'ii_ex_ii',
    'ii_par',
    'ii_pre'
    ];

    public function cursotaller(){
    	return $this->belongsto('App\CursoTaller','curso_taller_id','id');
    }
    public function estudiant(){
    	return $this->belongsto('App\Estudiante','estudiante','user_id');
    }
}

