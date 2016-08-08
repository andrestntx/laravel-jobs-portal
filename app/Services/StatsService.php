<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 6/12/16
 * Time: 11:05 PM
 */

namespace App\Services;

use App\Repositories\ActivityRepository;
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
    protected $activityRepository;

    /**
     * StatsService constructor.
     * @param UserRepository $userRepository
     * @param JobseekerRepository $jobseekerRepository
     * @param CompanyRepository $companyRepository
     * @param JobRepository $jobRepository
     * @param ApplicationRepository $applicationRepository
     */
    public function __construct(UserRepository $userRepository, JobseekerRepository $jobseekerRepository,
        CompanyRepository $companyRepository, JobRepository $jobRepository, ApplicationRepository $applicationRepository,
        ActivityRepository $activityRepository)
    {
        $this->userRepository       = $userRepository;
        $this->jobseekerRepository  = $jobseekerRepository;
        $this->companyRepository    = $companyRepository;
        $this->jobRepository        = $jobRepository;
        $this->applicationRepository = $applicationRepository;
        $this->activityRepository   = $activityRepository;
    }

    public function getStats($start = null, $end = null)
    {
        if(is_null($start) || empty($start)) {
            $start = '0001-01-01';
        }
        if(is_null($end) || empty($end)) {
            $end = '3000-01-01';
        }

        $jobseekers  = $this->jobseekerRepository
            ->getModel()
            ->where('created_at', '>=', $start)
            ->where('created_at', '<=', $end)
            ->get();

        $companies   = $this->companyRepository
            ->getModel()
            ->where('created_at', '>=', $start)
            ->where('created_at', '<=', $end)
            ->get();

        $jobs        = $this->jobRepository
            ->getModel()
            ->where('created_at', '>=', $start)
            ->where('created_at', '<=', $end)
            ->get();

        $applications = $this->applicationRepository
            ->getModel()
            ->where('created_at', '>=', $start)
            ->where('created_at', '<=', $end)
            ->get();

        $assists = $this->activityRepository
            ->getModel()
            ->with('jobseekers')
            ->get();

        $assistsArray = [];

        foreach($assists as $assistance) {
            $assistsArray[$assistance->id]['name'] = $assistance->name;
            $assistsArray[$assistance->id]['count'] = $assistance->jobseekers
                ->where('assist_at', '>=', $start)
                ->where('assist_at', '<=', $end)->count();
        }

        return [
            'jobseekers' => [
                'total'         => $jobseekers->count(),
                'total_men'     => $jobseekers->where('sex', 'M')->count(),
                'total_women'   => $jobseekers->where('sex', 'F')->count()
            ],
            'applications' => [
                'preselected' => [
                    'total'         => $applications->where('preselected', 1)->count(),
                    'total_men'     => $applications->where('preselected', 1)->where('jobseeker_sex', 'M')->count(),
                    'total_women'   => $applications->where('preselected', 1)->where('jobseeker_sex', 'F')->count(),
                ],
                'accepted' => [
                    'total'   => $applications->where('preselected', 1)->where('accepted', 1)->count(),
                    'total_men'     => $applications->where('preselected', 1)->where('accepted', 1)->where('jobseeker_sex', 'M')->count(),
                    'total_women'   => $applications->where('preselected', 1)->where('accepted', 1)->where('jobseeker_sex', 'F')->count()
                ]
            ],
            'employers' => [
                'total'         => $companies->count()
            ],
            'jobs'      => [
                'total'         => $jobs->count(),
                'contract'      => $jobs->whereIn('contract_type_id', [1,2])->count(),
                'ops'           => $jobs->where('contract_type_id', 3)->count(),
            ],
            'assists' => $assistsArray
        ];
    }
}