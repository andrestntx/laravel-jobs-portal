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

    function __construct(ResumeRepository $repository, ProfileRepository $profileRepository)
    {
        $this->repository = $repository;
        $this->profileRepository = $profileRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $profiles          = $this->profileRepository->listsSelect();
        $experienceRange    = $this->repository->getExperienceRange();

        $args = array_merge([
            'profiles'     => $profiles
        ], $experienceRange);

        $view->with($args);
    }
}
