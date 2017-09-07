<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmMedProc extends Model
{
    protected $table='cm_med_procs';
    protected $primaryKey='id';
    protected $fillable=[
    'medicina_id',
    'procedimiento_id',
    'created_at';
    'updated_at'
    ];

    public function cmprocedimiento(){
    	return $this->belongsto('App\CmProcedimiento');
    }

    public function cmmedicina(){
    	return $this->belongsto('App\CmMedicina');
    }
}
