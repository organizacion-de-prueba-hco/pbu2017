<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FichaSocial extends Model
{
    protected $table='ficha_socials';
    protected $fillable=[
    'expediente_id',
    'asistenta_social',
    'opinion_',
    'archivo'

    ];
    
}

