<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/21/16
 * Time: 11:52 PM
 */

namespace App\Entities;


use Illuminate\Database\Eloquent\Model;

class GeoLocation extends Model
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["name", "point_of_interest", "lat", "lng", "location", "locatio", "formatted_address",
        "bounds", "viewport", "route", "street_number", "postal_code", "locality", "sublocality", "country",
        "country_short", "administrative_area_level_1", "place_id", "id", "reference", "url", "website"
    ];

    /**
     * Get the jobs for the GeoLocation.
     */
    public function jobs()
    {
        return $this->hasMany('App\Entities\Job');
    }

    /**
     * Get the jobseekers for the GeoLocation.
     */
    public function jobseekers()
    {
        return $this->hasMany('App\Entities\Jobseeker');
    }

    /**
     * @return string
     */
    public function getAddressAttribute()
    {
        return substr($this->formatted_address,0,90);
    }


}