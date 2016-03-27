<?php

namespace App\Repositories;


use App\Entities\Job;
use Illuminate\Database\Eloquent\Model;

class JobRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Entities\Job';
    }

    /**
     * @param $companyId
     * @return mixed
     */
    public function getCompanyJobs($companyId)
    {
        return $this->model->with(['jobs.contractType', 'jobs.geoLocation', 'jobs.occupation'])
            ->whereCompanyId($companyId)
            ->paginate();
    }


    /**
     * @param Model $job
     * @param array $skills
     * @return mixed
     */
    public function syncSkills(Model $job, array $skills = array())
    {
        return $job->skills()->sync($skills);
    }

    /**
     * @param Job $job
     */
    public function getJobSkillsSelect(Job $job)
    {
        return $job->skills()->lists('id')->all();
    }

    public function getAllJobs()
    {
        return $this->model->with(['contractType', 'company', 'geoLocation', 'occupation'])->paginate();
    }

    public function getSalaryRange()
    {
        $min = $this->model->select('salary')->orderBy('salary', 'asc')->take(1)->first()->salary;
        $max = $this->model->select('salary')->orderBy('salary', 'desc')->take(1)->first()->salary;

        return ['salaryMin' => $min, 'salaryMax' => $max];
    }

    public function getExperienceRange()
    {
        $min = $this->model->select('experience')->orderBy('experience', 'asc')->take(1)->first()->experience;
        $max = $this->model->select('experience')->orderBy('experience', 'desc')->take(1)->first()->experience;

        return ['experienceMin' => $min, 'experienceMax' => $max];
    }
}

