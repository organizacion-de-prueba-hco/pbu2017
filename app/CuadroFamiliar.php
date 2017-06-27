<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuadroFamiliar extends Model
{
    protected $table='cuadro_familiars';
    protected $fillable=[
    'user_id',
    'nombres',
    'parentesco'
    'f_nac',
    'dni',
    'telefono',
    'grado_instruccion',
    'ocupacion',
    'residencia',
    'sueldo',
    'honorario',
    'pension',
    'empresa',
    'lugar_trabajo',
    'trabajo_inicio',
    'trabajo_fin'
    ];


    
}
