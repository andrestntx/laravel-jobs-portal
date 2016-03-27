<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/14/16
 * Time: 7:39 PM
 */

namespace App\Services;

use App\Entities\Company;
use App\Entities\Job;
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
