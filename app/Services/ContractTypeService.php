<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/14/16
 * Time: 7:36 PM
 */

namespace App\Services;

use App\Repositories\ContractTypeRepository;

class ContractTypeService extends ResourceService {

    function __construct(ContractTypeRepository $repository)
    {
        $this->repository = $repository;
    }

}