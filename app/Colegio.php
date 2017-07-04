<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Colegio extends Model
{
    protected $table='colegios';

    protected $fillable=['estudiante_id',

    'iv_colegio',
    'iv_tipo',
    'iv_distrito',
    'iv_fecha',
    'iv_pension',
    'v_colegio',
    'v_tipo',
    'v_distrito',
    'v_fecha',
    'v_pension'
    ];
    public function v_tipocolegio(){
    	
    	return $this->belongsto('App\TipoColegio');
    }

    public function iv_tipocolegio(){
        
        return $this->belongsto('App\TipoColegio');
    }


    public function v_distrit(){
    	return $this->belongsto('App\Distrito','v_distrito');
        //return $this->belongsTo('App\User', 'llave_local');
    }

    public function iv_distrit(){
        return $this->belongsto('App\Distrito','iv_distrito');
    }
    public function estudiante(){
        return $this->belongsto('App\Estudiante');
    }

    
}
