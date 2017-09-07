<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmReporTbc extends Model
{
    protected $table='cm_repor_tbcs';
    protected $primary='id';
    protected $fillable=[
    'created_at';
    'updated_at'
    ];
}
