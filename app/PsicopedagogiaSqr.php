<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PsicopedagogiaSqr extends Model
{
	 protected $table = 'psicopedagogias_sqrs';
     protected $fillable = [
            'estudiante_id',
            'n',
            'p_i',
            'p_ii',
            'p_iii',
            'p_iv',
            'p_v',
            'p_vi',
            'p_vii',
            'p_viii',
            'p_ix',
            'p_x',
            'p_xi',
            'p_xii',
            'p_xiii',
            'p_xiv',
            'p_xv',
            'p_xvi',
            'p_xvii',
            'p_xviii',
            'p_xvix',
            'p_xx',
            'p_xxi',
            'p_xxii',
            'p_xxiii',
            'p_xxiv',
            'p_xxv',
            'p_xxvi',
            'p_xxvii',
            'p_xxviii',
            'p_xxix',
            'p_xxx',
            'obs',
            'conclusiones'
    ];
    public function estudiante(){
    	return $this->belongsto('App\Estudiante','estudiante_id','user_id');
    }
}
