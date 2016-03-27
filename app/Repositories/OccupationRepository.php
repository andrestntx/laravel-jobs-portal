<?php

namespace App\Repositories;




class OccupationRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Entities\Occupation';
    }
}
