<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmOdontologia extends Model
{
    protected $table='cm_odontologias';
    protected $primaryKey='id';
    protected $fillable=[
    'created_at',
    'updated_at'

    ];
}
