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
    use Authenticatable, Authorizable, CanResetPassword, HasRoles;

    protected $table = 'users';

    //use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hospital()
    {
        return $this->hasOne('App\prescription\model\entities\Hospital', 'hospital_id');
    }

    public function prescriptions()
    {
        return $this->hasMany('App\prescription\model\entities\PatientPrescription', 'patient_id');
    }

    public function labtests()
    {
        return $this->hasMany('App\prescription\model\entities\PatientLabTests', 'patient_id');
    }

    public function pharmacy()
    {
        return $this->hasOne('App\prescription\model\entities\Pharmacy', 'pharmacy_id');
    }

    public function lab()
    {
        return $this->hasOne('App\prescription\model\entities\Lab', 'lab_id');
    }
}
