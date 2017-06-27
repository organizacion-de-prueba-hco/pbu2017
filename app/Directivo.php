<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Directivo extends Model
{
    protected $table='directivos';
    protected $fillable=[
    'user_id',
    'cargo_funcion'

    ];

    public function user(){
    	return $this->belongsto('App\User')
    }



}
