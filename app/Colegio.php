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
    public function tipo_colegio(){
    	
    	return $this->belongsto('App\TipoColegio');
    }


    public function distrito(){
    	return $this->belongsto('App\Distrito');
    }
}
