<?php

namespace App\Http\ViewComposers\Resume;

use App\Repositories\Files\JobseekerFileRepository;
use App\Repositories\GeoLocationRepository;
use App\Repositories\ResumeRepository;
use App\Repositories\OccupationRepository;
use Illuminate\Contracts\View\View;

use App\Http\ViewComposers\BaseComposer;

class ListComposer extends BaseComposer
{
    protected $skillRepository;
    protected $jobseekerFileRepository;
    protected $geoLocationRepository;

    function __construct(ResumeRepository $repository, OccupationRepository $skillRepository,
                         JobseekerFileRepository $jobseekerFileRepository, GeoLocationRepository $geoLocationRepository)
    {
        $this->repository = $repository;
        $this->skillRepository = $skillRepository;
        $this->jobseekerFileRepository = $jobseekerFileRepository;
        $this->geoLocationRepository = $geoLocationRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $skills             = $this->skillRepository->listsSelect();
        $photos             = $this->jobseekerFileRepository;
        $locations          = $this->geoLocationRepository->getSearchSelect();

        $view->with([
            'skills'    => $skills,
            'photos'    => $photos,
            'locations' => $locations
        ]);
    }
}
