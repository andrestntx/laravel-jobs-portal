<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/14/16
 * Time: 7:39 PM
 */

namespace App\Services;

use App\Entities\Company;
use App\Entities\GeoLocation;
use App\Entities\Job;
use App\Entities\User;
use App\Repositories\JobRepository;
use Illuminate\Database\Eloquent\Model;

class JobService extends ResourceService {

    protected $geoLocationService;
    protected $companyService;

    /**
     * JobService constructor.
     * @param JobRepository $repository
     * @param GeoLocationService $geoLocationService
     * @param CompanyService $companyService
     */
    function __construct(JobRepository $repository, GeoLocationService $geoLocationService, CompanyService $companyService)
    {
        $this->repository = $repository;
        $this->geoLocationService = $geoLocationService;
        $this->companyService = $companyService;
    }

    /**
     * @param Model $job
     * @param array $data
     * @return mixed
     */
    public function syncSkills(Model $job, array $data)
    {
        $skills = [];
        if(array_key_exists('skills', $data)) {
            $skills = $data['skills'];
        }

        return $this->repository->syncSkills($job, $skills);
    }

    protected function getSalaryRange($salaryRange) {
        $defaultRange = ['min' => 0, 'max' => null];

        if(is_string($salaryRange)){
            $salaryRange = explode(',', $salaryRange);
        }

        if(is_array($salaryRange)) {
            $defaultRange['min'] = $salaryRange[0];
            $defaultRange['max'] = $salaryRange[1];
        }

        return $defaultRange;
    }

    public function getSearchJobs($occupationId = null, $companyId = null, $contractTypeId = null, GeoLocation $location = null, $search = null, $experience = 0, $salaryRange = null)
    {
        $salaryRange = $this->getSalaryRange($salaryRange);

        if(! is_null($location)) {
            $jobs = $this->repository->getAllSearchJobsNear($occupationId, $companyId, $contractTypeId, $location, $search, $experience, $salaryRange['min'], $salaryRange['max']);
        }
        else {
            $jobs = $this->repository->getAllSearchJobs($occupationId, $companyId, $contractTypeId, $search, $experience, $salaryRange['min'], $salaryRange['max']);
        }

        return ['jobs' => $this->repository->customPaginateCollection($jobs), 'markers' => $jobs->toJson(), 'total' => $this->repository->count()];
    }

    /**
     * @param Company $company
     * @return mixed
     */
    public function getCompanyJobs(Company $company)
    {
        return $this->repository->getCompanyJobs($company);
    }

    /**
     * @param Job $job
     * @return mixed
     */
    public function getJobSkillsSelect(Job $job)
    {
        return $this->repository->getJobSkillsSelect($job);
    }
}
