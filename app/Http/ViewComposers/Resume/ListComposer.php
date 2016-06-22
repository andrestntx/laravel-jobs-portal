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
    protected $geoLocationRepository;

    function __construct(ResumeRepository $repository,
                         GeoLocationRepository $geoLocationRepository)
    {
        $this->repository = $repository;
        $this->geoLocationRepository = $geoLocationRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $locations          = $this->geoLocationRepository->getSearchSelect();

        $view->with([
            'locations' => $locations
        ]);
    }
}
