<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
     protected $table='provincias';
    protected $fillable=[
    'provincia',
    'departamento_id'
    ];

    public function distrito() {
      return $this->hasMany('App\Distrito');

}
