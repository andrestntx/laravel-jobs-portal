<?php

namespace App\Repositories;




use App\Entities\Job;
use App\Entities\Resume;

class ApplicationRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Entities\Application';
    }

    /**
     * @param Resume $resume
     * @param Job $job
     * @return mixed
     */
    protected function queryOfResume(Resume $resume, Job $job)
    {
        return $this->model
            ->whereResumeId($resume->id)
            ->whereJobId($job->id);
    }

    /**
     * @param Resume $resume
     * @param Job $job
     * @return mixed
     */
    public function countOfResume(Resume $resume, Job $job)
    {
        return $this->queryOfResume($resume, $job)->count();
    }


    /**
     * @param Resume $resume
     * @return mixed
     */
    public function ofResume(Resume $resume)
    {
        return $this->model
            ->whereResumeId($resume->id)
            ->paginate();
    }




}
