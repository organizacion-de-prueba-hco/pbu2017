<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            'dni','nombres', 'apellido_paterno','apellido_materno', 'genero' ,     
           'est_civil_id',
           'n_hijos',
           'vc_padre',
           'vc_madre',
           'vc_hermano',
           'vc_conyugue',
           'vc_pension',
           'vc_otros',
           'distrito_nac',
            'nacionalidad',
            'f_nac',
            'domicilio',
            'n_domicilio',
           'religion_id',
            'telefono',
            'tipo_sangre',
            'f_unheval',//FEcha de ingreso a la Uheval
            'email',
            'password',
            'estado_login',
            'tipo_user',
            'foto',  
            'vivienda', //Propia, alquilada, Hipotecada
            'material_vivienda',
            'n_ambientes',
            'techo_vivienda',
            'piso_vivienda',
            'servicio_luz', //0=no, 1=si
            'servicio_agua', //0=no, 1=si
            'servicio_desague', //0=no, 1=si
            'servicio_incompletos', //0=no, 1=si
            'servicio_letrinas', //0=no, 1=si
            'servicio_otros', //0=no, 1=si
            'registro_discapacitado',
            'registros_terrorismo'
            ];
            

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function estudiante() {
      return $this->hasOne('App\Estudiante','user_id', 'id');
      //return $this->hasOne('App\Profile', 'clave_foranea', 'clave_local_a_relacionar');
    }

    public function directivo(){
        return $this->hasOne('App\Directivo','user_id','id');
    }

    public function expediente(){
        return $this->hasOne('App\Expediente','expediente','id');
    }
  public function cuadro_familiars(){
        return $this->hasOne('App\CuadroFamiliar','user_id','id');
    }

    public function concesionariocomedor(){
        return $this->hasOne('App\ConcesionarioComedor','responsable','id');
    }

    public function personaldocente(){
        return $this->hasOne('App\PersonalDocente','user_id','id');
    }

    public function personalnodocente(){
        return $this->hasOne('App\PersonalNoDocente','user_id','id');
    }

    public function egresofamiliares(){
        return $this->hasMany('App\EgresoFamiliar');
    }
    public function exoneracionpagocentmeds(){
        return $this->hasMany('App\ExoneracionPagoCentMed');
    }

    public function fichasociales(){
        return $this->hasMany('App\FichaSocial');
    }
     public function visitasdomiciliarias(){
        return $this->hasMany('App\VisitaDomiciliaria');
    }

    public function visitashospitalarias(){
        return $this->hasMany('App\VisitaHospitalaria');
    }

    public function estcivil(){
        return $this->belongsto('App\EstCivil');
    }

    public function docente() {
      return $this->hasOne('App\Docente','user_id', 'id');
      //return $this->hasOne('App\Profile', 'clave_foranea', 'clave_local_a_relacionar');
    }
    public function religion(){
        return $this->belongsto('App\Religion');
    }
    public function distrito_naci(){
        return $this->belongsto('App\Distrito','distrito_nac');
    }
   

}
