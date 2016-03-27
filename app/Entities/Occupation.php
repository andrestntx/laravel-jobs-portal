<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'created_by'];

    /**
     * The jobs that belong to the skill.
     */
    public function jobs()
    {
        return $this->hasMany('App\Entities\Job');
    }
}
