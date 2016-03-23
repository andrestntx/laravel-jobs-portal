<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class ContractType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'created_by'];
    
    /**
     * Get the jobs for the contract type.
     */
    public function jobs()
    {
        return $this->hasMany('App\Entities\Job');
    }

    /**
     * Get the user that owns the company.
     */
    public function user()
    {
        return $this->belongsTo('App\Entities\User', 'created_by');
    }
}
