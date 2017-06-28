<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
   protected $table = 'estudiantes';
   protected $fillable = [
   		'user_id',
        'escuela_id',
        'cod_univ',
        'm_ingreso_id',
        'anio_estudio',
        'f_term_colegio',
        'dist_colegio_id',
        'colegio',
        'tipo_familia',
        'trato_padres',
        'cubre_gastos'
    ];

    public function exoneracionpagocentmeds(){
        return $this->hasMany('App\ExoneracionPagoCentMed');
    }
    public function user(){
    	return $this->belongsto('App\User');
    }
    public function escuela(){
    	return $this->belongsto('App\Escuela');
    }
    public function m_ingreso(){
    	return $this->belongsto('App\MIngreso');
    }
    public function distrito(){
        return $this->belongsto('App\Distrito');
    }
}
