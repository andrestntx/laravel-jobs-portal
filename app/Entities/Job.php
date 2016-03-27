<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 10;

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'Y-m-d';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['closing_date'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'company_id', 'salary', 'closing_date', 'experience',
        'email', 'contract_type_id', 'occupation_id', 'geo_location_id', 'who_apply', 'offer'
    ];
    
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
        return $this->belongsTo('App\Entities\ContractType');
    }

    /**
     * Get the occupaton for the job.
     */
    public function occupation()
    {
        return $this->belongsTo('App\Entities\Occupation');
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
     * Get the skills for the Job.
     */
    public function skills()
    {
        return $this->belongsToMany('App\Entities\Skill');
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
     * @param $closing_date
     */
    public function setClosingDateAttribute($closing_date)
    {
        if(empty($closing_date)) {
            $this->attributes['closing_date'] = Carbon::now()->addDays(10);
        }
        else {
            $this->attributes['closing_date'] = Carbon::parse($closing_date);
        }
    }

    /**
     * @param $closing_date
     * @return static
     */
    public function getClosingDateAttribute($closing_date)
    {
        if(empty($closing_date) || $closing_date == '0000-00-00') {
            return Carbon::now()->addDays(10);
        }

        return Carbon::parse($closing_date);
    }

    /**
     * @return mixed
     */
    public function getClosingDateFormAttribute()
    {
        return $this->closing_date->format($this->getDateFormat());
    }

    /**
     * @return string
     */
    public function getClosingDateHummansAttribute()
    {
        if($this->closing_date->isToday()) {
            return 'Hoy';
        }

        Carbon::setLocale('es');
        return ucfirst($this->closing_date->diffForHumans());
    }

    /**
     * @return string
     */
    public function getClosingDateDetailAttribute()
    {
        return $this->closing_date_hummans . ',  ' . $this->closing_date_form;
    }
}
