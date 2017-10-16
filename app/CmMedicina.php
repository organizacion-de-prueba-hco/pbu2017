<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmMedicina extends Model
{
    protected $table='cm_medicinas';
    protected $primaryKey='id';
    protected $fillable=[
    'medico_id',
    'user_id',
    'te',
    'fi',
    'ce',
    'relato_enf',
    'triaje_fc',
    'triaje_fr',
    'triaje_to',
    'triaje_pa',
    'triaje_p',
    'triaje_t',
    'triaje_imc',
    'imp_dx',
    'tto_descripcion',
    'cita',
    'ex_aux'
    ];


    public function cmmedproc(){
    	return $this->hasMany('App\CmMedProc');
    }

    public function user(){
    	return $this->belongsto('App\user');
    }
    public function medico(){
        return $this->belongsto('App\user');
    }
}
