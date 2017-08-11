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
    	return $this->belongsto('App\User','asistente_social','id');
    }

    public function estudiant(){
    	return $this->belongsto('App\Estudiante','estudiante','user_id');
    }
}
