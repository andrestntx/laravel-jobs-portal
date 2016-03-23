<?php

namespace App\Repositories;



class JobRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Entities\Job';
    }
}

