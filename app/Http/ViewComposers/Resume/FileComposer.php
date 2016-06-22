<?php

namespace App\Http\ViewComposers\Resume;

use App\Repositories\Files\CompanyFileRepository;
use App\Repositories\Files\JobseekerFileRepository;
use Illuminate\Contracts\View\View;

use App\Http\ViewComposers\BaseComposer;

class FileComposer extends BaseComposer
{
    protected $jobseekerFileRepository;
    protected $companyFileRepository;


    function __construct(JobseekerFileRepository $jobseekerFileRepository, CompanyFileRepository $companyFileRepository)
    {
        $this->jobseekerFileRepository = $jobseekerFileRepository;
        $this->companyFileRepository = $companyFileRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $photos = $this->jobseekerFileRepository;
        $logos  = $this->companyFileRepository;

        $view->with([
            'photos'    => $photos,
            'logos'     => $logos
        ]);
    }
}
