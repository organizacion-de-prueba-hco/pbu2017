<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    protected $table='distritos';

    protected $fillable=[
    'distrito',
    'provincia_id'
    ];

    
}
