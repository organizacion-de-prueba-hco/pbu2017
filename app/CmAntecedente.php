<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmAntecedente extends Model
{
    protected $table='cm_antecedentes';
    protected $primaryKey='id';
    protected $fillable=[
    'user_id',
    'tipo',
    'c_alcohol',
    'c_droga',
    'c_tabaco',
    'c_cafe',
    'p_hepatitis',
    'p_tifoidea',
    'p_tbc',
    'p_hta',
    'p_dm',
    'p_asma',
    'p_otros',
    'p_otros_desc',
    'qx',
    'created_at',
    'updated_at'
    ];
    public function user(){
    	return $this->belongsto('App\User','user_id','id');
    }

    
}
