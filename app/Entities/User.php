<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'role'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $roles = [
        'jobseeker' => 'trabajador',
        'employer'  => 'empresa',
        'admin'     => 'admin'
    ];

    /**
     * Get the companies for the user.
     */
    public function companies()
    {
        return $this->hasMany('App\Entities\Company');
    }

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->companies->first();
    }

    /**
     * Get the resumes for the user.
     */
    public function jobseeker()
    {
        return $this->hasOne('App\Entities\Jobseeker');
    }

    public function getUser()
    {
        return $this;
    }

    /**
     * Get the resumes for the user.
     */
    public function resumes()
    {
        $jobseeker = $this->jobseeker;

        if($jobseeker){
            return $jobseeker->resumes();
        }

        return new Collection();
    }

    /**
     * Encrypt the user password
     * @param string $value
     */
    public function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['password'] = \Hash::make($value);
        }
    }

    /**
     * @param string $role
     * @return bool
     */
    public function isRole($role)
    {
        if($this->role == $role){
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isEmployer()
    {
        return $this->isRole('employer');
    }

    /**
     * @return bool
     */
    public function isJobseeker()
    {
        return $this->isRole('jobseeker');
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return $this->isRole('admin');
    }

    /**
     * @return mixed
     */
    public function getRoleNameAttribute()
    {
        return $this->roles[$this->role];
    }
}
