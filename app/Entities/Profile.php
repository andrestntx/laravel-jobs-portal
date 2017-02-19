<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'created_by'];

    /**
     * The jobs that belong to the skill.
     */
    public function jobs()
    {
        return $this->hasMany('App\Entities\Job');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function resumes()
    {
        return $this->hasMany('App\Entities\Resume');
    }
}
