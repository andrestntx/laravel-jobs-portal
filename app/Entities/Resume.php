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
    protected $fillable = ['profile', 'wage_aspiration', 'study_title'];

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
     * Get the skills for the resume.
     */
    public function skills()
    {
        return $this->belongsToMany('App\Entities\Skill');
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
     * @param $skillId
     * @return mixed
     */
    public function scopeFrequentJoins($query, $skillId)
    {
        return $query->selectDefaultJoins()
        ->joinSkills($skillId)
        ->joinJobseeker()
        ->joinGeoLocation();
    }

    public function scopeJoinSkills($query, $id = null)
    {
        $query->join('resume_skill', 'resume_skill.resume_id', '=', 'resumes.id');

        if(is_null($id) || empty($id) || count($id) > 0) {
            return $query->join('skills', 'skills.id', '=', 'resume_skill.skill_id');
        }
        else if(is_array($id)) {
            return $query->join('skills', function($join) use ($id){
                $join->on('skills.id', '=', 'resume_skill.skill_id')
                    ->whereIn('skills.id', $id);
            });
        }

        return $query->join('skills', function($join) use ($id){
            $join->on('skills.id', '=', 'resume_skill.skill_id')
                ->on('skills.id', '=', \DB::raw($id));
        });
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
}
