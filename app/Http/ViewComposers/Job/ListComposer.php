<?php

namespace App\Http\ViewComposers\Job;

use App\Repositories\Files\CompanyFileRepository;
use App\Repositories\JobRepository;
use App\Repositories\OccupationRepository;
use Illuminate\Contracts\View\View;

use App\Http\ViewComposers\BaseComposer;

class ListComposer extends BaseComposer
{
    protected $occupationRepository;
    protected $companyFileRepository;

    function __construct(JobRepository $repository, OccupationRepository $occupationRepository, CompanyFileRepository $companyFileRepository)
    {
        $this->repository = $repository;
        $this->occupationRepository = $occupationRepository;
        $this->companyFileRepository = $companyFileRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $jobs               = $this->repository->getAllJobs();
        $occupations        = $this->occupationRepository->listsSelect();
        $salaryRange        = $this->repository->getSalaryRange();
        $experienceRange    = $this->repository->getExperienceRange();
        $logos              = $this->companyFileRepository;

        $args = array_merge([
            'jobs'          => $jobs,
            'occupations'   => $occupations,
            'logos'         => $logos
        ], $salaryRange, $experienceRange);

        $view->with($args);
    }
}
