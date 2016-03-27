<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/24/16
 * Time: 11:56 AM
 */

namespace App\Services;


use App\Repositories\StudyRepository;
use Illuminate\Database\Eloquent\Collection;

class StudyService extends ResourceService
{
    /**
     * JobService constructor.
     * @param StudyRepository $repository
     */
    function __construct(StudyRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @param array $studies
     * @return Collection|null
     */
    public function getNewStudies(array $studies)
    {
        return $this->repository->newModels($studies);
    }

    /**
     * @param array $studies
     * @return Collection
     */
    public function updateStudies(array $studies)
    {
        return $this->repository->updateModels($studies);
    }

}