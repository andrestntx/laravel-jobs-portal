<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'value'];
}
