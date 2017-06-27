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
}
