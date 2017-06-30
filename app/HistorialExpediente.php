<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialExpediente extends Model
{
    protected $table='historial_expedientes';
    protected $fillable=[
    'expediente_id',
    'tipo_beca',
    'resultado'

    ];

    public function expediente(){
    	return $this->belongsto('App\Expediente');
    }
}
