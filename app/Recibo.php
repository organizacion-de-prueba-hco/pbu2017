<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    protected $table='recibos';
    protected $fillable=[
    'n_recibo',
    'cod_univ',
    'fecha',
    'detalle',
    'importe'
    ];

    
}
