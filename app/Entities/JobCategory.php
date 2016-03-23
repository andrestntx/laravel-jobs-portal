<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'created_by'];
    
    /**
     * The jobs that belong to the category.
     */
    public function jobs()
    {
        return $this->belongsToMany('App\Entities\Job');
    }

    /**
     * Get the user that owns the job category.
     */
    public function user()
    {
        return $this->belongsTo('App\Entities\User', 'created_by');
    }
}
