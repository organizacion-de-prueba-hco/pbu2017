<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalDocente extends Model
{
    protected $table='personal_docentes';
    protected $fillable=[
    'user_id',
    'escuela_id'

    ];
}
