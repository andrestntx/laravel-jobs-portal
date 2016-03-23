<?php

namespace App\Repositories;




class ApplicationRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Entities\Application';
    }
}
