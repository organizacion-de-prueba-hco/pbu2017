<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
   protected $table = 'docentes';
   protected $fillable = [
   		'user_id',
        'facultad_id'        
    ];
    public function user(){
    	return $this->belongsto('App\User');
    }
    public function facultad(){
    	return $this->belongsto('App\Facultad');
    }
}
