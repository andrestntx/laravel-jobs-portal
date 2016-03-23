<?php 

namespace App\Repositories;

class CompanyCategoryRepository extends BaseRepository {
 
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Entities\CompanyCategory';
    }
}