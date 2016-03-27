<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/24/16
 * Time: 6:53 PM
 */

namespace App\Services;


use App\Repositories\ExperienceRepository;
use Illuminate\Database\Eloquent\Collection;

class ExperienceService extends ResourceService
{
    function __construct(ExperienceRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $experiences
     * @return Collection|null
     */
    public function getNewExperiences(array $experiences)
    {
        return $this->repository->newModels($experiences);
    }

    /**
     * @param array $experiences
     * @return Collection
     */
    public function updateExperiences(array $experiences)
    {
        return $this->repository->updateModels($experiences);
    }
}