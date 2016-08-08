<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/21/16
 * Time: 1:00 AM
 */

namespace App\Repositories;


use App\Entities\Jobseeker;
use App\Entities\Resume;

class JobseekerRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Entities\Jobseeker';
    }

    public function saveResume(Jobseeker $jobseeker, Resume $newResume) {
        return $jobseeker->resumes()->save($newResume);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getJobseekerAssists()
    {
        return $this->model->with(['activities'])->get();
    }
}