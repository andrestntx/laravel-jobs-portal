<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'institution', 'notes', 'init', 'finish'];
    
    /**
     * Get the resume that owns the education.
     */
    public function resume()
    {
        return $this->belongsTo('App\Entities\Resume');
    }
}
