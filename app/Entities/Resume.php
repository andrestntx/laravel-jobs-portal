<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['profile', 'wage_aspiration', 'study_title', 'skills'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'jobseeker_id';
    }

    /**
     * Get the jobseeker that owns the resume.
     */
    public function jobseeker()
    {
        return $this->belongsTo('App\Entities\Jobseeker');
    }

    /**
     * Get the user that owns the resume.
     */
    public function user()
    {
        return $this->jobseeker->user();
    }

    /**
     * Get the educations for the resume jobseeker.
     */
    public function studies()
    {
        return $this->hasMany('App\Entities\Study');
    }

    /**
     * Get the experiences for the resume jobseeker.
     */
    public function experiences()
    {
        return $this->hasMany('App\Entities\Experience');
    }


    /**
     * The jobs that belong to the resume.
     */
    public function jobs()
    {
        return $this->belongsToMany('App\Entities\Job', 'applications')
            ->withTimestamps()
            ->withPivot('intro');
    }

    /**
     * Get the applications for the resume.
     */
    public function applications()
    {
        return $this->hasMany('App\Entities\Application');
    }

    public function scopeSelectDefaultJoins($query)
    {
        return $query->select(['resumes.id', 'jobseekers.first_name', 'jobseekers.last_name', 'jobseekers.user_id', 'resumes.study_title',
            'geo_locations.formatted_address', 'geo_locations.lat', 'geo_locations.lng'
        ]);
    }

    public function scopeSelectRawDistance($query, $lat, $lng)
    {
        return $query->selectRaw("( 3959 * acos( cos( radians($lat) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( lat ) ) ) ) as distance");
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeFrequentJoins($query)
    {
        return $query->selectDefaultJoins()
        ->joinJobseeker()
        ->joinGeoLocation();
    }

    public function scopeJoinGeoLocation($query, $id = null)
    {
        if(is_null($id) || empty($id)) {
            return $query->join('geo_locations', 'geo_locations.id', '=', 'jobseekers.geo_location_id');
        }

        return $query->join('geo_locations', function($join) use ($id){
            $join->on('geo_locations.id', '=', 'jobseekers.geo_location_id')
                ->on('geo_locations.id', '=', \DB::raw($id));
        });
    }

    public function scopeJoinJobseeker($query)
    {
        return $query->join('jobseekers', 'jobseekers.user_id', '=', 'resumes.jobseeker_id');
    }

    /**
     * @return mixed
     */
    public function getEmailAttribute($value)
    {
        if(! $value && $this->user ) {
            $value = $this->user->email;
        }

        return $value;
    }

    /**
     * @return array
     */
    public function getSkillsArrayAttribute()
    {
        return explode(',', $this->skills);
    }
}
