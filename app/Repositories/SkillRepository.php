<?php

namespace App\Repositories;




class SkillRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Entities\Skill';
    }
}
