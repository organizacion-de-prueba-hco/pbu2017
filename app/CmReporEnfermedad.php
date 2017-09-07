<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmReporEnfermedad extends Model
{
    protected $table='cm_repor_enfermedads';
    protected $primaryKey='id';
    protected $fillable=[
    'created_at',
    'updated_at'
    ];
}
