<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    protected $table='notas';
    protected $fillable=[
    'cod_univ',
    'curso',
    'nota',
    'semestre'

    ];


    
}
