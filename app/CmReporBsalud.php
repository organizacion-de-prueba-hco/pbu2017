<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmReporBsalud extends Model
{
    protected $table='cm_repor_bsaluds';
    protected $primaryKey='id';
    protected $fillable=['medicina_id'];

    public function medicina(){
        return $this->belongsto('App\CmMedicina','medicina_id','id');
    }
}
