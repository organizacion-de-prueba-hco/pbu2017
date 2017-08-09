<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MensajeComedor extends Model
{
    protected $table='mensaje_comedors';
    protected $primaryKey='id';
    protected $fillable=['mensaje'];
}
