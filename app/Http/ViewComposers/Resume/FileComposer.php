<?php

namespace App\Http\ViewComposers\Resume;

use App\Repositories\Files\CompanyFileRepository;
use App\Repositories\Files\JobseekerFileRepository;
use App\Repositories\Files\UserFileRepository;
use Illuminate\Contracts\View\View;

use App\Http\ViewComposers\BaseComposer;

class FileComposer extends BaseComposer
{
    protected $jobseekerFileRepository;
    protected $companyFileRepository;
    protected $userFileRepository;


    function __construct(JobseekerFileRepository $jobseekerFileRepository, CompanyFileRepository $companyFileRepository,
                UserFileRepository $userFileRepository)
    {
        $this->jobseekerFileRepository  = $jobseekerFileRepository;
        $this->companyFileRepository    = $companyFileRepository;
        $this->userFileRepository       = $userFileRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $photos     = $this->jobseekerFileRepository;
        $logos      = $this->companyFileRepository;
        $photoUsers = $this->userFileRepository;


        $view->with([
            'photos'        => $photos,
            'logos'         => $logos,
            'photoUsers'    => $photoUsers
        ]);
    }
}
