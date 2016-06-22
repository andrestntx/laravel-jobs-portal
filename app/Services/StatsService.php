<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 6/12/16
 * Time: 11:05 PM
 */

namespace App\Services;

use App\Repositories\ApplicationRepository;
use App\Repositories\CompanyRepository;
use App\Repositories\JobRepository;
use App\Repositories\JobseekerRepository;
use App\Repositories\UserRepository;

class StatsService
{
    protected $userRepository;
    protected $jobseekerRepository;
    protected $companyRepository;
    protected $jobRepository;
    protected $applicationRepository;

    /**
     * StatsService constructor.
     * @param UserRepository $userRepository
     * @param JobseekerRepository $jobseekerRepository
     * @param CompanyRepository $companyRepository
     * @param JobRepository $jobRepository
     * @param ApplicationRepository $applicationRepository
     */
    public function __construct(UserRepository $userRepository, JobseekerRepository $jobseekerRepository,
        CompanyRepository $companyRepository, JobRepository $jobRepository, ApplicationRepository $applicationRepository)
    {
        $this->userRepository       = $userRepository;
        $this->jobseekerRepository  = $jobseekerRepository;
        $this->companyRepository    = $companyRepository;
        $this->jobRepository        = $jobRepository;
        $this->applicationRepository = $applicationRepository;
    }

    public function getStats()
    {
        $jobseekers  = $this->jobseekerRepository->all();
        $companies   = $this->companyRepository->all();
        $jobs        = $this->jobRepository->all();
        $applications = $this->applicationRepository->all();


        return [
            'jobseekers' => [
                'total'         => $jobseekers->count(),
                'total_men'     => $jobseekers->where('sex', 'M')->count(),
                'total_women'   => $jobseekers->where('sex', 'F')->count()
            ],
            'applications' => [
                'total'         => $applications->count(),
                'total_men'     => $applications->where('jobseeker_sex', 'M')->count(),
                'total_women'   => $applications->where('jobseeker_sex', 'F')->count(),
                'hired_total'   => $applications->where('accepted', 1)->count(),
                'hired_men'     => $applications->where('accepted', 1)->where('jobseeker_sex', 'M')->count(),
                'hired_women'   => $applications->where('accepted', 1)->where('jobseeker_sex', 'F')->count()
            ],
            'employers' => [
                'total'         => $companies->count()
            ],
            'jobs'      => [
                'total'         => $jobs->count(),
                'contract'      => $jobs->whereIn('contract_type_id', [1,2])->count(),
                'ops'           => $jobs->where('contract_type_id', 3)->count(),
            ]
        ];
    }
}