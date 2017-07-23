<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstCivil extends Model
{
    protected $table='est_civils';
    protected $fillable=[
    'est_civil'

    ];

    public function users(){
    	return $this->hasMany('App\User','est_civil_id','id');
    }


    
}
