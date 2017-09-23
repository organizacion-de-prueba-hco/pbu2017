<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmReporEnfermedad extends Model
{
    protected $table='cm_repor_enfermedads';
    protected $primaryKey='id';
    protected $fillable=['medicina_id','periodo'];

    public function medicina(){
        return $this->belongsto('App\CmMedicina','medicina_id','id');
    }
}
