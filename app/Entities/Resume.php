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
    protected $fillable = ['profile', 'wage_aspiration', 'study_title', 'skills', 'occupation_id', 'vaccines', 'experience', 'profile_id'];

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function occupation()
    {
        return $this->belongsTo('App\Entities\Occupation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employmentProfile()
    {
        return $this->belongsTo('App\Entities\Profile');
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

    /**
     * @param $query
     * @return mixed
     */
    public function scopeSelectDefaultJoins($query)
    {
        return $query->select(['resumes.id', 'jobseekers.first_name', 'jobseekers.last_name', 'jobseekers.user_id', 'resumes.study_title',
            'geo_locations.formatted_address', 'geo_locations.lat', 'geo_locations.lng'
        ]);
    }

    /**
     * @param $query
     * @param $lat
     * @param $lng
     * @return mixed
     */
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
            ->joinOccupation()
            ->joinProfile()
            ->joinGeoLocation();
    }

    /**
     * @param $query
     * @param null $id
     * @return mixed
     */
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

    /**
     * @param $query
     * @return mixed
     */
    public function scopeJoinJobseeker($query)
    {
        return $query->join('jobseekers', 'jobseekers.user_id', '=', 'resumes.jobseeker_id');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeJoinOccupation($query)
    {
        return $query->join('occupations', 'occupations.id', '=', 'resumes.occupation_id');
    }

    public function scopeJoinProfile($query)
    {
        return $query->join('profiles', 'profiles.id', '=', 'resumes.profile_id');
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
     * @return string
     */
    public function getOccupationNameAttribute()
    {
        if($this->occupation) {
            return $this->occupation->name;
        }

        return 'sin ocupación';
    }

    /**
     * @return string
     */
    public function getProfileNameAttribute()
    {
        if($this->employmentProfile) {
            return $this->employmentProfile->name;
        }

        return 'sin perfil laboral';
    }

    /**
     * @return array
     */
    public function getOccupationArray() {
        $array = [];

        if($this->occupation) {
            $array = [$this->occupation_id => $this->occupation->name];
        }

        return $array;
    }

    /**
     * @return array
     */
    public function getSkillsArrayAttribute()
    {
        return explode(',', $this->skills);
    }
}
