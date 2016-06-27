<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/23/16
 * Time: 2:47 PM
 */

namespace App\Services;


use App\Repositories\ProfileRepository;

class ProfileService extends ResourceService {

    /**
     * ProfileService constructor.
     * @param ProfileRepository $repository
     */
    function __construct(ProfileRepository $repository)
    {
        $this->repository = $repository;
    }

}