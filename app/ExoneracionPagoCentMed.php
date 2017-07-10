<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExoneracionPagoCentMed extends Model
{
    protected $table='exoneracion_pago_cent_meds';
    protected $fillable=[
    'estudiante',
    'asistenta_social',
    'opinion'
    ];

    public function user()
    {
    	return $this->belongsto('App\User');
    }

    public function estudiante(){
    	return $this->belongsto('App\Estudiante');
    }
}
