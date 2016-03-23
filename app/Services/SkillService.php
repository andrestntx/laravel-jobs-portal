<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/16/16
 * Time: 12:15 PM
 */

namespace App\Services;


use App\Repositories\SkillRepository;

class SkillService extends ResourceService {

    /**
     * SkillService constructor.
     * @param SkillRepository $repository
     */
    function __construct(SkillRepository $repository)
    {
        $this->repository = $repository;
    }

}