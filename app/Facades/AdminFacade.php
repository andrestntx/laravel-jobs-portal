<?php

namespace App\Facades;

use App\Entities\Company;
use App\Entities\Job;
use App\Services\ApplicationService;
use App\Services\CompanyService;
use App\Services\EmailService;
use App\Services\GeoLocationService;
use App\Services\JobseekerService;
use App\Services\JobService;
use Illuminate\Database\Eloquent\Model;

class AdminFacade
{
    protected $jobService;
    protected $companyService;
    protected $geoLocationService;
    protected $emailService;
    protected $jobseekerService;

    /**
     * EmployerFacade constructor.
     * @param JobService $jobService
     * @param CompanyService $companyService
     * @param GeoLocationService $geoLocationService
     * @param EmailService $emailService
     * @param JobseekerService $jobseekerService
     */
    public function __construct(JobService $jobService, CompanyService $companyService, GeoLocationService $geoLocationService,
        EmailService $emailService, JobseekerService $jobseekerService)
    {
        $this->jobService = $jobService;
        $this->companyService = $companyService;
        $this->geoLocationService = $geoLocationService;
        $this->emailService = $emailService;
        $this->jobseekerService = $jobseekerService;
    }

    public function getJobsApplications()
    {
        return $this->jobService->getJobsApplications();
    }

    public function preselect(Job $job, array $applications)
    {
        $job->applications()->whereIn('id', $applications)->update(['preselected' => 1]);
        $this->emailService->notifyPreselect($job, count($applications));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getJobseekerAssists()
    {
        return $this->jobseekerService->getJobseekerAssists();
    }
}