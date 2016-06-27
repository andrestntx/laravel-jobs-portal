<?php

namespace App\Entities;

use App\Repositories\Files\CompanyFileRepository;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nit', 'name', 'description', 'website', 'facebook', 'twitter', 'active', 'user_id',
        'geo_location_id', 'company_category_id', 'email','email_new_job', 'tel', 'cel'
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
     * The category for the company.
     */
    public function category()
    {
        return $this->belongsTo('App\Entities\CompanyCategory', 'company_category_id', 'id');
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

    /**
     * @return mixed
     */
    public function getCategoryNameAttribute()
    {
        if($category = $this->category) {
            return $category->name;
        }
    }

    /**
     * @return mixed
     */
    public function getEmailAttribute($value)
    {
        if(! $value && $this->user ){
            $value = $this->user->email;
        }

        return $value;
    }

    /**
     * @return mixed
     */
    public function getTwitterLinkAttribute()
    {
        return 'https://twitter.com/' . $this->twitter;
    }

    /**
     * @return mixed
     */
    public function getFacebookLinkAttribute()
    {
        return 'https://facebook.com/' . $this->facebook;
    }

    public function getWebsiteLinkAttribute(){
        return 'http://' . $this->website;
    }

}
