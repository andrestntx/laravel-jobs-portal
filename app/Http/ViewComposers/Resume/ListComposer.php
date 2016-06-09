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
    protected $jobseekerFileRepository;
    protected $geoLocationRepository;

    function __construct(ResumeRepository $repository,
                         JobseekerFileRepository $jobseekerFileRepository, GeoLocationRepository $geoLocationRepository)
    {
        $this->repository = $repository;
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
        $photos             = $this->jobseekerFileRepository;
        $locations          = $this->geoLocationRepository->getSearchSelect();

        $view->with([
            'photos'    => $photos,
            'locations' => $locations
        ]);
    }
}
