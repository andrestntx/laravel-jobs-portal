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
     * @return mixed
     */
    public function getCountApplicationsAttribute()
    {
        if($applications = $this->applications){
            return $applications->count();
        }

        return 0;
    }

    /**
     * @return mixed
     */
    public function getEmailAttribute($value)
    {
        if(! $value && is_object($this->company)) {
            $value = $this->company->email;
        }

        return $value;
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
            return \Lang::get('today');
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

    public function scopeFrequentJoins($query, $occupationId = null, $companyId = null, $contractTypeIds = null, $experience = 0, $salaryMin = 0)
    {
        return $query->selectDefaultJoins()
            ->joinOccupations($occupationId)
            ->joinCompanies($companyId)
            ->joinContractTypes($contractTypeIds)
            ->joinGeoLocations()
            ->where('experience', '>=', $experience)
            ->where('salary', '>=', $salaryMin);
    }

    public function scopeSelectDefaultJoins($query)
    {
        return $query->select(['jobs.name as name', 'jobs.id', 'geo_locations.lat', 'geo_locations.lng', 'companies.name as company',
            'companies.id as company_id', 'contract_types.name as contractType', 'geo_locations.formatted_address as formatted_address',
            'occupations.name as occupation'
        ]);
    }

    public function getRawDistance($lat, $lng)
    {
        return "( 3959 * acos( cos( radians($lat) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( lat ) ) ) ) as distance";
    }

    public function scopeSelectRawDistance($query, $lat, $lng)
    {
        return $query->selectRaw($this->getRawDistance($lat, $lng));
    }

    public function scopeJoinCompanies($query, $id = null)
    {
        if(is_null($id) || empty($id)) {
            return $query->join('companies', 'companies.id', '=', 'jobs.company_id');
        }

        return $query->join('companies', function($join) use ($id){
            $join->on('companies.id', '=', 'jobs.company_id')
                ->on('companies.id', '=', \DB::raw($id));
        });

    }

    public function scopeJoinContractTypes($query, $id = null)
    {
        if(is_null($id) || empty($id)) {
            return $query->join('contract_types', 'contract_types.id', '=', 'jobs.contract_type_id');
        }
        else if(is_array($id)) {
            return $query->join('contract_types', function($join) use ($id){
                $join->on('contract_types.id', '=', 'jobs.contract_type_id')
                    ->whereIn('contract_types.id', $id);
            });
        }

        return $query->join('contract_types', function($join) use ($id){
            $join->on('contract_types.id', '=', 'jobs.contract_type_id')
                ->on('contract_types.id', '=', \DB::raw($id));
        });
    }

    public function scopeJoinOccupations($query, $id = null)
    {
        if(is_null($id) || empty($id)) {
            return $query->join('occupations', 'occupations.id', '=', 'jobs.occupation_id');
        }

        return $query->join('occupations', function($join) use ($id){
            $join->on('occupations.id', '=', 'jobs.occupation_id')
                ->on('occupations.id', '=', \DB::raw($id));
        });
    }

    public function scopeJoinGeoLocations($query, $id = null)
    {
        if(is_null($id) || empty($id)) {
            return $query->join('geo_locations', 'geo_locations.id', '=', 'jobs.geo_location_id');
        }

        return $query->join('geo_locations', function($join) use ($id){
            $join->on('geo_locations.id', '=', 'jobs.geo_location_id')
                ->on('geo_locations.id', '=', \DB::raw($id));
        });
    }
}
