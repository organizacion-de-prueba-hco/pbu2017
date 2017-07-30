<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $table='encuestas';
    protected $fillable=[
    'encuesta',
    'estado'
    ];

    public function estudiantencuestas(){
        return $this->hasMany('App\Estudiantencuesta','encuesta_id','id');
    }
}

