<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoEstudiante extends Model
{
	protected $table = 'no_estudiantes';
	protected $primaryKey='user_id';
    public $incrementing = false;
   	protected $fillable = [
      'user_id',
   		'usuario',
      'usuario_descripcion'
    ];
    public function user(){
    	return $this->belongsto('App\User');
    }
   
}
