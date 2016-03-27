<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
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
        return $this->belongsToMany('App\Entities\Jobs', 'applications')
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
}
