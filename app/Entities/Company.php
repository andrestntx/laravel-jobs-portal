<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'website', 'facebook', 'twitter', 'active', 'user_id',
        'geo_location_id', 'company_category_id', 'email'
    ];
	
    /**
     * Get the user that owns the company.
     */
    public function user()
    {
        return $this->belongsTo('App\Entities\User');
    }

    /**
     * Get the GeoLocation for the company.
     */
    public function geoLocation()
    {
        return $this->belongsTo('App\Entities\GeoLocation');
    }

    /**
     * Get the jobs for the company.
     */
    public function jobs()
    {
        return $this->hasMany('App\Entities\Job');
    }

    /**
     * The categories that belong to the company.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Entities\CompanyCategory');
    }

    /**
     * @return mixed
     */
    /*public function getAddressAttribute()
    {
        if($geoLocation = $this->geoLocation) {
            return $geoLocation->address;
        }
    }*/
}
