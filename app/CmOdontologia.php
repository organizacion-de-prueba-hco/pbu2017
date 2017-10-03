<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmOdontologia extends Model
{
    protected $table='cm_odontologias';
    protected $primaryKey='id';
    protected $fillable=[
    'odontologo_id',
    'user_id',
    'i_motivo_consulta',
    'ii_a','ii_b','ii_c','ii_d',
    'iii_xi','iii_xii','iii_xiii','iii_ix','iii_xv','iii_xvi','iii_xvii','iii_xviii',
    'iii_xxi','iii_xxii','iii_xxiii','iii_xxiv','iii_xxv','iii_xxvi','iii_xxvii','iii_xxviii',
    'iii_xxxi','iii_xxxii','iii_xxxiii','iii_xxxiv','iii_xxxv','iii_xxxvi','iii_xxxvii','iii_xxxviii',
    'iii_xli','iii_xlii','iii_xliii','iii_xliv','iii_xlv','iii_xlvi','iii_xlvii','iii_xlviii',
    'iii_li','iii_lii','iii_liii','iii_liv','iii_lv',
    'iii_lxi','iii_lxii','iii_lxiii','iii_lxiv','iii_lxv',
    'iii_lxxi','iii_lxxii','iii_lxxiii','iii_lxxiv','iii_lxxv',
    'iii_lxxxi','iii_lxxxii','iii_lxxxiii','iii_lxxxiv','iii_lxxxv',
    'iii_b_a','iii_b_b','iii_b_c','iii_b_d','iii_b_e','iii_b_f','iii_b_otros','iv_diagnostico'
    ];

    public function cmmedproc(){
    	return $this->hasMany('App\CmMedProc');
    }

    public function user(){
    	return $this->belongsto('App\user');
    }
    public function odontologo(){
        return $this->belongsto('App\user', 'odontologo_id','id');
    }
}
