<?php

namespace App\Repositories;



class ContractTypeRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Entities\ContractType';
    }
}
