<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 7/4/16
 * Time: 12:39 PM
 */

namespace App\Services;


use App\Repositories\OccupationRepository;

class AjaxService
{
    protected $occupationRepository;

    /**
     * AjaxService constructor.
     * @param OccupationRepository $occupationRepository
     */
    public function __construct(OccupationRepository $occupationRepository)
    {
        $this->occupationRepository = $occupationRepository;
    }


    /**
     * @param string $query
     * @return mixed
     */
    public function occupations($query = '')
    {
        return $this->occupationRepository->listsSelectQuery($query);
    }


}