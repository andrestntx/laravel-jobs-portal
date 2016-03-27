<?php

namespace App\Http\ViewComposers\Resume;

use App\Repositories\Files\JobseekerFileRepository;
use App\Repositories\ResumeRepository;
use App\Repositories\OccupationRepository;
use Illuminate\Contracts\View\View;

use App\Http\ViewComposers\BaseComposer;

class ListComposer extends BaseComposer
{
    protected $skillRepository;
    protected $jobseekerFileRepository;

    function __construct(ResumeRepository $repository, OccupationRepository $skillRepository, JobseekerFileRepository $jobseekerFileRepository)
    {
        $this->repository = $repository;
        $this->skillRepository = $skillRepository;
        $this->jobseekerFileRepository = $jobseekerFileRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $resumes            = $this->repository->getAllResumes();
        $skills             = $this->skillRepository->listsSelect();
        $photos             = $this->jobseekerFileRepository;

        $view->with([
            'resumes'   => $resumes,
            'skills'    => $skills,
            'photos'    => $photos
        ]);
    }
}
