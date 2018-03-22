<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmOdoAtencion extends Model
{
    protected $table='cm_odo_atencions';
    protected $fillable=[
    'odontologia_id',
    'procedimiento_id',
    'obs',
    'prox_cita',
    'created_at'
    ];

    public function cmprocedimiento(){
    	return $this->belongsto('App\CmProcedimiento','procedimiento_id','id');
    }

    public function cmodontologia(){
    	return $this->belongsto('App\CmOdontologia','odontologia_id','id');
    }
}
