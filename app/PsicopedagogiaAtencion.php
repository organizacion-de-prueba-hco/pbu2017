<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PsicopedagogiaAtencion extends Model
{
    protected $table = 'psicopedagogia_atencions';
   protected $fillable = [
           'estudiante_id','motivo' 
    ];
    public function estudiante(){
    	return $this->belongsto('App\Estudiante','estudiante_id','user_id');
    }
}
