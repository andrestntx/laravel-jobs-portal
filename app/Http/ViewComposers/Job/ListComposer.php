<?php

namespace App\Http\ViewComposers\Job;

use App\Repositories\ContractTypeRepository;
use App\Repositories\Files\CompanyFileRepository;
use App\Repositories\GeoLocationRepository;
use App\Repositories\JobRepository;
use App\Repositories\ProfileRepository;
use Illuminate\Contracts\View\View;

use App\Http\ViewComposers\BaseComposer;

class ListComposer extends BaseComposer
{
    protected $profileRepository;
    protected $companyFileRepository;
    protected $geoLocationRepository;
    protected $contractTypeRepository;

    /**
     * ListComposer constructor.
     * @param JobRepository $repository
     * @param ProfileRepository $profileRepository
     * @param CompanyFileRepository $companyFileRepository
     * @param GeoLocationRepository $geoLocationRepository
     * @param ContractTypeRepository $contractTypeRepository
     */
    function __construct(JobRepository $repository, ProfileRepository $profileRepository,
                         CompanyFileRepository $companyFileRepository, GeoLocationRepository $geoLocationRepository,
                         ContractTypeRepository $contractTypeRepository)
    {
        $this->repository = $repository;
        $this->profileRepository = $profileRepository;
        $this->companyFileRepository = $companyFileRepository;
        $this->geoLocationRepository = $geoLocationRepository;
        $this->contractTypeRepository = $contractTypeRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $profiles        = $this->profileRepository->listsSelect();
        $salaryRange        = $this->repository->getSalaryRange();
        $experienceRange    = $this->repository->getExperienceRange();
        $logos              = $this->companyFileRepository;
        $locations          = $this->geoLocationRepository->getSearchSelect();
        $types              = $this->contractTypeRepository->listsSelect();

        $args = array_merge([
            'profiles'      => $profiles,
            'logos'         => $logos,
            'locations'     => $locations,
            'types'         => $types
        ], $salaryRange, $experienceRange);

        $view->with($args);
    }
}
