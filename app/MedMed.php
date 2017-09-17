<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedMed extends Model
{
    protected $table='med_meds';
    protected $fillable=[
    'cantidad',
    'indicaciones',
    'medicina_id',
    'medicamento_id',
    'estado'
    ];

    public function medicamento(){
    	return $this->belongsto('App\CmMedicamento','medicamento_id','id');
    }

    public function cmmedicina(){
    	return $this->belongsto('App\CmMedicina','medicina_id','id');
    }
}
