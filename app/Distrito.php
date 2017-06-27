<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    protected $table='distritos';

    protected $fillable=[
    'distrito',
    'provincia_id'
    ];

    public function provincia()
    {
    	return $this->belongsto('App\Provincia');

    }

    public function declaracionjuradas(){
    	return $this->hasMany('DeclaracionJurada');


    }

    
}
