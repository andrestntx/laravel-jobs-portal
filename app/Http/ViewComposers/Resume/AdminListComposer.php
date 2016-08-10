<?php

namespace App\Http\ViewComposers\Resume;

use App\Repositories\Files\JobseekerFileRepository;
use App\Repositories\GeoLocationRepository;
use App\Repositories\ProfileRepository;
use App\Repositories\ResumeRepository;
use App\Repositories\OccupationRepository;
use Illuminate\Contracts\View\View;

use App\Http\ViewComposers\BaseComposer;

class ListComposer extends BaseComposer
{
    protected $profileRepository;

    function __construct(ResumeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $resumes = $this->repository->all();

        $view->with(['resumes' => $resumes]);
    }
}
