<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmMedProc extends Model
{
    protected $table='cm_med_procs';
    protected $fillable=[
    'cantidad',
    'medicina_id',
    'procedimiento_id'
    ];

    public function cmprocedimiento(){
    	return $this->belongsto('App\CmProcedimiento','procedimiento_id','id');
    }

    public function cmmedicina(){
    	return $this->belongsto('App\CmMedicina');
    }
}
