<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExoneracionPagoCentMed extends Model
{
    protected $table='';
    protected $fillable=[
    'estudiante',
    'asistenta_social',
    'opinion'
    ];
}
