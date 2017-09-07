<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmReporBsalud extends Model
{
    protected $table='cm_repor_bsaluds';
    protected $primaryKey='id';
    protected $fillable=[
    'created_at';
    'updated_at'
    ];
}
