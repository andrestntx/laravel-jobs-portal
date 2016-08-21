<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/16/16
 * Time: 12:15 PM
 */

namespace App\Services;


use App\Repositories\ActivityRepository;

class ActivityService extends ResourceService {

    /**
     * ActivityService constructor.
     * @param ActivityRepository $repository
     */
    function __construct(ActivityRepository $repository)
    {
        $this->repository = $repository;
    }

}