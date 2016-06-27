<?php

namespace App\Repositories;




class ProfileRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Entities\Profile';
    }
}
