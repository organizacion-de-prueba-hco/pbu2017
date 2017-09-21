<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmReporTbc extends Model
{
    protected $table='cm_repor_tbcs';
    protected $primary='id';
    protected $fillable=['medicina_id'];

    public function medicina(){
        return $this->belongsto('App\CmMedicina','medicina_id','id');
    }
}
