<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table='departamentos';
    protected $fillable=[
    'departamento'
    ];

    public function provincias() {
      return $this->hasMany('App\Provincia');

  }
}
