<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmOdoMed extends Model
{
    protected $table='cm_odo_meds';
    protected $fillable=[
    'cantidad',
    'indicaciones',
    'odontologia_id',
    'medicamento_id',
    'estado'
    ];

    public function medicamento(){
    	return $this->belongsto('App\CmMedicamento','medicamento_id','id');
    }

    public function cmodontologia(){
    	return $this->belongsto('App\CmOdontologia','odontologia_id','id');
    }
}
