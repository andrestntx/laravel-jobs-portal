<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/23/16
 * Time: 2:47 PM
 */

namespace App\Services;


use App\Repositories\OccupationRepository;

class OccupationService extends ResourceService {

    /**
     * OccupationService constructor.
     * @param OccupationRepository $repository
     */
    function __construct(OccupationRepository $repository)
    {
        $this->repository = $repository;
    }

}