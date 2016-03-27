<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

class StudyRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Entities\Study';
    }
}
