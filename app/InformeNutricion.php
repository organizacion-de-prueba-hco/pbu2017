<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformeNutricion extends Model
{
    protected $table='informe_nutricions';
    protected $primaryKey='id';
    protected $fillable=[
    
    'nutricionista',
    'titulo',
    'subtitulo',
    'contenido',
    'archivo'
    ];

    public function user(){
    	return $this->belongsto('App\User');
    }

    
    
}
