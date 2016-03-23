<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class CompanyCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'created_by'];

    /**
     * The companies that belong to the category.
     */
    public function companies()
    {
        return $this->belongsToMany('App\Entities\Company');
    }

    /**
     * Get the user that owns the company.
     */
    public function user()
    {
        return $this->belongsTo('App\Entities\User', 'created_by');
    }
}
