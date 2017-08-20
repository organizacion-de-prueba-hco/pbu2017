<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    protected $table='tallers';
    protected $fillable=[
    'unidad','taller'


    ];

    public function cursotaller(){
    	return $this->hasMany('App\CursoTaller');
    }
}
