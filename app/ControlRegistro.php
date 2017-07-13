<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ControlRegistro extends Model
{
    //
    protected $table='control_registros';
    protected $fillable=[
    'user_id',
    'caso_social'
    ];

  	public function user(){
  		return $this->belongsto('App\User');

  	}
}
