<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiantencuesta extends Model
{
    protected $table='estudiantencuestas';
    protected $fillable=[
    'encuesta_id',
    'estudiante_id',
    'i_a','i_b','i_c','i_d','i_e','i_f','i_g',
    'ii_a','ii_b','ii_c','ii_d','ii_e','ii_f','ii_g','ii_h','ii_i',
    'iii_a','iii_b','iii_c','iii_d','iii_e',
    'iv_a','iv_b','iv_c','iv_d','iv_e','iv_f'
    ];

    public function estudiantencuestas(){
        return $this->belongsto('App\Estudiantencuesta','encuesta_id','id');
    }
    public function estudiantes(){
        return $this->belongsto('App\Estudiantencuesta','estudiante_id','id');
    }
}
