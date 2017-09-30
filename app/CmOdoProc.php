<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmOdoProc extends Model
{
    protected $table='cm_odo_procs';
    protected $fillable=[
    'cantidad',
    'odontologia_id',
    'procedimiento_id'
    ];

    public function cmprocedimiento(){
    	return $this->belongsto('App\CmProcedimiento','procedimiento_id','id');
    }

    public function cmodontologia(){
    	return $this->belongsto('App\CmOdontologia','odontologia_id','id');
    }
}
