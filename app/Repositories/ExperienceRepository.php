<?php

namespace App\Repositories;



class ExperienceRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Entities\Experience';
    }
}
