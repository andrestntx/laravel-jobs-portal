<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/14/16
 * Time: 7:33 PM
 */

namespace App\Services;


use App\Repositories\JobCategoryRepository;

class JobCategoryService extends ResourceService {

    function __construct(JobCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

}