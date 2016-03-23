<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'created_by'];
    
    /**
     * The resumes that belong to the skill.
     */
    public function resumes()
    {
        return $this->belongsToMany('App\Entities\Resume');
    }

    /**
     * The jobs that belong to the skill.
     */
    public function jobs()
    {
        return $this->belongsToMany('App\Entities\Job');
    }
}
