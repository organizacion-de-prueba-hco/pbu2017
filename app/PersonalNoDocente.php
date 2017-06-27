<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalNoDocente extends Model
{
    protected $table='personal_no_docentes';
    protected $fillable=[
    'user_id',
    'cargo_funcion'

    ];
}
