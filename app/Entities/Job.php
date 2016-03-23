<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'company_id', 'salary', 'closing_date', 'email', 'contract_type_id'];
    
    /**
     * The categories that belong to the job.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Entities\JobCategory');
    }

    /**
     * Get the contract type for the job.
     */
    public function contractType()
    {
        return $this->belongsTo('App\Entities\contractType');
    }

    /**
     * Get the company for the job.
     */
    public function company()
    {
        return $this->belongsTo('App\Entities\Company');
    }

    /**
     * Get the GeoLocation for the job.
     */
    public function geoLocation()
    {
        return $this->belongsTo('App\Entities\GeoLocation');
    }

    /**
     * The resumes that belong to the job.
     */
    public function resumes()
    {
        return $this->belongsToMany('App\Entities\Resumes', 'applications')
            ->withTimestamps()
        	->withPivot('intro');
    }

    /**
     * Get the applications for the job.
     */
    public function applications()
    {
        return $this->hasMany('App\Entities\Application');
    }

    /**
     * @return mixed
     */
    public function getAddressAttribute()
    {
        if($geoLocation = $this->geoLocation) {
            return $geoLocation->address;
        }
    }


}
