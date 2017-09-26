<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmOdontologia extends Model
{
    protected $table='cm_odontologias';
    protected $primaryKey='id';
    protected $fillable=[
    'odontologo_id',
    'user_id',
    'i_motivo_consulta',
    'ii_a','ii_b','ii_c','ii_d'
    ];

    public function cmmedproc(){
    	return $this->hasMany('App\CmMedProc');
    }

    public function user(){
    	return $this->belongsto('App\user');
    }
    public function odontologo(){
        return $this->belongsto('App\user', 'odontologo','id');
    }
}
