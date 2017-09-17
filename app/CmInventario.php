<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmInventario extends Model
{
    protected $table='cm_inventarios';
    protected $fillable=[
    'nombre',
    'descripcion',
    'cantidad',
    'created_at',
    'updated_at'
    ];
}
