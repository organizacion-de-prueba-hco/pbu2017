<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmProcedimiento extends Model
{
    protected $table='cm_procedimientos';
    protected $primaryKey='id';
    protected $fillable=[
    'procedimiento',
    'tarifa',
    'created_at',
    'updated_at'
    ];

    public function cmmedproc(){
    	return $this->hasMany('App\CmMedProc');
    }
}
