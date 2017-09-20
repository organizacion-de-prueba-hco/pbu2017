<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmProcedimiento extends Model
{
    protected $table='cm_procedimientos';
    protected $primaryKey='id';
    protected $fillable=[
    'procedimiento',
    'area',
    'tarifa',
    'created_at',
    'updated_at'
    ];

    public function cmmedproc(){
    	return $this->hasMany('App\CmMedProc','procedimiento_id','id');
    }
}
