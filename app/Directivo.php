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

}
