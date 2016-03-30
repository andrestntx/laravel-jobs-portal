<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['intro', 'resume_id', 'job_id'];
    
    /**
     * Get the resume that owns the application.
     */
    public function resume()
    {
        return $this->belongsTo('App\Entities\Resume');
    }

    /**
     * Get the job that owns the application.
     */
    public function job()
    {
        return $this->belongsTo('App\Entities\Job');
    }
}
