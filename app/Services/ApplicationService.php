<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/29/16
 * Time: 12:57 PM
 */

namespace App\Services;


use App\Entities\Job;
use App\Entities\Resume;
use App\Repositories\ApplicationRepository;

class ApplicationService extends ResourceService
{
    function __construct(ApplicationRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Resume $resume
     * @param Job $job
     * @param array $data
     * @return mixed
     */
    public function applyJob(Resume $resume, Job $job, array $data)
    {
        return $this->createModel(array_merge(['resume_id' => $resume->id, 'job_id' => $job->id], $data));
    }

    /**
     * @param Resume $resume
     * @param Job $job
     * @return int
     */
    public function count(Resume $resume, Job $job)
    {
        return $this->repository->countOfResume($resume, $job);
    }


    /**
     * @param Resume $resume
     * @return mixed
     */
    public function getOfResume(Resume $resume)
    {
        return $this->repository->ofResume($resume);
    }
}