<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $table='facultads';
    protected $fillable=[
    'facultad'

    ];

    public function escuelas(){
    	return $this->hasMany('App\Escuela');
    }

        
}
