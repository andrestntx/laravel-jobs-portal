<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/23/16
 * Time: 2:47 PM
 */

namespace App\Services;


use App\Repositories\ParameterRepository;

class ParameterService extends ResourceService {

    /**
     * ParameterService constructor.
     * @param ParameterRepository $repository
     */
    function __construct(ParameterRepository $repository)
    {
        $this->repository = $repository;
    }

}