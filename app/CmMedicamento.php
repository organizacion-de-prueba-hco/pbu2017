<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmMedicamento extends Model
{
    protected $table='cm_medicamentos';
    protected $fillable=[
    'medicamento',
    'presentacion',
    'created_at',
    'updated_at'
    ];
}
