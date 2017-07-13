<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CantidadBecas extends Model
{
    protected $table='cantidad_becas';
    protected $fillable=['escuela_id','a','b','c'];
    
    public function escuela(){
    	return $this->belongsto('App\Escuela');
    }
}
