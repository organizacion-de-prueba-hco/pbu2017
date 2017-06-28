<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    protected $table='religions';
    protected $fillable=[
    'religion'


    ];

    public function users(){
    	return $this->hasMany('App\User');
    }

}
